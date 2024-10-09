<?php
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */

   // Set session variables to be used on profile.php page
   $_SESSION['email'] = $_POST['email'];
   $_SESSION['first_name'] = $_POST['firstname'];
   $_SESSION['last_name'] = $_POST['lastname'];

   // Escape all $_POST variables to protect against SQL injections
   $first_name = $link->escape_string($_POST['firstname']);
   $last_name = $link->escape_string($_POST['lastname']);
   $email = $link->escape_string($_POST['email']);
   $password = $link->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
   $hash = $link->escape_string(md5(rand(0,1000)));

   // Check if user with that email already exists
   $result = $link->query("SELECT * FROM users WHERE email='$email'") or die($link->error);

   // We know user email exists if the rows returned are more than 0
   if ($result->num_rows > 0) {
	   	$_SESSION['message'] = "User with that email already exists!";
	   	header("Location: error.php");
   } else { // Email doesn't already exist in a database, proceed ...

   		// active is 0 by DEFAULT (no need to include it here)
   		$sql = "INSERT INTO users (first_name, last_name, email, password, hash)" . "VALUES ('$first_name', '$last_name', '$email', '$password', '$hash')";

   		//Add user to the database
   		if ($link->query($sql)) {
   			
   			$_SESSION['active'] = 0; // 0 untill user activates their account with verify.php
   			$_SESSION['logged_in'] = true;
   			$_SESSION['message'] = 

   					"Confirmation link has been sent to $email, please verify your account by clicking on the link in the message!";

   			// Send registration confirmation link (verify.php)
   			$to 		= $email;
   			$subject 	= 'Account Verification';
   			$message_body = '
   			Hello '.$first_name.',
   			Thank you for signing up!
   			Please click this link to activate your account:
   			
            http://localhost/projects/digibase/public/admin-panel/login-system/verify.php?email='.$email.'&hash='.$hash;

            // Set the mail headers into a variable
            $headers  = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
            $headers .= "From: shpl.report@gmail.com\r\n";
            $headers .= "X-Priority: 1\r\n";
            $headers .= "X-MSMail-Priority: High\r\n\r\n";

   			mail($to, $subject, $message_body, $headers);

   			header("Location: profile.php");
   		} else {
   			$_SESSION['message'] = "Registration failed";
   			header("Location: error.php");
   		}
   }