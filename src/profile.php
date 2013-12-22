<?php 
require_once("src/config.php");
//print_r($odb);

if ($_SESSION['user'] == $user) {

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
			<div class="span3 center">
				<div>
					<span class="profile-picture">
						<img src="<?php echo $_SESSION['avatar']; ?>" alt="<?php echo $user; ?>" class="editable editable-click editable-empty" id="avatar">
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
					<div class="grid4">
						<span class="bigger-175 blue"><?php echo $triners; ?></span>

						<br>
						Triners
					</div>

					<div class="grid4">
						<span class="bigger-175 blue"><?php echo $parvada; ?></span>

						<br>
						Parvada
					</div>

					<div class="grid4">
						<span class="bigger-175 blue"><?php echo $bandada; ?></span>

						<br>
						Bandada
					</div>
				</div>

				<div class="hr hr16 dotted"></div>
				<div class="profile-contact-links align-left">
					<p><?php echo $descripcion; ?></p>
				</div>

			</div>
		</div>
	</div>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/ace-elements.min.js"></script>
	<script src="js/ace.min.js"></script>
	<script src="js/x-editable/bootstrap-editable.min.js"></script>
	<script src="js/x-editable/ace-editable.min.js"></script>
	<script src="js/jquery.maskedinput.min.js"></script>
	<script src="js/block.js" type="text/javascript"></script>
	<script src="js/toastr.js"></script>
	<script src="js/chosen.jquery.min.js"></script>
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
	<script type="text/javascript">
			$(function() {
			
				//editables on first profile page
				$.fn.editable.defaults.mode = 'inline';
				$.fn.editableform.loading = "<div class='editableform-loading'><i class='light-blue icon-2x icon-spinner icon-spin'></i></div>";
			    $.fn.editableform.buttons = '<button type="submit" class="btn btn-info editable-submit"><i class="icon-ok icon-white"></i></button>'+
			                                '<button type="button" class="btn editable-cancel"><i class="icon-remove"></i></button>';    
				// *** editable avatar *** //
				try {//ie8 throws some harmless exception, so let's catch it
			
					//it seems that editable plugin calls appendChild, and as Image doesn't have it, it causes errors on IE at unpredicted points
					//so let's have a fake appendChild for it!
					if( /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ) Image.prototype.appendChild = function(el){}
			
					var last_gritter
					$('#avatar').editable({
						type: 'image',
						name: 'avatar',
						value: null,
						image: {
							//specify ace file input plugin's options here
							btn_choose: 'Change Avatar',
							droppable: true,
							/**
							//this will override the default before_change that only accepts image files
							before_change: function(files, dropped) {
								return true;
							},
							*/
			
							//and a few extra ones here
							name: 'avatar',//put the field name here as well, will be used inside the custom plugin
							max_size: 110000,//~100KB
							on_error : function(code) {//on_error function will be called when the selected file has a problem
								if(last_gritter) $.gritter.remove(last_gritter);
								if(code == 1) {//file format error
									//last_gritter = $.gritter.add({
										// title: 'El archivo no es una imagen!',
										// text: 'Por favor escoje una imagen jpg|gif|png image!',
										// class_name: 'gritter-error gritter-center'
										toastr.warning('Por favor escoje una imagen jpg|gif|png image!','El archivo no es una imagen!');
									// });
								} else if(code == 2) {//file size rror
									//last_gritter = $.gritter.add({
										// title: 'El archivo es muy grande!',
										// text: 'La imagen no debe exceder los 100Kb!',
										// class_name: 'gritter-error gritter-center'
										toastr.error('La imagen no debe exceder los 100Kb!','El archivo es muy grande!');
									// });
								}
								else {//other error
								}
							},
							on_success : function() {
								$.gritter.removeAll();
							}
						},
					    url: function(params) {
							// ***UPDATE AVATAR HERE*** //
							//You can replace the contents of this function with examples/profile-avatar-update.js for actual upload
			
			
							var deferred = new $.Deferred
			
							//if value is empty, means no valid files were selected
							//but it may still be submitted by the plugin, because "" (empty string) is different from previous non-empty value whatever it was
							//so we return just here to prevent problems
							var value = $('#avatar').next().find('input[type=hidden]:eq(0)').val();
							if(!value || value.length == 0) {
								deferred.resolve();
								return deferred.promise();
							}
			
			
							//dummy upload
							setTimeout(function(){
								if("FileReader" in window) {
									//for browsers that have a thumbnail of selected image
									var thumb = $('#avatar').next().find('img').data('thumb');
									if(thumb) $('#avatar').get(0).src = thumb;
								}
								
								deferred.resolve({'status':'OK'});
			
								// if(last_gritter) $.gritter.remove(last_gritter);
								// last_gritter = $.gritter.add({
								// 	title: 'Avatar Updated!',
								// 	text: 'Uploading to server can be easily implemented. A working example is included with the template.',
								// 	class_name: 'gritter-info gritter-center'
								// });
								//console.log(thumb);
								$.post(
									"src/proceso.php",
									{image: thumb},
									function(resul){
										if (resul == 1) {
											toastr.success("Cambio hecho");
										}else{
											toastr.error("ha habido un pequeño fallo");
										}
									});
								
							 } , parseInt(Math.random() * 800 + 800))
			
							return deferred.promise();
						},
						
						success: function(response, newValue) {
						}
					})
				}catch(e) {}
				///////////////////////////////////////////
				$('#user-profile-3')
				.find('input[type=file]').ace_file_input({
					style:'well',
					btn_choose:'Change avatar',
					btn_change:null,
					no_icon:'icon-picture',
					thumbnail:'large',
					droppable:true,
					before_change: function(files, dropped) {
						var file = files[0];
						if(typeof file === "string") {//files is just a file name here (in browsers that don't support FileReader API)
							if(! (/\.(jpe?g|png|gif)$/i).test(file) ) return false;
						}
						else {//file is a File object
							var type = $.trim(file.type);
							if( ( type.length > 0 && ! (/^image\/(jpe?g|png|gif)$/i).test(type) )
									|| ( type.length == 0 && ! (/\.(jpe?g|png|gif)$/i).test(file.name) )//for android default browser!
								) return false;
			
							if( file.size > 110000 ) {//~100Kb
								return false;
							}
						}
			
						return true;
					}
				})
				.end().find('button[type=reset]').on(ace.click_event, function(){
					$('#user-profile-3 input[type=file]').ace_file_input('reset_input');
				})
				.end().find('.date-picker').datepicker().next().on(ace.click_event, function(){
					$(this).prev().focus();
				})
				$('.input-mask-phone').mask('(999) 999-9999');
			});
		</script>
</body>
</html>
<?php }else{
	include "profile1.php";
}
?>