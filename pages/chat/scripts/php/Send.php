<?php
	require('../../includes/functions/chat.func.php');
	

	 //if(isset($_SESSION['id'])&& !empty($_SESSION['id'])){
     $sender=getdetail('name');
  /*} else{
   header('location:login.php');
   }*/
		
		if(isset($_GET['message'])&&!empty($_GET['message'])) {
			$message = $_GET['message'];
			
			if(send_msg($sender, $message)) {
				echo 'Message Sent';
			} else {
				echo 'Message wasn\'t sent';
			}
			
		} else {
			echo 'No Message was entered';
		}
?>