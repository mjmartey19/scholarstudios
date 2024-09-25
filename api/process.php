<?php
include("init.php");
$response = "";
$feedback = 0;
if(!isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $message = $_POST['message'];
  if(empty($name)){
	  $response = "Please enter your name";
  }else if((empty($email))&&(empty($phone))){
	  $response = "Please enter at least an email address or a phone number";
  }else if((!empty($email))&&(!$fns->validate_email($email))){
	  $response = "Please email address is invalid";
  }else if((!empty($phone))&&(!$fns->validate_phone($phone))){
	  $response = "Please phone number is invalid";
  }else if(empty($message)){
    $response = "Please tell me brief about your project";
  }else{
	  $subject = "Someone contacted";
	  $content = "<p>Name: ".$name."</p>";
	  if(!empty($email)){
		$content .= "<p>Email: ".$email."</p>";
	  }
	  if(!empty($phone)){
		$content .= "<p>Phone: ".$phone."</p>";
	  }
	  $content .= "<p>".$message."</p>";
	  $to = "schorlar2468@gmail.com";
	//   $feedback = 1;
	  if($fns->send_email($content,$to,$subject)){
		  $feedback = 1;
		  $response = "Message received. We will get back to you shortly";
	  }
  }

}
/* Send json information */
echo json_encode(array("feedback"=>$feedback,"response"=>$response));
?>