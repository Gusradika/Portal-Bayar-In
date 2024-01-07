<?php

namespace App\Models;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Label;

class MenuLabel extends Model
{
    use HasFactory;

    protected $fillable = [
        "menu_id",
        "label_id",

    ];

    public function Menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function Label()
    {
        return $this->belongsTo(Label::class);
    }
}
