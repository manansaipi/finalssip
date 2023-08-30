<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Notification; // Adjust the namespace

class FetchNotifications
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
        if (auth()->check()) {
            $notifications = Notification::where('user_id', auth()->user()->id)
                ->where('is_read', false)
                ->get();
            $total_notif = Notification::where('user_id', auth()->user()->id)
                ->where('is_read', false)
                ->count();
            View::share('notifications', $notifications);
            View::share('total_notif', $total_notif);
        }
        return $next($request);
    }
}
