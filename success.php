<?php 
$title = "Success";
require 'includes/header.php';
require 'db/conn.php';

if(isset($_POST['submit']))
{
	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$dob = $_POST['dob'];
	$email = $_POST['email'];
	$contact = $_POST['phone'];
	$speciality = $_POST['expert'];

	$isSuccess = $crud->insert($fname, $lname, $dob, $email, $contact, $speciality);

	if($isSuccess)
	{
		include 'includes/successmessage.php';
	}
	else 
	{
		include 'includes/errormessage.php';
	}

}

?>
<br/>

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $_POST['firstname'] .' '. $_POST['lastname']; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $_POST['expert']; ?></h6>
    <p class="card-text">Date of Birth : <?php echo $_POST['dob']; ?></p>
    <p class="card-text">mail : <?php echo $_POST['email']; ?></p>
    <p class="card-text">Contact : <?php echo $_POST['phone']; ?></p>

  </div>
</div>

<br/>
<br/>
<br/>
<?php require 'includes/footer.php' ?>