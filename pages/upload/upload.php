<?php
require '../connection.php';
require '../session.php';

	 if(isset($_SESSION['id'])&& !empty($_SESSION['id'])){	
	 	if(getdetail('role') != "teacher"){
	 		echo "You are not authorized to access this page.";
	 		die();
	 	}
   }else{
   	header('location:../login.php');
   }

// for reference purpose only.
// Description of diffrent type of errors that can be there 
// during uploading a file.

$upload_errors = array(

		UPLOAD_ERR_OK         => "No errors.",
		UPLOAD_ERR_INI_SIZE   => "Larger than upload_max_filesize.",
		UPLOAD_ERR_FORM_SIZE  => "Larger than form MAX_FILE_SIZE.",
		UPLOAD_ERR_PARTIAL    => "Partial upload.",
		UPLOAD_ERR_NO_FILE    => "No file.",
		UPLOAD_ERR_NO_TMP_DIR => "No temporary directory.",
		UPLOAD_ERR_CANT_WRITE => "Can't write to disk.",
		UPLOAD_ERR_EXTENSION  => "File upload stopped by extension."
    );
        

$user_id = 1;  // get from the login id (sessions)

if(isset($_POST['submit'])){

  // Assigning values to variables

        $file                = $_FILES['upload'];

	    $temp_name           = $file['tmp_name'];
		$filename            = $file['name'];
		$filename_render     = $filename;  
		$type                = $file['type'];
		$size                = $file['size'];
		$upload_dir          = "notes";
		$upload_file         = $upload_dir . basename($_FILES["upload"]["name"]);
		$uploadOk            = 1;
		$ext                 = pathinfo($upload_file,PATHINFO_EXTENSION);
		$filename_render_ext = $filename_render;//.".".$ext;

        $check               = "application/pdf";
        $check1				 = "text/plain";
    
	// Checking whether the file selected is image or not
	// and result is true

if($type == $check || $type == $check1 ) {
$uploadOk = 1;

// Creating a query to check whether person is trying to change image 
// with the same image that is already set.

	 $query_check = "SELECT * FROM `upload` WHERE id= $user_id";
	 $run=mysqli_query($server,$query_check);
	 $row=mysqli_fetch_assoc($run);
	 $name = $row['filename'];

          if(move_uploaded_file($temp_name,$upload_dir."/".$filename_render_ext)){
          		$result = "Sucessfully updated";

          	  // Uploading to database if file is an image
               $query= "INSERT INTO `upload` VALUES ('','".$user_id."','".$filename_render_ext."',
                  '".$type."','".$size."')";

                  if($run=mysqli_query($server,$query)){
                       $result .=  "<br>Saved to database.";
                  /*     echo "<meta http-equiv='refresh' content='0;URL=upload.php'>";
                       header('location:view_image.php');*/
                  }
                  // printing error message if not able to save to database because of connection errors
                  else{
                    $result.= "Could not save now please try again later.";
                  }
          } // end of  move_uploaded_file()	

          //printing errors if file is not o valid image of proper size and other parameters.
          else{
		     $error = $file['error'];
		     $result =  "<p>".$upload_errors[$error]."<p>";
          }

	
}
	 else 
	 {
	    $result =  "please try to upload apropriate file.";
	    $uploadOk = 0;
	 } 
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Notes upload</title>
	   <link href="../../css/bootstrap.min.css" rel="stylesheet" />
	   <link href="../../css/style.css" rel="stylesheet" />
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
		<h2>Notes Upload</h2>
     </div>

      <div class="col-md-2">
       <li style="list-style:none"><h3><a href="../logout.php">Logout</a></li>
     </div>

	</div> <!-- end of container-fluid div -->
</div> <!-- end of heder div -->


<div class="free"></div>

<div class="container">

	<div class="notes">
		<form action="upload.php" enctype="multipart/form-data" method="POST">
		<input type="hidden" name="MAX_FILE_SIZE" value="1000000"><br />


			<div class="upload">
				<div class="col-md-4">
					<img src="../../images/notes.png">
				</div>

				<div class="col-md-5">
					<input type="file" class="btn" name="upload"><br /><br />
				</div>
			</div>

<div class="free-fix"></div>


			<div class="submit">

				<div class="col-md-12">

			      <div class="col-md-4">
					<img src="../../images/upload.png">
				  </div>

				  <div class="col-md-5">
					<input type="submit" class="btn btn-danger btn-lg" style="margin: 38px;" name="submit" value="SUBMIT">
					</form>
				  </div>

			    </div>
			 	
			</div>
			

	</div>
</div>	


<div class="col-md-12" style="text-align:center;"><a href="notes"><h3>Click here to view notes uploaded >> </h3></a></div>
<br />
<div class="free"></div>
<div class="message"><?php echo "<div class='output'>".$result."</div>"; ?></div>


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
</div> <!-- end of footer tab -->

</body>
</html>