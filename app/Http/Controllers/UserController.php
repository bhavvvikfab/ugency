<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profileView(){
        return view('profile.profile');
    }
    public function settingView(){
        return view('profile.setting');
    }
}
