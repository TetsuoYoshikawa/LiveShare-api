<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Share_tag extends Model
{
    use HasFactory;
    public function share()
    {
        return $this->belongsTo(Share::class);
    }
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
