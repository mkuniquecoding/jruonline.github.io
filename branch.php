<?php 
 include('connection.php');
  $course=$_POST["course"];
  $sql="select* from branch where Course='$course'";
  $run=mysqli_query($con,$sql);
  echo "<option>select branches</option>";
  while($data=mysqli_fetch_array($run))
  {
	  ?>
      <option><?php echo $data["Branches"];?></option>
      <?php
  }

?>
