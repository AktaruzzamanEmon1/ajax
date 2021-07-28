<?php 
 require 'DbRead.php';
 $successfulMessage = $errorMessage = "";

  $username = empty($_GET['username']) ? "" : $_GET['username'];
  if (empty($_GET['search']) or empty($username) ){
  	 $userList = getAllUsers();
  }
  else{
  	  $userList = getUser($username);  
  }
  if(!empty($_GET['uid']) and !empty($_GET['uname'])){
  	$response = removeUser($_GET['uid'], $_GET['uname']);
  	if($response){
  		$userList = getAllUsers();
  		

  	}
  	
  }
 
include "config.php"; 

	
?>
<!DOCTYPE html>
<html>
<head>
	<body style="background-color:#CCCCFF;">
	<meta charset="utf-8">
	
</head>
<body>
<h1> User Information</h1>
	
	<br>
	


<hr>
	<form action="indexaction.php"; name="mform" method="POST" onsubmit="submitForm(this);return false;">
	<input type="text" name="username" value ="<?php echo $username; ?>">
	<input type="submit" name="search" value="Search">
	</form>
<br>
	<?php 
		if(count($userList) > 0)
		{
			echo "<table border=>";

            echo "<th>First Name</th>";
			echo "<th>Last Name</th>";
			echo "<th>UserName</th>";
			for($i = 0; $i < count($userList); $i++) {
				
				echo "<tr>";
				
				echo "<td>" . $userList[$i]["firstname"] . "</td>";
				echo "<td>" . $userList[$i]["lastname"] . "</td>";
				echo "<td>" . $userList[$i]["username"] . "</td>";
			
			   }
			echo "</table>";
		}
		else
		{
			echo "<h3> No Records Found</h3>";
		}

	?>
	<br>
		<span style="color: green;"><?php echo $successfulMessage; ?></span>
		<span style="color: red;"><?php echo $errorMessage; ?></span>
		<h2 id="demo"></h2>
		<script>
			function check(val) {
				var firstname = val.firstname.value;
				var lastname = val.lastname.value;
				var username = val.username.value;
				document.getElementById("errorMsg").innerHTML = "";
				if (firstname === ""){
					document.getElementById("errorMsg").innerHTML = " please fillup the field";
					return false;
				}
				if (lastname === ""){
					document.getElementById("errorMsg").innerHTML = " please fillup the field";
					return false;
				}
				if (username === ""){
					document.getElementById("errorMsg").innerHTML = " please fillup the field";
					return false;
				}
				return true;
			}
			function submitForm(pForm){
				var isValid = check(pform);
				if(isvalid){
					var xhttp = new XMLHttpRequest();
					xhttp.onload = function(){
						if(this.status === 200){
							document.getElementById("demo").innerHTML = this.responseText;
						}
					}
					xhttp.open("post","indesaction.php");
					xhttp.setRequestHeader("content-Header", "application/x-www-form-urlencoded");
					xhttp.send("firstname=" + pForm.name.value + "lastname=" + pForm.name.value + "username=" + pForm.name.value)
				}
			}
			
		</script>
	

</body>
</html>