<?php 

if ($_POST) 
{
	session_start();
	if ($_SESSION['basadmin'] == 'bəli') 
	{
		include '../config.php';
		
		$c = $db->prepare("delete from mehsullar where id=?");
		$delete=$c->execute(array($_POST['id']));

	}

}