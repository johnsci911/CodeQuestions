<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
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

    public function ideas()
    {
        return $this->hasMany(Idea::class);
    }

    public function getAvatar()
    {
        $firstChacater = $this->email[0];

        $integerToUse = is_numeric($firstChacater)
            ? ord(strtolower($firstChacater)) - 21
            : ord(strtolower($firstChacater)) - 96;

        return
            'https://www.gravatar.com/avatar/'
            .md5($this->email)
            .'?s200'
            .'&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-'
            .$integerToUse
            .'.png';
    }

    public function votes()
    {
        return $this->belongsToMany(Idea::class, 'votes');
    }

    public function isAdmin()
    {
        return in_array($this->email, [
            'johnguitarizta@gmail.com'
        ]);
    }
}
