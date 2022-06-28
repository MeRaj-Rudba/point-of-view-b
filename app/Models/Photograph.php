<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Jenssegers\Mongodb\Eloquent\Model;

class Photograph extends Model
{
    protected $connection = 'mongodb';
    protected $fillable = ['title', 'date', 'image', 'device', 'location', 'photographer', 'likes', 'categories', 'description'];
}
