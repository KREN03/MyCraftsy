<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'is_admin',
        'phone_number',
        'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function message()
    {
        return $this->hasMany(Message::class);
    }

    public function admin_forum()
    {
        return $this->hasMany(Forum::class);
    }

    public function anggota_forum()
    {
        return $this->belongsToMany(Forum::class, 'anggota_forums')->withTimestamps()->using(AnggotaForum::class);
    }

    public function like_message()
    {
        return $this->belongsToMany(Message::class, 'like_messages')->withTimestamps()->using(LikeMessage::class);
    }

    public function works()
    {
        return $this->hasMany(Work::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function avatar()
    {
        if ($this->avatar) {
            if (Str::startsWith('https', explode(':', $this->avatar))) {
                return $this->avatar;
            } else {
                return Storage::url('profile/' . $this->avatar);
            }
        }
        return asset('image/user_default.png');
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'parent_id', 'child_id');
    }

    // users that follow this user
    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'child_id', 'parent_id');
    }

    public function isFollowers(User $user)
    {
        $validate = (Follower::where([
            'parent_id' => Auth::user()->id,
            'child_id' => $user->id,
        ])->count() <= 0);
        return $validate;
    }

    public function post_comment()
    {
        return $this->hasMany(PostComment::class);
    }
}
