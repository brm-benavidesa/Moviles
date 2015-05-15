//Clase lectora del acelerometro del dispositivo
//Nota: Requiere ser usada bajo proyectos Cordova
//tv: tiempo en ms para captura de las aceleraciones en los 3 ejes
var DBOperator = function (tv) {
  this.query = "";
  this.db;
  document.addEventListener("deviceready", this.onDeviceReady(), false);
};

DBOperator.prototype.onDeviceReady = function () {
  this.db = window.openDatabase("Database", "1.0", "", 200000);
  this.db.transaction(populateDB, errorCB, successCB);
};
DBOperator.prototype.populateDB = function (tx) {
  tx.executeSql('CREATE TABLE IF NOT EXISTS DEMO (id unique, data)');
};

// Transaction error callback
//
DBOperator.prototype.errorCB = function (err) {
  alert("Error processing SQL: " + err.code);
};

// Transaction success callback
//
DBOperator.prototype.successCB = function () {
  this.db.transaction(queryDB, errorCB);
};

// Query the database
//
DBOperator.prototype.queryDB = function (tx) {
  tx.executeSql(this.query, [], querySuccess, errorCB);
};
// Query the success callback
//
DBOperator.prototype.querySuccess = function (tx, results) {
  var len = results.rows.length;
  n = len;
  document.getElementById("bd").innerHTML += "<tr><td>ID</td><td>DATA</td></tr>";
  for (var i = 0; i < len; i++) {
    document.getElementById("bd").innerHTML += "<tr><td>" + results.rows.item(i).id + "</td><td>" + results.rows.item(i).data + "</td></tr>";
  }
};