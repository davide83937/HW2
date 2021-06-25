
function change(event){
    button = event.currentTarget;
    button.classList.add('acre')
    button2 = document.querySelector('#re')
    button2.classList.remove('acre')
    const u = document.querySelector('#registrati')
    const i = document.querySelector('#accedi')
    u.classList.add('hidden')
    i.classList.remove('hidden')
}


const t = document.querySelector('#ac')
t.addEventListener('click', change)


function change2(event){
    button = event.currentTarget;
    button.classList.add('acre')
    button2 = document.querySelector('#ac')
    button2.classList.remove('acre')
    const u = document.querySelector('#accedi')
    const i = document.querySelector('#registrati')
    u.classList.add('hidden')
    i.classList.remove('hidden')
}

const u = document.querySelector('#re')
u.addEventListener('click', change2)




//CHECK USER 

function userResponse(response){
      return response.text()
}

function userText(text){
    usspan = document.querySelector('#username span')
    if(text=='1'){
    usspan.textContent = 'User già preso'
    usspan.classList.remove('hidden2')
    }else if(text=='0'){
        usspan.classList.add('hidden2')
    }
}

function verifica_user(event){
    const us = event.currentTarget;
    usspan = document.querySelector('#username span')
    if(us.value.length < 8){
         usspan.textContent = 'User non valido'
         usspan.classList.remove('hidden2')
    }else{
        usspan.classList.add('hidden2')
        fetch('checkUser/'+encodeURIComponent(us.value)).then(userResponse).then(userText);
    }   
}

user = document.querySelector('#username input')
user.addEventListener('blur', verifica_user)


//CHECK EMAIL

function emailResponse(response){
    return response.text()
}

function emailText(text){
  emspan = document.querySelector('#email span')
  console.log(text)
  if(text=='1'){
  emspan.textContent = 'Email già presa'
  emspan.classList.remove('hidden2')
  }else if(text=='0'){
      emspan.classList.add('hidden2')
  }
}

function verifica_email(event){
   const em = event.currentTarget;
   const emspan = document.querySelector('#email span')

   if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(em.value).toLowerCase())){
    emspan.textContent='Email non valida'  
    emspan.classList.remove('hidden2')
   }else{
       emspan.classList.add('hidden2')
       fetch("checkEmail/"+encodeURIComponent(String(em.value).toLowerCase())).then(emailResponse).then(emailText);
      
   }
}

email = document.querySelector('#email input')
email.addEventListener('blur', verifica_email)



//CHECK PASSWORD

function verifica_pass(event){
    const pa = event.currentTarget;
    const paspan = document.querySelector('#password span')
    
    if(pa.value.length < 8){
        paspan.classList.remove('hidden2')
    }else{
        paspan.classList.add('hidden2')
    }
   }

pass = document.querySelector('#password input')
pass.addEventListener('blur', verifica_pass)

//CHECK DOPPIA PASSWORD
function verifica_pass2(event){
    const pa2 = event.currentTarget;
    const paspan2 = document.querySelector('#c_password span')
    const pas2 = document.querySelector('#password input')

    if(pas2.value != pa2.value){
    
        paspan2.classList.remove('hidden2')
    }else{
        paspan2.classList.add('hidden2')
    }
}

pass2 = document.querySelector('#c_password input')
pass2.addEventListener('blur', verifica_pass2)

