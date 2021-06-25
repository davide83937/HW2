
  //CONTROLLO CHECK
  
  fetch('check').then(onCheck).then(onCheckText)

  function onCheck(response){
    return response.text()
  }

  function onCheckText(text){

    const ciao = document.querySelector('#cia')
    const esci = document.querySelector('#esci_i')

    if(text == 0){
       ciao.classList.add('hidden2')
       esci.parentNode.classList.add('hidden')
    }else{
       ciao.classList.remove('hidden2')
       esci.parentNode.classList.remove('hidden')
       ciao.textContent = 'Benvenuto '+text
    }

  }



  let divi = 0;
  
  setTimeout(fetchh, 1000)


  //FETCH E GENERAZIONE PRODOTTI

  fetch("prodotti").then(onResponse3).then(onJson3);

  function onResponse3(response){
      console.log('Bravissim')
      return response.json()
      
  }
  
  function onJson3(json)
  {
      
    
    const grid = document.querySelector('#grid')
    const l = json.length
    
    for(let i = 0; i < 9; i++){
       const sezionee = document.createElement('div')
             sezionee.classList.add('prodotto')
    
       const contenutoo = document.createElement('div')
             contenutoo.classList.add('contenuto')
    
       const nomee = document.createElement('h1')
             nomee.classList.add('nome')
             nomee.textContent = json[i].Nome

       const nome_modello = document.createElement('p')
             nome_modello.classList.add('modello')
             nome_modello.textContent = json[i].Nome_Modello

       const no = document.createElement('p')
             no.classList.add('no')
             no.classList.add('hidden')
             no.textContent = 'Limite superato'
    
       const disponibilità = document.createElement('p')
             disponibilità.classList.add('disponibilità')
             let d = json[i].Quantita_Componente - json[i].Quantita_venduta
             disponibilità.textContent = "Pezzi: "+d

       const prezzoo = document.createElement('h2')
             prezzoo.classList.add('prezzo')
             prezzoo.textContent = json[i].Prezzo + ' €';
    
       const span1 = document.createElement('span')
             span1.classList.add('spa')
       const span2 = document.createElement('span')
    
       const but1 = document.createElement('img')
             but1.classList.add('clickP')
             but1.src = 'stella_togli.jpg'

        const car = document.createElement('img')
             car.classList.add('car')
             car.src = 'carrello.jpg'
    
       const but2 = document.createElement('img')
             but2.classList.add('clickN')
             but2.classList.add('hidden')
             but2.src = 'stella_aggiungi.jpg' 
    
       const descrizionee = document.createElement('p')
             descrizionee.classList.add('descrizione')
             descrizionee.classList.add('hidden')
             descrizionee.textContent = json[i].Descrizione
    
       const mDescrizionee = document.createElement('p')
             mDescrizionee.classList.add('mostra')
             mDescrizionee.textContent = 'Mostra descrizione'
    
       const divImg = document.createElement('div')
             divImg.classList.add('img')
    
       const img = document.createElement('img')
             img.classList.add('foto')
             img.src = json[i].Immagine
    
        const span3 = document.createElement('span')
        span3.classList.add('p_q')

        span3.appendChild(prezzoo)
        span3.appendChild(disponibilità)

        span1.appendChild(but1)
        span1.appendChild(car)
        span2.appendChild(but2)
        
        
        divImg.appendChild(img)
    
        contenutoo.appendChild(nomee)
        contenutoo.appendChild(nome_modello)
        contenutoo.appendChild(no)
        contenutoo.appendChild(span3)
      
        contenutoo.appendChild(span1)
        contenutoo.appendChild(span2)
        contenutoo.appendChild(descrizionee)
        contenutoo.appendChild(mDescrizionee)
        contenutoo.appendChild(divImg)
    
        sezionee.appendChild(contenutoo)
        grid.appendChild(sezionee)

        //LISTENER DESCRIZIONE
        let mostra = document.querySelectorAll('.mostra')
        for(m of mostra)
           {
             m.addEventListener('click', mostraDescrizione);
           }


        //LISTENER AGGIUNGI PREFERITI
        let preferiti = document.querySelectorAll('.contenuto .clickP')
        for(p of preferiti)
          {
            p.addEventListener('click', prefer)
          }  


        //LISTENER AGGIUNGI CARRELLO
        let carr = document.querySelectorAll('.contenuto .car')
        for(c of carr){
          c.addEventListener('click', aggiungi_al_carrello)
        }
    }


  }



//API REST IMDB

rest_url2 = 'https://imdb-api.com/en/API/SearchTitle/k_wx9c5cp6/blackwidow'
function fetchh(){
fetch(rest_url2).then(onResponse).then(onJson)
}

function onResponse(response){
    console.log('Risposta perfetta')
    return response.json()
}


function onJson(json)
{
    const cont = document.querySelector('#pubblicit #film')
    
    for(let i=0; i<2; i++){

        const doc = json.results[i]
        
        const img = doc.image
        
        
        const div = document.createElement('div')
        const cover = document.createElement('img')
     
        cover.src = img

        div.appendChild(cover)
        cont.appendChild(div)
        
    }
}


//API REST SPOTIFY

function onJson2(json) {
    
    const contenitore = document.querySelector('#pubblicit #musica');
    
    const results = json.albums.items;
    let num_results = results.length;
    
    if(num_results > 2)
      num_results = 2;
  
    for(let i=0; i<num_results; i++)
    {
      const result = results[i]
      const cover = result.images[0].url;
      const album = document.createElement('div');
      const img = document.createElement('img');
      img.src = cover;
      album.appendChild(img);
      contenitore.appendChild(album);
    }
  }
  
  function onResponse2(response) {
    console.log('Risposta');
    return response.json();
  }
  
  function searchh()
  { 
    fetch("https://api.spotify.com/v1/search?type=album&q=vita vera",
      {
        headers:
        {
          'Authorization': 'Bearer ' + token
        }
      }
    ).then(onResponse2).then(onJson2);
  }
  
  setTimeout(searchh, 3000)
  
  function onTokenJson(json)
  {
    token = json.access_token;
  }
  
  function onTokenResponse(response)
  {
    return response.json();
  }
  

  const client_id = '050b74b2529f4732a90c431c1b1e6c0f';
  const client_secret = '08446364621449bea945430c6c364777';
 
  let token;
 
  setTimeout(tokenSpoty, 1500)

  function tokenSpoty(){

  fetch("https://accounts.spotify.com/api/token",
      {
     method: "post",
     body: 'grant_type=client_credentials',
     headers:
     {
      'Content-Type': 'application/x-www-form-urlencoded',
      'Authorization': 'Basic ' + btoa(client_id + ':' + client_secret)
     }
    }
  ).then(onTokenResponse).then(onTokenJson);

  }


//MOSTRA DESCRIZIONE

function mostraDescrizione(event)
{
  let mostra = event.currentTarget;
  let descri = mostra.parentNode.querySelector('.descrizione')
  
  if(mostra.textContent == 'Mostra descrizione')
  {
  mostra.textContent='Nascondi Descrizione'
  descri.classList.remove('hidden')
  }
  else
    {
      mostra.textContent='Mostra descrizione'
      descri.classList.add('hidden')
    }
}


//CERCA CONTENUTI

function cercaResponse(response){
  return response.json()
}

function cercaJson(json){

  const tit = document.querySelector('#titolo');
  tit.classList.add('hidden')

  const pro = document.querySelectorAll('.prodotto')
  for(p of pro){
    p.remove()
  }

  const grid = document.querySelector('#grid')
    const l = json.length
    
    for(let i = 0; i < l; i++){
       const sezionee = document.createElement('div')
             sezionee.classList.add('prodotto')
    
       const contenutoo = document.createElement('div')
             contenutoo.classList.add('contenuto')
    
       const nomee = document.createElement('h1')
             nomee.classList.add('nome')
             nomee.textContent = json[i].Nome

       const nome_modello = document.createElement('p')
             nome_modello.classList.add('modello')
             nome_modello.textContent = json[i].Nome_Modello

       const no = document.createElement('p')
             no.classList.add('no')
             no.classList.add('hidden')
             no.textContent = 'Limite superato'
    
       const disponibilità = document.createElement('p')
             disponibilità.classList.add('disponibilità')
             let d = json[i].Quantita_Componente - json[i].Quantita_venduta
             disponibilità.textContent = "Pezzi: "+d

       const prezzoo = document.createElement('h2')
             prezzoo.classList.add('prezzo')
             prezzoo.textContent = json[i].Prezzo + ' E';
    
       const span1 = document.createElement('span')
             span1.classList.add('spa')
       const span2 = document.createElement('span')
    
       const but1 = document.createElement('img')
             but1.classList.add('clickP')
             but1.src = 'stella_togli.jpg'

        const car = document.createElement('img')
             car.classList.add('car')
             car.src = 'carrello.jpg'
    
       const but2 = document.createElement('img')
             but2.classList.add('clickN')
             but2.classList.add('hidden')
             but2.src = 'stella_aggiungi.jpg' 
    
       const descrizionee = document.createElement('p')
             descrizionee.classList.add('descrizione')
             descrizionee.classList.add('hidden')
             descrizionee.textContent = json[i].Descrizione
    
       const mDescrizionee = document.createElement('p')
             mDescrizionee.classList.add('mostra')
             mDescrizionee.textContent = 'Mostra descrizione'
    
       const divImg = document.createElement('div')
             divImg.classList.add('img')
    
       const img = document.createElement('img')
             img.classList.add('foto')
             img.src = json[i].Immagine
    
        const span3 = document.createElement('span')
        span3.classList.add('p_q')

        span3.appendChild(prezzoo)
        span3.appendChild(disponibilità)

        span1.appendChild(but1)
        span1.appendChild(car)
        span2.appendChild(but2)
        
        
        divImg.appendChild(img)
    
        contenutoo.appendChild(nomee)
        contenutoo.appendChild(nome_modello)
        contenutoo.appendChild(no)
        contenutoo.appendChild(span3)
      
        contenutoo.appendChild(span1)
        contenutoo.appendChild(span2)
        contenutoo.appendChild(descrizionee)
        contenutoo.appendChild(mDescrizionee)
        contenutoo.appendChild(divImg)
    
        sezionee.appendChild(contenutoo)
        grid.appendChild(sezionee)

        
        //AGGIUNGI LISTENER AL TASTO MOSTRA DESCRIZIONER
        let mostra = document.querySelectorAll('.mostra')
        for(m of mostra)
           {
             m.addEventListener('click', mostraDescrizione);
           }

        //AGGIUNGI LISTENER AL TASTO AGGIUNGI PREFERITI
        let preferiti = document.querySelectorAll('.contenuto .clickP')
        for(p of preferiti)
          {
            p.addEventListener('click', prefer)
          }  

        //AGGIUNGI LISTENER AL TASTO AGGIUNGI CARRELLO
        let carr = document.querySelectorAll('.contenuto .car')
        for(c of carr){
          c.addEventListener('click', aggiungi_al_carrello)
        }
    }


}

function cerca(event){
  let search = event.currentTarget
  if(search.value !== '')
  {

  fetch('cerca/'+encodeURIComponent(search.value)).then(cercaResponse).then(cercaJson)

  }
}

let search = document.querySelector('#ricerca')
search.addEventListener('keyup', cerca)






//FUNZIONE AGGIUNGI PREFERITO 


function prefer(event){
    let nome;
    let img;
    const prif = event.currentTarget.parentNode.parentNode.childNodes
    for(a of prif){
        if(a.classList == 'nome'){
           nome = a.textContent
           console.log(nome)
        }
    }

    for(a of prif){
        if(a.classList == 'img'){
           
            img = a.firstChild.src
           
        }
    }

    fetch("aggPref/"+encodeURIComponent(nome)+"/"+encodeURIComponent(img.substring(34))).then(aggPrefResponse).then(aggPrefJson);
    
}



function aggPrefResponse(response){
    console.log('Fino al response ci siamooo')
  return response.json()
}

function aggPrefJson(json){
 
  if(json == '1'){
      console.log('Questo componente è già tra i tuoi preferiti!')
  }else{

    const sez = document.querySelector('#preferiti #pPreferiti')
    const div = document.createElement('div')
    const h1 = document.createElement('h1')
    const img = document.createElement('img')
    const but = document.createElement('img')
    
    h1.textContent = json[0].Nome
    img.src = json[0].Immagine

    const section = document.createElement('section')
    but.src = 'stella_aggiungi.jpg'
    but.classList.add('rimuovi')
    but.addEventListener('click', togli_preferiti)
    div.appendChild(h1)
    div.appendChild(but)
    div.appendChild(img)
    sez.appendChild(div)

    
        if(json.length > 0){
            sez.parentNode.classList.remove('hidden2')
        }
  }

}


// FUNZIONE ELIMINA PREFERITO


function elPrefResponse(response){
    return response.json();
}

function elPrefJson(json){
    const sez = document.querySelector('#preferiti #pPreferiti')
    divi.remove();
    console.log(json.length)
    if(json.length == 0){
        sez.parentNode.classList.add('hidden2')
    }
}

function togli_preferiti(event){
    divi = event.currentTarget.parentNode;
    const nascondi = event.currentTarget.parentNode.childNodes
    const nome = nascondi[0].textContent
    const img = nascondi[2].src
    fetch("elPref/"+encodeURIComponent(nome)).then(elPrefResponse).then(elPrefJson)

    
}


//CARICA PREFERITI AL CARICAMENTO DELLA PAGINA

function carPrefResponse(response){

   return response.json()
}

function carPrefJson(json){
  console.log(json);
    if(json.length > 0){
        const sez = document.querySelector('#preferiti #pPreferiti')
    for(let i = 0; i < json.length; i++){

    const div = document.createElement('div')
    const h1 = document.createElement('h1')
    const img = document.createElement('img')
    const but = document.createElement('img')

    h1.textContent = json[i].Nome
    img.src = json[i].Immagine

    const section = document.createElement('section')
    but.src = 'stella_aggiungi.jpg'
    but.classList.add('rimuovi')
    but.addEventListener('click', togli_preferiti)
    div.appendChild(h1)
    div.appendChild(but)
    div.appendChild(img)
    sez.appendChild(div)
    }
    let pr = sez.childNodes
    
        if(pr.length > 0){
            sez.parentNode.classList.remove('hidden2')
        }
    }
}

fetch("pref").then(carPrefResponse).then(carPrefJson);


let nomeModello = 0;


//AGGIUNGI AL CARRELLO
function aggcarResponse(response){
    return response.text()
}

function aggcarText(text){
    if(text == 1){
       nomeModello.nextSibling.classList.remove('hidden')
    }else{
      nomeModello.nextSibling.classList.add('hidden')
      const t = document.querySelector('#n_carr')
      t.textContent = parseInt(t.textContent)+1;
    }
}

function aggiungi_al_carrello(event){
  const butcar = event.currentTarget
  const nome = butcar.parentNode.parentNode.firstChild
  nomeModello = nome.nextSibling
  fetch('aggiungiCarrello/'+encodeURIComponent(nome.textContent)+'/'
  +encodeURIComponent(nomeModello.textContent)).then(aggcarResponse).then(aggcarText)
}


//NUMERO ELEMENTI NEL CARRELLO

function aggTastCarrResponse(response){
  return response.text()
}

function aggTastCarrText(text){
  const t = document.querySelector('#n_carr')
  t.textContent = text
}

fetch('tastoCarrello').then(aggTastCarrResponse).then(aggTastCarrText)



