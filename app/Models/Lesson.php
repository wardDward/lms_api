<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Lesson extends Model
{
    use SoftDeletes;
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
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    protected function videoUrl(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? env('APP_URL').Storage::url($value) : null,
        );
    } 


}
