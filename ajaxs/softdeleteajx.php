<?php 


if ($_POST) 
{
	include '../config.php';
	
	$z = $db->prepare("update mehsullar set deleted_at = current_timestamp() where id=? ");

	$ok = $z->execute(array($_POST['id']));

}