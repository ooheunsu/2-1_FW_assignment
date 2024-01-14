<?php
function uploadFile() {
	# 파일 선택을 했는지 확인
	if(!isset($_FILES['att']) || $_FILES['att']['error'] != 0) {
		return null;
	}
	$target_dir = 'uploads/'; // 현재 php 파일이 있는 폴더의 하위 폴더인 uploads에 파일 저장
	$target_file = $target_dir . basename($_FILES['att']['name']); // uploads/pizza1.jpg
	$upload_ok = 1;

	# 조건 확인
	if($_FILES['att']['size'] > 500000000) { // 파일 크기가 500MB 초과하는 경우
		echo "오류: 파일 크기가 500MB를 초과하였습니다.";
		$upload_ok = 0;
	}

	# 업로된된 임시 파일을 업로드 폴더로 이동
	if($upload_ok == 0) {
		echo "파일업로드를 종료합니다.";
		return null;
	}
	else {
		if(move_uploaded_file($_FILES['att']['tmp_name'], $target_file)) { # 0607여기가 오류가 난다내
			echo "파일 ".basename($_FILES['att']['name'])."을 업로드하였습니다.";
			return basename($_FILES['att']['name']);
		}
		else {
			echo "임사 파일을 이동 중에 오류가 발생하였습니다.";
			return null;
		}
	}

}
session_start();
include_once('dbconn.php');
$email = $_SESSION['uid'];
$wdate = $_POST['wdate'];
$title = $_POST['title'];
$note = $_POST['note'];
# $file = $_FILES['att']; 0607왜 여기는 이게없제

$att = uploadFile();  // 업로드 파일명 또는 null 반환

$sql = "insert into board(email,wdate,title,content,attachment) 
		values('$email','$wdate','$title','$note','$att')";
if($conn->query($sql)) {
    echo "<script>alert('게시글이 저장되었습니다.'); location.href='writeboard2.php'</script>"; #0607왜 writeboard2지...
}
else {
    echo "게시글 저장에 오류가 발생했습니다. <br>";
    echo $conn->error;
}
?>
