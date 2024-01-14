<?php
declare(strict_types=1);
echo "<h1>원의 면적과 둘레 계산</h1>";
#예제 : 여러개의 원들이 있을 때 면적과 둘레를 계산하고 출력하기
$radius = []; # 반지름 값들이 들어갈 배열, 여긴 전역변수 radius
make_circle($radius);
size_circle($radius); # 함수에 배열을 매개변수로 전달

# make_circle() : 5 ~ 15 사이의 임의의 수를 5개 구해서 반지름으로 $radius 배열에 저장
function make_circle(&$radius) { #원래 $radius는 위에 배열 $radius랑 같은게 아닌데 래퍼런스연산자 &를 붙이고 같아짐! #배열 참조 복사 Call by Referance
    #global $radius; # 전역변수 $radius를 사용하는 것
    #반복문 사용
    for($i = 0; $i < 5; $i++) {
        # + 배열에서 특정값이 있는지 없는지 알려주는 함수 ex) in_array(9, $a) 이말은 $a에 9가 들어있는가? -> ture or false 라는 뜻
        # 여기에 이게 들어있어? --> in_array, 여기에 이게 안들어있다면 --> !in_array
        $r = mt_rand(5, 15); # 임의의 수를 하나 구하자
        if(!in_array($r, $radius)) $radius[$i] = $r;
        else --$i; #반복을 하나 무효시키는, # 현재 인덱스를 다시 반복하도록 하나 감소시킴
        # radius[$i] = mt_rand(5, 15); 교수님이 쓰신것...ㅇㄴ ㅜ ++ in_array쓸 때는 내가 한것처럼 나누셨다
    }
}

# size_circle() : $radius 배열에 있는 반지름의 면적과 둘레를 계산하고 출력
# 면적 : radius ** 2 * 3.1415
# 둘레 : radius * 2 * 3.1415
function size_circle(array $radius) { # 배열복사 받음. Call by Value +# 앞에 array를 적어줌으로써 이제 배열 radius만 받겠다는 의미
    echo "<ul>";
    # 여기도 반복문?
    for($i = 0; $i < 5; $i++) {
        $size = $radius[$i] ** 2 * 3.1415;
        $length = $radius[$i] * 2 * 3.1415;
        echo "<li>반지름 = $radius[$i], 원의 면적: $size, 원의 둘레: $length</li>";
    }
    
    echo "</ul>";
}
echo "<hr>";
# 반지름 하나를 매개변수로 전달받고 면적과 둘레 계산해서 출력하는 함수
function circle(int $r, $key) {
    $size = $r ** 2 * 3.1415;
    $length = $r * 2 * 3.1415;
    echo "<li>인덱스 = $key, 반지름 = $r, 원의 면적: $size, 원의 둘레: $length</li>";
}

# 반지름 하나를 매개변수로 전달받고 면적을 계산해서 출력하는 함수
function circle2(int $r) {
    $size = $r ** 2 * 3.1415;
    return $size;
}
echo "<ol>";
#foreach($radius as $r) circle($r); # 배열에서 반지름 하나받고 $circle 돌림
array_walk($radius, "circle"); #배열함수 array_walk 함수 $array_walk($배열, "함수명"); 앞에 있는 배열의 인덱스와 첫 번째 값을 함수에 전달해서 실행시킴
# array_walk가 배열의 원소를 전달
$result = array_map("circle2", $radius); #얘는 앞에가 함수명이고 뒤가 배열이네 $array_map("함수명", $배열);
#함수의 실행된 결과를 모아서 배열로 만들어주는 것이 array_walk와의 차이점
var_dump($result); #난 안그러는디 교수님은 무슨 오류가 떴었음
echo "</ol>";

# PHP 동적함수 호출
$myfunc = "circle"; # 변수에 함수를 저장할 수 있음
$myfunc(8, 0); # 함수를 저장한 변수명을 함수처럼 호출할 수 있음
$myfunc = "circle2";
$val = $myfunc(9);
echo $val;
?>