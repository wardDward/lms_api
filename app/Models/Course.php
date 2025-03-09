<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];
    public function enrolled()
    {
        return $this->hasMany(User::class, 'user_id');
    }

    public function courseOwner(){
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function lessons(){
        return $this->hasMany(Lesson::class, 'course_id');
    }
}
