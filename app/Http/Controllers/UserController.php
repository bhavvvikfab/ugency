<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\City;
use App\Models\Client;
use App\Models\Country;
use App\Models\Language;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function addEditProfile(Request $request){
        $user = Auth::user();
        if(!$user){
            
        }
        // $record = ResponseHelper::addOrEdit(, $data, $id ?? null);
    }

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
        $user = auth()->user();
        $roleId = $user->roles->pluck('id')->first();


        $userData = null;
        switch ($roleId) {
            case 1:
                // $userData = User::all();
                break;
            case 2:
                // $userData = Post::all();
                break;
            case 3:
                // $userData = Post::all();
                break;
            case 4:
                $userData = Client::where('user_id', $user->id)->first() ?? [];
                break;
            default:
                $data = collect();
                break;
        }

        // dd($userData);
        // if ($userData->isEmpty())

        $countries = Country::getAllContries();
        $cities = City::getAllCities();
        $languages = Language::getAllLanguages();
        return view('profile.profile', compact('user', 'userData', 'roleId', 'countries', 'cities', 'languages'));
        // return view('profile.profile',);
    }
    public function settingView()
    {
        return view('profile.setting');
    }
}
