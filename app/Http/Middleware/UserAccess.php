<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAccess
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (auth()->user()->role != $role) {
            return redirect('/'); // Redirect jika role tidak sesuai
        }

        return $next($request);
    }
}
