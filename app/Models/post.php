<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    //
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comments()
{
    return $this->morphMany(Comment::class, 'commentable');
}

    use HasFactory;

    protected $fillable = ['title', 'description', 'user_id'];
}


