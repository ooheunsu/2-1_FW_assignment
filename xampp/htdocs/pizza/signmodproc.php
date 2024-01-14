<?php
/*******************
 * FILE : signmodproc.php (파일명)
 * 회원정보를 member 테이블에서 수정함 (파일주요내용, 기능)
 * 2023.05.16 (생성날짜? 수정날짜?)
 * 이런식으로 php머릿말에는 항상 써줘야함
 */
# DB연결
# 데이터 읽어오기
# Update SQL 구문 작성하고 실행하기
session_start();
include_once('dbconn.php'); # dbconn.php 파일의 내용을 그대로 복사해옴, include_once이용 (나중에 DB이름이 바뀌어도 php는 수정안해도됨)
$email = $_POST['email'];
$uname = $_POST['uname'];
$pwd = $_POST['pwd'];
$telno = $_POST['telno'];
$sql = "update member set name = '$uname', pwd = '$pwd', telno = '$telno'
        where email = '$email'"; # where email = '$email' 를 써줌으로서 조건추가
if($conn->query($sql)) {
    $_SESSION['pz_uname'] = $uname; # 변경된 회원명을 세션데이터에 저장함
    echo "<script>alert('회원정보 수정이 성공하였습니다.');</script>"; # 박스 팝업으로 하나뜸 - alert
    echo "<script>location.replace('index.php')</script>"; # alert랑 세트, 방법2 .. + href보다 replace방법을 더 선호함
}
else {
    echo "<script>alert('회원정보 수정이 실패하였습니다.');</script>"; # 박스 팝업으로 하나뜸 - alert
    echo "<script>location.replace('signmodify.php')</script>"; # alert랑 세트, 방법2 .. + href보다 replace방법을 더 선호함
}
?>