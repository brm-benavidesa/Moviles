// Esperando que cargue cordova
document.addEventListener("deviceready", onDeviceReady, false);
// Cordova esta listo is ready
function onDeviceReady() {
  var db = window.openDatabase("datosmoviles", "1.0", "Base local para los datos", 200000);
  db.transaction(populateDB, errorCB, successCB);
}
// Populate the database 
function populateDB(tx) {
//  tx.executeSql('DROP TABLE IF EXISTS registos');

  tx.executeSql('CREATE TABLE IF NOT EXISTS registos (id INTEGER PRIMARY KEY AUTOINCREMENT,longitud CHAR(200) NOT NULL,latitud CHAR(250) NOT NULL)');
  tx.executeSql('CREATE TABLE IF NOT EXISTS usuario  (id INTEGER PRIMARY KEY AUTOINCREMENT,idNick CHAR(100) NOT NULL');
  //tx.executeSql('INSERT INTO clima (usuario,lugar,clima) VALUES ("andresx","suba-gaitana","soleado")');
  //here you can do  multiple sql statements.
 /* tx.executeSql('SELECT * FROM clima', [], function (tx, results) {
    var len = results.rows.length, i;
    msg = "<p>Found rows: " + len + "</p>";
    document.querySelector('#status').innerHTML += msg;
    for (i = 0; i < len; i++) {
      alert(results.rows.item(i).id + "\n" + results.rows.item(i).lugar);
    }
  }, null);*/
}
// Error en la coneccion 
function errorCB(err) {
  alert("Error processing SQL: " + err.code);
}
// Coneccion exitosa
function successCB() {
  alert("success!");
}
function insert() {
  var resultado = "";
  var db = window.openDatabase("sincronizacion", "1.0", "Base local para los datos", 200000);
  resultado = db.transaction(insertClima, errorCB, successCB);
  return resultado;
}
function consutarUser() {
  var db = window.openDatabase("sincronizacion", "1.0", "Base local para los datos", 200000);
  db.transaction(consultaUsuario, errorCB, successCB);
}
function insertClima(tx) {
//  tx.executeSql('INSERT INTO clima (usuario,lugar,clima) VALUES ("'+user+ '","'+lugar+'","'+clima+'")');
}
function consultaUsuario(tx){
  var idNick = "";
  tx.executeSql('SELECT idNick FROM datos_usuario', [], function (tx, results) {
    var len = results.rows.length, i;
    for (i = 0; i < len; i++) {
      idNick=(results.rows.item(i).idNick);
    }
  }, null);
  return idNick;
}