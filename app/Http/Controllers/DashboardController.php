<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{


    // view Dashboard
    public function viewDashboard()
    {
        $userTotal = count(User::where('roles_id', 3)->get());
        $tenantTotal = count(User::where('roles_id', 2)->get());
        $seatTotal = count(Seat::get());

        return view('dashboard/dashboard', compact("userTotal", "tenantTotal", "seatTotal"));
    }
    public function viewReport()
    {
        $tenant = User::where('roles_id', 2)->paginate(5);

        $data = [
            'list' => $tenant,
        ];
        return view('dashboard/admin/report/report', ["data" => $data]);
    }
}
