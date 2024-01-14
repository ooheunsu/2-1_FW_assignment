<?php
session_start(); # 이 페이지에서 세션 데이터 처리를 하려고 한다. 항상 첫 번째 줄에 실행!
# 1) DB 연결하기
# 2) 로그인 데이터 읽어오기
# 3) select SQL 구문 작성하기
# 4) SQL 구문 실행하기 결과 받기
# 5) 검색결과 처리하기

# 1)
include_once('dbconn2.php');
# 2)
$email = $_POST['email'];
$pwd = $_POST['pwd'];
# 3)
$sql = "select * from member where email = '$email' and pwd = '$pwd'"; # sql문이 잘나오나 확인해보고 싶으면 echo
# 4)
$set = $conn->query($sql); # select 구문 실행하고 레코드 집합을 받음
# var_dump($set); # "num_rows"값이 0보다 크면 검색된 결과가 있다, 0이면 검색안됐따
# 5)
if($set->num_rows > 0) {
    #echo "로그인 성공";

    # 검색된 레코드를 읽어오기
    $row = $set->fetch_assoc(); # 레코드 하나를 연관배열 형태로 반환해줌, $row에는 연관배열 형태로 값이 들어가 있음
    # var_dump($row); 연관배열인지 함 확인해봄
    $uname = $row['name']; # 회원이름 가져옴

    # 세션 데이터 생성. 세션 데이터는 연관배열 형태를 가짐
    $_SESSION['dw_uid'] = $email;
    $_SESSION['dw_uname'] = $uname;
    echo "<script>alert('마계에 로그인 성공하였습니다.');</script>"; # 박스 팝업으로 하나뜸 - alert
    echo "<script>location.replace('project.php')</script>"; # alert랑 세트, 방법2 .. + href보다 replace방법을 더 선호함

}
else {
    # echo "로그인 실패";
    echo "<script>alert('마계에 로그인 실패하였습니다.');</script>"; # 박스 팝업으로 하나뜸 - alert
    echo "<script>location.replace('signin-m.html')</script>"; # alert랑 세트, 방법2 .. + href보다 replace방법을 더 선호함   
}
?>