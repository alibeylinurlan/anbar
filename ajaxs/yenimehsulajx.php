<?php


if ($_POST) 
{
	session_start();
	include '../config.php';
	$ad = @$_POST['ad'];
	$miqdar = @$_POST['miqdar'];
	$olcuvahidi = @$_POST['olcuvahidi'];
	$mayadeyeri = @$_POST['mayadeyeri'];
	$satisqiymeti = @$_POST['satisqiymeti'];
	$qazanc = ($_POST['satisqiymeti']-$_POST['mayadeyeri'])*$_POST['miqdar'];

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
	{ ?>
		<tr class='mehsulad tr<?php echo $k%2; ?>'>
		  	<td><span style="color:dodgerblue;">★</span></td>
		    <td><?php echo $ad; ?></td>
		    <td>
		    	<?php 
		    	if ($olcuvahidi == 'ədəd') {
		    		echo round($miqdar);
		    	} else { echo $miqdar; } 
		    	?>	
		    </td>
		    <td><?php echo $olcuvahidi; ?></td>
		    <td><?php echo $mayadeyeri; ?> azn</td>
		    <td><?php echo $satisqiymeti; ?> azn</td>
		    <td><i>Bugün, indicə</i></td>
		    <td><?php echo $qazanc; ?> azn</td>
		    <?php if ($_SESSION['status'] == "inzibatci"): ?>
		    <td>
		    	<i>səifəni yenilə</i>
		    </td>
		    <?php endif ?>
		</tr>
	<?php } 
}