<?php
    include('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <?php
           
        extract($_POST);
        if(isset($_POST["submit"]))
        {
            $fac_id=uniqid();
            $photo=$_FILES['f5'];
            $sign=$_FILES['f6'];

            $pfilename=$photo['name'];
            $sfilename=$sign['name'];

            $pfileerror=$photo['error'];
            $sfileerror=$sign['error'];

            $pfiletmp=$photo['tmp_name'];
            $sfiletmp=$sign['tmp_name'];

            $pfile_ext=explode('.', $pfilename);
            $sfile_ext=explode('.', $sfilename);

            $pfilecheck=strtolower(end($pfile_ext));
            $sfilecheck=strtolower(end($sfile_ext));

            $pfilestored=array('png', 'jpg', 'jpeg');
            $sfilestored=array('png', 'jpg', 'jpeg');
            if (in_array( $pfilecheck, $pfilestored) && in_array($sfilecheck,$sfilestored)) {
                $pdestinationfile = 'upload/'.$pfilename;
                $sdestinationfile = 'upload/'.$sfilename;
                move_uploaded_file($pfiletmp,  $pdestinationfile);
                move_uploaded_file($sfiletmp,  $sdestinationfile);

                $sql="SELECT * FROM faculty_registration where email = '$f3'";
                $res=mysqli_query($con,$sql);
                $num=mysqli_num_rows($res);
                if ($num == 1) {
                    echo "Username Already Taken..........";
                }
                else{
                    $qu="INSERT INTO faculty_registration VALUES('$fac_id','$f1','$f2','$f3','$f4','$dept','$pdestinationfile','$sdestinationfile')";
                    if (mysqli_query($con,$qu)) {
                       echo "<script>alert('Successfully Data Inserted........');</script>";
                       header('location:faculty_reg_report.php');
                    }
                    else{
                        echo "<script>alert('Something went wrong.........');</script>";
                         header('location:faculty_reg_report.php');
                    }
                }
            }
        }

        ///delete record  ////...........
        if (isset($_POST['deleteId'])){
            $user=$_POST['deleteId'];
            $delquery="DELETE FROM faculty_registration where email='$user'";
            if(mysqli_query($con,$delquery)){
               echo "<script>alert('Successfully Data Deleted........');</script>";
                header('location:faculty_reg:php');
            }
        }
        
    ?>
</body>
</html>