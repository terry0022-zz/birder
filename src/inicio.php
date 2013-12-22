<?php 
require_once("src/config.php");

if (isset($_SESSION['user'])) {
	$user = $_SESSION['user'];

    $sql = "SELECT * FROM usuarios WHERE nombre = '$user';";
    $result = $odb->query($sql);
    if ($result->rowCount() > 0) {
        foreach ($result as $item) {
            $_SESSION['user'] = $item['nombre'];
            $_SESSION['avatar'] = $item['avatar'];
            $_SESSION['id_user'] = $item['id_user'];
            $_SESSION['bandada'] = $item['bandada'];
            $_SESSION['parvada'] = $item['parvada'];
            $_SESSION['triners'] = $item['triners'];
            $_SESSION['descripcion'] = $item['descripcion'];
        }
    }else{
    	echo "";
    }
}

	$avatar = $_SESSION['avatar'];
    $id_user = $_SESSION['id_user'];
    $bandada = $_SESSION['bandada'];
	$parvada = $_SESSION['parvada'];
	$triners = $_SESSION['triners'];
	$descripcion = $_SESSION['descripcion'];
?>
<!doctype html>
<html lang="en">
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
	<?php include"header.php"; ?>
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
		<div class="span6" id="resultado">
			<div class="row-fluid control-group success">
				<span class="span12 input-icon input-icon-right">
					<input type="text" id="sendTriner" data-maxlength="140" class="span12 limited" maxlength="140" placeholder="Trinea lo que piensas" name="sendTriner" onkeypress="strin(event)">
					<i class="icon-ok-sign"></i>
				</span>
			</div>
			<div class="row-fluid" id="triners">
				<!-- aqui van los triners -->
				<?php include"src/publicacion.php"; ?>
			</div>
		</div>
		<div class="span3">
			
		</div>
	</div>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/ace-elements.min.js"></script>
	<script src="js/ace.min.js"></script>
	<script src="js/block.js" type="text/javascript"></script>
	<script src="js/toastr.js"></script>
	<script src="js/jquery.inputlimiter.1.3.1.min.js"></script>
	<div id="limiterBox" class="limiterBox" style="position: absolute; display: none;"></div>
	<script src="js/funciones.js"></script>
	<script type="text/javascript">
		$(function() {
			$('input[class*=limited]').each(function() {
				var limit = parseInt($(this).attr('data-maxlength')) || 100;
				$(this).inputlimiter({
					"limit": limit,
					remText: 'quedan %n caractere%s ...',
					limitText: 'en un maximo de : %n.'
				});
			});
		});
	</script>
</body>
</html>