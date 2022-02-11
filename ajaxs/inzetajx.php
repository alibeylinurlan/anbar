<?php 


if ($_POST) 
{
	include '../config.php';

	echo $id = $_POST['id'];
	
	$z = $db->prepare("update users set status=? where id=? ");

	$ok = $z->execute(["inzibatci", $id]);
	
}