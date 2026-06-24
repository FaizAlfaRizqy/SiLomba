<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class ForgotPasswordDirectController extends Controller
{
    /**
     * Tampilkan halaman lupa password (langkah 1: input email).
     */
    public function showEmailForm(): View
    {
        return view('auth.lupa-password');
    }

    /**
     * Verifikasi email, lalu arahkan user ke halaman set password baru.
     * Password TIDAK diubah di langkah ini.
     */
    public function verifyEmail(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Email tidak ditemukan. Pastikan email yang kamu masukkan benar.',
            ])->withInput();
        }

        // Simpan email & id terverifikasi di session untuk langkah berikutnya
        $request->session()->put('reset_email', $user->email);
        $request->session()->put('reset_user_id', $user->id);

        return redirect()->route('password.direct.new')
            ->with('status', 'Email ditemukan! Silakan buat password baru Anda.');
    }

    /**
     * Tampilkan halaman set password baru (langkah 2).
     */
    public function showNewPasswordForm(Request $request): View|RedirectResponse
    {
        // Pastikan user sudah melalui langkah verifikasi email
        if (!$request->session()->has('reset_email')) {
            return redirect()->route('password.direct.request')
                ->withErrors(['email' => 'Silakan masukkan email Anda terlebih dahulu.']);
        }

        return view('auth.password-baru', [
            'email' => $request->session()->get('reset_email'),
        ]);
    }

    /**
     * Simpan password baru user.
     */
    public function storeNewPassword(Request $request): RedirectResponse
    {
        // Pastikan user sudah melalui langkah verifikasi email
        if (!$request->session()->has('reset_user_id')) {
            return redirect()->route('password.direct.request')
                ->withErrors(['email' => 'Sesi telah berakhir. Silakan mulai ulang.']);
        }

        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $userId = $request->session()->get('reset_user_id');
        $user = User::findOrFail($userId);

        // Set password baru
        $user->forceFill([
            'password' => Hash::make($request->password),
        ])->save();

        // Hapus data session reset
        $request->session()->forget(['reset_email', 'reset_user_id']);

        return redirect()->route('login')
            ->with('status', 'Password berhasil diubah! Silakan masuk dengan password baru Anda.');
    }
}
