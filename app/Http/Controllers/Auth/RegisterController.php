<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:16|unique:users',
            'email' => 'required|email|max:64|unique:users',
            'password' => 'required|min:6|max:16|confirmed',
        ], [
            'name.required' => '请输入昵称',
            'name.max' => '昵称长度不能超过16个字符',
            'name.unique' => '昵称已经存在',
            'email.required'=> '请输入邮箱',
            'email.email' => '请输入正确的邮箱',
            'email.max' => '邮箱长度不能超过64个字符',
            'email.unique' => '邮箱已经存在',
            'password.required' => '请输入密码',
            'password.min' => '密码长度不能低于6个字符',
            'password.max' => '密码长度不能超过16个字符',
            'password.confirmed' => '两次输入密码不一致',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
