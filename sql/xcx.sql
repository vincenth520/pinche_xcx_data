-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2017-07-15 11:42:13
-- 服务器版本： 5.6.29-log
-- PHP Version: 5.4.45

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xcx`
--

-- --------------------------------------------------------

--
-- 表的结构 `xcx_appointment`
--

CREATE TABLE IF NOT EXISTS `xcx_appointment` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `iid` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `surplus` tinyint(4) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `time` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `xcx_appointment`
--

INSERT INTO `xcx_appointment` (`id`, `uid`, `iid`, `name`, `phone`, `surplus`, `status`, `time`) VALUES
(1, 10003, 1, '客服4', '15350406670', 2, 1, 1494401846),
(2, 10004, 4, '哥哥', '18428331111', 1, 2, 1494408479),
(3, 10001, 3, '爸爸', '15350406670', 1, 0, 1494465303);

-- --------------------------------------------------------

--
-- 表的结构 `xcx_comment`
--

CREATE TABLE IF NOT EXISTS `xcx_comment` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `iid` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `type` varchar(50) NOT NULL DEFAULT 'info',
  `content` text NOT NULL,
  `img` text NOT NULL,
  `zan` int(11) NOT NULL DEFAULT '0',
  `reply` text
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `xcx_comment`
--

INSERT INTO `xcx_comment` (`id`, `uid`, `iid`, `time`, `type`, `content`, `img`, `zan`, `reply`) VALUES
(1, 10003, 1, 1494401705, 'dynamic', '666666', '', 0, ''),
(2, 10001, 2, 1494401751, 'dynamic', '。。。', '', 0, ''),
(3, 10003, 1, 1494401828, 'info', '还缺人吗\n', '[]', 2, ''),
(4, 10001, 2, 1494403530, 'dynamic', '这里啊', '', 0, ''),
(5, 10004, 4, 1494403930, 'dynamic', '77777', '', 0, ''),
(6, 10001, 3, 1494403983, 'dynamic', '爸爸是不是好聪明', '', 0, ''),
(7, 10004, 4, 1494408469, 'info', '要钱吗', '[]', 0, ''),
(8, 10001, 3, 1494408589, 'info', '儿子发车了', '[]', 0, ''),
(9, 10001, 4, 1494408853, 'info', '要命😒', '[]', 0, '哥哥:要钱吗'),
(10, 10004, 7, 1494475417, 'dynamic', '(ง ˙o˙)ว', '', 0, ''),
(11, 10002, 3, 1494475795, 'dynamic', '？？？', '', 0, ''),
(12, 10004, 3, 1494554349, 'dynamic', '可以回复？', '', 0, 'c.'),
(13, 10004, 3, 1494554373, 'dynamic', '居然可以', '', 0, 'h。'),
(14, 10001, 9, 1497412709, 'info', '哈哈哈哈哈', '[]', 0, ''),
(15, 10001, 10, 1500084933, 'info', '请问还有座位吗', '[]', 1, ''),
(16, 10001, 10, 1500084956, 'info', '没有了', '[]', 0, 'h。:请问还有座位吗'),
(17, 10001, 10, 1500085006, 'dynamic', '666', '', 0, ''),
(18, 10001, 10, 1500085012, 'dynamic', '666667', '', 0, 'h。'),
(19, 10001, 11, 1500085690, 'info', '还缺人吗😁', '[]', 1, ''),
(20, 10001, 11, 1500085711, 'info', '666', '[]', 0, 'h。:还缺人吗😁'),
(21, 10001, 11, 1500085754, 'dynamic', '哈哈哈', '', 0, ''),
(22, 10001, 12, 1500086129, 'info', '还缺人吗😀', '[]', 0, ''),
(23, 10001, 12, 1500086153, 'info', '不好意思已经满了', '[]', 0, 'h。:还缺人吗😀'),
(24, 10001, 12, 1500086206, 'dynamic', '哈哈哈', '', 0, ''),
(25, 10001, 12, 1500086211, 'dynamic', '还好', '', 0, 'h。');

-- --------------------------------------------------------

--
-- 表的结构 `xcx_dynamic`
--

CREATE TABLE IF NOT EXISTS `xcx_dynamic` (
  `id` int(11) NOT NULL,
  `content` text,
  `img` text,
  `time` int(11) DEFAULT NULL,
  `zan` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `xcx_dynamic`
--

INSERT INTO `xcx_dynamic` (`id`, `content`, `img`, `time`, `zan`, `uid`) VALUES
(2, '6666', '[]', 1494401739, 0, 10003),
(3, '看见我了吗', '[]', 1494403906, 0, 10004),
(4, '看见我了吗', '[]', 1494403906, 0, 10004),
(6, '天气热了 翻箱倒柜找了半天短袖 结果找出来一看 全是些名牌短袖 感觉穿出去太高调了 比如什么中国电信啊 天翼4G啊 太太乐鸡精啊 莲花味精啊 海天酱油啊。。最珍贵的一件 要属那件史丹利复合肥 跟刘能同款 哎头大了纠结该穿哪个好呢？穿出去不会被人说我炫富吧', '[]', 1494412857, 0, 10001),
(7, '什么', '["https://xcx.codems.cn/Uploads/2017-05-11/5913e27a72aa1.jpg"]', 1494475387, 0, 10004),
(9, '6666666', '["https://xcx.codems.cn/Uploads/2017-06-14/5940b3ff1dcf1.jpg"]', 1497412608, 0, 10001),
(10, '66666', '["https://xcx.codems.cn/Uploads/2017-07-15/59697affa73ab.jpg"]', 1500084995, 0, 10001),
(12, '666', '["https://xcx.codems.cn/Uploads/2017-07-15/59697f9c31d5e.jpg","https://xcx.codems.cn/Uploads/2017-07-15/59697fa938605.jpg","https://xcx.codems.cn/Uploads/2017-07-15/59697fa962051.jpg"]', 1500086193, 0, 10001);

-- --------------------------------------------------------

--
-- 表的结构 `xcx_fav`
--

CREATE TABLE IF NOT EXISTS `xcx_fav` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `iid` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `xcx_fav`
--

INSERT INTO `xcx_fav` (`id`, `uid`, `iid`, `time`) VALUES
(1, 10003, 1, 1494401881),
(2, 10003, 1, 1494401881),
(4, 10002, 7, 1494475707),
(7, 10001, 11, 1500085705),
(8, 10001, 12, 1500086136);

-- --------------------------------------------------------

--
-- 表的结构 `xcx_info`
--

CREATE TABLE IF NOT EXISTS `xcx_info` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `departure` varchar(1000) DEFAULT NULL,
  `destination` varchar(1000) DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `remark` text,
  `surplus` tinyint(4) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `vehicle` varchar(100) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `see` int(11) NOT NULL DEFAULT '0',
  `price` decimal(10,2) DEFAULT NULL,
  `addtime` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `xcx_info`
--

INSERT INTO `xcx_info` (`id`, `date`, `time`, `departure`, `destination`, `gender`, `name`, `phone`, `remark`, `surplus`, `type`, `vehicle`, `uid`, `status`, `see`, `price`, `addtime`) VALUES
(2, '2017-05-10', 1494407280, '四川省成都市龙泉驿区幸福路10号', '四川省成都市龙泉驿区驿都中路110号', 2, '哥哥', '18428331111', '百万豪车，语音提醒，空间巨大', 2, 1, '反正高级', 10004, 1, 1, '2.00', 1494398055),
(3, '2017-05-11', 1494494100, '龙泉驿区成都信息工程大学(龙泉驿校区)', '四川省成都市龙泉驿区同安路6号', 2, '哥哥', '18428332222', '刷卡计费', 6, 1, '豪华多座', 10004, 1, 9, '2.00', 1494398055),
(5, '2017-05-11', 1494494760, '四川省成都市龙泉驿区幸福路10号', '四川省成都市龙泉驿区885,龙泉驿夜班车1', 2, '哥哥', '18428331111', '。。。', 5, 1, '反正高级', 10004, 1, 5, '2.00', 0),
(6, '2017-05-13', 1494667740, '四川省成都市龙泉驿区幸福路10号', '四川省泸州市江阳区江阳西路1号', 2, '哥哥', '18428331111', '', 1, 2, NULL, 10004, 1, 8, NULL, 0),
(7, '2017-05-14', 1494734940, '广东省深圳市龙华区新区大道与白龙路交汇处', '龙华区龙华新区大道卡瑞登酒店南50米', 1, 'c.', '17688827877', '语言充足的后备箱空间', 6, 2, NULL, 10002, 1, 4, NULL, 0),
(9, '2017-06-15', 1497542340, '深圳市南山区西丽石鼓路早安商务中心附近', '江西省吉安市万安县仁德路16号', 1, '黄先生', '15350406670', '', 2, 1, '比亚迪s7', 10001, 1, 3, '0.00', 0),
(10, '2017-07-18', 1500393540, '深圳市南山区西丽早安商务中心(石鼓路西60米)', '北京市东城区正义路2号', 1, '黄先生', '15121212121', '请不要抽烟😀', 2, 1, '比亚迪s7', 10001, 1, 12, '100.00', 1500086228),
(11, '2017-07-16', 1500217200, '广东省深圳市南山区同沙路28', '北京市东城区广场东侧路', 1, '黄先生', '15350406670', '请不要抽烟😊', 2, 1, '比亚迪s7', 10001, 1, 5, '200.00', 0),
(12, '2017-07-16', 1500170400, '深圳市南山区西丽石鼓路早安商务中心附近', '广东省东莞市常东路', 1, '黄先生', '15351313131', '请不要抽烟谢谢', 1, 1, '比亚迪s7', 10001, 1, 6, '40.00', 0);

-- --------------------------------------------------------

--
-- 表的结构 `xcx_msg`
--

CREATE TABLE IF NOT EXISTS `xcx_msg` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `content` text NOT NULL,
  `time` int(11) NOT NULL,
  `see` tinyint(4) NOT NULL DEFAULT '0',
  `type` varchar(50) DEFAULT NULL,
  `url` varchar(100) NOT NULL,
  `fid` int(11) NOT NULL DEFAULT '10000'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `xcx_msg`
--

INSERT INTO `xcx_msg` (`id`, `uid`, `content`, `time`, `see`, `type`, `url`, `fid`) VALUES
(1, 10001, '回复了您的信息 :666666', 1494401705, 1, 'comment', '/pages/dynamic/index?id=1', 10003),
(2, 10001, '回复了您的信息 :还缺人吗\n', 1494401828, 1, 'comment', '/pages/info/index?id=1', 10003),
(3, 10001, '客服4预约了您发布的拼车信息,请及时处理', 1494401846, 1, 'notice', '/pages/appointment/index?id=1', 10000),
(4, 10003, '黄先生同意了您的拼车请求,请及时与车主(15350406670)取得联系', 1494401900, 1, 'notice', '/pages/info/index?id=1', 10000),
(5, 10003, '赞了你的评论:还缺人吗\n', 1494402513, 1, 'zan', '/pages/info/index?id=1', 10001),
(6, 10001, '回复了您的信息 :要钱吗', 1494408469, 1, 'comment', '/pages/info/index?id=4', 10004),
(7, 10001, '哥哥预约了您发布的拼车信息,请及时处理', 1494408480, 1, 'notice', '/pages/appointment/index?id=2', 10000),
(8, 10004, '回复了您的信息 :儿子发车了', 1494408589, 0, 'comment', '/pages/info/index?id=3', 10001),
(9, 10004, '黄先生拒绝了您的拼车请求,原因是拼车人数已满,建议选择其他时间拼车', 1494408608, 0, 'notice', '/pages/info/index?id=4', 10000),
(10, 10004, '爸爸预约了您发布的拼车信息,请及时处理', 1494465305, 0, 'notice', '/pages/appointment/index?id=3', 10000),
(11, 10004, '回复了您的信息 :？？？', 1494475796, 0, 'comment', '/pages/dynamic/index?id=3', 10002);

-- --------------------------------------------------------

--
-- 表的结构 `xcx_notice`
--

CREATE TABLE IF NOT EXISTS `xcx_notice` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `content` text,
  `status` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `xcx_notice`
--

INSERT INTO `xcx_notice` (`id`, `title`, `content`, `status`) VALUES
(1, '免责声明', NULL, 1);

-- --------------------------------------------------------

--
-- 表的结构 `xcx_user`
--

CREATE TABLE IF NOT EXISTS `xcx_user` (
  `id` int(11) NOT NULL,
  `avatarUrl` varchar(200) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `language` varchar(20) DEFAULT NULL,
  `nickName` varchar(200) DEFAULT NULL,
  `openId` varchar(200) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `county` varchar(50) NOT NULL DEFAULT '',
  `phone` varchar(11) DEFAULT NULL,
  `vehicle` varchar(200) DEFAULT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10008 DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `xcx_user`
--

INSERT INTO `xcx_user` (`id`, `avatarUrl`, `city`, `country`, `gender`, `language`, `nickName`, `openId`, `province`, `county`, `phone`, `vehicle`, `name`) VALUES
(10000, 'http://7xr6xf.com1.z0.glb.clouddn.com/admin.png', NULL, NULL, NULL, NULL, '系统消息', NULL, NULL, '', NULL, NULL, ''),
(10001, 'http://wx.qlogo.cn/mmopen/vi_32/DYAIOgq83erzRibxmbXZib375iceEdszYuicvhxYNxC495YzNhlEQtGyNCbrL67K5ibqWMhxicg8t97SiaFiaceicdCYLiag/0', '北京市', 'CN', '1', 'zh_CN', 'h。', 'o0Jv50H2UUMf7oasVnbtZtBAwZ-U', '北京', '丰台区', '15351313130', '比亚迪s7', '黄先生'),
(10002, 'http://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTIJzTTCtibjCPQiahfj96ictD1Qtqw41iaibUvZzKDocDt1YaCibcwKAN6om2FWWianlkP68GEHmtXXg1c8w/0', '', 'CN', '1', 'zh_CN', 'c.', 'o0Jv50D05qyUArsWCJHwLa4zgQ0I', '', '', '17688827877', NULL, 'c.'),
(10003, 'http://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTKb5BzdGZbSYLlVoj51ticRUbLtibhqC1ynJ2INphcK3U4ib7GibPVJia2HM8fWr7icF2zicaMTEqwGT8aGg/0', '', 'CN', '2', 'zh_CN', '客服4', 'o0Jv50M6iLFZd2IuuQ4qA53EdRIA', '', '', NULL, NULL, ''),
(10004, 'http://wx.qlogo.cn/mmopen/vi_32/VzjUV1Io39zJ9fCDybxic2oqdxBYFz2KtgibuBK1WEXBbMPpDB88OAGLEeiapktBZicZbCkNHMpS7cKJZ34jnKa5BA/0', 'Yibin', 'CN', '2', 'zh_CN', '哥哥', 'o0Jv50Gj0gNOAcia6wdbI2i_dvhw', 'Sichuan', '', '18428331111', '反正高级', '哥哥'),
(10005, 'http://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTKsrDK3DBfK1TzjmBfmgSibINf8vd9gl2CKFXauiaPGJsLhhrGeur4SPkkAWnptiaAlXf7JDG1iaSfv0g/0', '', 'CN', '0', 'zh_CN', 'rdgztest_89160', 'o0Jv50FajmQacpapBjlESbIABz9A', '', '', NULL, NULL, ''),
(10006, 'http://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTJ6LgCSHxadcZmOUkNCpcJNN7suBMn39ueOCbhpkY9wYktEQ2as2DjXsvcmUX5a9sSMib9n2Tfqedw/0', 'Guangzhou', 'CN', '2', 'zh_CN', '测试', 'o0Jv50KHEe-DDGqZ_psMvEThRPZ4', 'Guangdong', '', NULL, NULL, ''),
(10007, 'http://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTJ6LgCSHxadcZLV8RKetX3yB5ibyFLTZYVyXib4HAkqCAGLJBMhOXcpiaYkAWRNfZnQKR3KgmdsBVrPA/0', '', 'CN', '0', 'zh_CN', '82583', 'o0Jv50DhBUx24a32SogcI7NX7dd8', '', '', NULL, NULL, '');

-- --------------------------------------------------------

--
-- 表的结构 `xcx_zan`
--

CREATE TABLE IF NOT EXISTS `xcx_zan` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `xcx_zan`
--

INSERT INTO `xcx_zan` (`id`, `uid`, `cid`, `time`) VALUES
(1, 10003, 3, 1494401831),
(2, 10001, 3, 1494402513),
(3, 10001, 15, 1500084948),
(4, 10001, 19, 1500085699);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `xcx_appointment`
--
ALTER TABLE `xcx_appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xcx_comment`
--
ALTER TABLE `xcx_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xcx_dynamic`
--
ALTER TABLE `xcx_dynamic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xcx_fav`
--
ALTER TABLE `xcx_fav`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xcx_info`
--
ALTER TABLE `xcx_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xcx_msg`
--
ALTER TABLE `xcx_msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xcx_notice`
--
ALTER TABLE `xcx_notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xcx_user`
--
ALTER TABLE `xcx_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xcx_zan`
--
ALTER TABLE `xcx_zan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `xcx_appointment`
--
ALTER TABLE `xcx_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `xcx_comment`
--
ALTER TABLE `xcx_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `xcx_dynamic`
--
ALTER TABLE `xcx_dynamic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `xcx_fav`
--
ALTER TABLE `xcx_fav`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `xcx_info`
--
ALTER TABLE `xcx_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `xcx_msg`
--
ALTER TABLE `xcx_msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `xcx_notice`
--
ALTER TABLE `xcx_notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `xcx_user`
--
ALTER TABLE `xcx_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10008;
--
-- AUTO_INCREMENT for table `xcx_zan`
--
ALTER TABLE `xcx_zan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
