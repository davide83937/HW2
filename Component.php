<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model {

   protected $table = 'COMPONENTE';

   protected $fillable = [
       'Nome',
       'Produttore',
       'Tipologia',
       'Anno_Uscita'
   ];


   public function version() {
    return $this->hasMany('App\Models\V_Component');
   }
}

  ?>