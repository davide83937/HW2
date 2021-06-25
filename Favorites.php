<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorites extends Model {

   protected $table = 'PREFERITI';

   protected $fillable = [
       'Username',
       'Nome'
   ];

   public function user(){
       return $this->belongsTo("App\Models\User");
   }

   public function version() {
    return $this->belongsTo("V_Component");
   }

}



?>