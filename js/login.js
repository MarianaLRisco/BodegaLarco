if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }



document.addEventListener('DOMContentLoaded', function() {
    // Obtén una referencia al div con la clase 'alert'
    var divAlert = document.querySelector('.alert');
  
    // Obtén una referencia a la clase 'login-box'
    var loginBox = document.querySelector('.login-box');
    var divForget =document.getElementById('forget');
    var divVolver = document.getElementById('volver'); 
  
    // Verifica si el div con la clase 'alert' está presente
    if (divAlert) {
      // Agrega una clase para cambiar el tamaño de 'login-box'
      loginBox.style.minHeight='490px';
    }
    divForget.addEventListener('click',()=>{
        loginBox.style.minHeight='320px';
    })
    divVolver.addEventListener('click',()=>{
        loginBox.style.minHeight='420px';
        divAlert.style.display = 'none';
    })        
});
  