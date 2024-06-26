<?php
include_once 'db/session.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Attendance | <?php echo $title ?> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

	<link rel="stylesheet" href="css/site.css" />
	  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
  </head>
  <body>
	<div class="container">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">IT conference</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav me-auto">
        <a class="nav-link" href="index.php">Home</a>
        <a class="nav-link" href="viewrecords.php">Attendees</a>
      </div>
      <div class="navbar-nav me-2">
	<?php 
		if(!isset($_SESSION['userid'])) {
	?>
        	<a class="nav-link active" aria-current="page" href="login.php"> Login </a>
	<?php 
		} else {
	?>
		<a class="nav-link active" aria-current="page" href="#"><span> welcome <?php echo $_SESSION['username'] ?> </span></a>
        	<a class="nav-link active" aria-current="page" href="logout.php"> Logout </a>
	<?php } ?>
      </div>
    </div>
  </div>
</nav>

<br/>