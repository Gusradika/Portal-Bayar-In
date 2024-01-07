<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Category;
use App\Models\DetailTransaksi;
use App\Models\GambarMenu;
use App\Models\MenuLabel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "category_id",
        "harga",
        "deskripsi",
        "excerpt",
        "user_id",
    ];

    protected $guarded = [
        "id"];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
    public function GambarMenu()
    {
        return $this->hasMany(GambarMenu::class);
    }
    public function MenuLabel()
    {
        return $this->hasMany(MenuLabel::class);
    }
    public function DetailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class);
    }
}
