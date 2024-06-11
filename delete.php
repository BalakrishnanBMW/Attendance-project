<?php 
require 'db/conn.php';
$title = "Delete record";
include 'includes/header.php';
require_once 'includes/auth_check.php';

if(!isset($_GET['id'])){
	include 'includes/errormessage.php';
	header("Location:viewrecords.php");
	exit();
}
else
{
	$id = $_GET['id'];
	
	$res = $crud->delete($id);
	if($res)
	{
?>
		<br/>
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
		  Record Successfully deleted !
		  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		<br/>
	<a href="viewrecords.php" class="btn btn-info"> Back to List </a>
<?php
	}
	else
	{
		include 'includes/errormessage.php';
	}
}

?>

<?php include 'includes/footer.php' ?>