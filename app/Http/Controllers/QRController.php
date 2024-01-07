<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QRController extends Controller
{
    //
    public function viewScanQR()
    {
        return view('dashboard/user/qr/qr');
    }
}
