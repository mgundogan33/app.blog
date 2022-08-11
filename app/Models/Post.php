<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];
    // protected $fillable=['user_id','category_id','author','author_email','post_title','post_summary','post_content'];

    public function category()
    {
     return   $this->belongsTo(Category::class, 'category_id');
    }
    public function comments()
    {
     return   $this->hasMany(Comment::class, 'post_id');
    }
}
