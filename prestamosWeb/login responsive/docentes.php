<!DOCTYPE html>
<html>
<head>
  <title>Administracion de usuarios</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <meta charset="UTF-8">
  <link href="css/flick/jquery-ui-1.10.2.custom.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

  <script src="js/jquery-1.9.1.js"></script>
  <script src="js/jquery-ui-1.10.2.custom.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <script type="text/javascript">
  
  $(document).ready(function() {
      //$(".objeto")  llama a todoslos que tan como clase eso
      //$("#objeto")  llama a al que tan como id eso
      $("#editar").dialog({
        autoOpen: false,
        width: 400,
        height: 340,
        buttons: [

        {
          text: "Cancelar",
          click: function() {
            $( this ).dialog( "close" );
          }
        },
        
        
        ]
      });

      $("#guardar").click(function(){
        var cedula=$("#cedula").val();
        if(cedula!=""){
         if (/^([0-9])*$/.test(cedula)){
          if(cedulaestaenbd()==true){
           var nombre=$("#nombre").val();
           if (nombre!=""){
            var email=$("#email").val();
            if(email!=""){
              if (/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/.test(email)){
                var centros=$("#centros").val(); 
                if(centros!=""){
                  var tipo=$("#tipo").val();
                  if(tipo!=""){
                     guardarusuario();
                  }else{
                  alert("Elija un tipo");  
                  }
                }else{
                  alert("Elija un centro");  
                }
              }else{
                alert("El E-mail es incorrecto");  
              }
            }else{
              alert("Digite un E-mail");
            }
          }else{
            alert("Digite el nombre");  
          }
        }else{
          alert("Esta cedula ya esta registrada en la base de datos");
        }
      }else{
        alert("Debe digitar un numero en el campo cedula");
      }
    }else{
      alert("Digite el numero de cedula");
    }
  });

function guardarusuario(){
  var datos=$("#usuarios").serialize();
 
   $.ajax({
    url: 'guardarusuario.php',
    type: 'POST',
    data: datos, 


    success: function(msj) {
      if(parseInt(msj)=="0"){
        alert("Error al guardar");
      }
      if(parseInt(msj)=="1"){
        $("#nombre").val("");
        alert("Gurdado corectamente");
      }
    }
  });
}


function guardar(){
  var datos=$("#centros").serialize();
  $.ajax({
    url: 'guardar.php',
    type: 'POST',
    data: datos,
    success: function(msj) {
      if(parseInt(msj)=="0"){
        alert("Error al guardar");
      }
      if(parseInt(msj)=="1"){
        $("#nombre").val("");
        buscar_centros();
        alert("Gurdado corectamente");
      }
    }
  });
}

function cedulaestaenbd(){
  var datos=$("#cedula").serialize();
  var retorno;
  $.ajax({
    url: 'consultarced.php',
    type: 'POST',
    data: datos,
    async: false,
    success: function(msj) {
      if(parseInt(msj)=="1"){
       retorno=false;
     }else{
      retorno= true;
    }
  }
});
  return retorno;
}




buscar_centros();
function buscar_centros(){
  $("#loadcentros").load("busquedas/paginacion_clientes.php");
}

$("#Actualizar").click(function(){
  var datos=$("#editarform").serialize();

  $.ajax({
    url: 'actualizar.php',
    type: 'POST',
    data: datos,

    success: function(msj) {
      if(parseInt(msj)=="0"){
        alert("Error al actualizar");
      }
      if(parseInt(msj)=="1"){
        $("#nombre1").val("");
        buscar_centros();
        alert("Actualizado corectamente");
        $("#editar").dialog( "close" );

      }

    }
  });

});



});


</script>


</head>
<body>


  <div class="container">
    <div class="span12">


      <div class="navbar">
        <div class="navbar-inner">
          <div class="container" style="width: auto;">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </a>
            <a class="brand" href="#">Adminsitrador arrocera</a>
            <div class="nav-collapse">
              <ul class="nav">
                <li >
                  <a href="index.php">Centros</a>
                </li>
                <li class="active">
                  <a href="docentes.php">Usuarios</a>
                </li>


              </ul>

            </div><!-- /.nav-collapse -->
          </div>
        </div><!-- /navbar-inner -->
      </div><!-- /navbar -->





      <form id="usuarios">
        <fieldset>
          <legend>Creacion de Clientes</legend>
          <label>Cédula</label>
          <input type="text" id="cedula" name="cedula"  placeholder="Escriba la cedula">
          <label>Nombre</label>
          <input type="text" id="nombre" name="nombre"  placeholder="Escriba el nombre">
          <label>Celular</label>
          <input type="text" id="celular" name="celular"  placeholder="Celular">
          <label>Localizacion</label>
           <input type="text" id="localizacion" name="localizacion"  placeholder="Localizacion">
		   <label>Comentarios</label>
           <input type="text" id="comentarios" name="comentarios"  placeholder="Comentarios">
		  <!--<div id="loadcentros"></div>
          <label>Tipo</label>
          <select name="tipo" id="tipo">
            <option value=""></option>
            <option value="docente">Docente</option>
            <option value="otro">otro</option>
          </select>
		  -->
          <br>
          <button type="button" id="guardar"  class="btn btn-primary">Guardar</button>
        </fieldset>
      </form>





      <div id="load_centros">

      </div>

    </div>







  </div>

  
  <div id="editar">
    <form id="editarform">
      <input type="hidden" name="codigo" id="codigo">
      <label>Nombre</label>
      <input type="text" name="nombre1" id="nombre1">
      <br>
      <input type="button" value="Actualizar" id="Actualizar" >
    </form>  
  </div>
</body>
</html>