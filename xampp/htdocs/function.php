<?php
declare(strict_types=1); # PHP 해석기에게 엄격한 타입 체크를 요청함, 숫자 1은 true를 의미(매개변수타입을 지켜야 할 때 사용)
#declare는 반드시 <?php 아래에!
echo "<h1>PHP Function</h1>";
$r = $_GET['r']; # 반지름 입력
$size = circle((int)$r, $length); // 함수 호출(call), = 함수 실행 # 함수 호출은 함수 정의 위쪽에 있으나 아래 있으나 상관이 없음
# 지금 이렇게 돌리면 오류가 나는데 이유는 5번줄에 $r 앞에 (int)를 안써줘서 그렇다네.. 
echo "반지름 = $r, 면적 = $size, 둘레 = $length<br>";
# 원의 반지름을 입력받고 면적과 둘레를 계산하는 Circle 함수를 정의
# function.php?r=7
# circle() 함수 정의
# 매개변수 전달. Call by Value(값에 의한 전달) : 매개변수에게 값을 복사해 줌
# 매개변수에 &를 붙이면 참조변수가 됨. 원본변수를 가리키는 별명. Call by Reference.(참조에 의한 전달)
function circle(int $r, &$length) : float { # 매개변수와 반환값의 타입을 지정할 수 있음
    #global $r; # $r은 전역변수를 사용한다.
    #$r = $GLOBALS['r'] # 전역변수 r의 값을 읽어와서 지역변수 $r에 대입
    $size = $r ** 2 * 3.1415;
    $length = $r * 2 * 3.1415;
    
    return $size; # 결과값 1개를 호출한 쪽으로 반환
}

$r = "8"; // 문자열 # 실수(12.6같은)를 넣어도 에러는 같음
$size = circle((int)$r, $length);
#여기 위에 $r 앞에도 (int)붙여주기, 타입이 맞지않아 뜨는 오류다~
echo "반지름 = $r, 면적 = $size, 둘레 = $length<br>";

?>