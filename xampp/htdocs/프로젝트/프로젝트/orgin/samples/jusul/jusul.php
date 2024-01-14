<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
<script type="text/javascript" src="../../extras/jquery.min.1.7.js"></script>
<script type="text/javascript" src="../../extras/jquery-ui-1.8.20.custom.min.js"></script>
<script type="text/javascript" src="../../extras/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="../../extras/modernizr.2.5.3.min.js"></script>
<script type="text/javascript" src="../../lib/hash.js"></script>
<link rel="icon" href="img/ohchoi2.png">
<style>
	@font-face {
            font-family: 'PyeongChangPeace-Bold';
            src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_2206-02@1.0/PyeongChangPeace-Bold.woff2') format('woff2');
            font-weight: 700;
            font-style: normal;
        }
	.choice{
		font-family:PyeongChangPeace-Bold; 
		color: black; 
		font-size:40px; 
		text-decoration:none;
	}
	.basket{
		font-family:"PyeongChangPeace-Bold"; 
		color: black; 
		font-size:40px; 
		text-decoration:none;
		padding-left: 63%;
	}
	body{
    background-image: url(https://i.imgur.com/cHpeczz.png);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
}
footer {
            background-color: rgba(245,169,188,0.7);
            padding: 10px;
            text-align: center;
            color: #333;
        }
</style>
</head>
<body>

<a href="../../../card.php" class="choice">&nbsp;⇦ 세계 선택하러 가기</a>
<a href="../../../showcart-m.php" class="basket">&nbsp;|•'-'•و✧장바구니</a>


<div id="canvas">
		<div class="sj-book">
			<div depth="5" class="hard"> <div class="side"></div> </div>
			<div depth="5" class="hard front-side"> <div class="depth"></div> </div>
			<div class="own-size"></div>
			<div class="own-size even"></div>
			<div class="hard fixed back-side p111"> <div class="depth"></div> </div>
			<div class="hard p112"></div>
		</div>
    </div>


<script type="text/javascript">

function loadApp() {
	
	var flipbook = $('.sj-book');

	// Check if the CSS was already loaded
	
	if (flipbook.width()==0 || flipbook.height()==0) {
		setTimeout(loadApp, 10);
		return;
	}

	// Mousewheel

	$('#book-zoom').mousewheel(function(event, delta, deltaX, deltaY) {

		var data = $(this).data(),
			step = 30,
			flipbook = $('.sj-book'),
			actualPos = $('#slider').slider('value')*step;

		if (typeof(data.scrollX)==='undefined') {
			data.scrollX = actualPos;
			data.scrollPage = flipbook.turn('page');
		}

		data.scrollX = Math.min($( "#slider" ).slider('option', 'max')*step,
			Math.max(0, data.scrollX + deltaX));

		var actualView = Math.round(data.scrollX/step),
			page = Math.min(flipbook.turn('pages'), Math.max(1, actualView*2 - 2));

		if ($.inArray(data.scrollPage, flipbook.turn('view', page))==-1) {
			data.scrollPage = page;
			flipbook.turn('page', page);
		}

		if (data.scrollTimer)
			clearInterval(data.scrollTimer);
		
		data.scrollTimer = setTimeout(function(){
			data.scrollX = undefined;
			data.scrollPage = undefined;
			data.scrollTimer = undefined;
		}, 1000);

	});

	// URIs page/1"과 같은 URI가 주어지면 해당 페이지로 이동하도록 설정
	
	Hash.on('^page\/([0-9]*)$', {
		yep: function(path, parts) {

			var page = parts[1];

			if (page!==undefined) {
				if ($('.sj-book').turn('is'))
					$('.sj-book').turn('page', page);
			}

		},
		nop: function(path) {

			if ($('.sj-book').turn('is'))
				$('.sj-book').turn('page', 1);
		}
	});

	// Arrows 키보드 이벤트를 감지, 화살표 키에 대한 동작을 수행함 (키보드로 페이지 이동)

	$(document).keydown(function(e){

		var previous = 37, next = 39;

		switch (e.keyCode) {
			case previous:

				$('.sj-book').turn('previous');

			break;
			case next:
				
				$('.sj-book').turn('next');

			break;
		}

	});


	// Flipbook

	flipbook.bind(($.isTouch) ? 'touchend' : 'click', zoomHandle);

	flipbook.turn({
		elevation: 50,
		acceleration: !isChrome(),
		autoCenter: true,
		gradients: true,
		duration: 1000,
		pages: 112,
		when: {
			turning: function(e, page, view) {
				
				var book = $(this),
					currentPage = book.turn('page'),
					pages = book.turn('pages');

				if (currentPage>3 && currentPage<pages-3) {
				
					if (page==1) {
						book.turn('page', 2).turn('stop').turn('page', page);
						e.preventDefault();
						return;
					} else if (page==pages) {
						book.turn('page', pages-1).turn('stop').turn('page', page);
						e.preventDefault();
						return;
					}
				} else if (page>3 && page<pages-3) {
					if (currentPage==1) {
						book.turn('page', 2).turn('stop').turn('page', page);
						e.preventDefault();
						return;
					} else if (currentPage==pages) {
						book.turn('page', pages-1).turn('stop').turn('page', page);
						e.preventDefault();
						return;
					}
				}

				updateDepth(book, page);
				
				if (page>=2)
					$('.sj-book .p2').addClass('fixed');
				else
					$('.sj-book .p2').removeClass('fixed');

				if (page<book.turn('pages'))
					$('.sj-book .p111').addClass('fixed');
				else
					$('.sj-book .p111').removeClass('fixed');

				Hash.go('page/'+page).update();
					
			},

			turned: function(e, page, view) {

				var book = $(this);

				if (page==2 || page==3) {
					book.turn('peel', 'br');
				}

				updateDepth(book);
				
				$('#slider').slider('value', getViewNumber(book, page));

				book.turn('center');

			},

			start: function(e, pageObj) {
		
				moveBar(true);

			},

			end: function(e, pageObj) {
			
				var book = $(this);

				updateDepth(book);

				setTimeout(function() {
					
					$('#slider').slider('value', getViewNumber(book));

				}, 1);

				moveBar(false);

			},

			missing: function (e, pages) {

				for (var i = 0; i < pages.length; i++) {
					addPage(pages[i], $(this));
				}

			}
		}
	});

	flipbook.addClass('animated');

	// Show canvas

	$('#canvas').css({visibility: ''});
    
    // 페이지 삭제를 위해 구현된 부분은 아래와 같다.
      var flipbook = $('.sj-book'); // flipbook 변수가 .sj-book클래스를 가진 요소를 선택함

      // CSS가 로드되었는지 확인한다. 
      if (flipbook.width() == 0 || flipbook.height() == 0) {    // 만약 가로랑 세로 높이가 0인 경우에는 css가 로드 되지 않았다고 가정하고 10초뒤에 loadApp함수를 호출한다.
        setTimeout(loadApp, 10);    // 이후 코드 실행 중단 후 함수 종료
        return;
      }

      // Mousewheel, Slider, URIs, Arrows, Flipbook 등의 기능 설정

      // 페이지 삭제
      var startPage = 10; // 삭제 시작 페이지
      var endPage = 102; // 삭제 종료 페이지

      for (var page = startPage; page <= endPage; page++) { // for문을 사용해서 시작 페이지부터 종료 페이지까지 반복한다.
        var className = '.p' + page;    // '.p + 페이지번호' 형식의 클래스 생성
        flipbook.turn('removePage', flipbook.find(className));  // turn 메소드를 사용해서 페이지 삭제(removePage 메소드를 호출해서 flipbook.find(className)를 매개변수로 전달함)
      }
    
} // function loadApp() 함수 닫히는 문

// Hide canvas

$('#canvas').css({visibility: 'hidden'});

// Load turn.js
    
yepnope({
	test : Modernizr.csstransforms,
	yep: ['../../lib/turn.min.js'],
	nope: ['../../lib/turn.html4.min.js', 'css/jquery.ui.html4.css'],
	both: ['js/steve-jobs.js', 'css/jusul.css'],
	complete: loadApp
});

</script>
<footer>
    <p>TEL. 02.1234.5678</p>
    <p>Email: abc@mail.com</p>
    <p>© 2023. OHCHOI. All Rights Reserved.</p>
  </footer>
</body>
</html>