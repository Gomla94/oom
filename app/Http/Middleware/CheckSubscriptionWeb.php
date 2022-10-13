<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Api\V1\BaseController;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckSubscriptionWeb
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
        $base = new BaseController;
        $student_months = Auth::user()->months()->pluck('month_id')->toArray();
        if(! in_array($request->route('month_id'), $student_months) || ! optional(Auth::user()->subscriptions()->where('month_id', $request->route('month_id'))->orderBy('id', 'DESC')->first())->payment_status == 1)
            return back()->withErrors(["يجب الإشتتراك في في الشهر المطلوب لعرض تفاصيلة"]);
        return $next($request);
    }
}
