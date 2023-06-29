function iniciarMap(){
  var coord = {lat:-7.476164 ,lng: -78.815490};
  var map = new google.maps.Map(document.getElementById('map'),{
    zoom: 17,
    center: coord
  });
  var marker = new google.maps.Marker({
    position: coord,
    map: map
  }); 
}