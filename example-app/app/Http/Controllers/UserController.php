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

    public function getAllUse(Request $request)
    {
        $userList = UserModel::paginate(5);
        return view('userManager', ['userList' => $userList]);
    }



    //Them nguoi dung
    public function create(array $data)
    {


        $user = new UserModel();
        $user->username = $data['username'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->save();
    }


    //Custom them nguoi dung
    public function customUser(Request $request)
    {
        $data = $request->all();
        $check = $this->create($data);
        return redirect("userManager")->withSuccess('Add cuccessfully');
    }


    //lay id nguoi dung de edit
    public function getUserById(Request $request)
    {
        // dd($request->id);
        $users = UserModel::findOrFail($request->id);
        return view('edituser', ['users' => $users]);
    }


    public function getUpdateUserById(Request $Request)
    {
        $user_name = 'user_name';
        UserModel::where('id', '=', $Request->id)->update(
            [
                'username' => $Request->$user_name,
                'email' => $Request->user_email,
                'password' => $Request->user_password,
            ]
        );

        return redirect('userManager')->withSuccess('Login details are not valid');
    }


    public function delete(Request $Request)
    {
        UserModel::where('id', '=', $Request->id)->delete();
        return redirect("userManager");
    }

    public function addUser()
    {
        return view('addUser');
    }
}
