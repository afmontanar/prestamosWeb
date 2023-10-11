<style>
 .boton-eliminar{
  background-image: url(../img/eliminar.png);
  background-repeat: no-repeat;
  height: 25px;
  width: 25px;
 }

 </style>

<script>
function editar(codigo,nombre){

	$("#codigo").val(codigo);
	$("#nombre1").val(nombre);

	$("#editar").dialog( "open" );

}

	function eliminar(id,comentario){
	
     if(confirm('¿Seguro que desea eliminar el comentario?\n'+comentario)){
          var dataString = 'id='+id;
	    		//alert (dataString);return false;
	
	    		$.ajax({
	          type: "POST",
	          url: "eliminaciones/eliminarcomentario.php",
	          data: dataString,
	          success: function() {
						
	                     var donde=$('#areas_select').attr("value");
	                    $("#load_centros").load("busquedas/busqueda_comentarios.php?var="+donde);
	                     
	                 }
	           });
	
	
	        return false;
		 }
	
		
	}
	
</script>


<?php

require '../clases/Db.class.php';
require '../clases/Conf.class.php';
$bd=Db::getInstance();

function convertir_especiales_html($str){
  
   return $str;
}

if(!isset($_GET['nombre'])){
  	$sql = "select * from prestamo where estado='1'";
}else{
	$nombre=$_GET['nombre'];
	$sql = "select * from prestamo where nombre like '%$nombre%' estado='1'";
}

//echo $sql;



$stmt=$bd->ejecutar($sql);
?>

<div class="table-striped">
	<table width="910" id="mostrarestudiantes-table">
		<thead>

		<tr>
			<th>Ultima fecha</th>
			<th>Fecha prestamo</th>
			<th>Capital prestado</th>
            <th>Interes pactado</th>
            <th>Capital liquidacion</th>
            <th>Estado</th>
            <th>Ide Cliente</th>
            <th>Nombre</th>
            <th>Codigo prestamo</th>
            <th>Fecha liquidacion</th>

		</tr>
		</thead>
		<tbody>
		<?php
		//Print the contents
		$cont=0;
		$lcount="";
		while($fila=$bd->obtener_fila($stmt,0))
		{

			
			
    	?>
		   	
		<tr >
			
            <td style="padding-left:4px" width="80px"><?php echo $fila['ultimafecha'] ?></td>
            <td style="padding-left:4px" width="80px"><?php echo $fila['fechaprestamo']; ?>  </td>
            <td style="padding-left:4px" width="80px"><?php echo $fila['capitalprestado'] ?></td>
            <td style="padding-left:4px" width="80px"><?php echo $fila['interespactado']; ?>  </td>
            <td style="padding-left:4px" width="80px"><?php echo $fila['capitalliquidacion'] ?></td>
            <td style="padding-left:4px" width="80px"><?php echo $fila['estado']; ?>  </td>
            <td style="padding-left:4px" width="80px"><?php echo $fila['idCliente'] ?></td>
            <td style="padding-left:4px" width="80px"><?php echo $fila['nomape']; ?>  </td>
            <td style="padding-left:4px" width="80px"><?php echo $fila['codprestam'] ?></td>
            <td style="padding-left:4px" width="80px"><?php echo $fila['fechaLiquidacion']; ?>  </td>
           <!--<td>--> 
            	<!--<input class="btn btn-success" type="button" onclick="editar('<?php echo $fila['codigo'] ?>','<?php echo $fila['nombre'] ?>')" value="Editar" />-->
            	<!--<input class="btn btn-danger" type="button" onclick="eliminar('<?php echo $fila['codigo'] ?>','<?php echo $fila['nombre'] ?>')" value="Elminar" />-->
            <!--</td>--> 
            

         </tr>
		<?php
		} //while


		?>
	</tbody>
	</table>
	
	</div>
<?php

?>

