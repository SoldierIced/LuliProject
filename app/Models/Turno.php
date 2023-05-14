<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    use HasFactory;

    protected $fillable = [
        'horario',
        'dia',
        'user_id',
        'estado',
        'comentario',
        'servicio_id',
    ];
    public $timestamps = false;

    /**
     * Get the user associated with the Turno
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }


    static public function testing(){
        dd(12333);
    }
}
