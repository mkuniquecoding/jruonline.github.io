<?php 
 include('connection.php');
  $course=$_POST["course"];
  $sql="select* from session where Course='$course'";
  $run=mysqli_query($con,$sql);
  echo "<option>select session</option>";
  while($data=mysqli_fetch_array($run))
  {
	  ?>
      <option><?php echo $data["start_session"]."-".$data["end_session"];?></option>
      <?php
  }

?>