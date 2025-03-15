<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;
    use Sluggable; // Make sure this trait is used

    protected $fillable = ['title', 'description', 'user_id', 'slug'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function setImageAttribute($value)
    {
       
        if ($this->attributes['image'] ?? false) {
            Storage::delete($this->attributes['image']);
        }

  
        $this->attributes['image'] = $value;
    }

    
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($post) {
            if ($post->image) {
                Storage::delete($post->image);
            }
        });
    }
}