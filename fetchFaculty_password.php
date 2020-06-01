
<?php 
 include('connection.php');
  $facultyemail=$_POST["facultyemail"];
  if ( $facultyname!=='') {
  	$sql="select * from faculty_registration where email='$facultyemail'";
  $run=mysqli_query($con,$sql);
  if (mysqli_num_rows($run) > 0) {
  	while($data=mysqli_fetch_array($run))
  {
?>
      <option value="<?php echo $data["faculty_id"]; ?>"><?php echo $data["faculty_id"];?></option>
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


