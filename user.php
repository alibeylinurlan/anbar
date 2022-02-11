<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mənim səhifəm</title>
	<?php include 'components/head.php'; ?>
</head>
<body>
	<div class="topBar">
		Profildə düzəliş
	</div>
	<div class="container">
		<h2> <?php echo $_SESSION['userAd'] ?></h2>
		<br>	
		<h4>Bu hissədə parolunuzu dəyişə bilərsiniz</h4>
		<hr>
		<label>Əvvəlki parol</label>
		<input type="password" name="evvelki" class="form-control password evvel" required>
		<label>Yeni parol</label>
		<input type="password" name="yeni" class="form-control password yeni" required minlength="5">
		<br>
		<input type="submit" value="Təsdiqlə" class="mybtn bggrey wht tesdiq">
		<div class="eye">
			<i class="icon fas fa-eye"></i>
			<i class="icon fas fa-eye-slash"></i>
		</div>
		<span class="notifi"></span>
	</div>	
</body>
</html>