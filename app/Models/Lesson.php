<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'title',
        'course_id',
        'slug',
        'description',
        'video_url',
        'attachment',
        'order',
        'is_published'
        
    ];
    public function course(){
        return $this->belongsTo(Course::class, 'course_id');
    }
}
