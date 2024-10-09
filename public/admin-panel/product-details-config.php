<?php 

	require('../../resources/config.php');

	// Initialize Variables
	$category 		= "";
	$series			= "";
	$model 			= "";
	$box_type		= "";
	$voltage 		= "";
	$capacity 		= "";
	$length 		= "";
	$width 			= "";
	$height 		= "";
	$water 			= "";
	$charge 		= "";
	$warranty 		= "";
	$image 			= "";
	$replacement	= "";
	$priority 		= "";
	$id 			= 0;
	$edit_state 	= false;

	// Add Products if save button is clicked
	if (isset($_POST['save'])) {
		$category 		= $_POST['category'];
		$series 		= $_POST['series'];
		$model 			= $_POST['model'];
		$box_type 		= $_POST['box_type'];
		$voltage 		= $_POST['voltage'];
		$capacity 		= $_POST['capacity'];
		$length 		= $_POST['length'];
		$width 			= $_POST['width'];
		$height 		= $_POST['height'];
		$water 			= $_POST['water'];
		$charge 		= $_POST['charge'];
		$warranty 		= $_POST['warranty'];
		$image 			= $_POST['image'];
		$replacement 	= $_POST['replacement'];
		$priority 		= $_POST['priority'];

		$query = "INSERT INTO product_details (category, series, model, box_type, voltage, capacity, length, width, height, water, charge, warranty, image, replacement, priority) VALUES ('$category', '$series', '$model', '$box_type', '$voltage', '$capacity', '$length', '$width', '$height', '$water', '$charge', '$warranty', '$image', '$replacement', '$priority')";
		$result = $link -> query($query);

		insertMessage($result, 'product-details.php');
	}

	// If update button is clicked
	if (isset($_POST['update'])) {
		$category 		= mysqli_real_escape_string($link, $_POST['category']);
		$series 		= mysqli_real_escape_string($link, $_POST['series']);
		$model 			= mysqli_real_escape_string($link, $_POST['model']);
		$box_type 		= mysqli_real_escape_string($link, $_POST['box_type']);
		$voltage 		= mysqli_real_escape_string($link, $_POST['voltage']);
		$capacity 		= mysqli_real_escape_string($link, $_POST['capacity']);
		$length 		= mysqli_real_escape_string($link, $_POST['length']);
		$width 			= mysqli_real_escape_string($link, $_POST['width']);
		$height 		= mysqli_real_escape_string($link, $_POST['height']);
		$water 			= mysqli_real_escape_string($link, $_POST['water']);
		$charge 		= mysqli_real_escape_string($link, $_POST['charge']);
		$warranty 		= mysqli_real_escape_string($link, $_POST['warranty']);
		$image 			= mysqli_real_escape_string($link, $_POST['image']);
		$replacement 	= mysqli_real_escape_string($link, $_POST['replacement']);
		$priority 		= mysqli_real_escape_string($link, $_POST['priority']);
		$id 			= mysqli_real_escape_string($link, $_POST['id']);

		$query = "UPDATE product_details SET category='$category', series='$series', model='$model', box_type='$box_type', voltage='$voltage', capacity='$capacity', length='$length', width='$width', height='$height', water='$water', charge='$charge', warranty='$warranty', image='$image', replacement='$replacement', priority='$priority' WHERE id=$id";
		$result = $link -> query($query);

		updateMessage($result, 'product-details.php');
	}

	// Delete products if delete button is clicked
	if (isset($_GET['del'])) {

		$id 			= $_GET['del'];
		$edit_state 	= true;

		$query = "DELETE FROM product_details WHERE id = '$id' LIMIT 1";
		$result = $link -> query($query);

		deleteMessage($result, 'product-details.php');
	}