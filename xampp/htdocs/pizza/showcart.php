<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Doremi Pizza Mall</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
                text-align: center;
            }
            #pizza {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 70%;
                margin-left: auto;
                margin-right: auto;
            }
            #pizza td, #pizza th {
                border: 1px solid #ddd;
                padding: 8px;
            }
            #pizza tr:nth-child(even){background-color: #f2f2f2;}
            #pizza tr:hover {background-color: #ddd;}
            #pizza th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: center;
                background-color: #4CAF50;
                color: white;
            }
        #pizza img {
            width: 120px;
            height: 80px;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 70%;
            opacity: 0.9;
            margin-top: 10px;
        }
        .btn:hover {
            opacity: 1;
        }
    </style>
</head>
<body>
    <h1>장바구니 목록</h1>
    <?php
    # 세션 시작하기, DB 연결하기
    # SELECT SQL 구문 작성하고 실행하기
    #session_start();
    include_once('dbconn.php');
    $email = $_SESSION['pz_uid'];
    $sql = "select cart.*, photo from cart , mypizza
            where email = '$email' and cart.pizza = name"; # 양쪽 테이블에 중복되는 값이 있으면 table.column로 써야함
    $result = $conn->query($sql);
    if(!$result) { # SQL 실행 오류 상태(예를 들면 cart라는 table이 없을 때), $result에 false 값이 들어감.
        die('장바구니 검색 오류 발생');
    }
    if($result->num_rows > 0) { # 0보다 크면 검색된 레코드가 있다는 뜻
        $no = 0;
    ?> 
    <form action="removecart.php" method="post">
        <table id="pizza">
            <tr>
                <th></th><th>No</th><th colspan="2">피자</th>
                <th>사이즈</th><th>수량</th><th>가격</th>
            </tr>
    <?php
        while($row = $result->fetch_assoc()) {
            $no++;
    ?>
        <tr> 
            <!-- 아래줄에 피자랑 사이즈를 구별하려고 @이 중간에 넣은거임 -->
            <td><input type="checkbox" name="chk[]" value="<?=$row['pizza']?>@<?=$row['size']?>"></td> 
            <td><?=$no?></td>    
            <td><img src="images/<?=$row['photo']?>"></td>
            <td><?=$row['pizza']?></td>
            <td><?=$row['size']?></td>
            <td><?=$row['qty']?></td>
            <td><?=$row['price']?></td>
        </tr>
            <!-- echo $row['pizza']." : ".$row['size'] ." : ". $row['qty']." : ". $row['price']. "<br>" -->
    <?php }
    }
    ?>
    </table>
    <button type="submit" class="btn">장바구니삭제</button>
    </form>
    <button class="btn" onclick="location.href='ordernew.php'">피자주문</button>
    <!-- 여기서 선택해서 주문하는게 아니고 장바구니에 있는건 다 주문하는 거로 정하고 하겠음 -->
    <!-- onclick='어저고' 는 이거 눌렀을 때 어저고로 이동해라 -->
</body>
</html>








