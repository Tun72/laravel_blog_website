<?php

namespace App\Http\Middleware;

use App\Models\Notification;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NotificationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (
            $id = request("noti_id")
        ) {
            Notification::find($id)->update(["is_seen" => 1]);
        }
        return $next($request);
    }
}
