<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostAlternative extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function posts_relation()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

    public function posts_alternative_relation()
    {
        return $this->belongsTo(Post::class, 'post_alternate_id', 'id');
    }
}
