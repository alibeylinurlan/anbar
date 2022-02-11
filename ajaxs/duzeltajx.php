<?php 


if ($_POST) 
{
	include '../config.php';

	$id = $_POST['id'];
	$ad = $_POST['ad'];
	$miqdar = $_POST['miqdar'];
	$mayadeyeri = $_POST['mayadeyeri'];
	$satisqiymeti = $_POST['satisqiymeti'];
	
	$z = $db->prepare("update mehsullar set 
		adi=?,
	  	miqdar=?,
	  	maya_deyeri=?,
	  	satis_qiymeti=? where id=? ");

	$ok = $z->execute([$ad, $miqdar, $mayadeyeri, $satisqiymeti, $id]);
	
}