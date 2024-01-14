// 엘리먼트들에 대한 래퍼런스 가져오기
const container = document.querySelector('.container');
const userResult = document.querySelector('.user_result img');
const cpuResult = document.querySelector('.cpu_result img');
const result = document.querySelector('.result');
const optionImages = document.querySelectorAll('.option_image');

// 가위 바위 보 이미지들에 클릭이벤트 등록하기
optionImages.forEach((image, index) => {
    // addEventListener() 이벤트 넣기
    image.addEventListener('click', (e) => {
        
        // 가위 바위 보 이미지 클릭하면 선택된 것으로 표시하기
        // optionImages가 가위바위보 이미지 배열?
        optionImages.forEach((images2, index2)=>{
            images2.classList.remove('active'); // class명에 있는 active를 삭제
        });
        image.classList.add('active');  // 선택한 이미지의 class명에 active 추가
        
        // 게임 시작 애니메이션 효과 주기
        userResult.src = cpuResult.src = 'images/rock.png'  // 주먹 이미지 표시
        result.textContent = "가위 바위 보..."
        container.classList.add('start');   // class 하나 만듬
        
        let time = setTimeout(()=>{ 
            container.classList.remove('start');
            // 이미지를 클릭했을 떄 할 일을 작성하자
            const imageSrc = e.target.querySelector('img').src;
            userResult.src = imageSrc;

            // 랜덤하게 가위 바위 보 선택하고 cpuResult에 표시
            const num = Math.floor(Math.random() * 3); // 0, 1, 2 세 숫자
            const images = ['rock.png', 'paper.png', 'scissors.png'];
            cpuResult.src = 'images/' + images[num];

            // 결과 판정하고 출력하기
            const outcomes = {
                RR: "비겼다",
                RP: "CPU",
                RS: " User",
                PP: "비겼다",
                PR: "User",
                PS: "CPU",
                SS: "비겼다",
                SR: "CPU",
                SP: "User"
            }; 

            // object 생성
            const userValue = ["R", "P", "S"][index];
            const cpuValue = ["R", "P", "S"][num];
            const outcomeValue = outcomes[userValue + cpuValue];
            result.textContent = outcomeValue;}, 2500);    // setTimeout(()=>{}, 2500)에서 2500은 2.5초
        // ()=>{}여기가 작동될 부분, 뒤에 숫자가 기다리는시간, 즉 2.5초 뒤에 ()=>{}부분이 실행됨
       
    });
});
