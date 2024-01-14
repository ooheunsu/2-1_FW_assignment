<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.1.2/fullpage.extensions.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.1.2/fullpage.min.css" rel="stylesheet">
    <link rel="icon" href="img/ohchoi2.png">
    <title>card</title>
    <style>
        body {
            padding: 0;
            margin: 0;
            background-attachment: fixed;
            background-position: top left;
            text-align: center;
            position: relative;
            background-image: url(img/cardback.png);
            background-size: 100%;
            background-position: center;
        }
        @font-face {
            font-family: 'PyeongChangPeace-Bold';
            src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_2206-02@1.0/PyeongChangPeace-Bold.woff2') format('woff2');
            font-weight: 700;
            font-style: normal;
        }
        @font-face {
            font-family: 'NeoDunggeunmoPro-Regular';
            src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_2302@1.0/NeoDunggeunmoPro-Regular.woff2') format('woff2');
            font-weight: normal;
            font-style: normal;
        }

        ::-webkit-scrollbar {
            display: none;
        }

        .hey { 
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -100%);
            font-size: 65px;
            white-space: nowrap;
            font-family: 'NeoDunggeunmoPro-Regular', sans-serif;
            background-image: linear-gradient(90deg, red, orange, yellow, green, blue, navy, purple);
            -webkit-background-clip: text;
            color: transparent;
            font-weight: bold;
        }

        .wrap {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .item {
            position: relative;
            top: 270px;
            flex-basis: 10%;
            padding: 20px;
            transition: opacity 0.3s;
            cursor: pointer;
        }

        .item::after {
            content: "";
            position: absolute;
            top: 20px;
            left: 15px;
            width: 88%;
            height: 85%;
            background: rgba(253, 252, 252, 0.363);
            opacity: 0;
            transition: transform 0.3s;
        }

        .item:hover::after {
            opacity: 1;
            transform: scale(1.1);
            z-index: 1;
        }

        .logo {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;
            transition: opacity 0.3s;
            max-width: 100%;
            max-height: 100%;
            z-index: 2;
        }

        .item img:not(.logo) {
            width: 100%;
            height: auto;
            object-fit: contain;
            transition: transform 0.3s;
        }

        .item:hover img:not(.logo) {
            transform: scale(1.1);
        }

        .item:hover .logo {
            opacity: 1;
        }
        .choice{
		font-family:"PyeongChangPeace-Bold"; 
		color: black; 
		font-size:35px; 
		text-decoration:none;
        position: absolute;
        top: 20px; /* 원하는 위치로 조정 */
        left: 20px; /* 원하는 위치로 조정 */
	}
    </style>
</head>
<body>
<?php
session_start();
$login = false;
if (isset($_SESSION['dw_uid'])) {
    $uname = $_SESSION['dw_uname'];
    $login = true;
} ?>
<a href="project.php" class="choice">&nbsp;⌂ 홈으로가기</a>
<div class="hey">
    <p>쇼핑하고 싶은 원하는 세계를 골라봐 ~ !</p>
</div>

<?php if ($login) { ?>
        <div class="wrap">
            <div class="item" onclick="location.href='orgin/samples/change/change.php';">
                <img src="img/card/change_bg.png" style="width: 250px; height: auto;">
                <img src="img/card/change_logo.png" style="width: 380px; height: auto;" class="logo">
            </div>
            <div class="item" onclick="location.href='orgin/samples/sugar/sugar.php';">
                <img src="img/card/suga_bg.png" style="width: 250px; height: auto;">
                <img src="img/card/suga_logo.png" style="width: 370px; height: auto;" class="logo">
            </div>
            <div class="item" onclick="location.href='orgin/samples/jusul/jusul.php';">
                <img src="img/card/jusul_bg.png" style="width: 250px; height: auto;">
                <img src="img/card/jusul_logo.png" style="width: 250px; height: auto;" class="logo">
            </div>
        </div>
        <div class="wrap">
            <div class="item" onclick="location.href='orgin/samples/slam/slam.php';">
                <img src="img/card/SD_bg.png" style="width: 250px; height: auto;">
                <img src="img/card/slamdunk_logo.png" style="width: 280px; height: auto;" class="logo">
            </div>
            <div class="item" onclick="location.href='orgin/samples/jjang gu/jjang-gu.php';">
                <img src="img/card/jjanggu_bg.png" style="width: 250px; height: auto;">
                <img src="img/card/jjanggu_logo.png" style="width: 500px; height: auto;" class="logo">
            </div>
        </div>
 <?php } ?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.1.2/fullpage.extensions.min.js"></script>
</body>
</html>