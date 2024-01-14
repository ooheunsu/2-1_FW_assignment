// 웹페이지 로드 이벤트 등록. 이거는 $(document).ready() 와 같음
window.addEventListener('load', ()=>{
    const grid = new Isotope('section', {
       // isotope 옵션 지정
        itemSelector: 'article',    // selection 내에 배치할 요소들의 이름
        columnWidth: 'article',     // 넓이 값을 알아낼 요소
        transitionDuration: '0.5s'  
    });
    const btns = document.querySelectorAll('main ul li');   // li들의 배열
    for(let el of btns) {
        el.addEventListener('click', e=>{   // 버튼 클릭시 필터링
            const sort = 
            e.currentTarget.querySelector('a').getAttribute('sort'); // 하이퍼링크a에 있는 href값을 가져오기
            grid.arrange({  // isotope 를 이용해서 필터링
                filter: sort
            });
            
            for(let item of btns) {
                item.classList.remove('on');    // (그러려면) 모든 버튼의 배경색을 원래대로 돌림
            }
            e.currentTarget.classList.add('on'); // 현재 선택한 버튼의 배경색 변경(을 on이 해야함)
        });
    }
});