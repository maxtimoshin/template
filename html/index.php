<?php
//Include required PHPMailer files
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';
//User data
	$name = $_POST['uname'];
	$email= $_POST['email'];
	$age = $_POST['age'];
	$nationality = $_POST['nationality'];
	$location = $_POST['location'];
	$lastJobTitle = $_POST['lastJobTitle'];
	$disabilities = $_POST['disabilities'];
	$education = $_POST['education'];
	$jobExperience = $_POST['jobExperience'];
	$visas = $_POST['visas'];
	$jobTitle = $_POST['jobTitle'];
//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
//Create instance of PHPMailer
	$mail = new PHPMailer();
//Set mailer to use smtp
	$mail->isSMTP();
//Define smtp host
	// $mail->Host = "smtp.gmail.com";
	$mail->Host = "smtp-mail.outlook.com";
//Enable smtp authentication
	$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
	$mail->SMTPSecure = "tls";
//Port to connect smtp
	$mail->Port = "587";
//Set gmail username
	$mail->Username = "maxtimoshin94@outlook.com";
//Set gmail password
	// $mail->Password = "sxwrpdyryuvmwkni";
	$mail->Password = "siilycifplkprltt";
//Email subject
	$mail->Subject = "Resume apply";
//Set sender email
	$mail->setFrom('maxtimoshin94@outlook.com');
//Enable HTML
	$mail->isHTML(true);
//Attachment
	$mail->AddAttachment($_FILES['attachFile']['tmp_name'], $_FILES['attachFile']['name']);
//Email body
	$mail->Body = "Job Title: $jobTitle<br>Name: $name<br>Email: $email<br>Age: $age<br>Nationality: $nationality<br>Location: $location<br>Last job title: $lastJobTitle<br>Disabilities: $disabilities<br>Education: $education<br>Job experience: $jobExperience<br>Visas: $visas";
//Add recipient
	$mail->addAddress('maxtimoshin94@gmail.com');
//Finally send email
	if ( $mail->send() ) {
		echo "<div style='color:#000; flex-direction:column;gap:20px; font-size:32px; font-weight:bold; width:100%;height:100%;display:flex;align-items:center;justify-content:center;'><p>Your application has been successfully sent.</p><img style='width:100px' src=../assets/img/approve.png></img></div>";
	}else{
		echo "Message could not be sent. Mailer Error:";
	}
//Closing smtp connection
	$mail->smtpClose();
