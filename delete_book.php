<?php

    $id=$_GET['id'];
    require_once("connection.php");
    // $connect = mysql_connect("localhost","root","", "bookstore") or die("データベースに接続できません!");
    // mysql_select_db("bookstore",$connect);
    $sql="delete from sach where idSach='".$id."'";
    // mysql_query($sql);
    $query = mysqli_query($conn,$sql);
    header("location:admin.php");
?>