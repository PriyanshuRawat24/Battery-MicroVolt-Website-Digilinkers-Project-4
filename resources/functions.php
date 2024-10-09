<?php

	// Helper functions

	function logged_in() {
		if ( !isset($_SESSION['logged_in']) ) {
			header('Location: login-system/index.php');
		}
	}

	function insertMessage($result, $page) {
		if($result) {
			$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Product Added</div>";
			header("Location: $page");
			exit;
		} else {
			die("Database Query Error!");
		}
	}

	function updateMessage($result, $page) {
		if($result) {
			$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Product Updated</div>";
			header("Location: $page");
			exit;
		} else {
			die("Database Query Error!");
		}
	}

	function deleteMessage($result, $page) {
		if($result) {
			$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Product Deleted</div>";
			header("Location: $page");
			exit;
		} else {
			die("Database Query Error!");
		}
	}

	function sessionMessage() {
		if (isset($_SESSION['msg'])) {
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
	}

?>