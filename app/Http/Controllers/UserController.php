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
}
