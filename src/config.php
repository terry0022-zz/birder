<?php
//Conexion en localhost
$dsn = 'mysql:dbname=birder;host=localhost;';
$username = 'root';
$password = '12345';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
); 

try {
    $odb = new PDO($dsn, $username, $password, $options); // also allows an extra parameter of configuration
    $odb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die('Could not connect to the database:<br/>' . $e);
}

// Conexion en http://thebirder.rvhost.com.ar/
// $dsn = 'mysql:dbname=u799119477_bird;host=mysql.rvhost.com.ar;';
// $username = 'u799119477_root';
// $password = 'birder22-';
// $options = array(
//     PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
// ); 

// try {
//     $odb = new PDO($dsn, $username, $password, $options); // also allows an extra parameter of configuration
//     $odb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch(PDOException $e) {
//     die('Could not connect to the database:<br/>' . $e);
// }


//Conexion en http://thebirder.bl.ee/
// $dsn = 'mysql:dbname=u162049606_bird;host=mysql.hostinger.mx;';
// $username = 'u162049606_root';
// $password = 'birder22-';
// $options = array(
//     PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
// ); 

// try {
//     $odb = new PDO($dsn, $username, $password, $options); // also allows an extra parameter of configuration
//     $odb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch(PDOException $e) {
//     die('Could not connect to the database:<br/>' . $e);
// }

?>
