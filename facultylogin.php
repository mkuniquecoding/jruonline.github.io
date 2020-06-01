<?php
    session_start();
?>
<html>
    <head>
        <title>creative login</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/flipstyle.css">
        <style>
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
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="user()">Faculty</button>
                <button type="button" class="toggle-btn" onclick="admin()">Admin</button>
            </div>
            <h2>Login</h2> 
            <form id="user" class="input-group" method="post" action="#">
                <input type="email" placeholder="Username" name="f1">
                <input type="password" placeholder="password" name="f2">
                <input type="submit" value="login" name="facsub">
                <p class="fs">Update password ?</p>
            </form>
            
            <form id="admin" class="input-group" method="post" action="#">
                <input type="email" placeholder="Username" name="a1" required>
                <input type="password" placeholder="password" name="a2" required>
                <input type="submit" value="login" name="asub">
                <p class="fs">Forget password ?</p>
            </form>
        </div>
        
        <script>
            var x = document.getElementById("user");
            var y = document.getElementById("admin");
            var z = document.getElementById("btn");
            
            function admin()
            {
               x.style.left="-350px";
               y.style.left="0px";
               z.style.left="110px";
            }
            function user()
            {
               x.style.left="0px";
               y.style.left="350px";
               z.style.left="0px";
            }
        </script>
        
        <?php
            
            $con=mysqli_connect("localhost","root","");
            if(!$con)
            {
                echo "not connected.......";
            }
            mysqli_select_db($con, 'jru_online');
            if(isset($_POST['asub']))
            {
                $email=$_REQUEST['a1'];
                $pass=$_REQUEST['a2'];
                
                $s="select * from admin_login where email='$email' && password='$pass'";
                $res=mysqli_query($con,$s);
                $num=mysqli_num_rows($res);
                if($num==1)
                {
                    header('location:admin_index.php');
                    $_SESSION['admin_name']=$email;
                }
                else
                {
                    header('location:facultylogin.php');
                    echo "username or password error";
                }
            }
            
        ?>
        <?php
            $con=mysqli_connect("localhost","root","");
            if(!$con)
            {
                echo "not connected.......";
            }
            mysqli_select_db($con, 'jru_online');
            if(isset($_POST['facsub']))
            {
                $email=$_REQUEST['f1'];
                $pass=$_REQUEST['f2'];
                
                $s="select * from faculty_registration where email='$email' && phone='$pass'";
                $res=mysqli_query($con,$s);
                $num=mysqli_num_rows($res);
                if($num==1)
                {
                    header('location:faculty_home.php');
                    $_SESSION['faculty_name']=$email;
                }
                else
                {
                    header('location:facultylogin.php');
                    echo "username or password error";
                }
            }
            
        ?>
    </body>
</html>