<?php
include("nusoap/nusoap.php");
// Create the server instance
$hosname        = "localhost";
$baseDeDatos    = "wbe2service";
$usuarioDB      = "root";
$passwordDB     = "1nt3r4ct1v3";
$tabla          = "users";
$campoBusqueda  = "mail";
$server = new soap_server();
// Initialize WSDL support
$server->configureWSDL('emailwsdl', 'urn:emailwsdl');
// Register the method to expose
//$server->wsdl->addComplexType(
//    'userInfo',
//    'complextType',
//    'struct',
//    'sequence',
//    '',
//    array(
//        'uid' => array('name' => 'uid', 'type' => 'xsd:string'),
//        'mail' => array('name' => 'mail', 'type' => 'xsd:string'),
//        'name' => array('name' => 'name', 'type' => 'xsd:string')
//    )
//);

$server->register('ValidarEmail',                // method name
    //array('email' => 'xsd:string'),        // input parameters
    array('id'=>'xsd:string','nombre'=>'xsd:string','email' => 'xsd:string'),
    array('return' => 'tns:userInfo'),      // output parameters
    'urn:emailwsdl',                      // namespace
    'urn:emailwsdl#ValidarEmail',                // soapaction
    'rpc',                                // style
    'encoded',                            // use
    'Hola bienvenido'                     // documentation
);

// Define the method as a PHP function
function ValidarEmail($id,$nombre,$email) {
  global $hosname;
  global $baseDeDatos;
  global $usuarioDB;
  global $passwordDB;
  global $tabla;
  global $campoBusqueda;
  try{
	$conn = new PDO("mysql:host=$hosname;dbname=$baseDeDatos", "$usuarioDB", "$passwordDB");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //SELECT
  //$sql = $conn->prepare("SELECT uid,mail,name FROM $tabla WHERE $campoBusqueda = :Email");
  //$sql->execute(array('Email' => $email));
  //$resultado = $sql->rowCount();
  //INSERT
  $nombres = explode(",", $nombre);
  $cordenadas = explode(",", $email);
  for($i=0;$i<count($nombres);$i++){    
    $sql = $conn->prepare(" INSERT INTO users (uid,mail,name) VALUES (NULL,:Nombre ,:Email )");
    $sql->execute(array('Nombre'=>$nombres[$i],'Email' => $cordenadas[$i]));
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
  return true;
}
//function helloDonAndres($algo){
//				return 'Hello, Don ' . $name;
//}
// Use the request to (try to) invoke the service
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>