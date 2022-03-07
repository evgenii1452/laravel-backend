<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request) {
        $formFields = $request->only(['email', 'password']);
        if (Auth::attempt($formFields)) {
            return redirect()->intended(route('user.private'));
        } else {
            return redirect(route('user.login'))->withErrors([
                'formError' => 'Пользователь с такими данными не найден'
            ]);
        }
    }
}
