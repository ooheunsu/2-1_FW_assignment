<?php
# 세션데이터 읽어오기(아이디)
# DB 연결하기
# DELETE SQL 구문 작성하고 실행하기
session_start();
include_once('dbconn.php');
$email = $_SESSION['pz_uid'];
$sql = "delete from member where email ='$email'";
if($conn->query($sql)) {
    // $_SESSION['pz_uname'] = $uname; # 변경된 회원명을 세션데이터에 저장함,, + 인서트제외 나머지 세개는 이게 필요가 없음
    session_destroy();
    echo "<script>alert('회원탈퇴가 성공하였습니다.');</script>"; # 박스 팝업으로 하나뜸 - alert
    echo "<script>location.replace('index.php')</script>"; # alert랑 세트, 방법2 .. + href보다 replace방법을 더 선호함
}
else {
    echo "<script>alert('회원탈퇴가 실패하였습니다.');</script>"; # 박스 팝업으로 하나뜸 - alert
    echo "<script>location.replace('index.php')</script>"; # alert랑 세트, 방법2 .. + href보다 replace방법을 더 선호함
}
$conn->close(); # DB disconnection 연결 해제 (안쓰면 나중에 자동해제되긴하는데 각 페이지 마다써주는게 좋음)
?>