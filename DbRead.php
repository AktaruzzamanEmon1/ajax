<?php

require 'DbConnect.php';
function login (  $userName, $password){
$conn = connect();
$sql = $conn->prepare("SELECT * FROM `users` WHERE username = ? and password = ?");
$sql->bind_param("ss", $userName, $password);

$sql->execute();
$sql->get_result();
return $res->num_rows === 1;
}

function getAllUsers() {
$conn = connect();
$sql = $conn->prepare("SELECT  fullname,   username FROM `users` ");
$sql->execute();
$res = $sql->get_result();
return $res->fetch_all(MYSQLI_ASSOC);

}

?>