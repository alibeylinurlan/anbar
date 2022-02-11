<?php 

if ($_POST) {
	session_start();
	$id = $_SESSION['userid'];
	$evvelki = base64_encode(trim(@$_POST["evvelki"]));
	$yeni = base64_encode(trim(@$_POST["yeni"]));

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
			echo '<span class="alert alert-success notifi">Parolunuz dəyişdirildi</span>';
		}
	}
	else {
		echo '<span class="alert alert-danger notifi">Yanlış parol daxil etmisiniz.</span>';
	}
}