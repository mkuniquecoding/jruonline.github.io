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
                <button type="button" class="toggle-btn" onclick="user()">Mentor</button>
                <button type="button" class="toggle-btn" onclick="admin()">HOD</button>
            </div>
            <h2>Login</h2> 
            <form id="user" class="input-group" method="post" action="#">
                <input type="email" placeholder="email" name="m1">
                <input type="password" placeholder="password" name="m2">
                <input type="submit" value="login" name="mentorsub">
                <p class="fs">Update password ?</p>
            </form>
            
            <form id="admin" class="input-group" method="post" action="#">
                <input type="email" placeholder="email" name="h1" required>
                <input type="password" placeholder="password" name="h2" required>
                <input type="submit" value="login" name="hodsub">
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
            
            include('connection.php');
            if(isset($_POST['mentorsub']))
            {
                $email=$_REQUEST['m1'];
                $pass=$_REQUEST['m2'];
                
                $s="select * from mentordata where mentor_email='$email' && password='$pass'";
                $res=mysqli_query($con,$s);
                $num=mysqli_num_rows($res);
                if($num==1)
                {
                    header('location:Mentor_index.php');
                    $_SESSION['mentor_name']=$email;
                }
                else
                {
                    echo "<script>alert('username or password error');</script>";
                    header('location:mentors_login.php');
                    
                }
            }
            
        ?>
        <?php
            include('connection.php');
            if(isset($_POST['hodsub']))
            {
                $email=$_REQUEST['h1'];
                $pass=$_REQUEST['h2'];
                
                $s="select * from hod where Email='$email' && password='$pass'";
                $res=mysqli_query($con,$s);
                $num=mysqli_num_rows($res);
                if($num==1)
                {
                    header('location:HOD_index.php');
                    $_SESSION['hod_name']=$email;
                }
                else
                {
                    header('location:mentors_login.php');
                    echo "username or password error";
                }
            }
            
        ?>
    </body>
</html>