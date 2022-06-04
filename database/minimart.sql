-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 04, 2022 lúc 07:29 PM
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
-- Cơ sở dữ liệu: `minimart`
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
(1, 'Khác', '2022-06-02 18:01:24', '2022-06-02 18:01:24'),
(3, 'Rau củ', '2022-06-03 16:53:53', '2022-06-03 16:53:53'),
(4, 'Hải sản', '2022-06-03 16:54:00', '2022-06-03 16:54:00'),
(5, 'Hoa quả trong nước', '2022-06-03 16:54:15', '2022-06-03 16:54:15'),
(6, 'Hoa quả nhập khẩu', '2022-06-03 16:54:27', '2022-06-03 16:54:27'),
(7, 'Hoa quả sấy', '2022-06-03 16:54:41', '2022-06-03 16:54:41'),
(9, 'Thịt các loại', '2022-06-04 12:20:40', '2022-06-04 12:20:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(20) NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `galery`
--

CREATE TABLE `galery` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `thumbnail` varchar(500) NOT NULL,
  `created_At` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `galery`
--

INSERT INTO `galery` (`id`, `product_id`, `thumbnail`, `created_At`) VALUES
(7, 4, 'chuoi1.jpg', '2022-06-03 16:59:04'),
(8, 4, 'chuoi2.jpg', '2022-06-03 16:59:04'),
(9, 4, 'chuoi3.jpg', '2022-06-03 16:59:04'),
(10, 4, 'chuoi4.jpg', '2022-06-03 16:59:04'),
(11, 5, 'xoai1.jpg', '2022-06-03 19:08:45'),
(12, 5, 'xoai2.jpg', '2022-06-03 19:08:45'),
(13, 5, 'xoai3.jpg', '2022-06-03 19:08:45');

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
  `total_money` int(11) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `phone`, `address`, `note`, `order_date`, `total_money`, `reason`, `status`) VALUES
(2, 2, 'huy hung', 'lehuyhung2909@gmail.com', '0975846469', 'Thôn Thọ Đa, Kim Nỗ, Đông Anh,  Hà Nội', 'sadsadsadasd', '2022-06-04 09:25:17', 270000, 'Không muốn nhận hàng', 3),
(3, 2, 'Lê Huy Hưng', 'thao@gmail.com', '0187846146', 'Thôn Thọ Đa, Kim Nỗ, Đông Anh,  Hà Nội', 'saddsadasdsadsad', '2022-06-04 09:28:52', 150000, 'Khách không nhận hàng', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `product_id`, `price`, `quantity`, `total`) VALUES
(2, 4, 150000, 1, 150000),
(2, 5, 120000, 1, 120000),
(3, 4, 150000, 1, 150000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `country` varchar(50) NOT NULL,
  `discount` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `created_At` datetime NOT NULL,
  `updated_At` datetime NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `cate_id`, `title`, `price`, `unit`, `country`, `discount`, `quantity`, `description`, `created_At`, `updated_At`, `deleted`) VALUES
(4, 6, 'Chuối Nam Mỹ', 150000, 'kg', 'Vinmart', 0, 900, '&lt;p&gt;Chuối là một loại thực phẩm, đồng thời cũng là một dược liệu thiên nhiên để hỗ trợ cho nhiều căn bệnh. So với quả táo, chuối có hàm lượng carbohydrate cao gấp 2 lần, protein cao gấp 4 lần, vitamin A và sắt cao gấp 5 lần, những loại vitamin và khoáng chất khác cao gấp 2 lần, hàm lượng phosphorus cao gấp 3 lần.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;Nhớ lại trận bão larry ở queensland năm 2005 đã tàn phá hầu như toàn bộ các vườn chuối trên tiểu bang này (queensland là “thủ đô” chuối của Úc), khiến giá cả chuối tăng lên gấp 10 lần. Lúc này, các bệnh nhân cao huyết áơ “lục đục” rủ nhau đến dịch vụ chăm sóc y tế để… đòi tiền mua chuối, nhưng vì chưa có ai lo xa đến tình huống này nên dịch vụ này cũng đành “bó tay”. Kể câu chuyện này ra, chỉ muốn nói lên tầm quan trọng của loại trái cây dân dã này.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;Chuối là một loại thực phẩm, đồng thời cũng là một dược liệu thiên nhiên để hỗ trợ cho nhiều căn bệnh. So với quả táo, chuối có hàm lượng carbohydrate cao gấp 2 lần, protein cao gấp 4 lần, vitamin A và sắt cao gấp 5 lần, những loại vitamin và khoáng chất khác cao gấp 2 lần, hàm lượng phosphorus cao gấp 3 lần.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;Trong chuối, hàm lượng kali (potassium) chiếm tỉ lệ rất cao, chứa nhiều loại đường thiên nhiên như: fructose, sucrose, glucose, cung cấp một năng lượng dồi dào cho cơ thể. Hai quả chuối có thể cung cấp năng lượng cho 90 phút luyện tập thể thao. Không những thế, chuối còn giúp điều trị một số bệnh, nhờ đó, chuối được xếp vào hạng “top” trong thực đơn hàng ngày.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;Chuối là nguồn cung cấp fructooligosaccharides, một chất quan trọng để nuôi dưỡng những loại vi khuẩn có lợi trong đường ruột, giúp chức năng ruột hoạt động tốt hơn, nhờ đó, cơ thể sẽ hấp thu vitamin và các chất dinh dưỡng một cách hiệu quả hơn. Sự tăng hấp thu này sẽ đem nhiều canxi hơn tới xương chúng ta, giúp cho bộ xương vững chắc hơn.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;Đối với dạ dày, những hợp chất có trong quả chuối sẽ giúp nuôi dưỡng tế bào thành ruột, tạo nên một hàng rào dịch nhầy vững mạnh có đủ sức để chiến đấu chống lại những loại vi khuẩn gây lở loét dạ dày.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;Khi chúng ta bị tiêu chảy (đặc biệt trong mùa dịch tiêu chảy), chuối có thể cung cấp tức thời các chất điện giải mà cơ thể bị mất, trong đó, kali là chất quan trọng nhất. Kali là một loại khoáng chất quan trọng giúp mang oxy tới não, điều hòa nhịp tim và cân bằng nước trong cơ thể.&lt;/p&gt;&lt;p&gt;Nhờ hàm lượng cao kali và hàm lượng thấp natri có trong chuối đã giúp chuối vươn lên hàng thực phẩm “vua” trong việc hạ huyết áp và giảm nguy cơ đột quị. Theo tạp chí The New England Journal of Medicine, ăn chuối đều đặn có thể làm giảm tần suất tử vong do đột quị tới 40%. Hiện tại, FDA đã cho phép các công ty chuối đóng “mác” giảm huyết áp và ngăn ngừa đột quị trên các bao bì sản phẩm của họ.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;Khi bị táo bón, ăn chuối sẽ được cung cấp chất xơ, vốn làm gia tăng chức năng ruột. Khi mắc các chứng bệnh về dạ dày, chuối cũng giúp cải thiện triệu chứng do chứa những chất có tác dụng làm giảm độ acid (antacid).&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;Trong chuối cũng chứa một hàm lượng cao sắt, kích thích cơ thể tạo ra hemoglobin giúp ngăn chặn sự thiếu máu. Một hợp chất khác có trong chuối là tryptophan, chất này vào cơ thể sẽ được chuyển hóa thành serotonin. Đây là một chất hóa học giúp điều hòa trạng thái cơ thể. Cùng với serotonin, những vitamin nhóm B trong chuối cũng giúp điều hòa glucose huyết (nồng độ glucose huyết sẽ ảnh hưởng đến trạng thái tinh thần).&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;Những loại đường thiên nhiên có trong chuối giúp điều hòa nồng độ đường huyết, giúp cải thiện tình trạng stress do thực phẩm gây ra, giúp cải thiện sức khỏe cho thai phụ. Chuối thường được “ăn dặm” sau những bữa ăn sẽ có tác dụng kiểm soát nồng độ đường huyết.&lt;/p&gt;', '2022-06-03 16:59:04', '2022-06-04 09:28:52', 0),
(5, 6, 'Xoài Nam Phi', 150000, 'kg', 'Vinmart', 20, 199, '&lt;p&gt;&lt;strong&gt;Xoài có là loại trái cây ưa thích của bạn? Xoài là loại quả rất&amp;nbsp;quen thuộc hàng ngày. Thế nhưng những lợi ích bất ngờ từ nguồn&amp;nbsp;dinh dưỡng&amp;nbsp;trong xoài thì không phải ai cũng biết.&lt;/strong&gt;&lt;/p&gt;&lt;h2&gt;Thành phần dinh dưỡng trong xoài&lt;/h2&gt;&lt;p&gt;Không phải tự nhiên mà xoài được mệnh danh là “vua của các loại quả”. Do nguồn dinh dưỡng trong xoài là vô tận. Người ta ước tính cứ một cốc sinh tố xoài mang đến 103 calo. Xoài chứa rất nhiều các loại&amp;nbsp;vitamin, trong đó phải kể đến&amp;nbsp;vitamin C, A, B, B6, B….Hơn nữa trong xoài còn có các lợi khuẩn và khoáng chất cần thiết (đồng, kali, magie).&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;h2&gt;Những lợi ích từ xoài&lt;/h2&gt;&lt;h3&gt;Tăng sức đề kháng&lt;/h3&gt;&lt;p&gt;Trong xoài có hàm lượng&amp;nbsp;vitamin&lt;a href=&quot;https://dinhduong.online/tag/vitamin-c&quot;&gt; C&lt;/a&gt;&amp;nbsp;và B1 rất cao. Chúng làm nhiệm vụ tăng cường hệ thống miễn dịch,&amp;nbsp;nâng cao sức đề kháng&amp;nbsp;cho cơ thể. Ăn xoài thường xuyên hoặc uống một cốc nước ép xoài hàng ngày giúp bạn đẩy lùi được bệnh tật.&lt;/p&gt;&lt;p&gt;Tình trạng thiếu máu gây nên các triệu chứng mệt mỏi, chóng mặt, choáng váng, suy giảm trí nhớ. Nó ảnh hưởng không ít đến sức khỏe, công việc và cuộc sống. Tuy nhiên nếu biết ăn uống đúng cách, bạn hoàn toàn có thể phòng ngừa được chứng bệnh…&lt;/p&gt;&lt;h3&gt;Tốt cho hệ tiêu hóa&lt;/h3&gt;&lt;p&gt;Ngoài đu đủ, xoài cũng chứa&amp;nbsp;enzym chuyển hóa&amp;nbsp;protein&amp;nbsp;có lợi cho hoạt động&amp;nbsp;tiêu hóa. Hơn nữa, với&amp;nbsp;lượng chất xơ dồi dào, xoài còn giúp&amp;nbsp;phòng ngừa táo bón&amp;nbsp;hiệu quả.&lt;/p&gt;&lt;h3&gt;Ngăn ngừa ung thư&lt;/h3&gt;&lt;p&gt;Trong xoài có nhiều hợp chất chống oxy hóa có khả năng bảo vệ cơ thể khỏi các tác nhân gây ung thư. Một số có thể kể đến như:&amp;nbsp;methylgallat,&amp;nbsp;astragalin,&amp;nbsp;isoquercitrin…Nhờ vậy mà loại quả này giúp ngăn ngừa các căn bệnh ung thư phổ biến như ung thư vú, tuyến tiền liệt hay ung thư ruột kết.&lt;/p&gt;&lt;h3&gt;Giảm lượng cholesterol&lt;/h3&gt;&lt;p&gt;Với hàm lượng vitamin C dồi dào cùng chất xơ và pectin, xoài được biết đến như một loại quả phòng ngừa tình trạng&amp;nbsp;mỡ trong máu. Đặc biệt là giảm nồng độ&amp;nbsp;cholesterol trong huyết thanh. Các chuyên gia dinh dưỡng khuyên bạn nên ăn xoài thường xuyên để đẩy lùi căn bệnh rối loạn mỡ trong máu.&lt;/p&gt;&lt;h3&gt;Cải thiện thị lực&lt;/h3&gt;&lt;p&gt;Một cốc nước ép xoài có chứa đến 24% lượng&amp;nbsp;vitamin A&amp;nbsp;hàng ngày cần thiết cho cơ thể. Nếu bổ sung đầy đủ loại vitamin này, bạn sẽ ngăn ngừa các chứng bệnh về mắt. Ngoài ra, xoài còn giúp nâng cao thị lực, bảo vệ đôi mắt.&lt;/p&gt;&lt;h3&gt;Làm đẹp da&lt;/h3&gt;&lt;p&gt;Hầu hết các loại trái cây đều giúp đẹp da, và xoài cũng không ngoại lệ. Xoài giúp se khít và làm sạch lỗ chân lông. Nhờ vậy mà&amp;nbsp;giảm tình trạng mụn&amp;nbsp;ở các bạn gái. Hơn nữa, vitamin C có trong xoài cũng giúp da dẻ hồng hào và sáng mịn hơn.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;h3&gt;Hỗ trợ giảm cân hiệu quả&lt;/h3&gt;&lt;p&gt;Xoài có hàm lượng chất xơ cao, làm chậm tiến trình hấp thu đường vào máu. Ăn xoài giúp bạn kiểm soát được cân nặng. Bạn có thể ăn trực tiếp hoặc xay lấy nước ép, làm sinh tố. Đối với xoài xanh, bạn có thể làm gỏi. Còn theo các chuyên gia bạn cũng nên tận dụng cả vỏ xoài. Bởi&amp;nbsp;những chiết xuất được phát hiện trong vỏ xoài có tác dụng làm giảm sự hình thành tế bào mỡ trong cơ thể. Vì thế, xoài là loại trái cây không thể thiếu cho những ai đang trong quá trình ăn kiêng hoặc muốn&amp;nbsp;giảm cân.&lt;/p&gt;', '2022-06-03 19:08:45', '2022-06-04 09:25:17', 0);

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
  `role` varchar(20) NOT NULL,
  `disable` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `phone`, `role`, `disable`) VALUES
(1, 'Lê Huy Hưng', 'lehuyhung29@gmail.com', 'Admin29@', '0975846466', 'admin', 0),
(2, 'Lê Huy Đức', 'lehuyduc@gmail.com', 'Huyduc13@', '0975846469', '', 0);

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
  ADD PRIMARY KEY (`order_id`,`product_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `galery`
--
ALTER TABLE `galery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
