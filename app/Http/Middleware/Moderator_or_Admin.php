<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

/**
 * Посредник для администратора и модератора
 */
class Moderator_or_Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        if (Auth::guest()) {
            return redirect()->route("login"); 
        }
        
        $role = Auth::user()->role_id;
        $roles = [1,2];
        if (!in_array($role, $roles)) {
            abort(403, 'Доступ запрещен.'); 
        }
        
        return $next($request);
    }
}
