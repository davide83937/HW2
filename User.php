<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'CLIENTE';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Id_Cliente', 
        'Nome', 
        'Cognome',
        'Pass', 
        'Email',
        'Cap', 
        'Via', 
        'Numero'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

public function preferiti(){
    return $this->hasMany("Favorites");
}

public function carrello(){
    return $this->hasMany("Shop");
}

public function cookie() {
    return $this->hasOne("App\Models\Cookie");
    }


}
