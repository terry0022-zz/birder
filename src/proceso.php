<?php
session_start();
require_once("config.php");
header("Content-Type: text/html;charset=utf-8");

if (isset($_POST['usuario'])) {
	$user = $_POST['usuario'];
	$pass = $_POST['contra'];
	$pass = md5($pass);

    $sql = "SELECT * FROM usuarios WHERE correo = '$user' AND contrasena = '$pass';";
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
            echo $_SESSION['user'];
        }
    }else{
        echo "error01";
    }
}

if (isset($_POST['r_email'])) {
    $mail = $_POST['r_email'];
    $user = $_POST['r_user'];
    $pass = $_POST['r_pass'];
    $pass = md5($pass);
    $id_user = uniqid();
    $fecha = date("Y-m-d H:i:s");
    $session = 'no';
    $l_session = '';
    $avatar = 'img/birderblack.png';

    $sql = "SELECT * FROM usuarios WHERE correo = '$mail';";
    $result = $odb->query($sql);
    if ($result->rowCount() > 0) {
        echo "3";
    }else{
        $sql = "SELECT * FROM usuarios WHERE nombre = '$user';";
        $result = $odb->query($sql);
        if ($result->rowCount() > 0) {
            echo "4";
        }else{
            $sql = "INSERT INTO usuarios VALUES ('$id_user','$mail','$user','$avatar','$pass','$fecha','$l_session','$session','si','0','0','0',' ');";
            $query1 = $odb->prepare($sql);
            $result11 = $query1->execute();
            if (isset($result11)){
                echo "1";
            }else{
                echo "2";
            }
        }
    }
}

if (isset($_POST['c_email'])) {
    $mail = $_POST['c_email'];

    $sql = "SELECT * FROM usuarios WHERE correo = '$mail';";
    $result = $odb->query($sql);
    if ($result->rowCount() == 1) {
        $pass1 = uniqid(5);
        $pass = md5($pass1);

        $sql = "UPDATE usuarios SET contrasena = '$pass' WHERE correo = '$mail';";
        $query2 = $odb->prepare($sql);
        $result2 = $query2->execute();


        $titulo = 'Reestablaser Contraseña';
        $mensaje = 'Tu contraseña nueva es: '.$pass1."\n Es recomendable que la cambies pronto";
        $cabeceras = 'From: terryrockstar@birder.com' . "\r\n";
        mail($mail, $titulo, $mensaje, $cabeceras);
        if (1 == 1) {
            echo "1";
        }else{
            echo "3";
        }
    }else{
        echo "2";
    }

}

if (isset($_POST['texto'])){
    $texto = $_POST['texto'];
    if ($texto == '') {
        echo "3";
    }else{
        $id_triner = uniqid();
        $id_user = $_SESSION['id_user'];
        $fecha = date("Y-m-d H:i:s");
        $texto = str_replace("'", '-', $texto);

        $sql = "INSERT INTO triner VALUES ('$id_triner','$id_user','$texto','$fecha','/');";
        $query4 = $odb->prepare($sql);
        $result4 = $query4->execute();

        if ($result4) {
            $sqlot1 = "SELECT * FROM triner WHERE id_user = '$id_user';";
            $resot1 = $odb->query($sqlot1);
            $numtrin = $resot1->rowCount();
            $sqlot = "UPDATE usuarios SET triners = '$numtrin' WHERE id_user = '$id_user';";
            $resot = $odb->prepare($sqlot);
            $dealot = $resot->execute();
            echo "2";
        }else{
            echo "1";
        }
    }
}else{
    echo "";
}

if (isset($_POST['image'])) {
    $avatar = $_POST['image'];
    $_SESSION['avatar'] = $avatar;
    $id_user = $_SESSION['id_user'];

    $sql = "UPDATE usuarios SET avatar = '$avatar' WHERE id_user = '$id_user';";
    $query3 = $odb->prepare($sql);
    $result3 = $query3->execute();
    if (isset($result3)) {
        echo "1";
    }else{
        echo "2";
    }
}

if (isset($_POST['texto_resp'])) {
    $texto = $_POST['texto_resp'];
    $id_triner = $_POST['id_triner'];
    $id_respu = uniqid();
    $fecha = date("Y-m-d H:i:s");
    $id_user = $_SESSION['id_user'];

    $sql = "SELECT id_user FROM triner where id_triner = '$id_triner';";
    $resultus = $odb->query($sql);
    if ($resultus->rowCount() >= 1) {
        foreach ($resultus as $row) {
            $id_usu = $row['id_user'];
        }
    }

    $sqlinsert = "INSERT INTO triner VALUES ('$id_respu','$id_user','$texto','$fecha','$id_triner');";
    $resultins = $odb->prepare($sqlinsert);
    $deal = $resultins->execute();
    if (isset($deal)) {
        $sqlot1 = "SELECT * FROM triner WHERE id_user = '$id_user';";
        $resot1 = $odb->query($sqlot1);
        $numtrin = $resot1->rowCount();
        $sqlot = "UPDATE usuarios SET triners = '$numtrin' WHERE id_user = '$id_user';";
        $resot = $odb->prepare($sqlot);
        $dealot = $resot->execute();
        echo "1";
    }else{
        echo "2";
    }
}else{
    echo"";
}

if (isset($_POST['btnvolar'])) {
    $user_a = $_POST['id_user_a'];
    $user_b = $_POST['id_user_b'];
    $id_parvada = uniqid();
    $fecha = date("Y-m-d H:i:s");

    $query = "INSERT INTO parvada VALUES ('$id_parvada','$user_a','$user_b','$fecha')";
    $resul = $odb->prepare($query);
    $insert = $resul->execute();
    if ($insert) {
        $link = "../".$user_b;
        header("Location: $link");
    }else{
        echo "error";
    }
}

if (isset($_POST['btnaterrizar'])) {
    $user_a = $_POST['id_user_a'];
    $user_b = $_POST['id_user_b'];
    $id_parvada = uniqid();
    $fecha = date("Y-m-d H:i:s");

    $query = "DELETE FROM parvada WHERE id_user_a = '$user_a' AND id_user_b = '$user_b';";
    $resul = $odb->prepare($query);
    $del = $resul->execute();
    
    if ($resul) {
        $link = "../".$user_b;
        header("Location: $link");
    }else{
        echo "error";
    }
}

if (isset($_POST['gpass']) || isset($_POST['gnom']) || isset($_POST['gdesc'])) {
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
            $dir = "../".$user;
            header("Location: $dir");
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
        $dir = "../".$user;
        header("Location: $dir");
    }

    if (isset($_POST['descp'])) {
             
        $descripcion=$_POST['descp'];
        $query_desc="UPDATE usuarios set descripcion='$descripcion' where id_user='$id_u' ";
        $result3 = $odb->prepare($query_desc);
        $rsss = $result3->execute();

        echo "Tu descripcion ha sido actualizada";
        $dir = "../".$user;
        header("Location: $dir");

    }
}