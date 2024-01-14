<?php
# 1. 로또 번호 생성 프로그램

# 1~45 사이의 임의의 수 6개를 생성하여 로또 번호 1세트를 생성한다.
# 이때 같은 숫자가 여러 번 나올 수 있으므로 중복값이 있는지 체크하고 중복되지 않도록 해야 한다.

# 로또번호 총 10세트를 생성하고 저장한 다음 다음의 기능을 수행한다.
# 1) 10세트 로또 번호를 나열하여 출력한다.
# 2) 10세트 로또 번호에서 1~45 각 숫자별 빈도수를 출력한다. 
# 3) 2)번 빈도수 기준으로 정렬하여 가장 많은 빈도수부터 출력한다.
/*************************************************************************************/
# 로또 데이터를 저장할 배열을 선언
$lotto = [];    # 일차원 배열, 전역변수
$set = [];  # 10세트를 저장할 배열, 이차원배열
for($i = 0; $i < 10; $i++) {
    $lotto = make_lotto();  # 로또 1세트 만들어서  반환하는 함수. 배열을 반환
    $set[$i] = $lotto;      # 배열의 원소로 일차원 배열을 저장
}

print_lotto($set); # 로또 10세트 출력
$lotto = make_lotto();  # 로또 1세트 만들어서  반환하는 함수. 배열을 반환
// print_lotto($lotto);    # 로또 1세트 출력

function make_lotto() {
    $lotto = [];    # make_lotto() 함수의 지역변수 선언
    # for 반복문으로 숫자 6개 만들고 $lotto 배열에 저장
    for($i = 0; $i < 6; $i++) {
        $number = mt_rand(1, 45);
        if(!in_array($number, $lotto)) $lotto[$i] = $number; # 로또 숫자 생성한 뒤 중복된 숫자인지 체크하고 아닐 경우에만 배열에 저장
        else --$i;
        // 아래는 교수님이 하신거
        // if(in_array($number, $lotto)) --$i;
        // else $lotto[$i] = $number;
    }
    sort($lotto);   # 배열의 값을 오름차순으로 정렬. $rsort($lotto) : 내림차순 정렬
    return $lotto;  # 로또 배열 반환
    
}

// function print_lotto($lotto) { # 로또 1세트 출력 함수걸랑    
//     # for 또는 foreach문으로 $lotto 배열의 로또 숫자 출력
//     for($i = 0; $i < count($lotto); $i++)
//     echo "$lotto[$i] ";
//     echo"<br>";
//     # 나는 포문, 아래는 포이치버전
//     foreach($lotto as $number) echo"$number ";
//     echo"<br>";
// }

function print_lotto($set) {
    # 로또 숫자 출력
    echo "<h3>추천 로또 10세트</h3>";
    $no = 1; # 순번?변수라했나머더라
    foreach($set as $lotto) {   # 로또 1세트를 $lotto 배열에 저장
        echo "SET $no : "; $no++;
        foreach($lotto as $num) echo"$num ";
        echo"<br>";
    }
}

# 2) 로또 10세트에서 각 숫자의 빈도수를 계산하기
$lotto_count = [];
for($i=0; $i<45; $i++){
    $key = "No.".($i+1);
    $lotto_count[$key] = count_lotto($i + 1, $set); #카운트로또라는 함수한테 (내가찾고싶은 숫자, $set이라는 배열)
    # 원래 $lotto_count[$i]이거 였는디 연관배열떔에 키로바꿈
} 
print_count($lotto_count);
# 탑다운방식, 위에서부터 단계별로 써내려가기?

# 3) 빈도수 정렬
arsort($lotto_count);    # 내림차순 : 큰값 --> 작은값, +rsort에서 연관배열정렬 arsort로 변경
echo "<br>";
print_count($lotto_count); # 이렇게 출력해봤더니 문제가 하나발생, 머머문제인데 해결방법은 $lotto_count배열을 연관배열로 만들기(key를 유지하면서)
# 그러고 연관배열을 정렬하겠다 하믄 arsort(연관배열), 왜 연관배열 정렬함수가 따로있냐? 키를 유지시키고 정렬하기 위해서

function count_lotto($num, $set) {
    # 이차원배열을 탐색하려면 포문안에 포문구조인 중첩구조로 가야함
    $count = 0;
    for($i = 0; $i < count($set); $i++) 
        if(in_array($num, $set[$i])) $count++; # 2. 근데 중복을 다 없애버렸응게 이렇게 써도된다?
    /*  # 1. 배열안에 중복되는 숫자가 있다면 이걸써야한다  
        for($j = 0; $j < count($set[$i]); $j++) 
            if($set[$i][$j] == $num) $count++; */
    return $count;
}

function print_count($lotto_count) {
    echo "<h3>로또번호별 출현 빈도수</h3>";

    /* 인덱스배열 출력하는법
    for($i = 0; $i < count($lotto_count); $i++)
        echo ($i+1)." : $lotto_count[$i] <br>"; */
    foreach($lotto_count as $key => $val)
        echo "$key : $val <br>";
}

?>