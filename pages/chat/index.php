<?php
include '../session.php';

	 if(isset($_SESSION['id'])&& !empty($_SESSION['id'])){	
   }else{
   	header('location:../login.php');
   }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Page Title -->
		<title>Queries/Doubts</title>
		
		<!-- CSS Stylesheets -->
		<link type="text/css" rel="stylesheet" href="../../css/bootstrap.min.css" />
		<link type="text/css" rel="stylesheet" href="../../css/style.css" />	
	</head>
	
	<body>
<div class="header">
  <div class="container-fluid ">

     <div class="col-md-2 col-xs-6">
        <div class="logo">
           <img src="../../images/logo.png" >
        </div>
     </div>

     <div class="heading col-md-8">
		<h2>Student/ Teacher Interaction</h2>
     </div>

      <div class="col-md-2">
       <li style="list-style:none"><h3><a href="../logout.php">Logout</a></li>
     </div>

</div> <!--end of container-fluid div -->
</div> <!-- end of heder div -->

		<div id="input">
			<form action="index.php" method="post" id="form_input">
				<br /><lable><h4>Enter Message:</h4><br /><textarea class="form-control" id="message" rows="4"></textarea></lable><br />
				<input type="submit" name="send" id="send" class="btn btn-danger " value="Send Message"/>
				<a href="../upload/upload.php"><input type="button" class="btn btn-danger" value="Upload Notes"/></a>
			</form>
		</div><!-- Input -->
	
		<div id="messages">
		
		</div><!-- Messages -->
		<div class="free-fix"></div>

<div class="foot foot_upload">

   <div class="container">

      <div class="col-md-6">
        <p style="margin: 10px;">&copy;Copyright - GROUP 2 - Department of Software Enginnering</p>
      </div>

      <div class="col-md-6">
        <ul>
          <li>About</li>
          <li>Projects</li>
          <li>Departments</li>
          <li>Projects</li>
          <li>Clubs</li>
          <li class="con">Help Us</li>

        </ul>
      </div>
  </div>

</div> <!-- end of foot div -->


		<!-- Javascript -->
		<script type="text/javascript" src="scripts/js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="scripts/js/auto_chat.js"></script>
		<script type="text/javascript" src="scripts/js/send.js"></script>
		
	</body>
</html>