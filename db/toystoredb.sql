-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 25, 2022 lúc 04:19 AM
-- Phiên bản máy phục vụ: 10.1.39-MariaDB
-- Phiên bản PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `toystoredb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` char(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `level` tinyint(4) DEFAULT '1',
  `avatar` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `address`, `email`, `password`, `phone`, `status`, `level`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'Lê Minh Hiếu', '116/59 Tô Hiến Thành, P15, Q10', 'hieuzxc00@gmail.com', '805629268846c2b8aae11fee3bfdcdb2', '0359313750', 1, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catagory`
--

CREATE TABLE `catagory` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `images` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `home` tinyint(4) DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `catagory`
--

INSERT INTO `catagory` (`id`, `name`, `slug`, `images`, `banner`, `home`, `status`, `created_at`, `update_at`) VALUES
(22, 'mô hình league of legends', 'mo-hinh-league-of-legends', NULL, NULL, 0, 1, '2019-06-22 05:50:56', '2019-06-25 02:21:54'),
(23, 'Mô hình Onepiece', 'mo-hinh-onepiece', NULL, NULL, 1, 1, '2019-06-22 05:51:05', '2020-06-08 11:45:46'),
(25, 'mô hình naruto', 'mo-hinh-naruto', NULL, NULL, 0, 1, '2019-06-22 17:27:18', '2020-06-08 11:45:55'),
(26, 'mô hình dragon ball', 'mo-hinh-dragon-ball', NULL, NULL, 0, 1, '2019-06-23 04:12:05', '2020-06-08 11:45:56'),
(27, 'mô hình pubg', 'mo-hinh-pubg', NULL, NULL, 0, 1, '2019-06-23 04:12:47', '2019-06-23 04:12:47'),
(28, 'mô hình mavel', 'mo-hinh-mavel', NULL, NULL, 0, 1, '2019-06-23 04:13:12', '2019-06-23 04:13:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` tinyint(4) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `transaction_id`, `product_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 2, 10, 4, 28, NULL, NULL),
(2, 5, 10, 4, 28, NULL, NULL),
(3, 5, 9, 1, 45, NULL, NULL),
(4, 5, 4, 1, 72, NULL, NULL),
(5, 5, 3, 1, 45, NULL, NULL),
(6, 6, 8, 1, 25, NULL, NULL),
(7, 7, 9, 1, 45, '2019-07-02 13:08:12', '2019-07-02 13:08:12'),
(8, 8, 7, 2, 27, '2019-07-03 09:43:03', '2019-07-03 09:43:03'),
(9, 9, 9, 1, 45, '2019-07-13 02:04:37', '2019-07-13 02:04:37'),
(10, 10, 4, 1, 72, '2019-07-16 02:31:14', '2019-07-16 02:31:14'),
(11, 11, 10, 4, 28, '2019-07-16 03:24:15', '2019-07-16 03:24:15'),
(12, 10, 18, 1, 105, '2019-07-24 07:12:12', '2019-07-24 07:12:12'),
(13, 11, 20, 5, 45, '2019-07-24 09:03:57', '2019-07-24 09:03:57'),
(14, 11, 19, 1, 68, '2019-07-24 09:03:57', '2019-07-24 09:03:57'),
(15, 12, 20, 5, 45, '2019-11-27 06:08:09', '2019-11-27 06:08:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `sale` tinyint(4) DEFAULT '0',
  `thunbar` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `catagory_id` int(11) DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `intro` text COLLATE utf8_unicode_ci,
  `number` int(11) DEFAULT '0',
  `head` int(11) DEFAULT '0',
  `view` int(11) DEFAULT '0',
  `hot` tinyint(4) DEFAULT '0',
  `pay` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `price`, `sale`, `thunbar`, `catagory_id`, `content`, `intro`, `number`, `head`, `view`, `hot`, `pay`, `created_at`, `update_at`) VALUES
(3, ' D.Ace', 'dace', 50, 10, '1.1.png', 23, '<p>ace hỏa quyền</p>\r\n', '<p>.....</p>\r\n', 5, 0, 0, 0, 0, '2019-11-27 06:03:38', '2019-11-27 06:03:38'),
(4, 'luffy gear 4 snake', 'luffy-gear-4-snake', 80, 10, '3.1.jpg', 23, 'tuyệt vời', NULL, 11, 0, 0, 0, 1, '2019-07-24 07:14:02', '2019-07-24 07:14:02'),
(7, 'Kid', 'kid', 30, 10, '15.4.jpg', 23, 'kid', NULL, 18, 0, 0, 0, 1, '2019-07-03 09:43:16', '2019-07-03 09:43:16'),
(8, 'Tứ Hoàng Râu Trắng', 'tu-hoang-rau-trang', 25, 0, '16.2.jpg', 23, 'Edward Newgate', NULL, 17, 0, 0, 0, 0, '2019-07-03 09:30:44', '2019-07-03 09:30:44'),
(9, 'Minato', 'minato', 45, 0, '30.1.jpg', 25, '<p>ok</p>\r\n', '<p>..</p>\r\n', 100, 0, 0, 0, 1, '2019-07-22 06:21:12', '2019-07-22 06:21:12'),
(10, 'Gold D.Luffy', 'gold-dluffy', 28, 0, '10.1.jpg', 23, '<p>yes</p>\r\n', '<p><strong>Joker Face là shop hàng đầu trong lĩnh vực Manga - Anime.</strong></p>\r\n\r\n<p><strong>N</strong>ếu là một fan ruột của Manga-Anime thì bạn không thể không đến với shop, bạn có thể tìm thấy cho mình những nhân vật manga mà từ thời bé xíu đã gắn bó với bạn qua những tập truyện tranh như mèo máy Đoraemon, hay thám từ lừng danh Conan đến người máy Arale nghịch ngợm cùng 2 nhóc Boco và cũng ko thể bỏ qua những nhân vật nổi tiếng trong truyện OnePiece, Dragon Ball và còn rất nhiều những nhân vật trong truyện khác như Gintama, Naruto, hay Anime đang rất hot là Tokyo Ghoul, SAO, Date A Live..v…v.<br />\r\n<strong>C</strong>òn nếu bạn là fan ruột của những thước phim hoạt hình Pixar, Disney: ToyStory, Incredible, Wall-e, Ice Age,… hay những bộ phim Hollywood bom tấn như Batman, Avenger, Ironman, Hulk,.. thì bạn cũng không thể bỏ qua<br />\r\n<strong>B</strong>ạn thích <a href=\"http://muare.vn/categories/an-choi-giai-tri.72/\">chơi</a> <a href=\"http://muare.vn/forums/ha-noi/games-thiet-bi-games-vat-pham.27/\">game</a> ư và bạn chưa bỏ qua một <a href=\"http://muare.vn/forums/ha-noi/games-thiet-bi-games-vat-pham.27/\">game</a> hot nào vậy bạn có muốn những nhân vật trong <a href=\"http://muare.vn/forums/ha-noi/games-thiet-bi-games-vat-pham.27/\">game</a> đó được bày ở một góc trong phòng bạn không, hãy đến với Joker Face Shop. Sẽ có đầy đủ các nhân vật <a href=\"http://muare.vn/forums/ha-noi/games-thiet-bi-games-vat-pham.27/\">game</a> như LOL, Dota2, God Of War, Assassin Credd, Mortal Combat.. cho các bạn lựa chọn.<br />\r\n<strong>B</strong>ạn đang đắn đo suy nghĩ ko biết tặng gì cho bạn bè, người thân và người yêu mỗi khi đến dịp sinh nhật cũng như những ngày kỉ niệm..vậy chần chừ gì nữa hãy đến với Joker Face Shop, thế giới đồ lưu niệm, <a href=\"http://muare.vn/forums/ha-noi/hoa-qua-tang-do-trang-tri.26/\">quà tặng</a>, mô hình manga,gấu bông xinh xắn đang chờ các bạn..<br />\r\n </p>\r\n\r\n<p>Mời các bạn Like shop tại địa chỉ Facebook: <a href=\"https://www.facebook.com/jokerface.vn\">https://www.facebook.com/jokerface.vn</a> để cập nhật hàng mới nhanh nhất.</p>\r\n\r\n<p>Hoặc ghé qua Show Room của Shop tại: <strong>Số 1 ngõ 575/22/14 Kim Mã, Ba Đình, Hà Nội (Các bạn đi vào ngách 575/22 Kim mã là thấy ngay, có chỗ để ô tô)</strong>. Nhận ship hàng miễn phí trong nội thành Hà Nội (bán kính 2km) (áp dụng với đơn hàng trên 200.000).</p>\r\n\r\n<p><strong>Với các đơn hàng trên website shop sẽ gọi điện xác nhận đơn hàng và báo phí ship cho khách hàng,hàng sẽ được khi sau khi khách đồng ý với phí ship.</strong></p>\r\n\r\n<p><strong>Ship hàng COD toàn quốc</strong>, chuyển phát nhanh phí hợp lý.</p>\r\n\r\n<p>Chúng tôi chuyên về các loại mặt hàng mô hình - figure, nendoroid.</p>\r\n', -2, 0, 0, 0, 1, '2019-07-24 09:05:05', '2019-07-24 09:05:05'),
(13, 'Đấng ', 'dang', 80, 30, '60.1.jpg', 22, '<p>Chất Liệu: Nhựa PVC cao cấp bền màu</p>\r\n\r\n<p>Chiều cao: 20cm</p>\r\n\r\n<p><img alt=\"\" src=\"C:\\xampp\\htdocs\\projectphp\\public\\uploads\\product\\60.1.jpg\" /></p>\r\n', '<p><strong>MaxShop là shop hàng đầu trong lĩnh vực Manga - Anime.</strong></p>\r\n\r\n<p><strong>N</strong>ếu là một fan ruột của Manga-Anime thì bạn không thể không đến với shop, bạn có thể tìm thấy cho mình những nhân vật manga mà từ thời bé xíu đã gắn bó với bạn qua những tập truyện tranh như mèo máy Đoraemon, hay thám từ lừng danh Conan đến người máy Arale nghịch ngợm cùng 2 nhóc Boco và cũng ko thể bỏ qua những nhân vật nổi tiếng trong truyện OnePiece, Dragon Ball và còn rất nhiều những nhân vật trong truyện khác như Gintama, Naruto, hay Anime đang rất hot là Tokyo Ghoul, SAO, Date A Live..v…v.<br />\r\n<strong>C</strong>òn nếu bạn là fan ruột của những thước phim hoạt hình Pixar, Disney: ToyStory, Incredible, Wall-e, Ice Age,… hay những bộ phim Hollywood bom tấn như Batman, Avenger, Ironman, Hulk,.. thì bạn cũng không thể bỏ qua<br />\r\n<strong>B</strong>ạn thích <a href=\"http://muare.vn/categories/an-choi-giai-tri.72/\">chơi</a> <a href=\"http://muare.vn/forums/ha-noi/games-thiet-bi-games-vat-pham.27/\">game</a> ư và bạn chưa bỏ qua một <a href=\"http://muare.vn/forums/ha-noi/games-thiet-bi-games-vat-pham.27/\">game</a> hot nào vậy bạn có muốn những nhân vật trong <a href=\"http://muare.vn/forums/ha-noi/games-thiet-bi-games-vat-pham.27/\">game</a> đó được bày ở một góc trong phòng bạn không, hãy đến với Joker Face Shop. Sẽ có đầy đủ các nhân vật <a href=\"http://muare.vn/forums/ha-noi/games-thiet-bi-games-vat-pham.27/\">game</a> như LOL, Dota2, God Of War, Assassin Credd, Mortal Combat.. cho các bạn lựa chọn.<br />\r\n<strong>B</strong>ạn đang đắn đo suy nghĩ ko biết tặng gì cho bạn bè, người thân và người yêu mỗi khi đến dịp sinh nhật cũng như những ngày kỉ niệm..vậy chần chừ gì nữa hãy đến với Joker Face Shop, thế giới đồ lưu niệm, <a href=\"http://muare.vn/forums/ha-noi/hoa-qua-tang-do-trang-tri.26/\">quà tặng</a>, mô hình manga,gấu bông xinh xắn đang chờ các bạn..</p>\r\n', 20, 0, 0, 0, 0, '2019-11-27 06:04:14', '2019-11-27 06:04:14'),
(14, 'Yiraiya', 'yiraiya', 65, 50, '31.2.jpg', 25, '<p>Chất Liệu: Nhựa PVC cao cấp bền màu</p>\r\n\r\n<p>Chiều cao: 20cm</p>\r\n', '<p><strong>MaxShop là shop hàng đầu trong lĩnh vực Manga - Anime.</strong></p>\r\n\r\n<p><strong>N</strong>ếu là một fan ruột của Manga-Anime thì bạn không thể không đến với shop, bạn có thể tìm thấy cho mình những nhân vật manga mà từ thời bé xíu đã gắn bó với bạn qua những tập truyện tranh như mèo máy Đoraemon, hay thám từ lừng danh Conan đến người máy Arale nghịch ngợm cùng 2 nhóc Boco và cũng ko thể bỏ qua những nhân vật nổi tiếng trong truyện OnePiece, Dragon Ball và còn rất nhiều những nhân vật trong truyện khác như Gintama, Naruto, hay Anime đang rất hot là Tokyo Ghoul, SAO, Date A Live..v…v.<br />\r\n<strong>C</strong>òn nếu bạn là fan ruột của những thước phim hoạt hình Pixar, Disney: ToyStory, Incredible, Wall-e, Ice Age,… hay những bộ phim Hollywood bom tấn như Batman, Avenger, Ironman, Hulk,.. thì bạn cũng không thể bỏ qua<br />\r\n<strong>B</strong>ạn thích <a href=\"http://muare.vn/categories/an-choi-giai-tri.72/\">chơi</a> <a href=\"http://muare.vn/forums/ha-noi/games-thiet-bi-games-vat-pham.27/\">game</a> ư và bạn chưa bỏ qua một <a href=\"http://muare.vn/forums/ha-noi/games-thiet-bi-games-vat-pham.27/\">game</a> hot nào vậy bạn có muốn những nhân vật trong <a href=\"http://muare.vn/forums/ha-noi/games-thiet-bi-games-vat-pham.27/\">game</a> đó được bày ở một góc trong phòng bạn không, hãy đến với Joker Face Shop. Sẽ có đầy đủ các nhân vật <a href=\"http://muare.vn/forums/ha-noi/games-thiet-bi-games-vat-pham.27/\">game</a> như LOL, Dota2, God Of War, Assassin Credd, Mortal Combat.. cho các bạn lựa chọn.<br />\r\n<strong>B</strong>ạn đang đắn đo suy nghĩ ko biết tặng gì cho bạn bè, người thân và người yêu mỗi khi đến dịp sinh nhật cũng như những ngày kỉ niệm..vậy chần chừ gì nữa hãy đến với Joker Face Shop, thế giới đồ lưu niệm, <a href=\"http://muare.vn/forums/ha-noi/hoa-qua-tang-do-trang-tri.26/\">quà tặng</a>, mô hình manga,gấu bông xinh xắn đang chờ các bạn..</p>\r\n', 25, 0, 0, 0, 0, '2019-07-24 06:11:48', '2019-07-24 06:11:48'),
(15, 'Mô hình majin buu nữ', 'mo-hinh-majin-buu-nu', 100, 25, '50.1.jpg', 26, '<p>Chất Liệu: Nhựa PVC cao cấp bền màu</p>\r\n\r\n<p>Chiều cao: 20cm</p>\r\n', '<p><strong>MaxShop là shop hàng đầu trong lĩnh vực Manga - Anime.</strong></p>\r\n\r\n<p><strong>N</strong>ếu là một fan ruột của Manga-Anime thì bạn không thể không đến với shop, bạn có thể tìm thấy cho mình những nhân vật manga mà từ thời bé xíu đã gắn bó với bạn qua những tập truyện tranh như mèo máy Đoraemon, hay thám từ lừng danh Conan đến người máy Arale nghịch ngợm cùng 2 nhóc Boco và cũng ko thể bỏ qua những nhân vật nổi tiếng trong truyện OnePiece, Dragon Ball và còn rất nhiều những nhân vật trong truyện khác như Gintama, Naruto, hay Anime đang rất hot là Tokyo Ghoul, SAO, Date A Live..v…v.<br />\r\n<strong>C</strong>òn nếu bạn là fan ruột của những thước phim hoạt hình Pixar, Disney: ToyStory, Incredible, Wall-e, Ice Age,… hay những bộ phim Hollywood bom tấn như Batman, Avenger, Ironman, Hulk,.. thì bạn cũng không thể bỏ qua<br />\r\n<strong>B</strong>ạn thích <a href=\"http://muare.vn/categories/an-choi-giai-tri.72/\">chơi</a> <a href=\"http://muare.vn/forums/ha-noi/games-thiet-bi-games-vat-pham.27/\">game</a> ư và bạn chưa bỏ qua một <a href=\"http://muare.vn/forums/ha-noi/games-thiet-bi-games-vat-pham.27/\">game</a> hot nào vậy bạn có muốn những nhân vật trong <a href=\"http://muare.vn/forums/ha-noi/games-thiet-bi-games-vat-pham.27/\">game</a> đó được bày ở một góc trong phòng bạn không, hãy đến với Joker Face Shop. Sẽ có đầy đủ các nhân vật <a href=\"http://muare.vn/forums/ha-noi/games-thiet-bi-games-vat-pham.27/\">game</a> như LOL, Dota2, God Of War, Assassin Credd, Mortal Combat.. cho các bạn lựa chọn.<br />\r\n<strong>B</strong>ạn đang đắn đo suy nghĩ ko biết tặng gì cho bạn bè, người thân và người yêu mỗi khi đến dịp sinh nhật cũng như những ngày kỉ niệm..vậy chần chừ gì nữa hãy đến với Joker Face Shop, thế giới đồ lưu niệm, <a href=\"http://muare.vn/forums/ha-noi/hoa-qua-tang-do-trang-tri.26/\">quà tặng</a>, mô hình manga,gấu bông xinh xắn đang chờ các bạn..</p>\r\n', 50, 0, 0, 0, 0, '2019-07-24 06:12:09', '2019-07-24 06:12:09'),
(16, 'Nhân vật PUBG', 'nhan-vat-pubg', 36, 20, '70.1.jpg', 27, '<p>Chất Liệu: Nhựa PVC cao cấp bền màu</p>\r\n\r\n<p>Chiều cao: 20cm</p>\r\n', '<p><strong>MaxShop là shop hàng đầu trong lĩnh vực Manga - Anime.</strong></p>\r\n\r\n<p><strong>N</strong>ếu là một fan ruột của Manga-Anime thì bạn không thể không đến với shop, bạn có thể tìm thấy cho mình những nhân vật manga mà từ thời bé xíu đã gắn bó với bạn qua những tập truyện tranh như mèo máy Đoraemon, hay thám từ lừng danh Conan đến người máy Arale nghịch ngợm cùng 2 nhóc Boco và cũng ko thể bỏ qua những nhân vật nổi tiếng trong truyện OnePiece, Dragon Ball và còn rất nhiều những nhân vật trong truyện khác như Gintama, Naruto, hay Anime đang rất hot là Tokyo Ghoul, SAO, Date A Live..v…v.<br />\r\n<strong>C</strong>òn nếu bạn là fan ruột của những thước phim hoạt hình Pixar, Disney: ToyStory, Incredible, Wall-e, Ice Age,… hay những bộ phim Hollywood bom tấn như Batman, Avenger, Ironman, Hulk,.. thì bạn cũng không thể bỏ qua<br />\r\n<strong>B</strong>ạn thích <a href=\"http://muare.vn/categories/an-choi-giai-tri.72/\">chơi</a> <a href=\"http://muare.vn/forums/ha-noi/games-thiet-bi-games-vat-pham.27/\">game</a> ư và bạn chưa bỏ qua một <a href=\"http://muare.vn/forums/ha-noi/games-thiet-bi-games-vat-pham.27/\">game</a> hot nào vậy bạn có muốn những nhân vật trong <a href=\"http://muare.vn/forums/ha-noi/games-thiet-bi-games-vat-pham.27/\">game</a> đó được bày ở một góc trong phòng bạn không, hãy đến với Joker Face Shop. Sẽ có đầy đủ các nhân vật <a href=\"http://muare.vn/forums/ha-noi/games-thiet-bi-games-vat-pham.27/\">game</a> như LOL, Dota2, God Of War, Assassin Credd, Mortal Combat.. cho các bạn lựa chọn.<br />\r\n<strong>B</strong>ạn đang đắn đo suy nghĩ ko biết tặng gì cho bạn bè, người thân và người yêu mỗi khi đến dịp sinh nhật cũng như những ngày kỉ niệm..vậy chần chừ gì nữa hãy đến với Joker Face Shop, thế giới đồ lưu niệm, <a href=\"http://muare.vn/forums/ha-noi/hoa-qua-tang-do-trang-tri.26/\">quà tặng</a>, mô hình manga,gấu bông xinh xắn đang chờ các bạn..</p>\r\n', 20, 0, 0, 0, 0, '2019-07-24 06:11:57', '2019-07-24 06:11:57'),
(17, 'Combo 6 ironman', 'combo-6-ironman', 120, 10, '80.1.jpg', 28, '<p>Chất Liệu: Nhựa PVC cao cấp bền màu</p>\r\n\r\n<p>Chiều cao: 20cm</p>\r\n', '<p><strong>MaxShop là shop hàng đầu trong lĩnh vực Manga - Anime.</strong></p>\r\n\r\n<p><strong>N</strong>ếu là một fan ruột của Manga-Anime thì bạn không thể không đến với shop, bạn có thể tìm thấy cho mình những nhân vật manga mà từ thời bé xíu đã gắn bó với bạn qua những tập truyện tranh như mèo máy Đoraemon, hay thám từ lừng danh Conan đến người máy Arale nghịch ngợm cùng 2 nhóc Boco và cũng ko thể bỏ qua những nhân vật nổi tiếng trong truyện OnePiece, Dragon Ball và còn rất nhiều những nhân vật trong truyện khác như Gintama, Naruto, hay Anime đang rất hot là Tokyo Ghoul, SAO, Date A Live..v…v.<br />\r\n<strong>C</strong>òn nếu bạn là fan ruột của những thước phim hoạt hình Pixar, Disney: ToyStory, Incredible, Wall-e, Ice Age,… hay những bộ phim Hollywood bom tấn như Batman, Avenger, Ironman, Hulk,.. thì bạn cũng không thể bỏ qua<br />\r\n<strong>B</strong>ạn thích <a href=\"http://muare.vn/categories/an-choi-giai-tri.72/\">chơi</a> <a href=\"http://muare.vn/forums/ha-noi/games-thiet-bi-games-vat-pham.27/\">game</a> ư và bạn chưa bỏ qua một <a href=\"http://muare.vn/forums/ha-noi/games-thiet-bi-games-vat-pham.27/\">game</a> hot nào vậy bạn có muốn những nhân vật trong <a href=\"http://muare.vn/forums/ha-noi/games-thiet-bi-games-vat-pham.27/\">game</a> đó được bày ở một góc trong phòng bạn không, hãy đến với Joker Face Shop. Sẽ có đầy đủ các nhân vật <a href=\"http://muare.vn/forums/ha-noi/games-thiet-bi-games-vat-pham.27/\">game</a> như LOL, Dota2, God Of War, Assassin Credd, Mortal Combat.. cho các bạn lựa chọn.<br />\r\n<strong>B</strong>ạn đang đắn đo suy nghĩ ko biết tặng gì cho bạn bè, người thân và người yêu mỗi khi đến dịp sinh nhật cũng như những ngày kỉ niệm..vậy chần chừ gì nữa hãy đến với Joker Face Shop, thế giới đồ lưu niệm, <a href=\"http://muare.vn/forums/ha-noi/hoa-qua-tang-do-trang-tri.26/\">quà tặng</a>, mô hình manga,gấu bông xinh xắn đang chờ các bạn..</p>\r\n', 15, 0, 0, 0, 0, '2019-07-24 06:12:32', '2019-07-24 06:12:32'),
(18, 'Combo tứ hoàng', 'combo-tu-hoang', 150, 30, '11.5.jpg', 23, '<p>Chất Liệu: Nhựa PVC cao cấp bền màu</p>\r\n\r\n<p>Chiều cao: 20cm</p>\r\n', '<p><strong>MaxShop là shop hàng đầu trong lĩnh vực Manga - Anime.</strong></p>\r\n\r\n<p><strong>N</strong>ếu là một fan ruột của Manga-Anime thì bạn không thể không đến với shop, bạn có thể tìm thấy cho mình những nhân vật manga mà từ thời bé xíu đã gắn bó với bạn qua những tập truyện tranh như mèo máy Đoraemon, hay thám từ lừng danh Conan đến người máy Arale nghịch ngợm cùng 2 nhóc Boco và cũng ko thể bỏ qua những nhân vật nổi tiếng trong truyện OnePiece, Dragon Ball và còn rất nhiều những nhân vật trong truyện khác như Gintama, Naruto, hay Anime đang rất hot là Tokyo Ghoul, SAO, Date A Live..v…v.<br />\r\n<strong>C</strong>òn nếu bạn là fan ruột của những thước phim hoạt hình Pixar, Disney: ToyStory, Incredible, Wall-e, Ice Age,… hay những bộ phim Hollywood bom tấn như Batman, Avenger, Ironman, Hulk,.. thì bạn cũng không thể bỏ qua<br />\r\n<strong>B</strong>ạn thích <a href=\"http://muare.vn/categories/an-choi-giai-tri.72/\">chơi</a> <a href=\"http://muare.vn/forums/ha-noi/games-thiet-bi-games-vat-pham.27/\">game</a> ư và bạn chưa bỏ qua một <a href=\"http://muare.vn/forums/ha-noi/games-thiet-bi-games-vat-pham.27/\">game</a> hot nào vậy bạn có muốn những nhân vật trong <a href=\"http://muare.vn/forums/ha-noi/games-thiet-bi-games-vat-pham.27/\">game</a> đó được bày ở một góc trong phòng bạn không, hãy đến với Joker Face Shop. Sẽ có đầy đủ các nhân vật <a href=\"http://muare.vn/forums/ha-noi/games-thiet-bi-games-vat-pham.27/\">game</a> như LOL, Dota2, God Of War, Assassin Credd, Mortal Combat.. cho các bạn lựa chọn.<br />\r\n<strong>B</strong>ạn đang đắn đo suy nghĩ ko biết tặng gì cho bạn bè, người thân và người yêu mỗi khi đến dịp sinh nhật cũng như những ngày kỉ niệm..vậy chần chừ gì nữa hãy đến với Joker Face Shop, thế giới đồ lưu niệm, <a href=\"http://muare.vn/forums/ha-noi/hoa-qua-tang-do-trang-tri.26/\">quà tặng</a>, mô hình manga,gấu bông xinh xắn đang chờ các bạn..</p>\r\n', 9, 0, 0, 0, 1, '2019-07-24 07:14:02', '2019-07-24 07:14:02'),
(19, 'Naruto x Kurama', 'naruto-x-kurama', 90, 25, '33.1.jpg', 25, '<p>Chất Liệu: Nhựa PVC cao cấp bền màu</p>\r\n\r\n<p>Chiều cao: 20cm</p>\r\n', '<p><strong>MaxShop là shop hàng đầu trong lĩnh vực Manga - Anime.</strong></p>\r\n\r\n<p><strong>N</strong>ếu là một fan ruột của Manga-Anime thì bạn không thể không đến với shop, bạn có thể tìm thấy cho mình những nhân vật manga mà từ thời bé xíu đã gắn bó với bạn qua những tập truyện tranh như mèo máy Đoraemon, hay thám từ lừng danh Conan đến người máy Arale nghịch ngợm cùng 2 nhóc Boco và cũng ko thể bỏ qua những nhân vật nổi tiếng trong truyện OnePiece, Dragon Ball và còn rất nhiều những nhân vật trong truyện khác như Gintama, Naruto, hay Anime đang rất hot là Tokyo Ghoul, SAO, Date A Live..v…v.<br />\r\n<strong>C</strong>òn nếu bạn là fan ruột của những thước phim hoạt hình Pixar, Disney: ToyStory, Incredible, Wall-e, Ice Age,… hay những bộ phim Hollywood bom tấn như Batman, Avenger, Ironman, Hulk,.. thì bạn cũng không thể bỏ qua<br />\r\n<strong>B</strong>ạn thích <a href=\"http://muare.vn/categories/an-choi-giai-tri.72/\">chơi</a> <a href=\"http://muare.vn/forums/ha-noi/games-thiet-bi-games-vat-pham.27/\">game</a> ư và bạn chưa bỏ qua một <a href=\"http://muare.vn/forums/ha-noi/games-thiet-bi-games-vat-pham.27/\">game</a> hot nào vậy bạn có muốn những nhân vật trong <a href=\"http://muare.vn/forums/ha-noi/games-thiet-bi-games-vat-pham.27/\">game</a> đó được bày ở một góc trong phòng bạn không, hãy đến với Joker Face Shop. Sẽ có đầy đủ các nhân vật <a href=\"http://muare.vn/forums/ha-noi/games-thiet-bi-games-vat-pham.27/\">game</a> như LOL, Dota2, God Of War, Assassin Credd, Mortal Combat.. cho các bạn lựa chọn.<br />\r\n<strong>B</strong>ạn đang đắn đo suy nghĩ ko biết tặng gì cho bạn bè, người thân và người yêu mỗi khi đến dịp sinh nhật cũng như những ngày kỉ niệm..vậy chần chừ gì nữa hãy đến với Joker Face Shop, thế giới đồ lưu niệm, <a href=\"http://muare.vn/forums/ha-noi/hoa-qua-tang-do-trang-tri.26/\">quà tặng</a>, mô hình manga,gấu bông xinh xắn đang chờ các bạn..</p>\r\n', 49, 0, 0, 0, 1, '2019-07-24 09:05:05', '2019-07-24 09:05:05'),
(20, 'naruto', 'naruto', 50, 10, '1.2.jpg', 25, '<p>vi du</p>\r\n', '<p>vi du</p>\r\n', 40, 0, 0, 0, 1, '2019-11-27 06:08:37', '2019-11-27 06:08:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `note` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `transaction`
--

INSERT INTO `transaction` (`id`, `amount`, `users_id`, `status`, `note`, `created_at`, `updated_at`) VALUES
(8, 59, 7, 1, 'uhuhi', '2019-07-03 09:43:03', '2019-07-03 09:43:16'),
(11, 322, 7, 1, '', '2019-07-24 09:03:57', '2019-07-24 09:05:05'),
(12, 248, 7, 1, '', '2019-11-27 06:08:09', '2019-11-27 06:08:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` char(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `token` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `password`, `avatar`, `status`, `token`, `created_at`, `updated_at`) VALUES
(7, 'hieuzxc00', 'hieuzxc00@gmail.com', '0359313750', '116/59 Tô Hiến Thành, P15, Q10', '805629268846c2b8aae11fee3bfdcdb2', NULL, 1, NULL, NULL, NULL),
(10, 'Huan', 'quancom.vts@gmail.com', '0961902098', '590 CMT8', '25f9e794323b453885f5181f1b624d0b', NULL, 1, NULL, NULL, NULL),
(11, 'Phu', 'quancom.vts@gmail.com.vn', '0961902098', '116/59 Tô Hiến Thành, P15, Q10', '224cf2b695a5e8ecaecfb9015161fa4b', NULL, 1, NULL, NULL, NULL),
(12, 'hhhhh', 'hwwwd@gmail.com', '0359313750', '116/59 Tô Hiến Thành, P15, Q10', '9136e23d06fa5c1b233ea2212a54e7cf', NULL, 1, NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_id` (`transaction_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `catagory`
--
ALTER TABLE `catagory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
