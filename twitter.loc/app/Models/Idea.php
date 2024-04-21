<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Idea extends Model
{
    use HasFactory;
    protected $with = [
        'user:id,name,image',
        'comments.user:id,name,image'
    ];

    protected $withCount = [
        'likes'
    ];

    protected $fillable = [
        'user_id',
        'content',
        'like',
    ];

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'idea_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function likes(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'idea_like')->withTimestamps();
    }

    public function scopeSearch(Builder $query, string $search = ''): void
    {
        $query->where('content', 'like', '%' . $search . '%');
    }
}
