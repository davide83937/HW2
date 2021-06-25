

<?php


{{ URL::asset('home.css'); }} 

?>


<html>
<link rel="stylesheet" href="home.css?ts=<?=time()?>&quot" />
<script src="{{ URL::asset('homee.js') }}"defer></script>
    <meta charset = "utf-8">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru:wght@500&family=Roboto+Slab&display=swap" rel="stylesheet">

    <body>
        <nav>
           
        <form id = 'home' action = 'home' >
               <input id = 'home_in' type="submit" value = "Home"/>
            </form>
            <form id = 'acquist_button' action = 'acquisti' >
               <input id = 'acq_but' type="submit" value = "Acquisti"/>
            </form>
            <form id = 'carrel_button' action = 'carrello' >
               <input id = 'car_but' type="submit" value = "Carrello"/>
               <label id = 'n_carr' for="car_but">6</label>
            </form>
            <form class = 'hidden' id = 'esci' action = 'logout' >
               <input id = 'esci_i' type="submit" value = "Esci"/>
            </form>
        </nav>
    <header>
        <h1>
         POWER SHOP
        </h1>
        <div class="overlay"></div>
    </header>
   
    <span  id = "cia">Benvenuto {{ $nome }}</span>
    <article>
        
        <section class = "hidden2" id='preferiti'><h1>PREFERITI</h1>
            <div id="pPreferiti" ></div>
        </section>
        <p id = 'cerca'><strong>Cerca</strong></p>
        <input  type="text" id="ricerca">
        
        <div id="titolo"><h1>PRODOTTI IN EVIDENZA</h1></div>
      


        

    <section id='conpubb'>
      
        <div id = "grid">
      
        </div>
   
        <section id="pubblicit"><h1>Pubblicità</h1>
        <div id="pub">
            <div id="film"><div class="logo"><img src="imdb.jpg"></div><h1>Presto al cinema</h1></div>
            <div id="musica"><div class="logo"><img src="spoty.jpg"></div><h1>Ascolta su Spotify</h1></div>
        </div>
        </section>
    </section>

    </article>
    
    <footer>

       <div class="flex-footer">
           <div class="titoli"><p>INFORMAZIONI</p> </div>
           <a href="https://www.youtube.com/">Condizioni generali di vendita</a>
           <a href="https://www.youtube.com/">Pagamenti</a>

       </div>

       <div class="flex-footer">
           <div class="titoli"><p>AZIENDA</p> </div>
           <a href="https://www.youtube.com/">Chi siamo</a>
           <a href="https://www.youtube.com/">Negozi</a>

        </div>

    <div class="flex-footer">
        <div class="titoli"><p>PRODOTTI</p></div>
        <a href="https://www.youtube.com/">Nuovi prodotti</a>
        <a href="https://www.youtube.com/">Più venduti</a>

    </div>

    <div id="Ingegnere"><p>Davide Pantò 046001687</p></div>

    </footer>





</body>
</html>