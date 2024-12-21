<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeVideo extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'img', 'rgb'];

    public function video()
    {
        return $this->belongsTo(Video::class, 'title', 'title');  // Link by title
    }
}
