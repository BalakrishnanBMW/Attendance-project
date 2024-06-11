<?php 
$title = "Edit Record";
require 'includes/header.php';
require_once 'includes/auth_check.php';
require 'db/conn.php';

$result = $crud->getSpeciality();
if(!isset($_GET['id']))
{
	header("Location:viewrecords.php");
	include 'includes/errormessage.php';
	exit();
}
else
{
	$id = $_GET['id'];
	$attendee = $crud->getAttendeeDetails($id);

?>
<br/>
<h1 class="text-center">Edit Record</h1>

<form method="POST" action="editpost.php">

  <input type='hidden' name='attendee_id' value="<?php echo $attendee['attendee_id'] ?>" />
  <div class="mb-3">
    <label for="firstname" class="form-label">First Name</label>
    <input required type="text" class="form-control" value="<?php echo $attendee['firstname'] ?>" id="firstname" name="firstname">
  </div>
  <div class="mb-3">
    <label for="lastname" class="form-label">Last Name</label>
    <input required type="text" class="form-control" value="<?php echo $attendee['lastname'] ?>" id="lastname" name="lastname">
  </div>
  <div class="mb-3">
    <label for="dob" class="form-label">Date of Birth</label>
    <input required type="text" class="form-control" value="<?php echo $attendee['dob'] ?>" id="dob" name="dob">
  </div>
  <div class="mb-3">
    <label for="expert" class="form-label">Area of Expertise</label>
	<select required class="form-select" id="expert" name="expert">
	  <option value> --Select option-- </option>
	  <?php while($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
	<option value="<?php echo $r['specialid'] ?>" <?php if($r['specialid']==$attendee['specialid']) echo 'selected' ?> >
		<?php echo $r['name'] ?>
	</option>
	  <?php } ?>
	</select>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input required type="email" class="form-control" value="<?php echo $attendee['email'] ?>" id="email" name="email">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Contact Number</label>
    <input required type="text" class="form-control" value="<?php echo $attendee['contact'] ?>" id="phone" name="phone">
  </div>

  <button type="submit" name="submit" class="btn btn-success">Save changes</button>

</form>

<br>
<br>

<a href="view.php?id=<?php echo $attendee['attendee_id'] ?>" class="btn btn-primary"> View <?php echo $attendee['firstname'] ?> record </a>
<a href="viewrecords.php" class="btn btn-info"> Back to List </a>
<a onclick="return confirm('Are you sure? Do you want to delete the record? note: The action cannot be undo.')" href="delete.php?id=<?php echo $attendee['attendee_id'] ?>" class="btn btn-danger"> Delete </a>

<?php } ?>
<br/>
<br/>
<br/>
    
<?php require 'includes/footer.php' ?>