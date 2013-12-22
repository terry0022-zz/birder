<?php 
session_start();
require_once("config.php");
$id_user = $_SESSION['id_user'];

	$sql = "SELECT * FROM triner WHERE id_user = '$id_user' AND padre = '/' ORDER BY fecha DESC;";
	$result21 = $odb->query($sql);
	if ($result21->rowCount() > 0) {
		foreach ($result21 as $item) {
			$publicacion = $item['publicacion'];
			$fecha_triner = $item['fecha'];
			$id_user_triner = $item['id_user'];
			$id_triner = $item['id_triner'];

			$sql22 = "SELECT * FROM triner WHERE padre = '$id_triner' ORDER BY fecha DESC;";
			$result22 = $odb->query($sql22);
			if ($result22->rowCount() >= 1) {
				$iconos1 = '<div class="tools1">
							<a class="btn btn-minier btn-inverse">
								<i class="icon-only icon-comment-alt"></i>
							</a>
						</div>';		
			}else{
				$iconos1 = '';
			}
			
			$sql2 = "SELECT * FROM usuarios WHERE id_user = '$id_user_triner';";
			$result2 = $odb->query($sql2);
			foreach ($result2 as $item) {
				$nombre = $item['nombre'];
				$avatar = $item['avatar'];
				//$avatar = $_SESSION['avatar'];
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
							<a class="btn btn-minier btn-info" onclick="respuestas('."'$id_triner'".');">
								<i class="icon-only icon-share-alt"></i>
							</a>
						</div>
						'.$iconos1.'
						<div id="'.$id_triner.'" style="display:none;">
							<input id="a'.$id_triner.'" class="'.$id_triner.' limited span12" style="resize:none;" data-maxlength="140" maxlength="140">
							<input type="button" class="btn btn-success" name="" value="responder" onclick="sendrespu('."'$id_triner'".')">
						</div>
					</div>
				</div>';
		}
	}
	?>