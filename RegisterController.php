<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class RegisterController extends Controller{

      public function verificaUser($user){
        $username = User::where('Id_Cliente', $user)->first();
        if($username !== NULL){
          return 1;
        }else{
          return 0;
        }
      }

      public function verificaEmail($email){
          $em = User::where('Email', $email)->first();
          if($em !== NULL){
            return 1;
          }else{
            return 0;
          }
      }


      public function registrazioneCliente(){
          $errori = array();
          

          if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', request('username'))){
            $errori[] = "Username non valido";
          }else{
            $user = User::where('Id_Cliente', request('username'))->first();
            if($user !== NULL){
              $errori[] = 'Username già utilizzato';
            }
          }

          if (strlen(request('password')) < 8) {
            $errori[] = "Caratteri password insufficienti";
           }

           if(request('password') != request('cpassword')){
            $errori[] = "Le password inserite non sono uguali";
           }

           if(!filter_var(request('email'), FILTER_VALIDATE_EMAIL)){
             $errori[] = 'Email non valida';
           }else{
             $em = User::where('Email', request('email'))->first();
             if($em !== NULL){
               $errori[] = 'Email già utilizzata';
             }
           }

           if(count($errori) === 0){
              
            $pass = Hash::make(request('password'), [
              'rounds' => 12,
             ]);

              User::create([
                'Id_Cliente' => request('username'),
                'Nome' => request('nome'),
                'Cognome' => request('cognome'),
                'Pass' => $pass,
                'Email' => request('email'),
                'Cap' => request('cap'),
                'Via' => request('via'),
                'Numero' => request('numero'),
                
              ]);

              $reg = 'Registrazione avvenuta con successo!';
              return view('loginn')->with('reg', $reg);
              
           }else{
             $er = $errori[0];
             return view('loginn')->with('er', $er);
           }
      }
}

?>