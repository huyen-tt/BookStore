<?php
	require_once("connection.php");
	if (isset($_POST['Name'])) {
		$Name = $_POST["Name"];
		$Email = $_POST["Email"];
		$Message = $_POST["Message"];
		if ($Name == "" || $Email == "" || $Message =="") {
			?><script>
			alert("完全な情報を入力してください！");
		</script><?php
		}else{
			$sql = "INSERT INTO commet(name_comment,content,email) VALUES ('$Name','$Message','$Email')";
			mysqli_query($conn,$sql);
		}
    }
    header("location:index.php");
?>