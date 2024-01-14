<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>영어 단어 퀴즈</title>
    <style>
    </style>
</head>
<body>
<h1>영어 단어 퀴즈</h1>
<h3>아래 영어 단어의 한글 뜻을 적어 제출하시오.</h3>
<form action="quizscore.php" method="post">
    <table>
    <?php
    session_start(); // 세션 시작

    include_once('voca.php');

    $keys = array_keys($voca); # $voca배열의 key값들을 저장한 배열 생성

    # 랜덤 단어 5개 출력
    $num_questions = 5;
    $quiz_words = array_rand($keys, $num_questions);

    # 출제된 단어들 저장
    $_SESSION['quiz_words'] = $quiz_words;

    # 출제된 단어들을 이용하여 출력
    foreach ($quiz_words as $quiz_index) {
        $word = $keys[$quiz_index];
        echo "<tr>
            <td>$word</td>
            <td><input type='text' name='user_answers[]' required></td>
        </tr>";
        echo "<input type='hidden' name='correct_answers[]' value='" . implode(',', $voca[$word]) . "'>";
    }
            ?> 
        </table>
        <input type="hidden" name="quiz_words" value="<?php echo $wordParams; ?>"> <!-- 랜덤 단어 인덱스들을 전달 -->
            <input type="submit" value="제출">
        </form>
</body>
</html>


