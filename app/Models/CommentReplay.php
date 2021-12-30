<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReplay extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment_id',
        'author',
        'email',
        'body',
        'is_active'

    ];

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
