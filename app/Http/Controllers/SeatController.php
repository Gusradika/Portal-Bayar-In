<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Seat;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    //

    public function viewSeatList()
    {

        $seat = Seat::paginate(15);

        $data = [
            "list" => $seat,
        ];

        return view('dashboard/admin/seat-list/viewSeatList', ['data' => $data]);
    }
    public function viewCreateQR()
    {
        return view('dashboard/admin/qr/create-qr');
    }
    public function saveQRCode(Request $request)
    {
        // $base64Data = $request->input('qr');

        // Decode Base64 menjadi data biner
        try {
            $data = [
                "seat_code" => $request->name,
                "qr" => $request->qr,
            ];
            Seat::create($data);
            // $dest = public_path('/storage/user-images'); // Destinasi tempat pengguna akan disimpan
            // file_put_contents($dest, $binaryData);
            return response()->json(['success' => 1]);
        } catch (Exception $e) {
            return response()->json(['success' => 0]);
        }
        // $binaryData = base64_decode($base64Data);

    }
}
