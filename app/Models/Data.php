<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;
    protected $fillable = [
        'user',
        'time',
        'code_id',
        'description',
        'status',
        'user_id'
    ];

    public function code(){
        return $this->belongsTo(Code::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
