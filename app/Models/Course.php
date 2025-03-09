<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public function enrolledUsers()
    {
        return $this->belongsTo(User::class, 'course_user', 'course_id', 'user_id');
    }

    public function courseOwner()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'course_id');
    }
}
