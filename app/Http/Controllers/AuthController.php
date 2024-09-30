<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginView()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if (!$user) return ResponseHelper::error('User not found.');

            $token = $user->createToken('Access Token')->accessToken;
            if (!$token) return ResponseHelper::error('Unable to generate token.');

            $data = ['user' => $user, 'token' => $token,];
            session($data);
            return ResponseHelper::success('Login successfully', 200, $data);
        }

        return ResponseHelper::error('Unauthorized', 401);
    }

    public function registerView()
    {
        return view('auth.register');
    }

    public function saveUser(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'role' => 'required|string',
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $request->id,
            'phone' => 'required|string|max:15,',
            'password' => $request->id ? 'nullable|min:6' : 'required|min:6',
        ]);

        // If the request has 'id', it's an update; otherwise, it's a create
        if ($request->has('id')) {
            // Update existing user
            $user = User::find($request->id);

            if (!$user) return response()->json(['status' => false, 'message' => 'User not found']);

            // Update the user's data
            $user->update([
                'first_name' => $request->firstName,
                'last_name' => $request->lastName,
                'email' => $request->email,
                'password' => $request->password ? Hash::make($request->password) : $user->password, // Only update password if provided
            ]);

            return response()->json(['status' => true, 'message' => 'User updated successfully']);
        } else {
            // Create a new user
            $user = User::create([
                'first_name' => $request->firstName,
                'last_name' => $request->lastName,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ]);
            $user->assignRole($request->role);
            $user->role = $user->getRoleNames();

            if (!$user) return ResponseHelper::error('Failed to create user.');
            return ResponseHelper::success('User created successfully', 201, $user);
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('loginView')->with('status', 'You have been logged out successfully.');
    }
}
