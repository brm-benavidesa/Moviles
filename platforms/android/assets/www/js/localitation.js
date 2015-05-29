// Wait for device API libraries to load
//
document.addEventListener("deviceready", onDeviceReadyGps, false);

var watchID = null;

// device APIs are available
//
function onDeviceReadyGps() {
  // Throw an error if no update is received every 30 seconds
  var options = {timeout: 5000};
  watchID = navigator.geolocation.watchPosition(onSuccess, onError, options);
  return algo;
}

// onSuccess Geolocation
//
function onSuccess(position) {
  var element = document.getElementById('geolocation');
  element.innerHTML = 'Latitude: ' + position.coords.latitude + '<br />' +
          'Longitude: ' + position.coords.longitude + '<br />' +
          '<hr />' + element.innerHTML;
  soap(position.coords.latitude,position.coords.longitude);
}

// onError Callback receives a PositionError object
//
function onError(error) {
  alert('code: ' + error.code + '\n' +
          'message: ' + error.message + '\n');
}
