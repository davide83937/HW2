<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class V_Component extends Model {

   protected $table = 'VERSIONE_COMPONENTE';

   protected $fillable = [
       'Id_Versione',
       'Nome',
       'Nome_Modello',
       'Prezzo',
       'Descrizione',
       'Immagine',
       'Quantita_Componente',
       'Quantita_Venduta'
   ];

   public function version() {
    return $this->belongsTo("App\Models\Component");
    }

   public function prefer() {
    return $this->hasMany('App\Models\Favorite');
   }

   public function shop() {
    return $this->hasMany('App\Models\Shop');
   }

}

?>

