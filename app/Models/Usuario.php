<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuario'; 
    protected $primaryKey = 'id';   

    protected $fillable = [
        'nome',
        'email',
        'senha',
        'foto',
    ];

    protected $hidden = [
        'senha',
    ];

    // Laravel usa 'password' por padrão — ajustamos para 'senha'
    public function getAuthPassword()
    {
        return $this->senha;
    }
}
