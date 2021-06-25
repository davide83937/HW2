<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Acquisto extends Model{

    protected $table = 'ACQUISTO';

    protected $fillable = [
        'Cliente',
        'Componente',
        'Id_Acquisto',
        'Data_'
    ];

}

?>