<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profile')->with('user', $user);
    }

    public function update(ValidProfile $request)
    {
        $user = Auth::user();
        $errors = [];

        if (Hash::check($request->post('password_current'), $user->password)) {
            $user->fill([
                'name' => $request->post('name'),
                'email' => $request->post('email'),
                'password' => Hash::make($request->post('password')),
            ]);
            $user->save();
            return redirect()->route('profile.show')->with('success', 'Профиль успешно изменен!');

        } else {
            $errors['password_current'][] = 'Неверно введен текущий пароль';
            return redirect()->route('profile.show')->withErrors($errors);
        }

    }

}
