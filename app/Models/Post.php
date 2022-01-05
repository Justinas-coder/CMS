<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use Sluggable;
    use HasFactory;

    protected $guarded = [];

    public function sluggable(): array 
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // public function setPostImageAttribute($value){

    //     $this->attributes['post_image'] = $value;

    // }

    public function getPostImageAttribute($value){

        return asset("storage/". $value);

    }
}

// file.jpg
// public/storage/images/file.jpg
// public/images/file.jpg
// http://127.0.0.1:8000/images/AH7wuqHwXh56g1vHu18PfRSlcodkDvaeM1O6zXgC.jpg // reikšmė išsaugomas db.
