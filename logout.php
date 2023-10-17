<?php
	require_once __DIR__.DIRECTORY_SEPARATOR.'header.php';
	session_start();
	session_unset();
	session_destroy();
	header('Location:/index');
?>