<?php
# 1) DB 접속하기
# 2) 회원가입 데이터 읽어오기
# 3) INSERT SQL 구문 작성하기
# 4) SQL 구문 실행하고 결과 확인하기
# 1)
include_once('dbconn.php'); # dbconn.php 파일의 내용을 그대로 복사해옴, include_once이용 (나중에 DB이름이 바뀌어도 php는 수정안해도됨)
# 2)
$email = $_POST['email'];
$uname = $_POST['uname'];
$pwd = $_POST['pwd'];
$telno = $_POST['telno'];
$regdate = date('Y/m/d'); # 아팟치가 오늘날짜 가져오는
$point = 5000;
# 3)
$sql = "insert into member values('$email', '$uname', '$pwd', '$telno', '$regdate', $point)";
#echo $sql;
if($conn->query($sql)) {
    echo "회원가입 성공";
    #header('location: index.html'); # 헤더로 페이지 이동. 단 그 전에 있는 모든 echo는 무시됨. 아무것도 출력이 안돼
    echo "<script>alert('피자몰 회원가입이 성공하였습니다.');</script>"; # 박스 팝업으로 하나뜸 - alert
    echo "<script>location.replace('index.php')</script>"; # alert랑 세트, 방법2 .. + href보다 replace방법을 더 선호함
}
else {
    echo "<script>alert('피자몰 회원가입이 실패하였습니다.');</script>"; # 박스 팝업으로 하나뜸 - alert
    echo "<script>location.replace('signup.html')</script>"; # alert랑 세트, 방법2 .. + href보다 replace방법을 더 선호함
}
    

?>