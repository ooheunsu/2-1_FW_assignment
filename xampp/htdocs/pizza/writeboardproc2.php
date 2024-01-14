<?php
session_start();
$email = $_SESSION['pz_uid'];
include_once('dbconn.php');
$wdate = $_POST['wdate'];
$title = $_POST['title'];
$note = $_POST['note'];
$file = $_FILES['att'];
var_dump($file)

# writeboardproc 하다가 시간이 없어서 관둠, 그래서 파일 올려주심
?>