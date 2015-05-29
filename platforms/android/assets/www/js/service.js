/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    
  
  
});
function soap(nombres,cordenadas) {
//  var nombres = new Array('christian');
//  var cordenadas = new Array('maricon');
var xmlhttp = new XMLHttpRequest();
    xmlhttp.open('POST','http://www.webmasterrecords.com/mdr/webServer/index.php', true);
    var idNick = "Andres";
    var sr =
        '<soapenv:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:urn="urn:coordenadaswsdl">'+
        '<soapenv:Header/>'+
        '<soapenv:Body>'+
           '<urn:guardarCoordenadas soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/">'+
              '<idNick xsi:type="xsd:string">'+idNick+'</idNick>'+
              '<longitud xsi:type="xsd:string">'+nombres+'</longitud>'+
              '<latitud xsi:type="xsd:string">'+cordenadas+'</latitud>'+
              '</urn:guardarCoordenadas>'+
        '</soapenv:Body>'+
     '</soapenv:Envelope>';
    xmlhttp.onreadystatechange = function () {
      if (xmlhttp.readyState === 4) {
        if (xmlhttp.status === 200) {
            alert('done use firebug to see response');
            //alert(xmlhttp.responseXML);
        }
      }
    };
    // Send the POST request
    xmlhttp.setRequestHeader('Content-Type', 'text/xml');
    xmlhttp.send(sr);
}
