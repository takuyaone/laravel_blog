<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $casts=[
        'is_open' => 'boolean',
        // 'body'=> 'collection'
    ];

    protected $guarded = [];

    protected static function booted()
    {
        static::deleting(function ($blog) {
            // $blog->comments()->delete();

            $blog->comments->each(function ($comment) {
                $comment->delete();
            });
            // $blog->comments->each->delete();
        });
    }

    // protected $hidden=['user'];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name'=>'(退会者)'
        ]);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->oldest();
    }

    public function scopeOnlyOpen($query)
    {
        return $query->where('is_open', true);
    }
}
