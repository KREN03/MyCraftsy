<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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

    public function works(){
        return $this->hasMany(Work::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function avatar () {
        if ($this->avatar) {
            if(Str::start('https', $this->avatar)) {
                return $this->avatar;
            } else {
                return Storage::url('profile/' . $this->avatar);
            }
        } else {
            return asset('image/user_default.png');
        }
    }
}
