<?php

if(isset($_POST['submit'])){

$userName = $_POST["name"];
$userEmail = $_POST["email"];
$message = $_POST["message"];
$to = "support@mylanguage.pro";
$subject = "User Contact";
$content = "From: " .$userName."\n Email: ".$userEmail."\n Message: ".$message ;
// echo $content;
// echo json_encode($content);
	if(!empty($userEmail)&&!empty($message)){
		// echo $content;
		try{
			$result = mail($to,$subject,$content);
			if($result = true){
			$msg = "your message has been successfuly sent";
			echo $msg;
			}
			else{
				throw new Exception("message not sent", 1);
			}
		
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	else{
		if(empty($userEmail)){
			echo "Please enter email";
		}
		elseif(empty($message)){
			echo "please enter message";
		}
	}


}
else{
	echo "please fill the contact form";
}


?>