<?php
    $id=$_GET['id'];
    $connect = mysql_connect("localhost","root","") or die("データベースに接続できません!");
    mysql_select_db("tdt",$connect);
    $sql="delete from sach where idSach='".$id."'";
    mysql_query($sql);
    header("location:admin.php");
?>