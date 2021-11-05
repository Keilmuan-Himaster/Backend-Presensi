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
    ];

    public function event(){
        return $this->belongsTo(Event::class);
    }
}
