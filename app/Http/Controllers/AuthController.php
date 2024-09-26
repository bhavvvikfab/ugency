<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginView(){
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('Access Token')->accessToken;
            
            return response()->json([
                'user' => $user,
                'token' => $token
            ], 200);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function register1(){
        $data = [
            'role_id' => 1,
            'username' => 'test',
            'phone' => 1,
            'email' => 1,
            'password' => Hash::make('test')
        ];
        
        if($user = User::create($data)){
            $user->assignRole('client admin');
            $roles = $user->getRoleNames(); 
            return response()->json(['user' => $user,'roles'=>$roles], 200);
        }
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function registerView(){
        return view('auth.register');
    }
}
