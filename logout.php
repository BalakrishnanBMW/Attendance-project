<?php
	require_once 'db/session.php';
	session_destroy();
	header("Location:index.php");
?>
