<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAllUser(Request $request)
    {
        return UserModel::all();
    }

    public function goToLogin(Request $request)
    {


        return view('auth.login');

    }
    public function goToRegister(Request $request)
    {


        return view('auth.registration');

    }
}
