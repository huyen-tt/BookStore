<html>
<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/CSS.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="icon" href="image/logo.png">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="w3-container">
<div style="margin-left:41%">
	<img src="img/logo_bs.png" width="40%">
</div>
<hr>
<div class="w3-container w3-round w3-card-4 w3-half" style="margin-left:26%">

	<form action="register.php" method="post">
	<div class="w3-center"><b style="font-size:30px">レジスター</b></div>
	<label class="w3-text-brown w3-small"><b>ニックネーム</b></label>
	<input class="w3-input w3-border w3-sand" type="text" id="username" name="username">
	<label class="w3-text-brown w3-small"><b>パスワード</b></label>
	<input class="w3-input w3-border w3-sand" type="password" id="pass" name="pass">
	<label class="w3-text-brown w3-small"><b>名前</b></label>
	<input class="w3-input w3-border w3-sand" type="text" id="name" name="name">
	<label class="w3-text-brown w3-small"><b>メール</b></label>
	<input class="w3-input w3-border w3-sand" type="text" id="email" name="email">
	<div style="margin-left:44%; margin-bottom:5%"><input type="submit" name="btn_submit" value="登録"></div>
	</form>
</div>
	
</body>
</html>
<?php
	require_once("connection.php");
	if (isset($_POST["btn_submit"])) {
		//get info from text-field by POST method
		$username = $_POST["username"];
		$password = $_POST["pass"];
		$name = $_POST["name"];
		$email = $_POST["email"];
		//Check required fields
		if ($username == "" || $password == "" || $name == "" || $email == "") {
			?><script>
			alert("完全な情報を入力してください！");
		</script><?php
		}else{
			//insert info into db
			$sql = "INSERT INTO user(
							username,
							password,
							name,
							email
						) VALUES (
							'$username',
							'$password',
							'$name',
							'$email'
						)";
			mysqli_query($conn,$sql);
			?><script>
				alert("登録に成功しました！");
			</script>
			<div style="margin-left:43%"><a href="login.php"><button class="w3-button">ログイン</button></a></div>			
			<?php
		}
	}
?>