<?php
session_start();
session_destroy(); # 세션데이터 모두 삭제
header('location: index.php');
?>