<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckProfileCompletion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role === 'mahasiswa') {
            $mahasiswa = Auth::user()->mahasiswa;
            
            // If skills are empty, redirect to profile completion
            if (!$mahasiswa || empty($mahasiswa->keahlian)) {
                if (!$request->is('mahasiswa/profile*')) {
                    return redirect()->route('mahasiswa.profile.edit')->with('warning', 'Silakan lengkapi profil Anda terlebih dahulu.');
                }
            }
        }

        return $next($request);
    }
}
