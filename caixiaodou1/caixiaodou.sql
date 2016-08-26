-- phpMyAdmin SQL Dump
-- version 2.11.2.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 07 月 29 日 13:01
-- 服务器版本: 5.0.45
-- PHP 版本: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `caixiaodou`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 导出表中的数据 `orders`
--

INSERT INTO `orders` (`orderId`, `orderNumber`, `userPhone`, `userName`, `orderAmount`, `orderDate`, `orderTime`, `orderFlag`, `orderAddress`) VALUES
(1, 'GZ150703', '22', '茂茂', 22.05, '2015-07-29 01:36:16', '16:30:00', '已完成', '广州大学城华南理工大学C10——247房'),
(2, 'GZ150706', '21', '冰冰', 21.09, '2015-07-29 01:36:16', '16:30:00', '待取菜', '广州大学城华南理工大学C10——247房'),
(3, 'GZ150710', '22', '茂冰', 13.04, '2015-07-29 01:36:16', '16:30:00', '待付款', '广州大学城华南理工大学C10——247房'),
(4, 'GZ150715', '22', '帅哥', 25.05, '2015-07-29 01:36:16', '16:30:00', '已取消', '广州大学城华南理工大学C10——247房'),
(5, 'GZ150718', '22', '美女', 14.08, '2015-07-29 01:36:16', '16:30:00', '已完成', '广州大学城华南理工大学C10——247房');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 导出表中的数据 `order_product`
--

INSERT INTO `order_product` (`id`, `productId`, `orderId`, `quantity`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 2),
(3, 3, 1, 3),
(4, 1, 2, 1),
(5, 2, 2, 2),
(6, 3, 2, 3),
(7, 1, 3, 1),
(8, 2, 3, 2),
(9, 3, 3, 3),
(10, 1, 4, 1),
(11, 2, 4, 2),
(12, 3, 4, 3),
(13, 1, 5, 1),
(14, 2, 5, 2),
(15, 3, 5, 3);

-- --------------------------------------------------------

--
-- 表的结构 `productchange`
--

CREATE TABLE `productchange` (
  `productId` int(255) NOT NULL,
  `productQuantity` int(30) NOT NULL,
  `productLove` int(255) NOT NULL,
  PRIMARY KEY  (`productId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `productchange`
--

INSERT INTO `productchange` (`productId`, `productQuantity`, `productLove`) VALUES
(31313131, 12, 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `productimg`
--


-- --------------------------------------------------------

--
-- 表的结构 `productkind`
--

CREATE TABLE `productkind` (
  `productId` int(255) NOT NULL,
  `productKind` char(5) NOT NULL,
  `productToday` char(5) NOT NULL,
  `productFlag` char(6) NOT NULL default 'true',
  PRIMARY KEY  (`productId`),
  KEY `index_ProductKind` (`productKind`),
  KEY `index_ProductToday` (`productToday`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `productkind`
--


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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 导出表中的数据 `users`
--

INSERT INTO `users` (`userId`, `userTel`, `userPassword`, `userName`, `sex`, `email`, `regTime`) VALUES
(1, '13660559158', '87e33a0fd389ad9521f299dd8607b08a91524c6f', '黄茂茂', '保密', '494326674@qq.com', '2015-07-27 23:48:29'),
(2, '13660559156', '87e33a0fd389ad9521f299dd8607b08a91524c6f', '冰冰', '保密', '22@qq.com', '2015-07-28 18:13:47'),
(3, '13660559157', '87e33a0fd389ad9521f299dd8607b08a91524c6f', '茂茂冰冰', '保密', '11@qq.com', '2015-07-28 18:14:13'),
(4, '13660559159', '87e33a0fd389ad9521f299dd8607b08a91524c6f', '棒冰', '保密', '11@qq.com', '2015-07-28 18:14:40');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 导出表中的数据 `user_order`
--

INSERT INTO `user_order` (`id`, `userTel`, `orderId`) VALUES
(1, '13660559158', 1),
(2, '13660559158', 2),
(3, '13660559158', 3),
(4, '13660559158', 4),
(5, '13660559158', 5);
