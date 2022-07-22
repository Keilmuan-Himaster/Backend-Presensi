<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    protected $cast = [
        'status' => 'integer',
        'structure_id' => 'integer',

    ];
    public function event(){
        return $this->hasMany(Event::class);
    }
}
