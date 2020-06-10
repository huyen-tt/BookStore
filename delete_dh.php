
<?php
    $id=$_GET['id'];
    require_once("connection.php");
    $sqlc = "SELECT nguoidat FROM giohang WHERE idG=$id";     
    $resultc = $conn->query($sqlc);
    $rowc = $resultc->fetch_assoc();
    $name=$rowc['nguoidat'];

    $sql="delete from chitiet where idGct='".$id."'";
    $query = mysqli_query($conn,$sql1);
    $sql2="delete from giohang where idG='".$id."'";
    $query = mysqli_query($conn,$sql2);
    header("location:giohang.php?id=$name");
?>