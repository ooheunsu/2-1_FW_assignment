<!DOCTYPE html>
<html>
<head>
    <title>회원정보수정</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
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
        <h2>회원정보수정</h2>
        <p>도레미피자 회원 정보를 수정합니다.</p>
        <hr>
        <?php
        session_start();
        # 로그인한 회원의 정보를 member 테이블에 가져와서 화면에 표시
        include_once('dbconn.php');
        $email = $_SESSION['pz_uid']; # 세션데이터에서 로그인한 회원의 아이디 읽음
        $sql = "select * from member where email = '$email'";
        $result = $conn->query($sql);   # 검색된 레코드들이 $result에 저장됨
        if($result->num_rows > 0) { # 검색된 레코드 개수가 0개 초과이면 
            # 방법1 : fetch_row()는 색인배열 형태로 꺼내옴, 가져옴
            # 방법2 : fetch_asort?()는 연관배열 형태로 꺼내옴, 가져옴
            $row = $result->fetch_row(); # 이거 한번 실행할 때 마다 첫번째 레코드를 꺼내와서 $row에 전해주는거야, 언제까지? 남아있는 레코드가 없을때까지
            # var_dump($row);
        }
        # else die("Test"); dngpgp...
        ?>
        <div class="container">
          <form action="signmodproc.php" method="post">
            <div class="row">
              <div class="col-25">
                <label for="fname">이메일</label>
              </div>
              <div class="col-75">
                <input type="text" name="email" value="<?= $row[0] ?>" id="email" readonly> <!-- php echo를 줄여서 ?=, 이거 정말 많이 쓴다고.. 외워두기 -->
				<!--이메일은 유저아이디로 변경하면 안됨, 떄문에 readonly 써주기 그믄 변경할 수 없고 보여주기만함 -->
                <button type="button" id="chkbtn" onclick="checkEmail()">중복확인</button>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">이름</label>
              </div>
              <div class="col-75">
                <input type="text" name="uname" value="<?= $row[1] ?>">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">비밀번호</label>
              </div>
              <div class="col-75">
                <input type="password" name="pwd" value="<?= $row[2] ?>">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">전화번호</label>
              </div>
              <div class="col-75">
                <input type="text" name="telno" value="<?= $row[3] ?>">
              </div>
            </div>
            <div class="row">
              <input type="submit" value="Submit">
            </div>
          </form>
        </div>
		<?php
        $result->close(); #05.16
        $conn->close(); #05.16
        ?>
		<script>
			function checkEmail() {
				const email = document.getElementById('email');
				const uid = email.value; 
				if(email.value.length == 0) {
					alert("이메일을 입력하여야 합니다.");
				}
				else {
					const xhs = new XMLHttpRequest();
					xhs.onreadystatechange = function() {
						if(xhs.readyState === xhs.DONE) {
							if(xhs.status === 200) {
								//alert(xhs.responseText);
								const result = JSON.parse(xhs.responseText);
								//alert(result.succ);
								if(result.succ === true) alert('이미 등록된 이메일입니다.');
								else alert('사용가능한 이메일입니다.');
							}
						}
					}
					xhs.open('GET', 'checkemail.php?uid='+uid);
					xhs.send();
				}
			}
			/*
			$("#chkbtn").click(function(e){
				const email = $('#email').val();
				if(email.length == 0) {
					alert("이메일을 입력하여야 합니다.");
					return;
				}
				//alert(email);
				$.ajax({
					url: 'checkemail.php',
					data: {uid: email},
					type: 'GET',
					dataType: 'json',
					success: function(data) {
						alert(data.succ);
						if(data.succ)
							alert('이미 등록된 이메일입니다.');
						else 
							alert('사용가능한 이메일입니다.');
					}
				});
			});*/
		</script>
    </body>
</html>