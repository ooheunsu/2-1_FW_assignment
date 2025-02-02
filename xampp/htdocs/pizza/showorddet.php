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
	<h1>주문내역</h1>
    <?php
    # 주문정보 페이지에서 선택한 특정 주문의 물품 내역을 검색하고 출력하기
    $ordno = $_GET['ordno']; # ?=값 하고 넘기는건 get으로 값을 받아야함
    include_once('dbconn.php');
    # orditem에서는 전부 mypizza에서는 large랑 small만
    $sql = "select orditem.*, large, small from orditem, mypizza 
            where ordno = '$ordno' and pizzaname = name order by seq"; # orditem의 pizzaname이랑 mypizza의 name이랑 연결해라 join
    $result = $conn->query($sql);
    if(!$result) die('주문상세내역 검색 오류 : '. $conn->error);
    if($result->num_rows > 0) {
    ?>
    <table id="pizza">
        <tr>
            <th>주문번호</th><th>No</th><th>피자</th><th>사이즈</th><th>수량</th>
            <th>가격</th><th>주문금액</th>
        </tr>
        <?php
            while($row = $result->fetch_assoc()) {
                if($row['size'] == 'L') $price = $row['large'];
                else $price = $row['small'];
        ?>
            <tr>
                <td><?=$row['ordno']?></td>
                <td><?=$row['seq']?></td>
                <td><?=$row['pizzaname']?></td>
                <td><?=$row['size']?></td>
                <td><?=$row['qty']?></td>
                <td><?=$row['']?></td>
                <td><?=$row['price']?></td>

            </tr>
        <?php } ?>
    </table>    
    <?php } ?>
</body>
</html>

