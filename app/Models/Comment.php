<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function share()
    {
        return $this->belongsTo(Share::class);
    }
    protected $fillable = [
        "user_id",
        "share_id"
    ];
}
