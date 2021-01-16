<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    /**
     * @var mixed
     */

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
