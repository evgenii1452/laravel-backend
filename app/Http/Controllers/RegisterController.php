<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function save(Request $request) {
        if (Auth::check()) {
            return redirect(route('user.private'));
        }

        $validateFields = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (User::where('email', $validateFields['email'])->exists()) {
            return redirect(route('user.registration'))->withErrors([
                'email' => 'Такой пользователь уже зарегистрирован'
            ]);
        }

        $user = User::create($validateFields);
        if ($user) {
            auth()->login($user);
            return redirect(route('user.private'));
        } else {
            return redirect(route('user.registration'))->withErrors([
                'formError' => 'Произошла ошибка при сохранении пользователя'
            ]);
        }
    }
}
