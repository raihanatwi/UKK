<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    //  Jika pengguna yang sedang login memiliki peran "ADMIN", maka pengguna tersebut akan diarahkan ke halaman yang sesuai dengan peran tersebut. 
    // Jika tidak, maka pengguna akan diarahkan ke halaman yang sesuai dengan peran "SISWA".
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->role != User::$ADMIN) {
            return redirect()->route('siswa.index');
        }

        return $next($request);
    }
}