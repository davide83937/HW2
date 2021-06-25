<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\V_Component;
use App\Models\User;
use App\Models\Shop;
use App\Models\Favorites;
use App\Models\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DB;


class HomeController extends Controller{

   public function generaProdotti(){
     $comp = V_Component::all();
     $collection = $comp->toArray();
     return $collection;
   }


   public function generaPreferiti(){
     $user = session('Id_Cliente');
   
     $array = Favorites::
     join('versione_componente', 'preferiti.Nome', '=', 'versione_componente.Nome')
     ->select('preferiti.Username', 'preferiti.Nome', 'versione_componente.Immagine')
     ->where('preferiti.Username', $user)->get();

    return $array;
   }


   public function aggiungiPreferito($nome, $img){
    $user = session('Id_Cliente');
    $fav = Favorites::where('Username', $user)->where('Nome', $nome)->exists();
    $user = session('Id_Cliente');
    if($fav == ''){
        $f = Favorites::create([
          'Username' => $user,
          'Nome' => $nome,
        ]);
        $f->save();
        $array[0] = ['Nome' => $nome, 'Immagine' => $img];
        return $array;
           }else{
               return 1;
           }
   }

   public function eliminaPreferito($nome){
    $user = session('Id_Cliente');
    $fav = Favorites::where('Username', $user)->where('Nome', $nome);
    $fav->delete();
    $favor = Favorites::all()->where('Username', $user);
    $pref = $favor->toArray();
    return $pref;
   }

   public function sessionCheck(){
     $value = session('Id_Cliente');
     if(isset($value)){
       return Session::get('Id_Cliente');
     }else{
       return 0;
     }
   }


   public function cerca($parola){
     $c = V_Component::where('Nome', 'like', $parola."%")->orWhere('Nome_Modello', 'like', $parola."%")->get();
     $comp = $c->toArray();
     return $comp;
   }


   public function accessoCarrello(){
     $nome = session('Id_Cliente');
     if(isset($nome)){
       return view('carrello');
     }
   }

   public function accessoHome(){
    $nome = session('Id_Cliente');
    if(isset($nome)){
      return view('prova')->with('nome', $nome);
    }
  }

  public function accessoAcquisti(){
    $nome = session('Id_Cliente');
    if(isset($nome)){
      return view('acquisti');
    }
  }



  public function tastoCarrello(){
    $nome = session('Id_Cliente');
    if(isset($nome)){
      $nu = Shop::select(DB::raw('COUNT(componente) as Totale'))
      ->where('Cliente', $nome)
      ->first();
    }
    return $nu['Totale'];
  }


  

  public function logout(){
    if(isset($_COOKIE['power_user_cookie']) && isset($_COOKIE['power_id_cookie']) && isset($_COOKIE['power_token'])){
      $value = session('Id_Cliente');
      $c = Cookie::where('Cliente', $value);

      if($c !== NULL)
      {
        $c->delete();
        setcookie("power_user_cookie", "");
        setcookie("power_id_cookie", "");
        setcookie("power_token", "");  
      }
    }
    Session::flush();
    return redirect('log');
  }

}

?>