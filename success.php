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
	

	$now = new DateTime();
	$dt = $now->format('YmdHisu');

	$org_file = $_FILES['avatar']['tmp_name'];
	// $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
	$target_dir = "uploads/";
	$dest = $target_dir . $contact . $dt .basename($_FILES['avatar']['name']);
	move_uploaded_file($org_file, $dest);
	

	$isSuccess = $crud->insert($fname, $lname, $dob, $email, $contact, $speciality, $dest);

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

<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="<?php echo $dest ?>" alt="Profile Picture">
  <div class="card-body">
    <h5 class="card-title"><?php echo $_POST['firstname'] .' '. $_POST['lastname']; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $_POST['expert']; ?></h6>
    <p class="card-text">Date of Birth : <?php echo $_POST['dob']; ?></p>
    <p class="card-text">mail : <?php echo $_POST['email']; ?></p>
    <p class="card-text">Contact : <?php echo $_POST['phone']; ?></p>
    <!-- <p class="card-text">Contact : <?php echo $_FILES['avatar']['name']; ?></p> -->
    <!-- <p class="card-text">Contact : <?php echo $ext; ?></p> -->

  </div>
</div>

<?php require 'includes/footer.php' ?>