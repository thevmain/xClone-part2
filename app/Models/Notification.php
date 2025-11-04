<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notification extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'actor_id',
        'type',
        'post_id',
        'content',
        'is_read',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_read' => 'boolean',
        ];
    }

    // User (penerima notifikasi)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Actor (yang melakukan aksi)
    public function actor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'actor_id');
    }

    // Post terkait (jika ada)
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    // Scopes
    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    public function scopeRead($query)
    {
        return $query->where('is_read', true);
    }

    public function scopeOfType($query, string $type)
    {
        return $query->where('type', $type);
    }

    // Helper methods
    public function markAsRead(): void
    {
        $this->update(['is_read' => true]);
    }

    public function markAsUnread(): void
    {
        $this->update(['is_read' => false]);
    }

    public function getMessage(): string
    {
        return match($this->type) {
            'like' => "{$this->actor->name} liked your post",
            'repost' => "{$this->actor->name} reposted your post",
            'reply' => "{$this->actor->name} replied to your post",
            'follow' => "{$this->actor->name} started following you",
            'mention' => "{$this->actor->name} mentioned you in a post",
            default => "You have a new notification",
        };
    }
}
