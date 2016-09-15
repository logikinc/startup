<?php

namespace App\Services;

use App\Repositories\ActivationRepository;
use App\User;
use Mail;

class ActivationService
{
    protected $activationRepo;

    protected $resendAfter = 24;

    public function __construct(ActivationRepository $activationRepo)
    {
        $this->activationRepo = $activationRepo;
    }

    public function sendActivationMail($user)
    {
        if ($user->activated || ! $this->shouldSend($user)) {
            return;
        }

        $token = $this->activationRepo->createActivation($user);

        $body = route('user.activate', $token);

        Mail::send('emails.activation_email', ['body' => $body], function ($message) use ($user) {
            $message->to($user->email)->subject('Activation Email');
        });
    }

    public function activateUser($token)
    {
        $activation = $this->activationRepo->getActivationByToken($token);

        if ($activation === null) {
            return;
        }

        $user = User::find($activation->user_id);

        $user->activated = true;

        $user->save();

        $this->activationRepo->deleteActivation($token);

        return $user;
    }

    private function shouldSend($user)
    {
        $activation = $this->activationRepo->getActivation($user);

        return $activation === null || strtotime($activation->created_at) + 60 * 60 * $this->resendAfter < time();
    }
}
