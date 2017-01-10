-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-12-29 11:37:45
-- 服务器版本： 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- 表的结构 `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE `tbl_admin` (
  `id` int(10) NOT NULL COMMENT '序号',
  `name` varchar(30) NOT NULL DEFAULT '0' COMMENT '管理员名字',
  `pwd` varchar(255) NOT NULL DEFAULT '0' COMMENT '管理员密码',
  `role` int(10) NOT NULL DEFAULT '0' COMMENT '角色'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `pwd`, `role`) VALUES
(1, 'xiaomi', '202cb962ac59075b964b07152d234b70', 2),
(3, 'sd', '202cb962ac59075b964b07152d234b70', 3);

-- --------------------------------------------------------

--
-- 表的结构 `tbl_assign`
--

DROP TABLE IF EXISTS `tbl_assign`;
CREATE TABLE `tbl_assign` (
  `id` int(10) NOT NULL,
  `schedule_date` varchar(32) NOT NULL,
  `schedule_timeinfo` int(10) NOT NULL COMMENT '1:上午 2：下午 3:晚上 0:任意',
  `order_id` int(10) NOT NULL,
  `shifu_id` int(10) NOT NULL,
  `minutes` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tbl_assign`
--

INSERT INTO `tbl_assign` (`id`, `schedule_date`, `schedule_timeinfo`, `order_id`, `shifu_id`, `minutes`) VALUES
(1, '2011-01-01', 1, 1, 1, 10);

-- --------------------------------------------------------

--
-- 表的结构 `tbl_calendar`
--

DROP TABLE IF EXISTS `tbl_calendar`;
CREATE TABLE `tbl_calendar` (
  `id` int(200) NOT NULL COMMENT '序号',
  `work_date` int(20) NOT NULL DEFAULT '0' COMMENT '日期',
  `line_id` int(10) NOT NULL DEFAULT '0',
  `srvzone_id` int(10) NOT NULL DEFAULT '0' COMMENT '地区id',
  `schedule_timeinfo` int(10) NOT NULL DEFAULT '0' COMMENT '时段：1:上午，2:下午，3:晚上',
  `minutes_need` int(10) NOT NULL DEFAULT '0' COMMENT '用掉的总时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tbl_calendar`
--

INSERT INTO `tbl_calendar` (`id`, `work_date`, `line_id`, `srvzone_id`, `schedule_timeinfo`, `minutes_need`) VALUES
(1, 1481817600, 0, 11, 1, 200),
(2, 1481904000, 0, 11, 1, 90),
(3, 1481990400, 0, 12, 2, 230),
(4, 1482076800, 0, 12, 2, 130),
(5, 1482163200, 0, 13, 1, 200),
(6, 1482249600, 0, 13, 1, 200),
(7, 1482163200, 0, 13, 3, 130);

-- --------------------------------------------------------

--
-- 表的结构 `tbl_calendar_jiedan`
--

DROP TABLE IF EXISTS `tbl_calendar_jiedan`;
CREATE TABLE `tbl_calendar_jiedan` (
  `id` int(10) NOT NULL,
  `work_date` int(10) NOT NULL,
  `line_id` int(10) NOT NULL,
  `srvzone_id` int(10) NOT NULL,
  `morning_up` int(10) NOT NULL DEFAULT '0',
  `morning_down` int(10) DEFAULT '0',
  `morning_used` int(10) NOT NULL DEFAULT '0',
  `afternoon_up` int(10) NOT NULL DEFAULT '0',
  `afternoon_down` int(10) NOT NULL DEFAULT '0',
  `afternoon_used` int(10) NOT NULL DEFAULT '0',
  `night_up` int(10) NOT NULL DEFAULT '0',
  `night_down` int(10) NOT NULL DEFAULT '0',
  `night_used` int(10) NOT NULL DEFAULT '0',
  `anytime_used` int(10) NOT NULL DEFAULT '0',
  `wholeday_used` int(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tbl_calendar_jiedan`
--

INSERT INTO `tbl_calendar_jiedan` (`id`, `work_date`, `line_id`, `srvzone_id`, `morning_up`, `morning_down`, `morning_used`, `afternoon_up`, `afternoon_down`, `afternoon_used`, `night_up`, `night_down`, `night_used`, `anytime_used`, `wholeday_used`) VALUES
(1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE `tbl_category` (
  `id` int(10) NOT NULL,
  `name` varchar(32) NOT NULL COMMENT '类别名',
  `parent_id` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`, `parent_id`) VALUES
(1, '家电清洗', 0),
(2, '地暖', 0);

-- --------------------------------------------------------

--
-- 表的结构 `tbl_customer`
--

DROP TABLE IF EXISTS `tbl_customer`;
CREATE TABLE `tbl_customer` (
  `id` int(10) NOT NULL,
  `mobile` varchar(32) NOT NULL COMMENT '手机',
  `password` varchar(32) NOT NULL DEFAULT '',
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '名字',
  `sex` char(1) NOT NULL COMMENT '性别:1男2:女',
  `city` int(11) DEFAULT '1' COMMENT '城市',
  `zone` varchar(32) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL DEFAULT '',
  `service_zone` int(10) DEFAULT '0',
  `wx_openid` varchar(64) NOT NULL DEFAULT '' COMMENT '微信绑定的openid',
  `total_jobs` int(10) NOT NULL DEFAULT '0' COMMENT '一共多少单',
  `date_created` int(10) NOT NULL DEFAULT '0' COMMENT '生成本记录的时间戳',
  `geohash` varchar(32) NOT NULL DEFAULT '',
  `latitude` varchar(32) NOT NULL DEFAULT '',
  `longitude` varchar(32) NOT NULL DEFAULT '',
  `strike` int(10) NOT NULL DEFAULT '0',
  `reg_from` int(10) NOT NULL DEFAULT '1' COMMENT '0:微信内绑定的 1:电话订单过来新建的用户',
  `status` int(10) NOT NULL DEFAULT '1' COMMENT '0:无效用户,1:有效'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `mobile`, `password`, `name`, `sex`, `city`, `zone`, `address`, `service_zone`, `wx_openid`, `total_jobs`, `date_created`, `geohash`, `latitude`, `longitude`, `strike`, `reg_from`, `status`) VALUES
(1, 'T158001111', '444', 'yang', '1', 21, '2105', '111 44555', 0, '', 0, 0, '333', '1', '2', 0, 1, 1),
(2, '158001113', '', '11222', '1', 21, '2101', '', 0, '', 0, 1479796014, '', '', '', 0, 1, 1),
(3, '11111', '1111', '1111', '1', 21, '2105', '', 0, '', 0, 0, '', '', '', 0, 1, 1),
(4, '136211234', '', '1222', '', 21, '2101', '据详细地址得出服务区,', 0, '', 0, 1482285740, '', '', '', 0, 1, 1),
(5, '1360011111', '', '名字3', '', 21, '2104', '地址3', 0, '', 0, 1482286291, '', '', '', 0, 1, 1),
(6, '111122222', '', 'yang', '', 21, '2101', 'ddde', 0, '', 0, 1482395023, '', '', '', 0, 1, 1),
(7, '11112222', '', 'yang', '', 21, '2101', '111', 0, '', 0, 1482395265, '', '', '', 0, 1, 1),
(8, '222', '', '111', '', 21, '2101', '111', 0, '', 0, 1482395505, '', '', '', 0, 1, 1),
(9, '157', '', '', '', 21, '2101', '', 0, '', 0, 1482474210, '', '', '', 0, 1, 1),
(10, '11', '', '', '', 21, '2101', '', 0, '', 0, 1482474288, '', '', '', 0, 1, 1),
(11, '15821513595', '', '杨正明', '', 21, '2104', '浦东新区永泰路77号', 0, '', 0, 1482646527, '', '', '', 0, 1, 1),
(12, '1582113595', '', 'rrrr', '', 21, '2101', '2222', 0, '', 0, 1482760171, '', '', '', 0, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `tbl_customer_addr`
--

DROP TABLE IF EXISTS `tbl_customer_addr`;
CREATE TABLE `tbl_customer_addr` (
  `id` int(10) NOT NULL,
  `cust_id` int(10) NOT NULL,
  `city` int(10) NOT NULL,
  `zone` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `service_zone` int(10) NOT NULL DEFAULT '0',
  `main_addr` tinyint(1) NOT NULL,
  `name` varchar(32) NOT NULL COMMENT '联系人',
  `phone` varchar(32) NOT NULL COMMENT '联系电话'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tbl_customer_addr`
--

INSERT INTO `tbl_customer_addr` (`id`, `cust_id`, `city`, `zone`, `address`, `service_zone`, `main_addr`, `name`, `phone`) VALUES
(1, 1, 21, 2105, '111 44555', 0, 1, 'yang', '021111111'),
(2, 1, 10, 2101, '11111', 0, 0, '', ''),
(3, 4, 21, 2101, '据详细地址得出服务区,', 2101, 1, '联系人', '138001380000'),
(4, 5, 21, 2104, '地址3', 2104, 1, '联系人', '13800133'),
(5, 6, 21, 2101, 'ddde', 2101, 1, '22 444', '021111'),
(6, 7, 21, 2101, '111', 2101, 1, '111', '111'),
(7, 8, 21, 2105, '111', 2105, 1, '111', '111'),
(8, 8, 21, 2101, '溧阳路1111', 2101, 0, 'YANG', '11 344 '),
(9, 11, 21, 2104, '浦东新区永泰路77号', 2104, 1, '杨正明', '15821513595'),
(10, 12, 21, 2101, '2222', 2101, 1, '2222', '2222');

-- --------------------------------------------------------

--
-- 表的结构 `tbl_feedback_later`
--

DROP TABLE IF EXISTS `tbl_feedback_later`;
CREATE TABLE `tbl_feedback_later` (
  `id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL DEFAULT '0',
  `content` varchar(255) NOT NULL,
  `date_created` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tbl_feedback_later`
--

INSERT INTO `tbl_feedback_later` (`id`, `order_id`, `content`, `date_created`) VALUES
(1, 1, '感觉不错\n订单\n我也觉得不错\n你认为呢\n', 1481866139),
(2, 2, '11222\nffff1', 1481868203),
(3, 4, '尚未有评价', 1481879205),
(4, 5, '尚未有评价', 1482200045),
(5, 6, '尚未有评价', 1482200051),
(6, 7, '尚未有评价', 1482200274),
(7, 8, 'ddd1', 1482200917),
(8, 9, '尚未有评价', 1482225048),
(9, 10, '尚未有评价', 1482285740),
(10, 11, '尚未有评价', 1482286292),
(11, 17, '尚未有评价', 1482395599),
(12, 18, '尚未有评价', 1482646528),
(13, 19, '尚未有评价', 1482646686),
(14, 20, '1111', 1482729978),
(15, 21, '尚未有评价', 1482730158),
(16, 22, '尚未有评价', 1482757117),
(17, 23, '尚未有评价', 1482757173),
(18, 24, '尚未有评价', 1482760172),
(19, 25, '尚未有评价', 1482760231),
(20, 26, '尚未有评价', 1482815495);

-- --------------------------------------------------------

--
-- 表的结构 `tbl_minutes_resource`
--

DROP TABLE IF EXISTS `tbl_minutes_resource`;
CREATE TABLE `tbl_minutes_resource` (
  `id` int(10) NOT NULL,
  `shifu_id` int(10) NOT NULL DEFAULT '0',
  `work_date` int(10) NOT NULL COMMENT '用时间戳的形式表示日期',
  `line_id` int(10) NOT NULL,
  `srvzone_id` int(10) NOT NULL DEFAULT '0',
  `minutes_morning` int(10) NOT NULL COMMENT '已占用时间',
  `minutes_afternoon` int(10) NOT NULL,
  `minutes_night` int(10) NOT NULL,
  `minutes_allday` int(10) NOT NULL,
  `work_status` int(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tbl_minutes_resource`
--

INSERT INTO `tbl_minutes_resource` (`id`, `shifu_id`, `work_date`, `line_id`, `srvzone_id`, `minutes_morning`, `minutes_afternoon`, `minutes_night`, `minutes_allday`, `work_status`) VALUES
(1, 0, 20160101, 1, 0, 0, 0, 30, 30, 1);

-- --------------------------------------------------------

--
-- 表的结构 `tbl_operator_log`
--

DROP TABLE IF EXISTS `tbl_operator_log`;
CREATE TABLE `tbl_operator_log` (
  `id` int(10) NOT NULL,
  `event` varchar(255) NOT NULL,
  `event_data` varchar(255) NOT NULL,
  `kefu_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_order`
--

DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE `tbl_order` (
  `id` int(10) NOT NULL,
  `order_no` varchar(32) NOT NULL,
  `order_status` int(10) NOT NULL DEFAULT '0' COMMENT '订单状态',
  `customer_id` int(10) NOT NULL,
  `date_created` int(10) NOT NULL,
  `order_city` int(10) NOT NULL COMMENT '订单城市',
  `order_zone` int(10) NOT NULL COMMENT '订单区域',
  `service_zone` int(10) NOT NULL DEFAULT '0',
  `order_addr` varchar(255) NOT NULL COMMENT '订单地址',
  `order_lat` varchar(32) NOT NULL DEFAULT '11.22' COMMENT '订单经纬度',
  `order_lng` varchar(32) NOT NULL COMMENT '订单经纬度',
  `order_geohash` varchar(32) NOT NULL,
  `contact_name` varchar(32) NOT NULL,
  `contact_phone` varchar(32) NOT NULL,
  `order_amt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `payment_need` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '本次需要支付的金额',
  `payment_paid` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '共计支付',
  `schedule_date` varchar(32) NOT NULL COMMENT '用户要求的上门日期',
  `schedule_timeinfo` int(10) NOT NULL COMMENT '1:上午 2：下午 3:晚上 0:任意',
  `final_time` varchar(32) NOT NULL COMMENT '上门时间',
  `final_shifu` varchar(32) NOT NULL COMMENT '派单的师傅的ID,可多个',
  `minutes_need` int(10) NOT NULL DEFAULT '60' COMMENT '此订单大约需要多少分钟',
  `order_note` varchar(1024) NOT NULL COMMENT '系统端备注，只能添加，不能删除',
  `order_note2` varchar(1024) NOT NULL COMMENT '给师傅的备注',
  `source` varchar(32) NOT NULL,
  `source_no` varchar(255) NOT NULL,
  `source_pay` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '从第三方渠道支付XX',
  `source_dikou` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '第三方渠道抵扣XX',
  `update_amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '每次修改订单后涉及到的金额的变化',
  `update_count` int(10) NOT NULL DEFAULT '0' COMMENT '每次修改，+1',
  `order_flag` int(10) NOT NULL DEFAULT '0' COMMENT '默认是0，1：表示派单需注意',
  `price_index` int(10) NOT NULL DEFAULT '1',
  `addr_index` int(10) NOT NULL DEFAULT '0',
  `jiedan_info` varchar(64) NOT NULL DEFAULT '' COMMENT '在接单算法的时候，会记录分配的时间信息，如果要修改订单，首先根据此字段还原calendar_jiedan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `order_no`, `order_status`, `customer_id`, `date_created`, `order_city`, `order_zone`, `service_zone`, `order_addr`, `order_lat`, `order_lng`, `order_geohash`, `contact_name`, `contact_phone`, `order_amt`, `payment_need`, `payment_paid`, `schedule_date`, `schedule_timeinfo`, `final_time`, `final_shifu`, `minutes_need`, `order_note`, `order_note2`, `source`, `source_no`, `source_pay`, `source_dikou`, `update_amount`, `update_count`, `order_flag`, `price_index`, `addr_index`, `jiedan_info`) VALUES
(1, '111', 1, 1, 1, 21, 2101, 0, '111 22', '11', '22', '11122', '', '', '10.00', '11.00', '11.00', '2011-11-11', 4, '12:35', '1,1,1', 50, 'ddd\neeeg\nhhh\nD嘎嘎嘎', '顶顶顶\n嘎嘎嘎', 'weixin', '', '0.00', '0.00', '0.00', 0, 0, 1, 0, ''),
(2, '1112222333222', 1, 122, 1481252477, 21, 2101, 0, '111 22', '11', '22', '11 333', '', '', '10.00', '100.00', '10.00', '2011-11-11', 1, '12:35', '1,1,1', 50, '333', 'eeeee', '', '', '0.00', '0.00', '0.00', 0, 0, 1, 0, ''),
(3, '11122', 0, 1, 1481263230, 21, 2101, 0, '111', '11.22', '11', '11', '', '', '0.00', '0.00', '0.00', '2011-11-11', 1, '19:30', '1,1,1', 60, 'ddd fff\r\nggg\r\n', 'eeee', '', '', '0.00', '0.00', '0.00', 0, 0, 1, 0, ''),
(4, '1111', 0, 3, 1481879204, 21, 2101, 0, '11222', '11.22', '', '', '', '', '0.00', '0.00', '0.00', '11', 1, '', '1,1,1', 60, '11', '', 'weixin', '', '11.00', '11.00', '0.00', 0, 0, 1, 0, ''),
(5, '201612200314041482200044', 0, 0, 1482200044, 21, 2101, 0, '1111', '11.22', '', '', '', '', '0.00', '0.00', '0.00', '2011-12-10', 1, '', '1,1,1', 60, '', '', 'weixin', '1111', '10.00', '0.00', '0.00', 0, 0, 1, 0, ''),
(6, '201612200314101482200050', 0, 0, 1482200050, 21, 2101, 0, '1111', '11.22', '', '', '', '', '0.00', '0.00', '0.00', '2011-12-10', 1, '', '1,1,1', 60, '', '', 'weixin', '1111', '10.00', '0.00', '0.00', 0, 0, 1, 0, ''),
(7, '201612200317541482200274', 0, 0, 1482200274, 21, 2101, 0, '虹口区溧阳路1111号', '11.22', '', '', '', '', '0.00', '100.00', '0.00', '2011-11-11', 1, '', '1,1,1', 60, '', '', 'phone', '', '0.00', '0.00', '0.00', 0, 0, 1, 0, ''),
(8, '20161220032212754', 0, 0, 1482200532, 21, 2101, 0, '111 44555', '11.22', '', '', '222', '02160455175', '0.00', '100.00', '0.00', '2011-11-11', 1, '', '1,1,1', 60, 'eee\nggg', 'aaa\nbb', 'phone', '', '0.00', '0.00', '0.00', 0, 0, 1, 0, ''),
(9, '20161220101047687', 0, 0, 1482225047, 21, 2101, 0, '111 333', '11.22', '', '', '22 444', '11122', '90.00', '40.00', '0.00', '2012-01-01', 2, '', '1,1,1', 110, 'ddd', '', 'taobao', '1122', '50.00', '50.00', '0.00', 0, 0, 1, 0, ''),
(10, '20161221030220644', 0, 4, 1482285740, 21, 2101, 0, '据详细地址得出服务区,', '11.22', '', '', '联系人', '138001380000', '0.00', '0.00', '0.00', '2011-12-10', 1, '', '1,1,1', 60, '', '', 'phone', '123456', '0.00', '0.00', '0.00', 0, 0, 1, 0, ''),
(11, '20161221031132285', 0, 5, 1482286292, 21, 2104, 0, '地址3', '11.22', '', '', '联系人', '13800133', '180.00', '180.00', '0.00', '2012-11-11', 4, '', '1,1,1', 170, '顶顶顶\nggg', 'eeee', 'phone', '', '0.00', '0.00', '0.00', 0, 0, 1, 0, ''),
(12, '20161222092344147', 0, 6, 1482395024, 21, 2101, 0, 'ddde', '11.22', '', '', '22 444', '021111', '190.00', '187.00', '0.00', '2013-01-01', 2, '', '1,1,1', 130, 'ddd', '', 'phone', '111', '0.00', '3.00', '187.00', 0, 0, 1, 0, ''),
(13, '20161222092745793', 0, 7, 1482395265, 21, 2101, 0, '111', '11.22', '', '', '111', '111', '190.00', '180.00', '0.00', '2011-01-01', 1, '', '1,1,1', 100, '', '', 'phone', '111', '0.00', '10.00', '180.00', 0, 0, 1, 0, ''),
(14, '20161222092828368', 0, 7, 1482395308, 21, 2101, 0, '111', '11.22', '', '', '111', '111', '190.00', '180.00', '0.00', '2011-01-01', 1, '', '1,1,1', 100, '', '', 'phone', '111', '0.00', '10.00', '180.00', 0, 0, 1, 0, ''),
(15, '20161222092902470', 0, 7, 1482395342, 21, 2101, 0, '111', '11.22', '', '', '111', '111', '95.00', '85.00', '0.00', '2011-01-01', 1, '', '1,1,1', 80, '', '', 'phone', '111', '0.00', '10.00', '85.00', 0, 0, 1, 0, ''),
(16, '20161222093145323', 0, 8, 1482395505, 21, 2101, 0, '111', '11.22', '', '', '111', '111', '120.00', '119.00', '0.00', '2012-01-01', 1, '', '1,1,1', 110, '', '', 'phone', '1122', '0.00', '1.00', '119.00', 0, 0, 1, 0, ''),
(17, '20161222093319517', 0, 8, 1482395599, 21, 2101, 0, '111', '11.22', '', '', '111', '111', '180.00', '129.00', '50.00', '2012-02-02', 1, '', '1,1,1', 100, '', '', 'phone', '1122', '0.00', '1.00', '119.00', 13, 0, 3, 0, ''),
(18, '20161225141527742', 0, 11, 1482646527, 21, 2104, 0, '浦东新区永泰路77号', '11.22', '', '', '杨正明', '15821513595', '120.00', '120.00', '0.00', '2016-12-09', 1, '', '1,1,1', 110, '', '', 'phone', '', '0.00', '0.00', '120.00', 3, 0, 1, 0, ''),
(19, '20161225141805365', 11, 11, 1482646685, 21, 2104, 0, '浦东新区永泰路77号', '11.22', '', '', '联系人', '02160455175', '300.00', '300.00', '0.00', '2016-12-09', 4, '', '1,1,1', 90, '', '', 'phone', '11112', '0.00', '0.00', '300.00', 3, 0, 1, 0, ''),
(20, '20161226132551191', 11, 11, 1482729951, 21, 2104, 0, '浦东新区永泰路77号', '11.22', '', '', '联系人', '02160455175', '300.00', '300.00', '0.00', '2016-12-09', 4, '', '1,1,1', 90, '', '', 'huizhi', '原订单ID:19', '0.00', '0.00', '0.00', 0, 0, 1, 0, ''),
(21, '20161226132917498', 11, 11, 1482730157, 21, 2104, 0, '浦东新区永泰路77号', '11.22', '', '', '联系人', '02160455175', '300.00', '300.00', '0.00', '2016-12-09', 4, '', '1,1,1', 90, '复制订单，原订单:20', '', 'huizhi', '原订单ID:20', '0.00', '0.00', '0.00', 0, 0, 1, 0, ''),
(22, '20161226205836772', 11, 11, 1482757116, 21, 2104, 0, '浦东新区永泰路77号', '11.22', '', '', '联系人', '02160455175', '300.00', '300.00', '0.00', '2016-12-09', 4, '', '1,1,1', 90, '复制订单，原订单:20', '', 'huizhi', '原订单ID:20', '0.00', '0.00', '0.00', 0, 0, 1, 0, ''),
(23, '20161226205932809', 11, 11, 1482757172, 21, 2104, 0, '浦东新区永泰路77号', '11.22', '', '', '联系人', '02160455175', '300.00', '300.00', '0.00', '2016-12-09', 4, '', '1,1,1', 90, '复制订单，原订单:19', '', 'huizhi', '原订单ID:19', '0.00', '0.00', '0.00', 0, 0, 1, 0, ''),
(24, '20161226214931385', 11, 12, 1482760171, 21, 2101, 0, '2222 ggg', '11.22', '', '', '2222', '2222', '200.00', '140.00', '0.00', '2016-11-30', 1, '', '1,1,1', 60, 'ddd', '', 'phone', '', '60.00', '60.00', '200.00', 1, 0, 1, 0, ''),
(25, '20161226215029833', 11, 12, 1482760229, 21, 2101, 0, '2222 ggg', '11.22', '', '', '2222', '2222', '200.00', '140.00', '0.00', '', 4, '', '1,1,1', 60, '复制订单，原订单:24', '', 'huizhi', '原订单ID:24', '0.00', '0.00', '0.00', 0, 0, 1, 0, ''),
(26, '20161227131135477', 90, 12, 1482815495, 21, 2101, 0, '2222', '11.22', '', '', '2222 333', '2222', '100.00', '40.00', '0.00', '2016-11-12', 1, '', '', 30, 'ddd\r\n嘎嘎嘎', '', 'phone', '111', '60.00', '60.00', '0.00', 2, 0, 1, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `tbl_order_abnormal`
--

DROP TABLE IF EXISTS `tbl_order_abnormal`;
CREATE TABLE `tbl_order_abnormal` (
  `id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL DEFAULT '0',
  `content` varchar(1024) NOT NULL,
  `evt_type` int(10) NOT NULL DEFAULT '0' COMMENT '0:发起 1:处理中 2:结束',
  `status` int(10) NOT NULL DEFAULT '0',
  `response` varchar(255) NOT NULL,
  `date_created` int(10) NOT NULL DEFAULT '0',
  `date_response` int(10) NOT NULL DEFAULT '0',
  `kefu_uid` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tbl_order_abnormal`
--

INSERT INTO `tbl_order_abnormal` (`id`, `order_id`, `content`, `evt_type`, `status`, `response`, `date_created`, `date_response`, `kefu_uid`) VALUES
(1, 1, '222', 0, 1, '1', 1482821139, 0, 1),
(2, 1, '111', 1, 1, '111', 1482821700, 0, 1),
(3, 24, 'ddd', 0, 0, '', 1482822239, 0, 0),
(4, 24, 'dddd', 0, 0, '', 1482822308, 0, 100);

-- --------------------------------------------------------

--
-- 表的结构 `tbl_order_item`
--

DROP TABLE IF EXISTS `tbl_order_item`;
CREATE TABLE `tbl_order_item` (
  `id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `serial_no` varchar(255) NOT NULL,
  `product_num` int(10) NOT NULL,
  `product_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `brand_id` int(10) NOT NULL DEFAULT '0' COMMENT '这是什么品牌的',
  `sku_id` int(10) NOT NULL DEFAULT '0' COMMENT '这是什么主SKU',
  `timeinfo_id` int(10) NOT NULL DEFAULT '0' COMMENT '上午，下午，晚上，全天',
  `total_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `total_minutes` int(10) NOT NULL DEFAULT '0',
  `status` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tbl_order_item`
--

INSERT INTO `tbl_order_item` (`id`, `order_id`, `product_id`, `serial_no`, `product_num`, `product_price`, `brand_id`, `sku_id`, `timeinfo_id`, `total_price`, `total_minutes`, `status`) VALUES
(1, 1, 1, '', 1, '10.00', 1, 1, 3, '100.00', 30, 0),
(2, 9, 2, '', 3, '20.00', 1, 1, 2, '50.00', 60, 0),
(3, 9, 5, '', 2, '20.00', 1, 1, 2, '40.00', 50, 0),
(4, 11, 5, '', 5, '100.00', 1, 4, 0, '150.00', 110, 0),
(5, 11, 2, '', 4, '30.00', 1, 2, 0, '30.00', 60, 0),
(6, 16, 2, '', 1, '100.00', 1, 2, 1, '100.00', 80, 0),
(7, 16, 2, '', 2, '10.00', 1, 3, 1, '20.00', 30, 0),
(8, 17, 2, '', 2, '90.00', 1, 2, 1, '180.00', 100, 0),
(9, 18, 2, '', 1, '100.00', 1, 2, 1, '100.00', 80, 0),
(10, 18, 2, '', 2, '10.00', 1, 3, 1, '20.00', 30, 0),
(11, 19, 5, '', 3, '100.00', 1, 4, 4, '300.00', 90, 0),
(12, 19, 5, '', 3, '100.00', 1, 4, 4, '300.00', 90, 0),
(13, 23, 5, '', 3, '100.00', 1, 4, 4, '300.00', 90, 0),
(14, 23, 5, '', 3, '100.00', 1, 4, 4, '300.00', 90, 0),
(15, 24, 5, '', 2, '100.00', 1, 4, 1, '200.00', 60, 0),
(16, 25, 5, '', 2, '100.00', 1, 4, 1, '200.00', 60, 0),
(17, 26, 5, '', 1, '100.00', 1, 4, 1, '100.00', 30, 0);

-- --------------------------------------------------------

--
-- 表的结构 `tbl_order_log`
--

DROP TABLE IF EXISTS `tbl_order_log`;
CREATE TABLE `tbl_order_log` (
  `id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL DEFAULT '0',
  `event_cat` enum('info','danger','warning') NOT NULL COMMENT '事件等级,danger,warning的要及时通知到客服',
  `event` varchar(255) NOT NULL,
  `event_data` varchar(255) NOT NULL,
  `date_created` int(10) NOT NULL DEFAULT '0',
  `customer_id` int(10) NOT NULL DEFAULT '0',
  `shifu_id` int(10) NOT NULL DEFAULT '0',
  `kefu_id` int(10) NOT NULL DEFAULT '0',
  `reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tbl_order_log`
--

INSERT INTO `tbl_order_log` (`id`, `order_id`, `event_cat`, `event`, `event_data`, `date_created`, `customer_id`, `shifu_id`, `kefu_id`, `reason`) VALUES
(1, 1, 'info', '111 33', '11', 0, 0, 1, 1, ''),
(2, 2, 'info', '111 33', '11', 1480410262, 0, 0, 1, ''),
(3, 17, '', '|SKU:2,原数量:2,修改数量为:2|SKU:3,原数量:2,修改数量为:1', '', 1482464963, 8, 0, 100, ''),
(4, 17, 'info', '|SKU:2,原数量:2,修改数量为:2|删除了SKU:3', '', 1482465080, 8, 0, 100, ''),
(5, 17, 'info', '|SKU:2,原数量:2,修改数量为:2|新增了SKU:3,数量:3', '', 1482465324, 8, 0, 100, ''),
(6, 17, 'info', '|SKU:2,原数量:2,修改数量为:2|删除了SKU:3', '', 1482465348, 8, 0, 100, ''),
(7, 17, 'info', '|SKU:2,原数量:2,修改数量为:2', '', 1482465617, 8, 0, 100, ''),
(8, 17, 'info', '', '', 1482471062, 8, 0, 100, ''),
(9, 17, 'info', '', '', 1482471514, 8, 0, 100, ''),
(10, 17, 'info', '', '', 1482472950, 8, 0, 100, ''),
(11, 17, 'info', '', '', 1482472982, 8, 0, 100, ''),
(12, 17, 'info', '', '', 1482476451, 8, 0, 100, ''),
(13, 17, 'info', '', '', 1482477874, 8, 0, 100, ''),
(14, 18, 'info', '', '', 1482646559, 11, 0, 100, ''),
(15, 18, 'info', '', '', 1482646561, 11, 0, 100, ''),
(16, 18, 'info', '', '', 1482646568, 11, 0, 100, ''),
(17, 19, 'info', '', '', 1482648850, 11, 0, 100, ''),
(18, 19, 'info', '', '', 1482652342, 11, 0, 100, ''),
(19, 19, 'info', '', '', 1482653449, 11, 0, 100, ''),
(20, 20, 'info', '拷贝订单，原来订单ID:19', '', 1482729951, 11, 0, 100, ''),
(21, 21, 'info', '拷贝订单，原来订单ID:20', '', 1482730158, 11, 0, 100, ''),
(22, 22, 'info', '拷贝订单，原来订单ID:20', '', 1482757117, 11, 0, 0, ''),
(23, 23, 'info', '拷贝订单，原来订单ID:19', '', 1482757173, 11, 0, 0, ''),
(24, 24, 'info', '待收款额由:200.00,变为:140', '', 1482760209, 12, 0, 0, ''),
(25, 25, 'info', '拷贝订单，原来订单ID:24', '', 1482760229, 12, 0, 0, ''),
(26, 26, 'info', '拷贝订单，原来订单ID:24', '', 1482815495, 12, 0, 100, ''),
(27, 26, 'info', 'SKU:4,原数量:2,修改数量为:1|订单总额由:200.00,变为:100|待收款额由:140.00,变为:40', '', 1482815598, 12, 0, 100, ''),
(28, 26, 'info', '', '', 1482818240, 12, 0, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `tbl_payment`
--

DROP TABLE IF EXISTS `tbl_payment`;
CREATE TABLE `tbl_payment` (
  `id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `amount` decimal(10,2) NOT NULL COMMENT '支付金额',
  `pay_way` enum('wxpay','alipay','yue','daifu','jifen','quan') NOT NULL DEFAULT 'wxpay' COMMENT '支付方式',
  `payment_data` text NOT NULL COMMENT '第三方支付的详细信息',
  `date_created` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tbl_payment`
--

INSERT INTO `tbl_payment` (`id`, `order_id`, `amount`, `pay_way`, `payment_data`, `date_created`) VALUES
(1, 1, '100.00', 'quan', '111', 1480411050);

-- --------------------------------------------------------

--
-- 表的结构 `tbl_post`
--

DROP TABLE IF EXISTS `tbl_post`;
CREATE TABLE `tbl_post` (
  `id` int(10) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `logo`, `title`, `content`) VALUES
(1, '/upload/image/20161118/20161118065029_14441.jpg', '11', '<p>\r\n	11fff\r\n</p>\r\n<p>\r\n	???\r\n</p>\r\n<p>\r\n	<img alt="" src="/upload/image/20161118/20161118065104_49006.jpg" />\r\n</p>'),
(2, '/upload/image/20161118/20161118045512_66703.jpg', 'aaa', '<p>\r\n	nnn rrrr  hh ggg\r\n</p>\r\n<p>\r\n	<img alt="" src="/upload/image/20161118/20161118044537_74346.jpg" /> \r\n</p>');

-- --------------------------------------------------------

--
-- 表的结构 `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE `tbl_product` (
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `line_id` int(10) NOT NULL DEFAULT '0' COMMENT '产品线ID',
  `city_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL COMMENT '类别',
  `content` text NOT NULL COMMENT '装备工具',
  `icon` varchar(255) NOT NULL DEFAULT '',
  `logo` varchar(255) NOT NULL,
  `bigimage` varchar(255) NOT NULL DEFAULT '',
  `old_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '原价',
  `price` decimal(10,2) NOT NULL,
  `date_created` int(10) NOT NULL DEFAULT '0',
  `status` int(10) NOT NULL DEFAULT '1' COMMENT '0:隐藏 1:上架 ',
  `brand_list` varchar(1024) NOT NULL DEFAULT '' COMMENT '1|2|3|4',
  `sku_list` varchar(1024) NOT NULL DEFAULT '' COMMENT '输入格式:1:单门:100:60|2:双门:200:90|3:三门:250:100',
  `time_list` varchar(255) NOT NULL COMMENT '1:上午:1|2:下午:1|3:晚上:1 |4:任意:0.9',
  `quality_desc` varchar(4096) NOT NULL COMMENT '质保说明',
  `process_desc` varchar(4096) NOT NULL COMMENT '处理流程',
  `price_desc` varchar(1024) NOT NULL COMMENT '价格说明',
  `sort` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `title`, `line_id`, `city_id`, `cat_id`, `content`, `icon`, `logo`, `bigimage`, `old_price`, `price`, `date_created`, `status`, `brand_list`, `sku_list`, `time_list`, `quality_desc`, `process_desc`, `price_desc`, `sort`) VALUES
(2, '油烟机', 2, 21, 1, '<div>\r\n	油烟机<img alt="" src="/upload/image/20161118/20161118045512_66703.jpg" /> \r\n</div>', '', '/upload/image/20161129/20161129090023_49847.jpg', '', '100.00', '90.00', 1480406465, 1, '1:格力|2:海尔|3:海信', '1|2|3', '1|1|1|1', '', '', '', 0),
(3, '油烟机2', 1, 21, 1, '<p>\r\n	ddddbsdadgda\r\n</p>\r\n<p>\r\n	ggg1\r\n</p>\r\n<p>\r\n	谔谔谔谔\r\n</p>', '', '/upload/image/20161215/20161215083800_84880.jpg', '', '100.00', '90.00', 0, 1, '', '', '', '<img alt="" src="/upload/image/20161128/20161128100736_97626.jpg" />', '谔谔', '<img alt="" src="/upload/image/20161215/20161215085042_26839.jpg" />', 0),
(4, '电冰箱', 1, 21, 1, '', '', '', '', '100.00', '90.00', 1481098632, 1, '', '1:单门:100:60:10|2:双门:200:90:20|3:三口:250:150:20', '', '', '', '', 0),
(5, '地暖', 1, 21, 2, '<div>\r\n	装备工具\r\n	<div>\r\n		装备工具\r\n	</div>\r\n	<div>\r\n		装备工具\r\n	</div>\r\n	<div>\r\n		装备工具\r\n	</div>\r\n	<div>\r\n		装备工具\r\n	</div>\r\n	<div>\r\n		装备工具\r\n	</div>\r\n	<div>\r\n		装备工具\r\n	</div>\r\n	<div>\r\n		装备工具\r\n	</div>\r\n</div>', '', '/upload/image/20161220/20161220035242_47971.jpg', '', '100.00', '90.00', 1482202419, 1, '', '', '', '烦烦烦', '呃呃呃', '呃呃呃', 0);

-- --------------------------------------------------------

--
-- 表的结构 `tbl_refund`
--

DROP TABLE IF EXISTS `tbl_refund`;
CREATE TABLE `tbl_refund` (
  `id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `old_amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '退款发生前的总额',
  `final_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `refund_amount` decimal(10,2) NOT NULL,
  `status` int(10) NOT NULL DEFAULT '0',
  `date_created` int(10) NOT NULL,
  `date_refund` int(10) NOT NULL DEFAULT '0',
  `kefu_uid` int(10) NOT NULL DEFAULT '0' COMMENT '最后一次操作的客服'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_review`
--

DROP TABLE IF EXISTS `tbl_review`;
CREATE TABLE `tbl_review` (
  `id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `score` int(10) NOT NULL COMMENT '综合评分',
  `ontime` int(10) NOT NULL DEFAULT '1' COMMENT '是否准时',
  `cloth` int(10) NOT NULL DEFAULT '1' COMMENT '衣服着装整洁',
  `intro` int(10) NOT NULL DEFAULT '1' COMMENT '是否介绍了我们的服务',
  `clean` int(10) NOT NULL DEFAULT '1' COMMENT '是否清理干净',
  `content` text NOT NULL COMMENT '评价内容',
  `date_created` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tbl_review`
--

INSERT INTO `tbl_review` (`id`, `order_id`, `score`, `ontime`, `cloth`, `intro`, `clean`, `content`, `date_created`) VALUES
(1, 1, 5, 1, 1, 1, 1, '222', 1480487435);

-- --------------------------------------------------------

--
-- 表的结构 `tbl_shifu`
--

DROP TABLE IF EXISTS `tbl_shifu`;
CREATE TABLE `tbl_shifu` (
  `id` int(10) NOT NULL,
  `mobile` varchar(32) NOT NULL COMMENT '手机',
  `password` varchar(64) NOT NULL DEFAULT '',
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '名字',
  `sex` char(1) NOT NULL COMMENT '性别:1男2:女',
  `idcard` varchar(32) NOT NULL DEFAULT '' COMMENT '身份证',
  `birthday` date DEFAULT NULL COMMENT '出生年月',
  `city` int(11) DEFAULT '1' COMMENT '城市',
  `zone` varchar(32) NOT NULL DEFAULT '' COMMENT '区块',
  `address` varchar(255) NOT NULL DEFAULT '' COMMENT '详细地址',
  `service_zone` int(10) NOT NULL DEFAULT '0',
  `skills_all` varchar(255) NOT NULL DEFAULT '' COMMENT '会的业务类别',
  `skills` varchar(255) NOT NULL DEFAULT '' COMMENT '可派的产品线',
  `work_status` int(10) NOT NULL DEFAULT '1' COMMENT '上班状态',
  `total_jobs` int(10) NOT NULL DEFAULT '0' COMMENT '一共多少单',
  `avg_score` int(10) DEFAULT '0' COMMENT '用户评价的平均值',
  `avg_ontime` int(10) NOT NULL DEFAULT '0' COMMENT '是否准时上门的平均值',
  `avg_cloth` int(10) NOT NULL DEFAULT '0' COMMENT '服装是否整洁的平均值',
  `avg_intro` int(10) NOT NULL DEFAULT '0' COMMENT '是否向用户解决了我们的业务流程，平均值',
  `avg_clean` int(10) NOT NULL DEFAULT '0' COMMENT '保养是否干净的平均值',
  `date_created` int(10) NOT NULL DEFAULT '0' COMMENT '生成本记录的时间戳',
  `join_date` date NOT NULL COMMENT '加入日期',
  `leave_date` date NOT NULL COMMENT '离职日期',
  `geohash` varchar(32) NOT NULL DEFAULT '',
  `latitude` varchar(32) NOT NULL DEFAULT '',
  `longitude` varchar(32) NOT NULL DEFAULT '',
  `sf_type` char(1) NOT NULL DEFAULT '1' COMMENT '1:师傅 0:学徒'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tbl_shifu`
--

INSERT INTO `tbl_shifu` (`id`, `mobile`, `password`, `name`, `sex`, `idcard`, `birthday`, `city`, `zone`, `address`, `service_zone`, `skills_all`, `skills`, `work_status`, `total_jobs`, `avg_score`, `avg_ontime`, `avg_cloth`, `avg_intro`, `avg_clean`, `date_created`, `join_date`, `leave_date`, `geohash`, `latitude`, `longitude`, `sf_type`) VALUES
(1, '15821510000', '111', 'yang1', '1', '11122222', '1970-11-11', 21, '2107', '青浦区定山湖1111号', 0, '', '', 1, 100, 4, 3, 4, 4, 4, 1479720197, '1920-11-11', '1930-11-11', '', '1.2', '3.4', '0');

-- --------------------------------------------------------

--
-- 表的结构 `tbl_shopcart`
--

DROP TABLE IF EXISTS `tbl_shopcart`;
CREATE TABLE `tbl_shopcart` (
  `id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL DEFAULT '0',
  `prod_id` int(10) NOT NULL DEFAULT '0',
  `brand_id` int(10) NOT NULL DEFAULT '0',
  `sku_id` int(10) NOT NULL DEFAULT '0',
  `nums` int(10) NOT NULL DEFAULT '0',
  `date_created` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_sku_list`
--

DROP TABLE IF EXISTS `tbl_sku_list`;
CREATE TABLE `tbl_sku_list` (
  `id` int(10) NOT NULL,
  `prod_id` int(10) NOT NULL DEFAULT '0',
  `name` varchar(32) NOT NULL,
  `base_mins` int(10) NOT NULL,
  `step_mins` int(10) NOT NULL,
  `base_price` decimal(10,2) NOT NULL,
  `step_price` decimal(10,2) NOT NULL,
  `min_nums` int(10) NOT NULL,
  `step_price2` decimal(10,2) NOT NULL DEFAULT '0.00',
  `step_price3` decimal(10,2) NOT NULL DEFAULT '0.00',
  `step_price4` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tbl_sku_list`
--

INSERT INTO `tbl_sku_list` (`id`, `prod_id`, `name`, `base_mins`, `step_mins`, `base_price`, `step_price`, `min_nums`, `step_price2`, `step_price3`, `step_price4`) VALUES
(1, 1, '3回路', 30, 10, '0.00', '20.00', 3, '0.00', '0.00', '0.00'),
(2, 2, '定金', 60, 20, '0.00', '100.00', 1, '95.00', '90.00', '80.00'),
(3, 2, 'SKU 3', 30, 0, '0.00', '10.00', 1, '0.00', '0.00', '0.00'),
(4, 5, 'SKU5', 0, 30, '0.00', '100.00', 3, '0.00', '0.00', '0.00');

-- --------------------------------------------------------

--
-- 表的结构 `tbl_srv_zonelist`
--

DROP TABLE IF EXISTS `tbl_srv_zonelist`;
CREATE TABLE `tbl_srv_zonelist` (
  `id` int(10) NOT NULL,
  `name` varchar(32) NOT NULL COMMENT '第三服务区',
  `addr_list` varchar(1024) NOT NULL DEFAULT '' COMMENT '杨浦，虹口，浦东龙阳，浦东金桥'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_upload`
--

DROP TABLE IF EXISTS `tbl_upload`;
CREATE TABLE `tbl_upload` (
  `id` int(11) NOT NULL,
  `file_url` varchar(255) NOT NULL,
  `date_created` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_assign`
--
ALTER TABLE `tbl_assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_calendar`
--
ALTER TABLE `tbl_calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_calendar_jiedan`
--
ALTER TABLE `tbl_calendar_jiedan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer_addr`
--
ALTER TABLE `tbl_customer_addr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_feedback_later`
--
ALTER TABLE `tbl_feedback_later`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_minutes_resource`
--
ALTER TABLE `tbl_minutes_resource`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_operator_log`
--
ALTER TABLE `tbl_operator_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_no` (`order_no`);

--
-- Indexes for table `tbl_order_abnormal`
--
ALTER TABLE `tbl_order_abnormal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order_item`
--
ALTER TABLE `tbl_order_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order_log`
--
ALTER TABLE `tbl_order_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_refund`
--
ALTER TABLE `tbl_refund`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_shifu`
--
ALTER TABLE `tbl_shifu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_shopcart`
--
ALTER TABLE `tbl_shopcart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sku_list`
--
ALTER TABLE `tbl_sku_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_srv_zonelist`
--
ALTER TABLE `tbl_srv_zonelist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_upload`
--
ALTER TABLE `tbl_upload`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '序号', AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `tbl_assign`
--
ALTER TABLE `tbl_assign`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `tbl_calendar`
--
ALTER TABLE `tbl_calendar`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT COMMENT '序号', AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `tbl_calendar_jiedan`
--
ALTER TABLE `tbl_calendar_jiedan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- 使用表AUTO_INCREMENT `tbl_customer_addr`
--
ALTER TABLE `tbl_customer_addr`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 使用表AUTO_INCREMENT `tbl_feedback_later`
--
ALTER TABLE `tbl_feedback_later`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- 使用表AUTO_INCREMENT `tbl_minutes_resource`
--
ALTER TABLE `tbl_minutes_resource`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `tbl_operator_log`
--
ALTER TABLE `tbl_operator_log`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- 使用表AUTO_INCREMENT `tbl_order_abnormal`
--
ALTER TABLE `tbl_order_abnormal`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `tbl_order_item`
--
ALTER TABLE `tbl_order_item`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- 使用表AUTO_INCREMENT `tbl_order_log`
--
ALTER TABLE `tbl_order_log`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- 使用表AUTO_INCREMENT `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `tbl_refund`
--
ALTER TABLE `tbl_refund`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `tbl_shifu`
--
ALTER TABLE `tbl_shifu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `tbl_shopcart`
--
ALTER TABLE `tbl_shopcart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `tbl_sku_list`
--
ALTER TABLE `tbl_sku_list`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `tbl_srv_zonelist`
--
ALTER TABLE `tbl_srv_zonelist`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `tbl_upload`
--
ALTER TABLE `tbl_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
