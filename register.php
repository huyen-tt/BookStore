<?php
	require_once("connection.php");
	if (isset($_POST["btn_submit"])) {
		//get info from text-field by POST method
		$username = $_POST["username"];
		$password = $_POST["pass"];
		$name = $_POST["name"];
		$email = $_POST["email"];

		//Check required fields
		function validRequired($str, $key){
			if($str === ''){ 
				global $err_msg;
				$err_msg[$key] = "入力必須です";
			}
		}

		//check valid email
		function validEmail($str,$key){
			if(!preg_match("/^([a-zA-Z0-9])+(a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $str)){
				global $err_msg;
				$err_msg[$key] = "メールの形式で入力してください";
			}
		}

		//check valid password
		function validPass($str, $key){
			if(!preg_match("/^(?=.*[A-Za-z])(?=.*\d)([A-Za-z\d]){8,}$/", $str)){
				global $err_msg;
				$err_msg[$key] = "文字と数字を含む8文字以上";
			}
		}

		//check the database to make sure
		// a user does not already exist with the same email
		function validEmailDup($email){
			global $err_msg;
			$conn = mysqli_connect('localhost','root','','bookstore');
			$user_check_query = "SELECT * FROM user WHERE email='$email' LIMIT 1";
			$result = mysqli_query($conn, $user_check_query);
			$user = mysqli_fetch_assoc($result);
			if ($user) { // if user exists
				$err_msg['email'] ="そのメールはすでに登録されています";
			}
		}
		
		validRequired($username, 'username');
		validRequired($password, 'pass');
		validRequired($name, 'name');
		validRequired($email, 'email');
		if(empty($err_msg)){
			validPass($password, 'pass');
			validEmail($email, 'email');
			validEmailDup($email);
			if(empty($err_msg)){
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
				</script><?php
					header('Location: login.php');
				?><?php
			}
		}
	}
?>

<html>
<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/CSS.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="icon" href="image/logo_bs.png">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="w3-container">
<div style="margin-left:41%">
	<img src="image/logo_bs.png" width="40%">
</div>
<hr>
<div class="w3-container w3-round w3-card-4 w3-half" style="margin-left:26%">

	<form action="register.php" method="post">
	<div class="w3-center"><b style="font-size:30px">レジスター</b></div>
	<label class="w3-text-brown w3-small, <?php if(!empty($err_msg['username'])) echo 'err'; ?>">
		ニックネーム
		<input class="w3-input w3-border w3-sand" type="text" value="<?php if(!empty($_POST['username'])) echo $_POST['username']; ?>" id="username" name="username">
	</label>
	<div class="area-msg">
        <?php
            if(!empty($err_msg['username'])) echo $err_msg['username'];
        ?>
	</div>
	<label class="w3-text-brown w3-small, <?php if(!empty($err_msg['pass'])) echo 'err'; ?>">
		パスワード<span style="font-size:12px">※英数字8文字以上</span>
		<input class="w3-input w3-border w3-sand" type="text" value="<?php if(!empty($_POST['pass'])) echo $_POST['pass']; ?>" id="pass" name="pass">
	</label>
	<div class="area-msg">
        <?php
            if(!empty($err_msg['pass'])) echo $err_msg['pass'];
        ?>
	</div>
	<label class="w3-text-brown w3-small, <?php if(!empty($err_msg['name'])) echo 'err'; ?>">
		名前
		<input class="w3-input w3-border w3-sand" type="text" value="<?php if(!empty($_POST['name'])) echo $_POST['name']; ?>" id="name" name="name">
	</label>
	<div class="area-msg">
        <?php
            if(!empty($err_msg['name'])) echo $err_msg['name'];
        ?>
	</div>
	<label class="w3-text-brown w3-small, <?php if(!empty($err_msg['email'])) echo 'err'; ?>">
		メール
		<input class="w3-input w3-border w3-sand" type="text" value="<?php if(!empty($_POST['email'])) echo $_POST['email']; ?>" id="email" name="email">
	</label>
	<div class="area-msg">
        <?php
            if(!empty($err_msg['email'])) echo $err_msg['email'];
        ?>
	</div>
	<div style="margin-left:44%; margin-bottom:5%"><input type="submit" name="btn_submit" value="登録"></div>
	</form>
</div>
</body>
</html>