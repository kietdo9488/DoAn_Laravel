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
}
