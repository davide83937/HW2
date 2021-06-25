<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\V_Component;

class Shop extends Model {

   protected $table = 'CARRELLO';

   protected $fillable = [
       'Id_Inserimento',
       'Cliente',
       'Componente'
   ];

   public function user(){
       return $this->belongsTo("User");
   }

   public function shop(){
       return $this->belongsTo("V_Component");
   }

}



?>