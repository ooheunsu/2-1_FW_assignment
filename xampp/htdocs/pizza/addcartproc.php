<?php
# 세션 시작하기, DB 연결하기, 데이터 가져오기
session_start();
include_once('dbconn.php');
$email = $_SESSION['pz_uid']; # 로그인한 사용자의 이메일
$pizza = $_POST['pizza'];
$size = $_POST['size'];
$qty = $_POST['qty'];
$large = $_POST['large'];
$small = $_POST['small'];
$price = $qty * (($size == 'L')? $large : $small);

# INSERT SQL 구문 작성하고 실행하기
$sql = "insert into cart values('$email', '$pizza', '$size', $qty, $price)";
if($conn->query($sql)) {
    echo "<script> let yesno;
            yesno = confirm('장바구니로 이동하시겠습니까?');
            if(yesno) location.href = 'showcart.php';
            else location.href = 'index.php';
            </script>";
}
else echo "장바구니 등록 실패". $conn->error;
?>