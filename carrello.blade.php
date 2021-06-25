<html>
    <head>
        <link rel="stylesheet" href=" {{ URL::asset('carrelloooo.css') }} " />
        <meta charset = "utf-8">
        <script src="{{ URL::asset('carrello.js') }}" defer></script>
    </head>

    <body>
        <nav>
            <form id = 'home' action = 'home' >
                <input id = 'home_in' type="submit" value = "Home"/>
             </form>
                <form id = 'acquist_button' action = 'acquisti' >
                    <input id = 'acq_but' type="submit" value = "Acquisti"/>
                 </form>
                <form  id = 'esci' action = 'logout' >
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
          <div id="titolo"><h1>CARRELLO</h1></div>
            <div id ='pagina'>
            <div id='carrell'>
                  <p id = 'ciao'>Username</p>
       
 

            </div>

            <section id="modal" class = "hidden2">

            </section>





            <div   id="pagamento" class = 'hidden2'  >
                <div class="pag">

                     <div id='chiudi_paga'><button id = 'yu' type="button">X</button></div>

                     <div id = 'info'>
                    <div id = 'carta'>
                        <input type="text" name="username" placeholder = "Numero carta" >
                    </div>

                    <div id = 'indirizzo'>
                        <input id = 'via' type="text" name="via" placeholder = "Via">
                        <input id='numero' type="text" name="n" placeholder = "Numero">
                    </div>

                    <div id = 'telefono'>
                        <input type="text" name="Telefono" placeholder = "Telefono">
                    </div>

                    </div> 
                    <div id='paga'><button id = 'paga_button' type="button">Acquista</button></div>
               </div>
            
               
</div>






            <div id ='acquisto'>
                <p> </p>
                <button type="button">ACQUISTA ORA</button>
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