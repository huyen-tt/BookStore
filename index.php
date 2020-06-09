<?php
    session_start();
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    if(isset($_SESSION['username']))
    {
        $tenND=$_SESSION['username'];
        if($_SESSION['username']=="admin"){
            header("location:exit.php");
        }
         //echo $so;
    require_once("connection.php");
    $sql_cm = "SELECT COUNT(idG) AS so FROM sach,giohang,chitiet,user 
    WHERE username=nguoidat AND idG=idGct AND idSct=idSach AND nguoidat='$tenND'";
    $result_cm = $conn->query($sql_cm);
   // var_dump($result_cm);
    $row_cm = $result_cm->fetch_assoc();
    //echo($row_cm['so']); 
    $so=$row_cm['so'];
    $sql_mn = "SELECT SUM(tongtien) AS tien FROM giohang,chitiet WHERE nguoidat='$tenND' and idGct=idG";
    $result_mn = $conn->query($sql_mn);
    $row_mn = $result_mn->fetch_assoc();
    $tien=$row_mn['tien'];
    }
?>

<!DOCTYPE html>
<html>
<head>
<title>BookStore</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/CSS.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="icon" href="img/logo_bs.png">
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
    height: 650px;
    overflow:auto;
    border: 1px solid #ccc;
}
</style>
</head>

<body>
    <div style="background-color:rgba(34, 34, 51,0.85);position:fixed" class="w3-block">
            <button onclick="myFunction()" class="w3-button" style="font-size:16px;color:white;margin-top:2px;margin-bottom:2px">メニュー (Menu)</button>
            <div id="Demo" class="w3-dropdown-content w3-bar-block w3-gray">
                <a href="#nghethuat" class="w3-bar-item w3-button">画集本</a>
                <a href="#treem" class="w3-bar-item w3-button">子供向けの本</a>
                <a href="#thieunien" class="w3-bar-item w3-button">少年向けの本</a>  
                <a href="#lichsu" class="w3-bar-item w3-button">歴史の本</a>
                <a href="#nauan" class="w3-bar-item w3-button">料理の本</a>
                <a href="#langman" class="w3-bar-item w3-button">ロマンスの本</a>
                <a href="#bian" class="w3-bar-item w3-button">ミステリーの本</a>
            </div>
            <span ><a style="color:white" href="lsmh.php" class='w3-button'>購入履歴 (History)</a></span>
            <span ><a style="color:white" href="khtt.php" class='w3-button'>インセンティブ (Incentive)<?php if(isset($tien)){
                if($tien>2000000)
                echo"<sup><img src='image/tt.png' width='60px'></sup>";
            }?></a></span>
            <span ><a style="color:white" href="#contact" class='w3-button'>アシスト (Help)</a></span>
            <span style='display'>
        <?php
			if(isset($_SESSION['username'])){
                ?>
                  <a href="exit.php"><button class="w3-button w3-red w3-small w3-round w3-display-right">ログアウト</button></a>
                <?php
			}else{
				?><a href="login.php"><button class="w3-button w3-blue w3-small w3-round w3-display-right">ログイン</button></a><?php
			}
        ?>
        </span>
    </div><br><br>
    <div id="dautrang"><img width="100%"src="image/image_top.png"></div>
    
    <div style="background-color:rgba(34, 34, 51, 0.85)" class='w3-table'>
        <table>
            <tr>
                <th><img style='margin-top:3px' class='w3-round' width='180px' src="image/logo_bs.png"></th>
                <th><p style='font-size:28px' class='w3-text-white'>BookStore</p></th>
                <th><div style='margin-top:28px'>
                <?php
                if(isset($_SESSION['username'])){
                        ?>
                            <a href="giohang.php" style="margin-left:500px"class="w3-button w3-round w3-yellow"><img title="カート (Cart)" width="28px" src="image/icon_shop.png">
                            <sup class="w3-red w3-round w3-large"><?php echo $so; ?></sup>
                            </a>
                        <?php
                }
                ?></div>
                </th>   
                <th>
                    <div style="margin-top:34px;margin-left:50px">
                    <form method='POST' action='search.php'>    
                        <input class='w3-round' placeholder='何を検索しますか?' name='search' required>
                        <button class='w3-button w3-small w3-orange w3-round' value='Search' type='submit'><i class="fa fa-search"></i></button>
                    </form>
                    </div>
                </th>
            </tr>
        </table>
    </div>
    <div id="style1" class="w3-block w3-center">

        <button  class="w3-button">画集本</button>
        <button class="w3-button">子供向けの本</button>
        <button class="w3-button ">少年向けの本</button>
        <button class="w3-button">歴史の本</button>
        <button class="w3-button" >料理の本</button>
        <button class="w3-button">ロマンスの本</button>
        <button class="w3-button">ミステリーの本</button>
    </div>
    <div class="w3-threequarter">
            <div class="w3-content w3-section" style="max-width:100%">
                <img class="mySlides" src="image/1.jpg" style="width:140%;height:200px">
                <img class="mySlides" src="image/6.jpg" style="width:140%;height:200px">
                                     
            </div>
    </div>  
    <!-- <img src="image/top2.png"> -->
    <table class="w3-border w3-table" width="100%">
            <th><button title="画集" class="w3-button"><img width="80px" src="image/icon_loai/nghethuat.jpg"></button></th>
            <th><button title="子供" class="w3-button"><img width="80px" src="image/icon_loai/treem.jpg"></button></th>
            <th><button title="少年" class="w3-button"><img width="80px" src="image/icon_loai/thieunien.jpg"></button></th>
            <th><button title="歴史" class="w3-button"><img width="80px" src="image/icon_loai/lichsu.png"></button></th>
            <th><button title="料理" class="w3-button"><img width="80px" src="image/icon_loai/nauan.jpg"></button></th>
            <th><button title="ロマンス" class="w3-button"><img width="80px" src="image/icon_loai/langman.png"></button></th>
            <th><button title="ミステリー" class="w3-button"><img width="80px" src="image/icon_loai/bian.jpg"></button></th>
    </table>
    <div style='margin-top:16px'class="w3-quarter w3-small w3-center">
            <p style='font-size:20px' class='w3-text-grey'>カテゴリー</p>
            <div class="w3-container w3-bar-block w3-border">
                <a href="#nghethuat" class="w3-bar-item w3-button w3-grey">画集本<img class='w3-right' width="20px" src="image/icon_loai/nghethuat.jpg"></a>
                <a href="#treem" class="w3-bar-item w3-button w3-border-pale-red" >子供向けの本<img class='w3-right' width="20px" src="image/icon_loai/treem.jpg"></a>
                <a href="#thieunien" class="w3-bar-item w3-button w3-grey">少年向けの本<img class='w3-right' width="20px" src="image/icon_loai/thieunien.jpg"></a>
                <a href="#lichsu" class="w3-bar-item w3-button w3-border-pale-red">歴史の本<img class='w3-right' width="20px" src="image/icon_loai/lichsu.png"></a>
                <a href="#nauan" class="w3-bar-item w3-button w3-grey" >料理の本<img class='w3-right' width="20px" src="image/icon_loai/bian.jpg"></a>
                <a href="#langman" class="w3-bar-item w3-button w3-border-pale-red">ロマンスの本<img class='w3-right' width="20px" src="image/icon_loai/langman.png"></a>
                <a href="#bian" class="w3-bar-item w3-button w3-grey">ミステリーの本<img class='w3-right' width="20px" src="image/icon_loai/bian.jpg"></a>
            </div>
    </div>
    
    <div class='w3-threequarter'>
        <div class="w3-border w3-myfont">
            <h2 id="style1">メニューブック<strong><u></u></strong></h2>
            <div id="nghethuat" style='background-image:url(image/arts.jpg);background-size:100%'>
                <div class="w3-yellow w3-card" id="style3">画集本<span style='margin-left:70%'><a href='book.php?id=2' class='w3-small'>続きを見る</a></span></div>
                <div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:20px;margin-left:100px;margin-right:100px">
                    <div class="w3-row-padding w3-padding-16 w3-center">
                        <?php
                            require_once("connection.php");
                            $sql_nt = "SELECT * FROM sach,danhmuc WHERE id=idDM AND idDM=2";
                            $result_nt = $conn->query($sql_nt);  
                            if ($result_nt->num_rows > 0) {
                                $stop=0;
                                while($row_nt = $result_nt->fetch_assoc()) {
                                    echo "<div class='w3-quarter w3-card' style='margin-left:50px'>";?>
                                    <br>
                                    <img class='w3-hover-opacity' src='<?php echo($row_nt['image']);?>' style='width:100%;height:220px'/>
                                    <p class="w3-text-white w3-yellow"><?php echo $row_nt['gia']?> đ</p>
                                    <a class='w3-button w3-yellow w3-small' href="info.php?id='<?php echo($row_nt['idSach']);?>'">本を買う</a><br><br><?php               
                                    echo "</div>";
                                    $stop++;
                                    if($stop==6){
                                        break;
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            <br><br>
            <div id="treem"  style='background-image:url(image/kid.jpg);background-size:100% 100%'>
                <p class="w3-green w3-card" id="style3">子供向けの本<span style='margin-left:76%'><a href='book.php?id=3' class='w3-small'>続きを見る</a></span></p>
                <!--cac san pham sach de o day-->
                <div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:20px;margin-left:100px;margin-right:100px">
                    <div class="w3-row-padding w3-padding-16 w3-center">
                        <?php
                            require_once("connection.php");
                            $sql_te = "SELECT * FROM sach,danhmuc WHERE id=idDM AND idDM=3";
                            $result_te = $conn->query($sql_te); 
                            if ($result_te->num_rows > 0) {
                                $stop=0;
                                while($row_te = $result_te->fetch_assoc()) {
                                    echo "<div class='w3-quarter w3-card' style='margin-left:50px'>";?>
                                    <br>
                                    <img class='w3-hover-opacity' src='<?php echo($row_te['image']);?>' style='width:100%;height:220px'/>
                                    <p class="w3-text-white w3-green"><?php echo $row_te['gia']?> đ</p>
                                    <a class='w3-button w3-green w3-small' href="info.php?id='<?php echo($row_te['idSach']);?>'">本を買う</a><br><br><?php               
                                    echo "</div>";
                                    $stop++;
                                    if($stop==6){
                                        break;
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            <br><br>
            <div id="thieunien" style='background-image:url(image/teen.jpg);background-size:100% 100%'>
                <p class="w3-red w3-card" id="style3">少年向けの本<span style='margin-left:73%'><a href='book.php?id=4' class='w3-small'>続きを見る</a></span></p>
                <!--cac san pham sach de o day-->
                <div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:20px;margin-left:100px;margin-right:100px">
                    <div class="w3-row-padding w3-padding-16 w3-center">
                        <?php
                            require_once("connection.php");
                            $sql_tn = "SELECT * FROM sach,danhmuc WHERE id=idDM AND idDM=4";
                            $result_tn = $conn->query($sql_tn);  
                            if ($result_tn->num_rows > 0) {
                                $stop=0;
                                while($row_tn = $result_tn->fetch_assoc()) {
                                    echo "<div class='w3-quarter w3-card' style='margin-left:50px'>";?>
                                    <br>
                                    <img class='w3-hover-opacity' src='<?php echo($row_tn['image']);?>' style='width:100%;height:220px'/>
                                    <p class="w3-text-white w3-red"><?php echo $row_tn['gia']?> đ</p>
                                    <a class='w3-button w3-red w3-small' href="info.php?id='<?php echo($row_tn['idSach']);?>'">本を買う</a><br><br><?php               
                                    echo "</div>";
                                    $stop++;
                                    if($stop==6){
                                        break;
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            <br><br>
            <div id="lichsu" style='background-image:url(image/his.jpg);background-size:100% 100%'>
                <p class="w3-blue w3-card" id="style3">歴史の本<span style='margin-left:74%'><a href='book.php?id=5' class='w3-small'>続きを見る</a></span></p>
                <!--cac san pham sach de o day-->
                <div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:20px;margin-left:100px;margin-right:100px">
                    <div class="w3-row-padding w3-padding-16 w3-center">
                        <?php
                            require_once("connection.php");
                            $sql_ls = "SELECT * FROM sach,danhmuc WHERE id=idDM AND idDM=5";
                            $result_ls = $conn->query($sql_ls);  
                            if ($result_ls->num_rows > 0) {
                                $stop=0;
                                while($row_ls = $result_ls->fetch_assoc()) {
                                    echo "<div class='w3-quarter w3-card' style='margin-left:50px'>";?>
                                    <br>
                                    <img class='w3-hover-opacity' src='<?php echo($row_ls['image']);?>' style='width:100%;height:220px'/>
                                    <p class="w3-text-white w3-blue"><?php echo $row_ls['gia']?> đ</p>
                                    <a class='w3-button w3-blue w3-small' href="info.php?id='<?php echo($row_ls['idSach']);?>'">本を買う</a><br><br><?php               
                                    echo "</div>";
                                    $stop++;
                                    if($stop==6){
                                        break;
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            <br><br>
            <div id="nauan" style='background-image:url(image/cook.jpg);background-size:100% 100%'>
                <p class="w3-orange w3-card" id="style3">料理の本<span style='margin-left:75%'><a href='book.php?id=6' class='w3-small'>続きを見る</a></span></p>
                <div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:20px;margin-left:100px;margin-right:100px">
                    <div class="w3-row-padding w3-padding-16 w3-center">
                        <?php
                            require_once("connection.php");
                            $sql_ls = "SELECT * FROM sach,danhmuc WHERE id=idDM AND idDM=6";
                            $result_ls = $conn->query($sql_ls);  
                            if ($result_ls->num_rows > 0) {
                                $stop=0;
                                while($row_ls = $result_ls->fetch_assoc()) {
                                    echo "<div class='w3-quarter w3-card' style='margin-left:50px'>";?>
                                    <br>
                                    <img class='w3-hover-opacity' src='<?php echo($row_ls['image']);?>' style='width:100%;height:220px'/>
                                    <p class="w3-text-white w3-orange"><?php echo $row_ls['gia']?> đ</p>
                                    <a class='w3-button w3-orange w3-small' href="info.php?id='<?php echo($row_ls['idSach']);?>'">本を買う</a><br><br><?php               
                                    echo "</div>";
                                    $stop++;
                                    if($stop==6){
                                        break;
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            <br><br>
            <div id="langman" style='background-image:url(image/rom.jpg);background-size:100% 100%'>
                <p class="w3-pink" id="style3">ロマンスの本<span style='margin-left:73%'><a href='book.php?id=7' class='w3-small'>続きを見る</a></span></p>
                <div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:20px;margin-left:100px;margin-right:100px">
                    <div class="w3-row-padding w3-padding-16 w3-center">
                        <?php
                            require_once("connection.php");
                            $sql_ls = "SELECT * FROM sach,danhmuc WHERE id=idDM AND idDM=7";
                            $result_ls = $conn->query($sql_ls);  
                            if ($result_ls->num_rows > 0) {
                                $stop=0;
                                while($row_ls = $result_ls->fetch_assoc()) {
                                    echo "<div class='w3-quarter w3-card' style='margin-left:50px'>";?>
                                    <br>
                                    <img class='w3-hover-opacity' src='<?php echo($row_ls['image']);?>' style='width:100%;height:220px'/>
                                    <p class="w3-text-white w3-pink"><?php echo $row_ls['gia']?> đ</p>
                                    <a class='w3-button w3-pink w3-small' href="info.php?id='<?php echo($row_ls['idSach']);?>'">本を買う</a><br><br><?php               
                                    echo "</div>";
                                    $stop++;
                                    if($stop==6){
                                        break;
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            <br><br>
            <div id="bian" style='background-image:url(image/fan.jpg);background-size:100% 100%'>
                <p class="w3-gray" id="style3">ミステリーの本<span style='margin-left:78%'><a href='book.php?id=8' class='w3-small'>続きを見る</a></span></p>
                <div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:20px;margin-left:100px;margin-right:100px">
                    <div class="w3-row-padding w3-padding-16 w3-center">
                        <?php
                            require_once("connection.php");
                            $sql_ls = "SELECT * FROM sach,danhmuc WHERE id=idDM AND idDM=8";
                            $result_ls = $conn->query($sql_ls);  
                            if ($result_ls->num_rows > 0) {
                                $stop=0;
                                while($row_ls = $result_ls->fetch_assoc()) {
                                    echo "<div class='w3-quarter w3-card' style='margin-left:50px'>";?>
                                    <br>
                                    <img class='w3-hover-opacity' src='<?php echo($row_ls['image']);?>' style='width:100%;height:220px'/>
                                    <p class="w3-text-red w3-gray"><?php echo $row_ls['gia']?> đ</p>
                                    <a class='w3-button w3-gray w3-small' href="info.php?id='<?php echo($row_ls['idSach']);?>'">本を買う</a><br><br><?php               
                                    echo "</div>";
                                    $stop++;
                                    if($stop==6){
                                        break;
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <div>
    <?php
        if(!isset($_SESSION['username'])){?>
            <div class="w3-center w3-border-top">
                <p>ログインしましたか？
                </p>
                <a href="login.php"><button class="w3-button w3-blue w3-round-xlarge">ログイン</button></a><br>
                <span>アカウントがないのですか？<a style="color:red" href="register.php"></a></span>
            </div><?php
        }
    ?>
    </div>
    <!-- Sale -->
    <div id="sale" class='w3-center'>*****</div>
    <div class="w3-black" id="tour">
        <div class="w3-container w3-content w3-padding-64" style="max-width:800px">
        <img class='w3-round' src='image/sale.jpg' style='width:50%;height:130px;margin-left:190px'>
        <p class="w3-opacity w3-center"><i>セール !</i></p><br>

        <ul class="w3-ul w3-border w3-white w3-text-grey">
            <li class="w3-padding">4月 <span class="w3-tag w3-red w3-margin-left">本はありません</span></li>
            <li class="w3-padding">5月 <span class="w3-tag w3-red w3-margin-left">本はありません</span></li>
            <li class="w3-padding">6月 <span class="w3-round w3-right w3-margin-right">本が残っています</span></li>
        </ul>

        <div class="w3-row-padding w3-padding-32" style="margin:0 -16px">
            <div class="w3-margin-bottom">
            
            <div class="w3-container w3-white">
            <?php
                require_once("connection.php");
                $sql_sale = "SELECT * FROM sach,danhmuc WHERE id=idDM AND idDM=1";
                $result_sale = $conn->query($sql_sale);  
                if ($result_sale->num_rows > 0) {
                    while($row_sale = $result_sale->fetch_assoc()) {
                        echo "<div class='w3-quarter w3-white'>";?>
                        <br>
                        <img class='w3-hover-opacity' src='<?php echo($row_sale['image']);?>' style='width:100%;height:260px'/>
                        <p class="w3-text-gray" style='margin-left:60px'><strike><?php echo $row_sale['gia']?></strike> đ</p>
                        <p class="w3-text-red" style='margin-left:60px'><?php echo $row_sale['gia_sale']?> đ</p>
                        <a class='w3-button w3-black' style='margin-left:43px' href="info.php?id='<?php echo($row_sale['idSach']);?>'">本を買う</a><br><br><?php               
                        echo "</div>";
                    }
                }
            ?>
                
            </div>
            </div>
        </div>
        </div>
    </div>
    <!-- comment-->
    <div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
        <h2 class="w3-wide w3-center">連絡とコメント</h2>
        <p class="w3-opacity w3-center"><i>質問とコメント</i></p>
        <div class="w3-row w3-padding-32">
        <div class="w3-col m6 w3-large w3-margin-bottom">
            <i class="fa fa-map-marker" style="width:30px"></i> Hanoi, VietNam<br>
            <i class="fa fa-phone" style="width:30px"></i> Phone:0123456789<br>
            <i class="fa fa-envelope" style="width:30px"> </i> Email: abcdef@gmail.com<br>
        </div>
        <div class="w3-col m6">
            <form action="comment.php" method="POST">
            <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
                <div class="w3-half">
                <input class="w3-input w3-border" type="text" placeholder="Name" required name="Name">
                </div>
                <div class="w3-half">
                <input class="w3-input w3-border" type="text" placeholder="Email" required name="Email">
                </div>
            </div>
            <input class="w3-input w3-border" type="text" placeholder="Message" required name="Message">
            <button class="w3-button w3-black w3-section w3-right" type="submit">SEND</button>
            </form>
        </div>
        </div>
    </div>
<br>

<!--footer-->
<footer class="w3-container w3-center" style='background-color:rgba(34, 34, 51,0.85)'>
    <br>                    
    <h2 class="w3-wide">BookStore</h2>
    <i class="fa fa-facebook-official"></i>
    <i class="fa fa-instagram"></i>
    <i class="fa fa-youtube"></i>
    <i class="fa fa-twitter"></i>
    <i class="fa fa-phone"></i>
    <i class="fa fa-envelope"></i>    
    <br><br>
</footer>
    <script>
        var myIndex = 0;
        carousel();
        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
            }
            myIndex++;
            if (myIndex > x.length) {myIndex = 1}    
            x[myIndex-1].style.display = "block";  
            setTimeout(carousel, 2000); // Thay đổi sau 2s
        }
    </script>
    <script>
        function myFunction() {
            var x = document.getElementById("Demo");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else { 
                x.className = x.className.replace(" w3-show", "");
            }
        }
    </script>
</body>
</html>