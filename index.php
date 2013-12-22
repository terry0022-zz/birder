<?php
require 'vendor/autoload.php';
//require_once('src/config.php');
session_start();

$app = new \Slim\Slim();

if (isset($_SESSION['user'])) {

	$app->get('/', function () {
	include"src/inicio.php";
	});

	$app->get('/:user', function ($user) {
		include "src/profile.php";
	});	

}else{
	$app->get('/', function () {
		include "src/login.php";
	});

	$app->get('/:usera', function($user){
		include"src/profile1.php";
	});
}

$app->run();
?>