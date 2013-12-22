<?php 
session_start();
include 'config.php';
$user=$_SESSION['user'];
$iduser=$_SESSION['id_user'];
$query_us= "select * from usuarios where id_user= '$iduser' ";
$result = $odb->query($query_us);
if ($result->rowCount() > 0) {
    foreach ($result as $item) {
        $pass = $item['contrasena'];
        $nom= $item['nombre'];
        $id_u= $item['id_user'];
        //echo "este es el nombre $pass";
    }
}else{
    echo "error01";
}
if(isset($_POST['pass']) && isset($_POST['npass'])){
	$pass1=$_POST['pass'];
	$pass1=md5($pass1);
	$npass=$_POST['npass'];
	$npass=md5($npass);

	if ($pass === $pass1) {
		 $query_pass= "UPDATE usuarios set contrasena='$npass' where  id_user='$id_u'; ";
		 
		$result1 = $odb->prepare($query_pass);
		$rsss = $result1->execute();
		echo "Datos actualizados";
	}else{
		echo " La contraseña no es correcta";
	}
}
if (isset($_POST['nnom'])){
	$nnom=$_POST['nnom'];

	$query_nom= "UPDATE usuarios set nombre='$nnom' where  id_user='$id_u' ";
	$result2 = $odb->prepare($query_nom);
	$rsss = $result2->execute();
	echo "Datos actualizados";
}

if (isset($_POST['descp'])) {
		 
	$descripcion=$_POST['descp'];
	$query_desc="UPDATE usuarios set descripcion='$descripcion' where id_user='$id_u' ";
	$result3 = $odb->prepare($query_desc);
	$rsss = $result3->execute();

	echo "Tu descripcion ha sido actualizada";

}

if (isset($user)){
?>
<body>	
	<div class="main-container container-fluid">		
		<div class="span6">
			<div class="row-fluid control-group success" id="contenedor">
				<h1 class="header blue lighter bigger">Editar perfil</h1>
						<fieldset>
							<div class="control-group">	
									<span class="bigger-130 black">Editar contrase&ntilde;a:</span><a href="#" onclick="carga_op('1');"  class="width-20 pull-right btn btn-small btn-primary">Cambiar</a>
							</div><br>					
							<div class="control-group">
									<span class="bigger-130 black">Editar nombre:</span><a href="#" onclick="carga_op('2');" class="width-20 pull-right btn btn-small btn-primary">Cambiar</a>
							</div><br>
							<div class="control-group">
									<span class="bigger-130 black">Editar mi descripci&oacute;n:</span><a href="#" onclick="carga_op('3');" class="width-20 pull-right btn btn-small btn-primary">Cambiar</a>
							</div>
						</fieldset>
			</div>
			<script type="text/javascript">
				function carga_op(op){	
					//alert(op);
					var opciones= op ;
					$.post("src/opc_profile.php ", { variable: opciones }, function(data){
					$("#opciones").html(data);
					});			
				}
			</script>
			<hr>
			<!--mi codigo--> 
			<div id="opciones"> </div>
		</div>
<!--
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/ace-elements.min.js"></script>
	<script src="js/ace.min.js"></script>
	<script src="js/jquery-ui-1.10.3.custom.min.js"></script>
	<script src="js/jquery.ui.touch-punch.min.js"></script>
	<script src="js/jquery.gritter.min.js"></script>
	<script src="js/bootbox.min.js"></script>
	<script src="js/jquery.slimscroll.min.js"></script>
	<script src="js/jquery.easy-pie-chart.min.js"></script>
	<script src="js/jquery.hotkeys.min.js"></script>
	<script src="js/bootstrap-wysiwyg.min.js"></script>
	<script src="js/select2.min.js"></script>
	<script src="js/date-time/bootstrap-datepicker.min.js"></script>
	<script src="js/fuelux/fuelux.spinner.min.js"></script>
	<script src="js/x-editable/bootstrap-editable.min.js"></script>
	<script src="js/x-editable/ace-editable.min.js"></script>
	<script src="js/jquery.maskedinput.min.js"></script>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
-->
</body>
</html>
<?php }else{
	echo "visitas a ".$user;
}
?>