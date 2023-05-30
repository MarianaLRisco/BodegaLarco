// Obtén la fecha actual
var today = new Date();
var date = ("0" + today.getDate()).slice(-2) + ' del ' + ("0" + (today.getMonth() + 1)).slice(-2) + ', ' + today.getFullYear();


// Agrega la fecha y el usuario al elemento div
document.getElementById("header-right").innerHTML = date;