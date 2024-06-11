<?php 
$title = "Home";
require 'includes/header.php';
require 'db/conn.php';

$result = $crud->getSpeciality();

?>
<br/>
<h1 class="text-center">Registration for Conference</h1>

<form method="POST" action="success.php" enctype="multipart/form-data">

  <div class="mb-3">
    <label for="firstname" class="form-label">First Name</label>
    <input required type="text" class="form-control" id="firstname" name="firstname">
  </div>
  <div class="mb-3">
    <label for="lastname" class="form-label">Last Name</label>
    <input required type="text" class="form-control" id="lastname" name="lastname">
  </div>
  <div class="mb-3">
    <label for="dob" class="form-label">Date of Birth</label>
    <input required type="text" class="form-control" id="dob" name="dob">
  </div>
  <div class="mb-3">
    <label for="expert" class="form-label">Area of Expertise</label>
	<select required class="form-select" id="expert" name="expert">
	  <option value> --Select option-- </option>
	  <?php while($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
	<option value="<?php echo $r['specialid'] ?>" ><?php echo $r['name'] ?></option>
	  <?php } ?>
	</select>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input required type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Contact Number</label>
    <input required type="text" class="form-control" id="phone" aria-describedby="phoneHelp" name="phone">
    <div id="phoneHelp" class="form-text">We'll never share your phone with anyone else.</div>
  </div>

  <div class="mb-3">
    <label for="avatar" class="form-label">Upload Profile Picture </label>
    <input class="form-control" name="avatar" accept="image/png, image/jpeg" type="file" id="avatar">
  </div>

  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
<br/>
<br/>
<br/>
    
<?php require 'includes/footer.php' ?>