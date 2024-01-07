<?php

namespace App\Models;

use App\Models\Seat;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "name",
        "seat_id",
        "status",
    ];

    protected $guarded = [
        "id",
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Seat()
    {
        return $this->belongsTo(Seat::class);
    }
}
