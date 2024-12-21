<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'video'];

    public function homeVideo()
    {
        return $this->belongsTo(HomeVideo::class, 'title', 'title');  // Link by title
    }
}
