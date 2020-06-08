<?php
session_start();
?>
<html>
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/CSS.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="icon" href="image/logo.png">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
	require_once("connection.php");
	if (isset($_POST["btn_submit"])) {
		//get user's info
		$username = $_POST["username"];
		$password = $_POST["password"];
		$username = strip_tags($username);
		$username = addslashes($username);
		$password = strip_tags($password);
		$password = addslashes($password);
		if ($username == "" || $password =="") {
			?>  <script>
					alert("ニックネームとパスワードを入力してください！");
				</script><?php
		}else{
			$sql = "select * from user where username = '$username' and password = '$password' ";
			$query = mysqli_query($conn,$sql);
			$num_rows = mysqli_num_rows($query);
			if ($num_rows==0) {
				?><script>
					alert("ニックネームまたはパスワードが正しくありません！もう一度やり直してください！");
				</script><?php
			}else{
				//save info into session
				$_SESSION['username'] = $username;
				if($username == "admin"){
					header('Location: admin.php');
				}else{
					header('Location: index.php');
				}             
			}
		}
	}
?>
	<div style="margin-left:43%">
		<img class="w3-circle" src="img/logo_bs.png" width="24%"><br><br>
	</div>
	<div class="w3-border w3-container w3-round-xlarge" style="margin-left:30%;margin-right:30%">
		<div class="w3-container">
			<h2 style="text-align:center">ログイン</h2>
		</div>
		<form method="POST" action="login.php">
			<label class="w3-text-brown w3-small"><b>ニックネーム</b></label>
			<input class="w3-input w3-border w3-sand" type="text" name="username" size="30">
			<label class="w3-text-brown w3-small"><b>パスワード</b></label>
			<input class="w3-input w3-border w3-sand" type="password" name="password" size="30"><hr>
			<div class="w3-center"><input class="w3-button w3-blue" name="btn_submit" type="submit" value="ログイン"></div>
		</form>
		<p class="w3-border w3-center">アカウントがないのですか？</p>
		<div class="w3-center"> <a href="register.php"class="w3-button w3-green">レジスター</a></div><br>
	</div>
	<br>
</body>
</html>