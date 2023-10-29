<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class Localization
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
	 *
	 * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
	 */
	public function handle(Request $request, \Closure $next)
	{
		if (Auth::check()) {
			// Get the user specific language
			$lang = Auth::user()->language;

			// Set the language
			App::setLocale($lang);
		}

		return $next($request);
	}
}
