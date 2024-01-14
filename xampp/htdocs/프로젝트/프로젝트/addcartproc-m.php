<?php
# 세션 시작하기, DB 연결하기, 데이터 가져오기
session_start();
include_once('dbconn2.php');
$email = $_SESSION['dw_uid']; # 로그인한 사용자의 이메일
$product = $_POST['product'];
$price = $_POST['price'];
$discounted_price = isset($_POST['discounted_price']) ? $_POST['discounted_price'] : null;

# 가격 설정
$selected_price = (!is_null($discounted_price)) ? $discounted_price : $price;

# INSERT SQL 구문 작성하고 실행하기
$sql = "insert into cart values('$email', '$product', '$selected_price')";
if($conn->query($sql)) {
    echo "<script> let yesno;
            yesno = confirm('장바구니로 이동하시겠습니까?');
            if(yesno) location.href = 'showcart-m.php';
            else history.back();
            </script>";
}
else echo "장바구니 등록 실패". $conn->error;
?>