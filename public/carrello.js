
function carrelloResponse(response){
    return response.json()
}

function carrelloJson(json){

    const carrello = document.querySelector('#carrell')
    console.log(json)
//PRODOTTO

for(let i=0; i<json.length; i++){


const prodotto = document.createElement('div')
      prodotto.classList.add('pro')
      const img = document.createElement('img')
      img.src = json[i].Immagine
    //DETTAGLI
    const dettagli = document.createElement('div')
    dettagli.classList.add('dettagli')
         const nome = document.createElement('p')
         nome.classList.add('n')
         nome.textContent =  json[i].Nome
         const nome_modello = document.createElement('p')
         nome_modello.classList.add('nModello')
         nome_modello.textContent = json[i].Nome_Modello
         const disp = document.createElement('p')
         let o = json[i].Quantita_Componente - json[i].Quantita_Venduta
         disp.textContent = 'Disponibilita: '+ o 
         disp.classList.add('n_disp')
         dettagli.appendChild(nome)
         dettagli.appendChild(nome_modello)
         dettagli.appendChild(disp)
         
         //QUANTITA
         const quant = document.createElement('div')
         quant.classList.add('quant')
              const meno = document.createElement('button')
              meno.classList.add('meno')
              meno.textContent = '-'
              const n_acqu = document.createElement('p')
              n_acqu.classList.add('n_acqu')
              n_acqu.textContent = json[i].Numero
              const piu = document.createElement('button')
              piu.classList.add('piu')
              piu.textContent = '+'
              const img2 = document.createElement('img')
              img2.classList.add('hidden')
              img2.src = 'x.jpg'
              quant.appendChild(meno)
              quant.appendChild(n_acqu)
              quant.appendChild(piu)
              quant.appendChild(img2)
              dettagli.appendChild(quant)

    //PREZZO 
    const prezzo = document.createElement('div')
    prezzo.classList.add('prezzo')
         const pre = document.createElement('p')
         pre.textContent = json[i].Prezzo+' €'
         const cest = document.createElement('button')
         cest.classList.add('cest')
         prezzo.appendChild(pre)
         prezzo.appendChild(cest)

         prodotto.appendChild(img)
         prodotto.appendChild(dettagli)
      
         prodotto.appendChild(prezzo)

         carrello.appendChild(prodotto)


         //LISTENER SOTTRAI QUANTITA
         let sottrai = document.querySelectorAll('.meno')
         for(s of sottrai){
            s.addEventListener('click', sottrazione)
         }

         //LISTENER AGGIUNGI QUANTITA
         let somma = document.querySelectorAll('.piu')
         for(p of somma){
             p.addEventListener('click', addizione)
         }

         //LISTENER ELIMINA QUANTITA
         let elimina = document.querySelectorAll('.cest')
         for(c of elimina){
             c.addEventListener('click', eliminazione)
         }

    }
}

fetch('caricaCarrello').then(carrelloResponse).then(carrelloJson) 


//AGGIORNA PREZZO
let prezzo = document.querySelector('#acquisto p');

fetch('aggiornaPrezzo').then(prezzoResponse).then(prezzoText);

function prezzoResponse(response){
    
    return response.text()
}

function prezzoText(text){
    prezzo.textContent = text + ' €';
}



//ELIMINAZIONE PRODOTTO TASTO VERDE
let tasto_elimina = 0;

function eliminazione(event){
    tasto_elimina = event.currentTarget
    const nome = tasto_elimina.parentNode.previousSibling.firstChild
    const nomeModello = nome.nextSibling
    
    fetch('sottraiCarrello2/'+encodeURIComponent(nome.textContent)+'/'+encodeURIComponent(nomeModello.textContent)).then(eliminaResponse).then(eliminaText)
}

function eliminaResponse(response){
    return response.text()
}

function eliminaText(text){
    console.log(text)
    if(text == 2){
        const comp = tasto_elimina.parentNode.parentNode
        comp.remove()
    }
    fetch('aggiornaPrezzo').then(prezzoResponse).then(prezzoText);
}



//AGGIUNGI UNITA AL CARRELLO
let tastoPiu = 0;

function aggcarResponse(response){
    console.log('Rispondo')
    return response.text()
}

function aggcarText(text){
    console.log(text)
    if(text == 1){
    tastoPiu.nextSibling.classList.remove('hidden')
    } else if(text == 0){
        tastoPiu.nextSibling.classList.add('hidden')
        let t = tastoPiu.parentNode.firstChild.nextSibling
        n = t.textContent
        t.textContent = parseInt(n) + 1;
    }
    fetch('aggiornaPrezzo').then(prezzoResponse).then(prezzoText);
}

function addizione(event){
    console.log('Addiziono')
     tastoPiu = event.currentTarget
     const nom = tastoPiu.parentNode.parentNode.firstChild
     const nomModello = nom.nextSibling
    fetch('aggiungiCarrello/'+encodeURIComponent(nom.textContent)+'/'+encodeURIComponent(nomModello.textContent)).
    then(aggcarResponse).then(aggcarText)
}


//TOGLI UNITA AL CARRELLO
let tastoMeno = 0;

function sottraiResponse(response){
     return response.text()
}

function sottraiText(text){
     let elemento = 0;
     if(text == 0){
        elemento = tastoMeno.parentNode.parentNode.parentNode.remove()
     }else{
        elemento = tastoMeno.nextSibling
        n = elemento.textContent
        elemento.textContent = n - 1;
     }
     fetch('aggiornaPrezzo').then(prezzoResponse).then(prezzoText);

}

function sottrazione(event){
     tastoMeno = event.currentTarget
     const nom = tastoMeno.parentNode.parentNode.firstChild
     const nomModello = nom.nextSibling
     fetch('sottraiCarrello/'+encodeURIComponent(nom.textContent)+'/'+encodeURIComponent(nomModello.textContent)).then(sottraiResponse).then(sottraiText)
}

function sessionResponse(response){
     return response.text()
}

function sessionText(text){

     if(text == 0){
          console.log(text)
     }else{
          const user = document.querySelector('#carrell p')
          user.textContent = text
     }
}

fetch('check').then(sessionResponse).then(sessionText)



//ACQUISTO E PAGAMENTO

const acquista = document.querySelector('#acquisto button');

acquista.addEventListener('click', apri_paga)

function acquistaResponse(response){
   return response.text()
}



function ok(event){
    const io = event.currentTarget.parentNode.parentNode
    io.classList.add('hidden2')
    document.body.classList.remove('no-scroll');
}

function acquistaText(text){
    if(text == 0){
       const form = document.querySelector('#pagamento')
       form.classList.add('hidden2')
       const modal = document.querySelector('#modal')
       const div = document.createElement('div')
       div.classList.add('acquisto_ok')
       const h1 = document.createElement('h1')
       const but = document.createElement('button')
       h1.textContent = 'Acquisto effettuato con successo'
       but.textContent = 'Ok'
       div.appendChild(h1)
       div.appendChild(but)
       modal.appendChild(div)
       but.addEventListener('click', ok)
       modal.classList.remove('hidden2')
       document.body.classList.add('no-scroll');
       modal.style.top = window.pageYOffset + 'px'
    }else if(text == 1){
       const form = document.querySelector('#pagamento')
       form.classList.add('hidden2')
       const modal = document.querySelector('#modal')
       const div = document.createElement('div')
       div.classList.add('acquisto_ok')
       const h1 = document.createElement('h1')
       const but = document.createElement('button')
       h1.textContent = 'Qualcosa è andato storto'
       but.textContent = 'Ok'
       div.appendChild(h1)
       div.appendChild(but)
       modal.appendChild(div)
       but.addEventListener('click', ok)
       modal.classList.remove('hidden2')
       document.body.classList.add('no-scroll');
       modal.style.top = window.pageYOffset + 'px'
    }
}

const paga = document.querySelector('#paga')
paga.addEventListener('click', acquist)

function acquist(event){
    const carta = document.querySelector('#carta input');
    const via = document.querySelector('#via');
    const numero = document.querySelector('#numero');
    const telefono = document.querySelector('#telefono input');
    
    if(carta.value != '' && via.value!= '' && numero.value!= '' && telefono.value!= ''){

    fetch('acquista/'+encodeURIComponent(carta.value)+'/'+encodeURIComponent(via.value)+
    '/'+encodeURIComponent(numero.value)+'/'+encodeURIComponent(telefono.value)).then(acquistaResponse).then(acquistaText)
    }
}

function apri_paga(){
    const f = document.querySelector('#pagamento')
    document.body.classList.add('no-scroll');
    f.style.top = window.pageYOffset + 'px'
    f.classList.remove('hidden2')
   
}

function chiudi_paga(event){
    const form = event.currentTarget.parentNode.parentNode.parentNode
    document.body.classList.remove('no-scroll');
    form.classList.add('hidden2')
}

const t = document.querySelector('#chiudi_paga button')
t.addEventListener('click', chiudi_paga)