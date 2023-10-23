<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{

    protected $fillable = [
        "seat_code",
        "qr",
    ];

    protected $guarded = [
        "id"
    ];

    use HasFactory;
}
