<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
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
        'role_id' => 'integer',
        'event_user.pivot.user_id' => 'integer',
    ];

    public function event(){
        return $this->belongsToMany(Event::class)->using(EventUser::class);
    }
    public function biodata(){
        return $this->hasOne(Biodata::class);
    }
    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function code(){
        return $this->belongsToMany(Code::class);
    }
    public function data(){
        return $this->hasMany(Data::class);
    }
    public function gambar(){
        return $this->hasMany(Gambar::class);
    }

}
