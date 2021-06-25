fetch('caricaAcquisti').then(acquistiResponse).then(acquistiJson)

function sessionResponse(response){
    return response.text()
}

function sessionText(text){

    if(text == 0){
         console.log(text)
    }else{
         const user = document.querySelector('#ciao')
         user.textContent = text
    }
}

fetch('check').then(sessionResponse).then(sessionText)

function acquistiResponse(response){
    return response.json()
}


function acquistiJson(json){
    for(let i = 0; i<json.length-1; i++){
    const acquisto = document.querySelector('#acquisti')
    const acqu = document.createElement('div')
          acqu.classList.add('acqu')
         
    const data = document.createElement('p')
          data.classList.add('data')
          data.textContent = json[i].Data_
          
    const dettagli = document.createElement('div')
          dettagli.classList.add('dettagli')

    const img = document.createElement('img')
          img.src = json[i].Immagine
          dettagli.appendChild(img)      

    const nomi = document.createElement('div')
          nomi.classList.add('nomi')


    const nome = document.createElement('p')
          nome.textContent = json[i].Nome
    const nomeModello = document.createElement('p')
          nomeModello.textContent = json[i].Nome_Modello
          nomi.appendChild(nome)
          nomi.appendChild(nomeModello)   
          
          dettagli.appendChild(nomi)

    const prezzo = document.createElement('p')
          prezzo.classList.add('prezzo')
          prezzo.textContent = json[i].Prezzo + " €"
          dettagli.appendChild(prezzo)

          acqu.appendChild(data)
          acqu.appendChild(dettagli)

          acquisto.appendChild(acqu)
    }

}