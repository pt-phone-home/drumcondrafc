<?php 
require 'components/init.php';

// $email_to = '';
// $email_subject = '';
$name = '';
$email_from = '';
$teamName = '';
$message = '';

if(isset($_POST['submit'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "ptiernan@gmail.com";
    $email_subject = "Message from Drumcondra FC Website";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['teamName']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $teamName = $_POST['teamName']; // not required
    $message = $_POST['message']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
  }
 
 
  if(strlen($message) < 2) {
    $error_message .= 'The message you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "name: ".clean_string($name)."\n";
    $email_message .= "email: ".clean_string($email_from)."\n";
    $email_message .= "Team Name: ".clean_string($teamName)."\n";
    $email_message .= "message: ".clean_string($message)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers); 


// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require 'vendor/PHPMailer-master/src/Exception.php';
// require 'vendor/PHPMailer-master/src/PHPMailer.php';
// require 'vendor/PHPMailer-master/src/SMTP.php';

// $name = '';
// $email = '';
// $teamName = '';
// $message = '';
// $sent = false;
// // $email_to = 'admin@drumcondrafc.com';
// // $email_subject = "Message from Drumcondra FC Website";


// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $teamName = $_POST['teamName'];
//     $message = $_POST['message'];

// 	$errors = [];

// 	if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
// 		$errors[] = 'Please enter a valid email address';
// 	}

// 	if ($name == '') {
// 		$errors[] = 'Please enter your name';
// 	}

// 	if ($message = '') {
// 		$errors[] = 'Please enter a message';
// 	}

// 	if (empty($errors)) {

// 		$mail = new PHPMailer(true);

// 		try {
// 			$mail->isSMTP();
// 			$mail->Host = 'lh38.dnsireland.com';
// 			$mail->SMTPAuth = true;
// 			$mail->Username = 'admin@drumcondrafc.com';
// 			$mail->Password = '27milesin';
// 			$mail->SMTPSecure = 'tls';
// 			$mail->Port = 465;

// 			$mail->setFrom('admin@drumcondrafc.com');
// 			$mail->addAddress('admin@drumcondrafc.com');
// 			$mail->addReplyTo($email);
// 			$mail->Subject = 'Message from Drumcondra FC Website';
// 			$mail->Body = '';

// 			$mail->send();

// 			$sent = true;
// 		} catch (Exception $e) {
// 			$errors[] = $mail->ErrorInfo;
// 		}
// 		if ($sent == true) {
// 			echo 'Message Sent';
// 		Url::redirect("/drumcondrafc/home.php");	
// 		}
// 	}

	

	// $email_message = "Form details below.\n\n";

	// function clean_string($string) {
	// 	$bad = array("content-type","bcc:","to:","cc:","href");
	// 	return str_replace($bad,"",$string);
	//   }
	
	// $email_message .= "name: ".clean_string($name). "\n";
	// $email_message .= "email: ".clean_string($email). "\n";
	// $email_message .= "email: ".clean_string($teamName). "\n";
	// $email_message .= "email: ".clean_string($message). "\n";


	// $headers = 'From: '.$email."\r\n".
	// 'Reply-To: '.$email."\r\n".
	// 'X-Mailer: PHP/' . phpversion();
	// @mail($email_to, $email_subject, $email_message, $headers);

}

	
?>

<html lang="en">

<head>
	<?php include 'components/head.php';
    ?>
	<title>Contact - Drumcondra A.F.C</title>
</head>

<body class "body">

	<div class="contact-container">

		<?php include 'components/banner.php'; ?>

		<?php include 'components/header.php'; ?>

		<div class="contact-header">
			<h1>Contact Information</h1>
			<i class="fas fa-phone-square"></i>
		</div>


		<div class="contact-info">

			<div class="contact-info-form">
				<div class="contact-info-form-container">
					<h1>Contact form</h1>

					<form method="POST" class="contact-form">


						<?php if (! empty($errors)) :?>
						<ul>
							<?php foreach ($errors as $err) :?>
							<li>
								<?=$err ;?>
							</li>
							<?php endforeach ;?>
						</ul>
						<?php endif ;?>


						<div class="form-group">
							<label for="name">Name:</label>
							<input type="text" placeholder="Your Name" id="name" name="name" value="<?= htmlspecialchars($name) ;?>"
							 required>
						</div>
						<div class="form-group">
							<label for="email">Email:</label>
							<input type="email" placeholder="Your Email" name="email" id="email" value="<?= htmlspecialchars($email_from) ;?>"
							 required>
						</div>
						<div class="form-group">
							<label for="teamName">Team Name: (Optional)</label>
							<input type="text" name="teamName" id="teamName" value="<?= htmlspecialchars($teamName) ;?>">
						</div>
						<div class="form-group">
							<label for="message" class="message-label">Message:</label>
							<textarea name="message" id="message" cols="30" rows="10" placeholder="Write your message here" required><?= htmlspecialchars($message) ;?></textarea>
						</div>
						<input type="submit" value="Send" class="submit">


					</form>
				</div>
			</div>
			<div class="contact-info-contact">
				<h1>Contact Details</h1>
				<div class="member">
					<div class="member-pic">
						<img src="http://placehold.it/100x100" class="avatar-lg" alt="">
					</div>
					<h3>Frank Conolly</h3>
					<h3> 086 833 1909</h3>
				</div>
				<div class="member">
					<div class="member-pic">
						<img src="http://placehold.it/100x100" class="avatar-lg" alt="">
					</div>
					<h3>Brian Martin</h3>
					<h3> 087 744 3583</h3>
				</div>
				<h4>Email:
					<span>drumcondrafc@gmail.com</span>
				</h4>


			</div>
		</div>



		<?php include 'components/footer.php'; ?>
		<?php include 'components/add.php'; ?>
	</div>




	<?php include 'components/scripts.php'; ?>

</body>

</html>