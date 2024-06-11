<?php 
$title = "Attendees List";
require 'includes/header.php';
require_once 'includes/auth_check.php';
require 'db/conn.php';

$result = $crud->getAttendees();

?>
<br/>

<table class="table">

	<tr>
		<td> # </td>
		<td> First Name </td>
		<td> Last Name </td>
		<td> Speciality </td>
		<td> Actions </td>
	</tr>
	<?php  while($r = $result->fetch(PDO::FETCH_ASSOC)) {  ?>
		<tr>
			<td> <?php echo $r['attendee_id'] ?> </td>
			<td> <?php echo $r['firstname'] ?> </td>
			<td> <?php echo $r['lastname'] ?> </td>
			<td> <?php echo $r['name'] ?> </td>
			<td>
				<a href="view.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-primary"> view </a>
				<a href="edit.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-warning"> Edit </a>
				<a onclick="return confirm('Are you sure? Do you want to delete the record? note: The action cannot be undo.')" href="delete.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-danger"> Delete </a>
			</td>	
		 </tr>
	<?php } ?>
</table>

<br/>
<br/>
<br/>
    
<?php require 'includes/footer.php' ?>
