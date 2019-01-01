<?php 
	session_start();

	//Database connection w/ constants 
	define('DB_HOST','127.0.0.1');
	define('DB_USER','root');
	define('DB_PASS','');
	define('DB_NAME','davidberrios_db');

	$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	




	require_once('core/controller/Controller.php');
	require_once('core/model/Model.php');
	require_once('core/controller/MessageController.php');
	require_once('core/model/MessageModel.php');