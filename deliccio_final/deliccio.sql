-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2016 at 07:18 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `deliccio`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `deladmin`(IN `aid` INT)
    NO SQL
begin

delete from tb_admin where id=aid; 

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delclient`(IN `cid` INT)
    NO SQL
begin

delete from tb_client where id=cid;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delitem`(IN `iid` INT)
    NO SQL
begin

delete from tb_item where id=iid;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delorder`(IN `oid` INT)
    NO SQL
BEGIN

delete from tb_order where id=oid;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dispadmin`()
    NO SQL
begin

select * from tb_admin; 

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dispclient`()
    NO SQL
begin

select * from tb_client;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dispitem`()
    NO SQL
begin

select * from tb_item;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `disporder`()
    NO SQL
BEGIN

select * from tb_order;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `findclient`(IN `cid` INT)
    NO SQL
begin 

select * from tb_client where id=cid;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `finditem`(IN `iid` INT)
    NO SQL
begin 

select * from tb_item where id=iid;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `findorder`(IN `oid` INT)
    NO SQL
BEGIN

select * from tb_order where id=oid;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insadmin`(IN `aname` VARCHAR(50), IN `apwd` VARCHAR(100), IN `atype` ENUM('Manager','Assistant_Manager'))
    NO SQL
begin
insert tb_admin values(NULL,aname,apwd,atype,'Disable');
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insadmin1`(IN `aname` VARCHAR(50), IN `apwd` VARCHAR(100), IN `atype` ENUM('Manager','Assistant_Manager'))
    NO SQL
begin
insert tb_admin values(NULL,aname,apwd,atype,'Disable');
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insclient`(IN `cname` VARCHAR(100), IN `cpwd` VARCHAR(1000), IN `cemail` VARCHAR(10000), IN `caddress` VARCHAR(50), IN `cphone_no` VARCHAR(10))
    NO SQL
begin 

insert tb_client values(NULL,cname,cpwd,cemail,caddress,cphone_no);

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insitem`(IN `iname` VARCHAR(10000), IN `iavail` ENUM('Available','Not_Available'), IN `icost` INT, IN `icategory` ENUM('Dessert','Beverage','South_Indian','Punjabi','Italian','Gujarati','Chinese'))
    NO SQL
begin 

insert tb_item values(NULL,iname,iavail,icost,icategory);

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insorder`(IN `oclient_id` INT, IN `ostatus` ENUM('Not_Delivered','Delivered','Pending'), IN `ocost` INT, IN `olist` VARCHAR(1000), IN `oaddress` VARCHAR(1000), IN `otime` VARCHAR(50))
    NO SQL
BEGIN

insert tb_order values(NULL,oclient_id,ostatus,ocost,olist,oaddress,otime,NULL);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `loginadmin`(IN `aname` VARCHAR(50), IN `apwd` VARCHAR(50), OUT `ret` INT)
    NO SQL
begin

declare ap varchar(50);

select pwd from tb_admin where name=aname into @ap;

if @ap is null then
	set ret=-1;
else
	if @ap=apwd then 
		set ret=1;
    else
    	set ret=-2;
    end if;
end if;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `loginclient`(IN `cemail` VARCHAR(100), IN `cpwd` VARCHAR(1000), OUT `ret` INT)
    NO SQL
begin 

declare cp varchar(50);

select pwd from tb_client where email=cemail into @cp;

if @cp is NULL then 
	set ret=-1;
else 
	if @cp=cpwd then 
    	set ret=1;
   else 
   		set ret=-2;
   end if;
end if;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updadmin`(IN `aid` INT, IN `aname` VARCHAR(50), IN `apwd` VARCHAR(50), IN `atype` ENUM('Manager','Assistant_Manager'), IN `asts` ENUM('Enable','Disable'))
    NO SQL
begin

update tb_admin set name=aname,pwd=apwd,type=atype,sts=asts where id=aid;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updclient`(IN `cid` INT, IN `cname` VARCHAR(100), IN `cpwd` VARCHAR(1000), IN `cemail` VARCHAR(10000), IN `cphone_no` VARCHAR(15), IN `caddress` VARCHAR(50))
    NO SQL
begin 

update tb_client set name=cname, pwd=cpwd, email=cemail,address=caddress, phone_no=cphone_no where id=cid;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updclient_a`(IN `cid` INT, IN `cname` VARCHAR(100), IN `cemail` VARCHAR(1000), IN `caddress` VARCHAR(100), IN `cphone_no` VARCHAR(15))
    NO SQL
begin 

update tb_client set name=cname, pwd=cpwd, email=cemail,address=caddress, phone_no=cphone_no where id=cid;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `upditem`(IN `iid` INT, IN `iname` VARCHAR(10000), IN `iavail` ENUM('Available','Not_Available'), IN `icost` INT, IN `icategory` ENUM('Dessert','Beverage','South_Indian','Punjabi','Italian','Gujarati','Chinese'))
    NO SQL
begin

update tb_item set name=iname, avail=iavail, cost=icost, category=icategory where id=iid;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updorder`(IN `oid` INT, IN `oclient_id` INT, IN `osts` ENUM('Not_Delivered','Delivered'), IN `ocost` INT, IN `olist` VARCHAR(1000), IN `oaddress` VARCHAR(1000), IN `otime` VARCHAR(50))
    NO SQL
BEGIN

update tb_order set client_id=oclient_id,status=osts,cost=ocost,list=olist,address=oaddress,receive_time=otime where id=oid;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `type` enum('Manager','Assistant_Manager') NOT NULL,
  `sts` enum('Enable','Disable') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `name`, `pwd`, `type`, `sts`) VALUES
(1, 'Jasleen', 'bdbf976e2c3bc90f81a1155f4642cce6', 'Manager', 'Enable'),
(2, 'Mehak', '79ba8c0397c9c0898c9ff06e3251b9fe', 'Assistant_Manager', 'Enable'),
(3, 'Ranisha', '9a26f53fd11a84f1ba5926527b7ca914', 'Assistant_Manager', 'Disable'),
(4, 'Govind', 'govind', 'Manager', 'Disable'),
(5, 'Sohit Mehta', '5e434b1eeb773a66ccda8ea2c4652d1a', 'Assistant_Manager', 'Enable'),
(6, 'sanmeet', '9039b1db57a15364fc38c50abecb024a', 'Manager', 'Enable');

-- --------------------------------------------------------

--
-- Table structure for table `tb_client`
--

CREATE TABLE IF NOT EXISTS `tb_client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `email` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `tb_client`
--

INSERT INTO `tb_client` (`id`, `name`, `pwd`, `email`, `address`, `phone_no`) VALUES
(43, 'Sonam Bhandari', '1f1f0e30f5fd513a3241802b2d8b5b0f', 'sonam@xyz.com', 'Jalandhar', '7894561230'),
(44, 'vhdcsn', 'kvnm', 'vhcnx', 'vcsn', '54132213'),
(45, 'Sohit ', 'effa3c2ffc3db6dd705d4b0107b90bbd', 'mehta@gmail.com', 'Hsp', '7890462530'),
(46, 'Sanmeet singh', '9039b1db57a15364fc38c50abecb024a', 'sanmeet@gmail.com', 'asr', '9876543210'),
(47, 'Suchita Bhatia', '984cd270d9ca4b4154493a287ddae56b', 'suchita@gmail.com', 'ldh', '9999999999');

-- --------------------------------------------------------

--
-- Table structure for table `tb_guest`
--

CREATE TABLE IF NOT EXISTS `tb_guest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tb_guest`
--

INSERT INTO `tb_guest` (`id`, `name`, `address`, `email`, `phone_no`) VALUES
(1, 'mehak', 'mohali', 'mehak@yahho.com', '981'),
(2, 'mehak', 'mohali', 'mehak@yahho.com', '981'),
(3, 'mehak', 'mohali', 'mehak@yahho.com', '981'),
(4, 'mehak', 'mohali', 'mehak@yahho.com', '981'),
(5, 'mehak', 'mohali', 'mehak@yahho.com', '981'),
(6, 'mehak', 'mohali', 'mehak@yahho.com', '981'),
(7, 'mehak', 'mohali', 'mehak@yahho.com', '981'),
(8, 'sdf', 'sdfsdf', 'fgs', '3223');

-- --------------------------------------------------------

--
-- Table structure for table `tb_item`
--

CREATE TABLE IF NOT EXISTS `tb_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `avail` enum('Available','Not_Available') NOT NULL,
  `cost` int(11) NOT NULL,
  `category` enum('Dessert','Beverage','South_Indian','Punjabi','Italian','Gujarati','Chinese') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tb_item`
--

INSERT INTO `tb_item` (`id`, `name`, `avail`, `cost`, `category`) VALUES
(1, 'Lassi', 'Available', 40, 'Beverage'),
(2, 'Mango Shake', 'Available', 30, 'Beverage'),
(3, 'Tea', 'Available', 25, 'Beverage'),
(4, 'Mint lassi', 'Available', 40, 'Beverage'),
(5, 'kheer', 'Available', 40, 'Dessert'),
(6, 'Rasgulla', 'Available', 30, 'Dessert'),
(7, 'pav bhaji', 'Available', 100, 'Gujarati'),
(8, 'aaloo parantha', 'Available', 50, 'Punjabi'),
(9, 'dosa', 'Available', 150, 'South_Indian'),
(10, 'dhokla', 'Available', 100, 'Gujarati'),
(11, 'noodles', 'Available', 100, 'Chinese'),
(12, 'pizza', 'Available', 200, 'Italian'),
(13, 'pasta', 'Available', 150, 'Italian'),
(14, 'uttapam', 'Available', 150, 'South_Indian');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE IF NOT EXISTS `tb_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) DEFAULT NULL,
  `sts` enum('Not_Delivered','Delivered','Pending') NOT NULL,
  `cost` int(11) NOT NULL,
  `orderlist` varchar(1000) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `ordertime` datetime NOT NULL,
  `guest_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id`, `client_id`, `sts`, `cost`, `orderlist`, `address`, `ordertime`, `guest_id`) VALUES
(51, 42, 'Pending', 150, '14', 'Nangal', '0000-00-00 00:00:00', 0),
(52, 42, 'Pending', 150, '14', 'Nangal', '0000-00-00 00:00:00', 0),
(53, 45, 'Pending', 170, '3,14', 'Hsp', '0000-00-00 00:00:00', 0),
(54, 45, 'Pending', 170, '3,14', 'Hsp', '0000-00-00 00:00:00', 0),
(55, 46, 'Pending', 150, '9', 'jalandhar', '0000-00-00 00:00:00', 0),
(56, 47, 'Pending', 500, '9,12', 'ldh', '0000-00-00 00:00:00', 0),
(57, 46, 'Pending', 400, '3,5,6,12', 'asr', '0000-00-00 00:00:00', 0),
(58, 45, 'Pending', 150, '9', 'Hsp', '0000-00-00 00:00:00', 0),
(59, 45, 'Pending', 215, '1,3,9', 'Hsp', '0000-00-00 00:00:00', 0),
(60, NULL, 'Pending', 200, '1,2', 'mohali', '0000-00-00 00:00:00', 7),
(61, NULL, 'Pending', 23, '1,2,3', 'sdfsdf', '0000-00-00 00:00:00', 8);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
