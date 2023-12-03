<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{


    // view Dashboard
    public function viewDashboard()
    {
        return view('dashboard/dashboard');
    }
    public function viewReport()
    {
        return view('dashboard/admin/report/report');
    }
}
