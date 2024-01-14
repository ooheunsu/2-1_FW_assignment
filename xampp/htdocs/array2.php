<?php
# 예제 : 알바직원의 급여를 계산하자
# 직원이름  시급  주간근무시간  야간근무시간
# Lee      9210    47시간        28시간
# Park     9540    56시간        34시간
# Bong     9370    38시간        21시간
# 급여 = 일한시간 * 시급, 보너스 급여 = 야간근무시간 * 시급 = 급여의 20%
# 총 급여 = 급여 + 보너스 급여

# 2차원 색인배열로 데이터를 저장
$emp = [['Lee', 9210, 47, 28], ['Park', 9540, 56, 34], ['Bong', 9370, 38, 21]];
# 배열 프린트 해보기 print_r($emp);

# Lee의 급여 계산해보기 내가한..
$b = ($emp[0][1] * $emp[0][2]); # Lee의 시급 * 주간근무시간
$a = ($emp[0][1] * $emp[0][3]); # Lee의 시급 * 야간근무시간
$plusa = $a * 0.2;
$total = $b + $plusa;
echo "$total<br>";

# Lee의 급여 계싼 해보기 교수님이한..
$money = ($emp[0][2] + $emp[0][3]) * $emp[0][1];
$bonus = $emp[0][3] * $emp[0][1] * 0.2;
$wage = $money + $bonus;
echo $emp[0][0]. " : $money : $bonus : $wage <br>";

# Lee만해볼수는 없으니까 for으로 세명 다 출력
for($i=0; $i < count($emp); $i++) {
    # Lee의 급여 계싼 해보기 교수님이한..
    $money = ($emp[$i][2] + $emp[$i][3]) * $emp[$i][1];
    $bonus = $emp[$i][3] * $emp[$i][1] * 0.2;
    $wage = $money + $bonus;
    echo $emp[$i][0]. " : $money : $bonus : $wage <br>";
}

# 2차원 연관배열 #연관배열로 나타냄(연관배열의 value가 배열인.)
$emp2 = ['Lee' => [9210, 47, 28], 
        'Park' => [9540, 56, 34], 
        'Bong' => [9370, 38, 21]];
$keys = array_keys($emp2); #연관배열의 키들을 모아서 일차원 배열로 생성해 줌. #array_keys를 이용하면 연관배열의 키(리박봉)를 알아낼 수 있음
$data = $emp2[$keys[0]]; #data에는 연관배열의 value들이 들어가있게된거임
$money = ($data[1] + $data[2]) * $data[0];
$bonus = $data[2] * $data[0] * 0.2;
$wage = $money + $bonus;
echo "$keys[0] : $money : $bonus : $wage <br>";

# 얘도 리만볼순없으니카 포문으로 ㅋ
for($i=0; $i < count($keys); $i++) {
    $data = $emp2[$keys[$i]]; #data에는 연관배열의 value들이 들어가있게된거임
    $money = ($data[1] + $data[2]) * $data[0];
    $bonus = $data[2] * $data[0] * 0.2;
    $wage = $money + $bonus;
    echo "$keys[$i] : $money : $bonus : $wage <br>";
}

# 연관배열을 출력하기
# $val에는 $data내용이, $k에는 이름들이
foreach($emp2 as $k => $val) { #$emp는 색인배열이었어..?
    echo "$k => ";
    for($i=0; $i < count($val); $i++)
        echo "$val[$i] ";
    echo "<br>";
}
?>