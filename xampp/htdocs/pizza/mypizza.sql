USE `pizzamall`;

/*Table structure for table `mypizza` */

DROP TABLE IF EXISTS `mypizza`;

CREATE TABLE `mypizza` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `large` int(11) NOT NULL,
  `small` int(11) NOT NULL,
  `photo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mypizza` */

insert  into `mypizza`(`id`,`name`,`large`,`small`,`photo`) values 
(1,'치즈 케이크롤',33900,28000,'pizza1.jpg'),
(2,'치즈 앤 그릴드 비프',33900,28000,'pizza2.jpg'),
(3,'슈퍼시드 앤 스테이크롤',33900,28000,'pizza3.jpg'),
(4,'더블크러스트 치즈멜팅롤',33900,28000,'pizza4.jpg'),
(5,'와규 앤 비스테카',33900,28000,'pizza5.jpg'),
(6,'킹 프론 씨푸드',33900,28000,'pizza6.jpg'),
(7,'직화스테이크',33900,28000,'pizza7.jpg');


-- 여기서부터
-- USE `demon_world`;

-- /*Table structure for table `Sugar_Sugar_Rune` */

-- DROP TABLE IF EXISTS `Sugar_Sugar_Rune`;

-- CREATE TABLE `Sugar_Sugar_Rune` (
--   `id` int(11) NOT NULL AUTO_INCREMENT,
--   `name` varchar(20) NOT NULL,
--   `price` int(11) NOT NULL,
--   `discounted_price` int(11) NOT NULL,
--   `photo` varchar(50) DEFAULT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- /*Data for the table `Sugar_Sugar_Rune` */

-- insert  into `Sugar_Sugar_Rune`(`id`,`name`,`price`,`discounted_price`,`photo`) values 
-- (1,'쇼콜라의 룬하트 스틱 & 팬던트',75000,75000,'pizza1.jpg'),
-- (2,'바닐라의 룬하트 스틱 & 팬던트',75000,75000,'pizza2.jpg'),
-- (3,'진실의 입술, 마법의 립스틱',25000,20000,'pizza3.jpg'),
-- (4,'몇 살이 되어 볼까?, 나이를 바꿔주는 구두',50000,48000,'pizza4.jpg'),
-- (5,'하트 11종 & 하트쥬얼리박스 SET',44000,44000,'pizza5.jpg'),
-- (6,'원하는 사람의 꿈으로, 드림 커피 잔',11000,9800,'pizza6.jpg');

-- -- -다음
-- USE `demon_world`;

-- /*Table structure for table `Slam_Dunk` */

-- DROP TABLE IF EXISTS `Slam_Dunk`;

-- CREATE TABLE `Slam_Dunk` (
--   `id` int(11) NOT NULL AUTO_INCREMENT,
--   `name` varchar(20) NOT NULL,
--   `price` int(11) NOT NULL,
--   `discounted_price` int(11) NOT NULL,
--   `photo` varchar(50) DEFAULT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- /*Data for the table `Slam_Dunk` */

-- insert  into `Slam_Dunk`(`id`,`name`,`price`,`discounted_price`,`photo`) values 
-- (1,'송태섭의 손목 아대',32000,15000,'pizza1.jpg'),
-- (2,'북산고 유니폼 세트',110000,110000,'pizza2.jpg'),
-- (3,'산왕공고 유니폼 세트',110000,110000,'pizza3.jpg'),
-- (4,'산왕전 강백호 신발 - 나이키 조던1 브레드 하이탑',275000,250000,'pizza4.jpg'),
-- (5,'서태웅이 타고다니는 자전거',3500000,1500000,'pizza5.jpg'),
-- (6,'슬램덩크 기념 농구공',47500,47500,'pizza6.jpg');

-- --다음
-- USE `demon_world`;

-- /*Table structure for table `Jujutsu_Kaisen`*/

-- DROP TABLE IF EXISTS `Jujutsu_Kaisen`

-- CREATE TABLE `Jujutsu_Kaisen`(
--   `id` int(11) NOT NULL AUTO_INCREMENT,
--   `name` varchar(20) NOT NULL,
--   `price` int(11) NOT NULL,
--   `discounted_price` int(11) NOT NULL,
--   `photo` varchar(50) DEFAULT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- /*Data for the table `Jujutsu_Kaisen`*/

-- insert  into `Jujutsu_Kaisen`(`id`,`name`,`price`,`discounted_price`,`photo`) values 
-- (1,'젠인 마키의 안경',28000,28000,'pizza1.jpg'),
-- (2,'옷코츠 유타의 반지',65000,63000,'pizza2.jpg'),
-- (3,'나나미 켄토의 주구',53000,50000,'pizza3.jpg'),
-- (4,'쿠기사키 노바라의 망치 & 못 & 저주인형 SET',44000,44000,'pizza4.jpg'),
-- (5,'료멘스쿠나의 손가락',180000,180000,'pizza5.jpg'),
-- (6,'이누마키 토게 가문의 주언 확성기',220000,220000,'pizza6.jpg');

-- --다음
-- USE `demon_world`;

-- /*Table structure for table `C_C_Change`*/

-- DROP TABLE IF EXISTS `C_C_Change`

-- CREATE TABLE `C_C_Change`(
--   `id` int(11) NOT NULL AUTO_INCREMENT,
--   `name` varchar(20) NOT NULL,
--   `price` int(11) NOT NULL,
--   `discounted_price` int(11) NOT NULL,
--   `photo` varchar(50) DEFAULT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- /*Data for the table `C_C_Change`*/

-- insert  into `C_C_Change`(`id`,`name`,`price`,`discounted_price`,`photo`) values 
-- (1,'햄프티록 & 덤프티키 SET',88000,88000,'pizza1.jpg'),
-- (2,'학생회 로얄케이프 SET',74000,72000,'pizza2.jpg'),
-- (3,'수호의 알',15000000,150000000,'pizza3.jpg'),
-- (4,'아무의 머리핀',12000,8000,'pizza4.jpg'),
-- (5,'토마의 바이올린',350000,350000,'pizza5.jpg'),
-- (6,'하트로드 - 아무 애뮬릿 하트 ver.',55000,50000,'pizza6.jpg');

-- --다음
-- USE `demon_world`;

-- /*Table structure for table `Sinnoseuke`*/

-- DROP TABLE IF EXISTS `Sinnoseuke`

-- CREATE TABLE `Sinnoseuke`(
--   `id` int(11) NOT NULL AUTO_INCREMENT,
--   `name` varchar(20) NOT NULL,
--   `price` int(11) NOT NULL,
--   `discounted_price` int(11) NOT NULL,
--   `photo` varchar(50) DEFAULT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- /*Data for the table `Sinnoseuke`*/

-- insert  into `Sinnoseuke`(`id`,`name`,`price`,`discounted_price`,`photo`) values 
-- (1,'흰둥이 밥그릇',25000,20000,'pizza1.jpg'),
-- (2,'떡잎유치원 가방',40000,38000,'pizza2.jpg'),
-- (3,'유리의 토끼 인형',70000,70000,'pizza3.jpg'),
-- (4,'철수의 모에피 등신대',120000,118000,'pizza4.jpg'),
-- (5,'짱구의 필수템, 오리지널 초코비',5800,5300,'pizza5.jpg'),
-- (6,'액션가면 코스튬 - 어린이용',105000,55000,'pizza6.jpg');
