<?php

{{ URL::asset('form_loginn.js'); }}
{{ URL::asset('form_login.css'); }} 

?>

<html>
    <head>
        <link rel="stylesheet" href="form_login.css?ts=<?=time()?>&quot"/>
        <script src="form_loginnn.js" defer></script>
        <link href='https://fonts.googleapis.com/css?family=Amethysta' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Caesar+Dressing' rel='stylesheet' type='text/css'>

    </head>

<body>
    <div id = 'pagina'>
        
        <div class = 'anima' id = 'contenuti'>
               <h1>Costruisci il tuo pc perfetto</h1>
               <img src = 'pc.png'>
            
        </div>
        <div id = "login">
            <div id = 'login2'>
            <div id = 'power'><h1>    <span class="fire">P</span>     <span class="burn">o</span>      <span class="burn">w</span>     <span class="fire">e</span> <span class="burn">r </br></span>   <span class="fire">S</span> <span class="burn">h</span> <span class="fire">o</span> <span class="burn">p</span> </h1></div>
            
            @if(isset($er))
               <span> {{$er}} </span>
            @endif
            
            @if(isset($reg))
               <span> {{$reg}} </span>
            @endif

           <div id='acc_reg'>
            <span class = 'ts acre' id = 'ac'>Accedi</span>
            <span class = 'ts' id = 're'>Registrati</span>
           </div>

            <form  id="accedi" action ="{{ route('home') }}" method="POST">
            @csrf
                <div class="nom_cog">
               
                    <div id = 'user'>
                    @if(isset($errore))
                           <span>{{$errore}}</span>
                      @endif
                        <input type="text" name="username" placeholder = "Username" >
                    </div>

                    <div id = 'pass'>
                        
                       <input type="password" name="password" placeholder = "Password"  >
                    </div>
                   
               </div>
               <div id = 'ricorda'> 
                  <input type = 'checkbox' name = 'check' value = 'Si'>
                   <label for = 'ricorda'> Ricorda l'accesso </label>
            </div>
               <input type="submit" value="Accedi">
            </form>

            
            <form class = 'hidden' id='registrati' action = "{{ route('registra') }}" method = "POST">
            @csrf    
                <div class="nom_cog">

                    <div id = 'nome'>
                        <input type="text" name="nome"  placeholder = "Nome">
                    </div>

                    <div id = 'cognome'>
                        <input type="text" name="cognome"  placeholder = "Cognome">
                    </div>

                </div>

                <div id = 'dati'>
                
                    <div id = 'username'> 
                        <span class="hidden2">Username non valido</span>
                        <input type="text" name="username" placeholder = "Username">
                    </div>

                    <div id = 'email'>
                        <span class="hidden2">Email non valida</span>
                        <input type="email" name="email" placeholder = "Email">
                    </div>

                    <div id = 'password'>
                        <span class="hidden2">Password non valida</span>
                        <input type="password" name="password"  placeholder = "Password">
                    </div>

                    <div id = 'c_password'>
                        <span class="hidden2">Password non uguale</span>
                        <input type="password" name="cpassword" placeholder = "Conferma Password">
                    </div>

                    <div id = 'cap'>
                        <input type="text" name="cap"  placeholder = "Cap">
                    </div>

                    <div id = 'via'>
                        <input type="text" name="via"  placeholder = "Via">
                    </div>

                    <div id = 'numero'>
                        <input type="text" name="numero"  placeholder = "Numero">
                    </div>

                </div>

                <input id = 're2' type = "submit" name = "Registrati" value = "Registrati">
            </form>
        
        </div>
        </div>
    </div>
</body>

</html>
