<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function users()
    {
        $this->belongsTo(User::class);
    }

    public function messages()
    {
        $this->hasMany(Message::class);
    }
}
