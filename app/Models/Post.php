<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "content",
        "parent_id",
        "reply_permission",
        "views_count"
    ];

    protected $casts = [
        "views_count" => "integer"
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function media(): HasMany
    {
        return $this->hasMany(Media::class);
    }

    public function hashtags(): BelongsToMany
    {
        return $this->belongsToMany(Hashtag::class, "post_hashtags");
    }

    public function mentions(): HasMany
    {
        return $this->hasMany(Mention::class);
    }

    public function parent():BelongsTo
    {
        return $this->belongsTo(Post::class, "parent_id");
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function likedBy(): BelongsToMany
    {
        return $this->belongsToMany(User::class, "likes")->withTimestamps();
    }

    public function likesCount()
    {
        return $this->likes()->count();
    }
    
}
