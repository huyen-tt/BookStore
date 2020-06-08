<?php
session_start();
echo '<title>Exit</title>';
if (session_destroy()) {
    header("location:index.php");
}
else{
	echo"アクションはTRUEではありません！再試行してください!";
}
?> 