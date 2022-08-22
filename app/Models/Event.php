<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
        'structure_id',
    ];

    public function structure(){
        return $this->belongsTo(Structure::class);
    }

    public function code(){
        return $this->hasMany(Code::class);
    }

    public function user(){
        return $this->belongsToMany(User::class)->using(EventUser::class);
    }
    protected $casts = [
        'email_verified_at' => 'datetime',
        'structure_id' => 'integer',
        'status' => 'integer',
    ];
}
