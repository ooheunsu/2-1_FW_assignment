// 엘리먼트 래퍼런스 생성
const articles = document.querySelectorAll('article');  // 배열로 생성됨
const aside = document.querySelector('aside');
const close = document.querySelector('.close');   // All 안붙은건 하나만 가리킴

// articles 배열의 모든 원소들에 대해 반복 실행
for(let el of articles) {   // articles의 원소 하나가 el로 들어감
    // mouseenter 이벤트리스터 등록하기
    el.addEventListener('mouseenter', e=>{
       e.currentTarget.querySelector('video').play();   // 마우스엔트이벤트가 발생한 해당 엘리먼트에서 비디오라는 쿼리셀렉터를 실행함
    });
    
    // mouseleave 이벤트리스터 등록하기
    el.addEventListener('mouseleave', e=>{
        e.currentTarget.querySelector('video').pause(); 
    });
    
    el.addEventListener('click', e=>{
        // 클릭한 article 엘리먼트의 하위 엘리먼트 내용들을 가져옴
        let title = e.currentTarget.querySelector('h2').innerText;
        let text = e.currentTarget.querySelector('p').innerText;
        let vid = 
        e.currentTarget.querySelector('video').getAttribute('src');
        
        // aside 엘리먼트 내에 필요한 값들을 세팅
        aside.querySelector('h1').innerText = title;
        aside.querySelector('p').innerText = text;
        aside.querySelector('video').setAttribute('src', vid);
        
        // aside 화면에 표시하고 동영상 재생
        aside.classList.add('on');  // css 구문상에 on 클래스명으로 스타일 지정
        aside.querySelector('video').play();
    });
    
    // aside의 close 클릭했을 때 aside 닫기
    close.addEventListener('click', e=>{
       aside.classList.remove('on');    // on 클래스명을 제거. 사라지게 함 
       aside.querySelector('video').pause();

    });
    
}