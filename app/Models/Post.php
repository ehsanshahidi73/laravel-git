<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $directory='/images/';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTitleAttribute($value)
    {
        return strtoupper($value);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title']=strtoupper($value);
    }

    public function getPathAttribute($value)
    {
        return $this->directory.$value;
    }
}
