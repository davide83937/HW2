<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Cookie;
use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\V_Component;
use App\Models\Acquisto;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DB;


class ShopController extends Controller{

   public function caricaCarrello(){
      $nome = session('Id_Cliente');
      
      $array = DB::select(
      "SELECT COUNT(*) as Numero, VC.Nome, VC.Nome_Modello, VC.Prezzo, VC.Immagine, VC.Quantita_Componente, VC.Quantita_Venduta
      FROM CARRELLO C JOIN VERSIONE_COMPONENTE VC ON C.Componente = VC.Id_Versione 
      WHERE Cliente = '$nome'
      GROUP BY VC.Nome");
   
      return $array;
   }


   public function aggiungiCarrello($nome, $nomeModello){
      $cliente = session('Id_Cliente');
      
      $comp = V_Component::where('Nome', $nome)->where('Nome_Modello', $nomeModello)->first();
      $id = $comp['Id_Versione'];
      $quantita = $comp['Quantita_Componente'];
      $quantita_Venduta = $comp['Quantita_venduta'];
      $disponibilita = $quantita - $quantita_Venduta;
      
      $shop = Shop::all()->where('Cliente' , $cliente)->where('Componente', $id);
      $n_carrello = count($shop);

      if($disponibilita == $n_carrello){
         return 1;
      }else{
         Shop::create([
            'Cliente' => $cliente,
            'Componente' => $id
         ]);
         return 0;
      }
   }



   public function eliminaCarrello($nome, $nomeModello){
      $cliente = session('Id_Cliente');
      $comp = V_Component::where('Nome', $nome)->where('Nome_Modello', $nomeModello)->first();
      $id = $comp['Id_Versione'];
      $shop = Shop::limit(1)->where('Cliente', $cliente)->where('Componente', $id);
      $shop->delete();

      $array=Shop::all()->where('Cliente', $cliente)->where('Componente', $id);
      $u = count($array);
      if($u == 0){
         return 0;
      }

      return $u;
   }

   public function eliminaCarrello2($nome, $nomeModello){
      $cliente = session('Id_Cliente');
      $comp = V_Component::where('Nome', $nome)->where('Nome_Modello', $nomeModello)->first();
      $id = $comp['Id_Versione'];
      $shop = Shop::where('Cliente', $cliente)->where('Componente', $id);
      $shop->delete();
      return 2;
   }


   public function aggiornaPrezzo(){
      $cliente = session('Id_Cliente');
      
      $array = Shop::
      join('versione_componente', 'carrello.componente', '=', 'versione_componente.id_versione')
      ->select(DB::raw('ROUND(SUM(versione_componente.prezzo), 2) as Totale'))
      ->where("carrello.cliente", "=", $cliente)
      ->groupBy("carrello.cliente")->first();
      
      return $array['Totale'];
   }

   public function acquista($carta, $via, $numero, $telefono){
      $cliente = session('Id_Cliente');

      if(!preg_match('/^[0-9]{16,20}$/', $carta)){
         return 1;
      }

      if(!preg_match('/^[a-zA-Z ]{1,50}$/', $via)){
         return 1;
      }

      if(!preg_match('/^[0-9]{1,10}$/', $numero)){
         return 1;
      }

      if(!preg_match('/^[0-9]{1,10}$/', $telefono)){
         return 1;
      }

      

      $array = Shop::where('Cliente', $cliente)->select('Cliente', 'Componente')->get();
      $n = count($array);
      $data = date('Y-m-d');

      for($u = 0; $u < $n; $u++){
         $componente = $array[$u]['Componente'];
         Acquisto::create([
            'Cliente' => $cliente,
            'Componente' => $componente,
            'Data_' => $data
         ]);
      }
     
      return 0;
   }

}

?>