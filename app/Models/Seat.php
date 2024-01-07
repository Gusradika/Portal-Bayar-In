<?php

namespace App\Models;

use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function Transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
