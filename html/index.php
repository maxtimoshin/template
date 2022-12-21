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
	$mail->Host = "smtp.gmail.com";
//Enable smtp authentication
	$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
	$mail->SMTPSecure = "tls";
//Port to connect smtp
	$mail->Port = "587";
//Set gmail username
	$mail->Username = "maxtimoshin94@gmail.com";
//Set gmail password
	$mail->Password = "sxwrpdyryuvmwkni";
//Email subject
	$mail->Subject = "Test email using PHPMailer";
//Set sender email
	$mail->setFrom('maxtimoshin94@gmail.com');
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
		echo "Email Sent..!";
	}else{
		echo "Message could not be sent. Mailer Error:";
	}
//Closing smtp connection
	$mail->smtpClose();
