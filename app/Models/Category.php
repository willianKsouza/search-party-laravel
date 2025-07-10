<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug'
    ];
    protected $hidden = ['pivot'];
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    protected function slug(): Attribute
    {
        return Attribute::make(
            get: fn(String $value) => $value,
            set: fn(String $value) => Str::slug($value),
        );
    }
}
