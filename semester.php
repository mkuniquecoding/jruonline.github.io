<?php 
 include('connection.php');
  $course=$_POST["course"];
  $sql="select * from semester where Course='$course'";
  $run=mysqli_query($con,$sql);
  echo "<option>select semester</option>";
  while($data=mysqli_fetch_array($run))
  {
	  ?>
      <option><?php echo $data["Semesters"];?></option>
      <?php
  }

?>
