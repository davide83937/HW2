<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Cookie extends Model{

    protected $table = 'COOKIES';

    protected $fillable = [
        'Cliente',
        'Id',
        'Has',
        'Tempo'
    ];

    public function user() {
        return $this->belongsTo("App\Models\User");
        }

}

?>