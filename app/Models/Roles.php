<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Roles extends Model
{
    protected $fillable = [
        "name",
    ];

    protected $guarded = [
        "id"
    ];
    use HasFactory;

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
