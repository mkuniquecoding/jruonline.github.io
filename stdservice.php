<?php
    session_start();
    $stdname=$_SESSION['std_name'];
?>
<html>
    <head>
        
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <link rel="shortcut icon" href="img/favicon.png">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css">
        <style>
            #stdservice
            {
                background-color: #eeeeee;
            }
            #stdservice h1
            {
                color: red;
                text-align: center;
                margin: 20px 0px;
            }
            #stdservice h1:after
            {
                content: '';
                background: red;
                height: 3px;
                width: 170px;
                display: block;
                margin: 20px auto 5px;
            }
            .stdservice
            {
                border: 1px solid;
                background-color: #fff;
                padding: 20px;
                margin: 30px 0px;
            }
            .stdservice:hover
            {
                border: 1px solid;
                background-color: #fff;
                padding: 20px;
                margin: 30px 0px;
                box-shadow: 0 5px 10px rgba(0,0,0,0.6);
                transform: scale(1.05);  
                transition: 0.5s;
            }
            .stdservice input
            {
                padding: 6px;
                margin: 20px 0px;
                width: 150px;
                background-color: #0d47a1;
                border: none;
                color: #fff;
            }
            .actives
            {
                box-shadow: 0 5px 10px rgba(0,0,0,0.6);
                transform: scale(1.05);
            }
            .aname
            {
                text-transform: lowercase;
            }
        </style>
    </head>
    <body>
        <section id="nav-bar">
            <nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="#" style="color: white;">jru-online</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.html">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">about</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">result</a>
      </li>
      
      <li class="nav-item active">
        <a class="nav-link" href="#">Services</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="aname"><?php echo $stdname; ?></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#"><span class="aname"><?php echo $stdname; ?></span></a>
            <a class="dropdown-item" href="logout.php"><i class="fa fa-user"></i> View Profile</a>
            <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-in"></i> logout</a>
        </div>
      </li> 
    </ul>
  </div>
</nav>
        </section>
        <section id="stdservice">
            
            <div class="container">
                <div class="row" align=center>
                    <div class="col-md-12">
                        <h1>Our Services</h1>
                    </div>
                    <div class="col-md-4">
                        <div class="stdservice">
                            <h3>Exam Registration</h3>
                            <a href="#"><input type="submit" value="click here"></a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stdservice actives">
                            <h3>Class Attendence</h3>
                            <a href="#"><input type="submit" value="click here"></a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stdservice">
                            <h3>Check Result</h3>
                            <a href="#"><input type="submit" value="click here"></a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stdservice">
                            <h3>Sem. Feedback form</h3>
                            <a href="#"><input type="submit" value="click here"></a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stdservice">
                            <h3>Parent Feedback Form</h3>
                            <a href="prtfeedback_form.php"><input type="submit" value="click here"></a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stdservice">
                            <h3>Online Leave</h3>
                            <a href="#"><input type="submit" value="click here"></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!---------------Footer Section--------------------->
        <section id="footer">
            <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="footer-links">
                        <h2>Useful Links</h2>
                        <ul>
                            <li>Home</li>
                            <li>About</li>
                            <li>Attendence</li>
                            <li>profile</li>
                            <li>Leave</li>
                            <li>Gallary</li>
                            <li>Login</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-links">
                        <h2>Contact Us</h2>
                        <ul>
                            <li>Jharkhand Rai University,<br> Kamre, Ratu Road Ranchi - 835222</li>
                            <li>Campus : Raja Ulatu,<br> Namkum, Ranchi - 834010</li>
                            <li>visit : jru.edu.in</li>
                            <li>Email: Info@Jru.Edu.In</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-links">
                        <h2>Call Us</h2>
                        <ul>
                            <li>Admission Helpline : 1800 120 2546</li>
                            <li>Reception : 9693296660</li>
                            <li>Career Management Cell (T&P) : 9693296661</li>
                            <li>Exam Cell : 9693296664</li>
                            <li>Accounts Deptt.: 9693296667</li>
                            <li>Public Relation Officer: 7979899524</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="jru-img" align=center>
                        <h2>JRU- Campus</h2>
                        <img src="img/jru.jpg">
                    </div>
                </div>
                <div class="col-md-12 copyright">
                    <p><i class="fa fa-heart"></i> 2020 Copyright: jruonline.com</p>
                </div>
            </div>
            </div>
        </section>
    </body>
</html>