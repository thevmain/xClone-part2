<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Community extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "slug",
        "description",
        "avatar",
        "banner",
        "creator_id",
        "is_private",
        "members_count"
    ];

    protected $casts = [
        "is_private" => "boolean",
        "members_count" => "integer"
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($community) {
            if(empty($community->slug)) {
                $community->slug = Str::slug($community->name);
            }
        });
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, "creator_id");
    }

}
