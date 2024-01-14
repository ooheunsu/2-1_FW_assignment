<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>demon_world</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/ohchoi2.png">
    <style>
        @font-face {
            font-family: 'PyeongChangPeace-Bold';
            src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_2206-02@1.0/PyeongChangPeace-Bold.woff2') format('woff2');
            font-weight: 700;
            font-style: normal;
        }
        @font-face {
            font-family: 'NeoDunggeunmoPro-Regular';
            src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_2302@1.0/NeoDunggeunmoPro-Regular.woff2') format('woff2');
            font-weight: normal;
            font-style: normal;
        }
        body {
                text-align: center;
                background-image: url(https://i.imgur.com/oIjVl83.png);

            }
        h1{
            font-family: 'PyeongChangPeace-Bold';
        }

        .choice{
            font-family:"PyeongChangPeace-Bold"; 
            color: black; 
            font-size:35px; 
            text-decoration:none;
            position: absolute;
            top: 20px; /* 원하는 위치로 조정 */
            left: 20px; /* 원하는 위치로 조정 */
        }
        #product {
            font-family: 'NeoDunggeunmoPro-Regular';
            border-collapse: collapse;
            width: 70%;
            margin-left: auto;
            margin-right: auto;
        }
        #product td, #product th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        #product tr:nth-child(even){color: white;
            background-color: rgba(21,21,21,0.3);}

        #product tr:hover {color: black;
            background-color: rgba(255,255,255,0.5);}

        #product th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: rgba(8, 2, 2, 0.19);
            color: white;
        }
        #product img {
            width: 120px;
            height: 80px;
        }
        .btn {
            background-color: midnightblue;
            font-family: 'NeoDunggeunmoPro-Regular';
            font-size: 16px;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            width: 30%;
            opacity: 1;
            margin-top: 10px;
        }
        .btn:hover {
            background-color: lightgoldenrodyellow;
            color: midnightblue;
        }
    </style>
</head>
<body>
<a href="javascript:history.back()" class="choice">&nbsp;⇦ 뒤로가기</a>

    <h1>장바구니 목록</h1>
    <?php
    # 세션 시작하기, DB 연결하기
    # SELECT SQL 구문 작성하고 실행하기
    #session_start();
    include_once('dbconn2.php');
    function getCartData($tableName) {
        global $conn;
        if ($conn->connect_error) {
            die('데이터베이스 연결 오류: ' . $conn->connect_error);
        }

        $email = $_SESSION['dw_uid'];

        $sql = "select cart.*, photo from cart, $tableName where email = '$email' and cart.product = name";
        $result = $conn->query($sql);

        if (!$result) {
            die('장바구니 검색 오류 발생');
        }

        return $result;
    }

    $result1 = getCartData('c_c_change');
    $result2 = getCartData('jujutsu_kaisen');
    $result3 = getCartData('sinnoseuke');
    $result4 = getCartData('slam_dunk');
    $result5 = getCartData('sugar_sugar_rune');

    

     ?>
    <form action="removecart-m.php" method="post">
        <table id="product">
            <tr>
                <th>삭제할 상품 선택</th><th>No.</th><th colspan="2">상품</th>
                <th>적용된가격</th>
            </tr>
    
        <?php # 캐캐체 장바구니
        if($result1->num_rows > 0) { # 0보다 크면 검색된 레코드가 있다는 뜻
            $no = 0;

            while($row = $result1->fetch_assoc()) {
                $no++;
        ?>
            <tr> 
                <td><input type="checkbox" name="chk[]" value="<?=$row['product']?>@<?=$row['PRICE']?>"></td> 
                <td><?=$no?></td>    
                <td><img src="img/cc_change/<?=$row['photo']?>"></td>
                <td><?=$row['product']?></td>
                <td><?=$row['PRICE']?></td>
            </tr>
                
        <?php }
        }
        ?>

        <?php # 주술회전 장바구니
            if($result2->num_rows > 0) { # 0보다 크면 검색된 레코드가 있다는 뜻
                $no = 0;
                
                while($row = $result2->fetch_assoc()) {
                    $no++;
            ?>
                <tr> 
                    <td><input type="checkbox" name="chk[]" value="<?=$row['product']?>@<?=$row['PRICE']?>"></td> 
                    <td><?=$no?></td>    
                    <td><img src="img/jusul/<?=$row['photo']?>"></td>
                    <td><?=$row['product']?></td>
                    <td><?=$row['PRICE']?></td>
                </tr>
                    
            <?php }
            }
            ?>

        <?php # 짱구 장바구니
            if($result3->num_rows > 0) { # 0보다 크면 검색된 레코드가 있다는 뜻
                $no = 0;
                
                while($row = $result3->fetch_assoc()) {
                    $no++;
            ?>
                <tr> 
                    <td><input type="checkbox" name="chk[]" value="<?=$row['product']?>@<?=$row['PRICE']?>"></td> 
                    <td><?=$no?></td>    
                    <td><img src="img/zzang/<?=$row['photo']?>"></td>
                    <td><?=$row['product']?></td>
                    <td><?=$row['PRICE']?></td>
                </tr>
                    
            <?php }
            }
            ?>

        <?php # 슬램덩크 장바구니
            if($result4->num_rows > 0) { # 0보다 크면 검색된 레코드가 있다는 뜻
                $no = 0;
                
                while($row = $result4->fetch_assoc()) {
                    $no++;
            ?>
                <tr> 
                    <td><input type="checkbox" name="chk[]" value="<?=$row['product']?>@<?=$row['PRICE']?>"></td> 
                    <td><?=$no?></td>    
                    <td><img src="img/slam/<?=$row['photo']?>"></td>
                    <td><?=$row['product']?></td>
                    <td><?=$row['PRICE']?></td>
                </tr>
                    
            <?php }
            }
            ?>

        <?php # 슈가룬 장바구니
            if($result5->num_rows > 0) { # 0보다 크면 검색된 레코드가 있다는 뜻
                $no = 0;
                
                while($row = $result5->fetch_assoc()) {
                    $no++;
            ?>
                <tr> 
                    <td><input type="checkbox" name="chk[]" value="<?=$row['product']?>@<?=$row['PRICE']?>"></td> 
                    <td><?=$no?></td>    
                    <td><img src="img/sugar/<?=$row['photo']?>"></td>
                    <td><?=$row['product']?></td>
                    <td><?=$row['PRICE']?></td>
                </tr>
                    
            <?php }
        }
        ?>
    </table>
    <button type="submit" class="btn">선택한 물품 삭제</button>
    </form>
    <button class="btn" onclick="location.href='ordernew-m.php'">상품주문</button>
    <!-- 여기서 선택해서 주문하는게 아니고 장바구니에 있는건 다 주문하는 거로 정하고 하겠음 -->
    <!-- onclick='어저고' 는 이거 눌렀을 때 어저고로 이동해라 -->
</body>
</html>