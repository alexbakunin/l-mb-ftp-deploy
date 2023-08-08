<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    public function store(UserRegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        session()->flash('success', 'Регистрация пройдена');
        Auth::login($user);
        if (Auth::user()->is_admin) {
            return redirect()->route('admin.index');
        } else {
            return redirect('/');
        }
    }

    public function loginForm()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $remember = isset($request->remember) ? true : false;
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $remember)) {
            session()->flash('success', 'Вход выполнен');
            if (Auth::user()->is_admin) {
                return redirect()->route('admin.index');
            } else {
                return redirect('/');
            }
        }
        return redirect()->back()->with('error', 'Неправильный логин или пароль');
    }

    public function logout()
    {
        Auth::logout();
        //return redirect()->route('login.create');

        // только для данного конкретного случая )))
        return redirect()->route('home');
    }

}

