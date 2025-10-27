<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * عرض صفحة تسجيل الدخول
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * معالجة طلب تسجيل الدخول
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // تحقق من صحة البيانات وتسجيل الدخول
        $request->authenticate();

        // إنشاء جلسة جديدة آمنة
        $request->session()->regenerate();

        // إعادة التوجيه مع رسالة ترحيب
        return redirect()->intended(RouteServiceProvider::HOME)
            ->with('success', 'Welcome back!');
    }

    /**
     * تسجيل الخروج من الجلسة
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        // إبطال الجلسة الحالية
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // إعادة التوجيه للصفحة الرئيسية مع رسالة خروج
        return redirect('/')
            ->with('info', 'You have been logged out successfully.');
    }
}
