
<?php 
 include('connection.php');
  $facultyname=$_POST["facultyname"];
  if ( $facultyname!=='') {
  	$sql="select * from faculty_registration where Name='$facultyname'";
  $run=mysqli_query($con,$sql);
  echo "<option>Select Email</option>";
  if (mysqli_num_rows($run) > 0) {
  	while($data=mysqli_fetch_array($run))
  {
?>
      <option value="<?php echo $data["email"]; ?>"><?php echo $data["email"];?></option>
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


