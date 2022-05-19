-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 19, 2022 lúc 05:56 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mart`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_At` datetime NOT NULL,
  `updated_At` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `created_At`, `updated_At`) VALUES
(1, 'Hải sản', '2022-05-11 18:22:30', '2022-05-16 16:04:41'),
(2, 'Rau củ', '2022-05-14 10:02:42', '2022-05-16 16:03:07'),
(3, 'Hoa quả trong nước', '2022-05-16 11:56:02', '2022-05-16 16:04:56'),
(4, 'Hoa quả nhập khẩu', '2022-05-16 16:05:23', '2022-05-16 16:05:23'),
(5, 'Hoa quả sấy', '2022-05-16 16:05:40', '2022-05-16 16:05:40'),
(6, 'Thịt các loại', '2022-05-16 16:05:49', '2022-05-16 16:05:49'),
(7, 'Củ các loại', '2022-05-16 16:06:04', '2022-05-16 16:06:04'),
(8, 'Hạt các loại', '2022-05-16 16:06:17', '2022-05-16 16:06:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `name`, `email`, `phone`, `feedback`) VALUES
(1, 3, 'Lê Huy Hưng', 'thao@gmail.com', '0975846466', 'Trang web bán hàng'),
(9, 3, 'Lê Huy Hưng', 'lehuyhung2909@gmail.com', '0975846466', 'Phản hồi test');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `galery`
--

CREATE TABLE `galery` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `thumbnail` varchar(500) NOT NULL,
  `created_At` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `galery`
--

INSERT INTO `galery` (`id`, `product_id`, `thumbnail`, `created_At`) VALUES
(22, 6, 'daomy1.jpg', '2022-05-16 16:06:47'),
(23, 6, 'daomy2.jpg', '2022-05-16 16:06:47'),
(24, 8, 'vai1.jpg', '2022-05-16 16:08:07'),
(25, 8, 'vai2.jpg', '2022-05-16 16:08:07'),
(26, 9, 'taoxanh1.jpg', '2022-05-16 16:09:11'),
(27, 9, 'taoxanh2.jpg', '2022-05-16 16:09:11'),
(28, 10, 'le1.jpg', '2022-05-16 16:14:14'),
(29, 10, 'le2.jpg', '2022-05-16 16:14:14'),
(30, 11, 'hatdieu1.jpg', '2022-05-16 16:17:11'),
(31, 11, 'hatdieu2.jpg', '2022-05-16 16:17:11'),
(34, 13, 'chuoilaba1.jpg', '2022-05-16 16:19:28'),
(35, 13, 'chuoilaba2.jpg', '2022-05-16 16:19:28'),
(36, 13, 'chuoilaba3.jpg', '2022-05-16 16:19:28'),
(37, 12, 'hanhnhan1.jpg', '2022-05-16 16:22:12'),
(38, 12, 'hanhnhan2.jpg', '2022-05-16 16:22:12'),
(39, 14, 'tom1.jpg', '2022-05-16 16:23:18'),
(40, 14, 'tom2.jpg', '2022-05-16 16:23:18'),
(41, 14, 'tom3.jpg', '2022-05-16 16:23:18'),
(42, 15, 'thitbo1.jpg', '2022-05-16 16:25:26'),
(43, 15, 'thitbo2.jpg', '2022-05-16 16:25:26'),
(44, 15, 'thitbo3.jpg', '2022-05-16 16:25:26'),
(45, 16, 'duahau1.jpg', '2022-05-16 16:26:25'),
(46, 16, 'duahau2.jpg', '2022-05-16 16:26:25'),
(47, 16, 'duahau3.jpg', '2022-05-16 16:26:25'),
(48, 16, 'duahau4.jpg', '2022-05-16 16:26:25'),
(49, 17, 'kiwi1.png', '2022-05-16 16:27:33'),
(50, 17, 'kiwi2.jpg', '2022-05-16 16:27:33'),
(51, 17, 'kiwi3.jpg', '2022-05-16 16:27:33'),
(52, 17, 'kiwi4.jpg', '2022-05-16 16:27:33'),
(53, 18, 'cahoimy1.jpg', '2022-05-17 03:18:38'),
(54, 18, 'cahoimy2.jpg', '2022-05-17 03:18:38'),
(55, 18, 'cahoimy3.jpg', '2022-05-17 03:18:38'),
(56, 18, 'cahoimy4.jpg', '2022-05-17 03:18:38'),
(57, 19, 'muc1.jpg', '2022-05-17 03:19:40'),
(58, 19, 'muc2.jpg', '2022-05-17 03:19:40'),
(59, 19, 'muc3.jpg', '2022-05-17 03:19:40'),
(60, 19, 'muc4.jpg', '2022-05-17 03:19:40'),
(61, 20, 'cuabe1.jpg', '2022-05-17 03:20:38'),
(62, 20, 'cuabe2.jpg', '2022-05-17 03:20:38'),
(63, 20, 'cuabe3.jpg', '2022-05-17 03:20:38'),
(64, 21, 'suplo1.jpg', '2022-05-17 03:25:51'),
(65, 21, 'suplo2.jpg', '2022-05-17 03:25:51'),
(66, 22, 'raucai1.jpg', '2022-05-17 03:26:38'),
(67, 22, 'raucai2.jpg', '2022-05-17 03:26:38'),
(68, 23, 'cahoi1.jpg', '2022-05-17 03:33:36'),
(69, 23, 'cahoi2.jpg', '2022-05-17 03:33:36'),
(70, 23, 'cahoi3.jpg', '2022-05-17 03:33:36'),
(71, 23, 'cahoi4.jpg', '2022-05-17 03:33:36'),
(72, 24, 'suonlon1.jpg', '2022-05-17 03:34:50'),
(73, 24, 'suonlon2.jpg', '2022-05-17 03:34:50'),
(74, 24, 'suonlon3.jpg', '2022-05-17 03:34:50'),
(75, 24, 'suonlon4.jpg', '2022-05-17 03:34:50'),
(76, 25, 'bomy1.jpg', '2022-05-17 03:41:29'),
(77, 25, 'bomy2.jpg', '2022-05-17 03:41:29'),
(78, 25, 'bomy3.jpg', '2022-05-17 03:41:29'),
(79, 25, 'bomy4.jpg', '2022-05-17 03:41:29'),
(80, 26, 'thitkobe1.jpg', '2022-05-17 03:42:29'),
(81, 26, 'thitkobe2.jpg', '2022-05-17 03:42:29'),
(82, 26, 'thitkobe3.jpg', '2022-05-17 03:42:29'),
(83, 27, 'thitcanada1.jpg', '2022-05-17 03:44:04'),
(84, 27, 'thitcanada2.jpg', '2022-05-17 03:44:04'),
(85, 27, 'thitcanada3.jpg', '2022-05-17 03:44:04'),
(86, 28, 'thitnac1.jpg', '2022-05-17 03:52:12'),
(87, 28, 'thitnac2.jpg', '2022-05-17 03:52:12'),
(88, 28, 'thitnac3.jpg', '2022-05-17 03:52:12'),
(89, 29, 'mangcut1.jpg', '2022-05-17 03:59:59'),
(90, 29, 'mangcut2.jpg', '2022-05-17 03:59:59'),
(92, 30, 'buoi1.jpg', '2022-05-17 04:06:54'),
(93, 30, 'buoi2.jpg', '2022-05-17 04:06:54'),
(94, 30, 'buoi3.jpg', '2022-05-17 04:06:54'),
(95, 30, 'buoi4.jpg', '2022-05-17 04:06:54'),
(96, 31, 'saurieng1.jpg', '2022-05-17 04:07:54'),
(97, 31, 'saurieng2.jpg', '2022-05-17 04:07:54'),
(98, 32, 'xoaixiem1.jpg', '2022-05-17 04:09:36'),
(99, 32, 'xoaixiem2.jpg', '2022-05-17 04:09:36'),
(100, 32, 'xoaixiem3.jpg', '2022-05-17 04:09:36'),
(101, 32, 'xoaixiem4.jpg', '2022-05-17 04:09:36'),
(102, 33, 'cahoi1.jpg', '2022-05-17 12:00:01'),
(103, 33, 'cahoi2.jpg', '2022-05-17 12:00:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(300) NOT NULL,
  `note` varchar(500) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `total_money` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `phone`, `address`, `note`, `order_date`, `status`, `total_money`) VALUES
(1, 3, 'Lê Huy Hưng', 'lehuyhung29@gmail.com', '0975846466', 'Thôn Thọ Đa, Kim Nỗ, Đông Anh,  Hà Nội', 'Giao hàng cẩn thận', '2022-05-16 19:52:34', 3, 385100),
(2, 3, 'Le huy duc', 'thao@gmail.com', '0187846146', 'Thôn Thọ Đa, Kim Nỗ, Đông Anh,  Hà Nội', 'Giao hàng  nhanh', '2022-05-17 07:42:10', 3, 897500),
(3, 3, 'huy hung', 'huy@gmail.com', '0975846469', 'Thôn Thọ Đa, Kim Nỗ, Đông Anh,  Hà Nội', 'sdadsadsadsads', '2022-05-17 07:46:08', 2, 289500),
(4, 4, 'huy hung', 'leh2909@gmail.comuyhung', '0975846466', 'Thôn Thọ Đa, Kim Nỗ, Đông Anh,  Hà Nội', 'hjsfgjafjsgdja', '2022-05-19 09:14:01', 0, 1307500);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `product_id`, `order_id`, `price`, `quantity`, `total`) VALUES
(5, 14, 1, 297500, 1, 297500),
(6, 8, 1, 39500, 1, 39500),
(7, 16, 1, 13000, 1, 13000),
(8, 6, 1, 35100, 1, 35100),
(9, 14, 2, 297500, 1, 297500),
(10, 18, 2, 600000, 1, 600000),
(11, 20, 3, 250000, 1, 250000),
(12, 8, 3, 39500, 1, 39500),
(13, 9, 4, 154000, 4, 616000),
(14, 14, 4, 297500, 1, 297500),
(15, 22, 4, 20000, 1, 20000),
(16, 31, 4, 54000, 1, 54000),
(17, 12, 4, 320000, 1, 320000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `price` float NOT NULL,
  `unit` varchar(20) NOT NULL DEFAULT 'kg',
  `country` varchar(50) NOT NULL,
  `discount` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `created_At` datetime NOT NULL,
  `updated_At` datetime NOT NULL,
  `deleted` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `cate_id`, `title`, `price`, `unit`, `country`, `discount`, `description`, `created_At`, `updated_At`, `deleted`) VALUES
(6, 4, 'Đào đỏ Mỹ', 39000, 'kg', 'Mỹ', 10, 'Giá trị dinh dưỡng:  Đào là nguồn cung cấp Vitamin C giá trị, và thích hợp cho việc giảm cân\r\n \r\nChất ngọt trong quả  mận là đường tự nhiên rất tốt cho cơ thể và người bị đái tháo đường. Nước ép quả mận có tác dụng mát, thanh nhiệt, giải nóng, nhuận tràng, dùng làm nước giải khát mùa hè rất tốt.\r\n \r\nCách chọn Đào: Chọn quả có vỏ màu đỏ thẫm, da trơn và chắc, những quả lớn, không quá cứng hoặc quả mềm là vừa chín tới\r\n \r\nLưu ý Quý khách hàng: để giữ quả đào tươi ngon lâu hơn, hãy bảo quản đào trong nhiệt độ khoảng 4 độ C', '2022-05-14 16:29:52', '2022-05-16 16:06:47', 0),
(8, 3, 'Vải thiều Thanh Hà', 79000, 'kg', 'Vinmart', 50, 'Mùa hè là thời gian lý tưởng để nhâm nhi nhiều loại trái cây và vải nằm trong số những trái ngon và bổ không thể bỏ qua. Vải là loại trái cây quý với “ngoại hình” đỏ thắm như dâu tây, bên trong là thịt mềm màu trắng đục. Giữa trưa hè nóng nực mà được tận hưởng hương vị ngọt ngào, thơm tho của trái vải thì thật chẳng có gì sướng bằng.\r\n\r\n \r\n\r\nNgoài hương vị “hết chỗ chê”, loại trái cây này còn có giá trị dinh dưỡng và y học vô cùng độc đáo, gồm những tác dụng sau:\r\n\r\n- Kháng ung thư\r\n\r\n- Điều hòa huyết áp\r\n\r\n- Ngăn ngừa các bệnh\r\n\r\n- Giàu Vitamin\r\n\r\n- Tạo ra miễn dịch', '2022-05-16 16:08:07', '2022-05-16 16:08:07', 0),
(9, 4, 'Táo xanh Mỹ', 220000, 'kg', 'Mipec', 30, '1.    Giống và chủng loại\r\nTáo là loại cây ưa khí hậu khô, nóng và ít côn trùng và dịch bệnh. Táo GrannySmith (Táo Xanh) có nguồn gốc từ Úc du nhập vào Mỹ năm 1868. Táo có màu xanh lá, vị chua đậm, rất giòn, nhiều nước.\r\n \r\n2.    Xuất xứ và mùa vụ\r\nMỹ, tiểu bang Washington là vùng trồng nhiều táo nhất.\r\nÐất đai ở Tiểu bang Washington rất màu mỡ nhờ tro dung nham núi lửa. Một năm trung bình có hơn 300 ngày nắng. Khí hậu khô và nóng nên rất ít gặp các vấn đề về côn trùng và dịch bệnh. Ở đây có một hệ thống tưới tiêu rộng khắp và nguồn cung cấp nước dồi dào từ sông Columbia và vùng núi Cascade. Nên rất thuận lợi cho việc trồng táo.\r\nTáo xanh Mỹ được thu hoạch vào tháng 10 và ta có thể mua Táo Xanh quanh năm.\r\n\r\n \r\n\r\n3.    Thông tin dinh dưỡng\r\nMột quả táo cỡ trung bình chứa khoảng 4g chất xơ. Một phần trong số chất xơ đó ở dạng Pectin - loại chất xơ hòa tan có tác dụng giảm lượng cholesterol \"xấu\"; Chất xơ phức tạp của táo giúp no lâu hơn mà không bị tiêu thụ nhiều calo (một quả táo bình thường chỉ chứa khoảng 95 calo). Một loại axit có trong vỏ táo là Axit Ursolic làm giảm nguy cơ béo phì, Axit Ursolic thúc đẩy cơ thể đốt cháy calo, tăng việc hình thành cơ và giảm chất béo lâu năm trong cơ thể. Táo là nguồn cung cấp vitamin C tuyệt vời, có tác dụng tăng cường hệ thống miễn dịch. Mỗi quả táo chứa khoảng 8mg vitamin này, vì thế chúng sẽ cung cấp khoảng 14% nhu cầu vitamin C hàng ngày của cơ thể. Cũng giống như quả lê và quả việt quất, táo có mối liên hệ với việc giảm thiểu nguy cơ mắc bệnh tiểu đường túyp 2 nhờ chất chống oxy hóa có tên Anthocyanins, hơn nữa trong táo có chất Triterpenoids có khả năng chống lại các bệnh ung thư gan, ruột kết và ung thư vú.\r\n\r\n4.    Lưu ý bảo quản và sử dụng\r\nLoại táo này đặc biệt được những người làm bánh nướng ở bang Washington ưa thích.\r\nNhững ngày nắng ấm và những đêm hè mát mẻ đã bảo đảm cho táo có độ giòn đặc biệt. Dùng trong món rau trộn, salad rất ngon.\r\n- Nhiệt độ bảo quản:\r\n+ Bảo quản kho công nghiệp: từ 0 đến 4 độ C. Táo sẽ giữ được độ tươi, độ giòn trong vòng từ 1-3 tháng. Sau thời gian này, táo sẽ ngọt hơn, độ giòn (PSI) trở nên thấp hơn (xốp hơn).', '2022-05-16 16:09:11', '2022-05-16 16:09:11', 0),
(10, 4, 'Lê xanh Mỹ', 230000, 'kg', 'Mipec', 10, 'Theo phân tích khoa học, quả lê chứa protein, lipid, cenlulose, canxi, phốt pho, sắt, caroten, vitamin B1, B2, C, đường gluco, axít acetic... Việc ăn lê thường xuyên có tác dụng tốt trong điều trị bệnh cao huyết áp, tim mạch (dẫn tới váng đầu hoa mắt, tim đập loạn nhịp, ù tai), lao phổi, viêm phế quản cấp tính. Hàm lượng vitamin, đường khá phong phú trong quả lê có tác dụng bảo vệ gan, dưỡng gan và lợi tiêu hóa khá tốt.\r\n\r\n \r\n\r\nDo lê có tính hàn nên người bị bệnh đau lạnh bụng, đi lỏng không nên dùng; không ăn lê bị dập nát để tránh mắc bệnh đường ruột. Giống như trái táo, trái lê có thể có các màu vàng, xanh, nâu, đỏ hoặc sự kết hợp của hai hay nhiều màu sắc và nó cũng là liều thuốc có lợi cho sức khỏe gia đình bạn.', '2022-05-16 16:14:14', '2022-05-16 16:14:14', 0),
(11, 8, 'Hạt điều khô', 280000, 'kg', 'Vinmart', 0, 'Nói về sức tác dụng hàng đầu của hạt điều phải kể đến là tác dụng tốt cho tim mạch. Vì hạt điều chứa nhiều chất béo không bão hòa đơn, chất béo này tìm thấy nhiều trong dầu oliu.\r\n\r\nChống oxy hóa, tốt cho xương, bảo vệ răng chắc khỏe\r\nĐặc biệt là trị táo bón cực kì hiệu quả, Hạt điều rất giàu kali, sắt, magiê, kẽm và các loại khoáng chất và một loại men có ích giúp kích thích các vi sinh vật có lợi cho đường ruôt phát triển, duy trì nguồn năng lượng trong cơ thể luôn dồi dào, giữ cho đường ruột luôn khỏe mạnh và giải quyết được chứng táo bón.\r\n\r\nTrị chứng suy nhược cơ thể cực kì hiệu quả. Những bạn mắc chứng suy nhược cơ thể thì nên ăn, nó giúp bạn có nguồn sinh lực dồi vào hồi phục cơ thể. Ở VN mình thì ít dùng hạt điều trong thực đơn hằng ngày, nhưng ở mỹ, hạt điều lại là thực phẩm thiết yếu quan trọng đối với họ. Vì nó giàu dinh dưỡng, ít carb. Mà các nước phương Tây chú trọng ăn nhiều đạm để giữ vóng dáng săn chắc và hạn chế mỡ thừa hơn là các nước châu Á mình, với thói quen ăn giàu tinh bột.\r\n\r\nGiảm cân: Cái này nghe có vẻ phi lí, vì hạt điều giàu năng lượng như thế làm sao giảm cân được. Nhưng Lê là người đã sử dụng nó để giảm cân, vấn đề là sử dụng thế nào mà thôi.\r\n\r\nNguyên tắc giảm cân là ăn đủ dinh dưỡng nhưng tiết chế lượng calori và khống chế được cơn them ăn. Hạt điều đi đầu trong việc cân bằng dinh dưỡng trong khẩu phần ăn hằng ngày, và tạo cảm giác rất no.', '2022-05-16 16:17:11', '2022-05-16 16:17:11', 0),
(12, 8, 'Hạt hạnh nhân', 320000, 'kg', 'Vinmart', 0, 'Hạnh nhân rất tốt cho những người phòng ngừa các vấn đề về hàm lượng glucose và cholesterol. Thành phần trong hạt hạnh nhân giúp điều chỉnh, cân bằng 2 chất này, giúp phòng ngừa tiểu đường, mỡ máu, béo phì, thừa cân.\r\nTác dụng của hạt hạnh nhân với giảm cân cũng là một lý do nhiều người đang trong quá trình giảm cân hoặc người thừa cân, béo phì sử dụng hạt hạnh nhân để vừa có thể giảm cơn thèm đồ ăn, vừa để giảm cân hoặc kiểm soát cân nặng.\r\n\r\n \r\n\r\n\r\n- Tác dụng của hạt hạnh nhân với hệ tim mạch rất tốt. Giúp điều hòa huyết áp, phòng tránh nguy cơ mắc các bệnh tim mạch, ung thư và tăng tuổi thọ.\r\n- Hạt hạnh nhân giúp phòng ngừa táo bón\r\n- Tác dụng của hạnh nhân với bà bầu, trẻ nhỏ rất tích cực. Sử dụng hạt hạnh nhân sẽ cung cấp dinh dưỡng cần thiết, giúp bảo vệ sức khỏe của phụ nữ đang mang thai, thai nhi và trẻ em.\r\n- Hạt hạnh nhân giúp da và tóc của bạn được đẹp hơn.', '2022-05-16 16:18:21', '2022-05-16 16:22:12', 0),
(13, 4, 'Chuối Laba nhập khẩu', 90000, 'kg', 'Mipec', 30, 'Chuối là một trong những loại trái cây được tiêu thụ rộng rãi nhất trên thế giới vì các lý do tốt cho sức khỏe.  Những trái cây có màu vàng mang những giá trị dinh dưỡng lớn với sức khỏe con người. Ngày  nay, chuối được trồng ở ít nhất 107 quốc gia và được xếp hạng thứ tư trong số các loại cây lương thực của thế giới. Tại nước ta chuối cũng được trồng khá phổ biến, khắp cả nước và được bán suốt bốn mùa trong năm.\r\n\r\n \r\n\r\nChuối là một thực phẩm tốt cho tim với chế độ ăn ít chất béo bão hòa và cholesterol. Trong khi nhiều yếu tố ảnh hưởng đến bệnh tim, chế độ ăn ít chất béo bão hòa và cholesterol có thể làm giảm nguy cơ mắc bệnh này.\r\n\r\nHen suyễn:  Một nghiên cứu được tiến hành bởi Imperial College of London cho thấy trẻ em ăn một quả chuối mỗi ngày đã có một cơ hội ít hơn 34% mắc bệnh hen suyễn.\r\n\r\nUng thư: Tiêu thụ chuối, cam và nước cam trong hai năm đầu tiên  đầu đời có thể làm giảm nguy cơ phát triển bệnh bạch cầu ở trẻ em. Là một nguồn giàu vitamin C, tác dụng của quả chuối có thể giúp chống lại sự hình thành các gốc tự do gây ung thư, chất xơ có trong chuối và các loại trái cây khác liên kết với nhau làm giảm nguy cơ ung thư đại trực tràng.\r\n\r\nSức khỏe tim mạch: Các chất xơ, kali, vitamin C và B6 trong chuối  hỗ trợ sức khỏe tim mạch.  Chuối là một nguồn cung cấp kali, một khoáng chất cần thiết cho việc duy trì huyết áp bình thường và chức năng tim.  Những người tiêu thụ 4069 mg kali mỗi ngày có nguy cơ chống lại tử vong do bệnh tim thiếu máu cục bộ thấp hơn 49% so với những tiêu thụ ít kali hơn (khoảng 1000 mg mỗi ngày). Ăn một quả chuối trong các bữa ăn thường ngày của bạn có thể giúp ngăn ngừa huyết áp cao và bảo vệ chống xơ vữa động mạch.\r\n\r\nBệnh tiểu đường: Người có khẩu phần ăn nhiều chất xơ sẽ có nồng độ glucose trong máu thấp hơn và bệnh nhân tiểu đường type 2 có thể  cải thiện lượng đường trong máu, lipid và nồng độ insulin. Một quả chuối trung bình cung cấp khoảng 3 gam chất xơ.\r\n\r\nĐiều trị tiêu chảy: thực phẩm nhẹ như nước ép táo và chuối được khuyến cáo cho điều trị tiêu chảy. Khi bị tiêu chảy, kali trong cơ thể bị điện giải và mất đi với số lượng lớn làm cho cơ thể cảm thấy yếu ớt . Ăn chuối có thể bổ sung lại lượng kali cơ thể bị mất.\r\n\r\nMột quả chuối trung bình (khoảng 126 gram) được coi là một phần ăn. Một khẩu phần của chuối chứa 110 calo, 30 gam carbohydrate và 1 gam protein.', '2022-05-16 16:19:28', '2022-05-16 16:19:28', 0),
(14, 1, 'Tôm biển', 350000, 'kg', 'Vinmart', 15, 'Nguồn dinh dưỡng trong tôm mang lại những lợi ích gì cho sức khỏe chúng ta? Tại sao trong các loại hải sản, tôm vẫn luôn là món ăn yêu thích của rất nhiều người?\r\n\r\nBài viết sẽ cùng bạn giải đáp những thắc mắc trên một cách thỏa đáng nhất. Các món ăn từ tôm bao giờ cũng hấp dẫn. Từ nguyên liệu chính từ tôm, người ta có thể chế biến ra vô số các món ăn hấp dẫn, từ bình dân đến cao cấp. Chính vì vậy, loại hải sản này đã không còn xa lạ gì với chúng ta nữa. Sau đây là những lợi ích từ nguồn dinh dưỡng trong tôm mang lại cho con người.\r\n\r\n \r\n\r\nGiá trị dinh dưỡng trong tôm\r\n \r\n\r\n1. Cung cấp protein dồi dào\r\nThật khó có thể tìm được thực phẩm nào chứa ít calo nhưng lại chứa nhiều chất dinh dưỡng quan trọng như tôm. Trước hết phải kể đến nguồn protetin gần như tinh khiết có trong tôm. Theo phân tích, trong 100g nguồn dinh dưỡng trong tôm tươi có đến 18,4g protein. Cùng với trứng, thịt, cá thì tôm cũng là nguồn cung cấp đạm quan trọng trong khẩu phần ăn của người Việt.\r\n\r\n2. Bổ sung vitamin B12\r\nVitamin B12 (Cobalamin) là loại vitamin phức tạp nhất tham gia vào quá trình sinh hóa và chuyển hóa năng lượng trong cơ thể con người. Vitamin B12 giữ vai trò quan trọng trong tổng hợp nucleotic, protein, biến dưỡng carbohydrat và chất béo. Nếu cơ thể thiếu hụt loại vitamin này có thể dẫn đến mệt mỏi, chóng mặt, cơ bắp trở nên yếu ớt. Trường hợp nặng hơn là bị tổn hại thần kinh, dễ mắc các bệnh thiếu máu và mất trí.\r\n\r\nTôm được xem là một trong những thực phẩm tuyệt vời nhất khi cơ thể cần bổ sung vitamin B12. Theo phân tích, cứ trong 100g tôm chứa 11.5μg vitamin B12. Trong các loại tôm, tôm hùm đất giàu lượng vitamin B12 nhất.\r\n\r\n3. Bổ sung chất sắt\r\nSắt là thành phần dinh dưỡng thiết yếu cần có cho tất cả các cơ quan và mô trong cơ thể. Nếu thiếu sắt, cơ thể dễ gặp tình trạng thiếu máu, mệt lả và khó thở. Để giải quyết những vấn đề sức khỏe đó, hấp thu dinh dưỡng trong tôm là cách tốt nhất. Vì tôm là một trong những thực phẩm cung cấp nhiều chất sắt nhất.\r\n\r\n4. Chứa dồi dào lượng selen – ngừa ung thư\r\nCứ 100g tôm cung cấp hơn 1/3 lượng selen cần thiết hàng ngày. Các bác sĩ khuyên chúng ta nên thường xuyên ăn tôm để ngăn chặn sự phát triển của tế bào ung thư. Bởi dưỡng chất selen có trong tôm được xem như một “anh hùng” chuyên loại bỏ và thải trừ các kim loại nặng ra khỏi cơ thể.\r\n\r\n \r\n\r\n5. Cung cấp canxi\r\n \r\n\r\nKhông có gì quá ngạc nhiên khi người ta thường chọn tôm trong bữa ăn hàng ngày để bổ sung lượng canxi cần thiết cho cơ thể. Vì cứ trong 100g tôm có đến 2000 mg canxi. Khoa học đã chứng minh canxi là yếu tố thiết yếu trong cấu tạo mô xương, góp phần hệ xương khỏe mạnh.\r\n\r\nCó nhiều người cho rằng, vỏ tôm cứng nên chứa nhiều canxi. Tuy nhiên, nguồn canxi chính của tôm chủ yếu ở thịt, chân và càng. Do đó nếu cố gắng ăn cả vỏ tôm, cơ thể cũng chỉ bài tiết ra ngoài. Chúng không hề giàu canxi như một số người đã nhầm tưởng.\r\n\r\n6. Chứa nhiều omega – 3\r\nDinh dưỡng trong tôm chứa rất nhiều omega – 3, chất có tác dụng chống lại cảm giác mệt mỏi, buồn chán và trầm cảm. Ngoài ra các axit béo omega-3 còn giúp chống oxy hóa, đẩy lùi quá trình lão hóa.', '2022-05-16 16:23:18', '2022-05-16 16:23:18', 0),
(15, 6, 'Thịt bò Mỹ', 365000, 'kg', 'Mipec', 0, 'Chắc các ấy cũng biết, các loại thịt động vật có vai trò hết sức quan trọng trong khẩu phần ăn của chúng mình. Nó tham gia vào quá trình hình thành, thay thế và phân hủy các tế bào trong cơ thể. Bên cạnh đó, thịt động vật còn rất cần thiết cho việc chuyển hóa các chất dinh dưỡng cung cấp cho cơ thể. Quan trọng nhất là protein cùng vitamin và chất khoáng đó mà!\r\n\r\n \r\n\r\nLà thực phẩm không thể thiếu trong thực đơn của ấy nào muốn ăn kiêng hay những teens năng chơi thể thao, thịt bò giúp chúng mình tăng cường sức khỏe, ngăn ngừa bệnh tật và thúc đẩy quá trình hình thành các protein mới. Ngoài ra, nó còn hỗ trợ tích cực cho việc phục hồi cơ thể sau những buổi tập luyện mệt mỏi đấy teens ạ!\r\n\r\nCác ấy có biết, trong 100g thịt bò có tới 28g protein cùng rất nhiều vitaminh B12, B6, khoáng chất cacnitin, kali, kẽm, magie, sắt... cơ đấy! Đồng thời, khối lượng thịt đó sẽ cung cấp cho chúng mình 280kcal năng lượng, gấp đôi so với cá và nhiều loại thịt động vật khác.\r\n\r\nĐiểm đặc biệt của protein trong thịt bò đó là nó chứa nhiều acid amin, acid gốc nitro. Chúng sẽ giúp các ấy biến protein trong thức ăn thành đường hữu cơ để cung cấp cho các hoạt động hàng ngày. Ngoài ra, thịt bò còn chứa acid linoleic và palmiotelic chống lại ung thư và các mầm bệnh khác nữa nhá!', '2022-05-16 16:25:26', '2022-05-16 16:25:26', 0),
(16, 3, 'Dưa hấu miền Nam', 13000, 'kg', 'Vinmart', 0, 'Dưa hấu chủ yếu được sản xuất bằng nước uống và các chất dinh dưỡng, nhưng lại chứa rất ít calo. Dưa hấu cũng là một nguồn dinh dưỡng tốt của cả hai citrulline và lycopene, hai hợp chất thực vật có lợi cho sức khỏe.\r\n\r\nĂn dưa hấu hoặc uống nước ép dưa hấu có thể mang lại một sức khỏe tốt, bao gồm huyết áp thấp, cải thiện tình trạng kháng insulin và giảm đau nhức cơ bắp.\r\n\r\n \r\n\r\nTrong khi những quả dưa hấu thường được ăn tươi, bạn cũng có thể làm nước ép trái cây, sinh tố. Dưa hấu có ruột màu đỏ hoặc màu hồng, được bao quanh bởi một vỏ cứng thường có màu xanh với sọc xanh đậm.\r\n\r\nNgoài ra còn có một số loại dưa hấu ruột màu trắng,  vàng, cam và xanh lá cây. Nhiều giống quả có nhiều hạt, nhưng cũng có những giống không hạt.\r\n\r\n \r\n\r\nGiá trị dinh dưỡng\r\nDưa hấu chứa chủ yếu là nước (91%) và carbs (7,5%). Hầu như không có protein hoặc chất béo và rất ít calo.\r\n\r\n \r\n\r\nCarbs\r\nDưa hấu có chứa 7,5 gram carbs trong 100 gram, hoặc 12 gram carbs mỗi cốc.\r\n\r\nCarbs chủ yếu là các loại đường đơn giản, chẳng hạn như glucose, fructose và sucrose. Dưa hấu cũng có chứa một lượng nhỏ chất xơ. Chỉ số đường huyết của dưa hấu là 72-80 (cao).\r\n\r\nTuy nhiên, mỗi phần ăn của dưa hấu lại chứa rất ít carbs, vì vậy ăn dưa hấu không ảnh hưởng lớn đến lượng đường trong máu.\r\n\r\n \r\n\r\nChất xơ\r\nDưa hấu có rất ít chất xơ (0,4 gram cho mỗi 100 gram). Tuy nhiên, các carbohydrate lên men chuỗi ngắn lại rất cao, được gọi là FODMAPs.\r\n\r\nFODMAPs có thể gây ra các triệu chứng tiêu hóa khó chịu ở một số người, chẳng hạn như những người bị hội chứng ruột kích thích.\r\n\r\nDưa hấu có rất ít calo và chất xơ, hầu hết chúng là nước và những loại đường đơn. Và FODMAPs có trong dưa hấu, gây ra các vấn đề tiêu hóa ở một số người.', '2022-05-16 16:26:25', '2022-05-16 16:26:25', 0),
(17, 6, 'Kiwi', 58000, 'kg', 'Vinmart', 10, 'Quả kiwi giàu dinh dưỡng\r\nQuả kiwi ban đầu được gọi là quả lý gai, bắt nguồn từ Trung Quốc. Loại quả này giúp cung cấp nguồn dinh dưỡng dồi dào, tươi ngon tự nhiên, an toàn và tốt cho sức khỏe cho cả gia đình.\r\nVào năm 1904, hạt giống của quả này đã được mang tới New Zealand trồng thử và sau đó trở thành “quốc trái” của đất nước này. Quả đồng thời cũng mang tên loài chim kiwi của New Zealand. Ngày nay, New Zealand cũng là đất nước của quả kiwi Zespri.\r\n\r\nNghiên cứu của các nhà khoa học Mỹ vào năm 1997 nhằm đánh giá giá trị dinh dưỡng có trong mỗi 100g quả của 27 loại trái cây phổ biến nhất đã chỉ ra rằng kiwi là một trong những loại quả giàu chất dinh dưỡng nhất trên thế giới. Kết quả nghiên cứu được công bố tại cuộc họp hàng năm thứ 38 của American College of Nutrition tại New York ngày 27/9/1997. Với số điểm 16, kiwi là trái cây giàu dinh dưỡng nhất sau là đu đủ, xoài và cam.\r\n\r\nNhững nghiên cứu khoa học về quả kiwi không chỉ khẳng định mức độ dinh dưỡng của loại trái cây này mà còn khám phá ra rằng việc ăn quả kiwi hàng ngày có thể sẽ giúp sản sinh ra những vi chất bảo vệ chống lại việc phá hủy ADN giúp ngăn chặn các bệnh ung thư. Thực tế, một nghiên cứu vào năm 2003 cho thấy sự bình phục tế bào bạch cầu đã có hiệu quả gấp đôi với những người ăn 3 quả kiwi một ngày liên tục trong 3 tuần.\r\n\r\nVitamin C giúp tăng cường hệ miễn dịch của cơ thể. Ngoài ra Vitamin C cũng giúp cơ thể chống lại bệnh cảm lạnh và cảm cúm, các tác động của tuổi tác và stress. Một quả kiwi cung cấp một lượng vitamin C gấp đôi một quả cam.\r\n\r\nCùng với chuối, quả kiwi là nguồn bổ sung kali cho cơ thể. Kali là khoáng chất quan trọng đóng vai trò quan trọng trong việc ngăn chặn chứng tăng huyết áp.\r\n\r\nHơn thế nữa, kiwi chứa nhiều chất xơ hòa tan rất dễ hấp thụ với hàm lượng lớn hơn rất nhiều chất xơ trong các loại quả khác. Chất xơ đóng một vai trò tích cực trong việc tăng cường hoạt động của hệ tiêu hóa và đã được chứng minh là giảm nguy cơ mắc bệnh tiểu đường và các bệnh tim mạch.\r\n\r\nQuả kiwi lại rất giàu vitamin E ít béo, điều hiếm thấy trong số các loại trái cây. Vitamin E không phải là một chất tham gia trực tiếp vào quá trình chuyển hóa của cơ thể nhưng lại có góp phần rất quan trọng trong quá trình này với vai trò là chất xúc tác, giúp cho cơ thể khỏe mạnh, chống lại sự sản xuất dư thừa gốc tự do, chống lại quá trình chết tế bào, kìm hãm quá trình lão hóa, giúp da tóc mịn màng.\r\n\r\nNhìn ngoài vỏ, quả kiwi không thu hút sự chú ý vì vỏ màu nâu, có lông xù và không có mùi thơm. Tuy nhiên, khi cắt đôi ra, nó là một món quà của thiên nhiên.\r\n\r\nỞ Việt Nam thường bán hai loại kiwi xanh và vàng. Kiwi xanh có phần thịt quả màu xanh ngọc sáng lẫn với hạt nhỏ màu đen. Mọi người thường nghĩ kiwi xanh có vị chua nhưng thực tế, khi chín sẽ có vị chua ngọt, đặc trưng là sự kết hợp của trái dâu, dưa và quýt. Trái kiwi vàng có phần thịt màu vàng, hạt nhỏ màu đen với vị ngọt trái cây nhiệt đới giống với vị của trái xoài và đào.\r\n\r\nBạn có thể tự mình kiểm tra kiwi đã chín hay chưa bằng cách bóp nhẹ, nếu thấy hơi mềm tay nghĩa là quả đã chín (tương tự như quả hồng xiêm). Kiwi xanh thường được bán khi còn cứng và chưa chín. Khi mua về bạn hãy để cho kiwi chín ở nhiệt độ phòng trong khoảng từ 3 đến 5 ngày tùy thời tiết và nhiệt độ. Bạn có thể làm kiwi chín nhanh hơn bằng việc để chúng chung với chuối và bọc giấy lại.\r\n\r\nKiwi vàng thường có thể ăn ngay sau khi mua. Trái kiwi ngon hơn khi ăn lạnh và sau khi chín bạn có thể giữ nó trong tủ lạnh trong vòng 5 ngày mà hương vị không bị ảnh hưởng.\r\n\r\nCông ty Zespri Kiwifruit được thành lập tại New Zealand vào năm 1928. Ngày nay, với doanh thu 1,5 tỷ USD, Zespri là thương hiệu kiwi hàng đầu cung ứng trái kiwi chất lượng hàng đầu thế giới. Kiwi Zespri được trồng, chăm sóc, bảo quản lạnh và vận chuyển tới các nước trên thế giới theo quy trình riêng biệt, đảm bảo những trái kiwi này được bán ra với chất lượng đồng đều.', '2022-05-16 16:27:33', '2022-05-16 16:27:33', 0),
(18, 1, 'Cá hồi Mỹ', 800000, 'kg', 'Mipec', 25, 'Cá hồi không chỉ bổ sung axít béo thiết yếu mang lại sức khỏe cho tim, da, tóc mà còn tốt cho não bộ.\r\n\r\nĂn nhiều thực phẩm giàu chất béo như mỡ động vật không có lợi cho sức khỏe. Trong cá hồi có chứa rất ít chất béo dạng này, giàu axít béo omega-3, là thành phần cần thiết đối với quá trình phát triển não bộ ở con người.\r\n\r\nBên cạnh những lợi ích to lớn mà các loại chất béo này mang lại, chuyên gia cho biết, cá hồi còn chứa nhiều dưỡng chất thiết yếu khác có thể giúp tăng cường sức khỏe toàn diện của cơ thể.\r\n\r\nGiàu protein và amino acid\r\n\r\nCác loại thịt động vật như lợn, bò… chứa rất nhiều protein, song nếu ăn nhiều lại không tốt cho sức khỏe, có thể gây ra chứng thừa đạm, béo phì, tiểu đường... Trong khi đó, bạn có thể ăn cá hồi thoải mái mà không phải lo nghĩ gì.\r\n\r\nProtein trong cá hồi và amino acid rất dễ hấp thụ, tốt cho hệ tiêu hóa và tim mạch. Trong cá hồi cũng có chứa rất nhiều vitamin thiết yếu như vitamin A, D, phốt pho, magiê, kẽm, và iốt… Đặc biệt canxi trong cá hồi còn góp phần giúp cho xương chắc khỏe.\r\n\r\nGiảm nguy cơ đột quỵ, bệnh tim\r\n\r\nTheo kết quả nghiên cứu của Trường Y tế cộng đồng thuộc Đại học Harvard, Mỹ, lượng axít béoomega-3 có trong cá sẽ giúp cải thiện rất hiệu quả đến lượng cholesterol trong máu cũng như huyết áp, việc ăn cá đều đặn hàng tuần sẽ ngăn chặn nguy cơ mắc bệnh tim, làm giảm đột quỵ.\r\n\r\nNgoài ra, omega-3 còn giúp giảm nồng độ triglyceride trong máu và giảm hiện tượng máu bị vón cục dẫn tới tắc nghẽn mạch máu. Các nhà khoa học cho biết, những người theo chế độ ăn uống có nhiều khẩu phần cá hồi mỗi tuần sẽ giảm được khoảng 12% nguy cơ của bệnh so với những người không ăn hoặc ăn ít.\r\n\r\nChăm sóc da và tóc\r\n\r\nMột lợi ích quan trọng của cá hồi đối với sức khỏe nữa là cải thiện kết cấu làn da và tóc giúp tóc bóng mượt hơn và da mịn màng hơn. Trong cá hồi giàu protein, vitamin D và các a-xít béo omega-3. Khoảng 3% cấu tạo của sợi tóc là các axít béo.\r\n\r\nOmega-3 cũng được tìm thấy trong màng tế bào của da đầu. Axit béo omega-3 có tác dụng bảo vệ các tế bào và giữ ẩm cho da. Nó cũng khuyến khích sản xuất collagen và sợi elastin, giúp da khỏe mạnh. Ngoài ra, các axit béo trong cá hồi cũng cung cấp dinh dưỡng cho nang lông và giúp duy trì mái tóc khỏe mạnh. Đây chính là loại dầu tự nhiên duy trì độ ẩm cho da đầu và tóc. Vì vậy mà cá hồi giúp chống lại hiện tượng da bị cháy nắng cũng như bệnh ung thư da.\r\n\r\nPhát triển cơ bắp\r\n\r\nCá hồi có hàm lượng protein và axit béo omega-3 cao. Axit béo omega-3 có tác dụng làm giảm nguy cơ phân hủy protein cho cơ bắp sau khi luyện tập và giúp cải thiện phục hồi các cơ. Điều này là vô cùng quan trọng vì để tạo cơ bắp, cơ thể cần lưu trữ lượng protein mới nhanh hơn so với lượng protein cũ bị mất đi.\r\n\r\nVì thế, dù bạn có luyện tập chăm chỉ nhưng không bổ sung thực phẩm hợp lý thì tác dụng của việc luyện tập sẽ không được phát huy. Thường xuyên ăn cá hồi giúp cơ bắp săn chắc và thúc đẩy sự trao đổi chất.\r\n\r\nTốt cho não bộ\r\n\r\nĐối với con người, DHA có trong axit béo không no của cá hồi và có vai trò quan trọng trong quá trình sinh trưởng của tế bào não và hệ thần kinh. Thiếu chất này con người sẽ giảm trí nhớ, kém thông minh. Đặc biệt đối với trẻ nhỏ, DHA là một dưỡng chất vô cùng quan trọng và cần thiết để phát triển tế bào não.\r\n\r\nBên cạnh đó, nhiều nghiên cứu đã chỉ ra rằng cá hồi hỗ trợ rất lớn trong quá trình phát triển não bộ của thai nhi. Vì vậy, đối với phụ nữ mang thai, việc tăng lượng cá hồi trong chế độ ăn là vô cùng cần thiết.\r\n\r\nTăng cường sức khỏe cho đôi mắt\r\n\r\nCá hồi là loại thực phẩm rất hiệu quả trong việc duy trì chức năng thị giác. Hàm lượng omega-3 và axit amin có trong cá hồi giúp cải thiện sức khỏe của đôi mắt và ngăn ngừa bệnh thoái hóa điểm vàng (AMD), mắt bị khô và mệt mỏi.\r\n\r\nAMD là nguyên nhân phổ biến của việc mất thị lực ở người trên 50 tuổi và nghiên cứu cho biết việc tích cực ăn cá hồi giúp ngăn ngừa bệnh thoái hóa điểm vàng. Những axit béo omega -3 tuyệt vời trong cuộc chiến chống lại AMD có thể dẫn đến mù lòa. Cá hồi cũng là một nguồn tự nhiên của vitamin D có lợi cho sức khỏe của mắt.', '2022-05-17 03:18:38', '2022-05-17 03:18:38', 0),
(19, 1, 'Mực Thanh Hóa', 80000, 'gam', 'Vinmart', 10, 'Mực tươi là món quen thuộc nhưng nói đến công dụng của mực tươi thì không phải ai cũng biết. Hôm nay Dinhduong.online có bài viết chia sẻ ăn mực tươi có lợi gì cho sức khỏe?\r\n\r\nHỗ trợ hình thành hồng cầu\r\n\r\n \r\n\r\nNhững trường hợp bị thiếu hồng cầu thì nên bổ sung thêm mực vào thực đơn của mình. Vì cứ 100 gam mực sẽ cung cấp thêm 90% đồng, chất đồng là một khoáng chất cần thiết cho cơ thể, đồng giúp cơ thể lưu trữ, hấp thụ và trao đổi chất, giúp hình thành nên hồng cầu. Vì vậy những bạn nào thiếu hồng cầu thì đừng quên ăn vài con mực tươi mỗi tuần nhé!\r\n\r\n \r\n\r\nNgăn ngừa viêm khớp\r\n\r\nMực cung cấp 63% selenium, bởi vì selenium có tác dụng chống oxy hóa và giúp giảm các triệu chứng đau xương khớp.\r\n\r\nVới 10 loại thực phẩm tốt cho khớp gối dưới đây, mùa đông giá rét hay mưa phùn gió bấc, bạn sẽ không còn phải lo lắng đến những cơn đau buốt người của chứng đau khớp gối nữa. Mặc dù những thực phẩm này không phải là thuốc và không…\r\n\r\nCung cấp protein\r\n\r\nNhững ai đang có những rắc rối về da, tóc, móng tay chân… thì có thể bổ sung thêm mực vì trong mực có chứa thành phần protein. Như vậy hàm lượng protein trong mực giúp cho chị em sở hữu một bề ngoài hoàn hảo.\r\n\r\nCắt cơn đau nửa đầu\r\n\r\n \r\n\r\nNếu như bạn đang khó chịu với con đau nửa đầu thì hãy bổ sung mực, vì mực có chứa hàm lượng Vitamin B2. Theo như điều tra thì loại Vitamin này có tác dụng khống chế cơn đau nửa đầu.\r\n\r\n \r\n\r\nRăng và xương chắc khỏe\r\n\r\nNhư ai cũng biết thì trong thành phần dinh dưỡng của mực có chứa Canxi và Photpho cho nên giúp cho hệ xương và răng của chúng ta thêm chắc khỏe, bổ sung đủ chất dinh dưỡng.\r\n\r\nTăng cường hệ miễn dịch\r\n\r\nNhững người có hệ miễn dịch kém thì có thể bổ sung mực vào thực đơn của mình để tăng cường hệ miễn dịch.\r\n\r\nGiúp thư giãn thần kinh và cơ bắp\r\n\r\nMagie có trong mực là một loại khoáng chất có tác dụng thư giãn dây thần kinh và cơ bắp.\r\n\r\nỔn định lượng đường trong máu\r\n\r\nTrong thành phần của mực có chứa Vitamin B3, chất này có tác dụng ổn định lượng đường trong máu.\r\n\r\nTốt cho hệ tim mạch\r\n\r\nTrong thành phần của mực có chứa Vitamin B12 có tác dụng tích cực cho hệ tim mạch.\r\n\r\nBổ huyết tăng sữa\r\n\r\nNấu canh giò heo với mực khô hoặc mực tươi có tác dụng kích sữa cho thai phụ.\r\n\r\nChữa bệnh mờ mắt, chảy nước mắt sống\r\n\r\nNgoài tác dụng của mực tươi thì mực khô cũng có tác dụng tương tự, nấu canh mực khô rồi húp lấy nước, vì mực khô rất khó tiêu hóa.\r\n\r\nChống ợ chua\r\n\r\nNước canh mực có tác dụng chống ở chua hiệu quả.\r\n\r\nGiảm huyết áp\r\n\r\nNếu như ăn một vài con mực sau đó ăn một quả chuối hoặc bơ sẽ có tác dụng giảm huyết áp. Nếu như thường xuyên ăn món này sẽ giúp cho huyết áp của bạn ổn định hơn.\r\n\r\nMột số món ăn được chế biến từ mực như:\r\n\r\nMực xào chua ngọt\r\n\r\nChỉ cần khoảng 300 gam mực tươi với một số loại rau củ, khi kết hợp chúng với nhau bạn sẽ có một món mực xào chua ngọt cực ngon. Món mực xào chua ngọt làm cho bữa cơm nhà bạn thêm thơm ngon, hấp dẫn hơn.\r\n\r\nMực nướng chao\r\n\r\n1kg mực tươi và 1 hủ chao sẽ giúp cho bạn có một món mực nướng chao thơm ngon. Món mực nướng chao thích hợp làm món nhậu hoặc những bữa gặp gỡ bạn bè.\r\n\r\nMực nhồi thịt\r\n\r\nMực tươi nhồi thịt là món ăn ngon và hấp dẫn, nhất là các bé rất thích món này. Mực nhồi thịt sốt cà chua sẽ làm cho bữa cơm nhà bạn thêm hấp dẫn.\r\n\r\nMực xào sa tế\r\n\r\nMực xào sa tế ăn kèm với dưa leo và cơm nóng sẽ giúp nồi cơm nhà bạn sạch sẽ.\r\n\r\nMực om nước dừa\r\n\r\nMực om nước dừa có vị ngọt tự nhiên, đậm đà và thơm ngon rất hấp dẫn.\r\n\r\nCó rất nhiều món ăn ngon được chế biến từ mực, chỉ cần chúng ta đầu tư một ít thời gian cho nó chắc chắn bạn sẽ có ngay một món ngon hấp dẫn.\r\n\r\nNhư vậy chúng ta đã có những thông tin về lợi ích khi ăn mực, món mực đem lại rất nhiều giá trị cho sức khỏe. Vậy tại sao lại không nhanh chóng bổ sung mực vào món ăn hàng tuần.', '2022-05-17 03:19:40', '2022-05-17 03:19:40', 0),
(20, 1, 'Cua bể', 250000, 'kg', 'Vinmart', 0, 'Cua biển là một trong những thực phẩm hải sản yêu thích của rất nhiều người bởi được chế biến ra vô vàn những món ăn độc đáo, ngon miệng: cua hấp, cua rang, cua nướng, cua nấu canh… Thế nhưng, bạn sẽ thích ăn cua biển hơn nếu biết được ngoài vị hấp dẫn ngon miệng, cua biển còn mang những giá trị dinh dưỡng tuyệt vời đấy.\r\n\r\n \r\n\r\nCua biển tốt cho não bộ\r\nNguồn axit béo omega-3 tự nhiên trong cua có thể giúp cải thiện trí nhớ, giảm nguy cơ ung thư, giúp cải thiện chứng trầm cảm và hay lo âu, thích hợp cho những người làm công việc dưới cường độ áp lực cao, gây căng thẳng, mệt mỏi.\r\n\r\nCần thiết cho sự phát triển của trẻ nhỏ\r\nTrong thịt cua có nhiều loại vitamin, các khoáng chất như chất sắt, kali, canxi, đồng… hỗ trợ cho sự phát triển và hệ thống miễn dịch của bé. Hơn nữa, lượng thủy ngân có trong thịt cua ít hơn các loại hải sản khác như mực, cá ngừ…\r\n\r\n \r\n\r\nTăng cường sinh lý cho nam giới\r\nTheo Đông y, thịt cua biển có vị ngọt, mặn, tính bình, không độc, có tác dụng thanh nhiệt, sinh huyết, tán ứ, giảm đau, thông kinh lạc, bổ xương tủy… Món ăn chế biến từ thịt cua biển có tác dụng bồi bổ cơ thể , cải thiện khả năng chăn gối, chống lại căn bệnh liệt dương, là bài thuốc tăng cường sinh lý tự nhiên, an toàn cho phái mạnh.\r\n\r\n \r\n\r\nCó lợi cho mẹ bầu và thai nhi\r\nTheo ý kiến của các chuyên gia dinh dưỡng, gạch chua, thịt cua chứa nhiều protein, chất sắt, đặc biệt là hàm lượng lớn axit béo omega-3, yếu tố quan trọng cho sự phát triển của não bộ và đôi mắt thai nhi. Chính vì vậy, các chị em đang mang bầu nên lưu ý đưa cua biển vào thực đơn nhé!', '2022-05-17 03:20:38', '2022-05-17 03:20:38', 0),
(21, 2, 'Súp lơ trắng', 20000, 'kg', 'Vinmart', 0, 'Súp lơ có chứa các thành phần như: Protein 3,5%; gluxit 4,9%; và nhiều khoáng chất, vitamin như: can-xi (26 mg%); phốtpho (51 mg%); sắt (1,4 mg%); natri (20 mg%); kali (349 mg%); betacaroten (40 mg%); vitamin B1 (0,11 mg%), vitamin C (70 mg%)… Súp lơ có hai loại trắng và xanh. Loại xanh thường giòn và dai hơn nên có cảm giác ngon hơn, cũng rất tốt cho sức khỏe - giúp ngăn ngừa được nhiều căn bệnh như: Tim mạch, ung thư tuyến tiền liệt, bàng quang, viêm loét dạ dày...\r\n\r\n \r\n\r\nVới những người có bệnh dạ dày, bị loét hành tá tràng có thể dùng súp lơ tươi rửa sạch, xay (hay ép) lấy nước. Dùng 200-300 ml nước này trước bữa ăn, dùng 2 lần/ngày, và mỗi đợt trị liệu khoảng 10 ngày như thế. Với những người suy nhược thần kinh thì trong bữa ăn của mình, nên dùng món cháo nấu từ súp lơ (cắt nhỏ) với gạo nếp. Với người có huyết áp cao, thì dùng súp lơ, đường trắng, giấm ăn (vừa đủ), làm cải bắp dầm để dành ăn.', '2022-05-17 03:25:51', '2022-05-17 03:25:51', 0),
(22, 2, 'Rau cải bẹ xanh non', 20000, 'kg', 'Vinmart', 0, 'Trong các loại rau cải cải thảo khá được ưa thích bởi nó có vị ngọt, tính mát, lại có tác dụng hạ khí, thanh nhiệt, chứa hàm lượng cao vitamin A, B, C, E. Hàm lượng nguyên tố vi lượng kẽm cao hơn cả so với thịt, cá. Cải thảo nếu nấu chín chứa nhiều vitamin A, C, K, B2, B6, calcium, sắt, mangan, folat, cũng như có nhiều thành phần hoạt chất có ảnh hưởng tốt đối với sức khỏe. Cải thảo vừa có thể dùng nấu canh ăn như các loại rau cải khác, lại cũng có thể ăn sống, muối chua, làm nộm như rau xà lách, nấu lẩu, xào… Khi bạn chế biến cải thảo, bạn không nên nấu cải thảo quá chín sẽ làm cho rau cải mất độ ngon, giòn và các vitamin cũng dễ bị tan mất ở nhiệt độ cao.\r\n\r\n \r\n\r\nNhững người mắc phải hội chứng trào ngược hoặc dị ứng, khó tiêu với các loại rau cải họ cải, cần hết sức thận trọng với cải thảo. Cũng nên biết thành phần indol có trong cải thảo có thể làm giảm tác dụng của vài loại thuốc giảm đau có chứa thành phần acetaminophen.', '2022-05-17 03:26:38', '2022-05-17 03:26:38', 0),
(23, 1, 'Cá hồi', 1200000, 'kg', 'Vinmart', 0, 'Ăn cá hồi đúng cách sẽ mang lại nhiều lợi ích cho sức khỏe. Tuy nhiên, nếu chọn cá hồi không đảm bảo, ăn cá sai cách sẽ vô tình rước bệnh vào thân.\r\nGiá trị dinh dưỡng của cá hồi đã được nhiều người biết đến, tuy nhiên so với các thực phẩm khác, cá hồi tương đối đắt và không được bán phổ biến nên nhiều bà mẹ vẫn còn lúng túng khi chế biến món ăn.\r\n\r\n \r\n\r\nDưới đây là những lưu ý cần tránh khi ăn cá hồi:\r\n\r\nCá bị nhiễm khuẩn\r\n\r\nCá hồi thường được sử dụng để ăn sống, nên việc chọn nguồn thực phẩm sạch là hết sức quan trọng. Với tình trạng môi trồng thủy sản bị ô nhiễm như hiện nay, cá hồi có thể bị nhiễm khuẩn, người ăn vào dễ bị rối loạn tiêu hóa, đau bụng, tiêu chảy. Ngoài ra, cá hồi có thể nhiễm phải một số kim loại độc hại như chì, thủy ngân, domoic axit,… là một trong số những nhân tố gây nên bệnh ung thư.\r\n\r\nVì vậy, khi mua cần lựu chọn nguồn đảm bảo, ngoài ra cần quan sát đặc điểm bên ngoài cá như: mắt cá hồi phải trong, con ngươi phải đen sáng, mang cá hồi không thâm, thịt cá hồi tươi phải chắc và đàn hồi. Nên kiểm tra qua trong bụng cá hồi để chắc chắn rằng không có những vết máu hay những vùng thẫm màu.\r\n\r\nKhông sơ chế kĩ\r\n\r\nViệc chế biến cá hồi đúng cách là rất quan trọng. Chú ý, khi lọc xương nên được tiến hành cẩn thận, các xương lẻ dính trong thịt cá, có thể sử dụng nhíp để gắp ra nếu dùng cho trẻ.\r\n\r\nNgoài ra, để làm giảm mùi tanh cũng như loại bỏ các chất bẩn trên mình cá cần rửa qua bằng nước muối hoặc xát muối hột lên cá, sau đó ngâm cá đã làm sạch vào nước lạnh có pha ít giấm, hoặc trộn vào cá một ít hạt tiêu hay lá nguyệt quế.\r\n\r\nBảo quản không đúng cách\r\n\r\nCần ướp lạnh cá để bảo quản, dùng trong vòng 24 giờ. Tránh sử dụng thịt cá đã đổi màu hay chảy nước. Đối với cá đông lạnh, khi muốn sử dụng phải cho vào ngăn mát để rã đông từ từ. Nếu ngay lập tức để ra môi trường ngoài hoặc sử dụng lò vi sóng, thịt cá sẽ bị rã nát.\r\n\r\nĐể bảo quản lâu hơn, chúng ta nên để cá đông lạnh. Cá hồi đông lạnh có thể bảo quản trong vòng 3 tháng. Tuy nhiên trong trường hợp quá trình đông lạnh này bị ngắt quãng thì toàn bộ việc bảo quản sẽ không còn giá trị, chúng ta bắt buộc phải sử dụng toàn bộ thịt cá sau lần rã đông đầu tiên.\r\n\r\nChế biến cá hồi đúng cách\r\n\r\nĐầu cá hồi\r\n\r\nĐầu cá hồi chính là phần nhiều chất dinh dưỡng nhất trên cơ thể cá hồi. Đầu cá hồi thường được sử dụng nhiều nhất để nấu canh chua với sấu hoặc khế hoặc làm lẩu. Đặc biệt, óc của cá hồi được cho là bộ óc ngon nhất của các loài cá.\r\n\r\nThịt cá hồi\r\n\r\nThân giữa chính là phần lưu trữ mỡ của cá hồi, được rất nhiều thực khách ưa chuộng vì nhiều công dụng khác nhau: ăn sống, rán, rán chín tới, nhúng lẩu, nướng, sốt cà chua hay làm sushi.\r\n\r\nPhần đuôi cá hồi chắc thịt nên rất phù hợp nhất để nấu cháo, nấu bột và làm ruốc. Ngoài ra, nhiều người cũng sử dụng cả phần đuôi để nấu canh chua hoặc sốt cà chua. Phần thịt gần đuôi cá cũng có thể dùng làm gỏi cá, làm sushi, đem lại màu đỏ đậm đẹp mắt, khiến miếng thịt chắc hơn khi ăn sống.\r\n\r\nXương cá hồi\r\n\r\nXương cá hồi có thể được để nguyên để kho, rán, sốt cà chua hoặc nấu canh chua. Người nấu cũng có thể lọc lấy riêng phần thịt để nấu cháo, nấu bột. Tận dụng xương cá hồi chính là cách tiết kiệm nhất để thưởng thức món cá hồi đắt giá.', '2022-05-17 03:33:36', '2022-05-17 03:33:36', 0),
(24, 6, 'Sườn lợn nhập khẩu', 800000, 'kg', 'Mipec', 0, '9 lợi ích sức khỏe hàng đầu của thịt lợn\r\n\r\n1. Thịt lợn chứa nhiều vitamin B1. Vitamin B1 rất cần thiết cho sự tăng trưởng, phục hồi cơ bắp và các mô thần kinh. Nó cũng có ích trong quá trình chuyển hóa carbohydrate.\r\n\r\n2. Sự hiện diện của vitamin B2 (riboflavin) giúp bảo vệ làn da và sức khỏe. Nó có vai trò quan trọng trong việc sữa chữa các tế bào hư hại và chuyển hóa năng lượng từ thức ăn.\r\n\r\n3. Vitamin B6 có trong thịt lợn hỗ trợ quá trình chuyển hóa các chất béo, protein và carbohydrate, đồng thời giữ cho các chức năng của hệ thần kinh hoạt động bình thường.\r\n\r\n4. Thịt lợn thúc đẩy việc sản xuất tế bào máu của cơ thể.\r\n\r\n5. Sắt chứa trong thịt lợn giúp tăng cường quá trình sản xuất năng lượng và sắt từ thịt mà cơ thể có thể dễ dàng hấp thu.\r\n\r\n6. Thịt lợn bảo vệ cấu trúc xương, giúp xương và răng chắc khỏe, cũng như đảm bảo mức năng lượng của cơ thể.\r\n\r\n7. Kẽm có trong thịt lợn có tác dụng tăng cường hệ thống miễn dịch và cải thiện sức đề kháng giúp cơ thể chống lại nhiều bệnh tật.\r\n\r\n8. Thịt lợn chứa hàm lượng cao protein và các axit amin, rất cần thiết đối với những người quan tâm đến việc xây dựng hình thể.\r\n\r\n9. Thịt lợn tốt cho da, mắt, hệ thần kinh, xương và hoạt động trí óc. Ăn thịt lợn cũng đảm bảo khả năng miễn dịch tốt hơn do có sự hiện diện của các chất chống oxy hóa quan trọng.', '2022-05-17 03:34:50', '2022-05-17 03:34:50', 0),
(25, 6, 'Ba chỉ bò Mỹ', 570000, 'kg', 'Vinmart', 10, 'Trong 100g thịt bò có tới 28g protein cùng rất nhiều vitaminh B12, B6, khoáng chất cacnitin, kali, kẽm, magie, sắt, cung cấp 280kcal năng lượng, gấp đôi so với cá và nhiều loại thịt động vật khác.\r\n\r\nLà thực phẩm không thể thiếu trong thực đơn những ai muốn ăn kiêng hay những người năng chơi thể thao, thịt bò giúp tăng cường sức khỏe, ngăn ngừa bệnh tật và thúc đẩy quá trình hình thành các protein mới. Ngoài ra, nó còn hỗ trợ tích cực cho việc phục hồi cơ thể sau những buổi tập luyện mệt mỏ.\r\n\r\nTrong 100g thịt bò có tới 28g protein cùng rất nhiều vitaminh B12, B6, khoáng chất cacni tin , kali, kẽm, magie, sắt. Đồng thời, khối lượng thịt đó sẽ cung cấp 280kcal năng lượng, gấp đôi so với cá và nhiều loại thịt động vật khác.\r\n\r\nĐiểm đặc biệt của protein trong thịt bò đó là nó chứa nhiều acid amin, acid gốc nitro, giúp biến protein trong thức ăn thành đường hữu cơ để cung cấp cho các hoạt động hàng ngày. Ngoài ra, thịt bò còn chứa acid linoleic và palmiotelic chống lại ung thư và các mầm bệnh khác.\r\n\r\nCùng một khối lượng thịt bò nhưng mỗi cách chế biến mang lại nguồn dinh dưỡng và năng lượng rất khác nhau. Tốt nhất là món thịt bò bít tết. Bởi lẽ, với cách chế biến này sẽ giúp cho các khoáng chất trong đó đạt được hiệu quả tối đa.\r\n\r\n \r\n\r\nThịt bò rất giàu chất sắt có tác dụng bổ sung lượng máu cho cơ thể và phòng tránh cơ thể bị thiếu máu. Ảnh minh họa\r\n\r\nHàm lượng acid béo trong thịt bò thấp nhưng lại giàu axit linoleic tổng hợp, có hiệu quả chống lại các chất chống oxy hóa có khả năng phát tác khi tập các môn thể thao như cử tạ gây tổn thương mô. Ngoài ra, các axit linoleic cũng có thể tham gia quá trình duy trì cơ bắp.\r\n\r\nTrong thịt bò chứa nhiều khoáng chất như protein, kali, mà hai khoáng chất này lại không thể thiếu trong chế độ dinh dưỡng. Mức độ kali thấp ức chế tổng hợp protein cũng như sản xuất hormone tăng trưởng, sẽ ảnh hưởng đến sự phát triển của cơ bắp.\r\n\r\nMagiê và kẽm góp phần tổng hợp protein và chất chống oxy hóa để thúc đẩy tăng trưởng cơ bắp. Muối của axit glutamic và vitamin B6 và kẽm tương tác với nhau tăng cường hệ thống miễn dịch và quan trọng hơn có thể làm tăng hiệu quả của sự trao đổi chất insulin.\r\n\r\nThịt bò chứa nhiều vitamin B12. Vitamin B12 cần thiết cho các tế bào, nhất là các tế bào máu đỏ mang oxy đến các mô cơ. Vitamin B12 thúc đẩy nhánh chuỗi amino acid chuyển hóa, do đó cung cấp năng lượng cần thiết cho cơ thể trong những hoạt động cường độ cao.', '2022-05-17 03:41:29', '2022-05-17 03:41:29', 0),
(26, 6, 'Thị bò Kobe', 600000, 'kg', 'Vinmart', 0, 'Trong 100g thịt bò có tới 28g protein cùng rất nhiều vitaminh B12, B6, khoáng chất cacnitin, kali, kẽm, magie, sắt, cung cấp 280kcal năng lượng, gấp đôi so với cá và nhiều loại thịt động vật khác. Là thực phẩm không thể thiếu trong thực đơn những ai muốn ăn kiêng hay những người năng chơi thể thao, thịt bò giúp tăng cường sức khỏe, ngăn ngừa bệnh tật và thúc đẩy quá trình hình thành các protein mới. Ngoài ra, nó còn hỗ trợ tích cực cho việc phục hồi cơ thể sau những buổi tập luyện mệt mỏ. Trong 100g thịt bò có tới 28g protein cùng rất nhiều vitaminh B12, B6, khoáng chất cacni tin , kali, kẽm, magie, sắt. Đồng thời, khối lượng thịt đó sẽ cung cấp 280kcal năng lượng, gấp đôi so với cá và nhiều loại thịt động vật khác. Điểm đặc biệt của protein trong thịt bò đó là nó chứa nhiều acid amin, acid gốc nitro, giúp biến protein trong thức ăn thành đường hữu cơ để cung cấp cho các hoạt động hàng ngày. Ngoài ra, thịt bò còn chứa acid linoleic và palmiotelic chống lại ung thư và các mầm bệnh khác. Cùng một khối lượng thịt bò nhưng mỗi cách chế biến mang lại nguồn dinh dưỡng và năng lượng rất khác nhau. Tốt nhất là món thịt bò bít tết. Bởi lẽ, với cách chế biến này sẽ giúp cho các khoáng chất trong đó đạt được hiệu quả tối đa. Thịt bò rất giàu chất sắt có tác dụng bổ sung lượng máu cho cơ thể và phòng tránh cơ thể bị thiếu máu. Ảnh minh họa Hàm lượng acid béo trong thịt bò thấp nhưng lại giàu axit linoleic tổng hợp, có hiệu quả chống lại các chất chống oxy hóa có khả năng phát tác khi tập các môn thể thao như cử tạ gây tổn thương mô. Ngoài ra, các axit linoleic cũng có thể tham gia quá trình duy trì cơ bắp. Trong thịt bò chứa nhiều khoáng chất như protein, kali, mà hai khoáng chất này lại không thể thiếu trong chế độ dinh dưỡng. Mức độ kali thấp ức chế tổng hợp protein cũng như sản xuất hormone tăng trưởng, sẽ ảnh hưởng đến sự phát triển của cơ bắp. Magiê và kẽm góp phần tổng hợp protein và chất chống oxy hóa để thúc đẩy tăng trưởng cơ bắp. Muối của axit glutamic và vitamin B6 và kẽm tương tác với nhau tăng cường hệ thống miễn dịch và quan trọng hơn có thể làm tăng hiệu quả của sự trao đổi chất insulin. Thịt bò chứa nhiều vitamin B12. Vitamin B12 cần thiết cho các tế bào, nhất là các tế bào máu đỏ mang oxy đến các mô cơ. Vitamin B12 thúc đẩy nhánh chuỗi amino acid chuyển hóa, do đó cung cấp năng lượng cần thiết cho cơ thể trong những hoạt động cường độ cao.', '2022-05-17 03:42:29', '2022-05-17 03:42:29', 0),
(27, 6, 'Thị bò Canada', 480000, 'kg', 'Vinmart', 10, 'Chắc các ấy cũng biết, các loại thịt động vật có vai trò hết sức quan trọng trong khẩu phần ăn của chúng mình. Nó tham gia vào quá trình hình thành, thay thế và phân hủy các tế bào trong cơ thể. Bên cạnh đó, thịt động vật còn rất cần thiết cho việc chuyển hóa các chất dinh dưỡng cung cấp cho cơ thể. Quan trọng nhất là protein cùng vitamin và chất khoáng đó mà!\r\n\r\nThịt bò\r\n\r\n\r\n\r\nLà thực phẩm không thể thiếu trong thực đơn của ấy nào muốn ăn kiêng hay những teens năng chơi thể thao, thịt bò giúp chúng mình tăng cường sức khỏe, ngăn ngừa bệnh tật và thúc đẩy quá trình hình thành các protein mới. Ngoài ra, nó còn hỗ trợ tích cực cho việc phục hồi cơ thể sau những buổi tập luyện mệt mỏi đấy teens ạ!\r\n\r\nCác ấy có biết, trong 100g thịt bò có tới 28g protein cùng rất nhiều vitaminh B12, B6, khoáng chất cacnitin, kali, kẽm, magie, sắt... cơ đấy! Đồng thời, khối lượng thịt đó sẽ cung cấp cho chúng mình 280kcal năng lượng, gấp đôi so với cá và nhiều loại thịt động vật khác.\r\n\r\nĐiểm đặc biệt của protein trong thịt bò đó là nó chứa nhiều acid amin, acid gốc nitro. Chúng sẽ giúp các ấy biến protein trong thức ăn thành đường hữu cơ để cung cấp cho các hoạt động hàng ngày. Ngoài ra, thịt bò còn chứa acid linoleic và palmiotelic chống lại ung thư và các mầm bệnh khác nữa nhá!', '2022-05-17 03:44:04', '2022-05-17 03:44:04', 0),
(28, 6, 'Thịt lợn nạc vai', 65000, 'kg', 'Vinmart', 0, 'Chất béo trong thịt lợn không phải là chất béo chuyển hóa mà chủ yếu là chất béo không bão hòa đơn và không bão hòa đa. Do đó, thịt lợn phù hợp với các chế độ ăn tốt cho tim mạch hoặc để giảm lượng cholesterol. Thịt lợn rất giàu khoáng chất như phốt pho, selenium, natri, kẽm, kali và đồng. Ngoài ra nó còn chứa hàm lượng sắt và magiê cao, tuy nhiên lượng canxi và mangan thì khá là ít ỏi. Thịt lợn là một nguồn cung vitamin phong phú như vitamin B1, B2, B5, B6, B12 và PP. Vitamin A và E cũng được tìm thấy tuy rất ít. Hàm lượng calo trong 100 gam thịt lợn là 458 calo.', '2022-05-17 03:52:12', '2022-05-17 03:52:12', 0),
(29, 3, 'Măng cụt chín', 165000, 'kg', 'Vinmart', 30, 'Măng cụt có nguồn gốc từ Mã Lai và Indonesia, được trồng từ hàng chục thế kỷ, cây đã được Thuyền Trưởng Cook mô tả khá chi tiết từ năm 1770, và được đưa đến Sri Lanka vào năm 1800, được trồng tại Anh trong các nhà kiếng (green house) từ 1855, sau đó đưa đến West Indies từ giữa thế kỷ 19. Đây là một loại cây đòi hỏi điều kiện thổ nhưỡng khắt khe cần khí hậu nóng và ẩm, cây tăng trưởng rất chậm, sau 2-3 năm cây chỉ cao đến đầu gối, chỉ bắt đầu cho quả sau 10-15 năm.. Cây đã được các nhà truyền giáo du nhập vào Nam Việt Nam từ lâu, trồng nhiều nhất tại Lái Thiêu, Thủ Dầu Một. Việt Nam đã có lúc là nơi có những vườn măng cụt lớn nhất thế giới, với những vườn rộng hàng chục mẫu, có hàng ngàn cây, mỗi cây cho được từ 700 đến 900 quả. Cây hiện được trồng nhiều tại Thái Lan, Kampuchea, Myanmar (Miến điện), Sri Lanka và Philippines.\r\n\r\nHiện có khoảng 100 loài khác nhau được nuôi trồng.\r\n\r\nMăng cụt thuộc loại cây to, trung bình 7-12 m nhưng có thể cao đến 20- 25 m, thân có vỏ màu nâu đen xậm, có nhựa (resin) màu vàng. Lá dày và cứng, bóng, mọc đối, mặt trên của lá có màu xậm hơn mặt dưới, hình thuôn dài 15-25 cm, rộng 6-11 cm, cuống dài 1.2-2.5 cm. Hoa đa tính thường là hoa cái và hoa lưỡng tính. Hoa mọc đơn độc hay từng đôi. Hoa loại lưỡng tính màu trắng hay hồng nhạt, có 4 lá đài và 4 cánh hoa, có 16-17 nhị và bầu noãn có 5-8 ô. Quả hình cầu tròn, đường kính chừng 4-7 cm, có mang đài hoa còn tồn tại; vỏ quả màu đỏ nâu, dai và xốp. Quả chứa 5-8 hạt: quanh hạt có lớp áo bọc màu trắng có vị ngọt, thơm và khá ngon. Cây trổ hoa vào tháng 2-5, ra quả trong các tháng 5-8. (giống Garcinia còn gồm một số cây tương cận, đa số mọc trong vùng Đông Ấn = West Indies, trong đó có thể kể Garcinia cambogia hay Bứa, Garcinia cowa cung cấp quả Cowa-Mangosteen lớn hơn và có khía màu vàng apricot, vị chua; Garcinia indica hay Cocum = Conca cho quả chua, áo hạt màu tím, dùng làm giấm, hạt ép lấy dầu.)', '2022-05-17 03:59:58', '2022-05-17 03:59:58', 0),
(30, 3, 'Bười da xanh', 80000, 'kg', 'Vinmart', 0, 'có nhiều kích thước tùy giống, chẳng hạn bưởi da xanh chỉ có đường kính độ 15 cm, trong khi bưởi Năm Roi, bưởi Tân Triều (Biên Hòa), bưởi da xanh (Bến Tre) và nhiều loại bưởi khác thường gặp ở Việt Nam, Thái Lan có đường kính khoảng 18–20 cm.\r\n\r\nBưởi tiếng Anh gọi là Pomelo, tuy nhiên nhiều từ điển ở Việt Nam dịch bưởi ra thành grapefruit, thực ra grapefruit là tên gọi bằng tiếng Anh của bưởi chùm (Citrus paradisi) – loại cây lai giữa bưởi và cam, có quả nhỏ hơn, vỏ giống cam, mùi bưởi, ruột màu hồng, vị chua hơi đắng.\r\n\r\n \r\n\r\nQuả bưởi và bòng là 2 trái khác nhau. So với quả bưởi, bòng nhỏ và tròn hơn. Nếu đường kính trái bưởi là 18–20 cm thì trái bòng có kích thước trung bình nhỏ hơn khoảng 13–15 cm. Hạt quả bòng nhỏ hơn nhưng lại dày hơn của trái bưởi, tép cũng nhỏ hơn. Về mùi vị, trái bưởi có mùi thơm nhẹ nhàng, ngọt ngào hơn. Ngoài ra, so với trái bưởi, bòng chua hơn nhiều và so với vị thanh và ngọt của trái bưởi.\r\n\r\n \r\n\r\nBưởi là một trong những trái cây chứa nhiều vitamin, nó không chỉ dễ ăn, vị ngọt mát mà còn chứa rất ít calorie, bưởi còn giúp bạn có được làn da đẹp và có tác dụng bổ dưỡng cơ thể, phòng và chữa một số bệnh như cao huyết áp, đau dạ dày, tiểu đường… Bưởi có chứa đường, phốt pho, sắt, caroten, vitamin B1, B2, C, PP và tinh dầu nằm ở vỏ, thành phần chủ yếu là xitronelol. Hạt bưởi chứa một loại este, dầu, prôtit, chất xơ… Chất glucôxit trong vỏ bưởi có tác dụng chống viêm, chống vi trùng; nước quả tươi có thể làm hạ đường trong máu.', '2022-05-17 04:06:54', '2022-05-17 04:06:54', 0),
(31, 3, 'Sầu riêng Miền Nam', 60000, 'kg', 'Vinmart', 10, 'Nếu bạn tiêu thụ khoảng 234g sầu riêng điều đó tương đương với bạn hấp thụ khoảng 20% lượng carbohydrate cần trong một ngày. Như thế sầu riêng chính là lựa chọn hoàn hảo dành cho bạn khi đang có nhu cầu bổ sung thêm năng lượng cho cơ thể, bởi lẽ chỉ cần ăn 1/5 trái sầu riêng bạn đã có thể bổ sung nguồn năng lượng cần thiết cho cả một ngày dài. \r\n\r\nChứa nhiều Vitamin B Sầu riêng có chứa một lượng vitamin B khá cao, các vitamin B sẽ có một loạt các lợi ích cho sức khỏe như ngăn ngừa lão hóa và bệnh tim, giúp tăng HDL (cholesterol tốt) và thậm chí có thể giúp cải thiện tâm trạng, giảm bớt trầm cảm.', '2022-05-17 04:07:54', '2022-05-17 04:07:54', 0);
INSERT INTO `product` (`id`, `cate_id`, `title`, `price`, `unit`, `country`, `discount`, `description`, `created_At`, `updated_At`, `deleted`) VALUES
(32, 3, 'Xoài xiêm', 30000, 'kg', 'Vinmart', 0, 'Xoài có là loại trái cây ưa thích của bạn? Xoài là loại quả rất quen thuộc hàng ngày. Thế nhưng những lợi ích bất ngờ từ nguồn dinh dưỡng trong xoài thì không phải ai cũng biết.\r\n\r\nThành phần dinh dưỡng trong xoài\r\nKhông phải tự nhiên mà xoài được mệnh danh là “vua của các loại quả”. Do nguồn dinh dưỡng trong xoài là vô tận. Người ta ước tính cứ một cốc sinh tố xoài mang đến 103 calo. Xoài chứa rất nhiều các loại vitamin, trong đó phải kể đến vitamin C, A, B, B6, B….Hơn nữa trong xoài còn có các lợi khuẩn và khoáng chất cần thiết (đồng, kali, magie).\r\n\r\n \r\n\r\nNhững lợi ích từ xoài\r\nTăng sức đề kháng\r\nTrong xoài có hàm lượng vitamin C và B1 rất cao. Chúng làm nhiệm vụ tăng cường hệ thống miễn dịch, nâng cao sức đề kháng cho cơ thể. Ăn xoài thường xuyên hoặc uống một cốc nước ép xoài hàng ngày giúp bạn đẩy lùi được bệnh tật.\r\n\r\nTình trạng thiếu máu gây nên các triệu chứng mệt mỏi, chóng mặt, choáng váng, suy giảm trí nhớ. Nó ảnh hưởng không ít đến sức khỏe, công việc và cuộc sống. Tuy nhiên nếu biết ăn uống đúng cách, bạn hoàn toàn có thể phòng ngừa được chứng bệnh…\r\n\r\nTốt cho hệ tiêu hóa\r\nNgoài đu đủ, xoài cũng chứa enzym chuyển hóa protein có lợi cho hoạt động tiêu hóa. Hơn nữa, với lượng chất xơ dồi dào, xoài còn giúp phòng ngừa táo bón hiệu quả.\r\n\r\nNgăn ngừa ung thư\r\nTrong xoài có nhiều hợp chất chống oxy hóa có khả năng bảo vệ cơ thể khỏi các tác nhân gây ung thư. Một số có thể kể đến như: methylgallat, astragalin, isoquercitrin…Nhờ vậy mà loại quả này giúp ngăn ngừa các căn bệnh ung thư phổ biến như ung thư vú, tuyến tiền liệt hay ung thư ruột kết.\r\n\r\nGiảm lượng cholesterol\r\nVới hàm lượng vitamin C dồi dào cùng chất xơ và pectin, xoài được biết đến như một loại quả phòng ngừa tình trạng mỡ trong máu. Đặc biệt là giảm nồng độ cholesterol trong huyết thanh. Các chuyên gia dinh dưỡng khuyên bạn nên ăn xoài thường xuyên để đẩy lùi căn bệnh rối loạn mỡ trong máu.\r\n\r\nCải thiện thị lực\r\nMột cốc nước ép xoài có chứa đến 24% lượng vitamin A hàng ngày cần thiết cho cơ thể. Nếu bổ sung đầy đủ loại vitamin này, bạn sẽ ngăn ngừa các chứng bệnh về mắt. Ngoài ra, xoài còn giúp nâng cao thị lực, bảo vệ đôi mắt.\r\n\r\nLàm đẹp da\r\nHầu hết các loại trái cây đều giúp đẹp da, và xoài cũng không ngoại lệ. Xoài giúp se khít và làm sạch lỗ chân lông. Nhờ vậy mà giảm tình trạng mụn ở các bạn gái. Hơn nữa, vitamin C có trong xoài cũng giúp da dẻ hồng hào và sáng mịn hơn.\r\n\r\n \r\n\r\nHỗ trợ giảm cân hiệu quả\r\nXoài có hàm lượng chất xơ cao, làm chậm tiến trình hấp thu đường vào máu. Ăn xoài giúp bạn kiểm soát được cân nặng. Bạn có thể ăn trực tiếp hoặc xay lấy nước ép, làm sinh tố. Đối với xoài xanh, bạn có thể làm gỏi. Còn theo các chuyên gia bạn cũng nên tận dụng cả vỏ xoài. Bởi những chiết xuất được phát hiện trong vỏ xoài có tác dụng làm giảm sự hình thành tế bào mỡ trong cơ thể. Vì thế, xoài là loại trái cây không thể thiếu cho những ai đang trong quá trình ăn kiêng hoặc muốn giảm cân.', '2022-05-17 04:09:36', '2022-05-17 04:09:36', 0),
(33, 1, 'a', 1104100, 'kg', 'dgdfds', 10, 'dsadsads', '2022-05-17 12:00:01', '2022-05-17 12:00:01', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `phone`, `role`) VALUES
(2, 'Lê Huy Hưng', 'lehuyhung29@gmail.com', 'Admin29@', '0975846467', 'admin'),
(3, 'Lê Huy Đức 28', 'lehuyduc@gmail.com', 'Huyduc13@', '0975846455', 'user'),
(4, 'Bùi Đức Chiến 29', 'chien@gmail.com', 'Chien2909@', '0975846467', 'user');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_feedback_user` (`user_id`);

--
-- Chỉ mục cho bảng `galery`
--
ALTER TABLE `galery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_galery_product` (`product_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_user` (`user_id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_detail_product` (`product_id`),
  ADD KEY `fk_order_detail_orders` (`order_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_category` (`cate_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `galery`
--
ALTER TABLE `galery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `fk_feedback_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `galery`
--
ALTER TABLE `galery`
  ADD CONSTRAINT `fk_galery_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `fk_order_detail_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `fk_order_detail_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`cate_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
