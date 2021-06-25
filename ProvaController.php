<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class ProvaController extends Controller{

   public function prova(){
    $nome = session('Id_Cliente');
      $user = User::where('Id_Cliente', $nome)->first();

   if(password_verify('davidepanto', $user->Pass)){
      return view('prova')->with('nome', $user->Id_Cliente);
   }else{
      echo 'non ok';
   }
           
     //  }
   }

}

?>