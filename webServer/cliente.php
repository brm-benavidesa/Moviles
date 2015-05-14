<?php
    header("P3P: CP=\"ALL DSP COR PSAa PSDa OUR NOR ONL UNI COM NAV\"");
    ini_set('date.timezone', 'America/Bogota');
    ini_set('E_ERROR', 1);
    include("nusoap/nusoap.php");
    session_start();
      $cliente = new nusoap_client('http://127.0.0.1:8080/benabides/webServer/index.php/?wsdl', 'WSDL');
		$cliente->http_encoding='utf-8';
		$cliente->defencoding='utf-8';
		$cliente->decode_utf8 = false;
    $resultado = array();
		$resultado = $cliente->call('ValidarEmail', array('email' => $_POST['correo']));
//    if(!isset($resultado["Nombre"])&& !isset($resultado["email"])){
//      echo " Debo Registrarme";
//    }else{
//      echo "Nombre: {$resultado["Nombre"]} -- Email: {$resultado["email"]}";
//    }
    //$datos = explode("//&&~nestumNestle~&&//", $resultado);
    var_dump($resultado);
    echo "<pre> Hola mundo";
      print_r($resultado);
    echo "</pre>";
?>
