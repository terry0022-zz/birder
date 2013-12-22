<?php 
$op=$_POST['variable'];

				if ($op==1){

			?>

				<div class="span3">
						<form class="form-horizontal" name="contra" method="POST" action="src/proceso.php">
								<span class="bigger-130 black">Contrase&ntilde;a anterior </span><input class="form-field-icon-2" type="password" name="pass" placeholder="Contraseña anterior"/><br>
								<span class="bigger-130 black">Nueva contrase&ntilde;a</span><br><input class="form-field-icon-2" type="password" name="npass" placeholder="Contraseña anterior"/><br><br>
								<input class="width-20 pull-left btn btn-small btn-primary" value="Guardar" name="gpass"type= "submit">
 					
 						</form>	
 					</div>

 			<?php 
 			}
 				if($op==2){


 			?>		
 				<div class="span3">
						<form class="form-horizontal" name="nombre" method="POST" action="src/proceso.php">
								<!--<span class="bigger-130 black">Nombre anterior </span><input class="form-field-icon-2" type="text" name="nom" placeholder="Nombre anterior"/><br>-->
								<span class="bigger-130 black">Nuevo nombre</span><br><input class="form-field-icon-2" type="text" name="nnom" placeholder="Nuevo nombre"/><br><br>
								<input class="width-20 pull-left btn btn-small btn-primary" value="Guardar" name="gnom"type= "submit">
						</form>		
				</div>

			<?php
			}
				if($op==3){	
			?>
				<div class="span3">
						<form class="form-horizontal" name="desc" method="POST" action="src/proceso.php">
								<span class="bigger-130 black">Descripci&oacute;n</span><br>
								<textarea name="descp" placeholder="Agrega tu descripcion"></textarea><br><br>
								<input class="width-20 pull-left btn btn-small btn-primary" value="Guardar" name="gdesc"type= "submit">
						</form>		
				</div>
			<?php
		}
			?>

					
		</div>