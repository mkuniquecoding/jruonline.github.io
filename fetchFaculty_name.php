
<?php 
 include('connection.php');
  $department=$_POST["department"];

  if ( $department!=='') {
  	$sql="select * from faculty_registration where department='$department'";
  $run=mysqli_query($con,$sql);
  echo "<option>select Name</option>";
  if (mysqli_num_rows($run) > 0) {
  	while($data=mysqli_fetch_array($run))
  {
?>
      <option value="<?php echo $data["Name"]; ?>"><?php echo $data["Name"];?></option>
<?php
  }
  
  }
  else{
  ?>
  	<option value="">No record found..!!</option>
 <?php
  }
  }
?>

