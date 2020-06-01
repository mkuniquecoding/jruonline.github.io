<?php 
	session_start();
	$email=$_SESSION['std_name'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.alert
            {
                position: absolute;
                border: 1px solid #ccc;
                left: 50%;
                top: 50%;
                transform: translate(-50%,-50%);
                padding: 20px;
            }
            .alert #id{
                font-size: 20px;
            }
        .alert .text{
            color: crimson;
        }
            .alert p{
            	text-align: center;
            	font-size: 16px;
            }
            .alert span{
            	margin-left: 10px;
            	float: right;
            	padding: 10px;
            }
            .alert .home
            {
            	background-color: blue;
            }
            .alert .back{
            	background-color: red;
            }
            .alert a{
            	color: #fff;
            	text-decoration: none;
            }
	</style>
</head>
<body>
	<?php
	include('connection.php');
	
	extract($_POST);
    if(isset($_POST["submit"]))
    {
		$sql="insert into parent_feedback_form values('$p1','$p2','$p3','$p4','$p5','$p6','$p7','$p8','$p9','$p10','$p11','$p12','$p13','$p14','$p15','$p16','$p17','$p18','$p19','$p20','$p21','$p22','$p23')";
			if(mysqli_query($con,$sql)){
        ?>
            <div class="alert">
            	<div align="center">
            		<img src="img/right.gif" height="40%" width="auto">
            	</div>
            	
                <p id="msg">Thank You <?php echo "'".$email."' for Giving Feedback......"; ?></p>
                <span class="home"><a href="index.html">Home</a></span><span class="back"><a href="prtfeedback_form.php">Back</a></span>
            </div>
        <?php
            }
            else{
        ?>
                 <div class="alert">
                 	<div align="center">
            			<img src="img/error.gif" height="40%" width="auto">
            		</div>
                <p id="msg" class="text">Something Went Wrong.............!!</p>
                <span class="home"><a href="index.html">Home</a></span><span class="back"><a href="prtfeedback_form.php">Back</a></span>
            </div>   
        <?php
            }
        }
        ?>
</body>
</html>

