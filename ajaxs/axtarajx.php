<?php


if ($_POST) {
	$ad = trim($_POST['data']);
	include '../config.php';
	$v=$db->prepare("select * from mehsullar where deleted_at is ? and adi like ? limit 6");
	$v->execute(array(null, $ad."%"));
	$mehsullar=$v->fetchALL(PDO::FETCH_ASSOC);

	foreach ($mehsullar as $k => $mehsul) { ?>
		
		 <div class="row" style="background-color: #eee;margin: 1px;border-radius: 4px;">
		 	<div class="col-lg-4">
		 		<?php echo $mehsul['adi']; ?>
		 	</div>
		 	<div class="col-lg-4">
		 		qiyməti <?php echo $mehsul['satis_qiymeti']; ?> azn
		 	</div>
		 	<div class="col-lg-4">
		 		<?php if ($mehsul['olcu_vahidi'] == 'ədəd') {
			    		echo ceil($mehsul['miqdar']);
			    	} else { echo $mehsul['miqdar']; }  ?>
			    <?php echo $mehsul['olcu_vahidi']; ?> qalıb
		 	</div>	
		 </div>
	
	<?php }

}