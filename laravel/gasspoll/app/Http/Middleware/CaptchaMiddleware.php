<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Anhskohbo\NoCaptcha\Facades\NoCaptcha;

class CaptchaMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (NoCaptcha::verifyResponse($request->input('g-recaptcha-response'))) {
            return $next($request);
        }

        return back()->withErrors(['captcha' => 'reCAPTCHA validation failed, please try again.']);
    }
}
