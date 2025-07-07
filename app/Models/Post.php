<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'body',
        'slug',
        'user_id'
    ];

    public function users()
    {
       return $this->belongsTo(User::class);
    }

    public function messages()
    {
       return $this->hasMany(Message::class);
    }

    public function categories()
    {
       return $this->belongsToMany(Category::class, 'post_categories');
    }

    protected function slug(): Attribute
    {
        return Attribute::make(
            get: fn(String $value) => $value,
            set: fn(String $value) => Str::slug($value),
        );
    }
}
