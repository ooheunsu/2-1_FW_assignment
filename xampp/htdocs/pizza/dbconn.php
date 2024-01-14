<?php
#MySQL 데이터베이스 서버에 접속하기
$server = 'localhost'; # IP주소로 주기 -> '127.0.01'
$user = 'root';
$passwd = '';
$dbname = 'pizzamall';
$conn = new mysqli($server, $user, $passwd, $dbname);
if($conn->connect_error)
    die("데이터베이스 서버 접속에 오류가 발생"); #멘트출력하고 종료해버림
    #echo "데이터베이스 서버 접속에 오류가 발생";
#else echo "접속 성공";
#var_dump($conn);
?>