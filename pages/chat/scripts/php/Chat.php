<?php
	require('../../includes/functions/chat.func.php');
				$messages = get_msg();
			foreach($messages as $message) {
				echo '<h3><strong>'.$message['sender'].'</strong></h3>';
				echo '<div class="message">'.$message['message'].'</div>';
			}


?>