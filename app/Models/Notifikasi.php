<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "content",
        "is_read",
        "subject",
    ];

    protected $guarded = [
        "id",
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

}
