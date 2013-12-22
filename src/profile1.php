<?php 
require("config.php");
$sql = "SELECT * FROM usuarios WHERE nombre = '$user';";
$result = $odb->query($sql);
if ($result->rowCount() == 1) {
	foreach ($result as $item) {
		$id_user = $item['id_user'];
		$bandada = $item['bandada'];
		$parvada = $item['parvada'];
		$triners = $item['triners'];
		$avatar = $item['avatar'];
		$descripcion = $item['descripcion'];
 	}
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>The Birder</title>
	<link href="img/birderterry.png" type="image/x-icon" rel="shortcut icon" />
	<meta content="User login page" name="description">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<!-- <link rel="stylesheet" href="css/fons-googl.css"> -->
	<link href="css/ace.min.css" rel="stylesheet">
	<link href="css/ace-responsive.min.css" rel="stylesheet">
	<link href="css/ace-skins.min.css" rel="stylesheet">
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<link href="css/toastr.css" rel="stylesheet">
</head>
<body>
	<?php 
	if (isset($_SESSION['user'])) {
		include"header.php";
	}else{
		include"header1.php";
	}
	?>
	<div class="row-fluid">
		<div class="span12"></div>
	</div>
	<div class="main-container container-fluid">
		<div class="span3">
			<div class="row-fluid">
				<?php include"src/busqueda.php"; ?>
				<div class="span12" style="margin:0px;">
					<div class="widget-box pricing-box-small">
						<div class="widget-header header-color-blue">
							<h5 class="bigger lighter">Noticias</h5>
						</div>

						<div class="widget-body">
							<div class="widget-main no-padding">
								<ul class="unstyled list-striped pricing-table">
									<li> #Algo </li>
									<li> #Mas </li>
									<li> #Que </li>
									<li> #Todo </li>
									<li> #Esto </li>
								</ul>
							</div>
							<div>
								<button type="button" class="btn btn-block btn-small btn-primary">
									Ver mas
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="span6">
			<!-- <div class="row-fluid control-group success">
				<span class="span12 input-icon input-icon-right">
					<input type="text" id="sendTriner" class="span12" placeholder="Trinea lo que piensas" name="sendTriner" onkeypress="strin(event)">
					<i class="icon-ok-sign"></i>
				</span>
			</div> -->
			<div class="row-fluid" id="triners1">
				<!-- aqui van los triners -->
				<?php
				$sql = "SELECT * FROM triner WHERE id_user = '$id_user';";
				$result = $odb->query($sql);
				if ($result->rowCount() >= 1) {
					foreach ($result as $item) {
						$publicacion = $item['publicacion'];
						$fecha_triner = $item['fecha'];
						$id_user_triner = $item['id_user'];

						$sql2 = "SELECT * FROM usuarios WHERE id_user = '$id_user_triner';";
						$result2 = $odb->query($sql2);
						foreach ($result2 as $item) {
							$nombre = $item['nombre'];
							$avatar = $item['avatar'];
						}
						echo '<div class="itemdiv dialogdiv">
							<div class="user">
								<img src="'.$avatar.'" alt="'.$nombre.'">
							</div>

							<div class="body">
								<div class="time">
									<i class="icon-time"></i>
									<span class="green">'.$fecha_triner.'</span>
								</div>

								<div class="name">
									<a href="./'.$nombre.'">'.$nombre.'</a>
								</div>
								<div class="text">'.$publicacion.'</div>

								<div class="tools">
									<a class="btn btn-minier btn-info" href="#">
										<i class="icon-only icon-share-alt"></i>
									</a>
								</div>
							</div>
						</div>';
					}
				}
				?>
			</div>
		</div>
		<div class="span3">
			<div class="span3 center">
				<div>
					<span class="profile-picture">
						<img src="<?php echo $avatar; ?>" alt="<?php echo $user; ?>" class="" id="avatar">
					</span>

					<div class="space-4"></div>

					<div class="width-80 label label-info label-large arrowed-in arrowed-in-right">
						<div class="inline position-relative">
							<a data-toggle="dropdown" class="user-title-label dropdown-toggle" href="#">
								<i class="icon-circle light-green middle"></i>
								<span class="white middle bigger-120"><?php echo $user; ?></span>
							</a>
						</div>
					</div>
				</div>

				<div class="space-6"></div>

				<div class="profile-contact-info">
					<div class="space-6"></div>
				</div>

				<div class="hr hr12 dotted"></div>

				<div class="clearfix">
					<div class="grid3">
						<span class="bigger-175 blue"><?php echo $triners; ?></span>

						<br>
						Triners
					</div>

					<div class="grid3">
						<span class="bigger-175 blue"><?php echo $parvada; ?></span>

						<br>
						Parvada
					</div>

					<div class="grid3">
						<span class="bigger-175 blue"><?php echo $bandada; ?></span>

						<br>
						Bandada
					</div>
				</div>

				<div class="hr hr16 dotted"></div>
				<div class="profile-contact-links align-left">
					<p><?php echo $descripcion; ?></p>
				</div>
				<br>
				<?php 
				if (isset($_SESSION['user'])) {
					
				$user_a = $_SESSION['user'];
				$sqlam = "SELECT * FROM parvada WHERE id_user_a = '$user_a' AND id_user_b = '$user';";
				$resam = $odb->query($sqlam);
				if ($resam->rowCount() == 0) {
				?>
				<form action="src/proceso.php" method="POST">
					<input type="hidden" value="<?php echo $user_a; ?>" name="id_user_a">
					<input type="hidden" value="<?php echo $user; ?>" name="id_user_b">
					<input type="submit" class="btn btn-success" value="Volar" name="btnvolar">
				</form>
				<?php
				}else{
				?>
				<form action="src/proceso.php" method="POST">
					<input type="hidden" value="<?php echo $user_a; ?>" name="id_user_a">
					<input type="hidden" value="<?php echo $user; ?>" name="id_user_b">
					<input type="submit" class="btn btn-danger" value="Aterrizar" name="btnaterrizar">
				</form>
				<?php
				} 
				}
				?>
			</div>
		</div>
	</div>
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
	<script src="js/block.js" type="text/javascript"></script>
	<script src="js/toastr.js"></script>
	<script src="js/funciones.js"></script>
</body>
</html>
<?php 
}else{
	include "src/error.php";
}
?>