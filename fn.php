<?php
class FNS{
	function company(){
		return "Scholar Studio";
	}
	function domain(){
		return "localhost";
	}
	function generate_token() {
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 60; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
	}
	function remove_empty_space($text){
		return str_replace(' ','',$text);
	}
	function validate_phone($phone){
		$phone = $this->remove_empty_space($phone);
		/* Phone string must be 10 to 14 incase phones are written */
		/* Strip the possible additions to a phone number */ 
		/* Strip + */
		$phone = str_replace("+", "", $phone);
		/* Strip of any - */
		$phone = str_replace("-", "", $phone);
		/* Strip of any ( */
		$phone = str_replace("(", "", $phone);
		/* Strip of any ) */
		$phone = str_replace(")", "", $phone);
		/* Now the characters left must be an integer */
		if(!ctype_digit($phone)){
			return false;
		}else if((strlen($phone)<10)||(strlen($phone)>15)){
			return false;
		}else{
			return true;
		}
	}
	function validate_email($email)
	{
		$email = strtolower($email);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		{
		  return false; 
		}
		else
		{
			return true;
		}
	}
	function contact_us_email(){
		return "schorlar2468@gmail.com";
	}
	function noreply(){
		return "noreply@".$this->domain();
	}
	function send_email($content,$to,$subject)
	{
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'To: '.$to."\r\n";
		$headers .= 'From:'.$this->company()."\r\n";
		if(mail($to, $subject, $content, $headers))
		{
			return true;
		}else{
			return false;
		}
	}
}
?>