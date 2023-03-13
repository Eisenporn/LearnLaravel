<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        // dd($request->all());
        $validator = \Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:32|same:re_password',
            'username'=>'required|min:2|max:64|unique:users,username',
            'photo'=>'nullable|mimes:jpg,jpeg,png'
        ], [
            'email' => 'Пользователь с такой почтой уже существует'
        ],
        [
            'username'=>'Имя пользователя'
        ]);

        if ($validator->fails()){
            return back()->withErrors($validator->errors())->withInput($request->all());
        }

        $validated = $validator->validate();

        $validated['password']=Hash::make($validated['password']);

        if($request->file('photo')){
            $validated['image_path']=$request->file('photo')->store('public/images');
        }

        $user = User::query()->create($validated);

        Auth::login($user);

        return redirect()->route('home');
    }

    public function signin(SignInRequest $request) // Авторизация
    {
        $validated = $request->validated();
        if (!Auth::attempt($validated)){
            return back()->withErrors(['Данные введены неправильно']);
        }
        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
