<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WordPair extends Model
{
    use HasFactory;

    protected $fillable = ['english', 'serbian', 'image'];

    public function getImageUrlAttribute()
    {
        return asset('/' . $this->image);
    }
}
