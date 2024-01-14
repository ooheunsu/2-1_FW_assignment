<?php
# 세션 시작하기, DB연결하기, 체크박스 데이터 가져오기
# DELECT SQL 구문 작성하고 실행하기

session_start();
include_once('dbconn.php');
$email = $_SESSION['pz_uid'];
if(!isset($_POST['chk'])) { // 체크한 항목이 없을 때
    echo "<script>alert('삭제할 장바구니 아이템들을 선택해야 합니다.');";
    echo "history.go(-1); </script>"; # history.go(-1); 이거는 바로 전페이지로 돌아가게 해주는 거
}
$items = $_POST['chk'];
#var_dump($items);
foreach($items as $item) {
    # #item 변수에는 피자이름@사이즈 형태로 들어있음. @를 기준으로 앞 뒤 값을 분리해야 함
    $pos = strpos($item, '@'); # $item에서 @ 위치를 반환해줌, $pos가 골뱅이위치를 알게되는거지
    $pizza = substr($item, 0 , $pos); # 부분 문자열을 추출
    $size = substr($item, $pos+1, 1); # 차피 맨끝앤 사이즈 L아님S가 들어가서 1만씀
   # echo "$pizza    $size <br>";
   $sql = "delete from cart where email = '$email' and pizza = '$pizza' and size = '$size'";
   if($conn->query($sql)) {
    echo "<script>alert('선택한 물품을 장바구니에서 삭제하였습니다.');";
    echo "location.href='showcart.php'; </script>";
   }   
   else "삭제 중에 오류가 발생했습니다." . $conn->error;
}

?>