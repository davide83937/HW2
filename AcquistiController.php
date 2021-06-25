<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Cookie;
use App\Models\Acquisto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AcquistiController extends Controller{

    public function caricaAcquisti(){

    $nome = session('Id_Cliente');
    $query = Acquisto::
    join('versione_componente', 'acquisto.componente', '=', 'versione_componente.id_versione')
    ->where("acquisto.cliente", "=", $nome)
    ->orderBy("acquisto.Data_", 'DESC')->get();
    
    return $query;
     
    }
    


}

?>