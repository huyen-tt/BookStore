<?php
    $id=$_GET['id'];
    require_once("connection.php");
    $sql_te = "SELECT * FROM sach WHERE idSach='$id'";
    $result_te = $conn->query($sql_te);  
    $row_te = $result_te->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
<title>本の情報を編集する</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/CSS.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="icon" href="image/logo_bs.png">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/CSS2.css">
<link rel="stylesheet" href="css/CSS3.css">
</head>
<body>
<div class=" w3-card-4 w3-half" style="margin-left:25%;margin-top:5%">
<div class="w3-xlarge w3-indigo w3-center w3-text-yellow">変化する : <?php echo($row_te['tenSach']);?></div>
<br>
<form class='w3-container' method="POST">
    <label class="w3-text-indigo"><strong>SALE　価格:</strong></label>
    <input class="w3-input"type="text" name="gia_sale" value="<?php echo($row_te['gia']);?>"><br>
    <input class="w3-button w3-indigo" type="submit" value="完了しました">
    <a href="admin.php" class="w3-button w3-green w3-right">キャンセル</a>
</form>
<br>
</div>
</body>
<?php
if(isset($_POST['gia_sale'])){
    require_once("connection.php");
    $resetID=1;
    $resetGia=$_POST['gia_sale'];
    $sql = "UPDATE sach SET idDM = '$resetID',gia_sale = '$resetGia' WHERE idSach='$id';";
    $query = mysqli_query($conn,$sql);
    header("location:admin.php");
}
?>
