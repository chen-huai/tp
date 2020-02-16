-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2020-01-31 03:18:12
-- 服务器版本： 10.4.8-MariaDB
-- PHP 版本： 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `admins`
--

-- --------------------------------------------------------

--
-- 表的结构 `think_client`
--

CREATE TABLE `think_client` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `repassword` varchar(100) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  `delete_time` datetime NOT NULL,
  `ip` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `think_client`
--

INSERT INTO `think_client` (`id`, `name`, `password`, `repassword`, `create_time`, `update_time`, `delete_time`, `ip`, `email`, `phone`) VALUES
(1, 'BBC', 'f4cc399f0effd13c888e310ea2cf5399', 'f4cc399f0effd13c888e310ea2cf5399', '2020-01-20 13:50:57', '2020-01-24 18:00:20', '0000-00-00 00:00:00', 1270, '457794287@qq.com', '18650112760'),
(2, 'GEXO', 'f4cc399f0effd13c888e310ea2cf5399', 'f4cc399f0effd13c888e310ea2cf5399', '2020-01-22 13:57:56', '2020-01-24 18:00:53', '0000-00-00 00:00:00', 1270, '123456789@qq.com', '12345678909');

-- --------------------------------------------------------

--
-- 表的结构 `think_rule`
--

CREATE TABLE `think_rule` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `think_rule`
--

INSERT INTO `think_rule` (`id`, `name`, `create_time`, `update_time`, `delete_time`, `ip`) VALUES
(1, '超级管理员', '2020-01-22 14:34:22', '2020-01-22 14:34:22', NULL, '127.0.0.1'),
(2, '中级管理员', '2020-01-22 14:42:52', '2020-01-22 14:42:52', NULL, '127.0.0.1'),
(3, '初级管理员', '2020-01-22 16:35:21', '2020-01-22 16:35:21', NULL, '127.0.0.1'),
(4, '超级VIP会员', '2020-01-22 16:35:40', '2020-01-22 16:35:40', NULL, '127.0.0.1'),
(5, 'VIP会员', '2020-01-22 16:36:00', '2020-01-22 16:36:00', NULL, '127.0.0.1'),
(6, '普通会员', '2020-01-22 16:36:16', '2020-01-22 16:36:16', NULL, '127.0.0.1');

-- --------------------------------------------------------

--
-- 表的结构 `think_user`
--

CREATE TABLE `think_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` char(32) NOT NULL,
  `repassword` char(32) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  `delete_time` datetime DEFAULT NULL,
  `ip` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `think_user`
--

INSERT INTO `think_user` (`id`, `name`, `password`, `repassword`, `create_time`, `update_time`, `delete_time`, `ip`, `email`) VALUES
(14, 'test4', 'f4cc399f0effd13c888e310ea2cf5399', 'f4cc399f0effd13c888e310ea2cf5399', '2020-01-23 01:00:13', '2020-01-24 18:08:50', NULL, '127.0.0.1', '123456789@qq.com'),
(10, 'chenhuai', '123456', 'f4cc399f0effd13c888e310ea2cf5399', '2020-01-19 21:02:21', '2020-01-24 17:59:58', NULL, '127.0.0.1', '123456789@qq.com'),
(11, 'test', 'f4cc399f0effd13c888e310ea2cf5399', 'f4cc399f0effd13c888e310ea2cf5399', '2020-01-23 00:23:32', '2020-01-24 18:03:11', NULL, '127.0.0.1', '2@12'),
(12, 'test2', 'f4cc399f0effd13c888e310ea2cf5399', 'f4cc399f0effd13c888e310ea2cf5399', '2020-01-23 00:24:57', '2020-01-24 18:06:16', NULL, '127.0.0.1', '1'),
(13, 'test3', 'f4cc399f0effd13c888e310ea2cf5399', 'f4cc399f0effd13c888e310ea2cf5399', '2020-01-23 00:55:53', '2020-01-25 10:07:41', NULL, '127.0.0.1', '22'),
(6, 'test', 'c56d0e9a7ccec67b4ea131655038d604', 'c56d0e9a7ccec67b4ea131655038d604', '2018-08-17 17:17:04', '2020-01-22 14:43:12', '2020-01-22 14:43:12', '127.0.0.1', 'test@qq.com'),
(7, 'yyyy', 'c56d0e9a7ccec67b4ea131655038d604', 'c56d0e9a7ccec67b4ea131655038d604', '2018-08-17 17:17:31', '2020-01-22 14:43:18', '2020-01-22 14:43:18', '127.0.0.1', 'yyy@qq.com'),
(8, 'admin', 'f4cc399f0effd13c888e310ea2cf5399', 'f4cc399f0effd13c888e310ea2cf5399', '2018-08-17 17:26:07', '2020-01-25 10:06:55', NULL, '127.0.0.1', 'yonglin@qq.com'),
(25, 'test5', '14e1b600b1fd579f47433b88e8d85291', '14e1b600b1fd579f47433b88e8d85291', '2020-01-25 10:08:15', '2020-01-25 10:08:15', NULL, '127.0.0.1', '123456789@qq.com');

-- --------------------------------------------------------

--
-- 表的结构 `think_user_client`
--

CREATE TABLE `think_user_client` (
  `u_id` int(11) NOT NULL COMMENT '用户ID',
  `c_id` int(11) DEFAULT NULL COMMENT '客户ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `think_user_client`
--

INSERT INTO `think_user_client` (`u_id`, `c_id`) VALUES
(24, 2),
(10, 1),
(11, 2),
(12, 1),
(14, 1),
(15, 1),
(16, 1),
(8, 2),
(13, 1),
(13, 2),
(25, 2);

-- --------------------------------------------------------

--
-- 表的结构 `think_user_rule`
--

CREATE TABLE `think_user_rule` (
  `u_id` int(255) NOT NULL COMMENT '用户ID',
  `r_id` int(255) NOT NULL COMMENT '权限ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `think_user_rule`
--

INSERT INTO `think_user_rule` (`u_id`, `r_id`) VALUES
(18, 1),
(18, 2),
(18, 3),
(18, 4),
(24, 1),
(24, 4),
(10, 2),
(10, 5),
(11, 1),
(12, 1),
(12, 6),
(14, 1),
(16, 1),
(16, 6),
(8, 1),
(8, 4),
(13, 4),
(25, 1);

--
-- 转储表的索引
--

--
-- 表的索引 `think_client`
--
ALTER TABLE `think_client`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `think_rule`
--
ALTER TABLE `think_rule`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `think_user`
--
ALTER TABLE `think_user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `think_client`
--
ALTER TABLE `think_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `think_rule`
--
ALTER TABLE `think_rule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用表AUTO_INCREMENT `think_user`
--
ALTER TABLE `think_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
