<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Qeyd ol</title>
	<?php include 'components/head.php'; ?>
</head>
<body>
	<div class="topBar">
		<div>Qeydiyyat</div>
	</div>
	<div class="form">
		<form action="" method="post">
			<label>Email</label>
			<input type="email" name="email" id="email" class="form-control" required>
			<label>Ad soyad</label>
			<input type="text" name="adSoyad" id="adSoyad" class="form-control" required minlength="3">
			<label>Parol</label>
			<input type="password" name="psw" id="password" class="form-control" required minlength="5">
			<div class="eye">
				<i class="fas fa-eye"></i>
				<i class="fas fa-eye-slash"></i>
			</div>
			<br>
			<input type="submit" value="Qeyd ol" class="mybtn bggrey wht">
		</form>
	</div>
	<?php 

	if (isset($_POST['email']) && isset($_POST['adSoyad']) && isset($_POST['psw']))
	{	
		$email = trim($_POST["email"]); 
		$ad = trim($_POST["adSoyad"]);
		$psw = base64_encode(trim($_POST["psw"])); //json encode, md5 ve s. ile daha da qarisiq etmek olar

		include 'config.php';

		$v=$db->prepare("select * from users where email=?");
		$v->execute(array($email));
		$x=$v->fetchALL(PDO::FETCH_ASSOC);

		if (count($x) != 0) 
		{ ?>
			
			<div style="max-width:580px; margin:auto" class="alert alert-danger">
				Bu email istifadə olunub
			</div>

		<?php }
		else
		{
			$insert = $db->prepare("
				insert into users set 
			  	email=?,
			  	ad_soyad=?,
			  	password=?
			  ");			   

			$ok = $insert->execute(array($email, $ad, $psw));  
			if ($ok) 
			{
				$v=$db->prepare("select * from users where email=? and password=?");
				$v->execute(array($email, $psw));
				$x = $v->fetch(PDO::FETCH_ASSOC);
				
				$_SESSION['userid'] = $x['id'];
				$_SESSION['userAd'] = $ad;
				$_SESSION['userEmail'] = $email;
				$_SESSION['status'] = 'moderator';

				header("refresh: 0.001; url=mehsul.php");
			}
		}

	}

	 ?>
</body>
</html>