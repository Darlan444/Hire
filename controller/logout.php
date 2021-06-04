<?php
	// Inicia seção
	session_start();

	$_SESSION  = array();

	// Apaga toda a seção relacionada ao user 
	session_destroy();

	// Redireciona para login
	header('location: ../index.php');
	exit;
?>