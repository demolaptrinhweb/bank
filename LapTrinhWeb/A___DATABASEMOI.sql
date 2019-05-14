-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2019 at 01:51 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `uname` char(25) DEFAULT NULL,
  `pwd` char(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uname`, `pwd`) VALUES
(1, 'admin', 'password123');

-- --------------------------------------------------------

--
-- Table structure for table `chuyentien`
--

CREATE TABLE `chuyentien` (
  `id_chuyentien` int(11) NOT NULL,
  `chuyentienid` varchar(50) NOT NULL,
  `ngaytao` date DEFAULT NULL,
  `id_chuyen` varchar(25) DEFAULT NULL,
  `id_nhan` varchar(25) DEFAULT NULL,
  `sotien` float DEFAULT NULL,
  `noidung` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chuyentien`
--

INSERT INTO `chuyentien` (`id_chuyentien`, `chuyentienid`, `ngaytao`, `id_chuyen`, `id_nhan`, `sotien`, `noidung`) VALUES
(14, 'GD0100561550', '2019-05-10', '11', '321', 10000, ' jdoajosd 123'),
(15, 'GD0100595142', '2019-05-10', '11', '512', 10000, ' jdoajosd 123'),
(16, 'GD0100545362', '2019-05-10', '11', '123', 10000, ' jdoajosd 123');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `aadhar_no` int(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `branch` varchar(30) DEFAULT NULL,
  `account_no` int(11) DEFAULT NULL,
  `pin` int(4) DEFAULT NULL,
  `uname` varchar(30) DEFAULT NULL,
  `pwd` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `first_name`, `last_name`, `gender`, `dob`, `aadhar_no`, `email`, `phone_no`, `address`, `branch`, `account_no`, `pin`, `uname`, `pwd`) VALUES
(1, 'Nafees', 'Zakee', 'male', '1994-11-28', 123456789, 'zakee.nafees@gmail.com', '+91 8918722499', '22/10, Secondary Road, Durgapur - 713204', 'delhi', 1122334455, 1234, 'zakee94', 'nafees123'),
(2, 'Md Salman', 'Ali', 'male', '1994-10-11', 987654321, 'ali.salman@gmail.com', '+966 895432167', 'Al Ahsa Street Malaz, King Abdulaziz Rd, Alamal Dist. RIYADH 12643-2121.', 'riyadh', 1133557788, 1234, 'salman', 'salman123'),
(3, 'Tushar', 'Kr. Pandey', 'male', '1995-02-03', 125656765, 'tusharpkt@gmail.com', '+334 123456987', 'Champ de Mars, \r\n5 Avenue Anatole France, \r\n75007 Paris, France', 'paris', 1122338457, 1357, 'tushar', 'tushar123'),
(4, 'Jon', 'Snow', 'male', '1985-02-03', 129156787, 'jon.snow@gmail.com', '+1 8918332797', 'The Night Watch,\r\nKing in the North,\r\nThe North Remembers,\r\nWesteros.', 'newyork', 1233556739, 1234, 'jon', 'snow123');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `id_khachhang` int(11) NOT NULL,
  `khachhangid` varchar(25) NOT NULL,
  `taikhoanmacdinh` varchar(25) NOT NULL,
  `ho` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ten` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `loginid` varchar(255) NOT NULL,
  `pass` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `passchuyenkhoan` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthai` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngaytao` date NOT NULL,
  `max_chuyentien` double NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`id_khachhang`, `khachhangid`, `taikhoanmacdinh`, `ho`, `ten`, `loginid`, `pass`, `passchuyenkhoan`, `trangthai`, `ngaytao`, `max_chuyentien`, `email`) VALUES
(3, '11', '1', 'Lê Thanh', 'Tài', 'tai', '$2y$10$O/qJJjeSEcDnb7QNJorobuGmMKM6xjK1aT3kchqNU1Mn81kjuH1mu', '$2y$10$zKlqn1PLlTHG37MySYltLeV9J2CEyeFuN9H6dRO7QlhnVZG/H62Ze', '2', '2019-04-01', 500000, 'tai@email.com'),
(4, '22', '2', 'Lê Thi', 'Tú', 'tu', '$2y$10$sv5L4XVbokcMYTyzGHPzyOXRutcNNPvuC9.EVMhnmgRMsdpmqnfa6', '$2y$10$jVD0ePcGr96oJLQc7QnEyuVSlgTDgE8179SCGQfvkGKLQ.C.x7IfS', '2', '2019-04-01', 5000000, 'tu@email.com'),
(5, '33', '3', 'Lê Thị', 'Cẩm', 'cam', '$2y$10$WMzzER724LazXGRvqDwHl.ht0WQH5KgBQtOhgH2iw9z132LQ0cF9q', '$2y$10$yC05Q04rpxJkLGXEVzFWN.gSZM9x4ZNiXfgrix3dqHvc1ZaZycU/2', '2', '2019-04-01', 5000000, 'cam@email.com'),
(6, '44', '4', 'Lê Văn', 'Mập', 'map', '$2y$10$JxqiVh19nQp.bVyx5CvLMeUhhjmIxf3gLPXlPk.j5M8nEdokc2Gaa', '$2y$10$f98H00lL0inXycmm/yPAcOhr89L/dXmpnkOxJFUUICNn8iM8G4yTq', '2', '2019-04-01', 5000000, 'map@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `kieuvay`
--

CREATE TABLE `kieuvay` (
  `id_kieuvay` int(11) NOT NULL,
  `kieuvay` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `toida` double NOT NULL,
  `toithieu` double NOT NULL,
  `laixuat` double NOT NULL,
  `trangthai` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kieuvay`
--

INSERT INTO `kieuvay` (`id_kieuvay`, `kieuvay`, `toida`, `toithieu`, `laixuat`, `trangthai`) VALUES
(1, 'vaythuong', 10000, 10, 0.1, '2'),
(2, 'vayvip', 2000000, 20, 0.2, '2');

-- --------------------------------------------------------

--
-- Table structure for table `kyhanguitien`
--

CREATE TABLE `kyhanguitien` (
  `id_kyhan` int(11) NOT NULL,
  `kyhan_so` int(11) NOT NULL,
  `kyhan_chu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `laixuat` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kyhanguitien`
--

INSERT INTO `kyhanguitien` (`id_kyhan`, `kyhan_so`, `kyhan_chu`, `laixuat`) VALUES
(1, 14, '2 tuần', 0.1),
(2, 60, '2 tháng', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `theme` int(11) NOT NULL,
  `title` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `url_hinh` varchar(100) NOT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `theme`, `title`, `created`, `url_hinh`, `body`) VALUES
(1, 0, 'Hello World !', '2017-09-06 15:45:25', '', ''),
(2, 0, 'The First News !', '2017-09-06 15:45:55', '', ''),
(3, 0, 'Increasing Interest Rates !', '2017-09-06 15:46:21', '', ''),
(4, 0, 'GST on banking', '2017-11-19 16:39:35', '', ''),
(5, 2, 'Thông tin chung', '2019-05-14 00:00:00', 'hinh/nganhang.jpg', 'Ngân hàng hỗ trợ đầu tư Việt Nam trước đây, nay là Ngân hàng TMCP hỗ trợ đầu tư Việt Nam (S&TBank) được thành lập và chính thức đi vào hoạt động ngày 01/4/1963 với tổ chức tiền thân là Cục Ngoại hối (trực thuộc Ngân hàng Nhà nước Việt Nam). Là ngân hàng thương mại nhà nước đầu tiên được Chính phủ lựa chọn thực hiện thí điểm cổ phần hoá, Vietcombank chính thức hoạt động với tư cách là một ngân hàng thương mại cổ phần vào ngày 02/6/2008 sau khi thực hiện thành công kế hoạch cổ phần hóa thông qua việc phát hành cổ phiếu lần đầu ra công chúng. Ngày 30/6/2009, cổ phiếu S&TBank (mã chứng khoán VCB) chính thức được niêm yết tại Sở Giao dịch Chứng khoán TPHCM.<br>\r\n					Trải qua hơn 50 năm xây dựng và trưởng thành, S&TBank đã có những đóng góp quan trọng cho sự ổn định và phát triển của kinh tế đất nước, phát huy tốt vai trò của một ngân hàng đối ngoại chủ lực, phục vụ hiệu quả cho phát triển kinh tế trong nước, đồng thời tạo những ảnh hưởng quan trọng đối với cộng đồng tài chính khu vực và toàn cầu.<br>\r\n					Từ một ngân hàng chuyên doanh phục vụ kinh tế đối ngoại, S&TBank ngày nay đã trở thành một ngân hàng đa năng, hoạt động đa lĩnh vực, cung cấp cho khách hàng đầy đủ các dịch vụ tài chính hàng đầu trong lĩnh vực thương mại quốc tế; trong các hoạt động truyền thống như kinh doanh vốn, huy động vốn, tín dụng, tài trợ dự án…cũng như mảng dịch vụ ngân hàng hiện đại: kinh doanh ngoại tệ và các công vụ phái sinh, dịch vụ thẻ, ngân hàng điện tử…<br>\r\n					Sở hữu hạ tầng kỹ thuật ngân hàng hiện đại, S&TBank có nhiều lợi thế trong việc ứng dụng công nghệ tiên tiến vào xử lý tự động các dịch vụ ngân hàng, phát triển các sản phẩm, dịch vụ ngân hàng điện tử dựa trên nền tảng công nghệ cao. Không gian giao dịch công nghệ số (Digital lab) cùng các dịch vụ: VCB Internet Banking, VCB Money, SMS Banking, Phone Banking,…đã, đang và sẽ tiếp tục thu hút đông đảo khách hàng bằng sự tiện lợi, nhanh chóng, an toàn, hiệu quả, tạo thói quen thanh toán không dùng tiền mặt  cho đông đảo khách hàng.<br>\r\n					Sau hơn nửa thế kỷ hoạt động trên thị trường, S&TBank hiện là một trong những ngân hàng thương mại lớn nhất Việt Nam với trên 15.000 cán bộ nhân viên, hơn 500 Chi nhánh/Phòng Giao dịch/Văn phòng đại diện/Đơn vị thành viên trong và ngoài nước, gồm Trụ sở chính tại Hà Nội, 101 chi nhánh và 395 phòng giao dịch trên toàn quốc, 03 công ty con tại Việt Nam, 01 văn phòng đại diện tại Singapore, 01 Văn phòng đại diện tại Tp Hồ Chí Minh, 02 công ty con tại nước ngoài và 04 công ty liên doanh, liên kết. Bên cạnh đó, S&TBank còn phát triển một hệ thống Autobank với hơn 2.407 máy ATM và trên  43.000 đơn vị chấp nhận Thẻ trên toàn quốc. Hoạt động ngân hàng còn được hỗ trợ bởi mạng lưới hơn 1.726 ngân hàng đại lý tại 158 quốc gia và vùng lãnh thổ trên thế giới.<br>\r\n					Với bề dày hoạt động và đội ngũ cán bộ có năng lực, nhạy bén với môi trường kinh doanh hiện đại, mang tính hội nhập S&TBank luôn là sự lựa chọn hàng đầu của các tập đoàn, các doanh nghiệp lớn và của đông đảo khách hàng cá nhân.<br>\r\n					Luôn hướng đến các chuẩn mực quốc tế trong hoạt động, S&TBank liên tục được các tổ chức uy tín trên thế giới bình chọn là “Ngân hàng tốt nhất Việt Nam”. S&TBank cũng là ngân hàng đầu tiên và duy nhất của Việt Nam có mặt trong Top 500 Ngân hàng hàng đầu Thế giới theo kết quả bình chọn do Tạp chí The Banker công bố.<br>\r\n					Bằng trí tuệ và tâm huyết, các thế hệ cán bộ nhân viên S&TBank đã, đang và sẽ luôn nỗ lực để xây dựng S&TBank phát triển ngày một bền vững, với mục tiêu đến năm 2020 đưa S&TBank trở thành Ngân hàng số 1 tại Việt Nam, 1 trong 300 tập đoàn ngân hàng tài chính lớn nhất thế giới và được quản trị theo các thông lệ quốc tế tốt nhất.<br>\r\n					<hr>\r\n'),
(6, 2, 'Văn hoá doanh nghiệp', '2019-05-14 00:00:00', 'hinh/tintuc6.jpg', 'Với bề dày hoạt động và đội ngũ cán bộ có năng lực, nhạy bén với môi trường kinh doanh hiện đại, mang tính hội nhập S&TBank luôn là sự lựa chọn hàng đầu của các tập đoàn, các doanh nghiệp lớn và của đông đảo khách hàng cá nhân.<br>\r\n					Luôn hướng đến các chuẩn mực quốc tế trong hoạt động, S&TBank liên tục được các tổ chức uy tín trên thế giới bình chọn là “Ngân hàng tốt nhất Việt Nam”. S&TBank cũng là ngân hàng đầu tiên và duy nhất của Việt Nam có mặt trong Top 500 Ngân hàng hàng đầu Thế giới theo kết quả bình chọn do Tạp chí The Banker công bố.<br>\r\n					Bằng trí tuệ và tâm huyết, các thế hệ cán bộ nhân viên S&TBank đã, đang và sẽ luôn nỗ lực để xây dựng S&TBank phát triển ngày một bền vững, với mục tiêu đến năm 2020 đưa S&TBank trở thành Ngân hàng số 1 tại Việt Nam, 1 trong 300 tập đoàn ngân hàng tài chính lớn nhất thế giới và được quản trị theo các thông lệ quốc tế tốt nhất.<br>\r\n					<hr>'),
(7, 2, 'Các mốc lịch sử và thành tựu', '2019-05-14 00:00:00', 'hinh/tintuc4.jpg', 'Với bề dày hoạt động và đội ngũ cán bộ có năng lực, nhạy bén với môi trường kinh doanh hiện đại, mang tính hội nhập S&TBank luôn là sự lựa chọn hàng đầu của các tập đoàn, các doanh nghiệp lớn và của đông đảo khách hàng cá nhân.<br>\r\n					Luôn hướng đến các chuẩn mực quốc tế trong hoạt động, S&TBank liên tục được các tổ chức uy tín trên thế giới bình chọn là “Ngân hàng tốt nhất Việt Nam”. S&TBank cũng là ngân hàng đầu tiên và duy nhất của Việt Nam có mặt trong Top 500 Ngân hàng hàng đầu Thế giới theo kết quả bình chọn do Tạp chí The Banker công bố.<br>'),
(8, 2, 'Mạng lưới', '2019-05-14 00:00:00', 'hinh/tintuc3.jpg', 'Sau hơn nửa thế kỷ hoạt động trên thị trường, S&TBank hiện là một trong những ngân hàng thương mại lớn nhất Việt Nam với trên 15.000 cán bộ nhân viên, hơn 500 Chi nhánh/Phòng Giao dịch/Văn phòng đại diện/Đơn vị thành viên trong và ngoài nước, gồm Trụ sở chính tại Hà Nội, 101 chi nhánh và 395 phòng giao dịch trên toàn quốc, 03 công ty con tại Việt Nam, 01 văn phòng đại diện tại Singapore, 01 Văn phòng đại diện tại Tp Hồ Chí Minh, 02 công ty con tại nước ngoài và 04 công ty liên doanh, liên kết. Bên cạnh đó, S&TBank còn phát triển một hệ thống Autobank với hơn 2.407 máy ATM và trên  43.000 đơn vị chấp nhận Thẻ trên toàn quốc. Hoạt động ngân hàng còn được hỗ trợ bởi mạng lưới hơn 1.726 ngân hàng đại lý tại 158 quốc gia và vùng lãnh thổ trên thế giới.<br>');

-- --------------------------------------------------------

--
-- Table structure for table `news_body`
--

CREATE TABLE `news_body` (
  `id` int(10) UNSIGNED NOT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_body`
--

INSERT INTO `news_body` (`id`, `body`) VALUES
(1, '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"'),
(2, 'What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Why do we use it? It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). Where does it come from? Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32. The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham. Where can I get some? There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.'),
(3, 'This is to inform that as of today interest rates will increase by 4.6% on loans and decrease by 5.8% on deposits. Effective immediately. '),
(4, 'This is to inform that GST shall be applied on all usages of :\r\n1. Credit Cards\r\n2. Debit Cards\r\n3. Internet Banking\r\nat a nominal (nationally applied) rate of 18%.\r\n'),
(5, 'Ngân hàng hỗ trợ đầu tư Việt Nam trước đây, nay là Ngân hàng TMCP hỗ trợ đầu tư Việt Nam (S&TBank) được thành lập và chính thức đi vào hoạt động ngày 01/4/1963 với tổ chức tiền thân là Cục Ngoại hối (trực thuộc Ngân hàng Nhà nước Việt Nam). Là ngân hàng thương mại nhà nước đầu tiên được Chính phủ lựa chọn thực hiện thí điểm cổ phần hoá, Vietcombank chính thức hoạt động với tư cách là một ngân hàng thương mại cổ phần vào ngày 02/6/2008 sau khi thực hiện thành công kế hoạch cổ phần hóa thông qua việc phát hành cổ phiếu lần đầu ra công chúng. Ngày 30/6/2009, cổ phiếu S&TBank (mã chứng khoán VCB) chính thức được niêm yết tại Sở Giao dịch Chứng khoán TPHCM.<br>\r\n					Trải qua hơn 50 năm xây dựng và trưởng thành, S&TBank đã có những đóng góp quan trọng cho sự ổn định và phát triển của kinh tế đất nước, phát huy tốt vai trò của một ngân hàng đối ngoại chủ lực, phục vụ hiệu quả cho phát triển kinh tế trong nước, đồng thời tạo những ảnh hưởng quan trọng đối với cộng đồng tài chính khu vực và toàn cầu.<br>\r\n					Từ một ngân hàng chuyên doanh phục vụ kinh tế đối ngoại, S&TBank ngày nay đã trở thành một ngân hàng đa năng, hoạt động đa lĩnh vực, cung cấp cho khách hàng đầy đủ các dịch vụ tài chính hàng đầu trong lĩnh vực thương mại quốc tế; trong các hoạt động truyền thống như kinh doanh vốn, huy động vốn, tín dụng, tài trợ dự án…cũng như mảng dịch vụ ngân hàng hiện đại: kinh doanh ngoại tệ và các công vụ phái sinh, dịch vụ thẻ, ngân hàng điện tử…<br>\r\n					Sở hữu hạ tầng kỹ thuật ngân hàng hiện đại, S&TBank có nhiều lợi thế trong việc ứng dụng công nghệ tiên tiến vào xử lý tự động các dịch vụ ngân hàng, phát triển các sản phẩm, dịch vụ ngân hàng điện tử dựa trên nền tảng công nghệ cao. Không gian giao dịch công nghệ số (Digital lab) cùng các dịch vụ: VCB Internet Banking, VCB Money, SMS Banking, Phone Banking,…đã, đang và sẽ tiếp tục thu hút đông đảo khách hàng bằng sự tiện lợi, nhanh chóng, an toàn, hiệu quả, tạo thói quen thanh toán không dùng tiền mặt  cho đông đảo khách hàng.<br>\r\n					Sau hơn nửa thế kỷ hoạt động trên thị trường, S&TBank hiện là một trong những ngân hàng thương mại lớn nhất Việt Nam với trên 15.000 cán bộ nhân viên, hơn 500 Chi nhánh/Phòng Giao dịch/Văn phòng đại diện/Đơn vị thành viên trong và ngoài nước, gồm Trụ sở chính tại Hà Nội, 101 chi nhánh và 395 phòng giao dịch trên toàn quốc, 03 công ty con tại Việt Nam, 01 văn phòng đại diện tại Singapore, 01 Văn phòng đại diện tại Tp Hồ Chí Minh, 02 công ty con tại nước ngoài và 04 công ty liên doanh, liên kết. Bên cạnh đó, S&TBank còn phát triển một hệ thống Autobank với hơn 2.407 máy ATM và trên  43.000 đơn vị chấp nhận Thẻ trên toàn quốc. Hoạt động ngân hàng còn được hỗ trợ bởi mạng lưới hơn 1.726 ngân hàng đại lý tại 158 quốc gia và vùng lãnh thổ trên thế giới.<br>\r\n					Với bề dày hoạt động và đội ngũ cán bộ có năng lực, nhạy bén với môi trường kinh doanh hiện đại, mang tính hội nhập S&TBank luôn là sự lựa chọn hàng đầu của các tập đoàn, các doanh nghiệp lớn và của đông đảo khách hàng cá nhân.<br>\r\n					Luôn hướng đến các chuẩn mực quốc tế trong hoạt động, S&TBank liên tục được các tổ chức uy tín trên thế giới bình chọn là “Ngân hàng tốt nhất Việt Nam”. S&TBank cũng là ngân hàng đầu tiên và duy nhất của Việt Nam có mặt trong Top 500 Ngân hàng hàng đầu Thế giới theo kết quả bình chọn do Tạp chí The Banker công bố.<br>\r\n					Bằng trí tuệ và tâm huyết, các thế hệ cán bộ nhân viên S&TBank đã, đang và sẽ luôn nỗ lực để xây dựng S&TBank phát triển ngày một bền vững, với mục tiêu đến năm 2020 đưa S&TBank trở thành Ngân hàng số 1 tại Việt Nam, 1 trong 300 tập đoàn ngân hàng tài chính lớn nhất thế giới và được quản trị theo các thông lệ quốc tế tốt nhất.<br>\r\n					<hr>');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `nhanvienid` int(10) NOT NULL,
  `ten` varchar(25) NOT NULL,
  `loginid` varchar(25) NOT NULL,
  `pass` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ngaytao` date NOT NULL,
  `ngaydangnhap` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `phichuyentien`
--

CREATE TABLE `phichuyentien` (
  `id_phichuyentien` int(11) NOT NULL,
  `toithieu` float DEFAULT NULL,
  `toida` float DEFAULT NULL,
  `phi` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phichuyentien`
--

INSERT INTO `phichuyentien` (`id_phichuyentien`, `toithieu`, `toida`, `phi`) VALUES
(1, 0, 100000, 3000),
(2, 100000, 500000, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id_taikhoan` int(25) NOT NULL,
  `taikhoanid` varchar(25) NOT NULL,
  `id_khachhang` varchar(25) NOT NULL,
  `trangthai` varchar(25) NOT NULL,
  `ngaytao` date NOT NULL,
  `sodu` double NOT NULL,
  `no` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id_taikhoan`, `taikhoanid`, `id_khachhang`, `trangthai`, `ngaytao`, `sodu`, `no`) VALUES
(1, '11', '3', '2', '2019-04-07', 37704.100000000006, 4),
(2, '22', '4', '2', '2019-04-01', 158000, 0),
(3, '123', '5', '2', '2019-04-01', 115444, 0),
(4, '321', '6', '2', '2019-04-01', 275333, 0),
(5, '512', '3', '2', '2019-04-01', 11200, 14910),
(323, '322', '3', '2', '2019-04-08', 91041, 36000),
(324, '159', '3', '1', '2018-04-01', 100000, 1000),
(325, '1asd', '3', '1', '2019-05-01', 266000, 0),
(326, '2sad', '3', '2', '2019-05-01', 157720, 0),
(327, 'asdv', '3', '2', '2019-05-01', 244000, 0),
(328, 'asdc12', '3', '2', '2019-03-04', 104000, 0),
(329, 'asdc1d2', '3', '2', '2019-02-04', 5000000, 0),
(330, 'asdc2134', '3', '2', '2019-03-12', 0, 0),
(331, '2Nos', '3', '2', '2019-05-07', 100000, 0),
(332, '8oLa', '3', '2', '2019-05-07', 100000, 0),
(333, 'Cl2E', '3', '2', '2019-05-07', 100000, 0),
(334, 'hWVQ', '3', '2', '2019-05-07', 100000, 0),
(335, 'tG1p', '3', '2', '2019-05-07', 100000, 0),
(336, 'IBIh', '3', '2', '2019-05-07', 100000, 0),
(337, 'wXeh', '3', '2', '2019-05-07', 100000, 0),
(338, 'a6ZZ', '3', '2', '2019-05-07', 100000, 0),
(339, 'zTW3', '3', '2', '2019-05-07', 100000, 0),
(340, 'tyWD', '3', '2', '2019-05-07', 100000, 0),
(341, 'Ub1x', '3', '2', '2019-05-07', 100000, 0),
(342, 'pzk3', '3', '2', '2019-05-07', 100000, 0),
(343, 'vGXL', '3', '2', '2019-05-07', 100000, 0),
(344, '02y3', '3', '2', '2019-05-07', 100000, 0),
(345, 'JXN3', '3', '2', '2019-05-07', 100000, 0),
(346, '0DDp', '3', '2', '2019-05-07', 100000, 0),
(347, 'pn1J', '3', '2', '2019-05-07', 100000, 0),
(348, 'zAAg', '3', '2', '2019-05-07', 100000, 0),
(349, 'WCsf', '3', '2', '2019-05-07', 100000, 0),
(350, 'GzUN', '3', '2', '2019-05-07', 100000, 0),
(351, '9eJA', '3', '2', '2019-05-07', 100000, 0),
(352, '6Rl4', '3', '2', '2019-05-07', 100000, 0),
(353, 'fQ0Q', '3', '2', '2019-05-07', 100000, 0),
(354, 'xzBM', '3', '2', '2019-05-07', 100000, 0),
(355, 'J2MU', '3', '2', '2019-05-07', 100000, 0),
(356, 'Y4Xe', '3', '2', '2019-05-07', 100000, 0),
(357, 'Rsr6', '3', '2', '2019-05-07', 100000, 0),
(358, 'MsSD', '3', '2', '2019-05-07', 100000, 0),
(359, 'dHR4', '3', '2', '2019-05-07', 100000, 0),
(360, 'BDIc', '3', '2', '2019-05-07', 100000, 0),
(361, '8A0A', '3', '2', '2019-05-07', 100000, 0),
(362, 'h3Pm', '3', '2', '2019-05-07', 100000, 0),
(363, 'ma7v', '3', '2', '2019-05-07', 100000, 0),
(364, 'u5jZ', '3', '2', '2019-05-07', 100000, 0),
(365, '1nPb', '3', '2', '2019-05-07', 100000, 0),
(366, 'YMZB', '3', '2', '2019-05-07', 100000, 0),
(367, 'ytXj', '3', '2', '2019-05-07', 100000, 0),
(368, 'Z9R1', '3', '2', '2019-05-07', 100000, 0),
(369, 'vE7U', '3', '2', '2019-05-07', 100000, 0),
(370, 'HzvM', '3', '2', '2019-05-07', 100000, 0),
(371, 'to79', '3', '2', '2019-05-07', 100000, 0),
(372, 'riuU', '3', '2', '2019-05-07', 100000, 0),
(373, 'J1Et', '3', '2', '2019-05-07', 100000, 0),
(374, 'zSJO', '3', '2', '2019-05-07', 100000, 0),
(375, 'zesf', '3', '2', '2019-05-07', 100000, 0),
(376, 'Qqch', '3', '2', '2019-05-07', 100000, 0),
(377, 'Kmw3', '3', '2', '2019-05-07', 100000, 0),
(378, 'GNKH', '3', '2', '2019-05-07', 100000, 0),
(379, '8SRR', '3', '2', '2019-05-07', 100000, 0),
(380, 'BYFw', '3', '2', '2019-05-07', 100000, 0),
(381, 'mBxx', '3', '2', '2019-05-07', 100000, 0),
(382, '8HLX', '3', '2', '2019-05-07', 100000, 0),
(383, 'mnIu', '3', '2', '2019-05-07', 100000, 0),
(384, 'TJWg', '3', '2', '2019-05-07', 100000, 0),
(385, '3GxS', '3', '2', '2019-05-07', 100000, 0),
(386, '52CX', '3', '2', '2019-05-07', 100000, 0),
(387, 'DvSN', '3', '2', '2019-05-07', 100000, 0),
(388, '0jTP', '3', '2', '2019-05-07', 100000, 0),
(389, 'TSYY', '3', '2', '2019-05-07', 100000, 0),
(390, 'gSpb', '3', '2', '2019-05-07', 100000, 0),
(391, 'tOd0', '3', '2', '2019-05-07', 100000, 0),
(392, 'NHxw', '3', '2', '2019-05-07', 100000, 0),
(393, 'zZe7', '3', '2', '2019-05-07', 100000, 0),
(394, 'SOZO', '3', '2', '2019-05-07', 100000, 0),
(395, 'DjEd', '3', '2', '2019-05-07', 100000, 0),
(396, 'MfWN', '3', '2', '2019-05-07', 100000, 0),
(397, 'dXoO', '3', '2', '2019-05-07', 100000, 0),
(398, 'kfDT', '3', '2', '2019-05-07', 100000, 0),
(399, 'mQHR', '3', '2', '2019-05-07', 100000, 0),
(400, 'DYMM', '3', '2', '2019-05-07', 100000, 0),
(401, 'xwPG', '3', '2', '2019-05-07', 100000, 0),
(402, 'wxgM', '3', '2', '2019-05-07', 100000, 0),
(403, 'UUc8', '3', '2', '2019-05-07', 100000, 0),
(404, 'I4WN', '3', '2', '2019-05-07', 100000, 0),
(405, 'K0eh', '3', '2', '2019-05-07', 100000, 0),
(406, 'sp2R', '3', '2', '2019-05-07', 100000, 0),
(407, 'F8Sq', '3', '2', '2019-05-07', 100000, 0),
(408, '3MiW', '3', '2', '2019-05-07', 100000, 0),
(409, 'MNLM', '3', '2', '2019-05-07', 100000, 0),
(410, 'XMNx', '3', '2', '2019-05-07', 100000, 0),
(411, 'Yaz1', '3', '2', '2019-05-07', 100000, 0),
(412, '1vR9', '3', '2', '2019-05-07', 100000, 0),
(413, 'E6pY', '3', '2', '2019-05-07', 100000, 0),
(414, 'DCKL', '3', '2', '2019-05-07', 100000, 0),
(415, 'vWho', '3', '2', '2019-05-07', 100000, 0),
(416, 'he0z', '3', '2', '2019-05-07', 100000, 0),
(417, 'nWtZ', '3', '2', '2019-05-07', 100000, 0),
(418, 'U3Tj', '3', '2', '2019-05-07', 100000, 0),
(419, 'nibN', '3', '2', '2019-05-07', 100000, 0),
(420, 'VXu2', '3', '2', '2019-05-07', 100000, 0),
(421, 'Kfzp', '3', '2', '2019-05-07', 100000, 0),
(422, '0rp6', '3', '2', '2019-05-07', 100000, 0),
(423, 'c6wo', '3', '2', '2019-05-07', 100000, 0),
(424, 'zEFA', '3', '2', '2019-05-07', 100000, 0),
(425, 'hqKq', '3', '2', '2019-05-07', 100000, 0),
(426, 'QVvu', '3', '2', '2019-05-07', 100000, 0),
(427, 'PzMG', '3', '2', '2019-05-07', 100000, 0),
(428, 'uO4A', '3', '2', '2019-05-07', 100000, 0),
(429, 'kmZz', '3', '2', '2019-05-07', 100000, 0),
(430, 'gHbu', '3', '2', '2019-05-07', 100000, 0),
(431, '4K9I', '3', '2', '2019-05-07', 100000, 0),
(432, 'hctq', '3', '2', '2019-05-07', 100000, 0),
(433, '8nqR', '3', '2', '2019-05-07', 100000, 0),
(434, 'QZDJ', '3', '2', '2019-05-07', 100000, 0),
(435, 'AmEu', '3', '2', '2019-05-07', 100000, 0),
(436, 'Z2pA', '3', '2', '2019-05-07', 100000, 0),
(437, 'pdKW', '3', '2', '2019-05-07', 100000, 0),
(438, '4jZp', '3', '2', '2019-05-07', 100000, 0),
(439, 'XPWV', '3', '2', '2019-05-07', 100000, 0),
(440, 'Kf5L', '3', '2', '2019-05-07', 100000, 0),
(441, 'dUOd', '3', '2', '2019-05-07', 100000, 0),
(442, 'Fty6', '3', '2', '2019-05-07', 100000, 0),
(443, 'srwX', '3', '2', '2019-05-07', 100000, 0),
(444, 'vXTb', '3', '2', '2019-05-07', 100000, 0),
(445, 'tWrF', '3', '2', '2019-05-07', 100000, 0),
(446, 'uyS1', '3', '2', '2019-05-07', 100000, 0),
(447, 'cU9q', '3', '2', '2019-05-07', 100000, 0),
(448, 'unlH', '3', '2', '2019-05-07', 100000, 0),
(449, 'amkI', '3', '2', '2019-05-07', 100000, 0),
(450, 'hLnn', '3', '2', '2019-05-07', 100000, 0),
(451, 'PLD4', '3', '2', '2019-05-07', 100000, 0),
(452, 'VnHv', '3', '2', '2019-05-07', 100000, 0),
(453, 'PiUK', '3', '2', '2019-05-07', 100000, 0),
(454, 'AgiP', '3', '2', '2019-05-07', 100000, 0),
(455, 'QHjI', '3', '2', '2019-05-07', 100000, 0),
(456, 'ndgP', '3', '2', '2019-05-07', 100000, 0),
(457, 'jUk3', '3', '2', '2019-05-07', 100000, 0),
(458, 'hvh7', '3', '2', '2019-05-07', 100000, 0),
(459, 'OT8j', '3', '2', '2019-05-07', 100000, 0),
(460, 'kAfl', '3', '2', '2019-05-07', 100000, 0),
(461, 'MhMG', '3', '2', '2019-05-07', 100000, 0),
(462, 'cTOh', '3', '2', '2019-05-07', 100000, 0),
(463, 'zzq8', '3', '2', '2019-05-07', 100000, 0),
(464, 'Z1b5', '3', '2', '2019-05-07', 100000, 0),
(465, 'DVkM', '3', '2', '2019-05-07', 100000, 0),
(466, 'KQwI', '3', '2', '2019-05-07', 100000, 0),
(467, 'HRx6', '3', '2', '2019-05-07', 100000, 0),
(468, 'bHKo', '3', '2', '2019-05-07', 100000, 0),
(469, 'YTg8', '3', '2', '2019-05-07', 100000, 0),
(470, 'Z8H1', '3', '2', '2019-05-07', 100000, 0),
(471, 'Qt2z', '3', '2', '2019-05-07', 100000, 0),
(472, 'j6W0', '3', '2', '2019-05-07', 100000, 0),
(473, 'yhI0', '3', '2', '2019-05-07', 100000, 0),
(474, 'skOm', '3', '2', '2019-05-07', 100000, 0),
(475, 'r2Iz', '3', '2', '2019-05-07', 100000, 0),
(476, 'Znea', '3', '2', '2019-05-07', 100000, 0),
(477, 'HrGP', '3', '2', '2019-05-07', 100000, 0),
(478, 'JscS', '3', '2', '2019-05-07', 100000, 0),
(479, 'JDRH', '3', '2', '2019-05-07', 100000, 0),
(480, '36EI', '3', '2', '2019-05-07', 100000, 0),
(481, '9CnS', '3', '2', '2019-05-07', 100000, 0),
(482, 'WA6z', '3', '2', '2019-05-07', 100000, 0),
(483, 'xJVI', '3', '2', '2019-05-07', 100000, 0),
(484, 'Yxeb', '3', '2', '2019-05-07', 100000, 0),
(485, 'YPMU', '3', '2', '2019-05-07', 100000, 0),
(486, '8ZU1', '3', '2', '2019-05-07', 100000, 0),
(487, '1jnQ', '3', '2', '2019-05-07', 100000, 0),
(488, 'gL0H', '3', '2', '2019-05-07', 100000, 0),
(489, 'TKik', '3', '2', '2019-05-07', 100000, 0),
(490, '5rAl', '3', '2', '2019-05-07', 100000, 0),
(491, 'AOZD', '3', '2', '2019-05-07', 100000, 0),
(492, 'E2ky', '3', '2', '2019-05-07', 100000, 0),
(493, 'cgIN', '3', '2', '2019-05-07', 100000, 0),
(494, 'oJ8p', '3', '2', '2019-05-07', 100000, 0),
(495, 'VqEm', '3', '2', '2019-05-07', 100000, 0),
(496, '8chJ', '3', '2', '2019-05-07', 100000, 0),
(497, 'pJQ3', '3', '2', '2019-05-07', 100000, 0),
(498, 'tPUp', '3', '2', '2019-05-07', 100000, 0),
(499, 'IpGD', '3', '2', '2019-05-07', 100000, 0),
(500, 'ninX', '3', '2', '2019-05-07', 100000, 0),
(501, 'OvTZ', '3', '2', '2019-05-07', 100000, 0),
(502, 'Y9SE', '3', '2', '2019-05-07', 100000, 0),
(503, 'W0Eu', '3', '2', '2019-05-07', 100000, 0),
(504, 'YDV5', '3', '2', '2019-05-07', 100000, 0),
(505, 'gPKb', '3', '2', '2019-05-07', 100000, 0),
(506, 'fvtV', '3', '2', '2019-05-07', 100000, 0),
(507, 'Q9j5', '3', '2', '2019-05-07', 100000, 0),
(508, 'yrCm', '3', '2', '2019-05-07', 100000, 0),
(509, 'hD7w', '3', '2', '2019-05-07', 100000, 0),
(510, 'EJfR', '3', '2', '2019-05-07', 100000, 0),
(511, 'sSlu', '3', '2', '2019-05-07', 100000, 0),
(512, 'vZXQ', '3', '2', '2019-05-07', 100000, 0),
(513, 'Z5sc', '3', '2', '2019-05-07', 100000, 0),
(514, 'hvcx', '3', '2', '2019-05-07', 100000, 0),
(515, 'ojJS', '3', '2', '2019-05-07', 100000, 0),
(516, '3BZp', '3', '2', '2019-05-07', 100000, 0),
(517, 'RsO5', '3', '2', '2019-05-07', 100000, 0),
(518, 'mU4K', '3', '2', '2019-05-07', 100000, 0),
(519, 'RxMj', '3', '2', '2019-05-07', 100000, 0),
(520, 'xq08', '3', '2', '2019-05-07', 100000, 0),
(521, 'AAxa', '3', '2', '2019-05-07', 100000, 0),
(522, 'fZq3', '3', '2', '2019-05-07', 100000, 0),
(523, 'aC45', '3', '2', '2019-05-07', 100000, 0),
(524, '7wmF', '3', '2', '2019-05-07', 100000, 0),
(525, 'ikaN', '3', '2', '2019-05-07', 100000, 0),
(526, 'w0HN', '3', '2', '2019-05-07', 100000, 0),
(527, 'Kfld', '3', '2', '2019-05-07', 100000, 0),
(528, '0tCD', '3', '2', '2019-05-07', 100000, 0),
(529, '4tuC', '3', '2', '2019-05-07', 100000, 0),
(530, 'C531', '3', '2', '2019-05-07', 100000, 0),
(531, 'q0ZC', '3', '2', '2019-05-07', 100000, 0),
(532, 'Nu88', '3', '2', '2019-05-07', 100000, 0),
(533, 'AlYB', '3', '2', '2019-05-07', 100000, 0),
(534, 'WiRF', '3', '2', '2019-05-07', 100000, 0),
(535, 'grMS', '3', '2', '2019-05-07', 100000, 0),
(536, '0Pij', '3', '2', '2019-05-07', 100000, 0),
(537, 'CPg8', '3', '2', '2019-05-07', 100000, 0),
(538, 'kc55', '3', '2', '2019-05-07', 100000, 0),
(539, 'k3xu', '3', '2', '2019-05-07', 100000, 0),
(540, 'aHVJ', '3', '2', '2019-05-07', 100000, 0),
(541, '0dxa', '3', '2', '2019-05-07', 100000, 0),
(542, 'RbsW', '3', '2', '2019-05-07', 100000, 0),
(543, 'KLOy', '3', '2', '2019-05-07', 100000, 0),
(544, 'fYvB', '3', '2', '2019-05-07', 100000, 0),
(545, 'QZyS', '3', '2', '2019-05-07', 100000, 0),
(546, 'AlVF', '3', '2', '2019-05-07', 100000, 0),
(547, 'SyCx', '3', '2', '2019-05-07', 100000, 0),
(548, 'prJx', '3', '2', '2019-05-07', 100000, 0),
(549, '0ndK', '3', '2', '2019-05-07', 100000, 0),
(550, 'xM5V', '3', '2', '2019-05-07', 100000, 0),
(551, 'GQPN', '3', '2', '2019-05-07', 100000, 0),
(552, 'v9EQ', '3', '2', '2019-05-07', 100000, 0),
(553, '5Tm0', '3', '2', '2019-05-07', 100000, 0),
(554, 'j5SY', '3', '2', '2019-05-07', 100000, 0),
(555, 'mdyU', '3', '2', '2019-05-07', 100000, 0),
(556, 'Ynqw', '3', '2', '2019-05-07', 100000, 0),
(557, 'NFzJ', '3', '2', '2019-05-07', 100000, 0),
(558, 'FCWZ', '3', '2', '2019-05-07', 100000, 0),
(559, '6351', '3', '2', '2019-05-07', 100000, 0),
(560, '5mLT', '3', '2', '2019-05-07', 100000, 0),
(561, 'zOnb', '3', '2', '2019-05-07', 100000, 0),
(562, 'D3Yb', '3', '2', '2019-05-07', 100000, 0),
(563, 'n1TX', '3', '2', '2019-05-07', 100000, 0),
(564, '45ei', '3', '2', '2019-05-07', 100000, 0),
(565, 'mh19', '3', '2', '2019-05-07', 100000, 0),
(566, 'Xb3G', '3', '2', '2019-05-07', 100000, 0),
(567, 'XhBa', '3', '2', '2019-05-07', 100000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoanhuong`
--

CREATE TABLE `taikhoanhuong` (
  `id_taikhoanhuong` int(11) NOT NULL,
  `taikhoanhuongid` varchar(25) NOT NULL,
  `id_khachhang` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taikhoanhuong`
--

INSERT INTO `taikhoanhuong` (`id_taikhoanhuong`, `taikhoanhuongid`, `id_khachhang`) VALUES
(1, '321', '3'),
(2, '512', '3'),
(3, '123', '3');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoantietkiem`
--

CREATE TABLE `taikhoantietkiem` (
  `id_tietkiem` int(11) NOT NULL,
  `taikhoanid` varchar(25) DEFAULT NULL,
  `kyhangui` int(11) DEFAULT NULL,
  `tiengui` float DEFAULT NULL,
  `hinhthuctralai` int(11) DEFAULT NULL,
  `ngaytao` date DEFAULT NULL,
  `ngaynhanlai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taikhoantietkiem`
--

INSERT INTO `taikhoantietkiem` (`id_tietkiem`, `taikhoanid`, `kyhangui`, `tiengui`, `hinhthuctralai`, `ngaytao`, `ngaynhanlai`) VALUES
(13, '322', 1, 53000, 1, '2019-04-28', '2019-05-12'),
(15, '11', 1, 35100, 1, '2019-04-28', '2019-05-12'),
(16, 'asdc1d2', 1, 30000, 1, '2019-05-05', '2019-05-19'),
(17, '2sad', 1, 50000, 1, '2019-05-05', '2019-05-19'),
(18, 'asdc12', 1, 50000, 1, '2019-05-05', '2019-05-19');

-- --------------------------------------------------------

--
-- Table structure for table `thenganhang`
--

CREATE TABLE `thenganhang` (
  `id_the` int(11) NOT NULL,
  `thenganhangid` varchar(25) NOT NULL,
  `sodu` float DEFAULT NULL,
  `pass` varchar(25) NOT NULL,
  `passbin` varchar(4) NOT NULL,
  `cmnd` varchar(25) NOT NULL,
  `Ho` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Ten` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_khachhang` varchar(25) NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thenganhang`
--

INSERT INTO `thenganhang` (`id_the`, `thenganhangid`, `sodu`, `pass`, `passbin`, `cmnd`, `Ho`, `Ten`, `id_khachhang`, `trangthai`) VALUES
(1, '1', 5020000, '1', '1111', '1', 'Lê Thanh', 'Tài', '3', 1),
(2, '2', NULL, '1', '1000', '1', 'Lê Thanh', 'Tài', '3', 2);

-- --------------------------------------------------------

--
-- Table structure for table `trano`
--

CREATE TABLE `trano` (
  `tranoid` int(10) NOT NULL,
  `ngaytao` date NOT NULL,
  `sotien` double NOT NULL,
  `sodu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vaytien`
--

CREATE TABLE `vaytien` (
  `id_vay` int(25) NOT NULL,
  `vayid` varchar(50) NOT NULL,
  `kieuvay` varchar(25) NOT NULL,
  `sovay` float NOT NULL,
  `laixuat` float NOT NULL,
  `ngaytao` date NOT NULL,
  `taikhoanid` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vaytien`
--

INSERT INTO `vaytien` (`id_vay`, `vayid`, `kieuvay`, `sovay`, `laixuat`, `ngaytao`, `taikhoanid`) VALUES
(12, 'VT0100539419', '1', 40, 0.1, '2019-04-24', '11'),
(13, 'VT0100536270', '2', 12425, 0.2, '2019-04-24', '512'),
(14, 'VT0100527905', '2', 30000, 0.2, '2019-05-05', '322');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chuyentien`
--
ALTER TABLE `chuyentien`
  ADD PRIMARY KEY (`id_chuyentien`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`),
  ADD UNIQUE KEY `aadhar_no` (`aadhar_no`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_no` (`phone_no`),
  ADD UNIQUE KEY `account_no` (`account_no`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id_khachhang`),
  ADD UNIQUE KEY `khachhangid` (`khachhangid`);

--
-- Indexes for table `kieuvay`
--
ALTER TABLE `kieuvay`
  ADD PRIMARY KEY (`id_kieuvay`);

--
-- Indexes for table `kyhanguitien`
--
ALTER TABLE `kyhanguitien`
  ADD PRIMARY KEY (`id_kyhan`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_body`
--
ALTER TABLE `news_body`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`nhanvienid`);

--
-- Indexes for table `phichuyentien`
--
ALTER TABLE `phichuyentien`
  ADD PRIMARY KEY (`id_phichuyentien`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id_taikhoan`),
  ADD UNIQUE KEY `taikhoanid` (`taikhoanid`);

--
-- Indexes for table `taikhoanhuong`
--
ALTER TABLE `taikhoanhuong`
  ADD PRIMARY KEY (`id_taikhoanhuong`);

--
-- Indexes for table `taikhoantietkiem`
--
ALTER TABLE `taikhoantietkiem`
  ADD PRIMARY KEY (`id_tietkiem`);

--
-- Indexes for table `thenganhang`
--
ALTER TABLE `thenganhang`
  ADD PRIMARY KEY (`id_the`),
  ADD UNIQUE KEY `thenganhangid` (`thenganhangid`),
  ADD UNIQUE KEY `thenganhangid_2` (`thenganhangid`);

--
-- Indexes for table `trano`
--
ALTER TABLE `trano`
  ADD PRIMARY KEY (`tranoid`);

--
-- Indexes for table `vaytien`
--
ALTER TABLE `vaytien`
  ADD PRIMARY KEY (`id_vay`),
  ADD KEY `vayid` (`id_vay`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chuyentien`
--
ALTER TABLE `chuyentien`
  MODIFY `id_chuyentien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id_khachhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kieuvay`
--
ALTER TABLE `kieuvay`
  MODIFY `id_kieuvay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kyhanguitien`
--
ALTER TABLE `kyhanguitien`
  MODIFY `id_kyhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `news_body`
--
ALTER TABLE `news_body`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `phichuyentien`
--
ALTER TABLE `phichuyentien`
  MODIFY `id_phichuyentien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id_taikhoan` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=631;

--
-- AUTO_INCREMENT for table `taikhoanhuong`
--
ALTER TABLE `taikhoanhuong`
  MODIFY `id_taikhoanhuong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `taikhoantietkiem`
--
ALTER TABLE `taikhoantietkiem`
  MODIFY `id_tietkiem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `thenganhang`
--
ALTER TABLE `thenganhang`
  MODIFY `id_the` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vaytien`
--
ALTER TABLE `vaytien`
  MODIFY `id_vay` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `event_tienvay` ON SCHEDULE EVERY 1 DAY STARTS '2019-05-10 09:40:25' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE  taikhoan  INNER JOIN vaytien  ON taikhoan.taikhoanid = vaytien.taikhoanid set taikhoan.no = taikhoan.no + vaytien.sovay*vaytien.laixuat$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
