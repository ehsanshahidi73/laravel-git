<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeGroup extends Model
{
    protected $table = "attributesgroup";

    public function attributesValue()
    {
        return $this->hasMany(AttributeValue::class);
    }

    public function categories()
    {
        return $this->belongsToMany(AttributeGroup::class,'attributegroup_category','attributeGroup_id','category_id');
    }
}
