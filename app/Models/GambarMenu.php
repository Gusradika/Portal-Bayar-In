<?php

namespace App\Models;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        "menu_id",
        "file_path",
    ];

    protected $guarded = [
        "id",
    ];

    public function Menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
