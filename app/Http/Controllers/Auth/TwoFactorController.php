<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Validator;

class TwoFactorController extends Controller
{
    /**
     * Show two-factor authentication page.
     *
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function showTokenForm()
    {
        return session('authy:auth:id') ? view('auth.twofactor.token') : redirect(url('login'));
    }

    /**
     * Verify the two-factor authentication token.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function validateTokenForm(Request $request)
    {
        $this->validate($request, ['token' => 'required']);

        if (! session('authy:auth:id')) {
            return redirect(url('login'));
        }

        $guard = config('auth.defaults.guard');
        $provider = config('auth.guards.'.$guard.'.provider');
        $model = config('auth.providers.'.$provider.'.model');

        $user = (new $model())->findOrFail(
            $request->session()->pull('authy:auth:id')
        );

        if (authy()->tokenIsValid($user, $request->token)) {
            auth($guard)->login($user);

            session()->flash('info', trans('startup.notifications.login.welcome', ['user' => $user->name]));

            return redirect()->intended('/');
        } else {
            session()->flash('danger', trans('startup.notifications.profile.authy_token'));

            return redirect(url('login'));
        }
    }

    /**
     * Enable/Disable two-factor authentication.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|null
     */
    public function setupTwoFactorAuth(Request $request)
    {
        $user = auth()->user();

        if (authy()->isEnabled($user)) {
            return $this->disableTwoFactorAuth($request, $user);
        } else {
            return $this->enableTwoFactorAuth($request, $user);
        }
    }

    /**
     * Enable two-factor authentication.
     *
     * @param \Illuminate\Http\Request                   $request
     * @param \Illuminate\Contracts\Auth\Authenticatable $user
     *
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function enableTwoFactorAuth(Request $request, Authenticatable $user)
    {
        $input = $request->all();

        if (isset($input['phone_number'])) {
            $input['authy-cellphone'] = preg_replace('/[^0-9]/', '', $input['authy-cellphone']);
        }

        $validator = Validator::make($input, [
            'country-code'    => 'required|numeric|integer',
            'authy-cellphone' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect(url('/profile/security'))->withErrors($validator->errors());
        }

        $user->setAuthPhoneInformation(
            $input['country-code'], $input['authy-cellphone']
        );

        try {
            authy()->register($user, ! empty($input['sms']) ? true : false);

            $user->save();
        } catch (Exception $e) {
            app(ExceptionHandler::class)->report($e);

            session()->with('danger', trans('startup.notifications.profile.authy_invalid'));
        }

        session()->flash('success', trans('startup.notifications.profile.authy_enabled'));

        return redirect(url('/profile/security'));
    }

    /**
     * Disable two-factor authentication.
     *
     * @param \Illuminate\Http\Request                   $request
     * @param \Illuminate\Contracts\Auth\Authenticatable $user
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function disableTwoFactorAuth(Request $request, Authenticatable $user)
    {
        try {
            authy()->delete($user);

            $user->save();
        } catch (Exception $e) {
            app(ExceptionHandler::class)->report($e);

            session()->with('danger', trans('startup.notifications.profile.authy_delete'));
        }

        session()->flash('success', trans('startup.notifications.profile.authy_disabled'));

        return redirect(url('/profile/security'));
    }
}
