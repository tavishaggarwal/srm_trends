<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
  </head>

<?php

 include 'connection.php';
 include 'session.php';


     if(isset($_POST['submit_reg'])){

          $name = $_POST['uname'];
          $email= $_POST['email'];
          $passwd = $_POST['passwd'];
          $conf_passwd = $_POST['conf_passwd'];
          $submit_reg =  $_POST['submit_reg'];

     }


  if($submit_reg){

        if(!empty($name) && !empty($email) && !empty($passwd) && !empty($conf_passwd)){

          $query_check = "SELECT `name` FROM `login` WHERE `name` = '$name'";  
          $run_check=mysqli_query($server,$query_check);
          $row_check=mysqli_fetch_assoc($run_check);
          $user_name_check = $row_check['name'];

              if($name == $user_name_check){
                $output = "User Name already exists";
              }
              else{
                  if($passwd == $conf_passwd){

                         $query= "INSERT INTO `login` VALUES ('','".$email."','".$name."','".$passwd."','student')";

                         if($run=mysqli_query($server,$query)){
                                   
                                    //header("location: login.php");
                                     $output =  "Registered Succesfully<br>";
                                  }
                         
                         else{
                               $output="coldnt register this time try again later.";
                             }
                  }

                  else{
                 $output = "Password did not match! Please try again";
                      }
            }  
        }

        else{
          $output = "Please fill all fields properly";
        }

  }
  


 if(isset($_POST['submit'])){
        if(isset($_POST['uname']))
          $name = $_POST['uname'];
          $passwd =$_POST['passwd'];
          $submit = $_POST['submit'];
        }

  if($submit){

     if(!empty($name) && !empty($passwd)){

       $query= "SELECT * FROM `login` WHERE `name` = '$name' AND `password`='$passwd' ";
               
          if($run=mysqli_query($server,$query)){
                 $query_rows=mysqli_num_rows($run);

            if($query_rows==0){
                 $output=  "Password or User Name entered is incorrect";
            }
                  
            else if($query_rows == 1){

              while($row=mysqli_fetch_assoc($run)){
                    
                $user_id = $row['id'];
                $_SESSION['id']=$user_id;

                  if (isset($_POST['remember'])) {

                    setcookie('cook_name',$name, time() + (86400 * 30));
                    setcookie('cook_pswd',$passwd, time() + (86400 * 30));
                              
                  }
                     $output=  "successfully logged in";
                     header('location:chat');
              }
            }
          }
      }
        
      else{
        	$output=  "Please fill the form properly";
      }
}

 if (isset($_COOKIE['cook_name'])) {
         $name = $_COOKIE['cook_name'];
  }

  if (isset($_COOKIE['cook_pswd'])) {
          $passwd = $_COOKIE['cook_pswd'];
  }
    

  ?>


  <body>

<div class="header">
  <div class="container-fluid ">

       <div class="col-md-2 col-xs-6">
          <div class="logo">
             <a href="/srm_trends"><img src="../images/logo.png"></a>
          </div>
       </div>

     <div class="heading col-md-8">
    <h2>Login / Registration Form</h2>
     </div>

  </div> <!-- end of container-fluid div -->
</div> <!-- end of heder div -->


<div class="free"></div>
<div class="free"></div>


  <div class="container">

    <div class="col-md-6">
      <h1>Registration Form</h1><br>

        <form role="form_reg" class="form-horizontal" action="login.php" method="POST">

            <div class="form-group">
            <label>User Name</label><input type="text" name="uname" class="form-control">
            </div>

            <div class="form-group">
            <label>Email</label><input type="text" name="email" class="form-control">
            </div>

            <div class="form-group">
            <label>Password</label><input type="password" name="passwd" class="form-control">
            </div>


            <div class="form-group">
            <label>Confirm-Password</label><input type="password" name="conf_passwd" class="form-control">
            </div>


            <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Register" name="submit_reg">
            </div>


      </form>  
    </div>

    <div class="col-md-2"><div class="hr"></div> </div>

    <div class="col-md-4">
      
      <h1>Login Form</h1>
      <p><label>(Student Login)</label></p> <br />
       <form role="form" class="form-horizontal" action="login.php" method="POST">

            <div class="form-group">
            <label>User Name</label><input type="text" name="uname" value= "<?php echo $name; ?>" class="form-control">
            </div>

            <div class="form-group">
            <label>Password</label><input type="password" name="passwd" value= "<?php echo $passwd; ?>" class="form-control">
            </div>

            <div class="form-group">
            <input type="checkbox" name="remember" value="1" ><label> Remember me</label>
            </div>

            <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Login" name="submit">
            </div>
            
      </form>  
      <label> ( For Faculty Login please contact Administration Office. ) </label>
    </div>

  </div> <!-- End of class container --> 

  <div class="col-md-12"><!-- div to print message on form submission -->
    <?php
        echo "<div class='output'>".$output."</div>";
    ?>
  </div>

<div class="free-fix"></div>

  <div class="speak">
    <div class="container-fluid">

      <div class="col-md-12">
        <h1>Student Speak . . . </h1>
        <div class="free"></div>
      </div>

      <div class="col-md-12">
        
        <div class="col-md-4">
        <ul>
          <li><img src="../images/t.jpg"></li>
        </ul>
          <p>The knowledge is key to success.Learn as much as possible to gain more. </p>
        </div>

        <div class="col-md-4">
          <ul>
          <li><img src="../images/tavish.jpg"></li>
        </ul>
          <p>All In One. Quite helpful website providing all the features required at one place.</p>
        </div>

        <div class="col-md-4">
          <ul>
          <li><img src="../images/manasa.jpg"></li>
        </ul>
          <p>SRM University having <strong>Software Engineering Department</strong> for those who want specialization 
          in software rather than being into hardware.</p>
        </div>
      </div>
    </div> <!-- end of class container -->
    
  </div> <!-- end of class speak -->

<div class="free speak"></div>


  <div class="foot">

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


  </body>
  </html>