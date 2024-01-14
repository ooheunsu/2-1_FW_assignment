<?php
# feet와 inch를 m와 cm로 변환하기
$feet = $_GET['feet']; #3;
$inch = $_GET['inch']; #9;
# $inch = $inch + $feet * 12; # 1 feet = 12 inch 
$inch += $feet * 12;
$cm = $inch * 2.64; # 1 inch = 2.64cm
$meter = intdiv($cm, 100); # $cm / 100; , intdiv()는 정수 나누기임 몫을 반환함
$cm = $cm % 100; 

echo "당신의 키는 {$meter}미터 {$cm}센티미터입니다.";

$x = 8;
$y = "8";
var_dump(($x == $y)); # var_dump는 ()안에 변수형 확인
?>
