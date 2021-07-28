<?php
if ($_SERVER['REQUEST_METHOD'] === "POST"){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$username = $_POST['username'];
	If(empty ($firstname)){
		echo " Please fill all the fields";
	}
	If(empty ($lastname)){
		echo " Please fill all the fields";
	}
	If(empty ($username)){
		echo " Please fill all the fields";
	}
		else{
			"Successfully Saved";
		}
	
}
?>