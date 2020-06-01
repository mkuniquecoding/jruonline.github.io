
<?php 
 include('connection.php');
  $faculty=$_POST["facultyof"];
  $sql="select * from deparment where faculty_of='$faculty'";
  $run=mysqli_query($con,$sql);
  echo "<option>select department</option>";
  while($data=mysqli_fetch_array($run))
  {
?>
      <option value="<?php echo $data["departments"]; ?>"><?php echo $data["departments"];?></option>
<?php
  }


?>
