<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Giriş</title>
	<?php include 'components/head.php'; ?>
</head>
<body>
	<div class="topBar">
		<div>Anbar uçotu giriş səhifəsi </div>
		<div></div>
	</div>

	<div style="position: fixed; left: 10px; top:150px;max-width: 300px;">
		
		1. Moderator - Məhsullara baxıb, axtarış edə bilər, öz parolunu dəyişə bilər. <br><br>
		2. İnzibatçı - Məhsul əlavə edə bilər, məhsulu soft delete edə bilər amma tam silə bilməz. Soft delete olunmuş məhsulu geri yükləyə bilər. Moderatora inzibatcı statusu verə bilər. <br><br>
		3. Baş admin - Məhsulu tamamilə silə bilər. İnzibatçıyı moderator vəzifəsinə sala bilər.
	</div>
	<div style="position: fixed; right: 30px; top:150px;max-width: 300px;">
		1. Moderator girişi - moderator@gmail.com <br>
		2. İnzibatçı girişi - inzibatci@gmail.com <br>
		3. Baş admin girişi - basadmin@gmail.com <br><br>
		parol : 12345
	</div>

	<div class="form">
		<form action="" method="post">
			<label>Email</label>
			<input type="email" name="email" id="email" class="form-control" required>
			<label>Parol</label>
			<input type="password" name="psw" id="password" class="form-control" required min="5" max="10">
			<div class="eye">
				<i class="icon fas fa-eye"></i>
				<i class="icon fas fa-eye-slash"></i>
			</div>
			<br>
			<input type="submit" value="Giriş" class="mybtn bggrey wht">
		</form>

		<?php 
			//login emeliyyati
			if ($_POST) 
			{	
				@$email = trim($_POST["email"]); 
				@$psw = base64_encode(trim($_POST["psw"]));
				
				include 'config.php';
				$v=$db->prepare("select * from users where email=? and password=?");
				$v->execute(array($email, $psw));
				$x = $v->fetch(PDO::FETCH_ASSOC);
				$d = $v->rowCount();
				if ($d) {
					$_SESSION['userid'] = $x['id'];
					$_SESSION['userAd'] = $x['ad_soyad'];
					$_SESSION['userEmail'] = $x['email'];
					$_SESSION['status'] = $x['status'];
					$_SESSION['basadmin'] = $x['bas_admin'];

					header("refresh: 0.001; url=mehsul.php");
				}
				else
				{ ?>
					<br>
					<div class="alert alert-danger">
						Email və ya parol yanlışdır..
					</div>
				<?php }
				
			}
		?>

		<hr>
		<p>Qeydiyyatınız yoxdur? <a href="qeydol.php">Qeyd ol</a></p>
	</div>
	
</body>
</html>