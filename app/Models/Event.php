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
    public function code(){
        return $this->hasMany(Code::class);
    }
}
