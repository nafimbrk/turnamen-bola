<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tim extends Model
{
    protected $table = 'tim';
    protected $guarded = ['id'];

    public function turnamen()
    {
        return $this->belongsTo(Turnamen::class, 'turnamen_id', 'id');
    }
}

