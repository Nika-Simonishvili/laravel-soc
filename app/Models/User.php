<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\FriendStatusEnum;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use mysql_xdevapi\Collection;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function friendTo()
    {
        return $this->belongsToMany(User::class, 'user_friends', 'friendTo_id', 'friendFrom_id')->withPivot('status');
    }

    public function pendingFriendsTo()
    {
        return $this->friendTo()->wherePivot('status', FriendStatusEnum::Pending);
    }

    public function acceptedFriendsTo()
    {
        return $this->friendTo()->wherePivot('status', FriendStatusEnum::Accepted);
    }


    public function friendFrom()
    {
        return $this->belongsToMany(User::class, 'user_friends', 'friendFrom_id', 'friendTo_id')->withPivot('status');
    }

    public function pendingFriendsFrom()
    {
        return $this->friendFrom()->wherePivot('status', FriendStatusEnum::Pending);
    }

    public function acceptedFriendsFrom()
    {
        return $this->friendFrom()->wherePivot('status', FriendStatusEnum::Accepted);
    }

    public function friends()
    {
        return $this->acceptedFriendsFrom->merge($this->acceptedFriendsTo);
    }

    public function hasFriend($user) : bool
    {
        return $this->friends()->contains($user);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
