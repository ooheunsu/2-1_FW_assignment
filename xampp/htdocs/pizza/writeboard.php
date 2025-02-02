<?php session_start(); ?>
<!-- writeboard에서 게시자 부분에 세션에서 유네임(로그인한사람의 이름), 날짜(date, Y/N/D), 제목, 내용 -->
<!-- 그 다음은 writeboardproc에서 board table에 insert 해야함, 근데 writeboard에서랑 다른게하나있음 유네임이아닌 email을 보여줘야함-->
<!-- 여기서 no 컬럼은 자동증가해야함, insert into table board 컬럼이름~(no 빼고 나열), values에도 나열 -->
<!DOCTYPE html>
<html>
<head>
    <title>도레미피자</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="board.css">
</head>

    <body>
        <?php
        if(!isset($_SESSION['pz_uid'])) {   // 로그인 하지 않고 글작성에 들어 온 상태
            echo "<script>alert('글작성하기 위해서는 로그인을 해야합니다.');";
            echo "location.href = 'signin.html'</script>";
        }
        $email = $_SESSION['pz_uid'];
        $name = $_SESSION['pz_uname'];
        $wdate = date('Y/M/D');
        ?>
        <div class="tab">
            <button class="tablinks" onclick="openTab(event, 'newboard')" id="defaultOpen">게시글작성</button>
            <button class="tablinks" onclick="openTab(event, 'showboard')">게시글목록</button>
        </div>
        
        <div id="newboard" class="tabcontent">
        <h2>게시글 작성</h2>
        <p>게시판에 새글을 게시합니다.</p>
        <div class="divider"></div>
        <div class="container">
          <form action="writeboardproc.php" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-25">
                <label for="fname">작성자</label>
              </div>
              <div class="col-75">
                <input type="text" name="email" value="<?=$name?>" readonly>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">작성일</label>
              </div>
              <div class="col-75">
                <input type="text" name="wdate" value="<?=$wdate?>" readonly>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">제목</label>
              </div>
              <div class="col-75">
                <input type="text" name="title" placeholder="Title..">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">게시글</label>
              </div>
              <div class="col-75">
                <textarea rows="10" name="note"></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">첨부파일</label>
              </div>
              <div class="col-75">
                <input type="file" name="att">
              </div>
            </div>
            <div class="row">
              <input type="submit" value="Submit">
            </div>
          </form>
        </div>
        </div>
        
        <div id="showboard" class="tabcontent">
            <iframe src="showboard.html" style="width:100%; height:100%; border:none"></iframe>
        </div>
        <script>
            function openTab(evt, tabName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(tabName).style.display = "block";
                evt.currentTarget.className += " active";
            }
            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
        </script>
    </body>
</html>

















