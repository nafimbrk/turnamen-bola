<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matchh extends Model
{
    use HasFactory;

    protected $table = 'matches';
    protected $fillable = [
        'turnamen_id',
        'tim_a_id',
        'tim_b_id',
        'pemenang_id',
        'jenis',
        'waktu'
    ];

    public function turnamen()
    {
        return $this->belongsTo(Turnamen::class);
    }

    public function timA()
    {
        return $this->belongsTo(Tim::class, 'tim_a_id');
    }

    public function timB()
    {
        return $this->belongsTo(Tim::class, 'tim_b_id');
    }

    public function pemenang()
    {
        return $this->belongsTo(Tim::class, 'pemenang_id');
    }
}

