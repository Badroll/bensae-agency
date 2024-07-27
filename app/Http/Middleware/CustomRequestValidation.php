<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomRequestValidation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Iterate over all input data
        $request->merge(array_map(function ($value) {
            // Check if the value is an empty string
            return $value === null ? '' : $value;
        }, $request->all()));

        return $next($request);
    }
}
