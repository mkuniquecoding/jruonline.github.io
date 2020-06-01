<?php
    $con=mysqli_connect("localhost","root","");
    if(!$con)
    {
        echo "not connected";
    }
    mysqli_select_db($con,"jru_online");
?>