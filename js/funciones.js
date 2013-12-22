function validaForm(){
    // Campos de texto
    if($("#email").val() == ""){
        toastr.error('El correo no puede estar vacio');
        $("#email").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
        return false;
    }
    if($("#contra").val() == ""){
        toastr.error('La contraseña no puede estar vacia');
        $("#contra").focus();
        return false;
    }
    return true; // Si todo está correcto
}

function RvalidaForm(){
    // Campos de texto
    if($("#r_email").val() == ""){
        toastr.error('El campo correo no puede estar vacio');
        $("#r_email").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
        return false;
    }
    if($("#r_user").val() == ""){
        toastr.error('El campo usuario no puede estar vacio');
        $("#r_user").focus();
        return false;
    }
    if($("#r_pass").val() == ""){
        toastr.error('La contraseña no puede estar vacia');
        $("#r_pass").focus();
        return false;
    }
    return true; // Si todo está correcto
}

function login(){
	$('#respo').block();
	if(validaForm()){ 
	    $.post("src/proceso.php",$("#login").serialize(),function(res){
	        if(res == 'error01'){
	        	toastr.error('Datos incorrectos');
	        } else {
	            var dir = './';
	            window.location=dir;
	        }
	    });
	}
}

function pass(){
	var p1 = $('#r_pass').val();
	var p2 = $('#r_pass1').val();
	if (p1 != p2) {
		toastr.error("Tus contraseñas no son iguales");
	};
}

function regis(){
	$('#respo').block();
	if ($('#r_con').is(':checked')) {
		if(RvalidaForm()){ 
		    $.post("src/proceso.php",$("#registro").serialize(),function(resi){
		        if(resi == 1){
		        	$('#respo').unblock();
		        	toastr.success('Te has registrado correctamente');
		        } else if(resi == 3){
		        	$('#respo').unblock();
		            toastr.error('Ese correo ya esta registrado');
		        } else if(resi == 4){
		        	$('#respo').unblock();
		            toastr.error('Ese nombre de usuario ya esta utilizado');
		        } else{
		        	$('#respo').unblock();
		            toastr.error('Intenta cambiar algo de tu informacion');
		        }
		    });
		}	
	}else{
		$('#respo').unblock();
		toastr.error("No has aceptado los terminos y condiciones");	
	}
}

function camCon(){
	var correo = $('#c_email').val();
	$.post("src/proceso.php",$('#rest_con').serialize(),function(res2){
		if (res2 == 1) {
			toastr.success("Se ha mandado correctamente a tu correo");
		}else if(res2 == 2){
			toastr.warning('Ese correo no esta registrado en nuestra base de datos')
		}else{
			toastr.error('Ha ocurrido un error, Intenta de nuevo mas tarde');
		}
	});
}

function strin(e) {
	tecla = (document.all) ? e.keyCode : e.which;
	if (tecla==13){
		var msg = $('#sendTriner').val();
		$('#sendTriner').val("");
		$('#triners').load("src/publicacion2.php");
		$.post("src/proceso.php",{texto: msg},function(res3){
			if (res3 == 1) {
				toastr.error('Ha ocurrido un error, Intenta de nuevo mas tarde');
			}else if(res3 == 3){
				toastr.error('Tienes que llenar el campo de publicar');
			}else if(res3 == 2){
				toastr.success('Publicacion hecha');
			}
		});
	}
}

// $(document).ready(function() {
//  	$("#triners").load("src/publicacion.php");
// 	var refreshId = setInterval(function() {
// 		$("#triners").load('src/publicacion.php?randval='+ Math.random());
// 	}, 800);
// 	$.ajaxSetup({ cache: false });
// });

// setInterval(function()//cada cierto tiempo se llama a esta funcion para ver las nuevas publicaciones
//    { 
//       $("#triners").load("src/publicacion.php");
//    },4000); 

function respuestas(valor){
	//console.log(valor);
	$("#"+valor).fadeIn("slow");
}

function sendrespu(var1){
	var var2 = $("."+var1).val();
	$("."+var1).val(" ");
	$("#"+var1).fadeOut("slow");
	$('#triners').load("src/publicacion2.php");
	//console.log(var1, var2);
	$.post("src/proceso.php",{texto_resp: var2, id_triner: var1},function(res4){
		if (res4 == 1) {
			toastr.success('Publicacion hecha');
		}else if (res4 == 2) {
			toastr.error('Ha ocurrido un error, Intenta de nuevo mas tarde');
		}else if(res4 == 3){
			toastr.error('Tienes que llenar el campo de respuesta');
		}
	})
}

// $(document).ready(function(){
// setInterval(funcion,5000);
// });

// function loadtriner(){
// $("#triners").load("src/publicacion2.php");
// 

function recargar(){
	$.post("src/edit_profile.php", function(data){
		$("#resultado").html(data);
	});
}