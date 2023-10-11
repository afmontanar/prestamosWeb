
<?php 

require 'clases/Db.class.php';
require 'clases/Conf.class.php';
require 'clases/Filtros_web.php';

$bd=Db::getInstance();

$sql ="SELECT codigo, nombre from centros";
$stmt=$bd->ejecutar($sql);
?>
<select name="centros" id="centros">
<option value=''>Elija un centro</option>

<?php
while($fila=$bd->obtener_fila($stmt,0)){
?> 
 <option value="<?php echo $fila['codigo'] ?>"><?php echo $fila['nombre'] ?></option>
<?php
}
?>

</select>
<?php



 ?>