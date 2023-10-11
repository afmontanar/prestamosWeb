<?php 

require 'clases/Db.class.php';
require 'clases/Conf.class.php';
require 'clases/Filtros_web.php';

$bd=Db::getInstance();

 
$cedula=FW::rem($_POST["cedula"]);
$sql ="SELECT cedula from usurios WHERE cedula='$cedula'";
$stmt=$bd->ejecutar($sql);
$numerodefilas=mysql_num_rows($stmt);
if($numerodefilas==1){
	echo "1";
}else{
	echo "0";
}



 ?>