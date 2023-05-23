<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserInterestData
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if (!$user->hasInterestData()) {
            if ($request->route()->getName() !== 'interest.index' && $request->route()->getName() !== 'interest.update') {
                return redirect()->route('interest.index');
            }
        } elseif (!$user->hasAdditionalData()) {
            if ($request->route()->getName() !== 'detail.index' && $request->route()->getName() !== 'detail.update') {
                return redirect()->route('detail.index');
            }
        }

        return $next($request);
    }
}
