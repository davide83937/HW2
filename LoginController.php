<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller{

   public function login(){


       if(session('Id_Cliente'))
       {

           $nome = session('Id_Cliente');
           return view("prova")->with('nome', $nome);

       }
       else if(isset($_COOKIE['power_user_cookie']) && isset($_COOKIE['power_id_cookie']) && isset($_COOKIE['power_token']))
       {
           
            $conn = mysqli_connect('127.0.0.1', 'root', '', 'esame', '3328');
            $cookieid = mysqli_real_escape_string($conn, $_COOKIE['power_id_cookie']);
            $userid = mysqli_real_escape_string($conn, $_COOKIE['power_user_cookie']);

            $cookie = Cookie::where('Id', $cookieid)->where('Cliente', $userid)->first();

            if($cookie)
            {
                if(time() > $cookie->Tempo)
                {
                    $cook = Cookie::where('Id', $cookieid)->first();
                    $cook->delete();
                    return redirect('log');
                   
                }
                else if(password_verify($_COOKIE['power_token'], $cook->Has))
                {
                    $nome = $userid;
                    Session::put('Id_Cliente', $nome);
                    mysqli_close($conn);
                    return view('prova')->with('nome', $nome);
                }
            }

       }else{
        return view('loginn');
       }
   }



   public function checkLogin(){
      $user = User::where('Id_Cliente', request('username'))->first();

      if($user !== NULL && password_verify(request('password'), $user->Pass)){
        if (session('errore') !== null){
            Session::forget('errore');
        }

          if(request('check') !== NULL && request('check') == 'Si') 
        {
          $conn = mysqli_connect('127.0.0.1', 'root', '', 'esame', '3328');
          $token = random_bytes(12);
          $hash = password_hash($token, PASSWORD_BCRYPT);
          $expires = strtotime("+7 day");
          $id = mysqli_insert_id($conn);

          Cookie::create([
            'Cliente' => request('username'),
            'Id' => $id,
            'Has' => $hash,
            'Tempo' => $expires,
           ]);

          setcookie("power_user_cookie", request('username'), $expires);
          setcookie("power_id_cookie", $id, $expires);
          setcookie("power_token", $token, $expires);
    
          Session::put('Id_Cliente', $user->Id_Cliente);

        }

         Session::put('Id_Cliente', $user->Id_Cliente);          
          $nome = session('Id_Cliente');
          return view('prova')->with('nome', $nome);
      }else{
          Session::put('errore', 'Username o password errati');
          $errore = session('errore');
          return view('loginn')->with('errore', $errore);
      }
    }

}

?>