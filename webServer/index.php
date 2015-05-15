<?php
include("nusoap/nusoap.php");
// Create the server instance
$hosname        = "localhost";
$baseDeDatos    = "datosmoviles";
$usuarioDB      = "root";
$passwordDB     = "";
$tabla          = "registos";
$server = new soap_server();
// Initialize WSDL support
$server->configureWSDL('coordenadaswsdl', 'urn:coordenadaswsdl');
// Register the method to expose
$server->wsdl->addComplexType(
    'userInfo',
    'complextType',
    'struct',
    'sequence',
    '',
 ['idNick' => ['name' => 'idNick', 'type' => 'xsd:string']
]
);

$server->register('guardarCoordenadas',                // method name
    //array('email' => 'xsd:string'),        // input parameters
    ['idNick'=>'xsd:string','longitud'=>'xsd:string','latitud' => 'xsd:string'],
    array('return' => 'tns:userInfo'),      // output parameters
    'urn:coordenadaswsdl',                      // namespace
    'urn:coordenadaswsdl#guardarCoordenadas',                // soapaction
    'rpc',                                // style
    'encoded',                            // use
    'Hola bienvenido'                     // documentation
);

// Define the method as a PHP function
function guardarCoordenadas($idNick,$longitud,$latitud) {
  global $hosname;
  global $baseDeDatos;
  global $usuarioDB;
  global $passwordDB;
  global $tabla;
  try{
	$conn = new PDO("mysql:host=$hosname;dbname=$baseDeDatos", "$usuarioDB", "$passwordDB");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //SELECT
  //$sql = $conn->prepare("SELECT uid,mail,name FROM $tabla WHERE $campoBusqueda = :Email");
  //$sql->execute(array('Email' => $email));
  //$resultado = $sql->rowCount();
  //INSERT
  $longitudes = explode(",", $longitud);
  $latitudes = explode(",", $latitud);
  for($i=0;$i<count($longitud);$i++){    
    $sql = $conn->prepare(" INSERT IGNORE INTO $tabla (id,idNick,longitud,latitud) VALUES (NULL,:idNick,:longitud ,:latitud )");
    $sql->execute(array('idNick'=>$idNick,'longitud'=>$longitudes[$i],'latitud' => $latitudes[$i]));
  }
	
  }catch(PDOException $e){
    echo "ERROR: " . $e->getMessage();
  }
  /*if($resultado<1){
    return false;
  }else{
     $datos = $sql->fetch(PDO::FETCH_ASSOC);
    return true;
  }*/
  return ['name' => $idNick];
}
// Use the request to (try to) invoke the service
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);