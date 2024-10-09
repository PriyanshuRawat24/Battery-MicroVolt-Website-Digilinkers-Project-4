<?php 

	require('../../resources/config.php');

	// Declare variables
	$product_name 		= "";
	$product_desc 		= "";
	$product_img 		= "";
	$product_pg_link 	= "";
	$priority 			= "";
	$id 			    = 0;
	$edit_state 	    = false;
	$msg 				= "";

	// Add Products if save button is clicked
	if (isset($_POST['save'])) {

		$product_name 		= $_POST['product_name'];
		$product_desc 		= $_POST['product_desc'];
		$product_img 		= $_POST['product_img'];
		$product_pg_link 	= $_POST['product_pg_link'];
		$priority 			= $_POST['priority'];

		$query = "INSERT INTO products (product_name, product_desc, product_img, product_pg_link, priority) VALUES ('$product_name', '$product_desc', '$product_img', '$product_pg_link', '$priority')";
		$result = $link -> query($query);

		insertMessage($result, 'products.php');
	}

	// If update button is clicked
	if (isset($_POST['update'])) {

		$product_name 		= mysqli_real_escape_string($link, $_POST['product_name']);
		$product_desc 		= mysqli_real_escape_string($link, $_POST['product_desc']);
		$product_img 		= mysqli_real_escape_string($link, $_POST['product_img']);
		$product_pg_link 	= mysqli_real_escape_string($link, $_POST['product_pg_link']);
		$priority 			= mysqli_real_escape_string($link, $_POST['priority']);
		$id 				= mysqli_real_escape_string($link, $_POST['id']);

		$query = "UPDATE products SET product_name = '$product_name', product_desc = '$product_desc', product_img = '$product_img', product_pg_link = '$product_pg_link', priority = '$priority' WHERE id = '$id' ";
		$result = $link -> query($query);

		updateMessage($result, 'products.php');
	}

	// Delete products if delete button is clicked
	if (isset($_GET['del'])) {

		$id 			= $_GET['del'];
		$edit_state 	= true;

		$query = "DELETE FROM products WHERE id = '$id' LIMIT 1";
		$result = $link -> query($query);

		deleteMessage($result, 'products.php');
	}