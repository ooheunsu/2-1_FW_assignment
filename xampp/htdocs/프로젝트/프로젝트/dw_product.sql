USE `demon_world`;

/*Table structure for table `Sugar_Sugar_Rune` */

DROP TABLE IF EXISTS `Sugar_Sugar_Rune`;

CREATE TABLE `Sugar_Sugar_Rune` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `discounted_price` int(11) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `details` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `Sugar_Sugar_Rune` */

insert  into `Sugar_Sugar_Rune`(`id`,`name`,`price`,`discounted_price`,`photo`,`details`) values 
(1,'쇼콜라의 룬하트 스틱 & 팬던트',75000,NULL,'stickp-c.png','쇼콜라의 스틱과 팬던트에는 파파라차 보석과 플리에 토알레의 마법의 결정체가 박혀있습니다. 지옥의 파수견도 소환할 수 있는 마법의 요술봉이죠!'),
(2,'바닐라의 룬하트 스틱 & 팬던트',75000,NULL,'stickp-v.png','바닐라의 스틱과 팬던트에는 봄바람을 일으키는 주문인 밀키 쿼츠, 셀레스타이트 원석이 박혀있습니다. 상대방이 좋아하는 향기가 나게 해주는 아로마티코가 로드 나이트 요술봉이죠!'),
(3,'마법의 립스틱',25000,20000,'lip4.png','진실을 부르는 마법의 립스틱! 자신의 속 마음을 솔직히 말하고 싶을 때 혹은 상대방의 속 마음을 듣고 싶을 때 이 립스틱을 입술에 발라보세요! 속에 담겨있는 진실한 마음을 들 수 있습니다.'),
(4,'나이를 바꿔주는 구두',50000,48000,'age-shoes.png','나이를 바꿔주는 구두! 어린이의 모습 또는 어른의 모습이 되고 싶을 땐 이 구두를 신으면 한순간에 그 나이로 변신합니다! 구두 굽에 있는 다이얼을 돌려가며 나이를 조절하세요!'),
(5,'하트 11종 & 하트쥬얼리박스 SET',44000,NULL,'box.png','모든 하트에는 의미가 담겨있죠? 빨강은 진실의 사랑, 노랑은 놀람, 주황은 설렘, 초록은 우정, 분홍은 수줍음, 보라는 욕망, 파랑은 존경, 무지개는 행복! 하양&검정은 정화&질투을 의미해요. 하트를 쥬얼리 박스에 보관하세요!'),
(6,'드림 커피 잔',11000,9800,'cup.png','다른 사람들의 꿈속으로 들어가 볼 수 있는 드림 커피 잔! 꿈이란 때론 즐겁기도 외롭고 슬프기도 한 것. 너무 깊이 들어가면 위험할 수 있습니다. 행복한 꿈 여행 되세요!');

-- -다음
USE `demon_world`;

/*Table structure for table `Slam_Dunk` */

DROP TABLE IF EXISTS `Slam_Dunk`;

CREATE TABLE `Slam_Dunk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `discounted_price` int(11) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `details` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `Slam_Dunk` */

insert  into `Slam_Dunk`(`id`,`name`,`price`,`discounted_price`,`photo`,`details`) values 
(1,'송태섭의 손목 아대',32000,15000,'band.png','송태섭의 아대는 태섭이가 유일하게 엄마에게서 지켜낸 태섭이의 형 송준섭의 유품입니다. 북산고 vs 산왕공고 전에서도 태섭이가 꼭 착용하고 경기에 들어갔죠!'),
(2,'북산고 유니폼 세트',110000,NULL,'book3.png','슬램덩크의 주인공들이 다니는 학교인 북산고에는 채치수, 권준호, 정대만, 송태섭, 강백호, 서태웅 등의 선수들이 있습니다. 그들이 입는 유니폼을 입고 농구 경기를 해보세요! 거기 당신, 북산고의 동료가 돼라!'),
(3,'산왕공고 유니폼 세트',110000,NULL,'san.png','3년 연속 전국대회 우승팀, 무패우승의 학교인 산왕공고에는 이명헌, 정성구, 신현철, 김낙수, 정우성 등의 선수들이 있습니다. 그들이 입는 유니폼을 입고 농구 경기를 해보세요! 거기 당신, 산왕공고의 동료가 돼라!'),
(4,'산왕전 강백호 신발 - 나이키 조던1 브레드 하이탑',275000,250000,'ho2.png','전설의 경기로 남는 북산고 vs 산왕공고 전에서 강백호가 신었던 나이키 조던1 브레드 하이탑을 판매합니다! 북산의 색인 빨강&검정 조합으로 지금은 어디서도 구할 수 없어요! 덩크슛의 기적을!'),
(5,'서태웅이 타고다니는 자전거',3500000,1500000,'woog3.png','서태웅이 운동하러 오고 갈 때 타고 다니는 바로 그 자전거! 이 모델은 파나소닉의 ORCC02/FRCC02모델인 산악자전거입니다. 완성품으로 사면 현재는 350만 원대인 가격을 반값 이상으로 할인합니다! 놓치면 후회각!'),
(6,'슬램덩크 기념 농구공',47500,NULL,'ball.png','여기서 판매하는 슬램덩크 농구공은 바로 북산고 vs 산왕공고에서 사용됐던 농구공이에요! 모든 선수들이 손댔던 흔적이 남은 바로 그 농구공으로 준비했으니 슬램덩크를 좋아한다면 기념품으로 구매해야겠죠?');

--다음
USE `demon_world`;

/*Table structure for table `Jujutsu_Kaisen`*/

DROP TABLE IF EXISTS `Jujutsu_Kaisen`;

CREATE TABLE `Jujutsu_Kaisen`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `discounted_price` int(11) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `details` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `Jujutsu_Kaisen`*/

insert  into `Jujutsu_Kaisen`(`id`,`name`,`price`,`discounted_price`,`photo`,`details`) values
(1,'젠인 마키의 안경',28000,NULL,'glass.png','주술고전의 2학년인 젠인 마키가 착용하고 다니는 안경을 판매합니다! 평범한 안경이 절대 아니죠, 이 안경을 쓰면 저주를 보지 못하던 사람들도 저주를 볼 수 있게 됩니다. 심약자에게는 추천하지 않아요!'),
(2,'옷코츠 유타의 반지',65000,63000,'uta2.png','주술고전의 2학년인 옷코츠 유타의 반지! 이 반지는 유타가 어릴 적 자신의 소꿉친구 리카와 결혼을 약속하면 나눠가졌던 반지로 심플한 디자인의 작은 보석이 박혀있어요. 커플링&우정링으로도 추천!'),
(3,'나나미 켄토의 주구',53000,50000,'nanami.png','주술고전의 선생님인 나나미 켄토의 주구를 판매합니다. 주술사들이 사용하는 주구는 주력이 담긴 무구죠! 나나미의 주구는 어떤 상대든 상대의 7:3을 기준으로 약점 구간을 정확히 타격해 공격할 수 있습니다.'),
(4,'쿠기사키 노바라의 망치 & 못 & 저주인형 SET',44000,NULL,'nobala.png','주술고전의 1학년 쿠기사키 노바라의 주구는 망치 & 못 & 저주인형 SET입니다. 저주의 신체에(일부도 상관없어요.) 저주인형을 갖다 대고 망치로 못을 박아버리세요! 본체에 못이 박히는 듯한 타격을 줄 거예요.'),
(5,'료멘스쿠나의 손가락',180000,NULL,'pinger1.png','료멘 스쿠나는 저주의 왕으로 생전 두 얼굴의 네 개의 눈과 팔을 가진 모습이었습니다. 감당할 수 없던 주술사들이 그의 손가락 스무 개를 특급 주물로 분류해 봉인시키고 각지로 흩어 놓았죠? 이것을 구매하고 나서 발생되는 일은 책임지지 않습니다..'),
(6,'이누마키 토게 가문의 주언 확성기',220000,NULL,'toge5.png','이 주언 확성기는 주술고전의 2학년 이누마키 토게 가문의 뱀과 눈의 송곳니 문장이 새겨져 있습니다. 주언은 말 한마디만으로 저주가 발동해 피해를 입힙니다. 큰 피해를 입히는 만큼 자신에게 큰 타격이 돌아올 수 있어요!');

--다음
USE `demon_world`;

/*Table structure for table `c_c_change`*/

DROP TABLE IF EXISTS `c_c_change`;

CREATE TABLE `c_c_change`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `discounted_price` int(11) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `details` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `c_c_change`*/

insert  into `c_c_change`(`id`,`name`,`price`,`discounted_price`,`photo`,`details`) values 
(1,'아무의 머리핀',12000,8000,'hair1.png','아무의 머리핀은 아무가 매일 착용하는 애장품입니다. 착용 시 아무처럼 cool & spicy 한 성격을 가질 수 있어요! 남녀노소를 불문하고 잘 어울리는 제품이랍니다.'),
(2,'험프티록 & 덤프티키 SET',88000,NULL,'lock1.png','험프티록은 아무가 사용하는 자물쇠로 캐릭터 변신과 오픈 하트 기술로 X알 정화가 가능합니다. 덤프티키는 토마가 소유하고 있는 열쇠로 험프티록과 한 쌍입니다!'),
(3,'학생회 로얄케이프 SET',74000,72000,'cape1.png','학생회 로열 케이프는 아무가 다니는 학교의 학생회인 가디언의 제복입니다. 가디언은 수호캐릭터를 가진 사람만이 들어갈 수 있지만 이 로열 케이프를 구매해서 착용한다면 아무도 모를 거예요!'),
(4,'토마의 바이올린',350000,NULL,'violin3.png','토마의 바이올린은 사실은 토마의 아버지가 애용하시던 바이올린입니다. 토마가 항상 지니고 다니면서 환상적인 연주 실력으로 가끔씩 바이올린을 켜죠. 토마가 최애라면! 바이올린을 연주할 줄 안다면 구매해 보세요!'),
(5,'하트로드 - 아무 애뮬릿 하트 ver.',55000,50000,'rod1.png','하트로드는 하트 모양의 보석 장식이 위아래에 달려있는 무기로 부메랑처럼 날리기도 맘껏 휘둘러도 되는 공격용 무장입니다. 날렸을 때 빗나가거나 활용하기 은근 어려우니 손에 익을 때까지 연습해 보세요!'),
(6,'수호의 알',15000000,NULL,'egg2.png','아이들은 누구나 마음 속에 알을 가지고 있죠.. 눈에는 보이지 않는 되고 싶은 나의 모습으로 탄생할 수 있는 수호의 알! 어른이 되면 수호의 알은 사라지기 때문에 구매한다면 마음에서 다시 품어볼 수 있답니다.');

--다음
USE `demon_world`;

/*Table structure for table `Sinnoseuke`*/

DROP TABLE IF EXISTS `Sinnoseuke`;

CREATE TABLE `Sinnoseuke`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `discounted_price` int(11) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `details` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `Sinnoseuke`*/

insert  into `Sinnoseuke`(`id`,`name`,`price`,`discounted_price`,`photo`,`details`) values 
(1,'흰둥이 밥그릇',25000,20000,'bowl4.png','짱구의 최고 단짝 친구 흰둥이! 흰둥이가 항상 애용하는 밥그릇이죠! 만화에서는 강아지용이었지만 이 제품은 도자기로 만들어 출시한 제품이라 사람이 사용해도 무관합니다. 짱구를 즐겨봤다면 구매 욕구를 참을 수 없을 거 예요!'),
(2,'떡잎유치원 가방',40000,38000,'bag1.png','짱구와 친구들이 다니는 떡잎유치원의 가방이에요. 샛노란 색의 크로스백 형태이며, 보기엔 작아 보여도 들어갈 건 다 들어갑니다. 짱구는 도시락을 넣어 다녀요, 도시락 가방으로도 추천!'),
(3,'유리의 토끼 인형',70000,NULL,'rabbit2.png','유리의 토끼 인형은 원래 유리의 엄마가 스트레스 해소 수단으로 펀치를 날리는 인형입니다. 샌드백으로 사용하기 아주 좋습니다. 하지만 사용 후 토끼를 잘 달래주지 않으면 토끼가 자아를 갖게 되는 부작용을 경험할 거예요..'),
(4,'철수의 모에피 등신대',120000,118000,'moyapi1.png','철수가 가장 좋아하는 만화 마법소녀 모에피의 주인공인 모에피 등신대입니다. 5살 어린아이와 비슷한 크기로 소장하기 간편해요. 평소 철수방의 모에피를 보며 탐이 났던 사람들은 지금이 기회입니다!'),
(5,'짱구의 필수템, 오리지널 초코비',5800,5300,'chocobi1.png','짱구가 가장 좋아하는 간식 초코비! 별 모양의 과자로 겉은 바삭하고 속에는 달콤한 초코가 들어 있어요. 초코비를 먹는 순간 어릴 적 신나게 뛰어놀고 집에 들어와 간식을 먹던 행복을 느낄 수 있을 거예요!'),
(6,'액션가면 코스튬',105000,55000,'action3.png','짱구가 너무너무 좋아하는 만화 액션 가면의 주인공 코스튬입니다. 어린이용으로 제작되었지만 엄청난 신축성으로 180cm까지 착용 가능해요! 사진과 같이 헬멧과 슈트는 분리되어 따로 착용할 수 있습니다.');
