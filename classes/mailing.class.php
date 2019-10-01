<?php
require_once('PHPMailer_5.2.4/class.phpmailer.php');

class mailing{


	static function html_mail($to,$subject,$body,$from,$reply=NULL){

		$to = trim($to);
		if( empty($to) || is_null($to) || count($to) < 0 || !filter_var($to, FILTER_VALIDATE_EMAIL) )
		{
		    return false;
		}

		$message="";

		$mail_to = $to;

		$mail_subject = $subject;
		//create a boundary string.
		//use the MD5 algorithm to generate a random hash
		$random_hash = md5(time());

		if($from){
			$headers = "From: ".$from."\r\n";
			$f = $from;
		}else{
			$headers = "From: \r\n";
			$f = 'noreply@alexandra.vilas';
		}

		if($reply){
			$headers .= "Reply-To: ".$reply."\r\n";
			$r = $reply;
		}else{
			$headers .= "Reply-To: \r\n";
			$r = 'noreply@alexandra.vilas';
		}
		//add boundary string and mime type specification
		$headers .= "Content-Type:text/html; charset=iso-8859-1\n boundary=\"PHP-alt-".$random_hash."\"";

		$message .= $body;

		#START======= Added By Mifas ===================
		$mail = new PHPMailer(false); // the true param means it will throw exceptions on errors, which we need to catch
		$mail->IsSMTP(); // telling the class to use SMTP

		$mail->SMTPDebug  = false;                     // enables SMTP debug information (for testing)
		                                           // 1 = Hide; 2 = Show
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
		$mail->Host       = "smtp.live.com";      // sets OUTLOOK as the SMTP server
		$mail->Port       = 587;                   // set the SMTP port for the OUTLOOK server

		$mail->Username = "spencebpo@3-cs.com"; // OUTLOOK username
		$mail->Password = "gmse6ja"; // OUTLOOK password

		$mail->AddReplyTo($r,$r);
		$mail->SetFrom($f,$f);		

		$mail->Subject = $mail_subject;
		$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
		$mail->Body = $message;

		$mail->AddAddress($mail_to, $mail_to);
		//$send = $mail->Send();
		$mail->ClearAllRecipients();
		#END======= Added By Mifas ===================

	//	return $send;
		return $send = @mail($mail_to,$mail_subject,$message,$headers);

	}

	static	function attached_mail($to,$subject,$body,$type,$name,$attach,$from=NULL,$reply=NULL){

		//define the receiver of the email
		$mail_to = $to;
		//define the subject of the email
		$mail_subject = $subject;
		//create a boundary string.
		//use the MD5 algorithm to generate a random hash
		$semi_rand = md5(time());

		$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
		$fileatt_type = $type;
		$fileatt_name = $name;

		if($from){
			$headers = "From: ".$from."\r\n";
			$f = $from;
		}else{
			$headers = "From: \r\n";
			$f = 'noreply@alexandra.vilas';
		}

		if($reply){
			$headers .= "Reply-To: ".$reply."\r\n";
			$r = $reply;
		}else{
			$headers .= "Reply-To: \r\n";
			$r = 'noreply@alexandra.vilas';
		}

		$headers .= "\nMIME-Version: 1.0\n"."Content-Type: multipart/mixed;\n"." boundary=\"{$mime_boundary}\"";

		$message = $body;
		$message = "This is a multi-part message in MIME format.\n\n"."--{$mime_boundary}\n" .
            "Content-Type: text/html; charset=\"iso-8859-1\"\n"."Content-Transfer-Encoding: 7bit\n\n".$message."\n\n";

		$data = chunk_split(base64_encode($attach));

		$message .= "--{$mime_boundary}\n" .
             "Content-Type: {$fileatt_type};\n" .
             " name=\"{$fileatt_name}\"\n" .
             "Content-Disposition: attachment;\n" .
             " filename=\"{$fileatt_name}\"\n" .
             "Content-Transfer-Encoding: base64\n\n" .
		$data . "\n\n" .
             "--{$mime_boundary}--\n";


		#START======= Added By Mifas ===================
		$mail = new PHPMailer(false); // the true param means it will throw exceptions on errors, which we need to catch
		$mail->IsSMTP(); // telling the class to use SMTP

		$mail->SMTPDebug  = false;                     // enables SMTP debug information (for testing)
		                                    // 1 = Hide; 2 = Show
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
		$mail->Host       = "smtp.live.com";      // sets OUTLOOK as the SMTP server
		$mail->Port       = 587;                   // set the SMTP port for the OUTLOOK server

		$mail->Username = "spencebpo@3-cs.com"; // OUTLOOK username
		$mail->Password = "gmse6ja"; // OUTLOOK password

		$mail->AddReplyTo($r,$r);
		$mail->SetFrom($f,$f);

		$mail->AddBCC('mifas@3cs.asia');
		$mail->AddBCC('chamantha@3cs.lk');

		$mail->AddAttachment($fileatt_name);

		$mail->Subject = $mail_subject;
		$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
		$mail->Body = $message;

		$mail->AddAddress($mail_to, $mail_to);
		$send = $mail->Send();
		$mail->ClearAllRecipients();
		#END======= Added By Mifas ===================

		return $send;
		//send the email
		//return $mail_sent = mail( $mail_to, $mail_subject, $message, $headers );
	}


}


?>