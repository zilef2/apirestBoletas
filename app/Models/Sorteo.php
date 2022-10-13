<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sorteo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        'numero',
        'ini',
        'fin',
        'valor_ganable',
        'activa',
    ];

    public function boletas(){
        return $this->hasMany(Boleta::class, 'sorteo_id');
    }
}
