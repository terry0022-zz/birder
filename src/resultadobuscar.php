<?php 
session_start(); 
?>
<!doctype html>
<!-- este es el resultado de busqueda la vista-->
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>The Birder-Resultados</title>
	<link href="img/birderterry.png" type="image/x-icon" rel="shortcut icon" />
	<meta content="User login page" name="description">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/bootstrap-responsive.min.css">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/ace.min.css" rel="stylesheet">
	<link href="css/ace-responsive.min.css" rel="stylesheet">
	<link href="css/ace-skins.min.css" rel="stylesheet">
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
</head>
<body>
	<?php 
	if (isset($_SESSION['user'])) {
		include"src/header.php";
	}else{
		include"src/header1.php";
	}
	?>
	<div class="page-content" align="center">
		<div class="page-header position-relative">
			<h1>
				Resultados:
				<small>
					<i class="icon-double-angle-right"></i>
					tu busqueda ha arrojado:
				</small>
			</h1>
		</div>
			
		<div class="resultado" align="center">		         
         <?php 
			session_start();
			require_once("src/config.php");

			if(isset($_POST['tema'])){
				$tema = $_POST['tema'];
				echo "Usuarios";

			 	$sql = "SELECT nombre FROM usuarios WHERE nombre LIKE '%$tema%';";
			 	$res = $odb->query($sql);
			  	foreach($res as $row) {
			   		echo "Usuarios:<br>".$row['id_user'].'<br>';
			    }

			    echo "Super-Triners";
			 
				$sql = "SELECT st FROM supretriner WHERE st LIKE '%$tema%';";
				$res = $odb->query($sql);
			  	foreach($res as $row) {
			   		echo "Triners:<br>".$row['publicacion'].'<br>';
			    }
			    $odb=null; 
			} else {  
				echo "error1"; 
			} 
		?>
	</div>
		<div class="page-header position-relative" align="center">
			<div class="span6" align="center">
				<h3 class="page-header position-relative"></h3>
				<p>
					<span class="badge">1</span>
					<span class="badge badge-success">2</span>
					<span class="badge">1</span>
					<span class="badge badge-success">2</span>
					<span class="badge">1</span>
					<span class="badge badge-success">2</span>
					<span class="badge">1</span>
					<span class="badge badge-success">2</span>
					<span class="badge">1</span>
					<span class="badge badge-success">2</span>
					<span class="badge">1</span>
					<span class="badge badge-success">2</span>
					<span class="badge">1</span>
					<span class="badge badge-success">2</span>
					<span class="badge">1</span>
					<span class="badge badge-success">2</span>
					<span class="badge">1</span>
					<span class="badge badge-success">2</span>
					<span class="badge">1</span>
				</p>
				</div>
		</div>
	</div>
</body>
</html>
