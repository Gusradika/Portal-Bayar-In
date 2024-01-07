<?php

namespace App\Models;

use App\Models\Menu;
use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        "transaksi_id",
        "menu_id",
        "harga",
        "jumlah",
        "total",
        "status",
    ];

    protected $guarded = [
        "id"];

    public function Transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
    public function Menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
