<?php

namespace App\Http\Middleware;

use App\Models\HeaderSeeting;
use Closure;
use Illuminate\Http\Request;

class IsQuestion
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
        if (HeaderSeeting::where('is_question', true)->exists()) {
            return $next($request);
        }else{
            return abort(404);
        }
    }
}
