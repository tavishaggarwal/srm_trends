<?php
ob_start(); 
session_start();

 function getdetail($feild)
 {
   $query = "SELECT `$feild` FROM `login` WHERE `id` = '".$_SESSION['id']."'";
   require 'connection.php';
   if($run=mysqli_query($server,$query)){
     $row=mysqli_fetch_assoc($run);
     $result=$row[$feild];
     return $result;
     }
   }

?>