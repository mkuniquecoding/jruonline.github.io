<?php
    $con=mysqli_connect("localhost","root","");
    if(!$con)
    {
        echo "not connected";
    }
    mysqli_select_db($con, 'jru_online');
    $brid=$_POST['datapost'];

    $q="select * from branch where course_id='$brid'";
    $res=mysqli_query($con,$q); 
    while($row = mysqli_fetch_array($res))
    {
?>
        <option><?php echo $row['Branches']; ?></option>
<?php
                                
    }
?>