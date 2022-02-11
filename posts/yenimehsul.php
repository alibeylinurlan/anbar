<?php


if ($_POST) 
{
	include '../config.php';
	$ad = @$_POST['ad'];
	$miqdar = @$_POST['miqdar'];
	$olcuvahidi = @$_POST['olcuvahidi'];
	$mayadeyeri = @$_POST['mayadeyeri'];
	$satisqiymeti = @$_POST['satisqiymeti'];

	$insert = $db->prepare("
			insert into mehsullar set 
		  	adi=?,
		  	miqdar=?,
		  	olcu_vahidi=?,
		  	maya_deyeri=?,
		  	satis_qiymeti=?
		  ");			   

	$ok = $insert->execute([$ad, $miqdar, $olcuvahidi, $mayadeyeri, $satisqiymeti]); 
	if ($ok) 
	{
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	} 
}