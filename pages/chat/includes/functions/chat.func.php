<?php
require '/var/www/html/srm_trends/pages/connection.php';
require '/var/www/html/srm_trends/pages/session.php';

	function get_msg() {
		global $server;
		$query = "SELECT `Sender`, `Message` FROM `chat` ORDER BY `Msg_ID` DESC";
		
		$run = mysqli_query($server,$query);
		
		$messages = array();
		
		while($message = mysqli_fetch_assoc($run)) {
			$messages[] = array('sender'=>$message['Sender'],
								'message'=>$message['Message']);
		}
		
		return $messages;
		
	}
	
	function send_msg($sender, $message) {
		global $server;
		if(!empty($sender) && !empty($message)) {
			
			$query = "INSERT INTO `chat` VALUES (null, '{$sender}', '$message')";
			
			if($run = mysqli_query($server,$query)) {
				return true;
			} else {
				return false;
			}
			
		} else {
			return false;
		}
	}

?>
