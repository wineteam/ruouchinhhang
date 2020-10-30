<?php

namespace App\Http\Middleware;

use App\Models\LanguageSwitch;
use Closure;
use Illuminate\Http\Request;

class checkLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $languages = LanguageSwitch::select('slug')->get()->toArray();
        if(in_array($request->language,$languages)){
            return $next($request);
        }

        return redirect()->route('home','vn');
    }
}
