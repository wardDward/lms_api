<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function enrolled()
    {
        return $this->hasMany(User::class, 'user_id');
    }

    public function courseOwner(){
        return $this->belongsTo(User::class);
    }
}
