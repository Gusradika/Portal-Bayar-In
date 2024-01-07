<?php

namespace App\Models;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "menu_id",
        "amount",
    ];

    protected $guarded = [
        "id"];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
