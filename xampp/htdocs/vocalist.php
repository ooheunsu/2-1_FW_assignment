<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>영어 단어장</title>
</head>
<style>
    h2 {
        margin-bottom: 10px;
    }
</style>
<body>
<?php
# $voca배열을 읽고 출력하기
include_once('voca.php'); # voca.php파일 가져오기

foreach($voca as $key => $value) {  # 영어 단어들 출력
    echo "<h2>$key</h2>";
    echo "&nbsp&nbsp&nbsp&nbsp";
    
    for ($i = 0; $i < $value; $i++) {
        if($i < count($value) - 1) {   # 마지막이 아닌것은 콤마를 찍어줌
        echo trim($value[$i]). ", ";
        } else {
        echo trim($value[$i]);  # 마지막 값은 콤마를 찍지 않음
            break;    
        }
      }
        
    }

// 또 다른 방법
// foreach($voca as $key => $value) { # 영어 단어들 출력
//     echo "<h2>$key</h2>";
//     for($i=0; $i < count($value); $i+=2)
//      {   echo "$value[$i]";
    
//       break;
//     }
//     if(count($value)!=1)
//         echo ", ";

//     for($i=1; $i < count($value); $i+=2)
//     {
//         echo "$value[$i]";
//       break;
//    
// }
?>
</body>
</html>
