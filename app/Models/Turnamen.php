<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turnamen extends Model
{
    protected $table = 'turnamen';
    protected $guarded = ['id'];


    public function tim()
    {
        return $this->hasMany(Tim::class, 'turnamen_id', 'id');
    }
}

