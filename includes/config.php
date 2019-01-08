<?php 
	session_start();
	
	define('BASE_PATH',__DIR__.'/../');
	define('BASE_URL','http://localhost/davidberrios.com/');

	//Database connection w/ constants 
	define('DB_HOST','127.0.0.1');
	define('DB_USER','root');
	define('DB_PASS','');
	define('DB_NAME','davidberrios_db');

	$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);


	require_once(BASE_PATH.'core/controller/Controller.php');
	
	require_once(BASE_PATH.'core/controller/HelperController.php');

	require_once(BASE_PATH.'core/model/Model.php');
	require_once(BASE_PATH.'core/controller/MessageController.php');
	require_once(BASE_PATH.'core/controller/SectionController.php');
	require_once(BASE_PATH.'core/model/MessageModel.php');
	require_once(BASE_PATH.'core/model/SectionModel.php');
	