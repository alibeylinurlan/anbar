<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mehsullar</title>
	<?php include 'components/head.php'; ?>
</head>
<?php if ($_SESSION['status'] == 'inzibatci') { ?>
<body>
	<?php 

	include 'config.php';
	$v=$db->prepare("select * from mehsullar where deleted_at is not ? order by deleted_at desc");
	$v->execute(array(null));
	$mehsullar=$v->fetchALL(PDO::FETCH_ASSOC);
	$silinen_sayi=count($mehsullar);


	 ?>
	<div class="user">
		<div>
			<h2>
				<b>Silinənlər</b>
			</h2>
		</div>
		<div>
			<span>
				<?php echo $_SESSION['userAd']; ?>
			</span>
			<hr>
			<i>Status: <?php echo $_SESSION['status']; ?>
				<?php if ($_SESSION['basadmin'] == 'bəli'): ?>
					, baş admin
				<?php endif ?>
			</i>
		</div>
		<div class="user-icons">
			<a title="profildə düzəliş" href="user.php">
				<i class="fas fa-user-edit"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</a>
			<?php if ($_SESSION['status'] == 'inzibatci'): ?>
				<a title="moderatorlar" href="users.php">
				<i class="fas fa-users"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php endif ?>
			<a title="cixis" href="components/logout.php">
				<i class="fas fa-sign-out-alt"></i>
			</a>
		</div>
	</div>
	<div class="mehsullar">		
		<table>
		  <tr>
		  	<th>No</th>
		    <th>Məhsulun adı</th>
		    <th>Miqdarı</th>
		    <th>Ölçü vahidi</th>
		    <th>Maya dəyəri (azn)</th>
		    <th>Satış qiyməti (azn)</th>
		    <th>Qazanc (azn)</th>
		    <th>Silinmə tarixi</th>
		    <th>
		    	<span class="silinenler"  id="<?php echo $silinen_sayi; ?>">
					Cəmi : <?php echo $silinen_sayi; ?> 
				</span>
			</th>
		  </tr>
		  <?php foreach ($mehsullar as $k => $mehsul) { ?>
			  <tr class='mehsulad<?php echo $k%2; ?>'>
			  	<td><?php echo $k+1; ?></td>
			    <td><?php echo $mehsul['adi']; ?></td>
			    <td>
			    	<?php 
			    	if ($mehsul['olcu_vahidi'] == 'ədəd') {
			    		echo round($mehsul['miqdar']);
			    	} else { echo $mehsul['miqdar']; } 
			    	?>	
			    </td>
			    <td><?php echo $mehsul['olcu_vahidi']; ?></td>
			    <td><?php echo $mehsul['maya_deyeri']; ?> azn</td>
			    <td><?php echo $mehsul['satis_qiymeti']; ?> azn</td>
			    <td>
			    	<?php echo $mehsul['miqdar']*($mehsul['satis_qiymeti']-$mehsul['maya_deyeri']); ?> azn
			    </td>
			    <td><?php echo $mehsul['deleted_at']; ?></td>
			    <td>
			    	<div class="btn btn-success btn-sm geriyukle s<?php echo $mehsul['id']; ?>" id='<?php echo $mehsul['id']; ?>'>geri yüklə</div>
			    	<?php if ($_SESSION['basadmin'] == 'bəli'): ?>
			    		<div class="btn btn-danger btn-sm tamsil" id='<?php echo $mehsul['id']; ?>'>tam sil</div>
			    	<?php endif ?>
			    </td>
			  </tr>
			  
		  <?php } ?>
		</table>
	</div>
</body>
<?php }

else {
	header('Location: mehsul.php');
}
?>

</html>