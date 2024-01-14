<!DOCTYPE html>
<html>
<head>
    <title>피자배달 주문</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    * {
        box-sizing: border-box;
    }
    body {
        width: 600px;
        margin-left: auto;
        margin-right: auto;
    }
    input[type=text], input[type=password], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
    }
    label {
        padding: 12px 12px 12px 0;
        display: inline-block;
    }
    input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
		margin-top: 10px;
        float: right;
    }
    input[type=submit]:hover {
        background-color: #45a049;
    }
	input[readonly] {
		background-color: #ccc;
	}
    .container {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }
    .col-25 {
        float: left;
        width: 25%;
        margin-top: 6px;
    }
    .col-75 {
        float: left;
        width: 75%;
        margin-top: 6px;
    }
    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }
    </style>
    </head>
    <body>
        <?php
        session_start();
        include_once('dbconn.php');
        $uname = $_SESSION['pz_uname'];
        $email = $_SESSION['pz_uid'];
        
        # 새로운 주문번호를 생성, 현재 마지막 주문번호를 가져와서 순번을 하나 증가시켜야 함
        $sql = "select max(ordno) maxordno from porder";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        # 주문번호 형태는 년월일-순번 으로 정함
        $today = date('Y').date('m').date('d'); # 20230530 와 같은 결과가 나옴
        # porder 테이블에서 검색한 가장 큰 주문번호의 년월일 부분을 떼어내기
        $prefix = substr($row['maxordno'], 0, strpos($row['maxordno'], '-'));
        if($today == $prefix) { # (이 두개가 같다면) 오늘날짜로 이미 주문한 내역이 존재하는 경우
            $no = substr($row['maxordno'], strpos($row['maxordno'], '-')+1, 2);
            $no++;
            $ordno = $prefix . "-" . $no;
        }
        else    # 오늘 첫 번째 주문인거지
            $ordno = $today . "-01";    # 예를 들면 20230530-01 요런 형식으로 생성해줌
        

        # 장바구니에 담긴 핏짜들의 총 가격을 가져오기
        $sql = "select sum(price) amount from cart where email = '$email'"; # price column에 있는 걸(있는 값들을) sum해서 가져오라는겨
        $result = $conn->query($sql); # select 실행 결과는 1건 나옴, 왜냐면 금액 다 더해서 총합 금액 하나 나오니까
        $row = $result->fetch_assoc();
        $amount = $row['amount'];   # sum(price)값을 가져옴
        ?>
        <h2>피자 배달 주문</h2>
        <p>장바구니에 담긴 피자 배달 주문합니다.</p>
        <hr>
        <div class="container">
          <form action="ordernewproc.php" method="post">
            <div class="row">
              <div class="col-25">
                <label for="fname">주문자</label>
              </div>
              <div class="col-75">
                <input type="text" name="uname" value="<?=$uname?>" readonly>
				<input type="text" name="email" value="<?=$email?>" hidden>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="fname">주문번호</label>
              </div>
              <div class="col-75">
                <input type="text" name="ordno" value="<?=$ordno?>" readonly>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="fname">배달주소</label>
              </div>
              <div class="col-75">
                <input type="text" name="address" placeholder="Address..">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="fname">주문금액</label>
              </div>
              <div class="col-75">
                <input type="text" name="amount" value="<?=$amount?>" readonly>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="fname">배달료</label>
              </div>
              <div class="col-75">
                <input type="text" name="delamt" value="3000">
              </div>
            </div>
		    <div class="row">
              <input type="submit" value="Submit">
            </div>
		  </form>
		</div>
	</body>
</html>

