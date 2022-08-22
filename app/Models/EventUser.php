<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EventUser extends Pivot
{
    use HasFactory;
    protected $table = 'event_user';
    protected $fillable = [
        'user_id','event_id'
    ];
    protected $cast = [
        'event_user.pivot.event_id' => 'integer',
        'event_user.pivot.user_id' => 'integer',
    ];
}
