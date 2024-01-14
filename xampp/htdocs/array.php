<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>YamYam</title>
    </head>
    <body>
        <h1>YamYam Food</h1>
        <h3>Our Menu</h3>
        <?php
        $menu = ['치즈김밥', '라면', '칼국수', '돈까스'];
        $price = array(3800, 4100, 5500, 7200);
        # 메뉴 목록 만들기
        # 메뉴이름(가격) 으로 출력되게
        // for ($i = 0; $i < count($menu); $i++) 
        //     for($j = 0; $j < count($price); $j++) {
        //         echo "$menu[$i] ($price[$j])";
        //     }
        # 나는 이렇게 썼는데 지금 메뉴와 가격이 하나다..? 메뉴가늘면 가격도 추가해줘야하는 구조라서?
        echo "<ul>";
        for ($i = 0; $i < count($menu); $i++)
            echo "<li>$menu[$i] ($price[$i]원) </li>";
        echo "</ul>";
        ?> 
        <hr>
        <h3>Customer's Order</h3>
        <form action="order.php" method="get">
            <?php
             for ($i = 0; $i < count($menu); $i++)
                echo "$menu[$i] : <input type='number' name='m$i' value='0'><br>"; #큰따옴표안에 또 따옴표쓰려면 작은따옴표쓰면됨
                # 입력받는 상자 name을 순서대로 m0, m1 ...으로 하고싶은거임
                # 디폴트값 벨류는 0 ? ㅇㅎ
            ?>
            <input type="submit" value="주문">
        </form>   
    </body>
</html>
