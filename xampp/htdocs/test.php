<!DOCTYPE html>
<html>
    <head>
        <title>PHP Coding</title>
    </head>
    <body>
        <h1>HTML 속에 PHP 두기</h1>
        <?php
        $a = 8;
        $b = $a * 21;
        echo "<h1>Hello PHP World!!</h1>";
        echo $a;
        echo "<br>";
        # 변수값 $b 바로옆에 '입니다.'를 붙여서 출력하고 싶을 때
        echo "답 = {$b}입니다.<br>";    # 방법1 : 변수를 중괄호로 감싼다
        echo "답 = ".$b."입니다.";  # 방법2 : 점.으로 이어붙인다
        ?>
    </body>
</html>