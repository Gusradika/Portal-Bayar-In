<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use Illuminate\Http\Request;

class QRController extends Controller
{
    //
    public function viewScanQR()
    {
        $data = Seat::get();
        return view('dashboard/user/qr/qr', ["data" => $data]);
    }
}
