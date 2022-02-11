<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mehsullar</title>
	<?php include 'components/head.php'; ?>
</head>
<body>
	<?php 

	include 'config.php';
	$v=$db->prepare("select * from mehsullar where deleted_at is ? order by id desc");
	$v->execute(array(null));
	$mehsullar=$v->fetchALL(PDO::FETCH_ASSOC);

	$v2=$db->prepare("select * from mehsullar where deleted_at is not ? order by id desc");
	$v2->execute(array(null));
	$silinen_sayi=count($v2->fetchALL(PDO::FETCH_ASSOC));

	 ?>
	<div class="user">
		<div>
			<h2>
				<b>Məhsullar</b>
			</h2>
		</div>
		<div>
			<span>
				<?php echo $_SESSION['userAd']; ?>
			</span>
			<hr>
			<i> Status: <?php echo $_SESSION['status']; ?>
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
		<div class="row">
			<?php if ($_SESSION['status'] == 'inzibatci'): ?>
			<div class="col-lg-1 plusy">
				<div class="plusdiv" title="məhsul əlavə et">
					<i class="plus fas fa-plus"></i>
				</div>
			</div>
			<div class="col-lg-1 plusx" style="display:none;">
				<div class="plusdiv">
					<i class="plus fas fa-plus"></i>
				</div>
			</div>
			<?php endif ?>
			
			<div class="col-lg-8">
				<div class="otherheader" style="padding: 7px;">
					<input type="text" id="axtar" name="axtar" placeholder="Məhsul axtar">
					<div class="bagla" style="display: none;">bağla</div>
					<div id="gelen" style="display: none;">
						
					</div>
				</div>
			</div>
			<?php if ($_SESSION['status'] == 'inzibatci'): ?>
			<div class="col-lg-3">
				<div class="otherheader">
					<span class="silinenler"  id="<?php echo $silinen_sayi; ?>">
						Silinənlər : <?php echo $silinen_sayi; ?> 
					</span>
					<a href="silinenler.php"><div class="btn btn-info btn-sm silinenbtn">Siyahı ↺</div></a>
				</div>
			</div>
			<?php endif ?>
			
			<?php if ($_SESSION['status'] == 'inzibatci'): ?>
			<div class="col-lg-12 yeni" style="display: none;"> 
				<div class="otherheader">
					<div class="row">
						<div class="col-lg-2">
							<input type="text" id="ad" name="ad" placeholder="Məhsulun adı" required class="form-control">
						</div>
						<div class="col-lg-2">
							<input type="number" step="0.01" name="miqdar" placeholder="Miqdarı" required class="form-control">
						</div>
						<div class="col-lg-2">
							<select name="olcuvahidi" required class="form-control">
			  					<option value="ədəd" selected>ədəd</option>
			  					<option value="kq">kq</option>
			  					<option value="litr">litr</option>
			  					<option value="metr">metr</option>
			  				</select>
						</div>
						<div class="col-lg-2">
							<input type="number" step="0.01" name="mayadeyeri" placeholder="Maya dəyəri" required class="form-control">
						</div>
						<div class="col-lg-2">
							<input type="number" step="0.01" name="satisqiymeti" placeholder="Satış qiyməti" required class="form-control">
						</div>
						<div class="col-lg-2">
							<input type="submit" value="Əlavə et" class="btn btn-success yukle">
						</div>
					</div>
				</div>
			</div>
			<?php endif ?>
		</div>
		<table>
		  <thead>
			  <tr>
			  	<th>No</th>
			    <th>Məhsulun adı</th>
			    <th>Miqdarı</th>
			    <th>Ölçü vahidi</th>
			    <th>Maya dəyəri (azn)</th>
			    <th>Satış qiyməti (azn)</th>
			    <th>Əlavə olunma tarixi</th>
			    <th>Qazanc (azn)</th>
			    <?php if ($_SESSION['status'] == "inzibatci"): ?>
			    	<th></th>
			    <?php endif ?>
			  </tr>
		  <thead>
		  <tbody>
		  <?php foreach ($mehsullar as $k => $mehsul) { ?>
			  <tr class='mehsulad tr<?php echo $k%2; ?>'>
			  	<td><?php echo $k+1; ?></td>
			    <td id="ad<?php echo $mehsul['id']; ?>"><?php echo $mehsul['adi']; ?></td>
			    <td id="miqdar<?php echo $mehsul['id']; ?>">
			    	<?php 
			    	if ($mehsul['olcu_vahidi'] == 'ədəd') {
			    		echo round($mehsul['miqdar']);
			    	} else { echo $mehsul['miqdar']; } 
			    	?>	
			    </td>
			    <td id="olcuvahidi<?php echo $mehsul['id']; ?>"><?php echo $mehsul['olcu_vahidi']; ?></td>
			    <td id="mayadeyeri<?php echo $mehsul['id']; ?>"><?php echo $mehsul['maya_deyeri']; ?> azn</td>
			    <td id="satisqiymeti<?php echo $mehsul['id']; ?>"><?php echo $mehsul['satis_qiymeti']; ?> azn</td>
			    <td><?php echo $mehsul['created_at']; ?></td>
			    <td id="qazanc<?php echo $mehsul['id']; ?>">
			    	<?php echo $mehsul['miqdar']*($mehsul['satis_qiymeti']-$mehsul['maya_deyeri']); ?> azn
			    </td>
			    <?php if ($_SESSION['status'] == "inzibatci"): ?>
			    <td>
			    	<div class="btn btn-danger btn-sm sil s<?php echo $mehsul['id']; ?>" id='<?php echo $mehsul['id']; ?>'>sil</div>
			    	<div class="btn btn-primary btn-sm duzelt">düzəlt</div>
			    </td>
			    <?php endif ?>
			  </tr>
			  <!--  inzibatci  -->
			  <?php if ($_SESSION['status'] == 'inzibatci') { ?>
				  <tr class="mehsul_form tr<?php echo $k%2; ?>" style="display:none;">
				  	<td><?php echo $k+1; ?></td>
				    <td>
				    	<input type="text" class="form-control" value="<?php echo $mehsul['adi']; ?>"
				    	id="fad<?php echo $mehsul['id']; ?>" style="max-width: 150px;">
				    </td>
				    <td>
				    	<input type="number" step="0.01" class="form-control" value="<?php echo $mehsul['miqdar']; ?>" id="fmiqdar<?php echo $mehsul['id']; ?>" style="max-width: 80px;">
				    </td>
				    <td>
				    	<i><?php echo $mehsul['olcu_vahidi']; ?></i>
				    </td>
				    <td>
				    	<input type="number" step="0.01" class="form-control" value="<?php echo $mehsul['maya_deyeri']; ?>" id="fmayadeyeri<?php echo $mehsul['id']; ?>" style="max-width: 80px;">
				    </td>
				    <td>
				    	<input type="number" step="0.01" class="form-control " value="<?php echo $mehsul['satis_qiymeti']; ?>" id="fsatisqiymeti<?php echo $mehsul['id']; ?>" style="max-width: 80px;">
				    </td>
				    <td><i>dəyişilmir</i></td>
				    <td>
				    	<i>hesablanacaq</i>
				    </td>
				    <td>
				    	<div class="btn btn-info btn-sm geri">geri</div>
				    	<div class="btn btn-success btn-sm tesdiq" id='<?php echo $mehsul['id']; ?>'>təsdiq</div>
				    </td>
				  </tr>
			  <?php } ?>
		  <?php }//foreach ?>
		  </tbody>
		</table>
	</div>
</body>
</html>