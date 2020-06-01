<?php
    session_start();
?>
<html>
    <head>
        <title>creative login</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/Stdstyle.css">
        <style type="text/css">
            input[type="email"],
            input[type="password"]
            {
                margin-bottom: 20px;
                border-bottom: 2px solid;
                padding: 12px 40px 12px 20px;
            }
        </style>
    </head>
    <body>
        <div class="login">
            <h2>Student Login</h2>
            <form class="form-group" action="#" method="post">
                <div class="group">
                    <input type="email" placeholder="xyz@gmail.com" name="email"><i class="fa fa-user"></i>
                </div>
                <div class="group">
                    <input type="password" placeholder="password" name="pass"><i class="fa fa-lock"></i>
                </div>
                <input type="submit" value="login" name="stdsub">
                <p class="fs">Forget password ?</p>
            </form>
        </div>
    </body>
</html>

<?php
            
            include('connection.php');
            if(isset($_POST['stdsub']))
            {
                $email=$_REQUEST['email'];
                $pass=$_REQUEST['pass'];
                
                $s="select * from student_registrationdata where Email='$email' && Mobile='$pass'";
                $res=mysqli_query($con,$s);
                $num=mysqli_num_rows($res);
                if($num==1)
                {
                    header('location:stdservice.php');
                    $_SESSION['std_name']=$email;
                }
                else
                {
                    header('location:stdlogin.php');
                    echo "<script>alert('username or password error')</script>";
                }
            }
            
?>