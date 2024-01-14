<?php
$voca = array(
    'conceit' => array('자만', '자부심'),
    'capable' => array('할 수 있는', '능력있는', '가능한'),
    'durable' => array('내구력이 있는', '튼튼한'),
    // 나머지 단어들...
);

$quizCount = 5; // 출제할 퀴즈 개수
$quizKeys = array_rand($voca, $quizCount); // 랜덤 단어 선택

$quiz = array();
foreach ($quizKeys as $key) {
    $quiz[$key] = $voca[$key];
}

$answers = array();
$correctWords = array();
$wrongWords = array();

// POST 요청 처리
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_POST as $key => $value) {
        $answers[$key] = $value;
        $word = trim($key);
        $meanings = $voca[$word];

        $isCorrect = false;
        foreach ($meanings as $meaning) {
            if (strtolower(trim($value)) == strtolower($meaning)) {
                $isCorrect = true;
                break;
            }
        }

        if ($isCorrect) {
            $correctWords[$word] = $meanings;
        } else {
            $wrongWords[$word] = array(
                'given' => $value,
                'correct' => $meanings
            );
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>영어 단어 퀴즈</title>
</head>
<body>
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h1>결과</h1>
        <p>총 문항 수: <?php echo count($quiz); ?></p>
        <p>맞은 단어:</p>
        <ul>
            <?php foreach ($correctWords as $word => $meanings): ?>
                <li><?php echo $word; ?> (<?php echo implode(', ', $meanings); ?>)</li>
            <?php endforeach; ?>
        </ul>
        <p>틀린 단어:</p>
        <ul>
            <?php foreach ($wrongWords as $word => $data): ?>
                <li><?php echo $word; ?> - 입력값: <?php echo $data['given']; ?>, 정답: <?php echo implode(', ', $data['correct']); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <h1>영어 단어 퀴즈</h1>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <?php foreach ($quiz as $word => $meanings): ?>
                <p><?php echo $word; ?>의 뜻은?</p>
                <?php foreach ($meanings as $meaning): ?>
                    <input type="text" name="answers[<?php echo $word; ?>]" required>
            <?php endforeach; ?>
            <br>
            <input type="submit" value="제출">
        </form>
    <?php endif; ?>
</body>
</html>
