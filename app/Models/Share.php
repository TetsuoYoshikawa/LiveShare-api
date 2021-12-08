<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    use HasFactory;
    protected $fillable = [
        "share",
        "user_id",
        "artist",
        "date",
        "area_id"
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
    public function wants()
    {
        return $this->hasMany(Want::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function tags()
    {
        return $this->belongsTo(Tag::class);
    }
}
