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

        h1 {
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

        #content {
            font-family: 'NeoDunggeunmoPro-Regular';
            border-collapse: collapse;
            width: 70%;
            margin-left: auto;
            margin-right: auto;
        }

        #content td,
        #content th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #content tr:nth-child(even) {
            background-color: rgba(8, 2, 2, 0.19);
            color: white;
        }

        #content tr:hover {
            background-color: #ddd;
        }

        #content th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: midnightblue;
            color: white;
        }

        #content img {
            width: 120px;
            height: 80px;
        }

        .btn {
            background-color: midnightblue;
            font-family: 'PyeongChangPeace-Bold';
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 70%;
            opacity: 0.9;
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
	<h1>주문내역</h1>
    <?php
    # 주문정보 페이지에서 선택한 특정 주문의 물품 내역을 검색하고 출력하기
    $ordno = $_GET['ordno']; # ?=값 하고 넘기는건 get으로 값을 받아야함
    include_once('dbconn2.php');
    // $sql = "SELECT orditem.*, c_c_change.price, c_c_change.discounted_price
    //     FROM orditem
    //     JOIN c_c_change ON orditem.productname = c_c_change.name
    //     WHERE orditem.ordno = '$ordno'
    //     ORDER BY orditem.seq";
    $sql= "SELECT orditem.*, jujutsu_kaisen.price AS jujutsu_price, sinnoseuke.price AS sinnoseuke_price, slam_dunk.price AS 
    slam_dunk_price, sugar_sugar_rune.price AS sugar_rune_price, c_c_change.price AS c_c_change_price, c_c_change.discounted_price 
    AS c_c_change_discounted_price FROM orditem
    LEFT JOIN jujutsu_kaisen ON orditem.productname = jujutsu_kaisen.name
    LEFT JOIN sinnoseuke ON orditem.productname = sinnoseuke.name
    LEFT JOIN slam_dunk ON orditem.productname = slam_dunk.name
    LEFT JOIN sugar_sugar_rune ON orditem.productname = sugar_sugar_rune.name
    LEFT JOIN c_c_change ON orditem.productname = c_c_change.name
    WHERE orditem.ordno = '$ordno'
    ORDER BY orditem.seq";
    $result = $conn->query($sql);
    if(!$result) die('주문상세내역 검색 오류 : '. $conn->error);
    if($result->num_rows > 0) {
    ?>
    <table id="content">
        <tr>
            <th>주문번호</th><th>No</th><th>주문상품</th>
            <th>주문금액</th>
        </tr>
        <?php
            while($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?=$row['ordno']?></td>
                <td><?=$row['seq']?></td>
                <td><?=$row['productname']?></td>
                <td>
                <?php
                if (!is_null($row['c_c_change_discounted_price'])) {
                    echo $row['c_c_change_discounted_price'];
                } elseif (!is_null($row['c_c_change_price'])) {
                    echo $row['c_c_change_price'];
                } elseif (!is_null($row['jujutsu_price'])) {
                    echo $row['jujutsu_price'];
                } elseif (!is_null($row['sinnoseuke_price'])) {
                    echo $row['sinnoseuke_price'];
                } elseif (!is_null($row['slam_dunk_price'])) {
                    echo $row['slam_dunk_price'];
                } elseif (!is_null($row['sugar_rune_price'])) {
                    echo $row['sugar_rune_price'];
                }
                ?>
            </td>
            </tr>
        <?php } ?>
    </table>    
    <?php } ?>
</body>
</html>

