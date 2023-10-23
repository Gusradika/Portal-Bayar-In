<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    //
    public function viewTenantList()
    {
        $tenant = User::where('roles_id', 2)->paginate(15);

        $data = [
            'list' => $tenant,
        ];

        return view('dashboard/admin/tenant-list/viewTenantList', ['data' => $data]);
    }
}
