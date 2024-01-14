/*Table structure for table `member` */
create table member

    -> (email varchar(30) not null,

    -> name varchar(10) not null,

    -> pwd varchar(10) not null,

    -> telno char(13) not null,

    -> regdate date not null,

    -> primary key(email));

/*Table structure for table `cart` */
    create table cart

(email varchar(30) not null,

 product varchar(20) not null,

 PRICE int(11) not null,

 primary key(email, product))

 /*Table structure for table `porder` */



DROP TABLE IF EXISTS `porder`;



CREATE TABLE `porder` (

  `ordno` varchar(20) NOT NULL,

  `email` varchar(30) NOT NULL,

  `orddate` date NOT NULL,

  `address` varchar(80) DEFAULT NULL,

  `amount` int(11) NOT NULL,

  `delamt` int(11) NOT NULL,

  `total` int(11) NOT NULL,

  PRIMARY KEY (`ordno`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `orditem` */



DROP TABLE IF EXISTS `orditem`;



CREATE TABLE `orditem` (

  `ordno` varchar(20) NOT NULL,

  `seq` int(2) NOT NULL,

  `productname` varchar(20) NOT NULL,

  `price` int(11) NOT NULL,

  PRIMARY KEY (`ordno`,`seq`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

