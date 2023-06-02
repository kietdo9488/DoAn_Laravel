<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public static function getAllUser()
    {
        return UserModel::all();
    }

    public static function getAllUser2()
    {
        $users = UserModel::all();

        return view('main', ['users'=>$users]);
    }

    public function getAllUse(Request $request)
    {
        $userList = UserModel::paginate(5);
        return view('userManager', ['userList' => $userList]);
    }



    //Them nguoi dung
    public function create(array $data)
    {
        // dd($data);
        $user = new UserModel();
        $user->user_name = $data['username'];
        $user->save();
    }


    //Custom them nguoi dung
    public function customUser(Request $request)
    {
        $data = $request->all();
        $check = $this->create($data);
        return redirect("manageuser")->withSuccess('Add cuccessfully');
    }


    //lay id nguoi dung de edit
    public function getUserById(Request $request) {
        // dd($request->id);
        $users = UserModel::findOrFail($request->id);
        return view('edituser')->with('users', $users);
    }


    public function getUpdateUserById(Request $Request) {
        UserModel::where('id', '=', $Request->id)->update(
                [
                    'username' => $Request->username,
                    'password' => $Request->password,
                ]
            );

        return redirect('manageruser')->withSuccess('Login details are not valid');
    }

    public function delete(Request $Request) {
        UserModel::where('id', '=', $Request->id)->delete();
        return redirect("manageruser");
    }

    public function addCategory()
    {
        return view('adduser');
    }
}
