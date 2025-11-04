<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Media extends Model
{
     use HasFactory;

    protected $fillable = [
        "post_id",
        "type",
        "url",
        "thumbnail_url",
        "width",
        "height",
        "duration",
        "size",
        "alt_text",
        "order"
    ];

    protected $casts = [
        "width" => "integer",
        "height" => "integer",
        "duration" => "integer",
        "size" => "integer",
        "order" => "integer",
    ];

    public function posts(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function isImage(): bool
    {
        return $this->type ="image";
    }

    public function isVideo(): bool
    {
        return $this->type ="video";
    }

    public function isGif(): bool
    {
        return $this->type ="gif";
    }

    public function getFormattedSizeAttribute(): string
    {
        $bytes = $this->size;
        
        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        } else {
            return $bytes . ' bytes';
        }
    }

    public function getFormattedDurationAttribute(): string
    {
        if (!$this->duration) {
            return '';
        }

        $minutes = floor($this->duration / 60);
        $seconds = $this->duration % 60;

        return sprintf('%d:%02d', $minutes, $seconds);
    }
}
