<?php
# 가격 정보를 배열에 저장해두기
$car_price = [21500, 28500, 35600, 29700, 30500, 33400];
$acc_price = [1100, 4500, 1700, 7200, 2000, 8000];
# rent.html에서 전달하는 입력데이터 읽어오기
$uname = $_GET['uname'];
$phone = $_GET['phone'];
$pdate = $_GET['pdate']; // string 문자열
$rdate = $_GET['rdate']; // string 문자열
$car = $_GET['car'];
# isset() : 변수 또는 배열이 정의되어 있는지 확인하는 함수
# if(isset($_GET['acc'])) $acc = $_GET['acc'];
$acc = $_GET['acc'] ?? array(); 
# ?? : 이 연산자는 널 안정성 연산자. , 물음표앞에 값이 비어서 널이 발생하는 상황을 얘가 물음표뒤에값을 $acc에 넣어서 널에러가 안나게 처리함

# 대여기간 계산(피에칯피에는 날짜계산하는 함수가 있음 -> date_diff(시작일, 종료일) 이 함수는 문자열로 받지않고 날짜 객체로 받음)
# 날짜 객체로 받는 건 new DateTime(시작날짜)new DateTime(종료날짜)으로 받음
$period = date_diff(new DateTime($pdate), new DateTime($rdate));    # 문자열 -> DateTime 객체
$days = $period->days;
// var_dump($period->days);

# 차량대여금액 계산
# substr(문자열, 시작위치, 갯수)이 뭐임
$no = substr($car, 1, 1);   # 문자열, 시작위치, 갯수
$price1 = $car_price[$no] * $days;
echo "<h3>차량대여비 = $price1</h3>";

# 옵션금액 계산($acc는 문자열이 아니라 배열이라 포이치로 하나하나 계산)
$price2 = 0;
foreach($acc as $item) {
    $no = substr($item, 1, 1);
    if($no < 4) $price2 += $acc_price[$no] * $days;
    else $price2 += $acc_price[$no];
    
}

echo "<h3>옵션대여비 = $price2</h3>";
/*
var_dump($uname); echo"<br>";
var_dump($phone); echo"<br>";
var_dump($pdate); echo"<br>";
var_dump($rdate); echo"<br>";
var_dump($car); echo"<br>";
var_dump($acc); echo"<br>"; */
?>