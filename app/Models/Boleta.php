<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boleta extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        'id',
        'codigo',
        'costo',
        'ganadora',
        'user_id',
        'sorteo_id',
        'cuando_se_vendio',
    ];
    public function usuario(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function sorteo(){
        return $this->hasOne(Sorteo::class, 'id', 'sorteo_id');
    }

}
