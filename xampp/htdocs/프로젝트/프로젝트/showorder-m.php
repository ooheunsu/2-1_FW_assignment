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
            font-size: 36px;
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
        #product tr:nth-child(even){
            background-color: rgba(8, 2, 2, 0.19);
            color:white;}

        #product tr:hover {background-color: #ddd;}

        #product th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: midnightblue;
            color: white;
        }
        #product img {
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
        .choice{
		font-family:"PyeongChangPeace-Bold"; 
		color: black; 
		font-size:35px; 
		text-decoration:none;
        position: absolute;
        top: 20px; /* 원하는 위치로 조정 */
        left: 20px; /* 원하는 위치로 조정 */
	}
    </style>
</head>
<body>
    <a href="project.php" class="choice">&nbsp;⌂ 홈으로가기</a>
	<h1>주문내역</h1>
    <?php
    # porder 테이블에서 레코드 검색하고 출력하기
    session_start();
    $email = $_SESSION['dw_uid'];
    include_once('dbconn2.php');
    $sql = "select * from porder where email = '$email' order by orddate desc"; 
    # select할 때 orddate(주문날짜) desc(내림차순, 큰값부터 먼저나옴) 하믄 orddate를 내림차순으로 select(검색)해라
    $result = $conn->query($sql);
    if(!$result) die('주문정보 테이블 검색 오류 : '.$conn->error);
    if($result->num_rows > 0) {
        $no = 1;
    ?>
    <table id="product">
        <tr>
            <th>주문번호</th><th>주문일자</th><th>주소</th><th>주문금액</th>
            <th>배달료</th><th>결제금액</th>
        </tr>
    <?php
        while($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><a href="showorddet-m.php?ordno=<?=$row['ordno']?>"><?=$row['ordno']?></a></td>
                <td><?=$row['orddate']?></td>       
                <td><?=$row['address']?></td>       
                <td><?=$row['amount']?></td>       
                <td><?=$row['delamt']?></td>       
                <td><?=$row['total']?></td>       
            </tr>
     <?php  } // while() 닫는거 ?>
    </table>
    <?php } // if() 닫는거 ?>
</body>
</html>

