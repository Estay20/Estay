<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Показать форму регистрации
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Обработка регистрации
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ], [
            'email.unique' => 'Этот email уже зарегистрирован. Попробуйте другой.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Автоматический вход после регистрации
        Auth::login($user);

        return redirect()->route('profile')->with('success', 'Регистрация успешна! Добро пожаловать!');
    }

    // Показать форму входа
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Обработка входа
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Предотвращение сессионных атак
            $request->session()->regenerate();

            return redirect()->route('profile')->with('success', 'Вы успешно вошли в систему.');
        }

        return back()->withErrors(['email' => 'Неверный email или пароль.'])->withInput($request->only('email'));
    }

    public function profile()
    {
        return view('auth.profile', ['user' => Auth::user()]);
    }

    // Обработка выхода
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.form')->with('success', 'Вы успешно вышли из системы.');
    }
}
