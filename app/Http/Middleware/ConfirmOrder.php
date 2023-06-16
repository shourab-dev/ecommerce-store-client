<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConfirmOrder
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
        $id = request()->id;
        $user = Customer::where('id', auth()->guard('user')->user()->id)->select('id')->whereHas('orderedBooks', function ($q) use ($id) {
            $q->where('book_id', $id);
        })->count();

        if($user == 0){
            Auth::guard('user')->logout();
            return redirect()->route('frontend.home');
        }

        return $next($request);
    }
}
