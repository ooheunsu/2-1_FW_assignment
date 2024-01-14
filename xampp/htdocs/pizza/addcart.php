<!DOCTYPE html>
<html>
<head>
    <title>Doremi Pizza</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    body, html {
        height: 100%;
        font-family: Arial, Helvetica, sans-serif;
    }
    * {
        box-sizing: border-box;
    }
    .bg-img {
        /* The image used */
        background-image: url("images/pizza.jpg");
        min-height: 380px;
        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    /* Add styles to the form container */
    .container {
        position: absolute;
        right: 0;
        margin: 20px;
        max-width: 300px;
        padding: 16px;
        background-color: white;
    }
    /* Full-width input fields */
    input[type=text], input[type=number] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: none;
        background: #f1f1f1;
    }
    input[type=text]:focus, input[type=number]:focus {
        background-color: #ddd;
        outline: none;
    }
    input[type=radio] {
        margin: 5px 0;
    }
    /* Set a style for the submit button */
    .btn {
        background-color: #4CAF50;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }
    .btn:hover {
        opacity: 1;
    }
    .title {
        position: absolute;
        top: 10px;
        left: 40px;
        color: white;
    }
     </style>
</head>
<body>
    <?php
    # 로그인 상태를 확인하고 아니라면 오류메시지 출력한 다음 index.php로 이동하기 (로그인 안했는데 장바구니 담기면 안되제)
    session_start();
    $login = false; # 초기값으로 생성해두기
        if (!isset($_SESSION['pz_uid'])) { # !를 붙임으로써 로그인한 상태가 아니면 이라는 조건
            echo "<script>alert('로그인을 하지 않았습니다.')</script>";
            # echo "<script>location.replace('index.php')</script>";
            echo "<script>location.href='index.php'</script>";
        }
    $pizza = $_GET['pizza'];
    $large = $_GET['large'];
    $small = $_GET['small'];
    ?>
    <h2>장바구니 담기</h2>
    <p>장바구니에 선택한 피자를 담습니다.</p>
    <hr>
    <div class="bg-img">
        <div class="container">
            <form action="addcartproc.php" method="post">
                <div class="row">
                    <div class="col-25">
                        <label for="fname">피자</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="pizza" value="<?=$pizza?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">사이즈</label>
                    </div>
                    <div class="col-75">
                        <input type="radio" name="size" value="L" checked>Large(<?=$large?>)
                        <input type="radio" name="size" value="S">Small(<?=$small?>)
                        <input type="text" name="large" value="<?=$large?>" hidden>
                        <input type="text" name="small" value="<?=$small?>" hidden> <!-- 보이지않고 정보만 전달할거라 hidden -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">수량</label>
                    </div>
                    <div class="col-75">
                        <input type="number" name="qty" min="1" max="10" value="1">
                    </div>
                </div>
                <div class="row">
                    <input type="submit" value="Submit" class="btn">
                </div>
            </form>
        </div>
    </div>
</body>
</html>



















