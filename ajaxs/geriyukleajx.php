<?php 


if ($_POST) 
{
	include '../config.php';
	
	$z = $db->prepare("update mehsullar set deleted_at = ? where id=? ");

	$ok = $z->execute(array(null, $_POST['id']));

}