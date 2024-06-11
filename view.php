<?php 
$title = "View Record";
require 'includes/header.php';
require_once 'includes/auth_check.php';
require 'db/conn.php';

if(!isset($_GET['id']))
{
	header("Location:viewrecords.php");
	include 'includes/errormessage.php';
	exit();
}
else 
{
	$id = $_GET['id'];
	$result = $crud->getAttendeeDetails($id);

?>
<br/>

<div class="card" style="width: 18rem;">
	<?php if(file_exists($result['avatar_path'])) { ?>
  <img class="card-img-top" src="<?php echo $result['avatar_path'] ?>" alt="Profile Picture">
	<?php } ?>
  <div class="card-body">
    <h5 class="card-title"><?php echo $result['firstname'] .' '. $result['lastname']; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $result['name']; ?></h6>
    <p class="card-text">Date of Birth : <?php echo $result['dob']; ?></p>
    <p class="card-text">mail : <?php echo $result['email']; ?></p>
    <p class="card-text">Contact : <?php echo $result['contact']; ?></p>
  </div>
</div>
	
<br/><br/>
	<a href="viewrecords.php" class="btn btn-info"> Back to List </a>
	<a href="edit.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-warning"> Edit </a>
	<a onclick="return confirm('Are you sure? Do you want to delete the record? note: The action cannot be undo.')" href="delete.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-danger"> Delete </a>

<?php } ?>

<br/>
<br/>
<br/>
    
<?php require 'includes/footer.php' ?>