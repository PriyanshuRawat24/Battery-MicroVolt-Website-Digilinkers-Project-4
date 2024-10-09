<?php
/* Password reset process, updates database with new user password */
require 'db.php';
// session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	// Make sure the two passwords match
	if ($_POST['newpassword'] == $_POST['confirmpassword']) {
		
		$new_password = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);

		// We get $_POST['email'] and $_POST['hash'] from the hidden input field of reset.php form
		$email = $link->escape_string($_POST['email']);
		$hash = $link->escape_string($_POST['hash']);

		$sql = "UPDATE users SET password ='$new_password', hash ='$hash' WHERE email='$email'";

		if ($link->query($sql)) {
			
			$_SESSION['message'] = "Your password has been reset successfully!";
			header("Location: success.php");
		}
	} else {
		$_SESSION['message'] = "Two passwords you entered don't match, try again!";
		header("Location: error.php");
	}
}