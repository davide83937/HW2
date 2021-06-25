<html>
    <head>
        <link rel="stylesheet" href=" {{ URL::asset('acquistiii.css') }} " />
        <script src="{{ URL::asset('acquistii.js') }}" defer></script>
        <meta charset = "utf-8">
    </head>

    <body>
        <nav>
            <form id = 'home' action = 'home' >
                <input id = 'home_in' type="submit" value = "Home"/>
             </form>
            <form id = 'carrel_button' action = 'carrello' >
                <input id = 'car_but' type="submit" value = "Carrello"/>
             </form>
            
            <form id = 'esci' action = 'logout' >
            <input id = 'esci_in' type="submit" value = "Esci"/>
            </form>
    </nav>
    <header>
        <h1>
            POWER SHOP
           </h1>
           <div class="overlay"></div>
    </header>
    
    <article>
        <div id="titolo"><h1>CRONOLOGIA ACQUISTI</h1></div>
           

               <p id = 'ciao'></p>
                 <div id = 'acquisti'>

                    
                </div>
            </div>
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