<?php 

session_start();

if ($_POST) {
	$id = $_SESSION['userid'];
	$evvelki = base64_encode(trim($_POST["evvelki"]));
	$yeni = base64_encode(trim($_POST["yeni"]));

	include '../config.php';
	$v=$db->prepare("select * from users where id=? and password=?");
	$v->execute(array($id, $evvelki));
	$x = $v->fetch(PDO::FETCH_ASSOC);
	$d = $v->rowCount();

	if ($d) 
	{
		$z = $db->prepare("update users set password=? where id=? ");

		$ok = $z->execute([$yeni, $id]);
		if ($ok) {
			header('Location: ../user.php?ok=1');
		}
	}
	else {
		header('Location: ../user.php?ok=1');
	}

}