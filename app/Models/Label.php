<?php

namespace App\Models;

use App\Models\MenuLabel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;

    protected $fillable = [
        "name"];

    protected $guarded = ["id"];

    public function MenuLabel()
    {
        return $this->hasMany(MenuLabel::class);
    }
}
