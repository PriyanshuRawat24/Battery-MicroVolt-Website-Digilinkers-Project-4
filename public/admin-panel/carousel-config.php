<?php 
	
	require('../../resources/config.php');

	// Declare variables
	$image 			= "";
	$title 			= "";
	$caption 		= "";
	$priority 		= "";
	$id 			= 0;
	$edit_state 	= false;

	// Add Products if save button is clicked
	if (isset($_POST['save'])) {

		$image 				= $_POST['image'];
		$title 				= $_POST['title'];
		$caption 			= $_POST['caption'];
		$priority 			= $_POST['priority'];

		$query = "INSERT INTO carousel (image, title, caption, priority) VALUES ('$image', '$title', '$caption', '$priority')";
		$result = $link -> query($query);

		insertMessage($result, 'carousel.php');
	}

	// If update button is clicked
	if (isset($_POST['update'])) {

		$image 		= mysqli_real_escape_string($link, $_POST['image']);
		$title 		= mysqli_real_escape_string($link, $_POST['title']);
		$caption 	= mysqli_real_escape_string($link, $_POST['caption']);
		$priority 	= mysqli_real_escape_string($link, $_POST['priority']);
		$id 		= mysqli_real_escape_string($link, $_POST['id']);

		$query = "UPDATE carousel SET image = '$image', title = '$title', caption = '$caption', priority = '$priority' WHERE id = '$id' ";
		$result = $link -> query($query);

		updateMessage($result, 'carousel.php');
	}

	// Delete products if delete button is clicked
	if (isset($_GET['del'])) {

		$id 			= $_GET['del'];
		$edit_state 	= true;

		$query = "DELETE FROM carousel WHERE id = '$id' LIMIT 1";
		$result = $link -> query($query);

		deleteMessage($result, 'carousel.php');
	}