<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>demon_world</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.1.2/fullpage.extensions.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.1.2/fullpage.min.css" rel="stylesheet">
    <link rel="icon" href="img/ohchoi2.png">
    <style>
        @font-face {
            font-family: 'NeoDunggeunmoPro-Regular';
            src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_2302@1.0/NeoDunggeunmoPro-Regular.woff2') format('woff2');
            font-weight: normal;
            font-style: normal;
        }

        ::-webkit-scrollbar {
            display: none;
        }
        
        .section {
            background-attachment: fixed;
            background-position: top left;
            text-align: center;
        }

        #sugar1 {
            background-image: url(img/main.png);
            background-size: cover;
            background-position: center;
            position: relative;
        }

        #sugar2 {
            background-image: url(img/main22.png);
            background-size: cover;
            background-position: center;
        }
        
        h1 {
            font-size: 5em;
            color: black;
            margin: 0;
            position: absolute;
            top: 50%;
            width: 100%;
            text-align: center;
        }
        
        .topnav {
        position: absolute;
        background-color: transparent; 
        overflow: hidden;
        z-index: 99;
        }

        .topnav a {
        float: left;
        color: white; 
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 18px;
        font-family: 'NeoDunggeunmoPro-Regular', sans-serif; / 폰트 설정 /
        }

        .topnav a:hover {
        background-color:  transparent; 
        color: #ffb1b7;
        transform: scale(1.1);
        transition: transform 0.2s ease-in-out;
        }

        .topnav a.active {
        background-color: #4CAF50;
        color: white;
        }

        .topnav-right {
        float: right;
        }

        .sign_upin {
            position: absolute;
            overflow: hidden;
            z-index: 99;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -20%);
        }

        .sign_upin a {
            color: #f2f2f2;
            text-align: center;
            padding: 18px 16px;
            text-decoration: none;
            font-size: 40px;
            font-family: 'NeoDunggeunmoPro-Regular', sans-serif;
            display: block; /* 링크 요소들을 세로로 배치 */
        }

        .sign_upin a:hover {
            color: #ffb1b7; /* 호버 시 텍스트 색상 변경 */
            content: "클릭하세요"; /* 호버 시 내용 변경 */
        }

        .typing-txt{display: none;}
        ul{list-style:none;}
        .typing ul li{
            display:block;
        }
        .typing ul li.on {  
            display: inline-block; 
            animation-name: cursor; 
            animation-duration: 0.3s; 
            animation-iteration-count: infinite; 
        } 
        @keyframes cursor{ 
            0%{border-right: 1px solid #fff} 
            50%{border-right: 1px solid #000} 
            100%{border-right: 1px solid #fff} 
        }

        ul {
            margin: 0;
            justify-content: center;
            align-items: center;
        }

        .typing ul li {
            font-family: 'NeoDunggeunmoPro-Regular', sans-serif; /* 폰트 설정 */
        }

        .typing ul li:nth-child(1) {
            color: white;
            position: relative;
            font-size: 80px;
            top: 170px;
            -webkit-text-stroke: 2px black; /* 테두리 두께와 색상 설정 */
        }

        .typing ul li:nth-child(2) {
            color: white;
            position: relative;
            font-size: 30px;
            top: 700px;
        }

        .scroll_guide {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, 15%);
            font-size: 35px;
            z-index: 99;
            color: #DCFFDC;
            /* -webkit-text-stroke: 1px #80E12A; */
            font-family: 'NeoDunggeunmoPro-Regular', sans-serif;
        }

        .btn {
            position: absolute;
            top: 91%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #FF1493;
            color: white;
            border: none;
            cursor: pointer;
            opacity: 0.9;
            margin-top: 10px;
            box-shadow: 0 0 0.8em 0.8em #FF1493; 
        }
        .btn:hover {
            opacity: 1;
        }

        .explanation {
            position: absolute;
            top: 48%;
            left: 50%;
            transform: translate(-50%, -46%);
            background-color: rgba(255, 255, 255, 0.5);
            padding: 20px;
            border-radius: 50px;
            width: 50%;
            height: 85%;
            font-family: 'NeoDunggeunmoPro-Regular', sans-serif;
        }

        #exp_f {
            font-size: 40px;
            font-weight: bold;
        }

        #exp_s {
            font-size: 23px;
        }
        
        .logo img{
            position: relative;
            margin-left: 90%;
        }
        .logo2 img{
            position: relative;
            margin-left: 90%;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('#fullpage').fullpage({
                anchors: ['work', 'works'],
                verticalCentered: false,
                scrollingSpeed: 1000,
                navigation: true,
                slideNavigation: true,
                continuousVertical: false,
                easingcss3: 'cubic-bezier(0.175, 0.885, 0.320, 1.275)'
            });

            $(document).ready(function() {
                var typingBool = false;
                var typingIdx = 0;
                var liIndex = 0;
                var liLength = $(".typing-txt>ul>li").length;

                function typing() {
                    $(".typing ul li").removeClass("on");
                    $(".typing ul li").eq(liIndex).addClass("on");
                    var typingTxt = $(".typing-txt>ul>li").eq(liIndex).text();
                    typingTxt = typingTxt.split("");

                    if (typingIdx < typingTxt.length) {
                    $(".typing ul li").eq(liIndex).append(typingTxt[typingIdx]);
                    typingIdx++;
                    } else {
                    if (liIndex < liLength - 1) {
                        liIndex++;
                        typingIdx = 0;
                        typingBool = false;
                        typingTxt = $(".typing-txt>ul>li").eq(liIndex).text();
                        clearInterval(tyInt);
                        setTimeout(function() {
                        tyInt = setInterval(typing, 100);
                        }, 1000);
                    } else if (liIndex == liLength - 1) {
                        clearInterval(tyInt);
                    }
                    }
                }

                var tyInt = setInterval(typing, 100);
            });
        });
    </script>
</head>
<body>
<?php
    //session_start();
    $login = false;
    if (isset($_SESSION['dw_uid'])) {
        $email = $_SESSION['dw_uid'];
        $uname = $_SESSION['dw_uname'];
        $login = true;

        # 로그인한 사용자의 장바구니 담긴 물품 개수를 알아보자
        include_once('dbconn2.php');
        $sql = "select count(*) pnum from cart where email = '$email'"; # count(*)로 레코드의 개수세기
        $result = $conn->query($sql); # 개수를 가지는 레코드 1개 있음
        $row = $result->fetch_assoc();
    }
?>

<div class="topnav">
    <?php if ($login) { ?>
        <a href="#"><?= $uname ?>님환영합니다.</a>
        <a href="signout-m.php">로그아웃</a>
        <a href="signmodify-m.php">회원정보수정</a>
        <a href="signdel-m.php">회원탈퇴</a>
        <a href="showcart-m.php">장바구니(<?=$row['pnum']?>)</a>
        <a href="showorder-m.php">주문정보</a>
    <?php } ?>
</div>

<div class="topnav">
    <?php if (!$login) { ?>
        <div class="logo2"><img style="width: 10%; height: 10%;"src="https://i.imgur.com/Eyj34uF.png " alt="ohchoi_logo"></div>
    <?php } ?>
</div>

<div class="sign_upin">
    <?php if (!$login) { ?>
        <a href="signup-m.html">회원가입</a>
        <a href="signin-m.html">로그인</a>
    <?php } ?>
</div>

<div id="fullpage">
    <div class="section" id="sugar1">
    <?php if ($login) { ?>
        <div class="logo"><img style="width: 10%; height: 10%;"src="https://i.imgur.com/Eyj34uF.png " alt="ohchoi_logo"></div>
    <?php } ?>
    <div class="typing-txt">
        <ul>
            <li class="first-line">⋆｡☽˚｡⋆｡ 마계통신북 ｡⋆｡˚☾｡⋆</li>
    <?php if (!$login) { ?>
            <li class="second-line">⚠️ 회원가입과 로그인 후 이용가능 합니다. ⚠️</li>
    <?php } ?>
        </ul>
    </div> 
    <div class="typing">
        <ul>
            <li></li>
            <li></li>
        </ul>
    </div>
    <div class="scroll_guide">
        <?php if ($login) { ?>
            <p>! 아래로 스크롤 하세요 !</p>
            <p style="font-size: 60px;">⇣ ⇣ ⇣</p>
        <?php } ?>
    </div>
</div>
    
    <?php if ($login) { ?>
        <div class="section" id="sugar2">
            <?php if ($login) { ?>
        <div class="logo"><img style="width: 10%; height: 10%;"src="https://i.imgur.com/Eyj34uF.png " alt="ohchoi_logo"></div>
        <?php } ?>
            <div class="explanation">
              
                <p id="exp_f">마계 통신북에 오신걸 환영합니다 !</p>
                <p style="font-size: 40px;">╔═══*.·:·.☽✧    ✦    ✧☾.·:·.*═══╗</p>
                <p id="exp_s">✮⋰ ⋱♱⋰  마계 통신 판매북 사용 설명서  ⋱♱⋰ ⋱✮<br>
                <br>
                안녕하세요, "<?= $uname ?>"님을 위한 마계 통신 쇼핑몰입니다.<br>
                저희 마계 통신 쇼핑몰은 총 5개의 세계로 연결되어 있습니다.<br>
                원하는 세계로 들어가면 그 세계의 물건들을<br> 판매하는 마계 통신 판매북이 나옵니다.<br>
                갖고 싶다고 상상만 했던 물건들을 직접 구경하고 구매할 수 있습니다.<br>
                <br>
                인간계에 거주하면서 마녀, 마법사분들께서 <br>필요하고 갖고 싶던 물건들은 모두 준비되어 있습니다.<br>
                <br>
                지금 당장 아래에 쇼핑 하러 가기를 눌러서 <br>원하는 세계로 들어가 쇼핑을 즐겨보세요!<br>
                <br>
                ※ 마계통신쇼핑몰은 24시간 운영됩니다 ※</p>
                <p style="font-size: 40px;">╚═══*.·:·.☽✧    ✦    ✧☾.·:·.*═══╝</p>
            </div>
            <button class="btn" onclick="location.href='card.php'">쇼핑 하러가기</button>
        </div>
    <?php } ?>
    
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.1.2/fullpage.extensions.min.js"></script>
</body>
</html>

