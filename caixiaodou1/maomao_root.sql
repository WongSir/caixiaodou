-- phpMyAdmin SQL Dump
-- version 2.11.2.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 08 月 06 日 02:18
-- 服务器版本: 5.0.45
-- PHP 版本: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `maomao_root`
--

-- --------------------------------------------------------

--
-- 表的结构 `manager`
--

CREATE TABLE `manager` (
  `managerId` int(255) NOT NULL,
  `managerPassword` varchar(30) NOT NULL,
  `managerName` varchar(30) NOT NULL,
  PRIMARY KEY  (`managerId`),
  KEY `index_ManagerName` (`managerName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `manager`
--


-- --------------------------------------------------------

--
-- 表的结构 `orders`
--

CREATE TABLE `orders` (
  `orderId` int(255) NOT NULL auto_increment,
  `orderNumber` char(30) NOT NULL,
  `userPhone` char(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `orderAmount` double NOT NULL,
  `orderDate` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `orderTime` time NOT NULL default '18:00:00',
  `orderFlag` char(10) NOT NULL,
  `orderAddress` varchar(255) NOT NULL,
  PRIMARY KEY  (`orderId`),
  UNIQUE KEY `index_orderNumber` (`orderNumber`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 导出表中的数据 `orders`
--

INSERT INTO `orders` (`orderId`, `orderNumber`, `userPhone`, `userName`, `orderAmount`, `orderDate`, `orderTime`, `orderFlag`, `orderAddress`) VALUES
(1, '581512452', '13660559151', '茂茂', 75.32, '2015-08-01 09:50:55', '16:30:00', '待付款', '广州大学城华南理工大学C10——247房'),
(2, '37933350', '13660559151', '茂茂', 56.26, '2015-08-01 09:51:32', '16:30:00', '待付款', '广州大学城华南理工大学C10——247房'),
(3, '781402588', '13660559158', '黄茂茂', 2121, '2015-08-01 10:14:29', '16:30:00', '待付款', '广州大学城华南理工大学C10——247房'),
(4, '299804688', '13660559158', '黄茂茂', 49.07, '2015-08-01 10:13:53', '16:30:00', '待付款', '广州大学城华南理工大学C10——247房'),
(5, '175415040', '13660559158', '黄茂茂', 62627253824.6, '2015-08-01 10:14:43', '16:30:00', '待付款', '广州大学城华南理工大学C10——247房'),
(6, '817138672', '13660559158', '黄茂茂', 37.1, '2015-08-03 19:28:58', '16:30:00', '待付款', '广州大学城华南理工大学C10——247房'),
(7, '346527100', '13660559158', '黄茂茂', 127.34, '2015-08-05 21:58:32', '16:30:00', '待付款', '广州大学城华南理工大学C10——247房'),
(8, '548980713', '13660559158', '黄茂茂', 112.36, '2015-08-05 22:00:51', '16:30:00', '待付款', '广州大学城华南理工大学C10——247房');

-- --------------------------------------------------------

--
-- 表的结构 `order_product`
--

CREATE TABLE `order_product` (
  `id` int(255) NOT NULL auto_increment,
  `productId` int(255) NOT NULL,
  `orderId` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `index_orderId` (`quantity`),
  KEY `index_productId` (`productId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- 导出表中的数据 `order_product`
--

INSERT INTO `order_product` (`id`, `productId`, `orderId`, `quantity`) VALUES
(1, 4, 1, 1),
(2, 3, 1, 3),
(3, 7, 1, 1),
(4, 3, 2, 2),
(5, 4, 2, 2),
(6, 1, 3, 2121),
(7, 2, 3, 212),
(8, 7, 3, 22222),
(9, 8, 3, 21212),
(10, 1, 4, 1),
(11, 2, 4, 1),
(12, 5, 4, 1),
(13, 6, 4, 1),
(14, 1, 5, 123131),
(15, 2, 5, 2147483647),
(16, 1, 6, 1),
(17, 3, 6, 1),
(18, 5, 6, 1),
(19, 1, 7, 3),
(20, 2, 7, 1),
(21, 5, 7, 3),
(22, 6, 7, 2),
(23, 8, 7, 3),
(24, 3, 8, 2),
(25, 1, 8, 2),
(26, 2, 8, 2),
(27, 4, 8, 2);

-- --------------------------------------------------------

--
-- 表的结构 `productchange`
--

CREATE TABLE `productchange` (
  `productId` int(255) NOT NULL auto_increment,
  `productQuantity` int(30) NOT NULL,
  `productLove` int(255) NOT NULL,
  PRIMARY KEY  (`productId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 导出表中的数据 `productchange`
--

INSERT INTO `productchange` (`productId`, `productQuantity`, `productLove`) VALUES
(1, 12, 31),
(2, 11, 11),
(3, 12, 12),
(4, 21, 22),
(5, 21, 23),
(6, 23, 32),
(7, 34, 45),
(8, 21, 11);

-- --------------------------------------------------------

--
-- 表的结构 `productimg`
--

CREATE TABLE `productimg` (
  `imgId` int(255) NOT NULL auto_increment,
  `productId` int(30) NOT NULL,
  `imgName` varchar(30) NOT NULL,
  `imgRoot` varchar(64) NOT NULL,
  `imgFlag` char(3) NOT NULL,
  PRIMARY KEY  (`imgId`),
  KEY `index_productId` (`productId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 导出表中的数据 `productimg`
--

INSERT INTO `productimg` (`imgId`, `productId`, `imgName`, `imgRoot`, `imgFlag`) VALUES
(1, 1, '鱼香肉丝1', 'images/products/good01.jpg', '素菜'),
(2, 2, '鱼香肉丝2', 'images/products/good03.jpg', '素菜'),
(3, 3, '鱼香肉丝3', 'images/products/good01.jpg', '素菜'),
(4, 4, '鱼香肉丝4', 'images/products/good03.jpg', '素菜'),
(5, 5, '鱼香肉丝5', 'images/products/good01.jpg', '素菜'),
(6, 6, '鱼香肉丝6', 'images/products/good01.jpg', '素菜'),
(7, 7, '鱼香肉丝7', 'images/products/good03.jpg', '素菜'),
(8, 8, '鱼香肉丝8', 'images/products/good03.jpg', '素菜');

-- --------------------------------------------------------

--
-- 表的结构 `productkind`
--

CREATE TABLE `productkind` (
  `productId` int(255) NOT NULL auto_increment,
  `productKind` char(5) NOT NULL,
  `productToday` char(5) NOT NULL,
  `productFlag` char(6) NOT NULL default 'true',
  PRIMARY KEY  (`productId`),
  KEY `index_ProductKind` (`productKind`),
  KEY `index_ProductToday` (`productToday`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 导出表中的数据 `productkind`
--

INSERT INTO `productkind` (`productId`, `productKind`, `productToday`, `productFlag`) VALUES
(1, '素菜', 'true', 'true'),
(2, '肉菜', 'true', 'true'),
(3, '素菜', 'true', 'true'),
(4, '素菜', 'true', 'true'),
(5, '肉菜', 'true', 'true'),
(6, '素菜', 'true', 'true'),
(7, '素菜', 'ture', 'true'),
(8, '素菜', 'true', 'true');

-- --------------------------------------------------------

--
-- 表的结构 `products`
--

CREATE TABLE `products` (
  `productId` int(255) NOT NULL auto_increment,
  `productNumber` char(20) NOT NULL,
  `productName` varchar(30) NOT NULL,
  `productCharacter` text NOT NULL,
  `productInfo` text NOT NULL,
  `productWeigth` char(10) NOT NULL,
  `productOrigin` char(10) NOT NULL,
  `productOldPrice` char(10) NOT NULL,
  `productNewPrice` char(10) NOT NULL,
  `productTime` char(10) NOT NULL,
  PRIMARY KEY  (`productId`),
  UNIQUE KEY `index_productName` (`productName`),
  UNIQUE KEY `index_productNumber` (`productNumber`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 导出表中的数据 `products`
--

INSERT INTO `products` (`productId`, `productNumber`, `productName`, `productCharacter`, `productInfo`, `productWeigth`, `productOrigin`, `productOldPrice`, `productNewPrice`, `productTime`) VALUES
(1, 'Dmao1314', '虎皮青椒', '虎皮加上青椒爆炒', '只是将青椒爆炒像虎皮那样，所以起名为虎皮青椒', '300kg', '广州白云区江夏村', '9.50', '8.05', '3'),
(2, 'Dmao520', '鱼香肉丝', '鱼儿，鱼儿，快到肉哥哥的怀里来', '鱼香肉丝，有鱼？有肉？别傻了，只有肉，嘿嘿。', '250kg', '广州白云区江夏村', '21.06', '20.00', '4'),
(3, 'Dmao68688', '拌青菜', '将青椒爆炒起皮，加入五花肉', '虎皮青椒，并不是有虎皮的，哈哈', '250kg', '广州白云区江夏村', '22.05', '18.05', '8'),
(4, 'Dmao5201314', '苦瓜炒肉', '将青椒爆炒起皮，加入肥而不腻的五花肉，简直是人间极品。', '虎皮青椒，并不是有虎皮的，哈哈。只是将青椒爆炒像虎皮那样', '250kg', '广州白云区江夏村', '12.00', '10.08', '5'),
(5, 'Dmao520520', '红烧肉', '将青椒爆炒起皮，加入五花肉', '只是将青椒爆炒像虎皮那样，所以起名为虎皮青椒', '250kg', '广州白云区江夏村', '12.50', '11.00', '6'),
(6, 'OnePiece23333', '里脊肉爆炒韭菜', '将青椒爆炒起皮，加入五花肉', '只是将青椒爆炒像虎皮那样，所以起名为虎皮青椒。', '250kg', '广州白云区江夏村', '12.50', '10.02', ''),
(7, 'OnePiece789', '丝瓜炒肉', '将青椒爆炒起皮，加入五花肉', '只是将青椒爆炒像虎皮那样，所以起名为虎皮青椒。', '250kg', '广州白云区江夏村', '12.50', '11.09', '5'),
(8, 'BingBIng123', '三鲜汤', '将青椒爆炒起皮，加入五花肉', '只是将青椒爆炒像虎皮那样，所以起名为虎皮青椒。', '250kg', '广州白云区江夏村', '12.50', '10.05', '9');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `userId` int(255) NOT NULL auto_increment,
  `userTel` char(11) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `sex` enum('男','女','保密') NOT NULL default '保密',
  `email` varchar(30) NOT NULL default '@caixiaodou.com',
  `regTime` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`userId`),
  UNIQUE KEY `Index_UserTel` (`userTel`),
  KEY `index_UserName` (`userName`),
  KEY `index_regTime` (`regTime`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 导出表中的数据 `users`
--

INSERT INTO `users` (`userId`, `userTel`, `userPassword`, `userName`, `sex`, `email`, `regTime`) VALUES
(1, '13660559158', '87e33a0fd389ad9521f299dd8607b08a91524c6f', '黄茂茂', '保密', '494326674@qq.com', '2015-07-31 10:38:36'),
(2, '13660559156', '87e33a0fd389ad9521f299dd8607b08a91524c6f', '冰冰', '保密', '22@qq.com', '2015-07-31 10:38:36'),
(3, '13660559157', '87e33a0fd389ad9521f299dd8607b08a91524c6f', '茂茂冰冰', '保密', '11@qq.com', '2015-07-31 10:38:36'),
(4, '13660559159', '87e33a0fd389ad9521f299dd8607b08a91524c6f', '棒冰', '保密', '11@qq.com', '2015-07-31 10:38:36'),
(5, '13660559151', '87e33a0fd389ad9521f299dd8607b08a91524c6f', '茂茂', '保密', '11@qq.com', '2015-07-31 19:18:48'),
(6, '13660559152', '87e33a0fd389ad9521f299dd8607b08a91524c6f', '冰冰', '保密', '111@q.com', '2015-07-31 20:57:20'),
(7, '13660559153', '87e33a0fd389ad9521f299dd8607b08a91524c6f', '病猫', '保密', '111@qq.com', '2015-07-31 21:10:08');

-- --------------------------------------------------------

--
-- 表的结构 `user_order`
--

CREATE TABLE `user_order` (
  `id` int(255) NOT NULL auto_increment,
  `userTel` char(11) NOT NULL,
  `orderId` int(255) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `index_orderId` (`orderId`),
  KEY `index_userTel` (`userTel`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 导出表中的数据 `user_order`
--

INSERT INTO `user_order` (`id`, `userTel`, `orderId`) VALUES
(1, '13660559151', 1),
(2, '13660559151', 2),
(3, '13660559158', 3),
(4, '13660559158', 4),
(5, '13660559158', 5),
(6, '13660559158', 6),
(7, '13660559158', 7),
(8, '13660559158', 8);
