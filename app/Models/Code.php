<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'status',
        'event_id',
        'code',
        'start',
        'end',
        'place',
        'link',
        'desc',
    ];

    protected $casts = [
        'status' => 'integer',
        'event_id' => 'integer',
    ];

    public function event(){
        return $this->belongsTo(Event::class);
    }
    public function data(){
        return $this->hasMany(Data::class);
    }

    public function user(){
        return $this->belongsToMany(User::class);
    }
}
