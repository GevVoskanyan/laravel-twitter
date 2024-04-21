<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'image',
        'bio',
        'email',
        'password',
        'is_admin',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        // 'password' => 'hashed',
    ];

    public function ideas(): HasMany
    {
        return $this->hasMany(Idea::class)->latest();
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function followings(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'follower_user', 'follower_id', 'user_id')->withTimestamps();
    }

    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'follower_user', 'user_id', 'follower_id')->withTimestamps();
    }

    public function follows(User $user)
    {
        return $this->followings()->where('user_id', $user->id)->exists();
    }

    public function getImageUrl()
    {
        if ($this->image) {
            return url('storage/' . $this->image);
        } else {
            return "https://api.dicebear.com/6.x/fun-emoji/svg?seed={$this->name}";
        }
    }
    public function likes(): BelongsToMany
    {
        return $this->belongsToMany(Idea::class, 'idea_like')->withTimestamps();
    }

    public function likesIdea(Idea $idea)
    {
        return $this->likes()->where('idea_id', $idea->id)->exists();
    }
}
