-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-11-09 04:31:30
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `elibrary`
--

-- --------------------------------------------------------

--
-- 表的结构 `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `cate` varchar(50) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `key` varchar(200) DEFAULT NULL,
  `publish` varchar(200) DEFAULT NULL,
  `contributor` varchar(50) DEFAULT NULL,
  `contri_date` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `book`
--

INSERT INTO `book` (`id`, `name`, `cate`, `author`, `date`, `key`, `publish`, `contributor`, `contri_date`, `status`) VALUES
(1, '程序员面试宝典', 'IT', '艺名', '2017-04-06', 'java；C++；面试', '机械工业出版社', 'yangqihua', '2017-03-07', 1),
(3, '驾考宝典', '人文', '老司机', '2016-06-01', '驾校；考试；科目一', '四川大学教务处', 'chenyi', '2017-03-05', 1),
(4, '12只猴子', '政治', '未知', '2010-05-12', '科幻', '清华大学出版社', 'chenyi', '2017-04-07', 1),
(6, '黑客帝国', '人文', 'jhon', '2016-05-15', '科幻；电影', '人民邮电出版社', 'yangqihua', '2017-04-03', 1),
(7, '明朝那些事', '政治', '当年明月', '2011-06-18', '历史；明朝；朱元璋；故事', '中国海关出版社', 'yangqihua', '2017-04-05', 1),
(8, '那些人啊', '人文', '九把刀', '2010-05-12', '青春；校园', '长江文艺出版社', 'yangqihua', '2017-03-07', 1),
(9, '计算机网络', 'IT', 'christ', '2000-05-12', '计算机；网络；tcp', '高等教育出版社', 'yangqihua', '2017-04-06', 1),
(10, '软件工程', 'IT', 'rogs', '2010-05-16', '软件开发；研究方法', '机械工业出版社', 'chenyi', '2017-04-29', 1),
(11, '软件工程', 'IT', 'rogs', '2010-05-16', '软件开发；研究方法', '机械工业出版社', 'chenyi', '2017-04-29', 1);

-- --------------------------------------------------------

--
-- 表的结构 `borrow_book`
--

CREATE TABLE IF NOT EXISTS `borrow_book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `contributor` varchar(100) NOT NULL,
  `book_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `book_id` int(11) NOT NULL,
  `book_name` varchar(200) NOT NULL,
  `datetime` datetime NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `comments`
--

INSERT INTO `comments` (`id`, `username`, `book_id`, `book_name`, `datetime`, `content`) VALUES
(10, 'yangqihua', 6, '黑客帝国', '2017-04-24 22:06:57', '我最喜欢的一本科幻书，没有之一，科幻的力量。'),
(11, 'yangqihua', 1, '程序员面试宝典', '2017-04-24 22:07:32', '找工作不能错过的好书，哈哈'),
(12, 'yangqihua', 6, '黑客帝国', '2017-04-25 10:50:51', '推荐各位喜欢黑客帝国这类科幻书籍的朋友。'),
(13, 'chenyi', 6, '黑客帝国', '2017-04-29 16:49:14', '学长很热情，书也很好看！');

-- --------------------------------------------------------

--
-- 表的结构 `return_book`
--

CREATE TABLE IF NOT EXISTS `return_book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `owner` varchar(100) NOT NULL,
  `book_id` int(11) NOT NULL,
  `book_name` varchar(200) NOT NULL,
  `b_date` date NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `return_book`
--

INSERT INTO `return_book` (`id`, `username`, `owner`, `book_id`, `book_name`, `b_date`, `date`, `status`) VALUES
(11, 'yangqihua', 'chenyi', 3, '驾考宝典', '2017-04-29', '2017-04-29', 0);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `no_telp` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `alamat` varchar(50) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`username`, `password`, `no_telp`, `nama`, `is_admin`, `alamat`) VALUES
('chenyi', '123', '18428360735', 'cy', 0, '四川大学江安校区7舍一单元302C'),
('likundong', '123456', '15528468595', '889', 1, '四川大学江安校区7舍一单元402A'),
('luohui', '123', '18380205205', 'lh', 1, '四川大学江安校区7舍一单元302A'),
('yangqihua', '123', '18428360736', 'yangqh', 0, '四川大学江安校区7舍一单元302B');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
