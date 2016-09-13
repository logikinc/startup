<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App;
use Config;

class SetLocale
{
    
     protected $languages = ['en','no'];
    
    /**
     *
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
	public function handle($request, Closure $next)
	{
        if(Session::has('locale') && in_array(Session::get('locale'), $this->languages))
        {
            App::setLocale(Session::get('locale'));
        }
		return $next($request);
	}
}