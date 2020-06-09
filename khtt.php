<!DOCTYPE html>
<html>
<head>
<title>Incentive</title>
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
<style>
#overflowTest {
    color: white;
    padding: 15px;
    width: 100%;
    height: 500px;
    overflow:auto;
    border: 1px solid #ccc;
}
</style>
</head>
<body style="background-image:url(image/bg-khtt.jpg);background-size:100% 680px">
    
    <div class='w3-fixed w3-center w3-text-yellow'>
        <strong class='w3-center w3-xlarge'><u>Book Storeの忠実な顧客向け</u></strong><br>
        1.オファー 1<br>
        2.オファー 2<br>
        3.オファー 3
    </div>
    <hr>
    <?php
        session_start();
        if(isset($_SESSION['username'])){
            $kh=$_SESSION['username'];
            require_once("connection.php");
            
            $sql_mn = "SELECT SUM(tongtien) AS tien FROM giohang,chitiet WHERE nguoidat='$kh' and idGct=idG";
            $result_mn = $conn->query($sql_mn);
            $row_mn = $result_mn->fetch_assoc();
            $tien=$row_mn['tien'];
            if($tien==NULL){
                $tien=0;
            }
            echo ("<div class='w3-text-white'>Book Store で本を購入するために使用したお金: </div>"."<div class='w3-text-orange w3-center w3-jumbo'><strong>".$tien."</strong><span class='w3-large w3-text-red'><b> đồng</b></span>"."</div>");
        }else{
            header('location:login.php');
        }
        
    ?>
    <?php
    if($tien>2000000){
        echo"<img src='image/tt.png' style='margin-left:32%'>";
    }else{
        echo"<div class='w3-yellow w3-text-blue w3-large w3-center'>本の購入金額が<span class='w3-text-red w3-xlarge'>2.000.000 đ </span>以上になると、Book Store の忠実な顧客になります。</div>";
    }
    ?>

</body>