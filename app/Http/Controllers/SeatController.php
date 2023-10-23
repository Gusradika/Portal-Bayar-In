<?php

namespace App\Http\Controllers;

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
}
