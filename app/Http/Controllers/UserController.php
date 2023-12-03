<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function viewUserList()
    {

        $user = User::where('roles_id', 3)->paginate(15);

        $data = [
            'list' => $user,
        ];

        return view('dashboard/admin/user-list/viewUserList', ['data' => $data]);
    }
    public function deleteUser(Request $request)
    {
        // dd($request);
        User::where('id', $request->idHapus)->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }

    public function viewUserDetail(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        // return response()->json(["msg", "abc"]);
        return view('dashboard/admin/user-list/detailUser', ['user' => $user])->render();
    }

    public function viewUpdateUser(User $user)
    {
        return view('dashboard/admin/user-list/updateUser', ['user' => $user]);
    }
    public function viewTopUp()
    {
        return view('dashboard/admin/user-list/topUp');
    }

    public function updateUser(Request $request)
    {
        $request->validate([
            "id" => "required",
            "name" => "required",
            "email" => "required",
            "no_telp" => "required",
        ]);
        $data = $request->all();
        $query = [
            "name" => $data['name'],
            "email" => $data['email'],
            "no_telp" => $data['no_telp'],
        ];
        User::where('id', $request->id)->update($query);
        return redirect(route('view-user-list'))->with('success', "User Berhasil di update");
        // dd($data);
    }
}
