<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Digər istifadəçilər</title>
	<?php include 'components/head.php'; ?>
</head>
<?php if ($_SESSION['status'] == 'inzibatci') { ?>
<body>
	<div class="topBar">
		Digər istifadəçilər
		<div style="float: right;"><?php echo $_SESSION['userAd'] ?></div>
	</div>
	<div class="container">	
		<h4>İstifadəçilər və statusları</h4>
		<hr>
		
		<?php 
			include 'config.php';
			$v=$db->prepare("select * from users order by id desc");
			$v->execute(array());
			$users=$v->fetchALL(PDO::FETCH_ASSOC);
		foreach ($users as $k => $user) { ?>
		<div class="row">
			<div class="col-lg-3"><?php echo ($k+1).'. '.$user['ad_soyad']; ?></div>
			<div class="col-lg-6">
				<div class="sts <?php echo $user['status']; ?> st<?php echo $user['id']; ?>"><?php echo $user['status']; ?></div> 
				<?php if ($user['bas_admin'] == 'bəli'): ?>
					<div class="sts basadmin">baş admin</div>
				<?php endif ?>
			</div>
			<div class="col-lg-3">
				<!-- eger sadece inzibatcidirsa -->
				<?php if ($user['status'] == 'moderator' && $_SESSION['basadmin'] == 'xeyr'): ?>
					<div class="sts inzet mybtn innoadmin<?php echo $user['id']; ?>" id="<?php echo $user['id']; ?>">inzibatci et</div>
				<?php endif ?>

				<!-- eger hem inzibatci hem bas admindirse -->
				<?php if ($_SESSION['basadmin'] == 'bəli'): ?>
					<!-- moderator to inzibatci -->
					<?php if ($user['status'] == 'moderator'): ?>
						<div class="sts inzetadmin mybtn inadmin<?php echo $user['id']; ?>" id="<?php echo $user['id']; ?>">inzibatci et</div>
						<div class="sts modetadmin mybtn modadmin<?php echo $user['id']; ?>" id="<?php echo $user['id']; ?>" style="display: none;">moderator et</div>
					<?php endif ?>

					<!-- inzibatci to moderator -->
					<?php if ($user['status'] == 'inzibatci' && $user['bas_admin'] == 'xeyr'): ?>
						<div class="sts inzetadmin mybtn inadmin<?php echo $user['id']; ?>" id="<?php echo $user['id']; ?>" style="display: none;">inzibatci et</div>
						<div class="sts modetadmin mybtn modadmin<?php echo $user['id']; ?>" id="<?php echo $user['id']; ?>">moderator et</div>
					<?php endif ?>
				<?php endif ?>


			</div>
		</div>
		<?php } ?>
	</div>	
</body>
<?php }

else {
	header('Location: mehsul.php');
}
?>
</html>