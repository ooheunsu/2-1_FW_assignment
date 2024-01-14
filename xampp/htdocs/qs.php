<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>퀴즈 결과</title>
</head>
<style>
    h3 {
        margin-bottom: 8px;
    }
</style>
<body>
<h1>퀴즈 결과</h1>
<table style="text-align: center;">
    <tr>
        <th>영어 단어</th>
        <th>사용자 입력</th>
    </tr>
    <?php
    session_start();
    include_once('voca.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user_answers = $_POST['user_answers']; # 사용자가 입력한 답을 저장하는 배열
        $correct_answers = $_POST['correct_answers']; # 정답을 저장하는 배열

        $num_questions = count($user_answers); # 출제된 퀴즈의 총 문항 수(채점하기 위해서 사용됨)

        $keys = array_keys($voca); # $voca배열의 key값들을 저장한 배열 생성
        $quiz_words = $_SESSION['quiz_words']; # 출제된 단어들을 저장하는 배열을 가져와서 정의

        $correct_words = []; # 맞힌 단어를 저장할 연관 배열 (각 단어를 key로 각 단어의 한글 뜻을 value로 저장함)
        $incorrect_words = []; # 틀린 단어를 저장할 연관 배열 (각 단어를 key로 각 단어의 한글 뜻을 value로 저장함)

        for ($i = 0; $i < $num_questions; $i++) {
            $user_answer = trim($user_answers[$i]);
            $correct_answer = trim($correct_answers[$i]);

            $word = $keys[$quiz_words[$i]]; # quiz.php에서 출제된 랜덤 단어 가져오기

            # 입력된 단어 채점하기 (해당하는 한글 뜻 중 어느 하나와라도 일치하면 정답으로 처리)
            $correct_meanings = $voca[$word];
            $result = in_array($user_answer, $correct_meanings) ? 'correct' : 'incorrect';

            # 맞힌 단어와 틀린 단어를 각각의 연관 배열에 저장
            if ($result === 'correct') {
                $correct_words[$word] = $correct_meanings;
            } else {
                $incorrect_words[$word] = $correct_meanings;
            }

            echo "<tr>
                    <td>$word</td>
                    <td>$user_answer</td>
                   
                  </tr>";
        }

        // 맞힌 단어와 틀린 단어를 출력
        echo "</table>";
        echo "<h3>맞힌 단어</h3>";
        echo "&nbsp&nbsp&nbsp&nbsp";
        foreach ($correct_words as $word => $meanings) {
            echo "$word:";
            for ($i = 0; $i < count($meanings); $i++) {
                if ($i < count($meanings) - 1) {
                    echo trim($meanings[$i]) . ", ";
                } else {
                    echo trim($meanings[$i]);
                }
            }
            echo "&nbsp&nbsp";
        }

        echo "<h3>틀린 단어</h3>";
        echo "&nbsp&nbsp&nbsp&nbsp";
        foreach ($incorrect_words as $word => $meanings) {
            echo "$word:";
            for ($i = 0; $i < count($meanings); $i++) {
                if ($i < count($meanings) - 1) {
                    echo trim($meanings[$i]) . ", ";
                } else {
                    echo trim($meanings[$i]);
                }
                
            }
            echo "&nbsp&nbsp";
        }
}
    ?>
</table>
</body>
</html>





