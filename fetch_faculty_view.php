<?php
		include('connection.php');
		$email_id=$_GET['edit'];
			$display="SELECT * FROM faculty_registration where email='$email_id'";
                      $data=mysqli_query($con,$display);
                      $total=mysqli_num_rows($data);
                      if($total !=0)
                      {
                      	 while ($row=mysqli_fetch_assoc($data)) {

                      	 	$pass=$row['faculty_id'];
                      	 	$name= $row['Name'];
							$phone= $row['phone'];
							$email=$row['email'];
							$faculty_of=$row['faculty_of'];
							$dept=$row['department'];
							$photo=$row['photo'];
							$signature=$row['signature'];
                      	 }
                      }
			
		  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Faculty Detaile</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		.report{
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%,-50%);
		}
		.report tr td{
			padding: 10px;
		}
		.report .image{
			margin-left: 30px;
		}
		.report .text{
			font-size: 24px;
			letter-spacing: 4px;
			word-spacing: 8px;
		}
		.texthead{
			font-weight: 500;
		}
		@media (max-width:786px)
		{
			.report .image{
			margin-left: 5px;
		}
		}
	</style>
</head>
<body>

	<div class="container col-lg-6 m-auto report" id="print">
		<h1 class="text-center text-success" id="detail">Details Of Faculty</h1>
		<table border="1" class="teble">
			<tr>
				<td colspan="3" class="text-center text" style="background-color:#009688; color: #fff;">Faculty Report</td>
			</tr>
			<tr>
				<td rowspan="4" style="font-weight: 500; color: red;">
					<?php
						if ($photo == '') {
					?>
						<img src="img/userimage.svg" height="100px" width="100px;" class="image">
					<?php		
						}
						else{
					?>
					<img src="<?php echo $photo; ?>" height="100px" width="100px;" class="image"><br><?php echo $name; ?></td>
					<?php
				}
				?>
			</tr>
			<tr>
				<td class="texthead">Password : </td>
				<td><?php echo $pass; ?></td>
			</tr>

			<tr>
				<td class="texthead">Name : </td>
				<td><?php echo $name; ?></td>
			</tr>
			<tr>
				<td class="texthead">Phone :</td>
				<td><?php echo $phone; ?></td>
			</tr>
			<tr>
				<td rowspan="5"></td>
				
			</tr>
			<tr>
				<td class="texthead">E-mail</td>
				<td><?php echo $email; ?></td>
			</tr>
			<tr>
				<td class="texthead">Faculty of :</td>
				<td><?php echo $faculty_of; ?></td>
			</tr>
			<tr>
				<td class="texthead">Department</td>
				<td><?php echo $dept; ?></td>
			</tr>
			<tr>
				<td class="texthead">Signature</td>
				<td><img src="<?php echo $signature; ?>" height="70px" width="180px;"></td>
			</tr>
			<tr  style="background-color:#009688;">
				<td><button class="btn btn-primary" id="print">Print</button> &nbsp; &nbsp;<a href="faculty_reg_report.php"><button class="btn btn-danger">Back</button></a></td>
				<td colspan="2"></td>
			</tr>
		</table>
	</div>

	<script type="text/javascript">
		
	</script>
</body>
</html>