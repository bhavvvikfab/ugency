<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function changePassword(Request $request)
    {  
        $validate = $request->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required|min:6'
        ]);
        $user = auth()->user();
        if (!Hash::check($request->currentPassword, $user->password))  return ResponseHelper::error('Invalid credentials', 401);

        $user->password = Hash::make($request->newPassword);
        if (!$user->save()) return ResponseHelper::error('Failed to change password');
        return ResponseHelper::success('Password changed successfully.');
    }
    public function profileView()
    {
        return view('profile.profile');
    }
    public function settingView()
    {
        return view('profile.setting');
    }
}
