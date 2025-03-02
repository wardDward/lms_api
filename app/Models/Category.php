<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function courses(){
        return $this->hasMany(Course::class, 'category_id');
    }
}
