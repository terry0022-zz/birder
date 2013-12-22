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
	<link href="css/toastr.css" rel="stylesheet">
	<link href="css/ace-responsive.min.css" rel="stylesheet">
	<link href="css/ace-skins.min.css" rel="stylesheet">
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
</head>
<body class="login-layout">
	<div class="main-container container-fluid">
		<div class="main-content">
			<div class="row-fluid">
				<div class="span12">
					<div class="login-container">
						<div class="row-fluid">
							<div class="center">
								<h1>
									<!-- <i class="icon-leaf green"></i> -->
									<img src="img/birderterry.png" alt="" width="50px">
									<span class="red">The</span>
									<span class="white">Birder</span>
								</h1>
							</div>
						</div>
						<div class="space-6" id="respo"></div>
						<div class="row-fluid">
							<div class="position-relative">
								<div class="login-box visible widget-box no-border" id="login-box">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="icon-coffee green"></i>
												Iniciar Sesion
											</h4>

											<div class="space-6"></div>

											<form id="login" method="POST">
												<fieldset>
													<label>
														<span class="block input-icon input-icon-right">
															<input type="email" placeholder="Correo" class="span12" name="usuario" id="email">
															<i class="icon-user"></i>
														</span>
													</label>
													<label>
														<span class="block input-icon input-icon-right">
															<input type="password" placeholder="Contraseña" class="span12" name="contra" id="contra">
															<i class="icon-lock"></i>
														</span>
													</label>
													<div class="space"></div>
													<div class="clearfix">
														<button type="button" class="width-35 pull-right btn btn-small btn-primary" onclick="login();">
															<i class="icon-key"></i>
															Entrar
														</button>
													</div>
													<div class="space-4"></div>
												</fieldset>
											</form>

										</div><!--/widget-main-->

										<div class="toolbar clearfix">
											<div>
												<a class="forgot-password-link" onclick="show_box('forgot-box'); return false;" href="#">
													<i class="icon-arrow-left"></i>
													Olvide mi contraseña
												</a>
											</div>

											<div>
												<a class="user-signup-link" onclick="show_box('signup-box'); return false;" href="#">
													Deseo registrarme
													<i class="icon-arrow-right"></i>
												</a>
											</div>
										</div>
									</div><!--/widget-body-->
								</div><!--/login-box-->

								<div class="forgot-box widget-box no-border" id="forgot-box">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header red lighter bigger">
												<i class="icon-key"></i>
												Recibir contraseña
											</h4>

											<div class="space-6"></div>
											<p>
												Ingresa tu correo para recibir las intrucciones.
											</p>

											<form id="rest_con" method="POST">
												<fieldset>
													<label>
														<span class="block input-icon input-icon-right">
															<input type="email" placeholder="Correo" class="span12" id="c_email" name="c_email">
															<i class="icon-envelope"></i>
														</span>
													</label>

													<div class="clearfix">
														<button type="button" class="width-35 pull-right btn btn-small btn-danger" onclick="camCon();">
															<i class="icon-lightbulb"></i>
															Enviar!
														</button>
													</div>
												</fieldset>
											</form>
										</div><!--/widget-main-->

										<div class="toolbar center">
											<a class="back-to-login-link" onclick="show_box('login-box'); return false;" href="#">
												Regresar
												<i class="icon-arrow-right"></i>
											</a>
										</div>
									</div><!--/widget-body-->
								</div><!--/forgot-box-->

								<div class="signup-box widget-box no-border" id="signup-box">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header green lighter bigger">
												<i class="icon-group blue"></i>
												Registro de nuevo usuario
											</h4>

											<div class="space-6"></div>
											<p> Introduzca sus datos para comenzar: </p>

											<form method="POST" id="registro">
												<fieldset>
													<label>
														<span class="block input-icon input-icon-right">
															<input type="email" placeholder="correo" class="span12" name="r_email" id="r_email">
															<i class="icon-envelope"></i>
														</span>
													</label>

													<label>
														<span class="block input-icon input-icon-right">
															<input type="text" placeholder="Usuario 10 caracteres maximo" class="span12" name="r_user" id="r_user" maxlength="10">
															<i class="icon-user"></i>
														</span>
													</label>

													<label>
														<span class="block input-icon input-icon-right">
															<input type="password" placeholder="Contraseña" class="span12" name="r_pass" id="r_pass">
															<i class="icon-lock"></i>
														</span>
													</label>

													<label>
														<span class="block input-icon input-icon-right">
															<input type="password" placeholder="Repite contraseña" class="span12" name="r_pass1" id="r_pass1" onblur="pass();">
															<i class="icon-retweet"></i>
														</span>
													</label>

													<label>
														<input type="checkbox" id="r_con" name="r_con">
														<span class="lbl">
															Acepto los
															<a href="#">Terminos y condiciones</a>
														</span>
													</label>

													<div class="space-24"></div>

													<div class="clearfix">
														<button class="width-30 pull-left btn btn-small" type="reset">
															<i class="icon-refresh"></i>
															Cancel
														</button>

														<button type="button" class="width-65 pull-right btn btn-small btn-success" onclick="regis();">
															Registrar
															<i class="icon-arrow-right icon-on-right"></i>
														</button>
													</div>
												</fieldset>
											</form>
										</div>

										<div class="toolbar center">
											<a class="back-to-login-link" onclick="show_box('login-box'); return false;" href="#">
												<i class="icon-arrow-left"></i>
												Regresar
											</a>
										</div>
									</div><!--/widget-body-->
								</div><!--/signup-box-->
							</div><!--/position-relative-->
						</div>
					</div>
				</div><!--/.span-->
			</div><!--/.row-fluid-->
		</div>
	</div>
	<script src="js/jquery.js"></script>
	<script src="js/block.js" type="text/javascript"></script>
	<script src="js/toastr.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/ace-elements.min.js"></script>
	<script src="js/ace.min.js"></script>
	<script src="js/funciones.js"></script>
	<script type="text/javascript">
		function show_box(id) {
		 $('.widget-box.visible').removeClass('visible');
		 $('#'+id).addClass('visible');
		}
	</script>
</body>
</html>