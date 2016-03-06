<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      $companyID = Auth::user()->companyID;

      if(TESTMATE_COMPANY_ID != $companyID){
          return redirect('home');
      }

      return $next($request);
    }
}
