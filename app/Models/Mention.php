<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mention extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'post_id',
        'user_id',
    ];

    // Post relationship
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    // User relationship (yang di-mention)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Extract mentions from text
    public static function extractMentions(string $text): array
    {
        preg_match_all('/@(\w+)/u', $text, $matches);
        return array_unique($matches[1]);
    }

    // Find users from mentions in text
    public static function findUsersFromText(string $text): array
    {
        $usernames = self::extractMentions($text);
        
        return User::whereIn('username', $usernames)->get()->toArray();
    }
}
