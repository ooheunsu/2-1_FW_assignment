<?php
# 입력양식의 라디오버튼 값 읽어오기
$op = $_GET['op'];

$num1 = $_GET['num1'];
$num2 = $_GET['num2'];

$num3 = $_GET['num3'];

/*
# 선택한 연산자에 따라 실제 계산하도록 if문 작성
if ($op == '+') $answer = $num1 + $num2;
elseif ($op == '-') $answer = $num1 - $num2;
elseif ($op == '*') $answer = $num1 * $num2;
else $answer = $num1 / $num2;*/

# 위에 if문 똑같이 swich로 바꿔보겠음
// switch($op) {
//     case '+' : $answer = $num1 + $num2; break;
//     case '-' : $answer = $num1 - $num2; break;
//     case '*' : $answer = $num1 * $num2; break;
//     default : $answer = $num1 / $num2; //마지막 디폴트에는 브레이크안써줌
// }

#if, switch했고 다음은 match다
$answer = match($op) {
    '+' => $num1 + $num2,
    '-' => $num1 - $num2,
    '*' => $num1 * $num2,
    default => $num1 / $num2
};

# 결과를 출력
if($answer == $num3) echo "<h3>정답입니다.</h3>";
else echo "<h3>오답입니다.</h3>";

# 입력받은 수식출력
echo "<h3> $num1 $op $num2 = $answer</h3>";

?>