-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 25, 2019 at 06:04 PM
-- Server version: 5.6.38-log
-- PHP Version: 7.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `user_id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`user_id`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(12) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'All-day'),
(2, 'Appetizers'),
(3, 'Breakfast'),
(4, 'Burgers'),
(5, 'Combos'),
(6, 'Cuisine'),
(7, 'Desserts'),
(8, 'Dinner'),
(9, 'Drinks'),
(10, 'Entrees'),
(11, 'Kid\'s specials'),
(12, 'Lunch'),
(13, 'Salads'),
(14, 'Sauces'),
(15, 'Side dishes'),
(16, 'Smoothies'),
(17, 'Soups'),
(18, 'Vegan'),
(19, 'Vegetarian');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(88) NOT NULL,
  `price` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `category_id`, `name`, `price`) VALUES
(1, 2, 'Guacamole and Cheese', '4.99'),
(2, 2, 'Bacon Zucchini Fries', '12.99'),
(3, 2, 'Caprice Garlic Bread', '10.99'),
(4, 1, 'Spicy and Hot Chicken French Fries', '24.00'),
(5, 4, 'Half Pounder Hamburger', '7.00'),
(6, 4, 'Beef Patty Burger', '11.00'),
(7, 19, 'Veggie Burger', '13.00'),
(8, 9, 'Oreo Cookie pieces Milkshake', '9.00'),
(9, 13, 'Cobb salad with Salmon', '12.00'),
(10, 13, 'Caesar Salad w/ Vinaigrettes', '12.00'),
(11, 14, 'Buffalo', '2.00'),
(12, 2, 'Spicy Chicken Momos', '15.88'),
(13, 1, 'Spicy Chicken Lolipop Bucket', '98.99'),
(14, 2, 'Vegetable Samosas (6 pcs)', '24.99'),
(15, 2, 'Chicken Samosas (6 pcs)', '29.99'),
(16, 2, 'Bhel Puri', '12.49'),
(17, 10, 'Palak Paneer', '19.99'),
(18, 10, 'Chicken Tikka Masala', '24.99'),
(19, 10, 'Aaloo Gobi Masala', '17.99'),
(20, 10, 'Chana Masala', '22.99'),
(21, 10, 'Mushroom Peas Pulav', '19.49'),
(22, 10, 'Chicken, Lamb and Goat Combo Biryani', '49.99'),
(23, 1, 'Malai Kulfi', '7.00'),
(24, 7, 'Kheer', '7.00'),
(25, 7, 'Gajar ka Halwa', '7.49'),
(26, 11, 'Pav Bhaji with Mini Samosa', '11.99'),
(27, 3, 'Crab Rangoon', '3.49'),
(28, 3, 'Steamed Dumplings', '6.49'),
(29, 3, 'Roast Chicken/Pork/Beef Egg Roll', '1.49'),
(30, 12, 'Shrimp Chow Mein Combo', '8.99'),
(31, 12, 'BBQ Spare Ribs Combo', '9.99'),
(32, 8, 'Shrimp with Lobster Sauce', '14.99'),
(33, 8, 'Roast Shrimp Fried Rice', '5.99'),
(34, 17, 'Won Ton Soup', '2.99'),
(35, 17, 'Chinese Vegetable Soup', '7.99'),
(36, 9, 'Small/Medium/Large Ice Tea', '6.99'),
(37, 9, 'Large Home Made Lemon Tea', '4.99'),
(38, 2, '6 Fresh Mozzarella Sticks', '8.99'),
(39, 2, 'Quensadilla', '7.99'),
(40, 12, 'Jumbo Buffallo Wings with Rice', '24.99'),
(41, 15, 'Jumbo Fried Real Onion Rings', '5.49'),
(42, 15, 'Sweet Potato Fries', '4.49'),
(43, 12, '22 Shrimp in a Basket with Rice', '30.49'),
(44, 8, 'Chicken Fingers Deluxe with Rice', '32.49'),
(45, 8, 'London Broil Mushroom Gravy & Baby Back Ribs\r\n', '67.99'),
(46, 1, 'Greek-Style Boiled Chicken', '24.99'),
(47, 1, 'Breaded Veal Cutlet Parmigiana with Spaghettis\r\n', '25.99'),
(48, 9, 'Mango Pineapple Smoothie', '4.99'),
(50, 2, 'Fried Pickles', '4.99'),
(51, 2, 'Chilli Cheese Fries', '7.49'),
(52, 2, 'Seasoned Steakhouse Wings', '7.49'),
(53, 12, 'Firecracker Chicken Wraps', '10.79'),
(54, 12, 'Texas Tonion', '11.49'),
(55, 12, 'Renegade Sirloin', '14.99'),
(56, 12, 'Flatiron Steak', '29.99'),
(57, 8, 'Renegade Sirloin & Baby-back ribs', '39.95'),
(58, 8, 'Flow\'s Filet & Lobster Tail', '39.94'),
(59, 8, 'Flow\'s Filet & Longhorn Salmon with Gravy\r\n', '49.98'),
(60, 10, 'Prime Rib With 3 Ribeye and Fire-Grilled T-Bone with Chicken\r\n', '149.98'),
(61, 9, 'Pale ale', '3.99'),
(62, 9, 'Stout', '7.99'),
(63, 9, 'Riesling', '14.99'),
(64, 9, 'Red Wine', '12.99'),
(65, 11, 'Tomato Sauce with Choice of Pasta\r\n', '5.99'),
(66, 11, 'Cheese Ravioli\r\n', '5.99'),
(67, 11, 'Pizza\r\n', '5.99'),
(68, 15, 'Rotini with Marinara\r\n', '5.49'),
(69, 12, 'Spicy Alfredo Chicken with Lasagna Dip\r\n', '12.49'),
(70, 12, 'Lasagna Fritta\r\n', '12.99'),
(71, 16, 'Mango Banana Smoothie\r\n', '4.99'),
(72, 16, 'Cherry Ginger Smoothie\r\n', '9.99'),
(73, 16, 'Pineapple Mint Smoothie\r\n', '4.99'),
(74, 16, 'Pomegranate Antioxident Smoothie\r\n', '9.99'),
(75, 16, 'Orange Sea-Booster Smoothie\r\n', '17.49'),
(76, 16, 'Apple and Green-Booster Smoothie\r\n', '17.98'),
(77, 16, 'Protien Strawberry Lime Smoothie\r\n', '15.99'),
(78, 16, 'Samson Smoothie\r\n', '12.99'),
(79, 9, 'Vanilla Bubble tea\r\n', '15.99'),
(80, 9, 'Cha Cha Bubble Tea\r\n', '14.99'),
(81, 16, 'Blue Berry Born Smoothie\r\n', '18.99'),
(82, 10, 'Original NY Plain Cheesecake\r\n', '42.95'),
(83, 10, 'Strawberry Cheesecake\r\n', '59.99'),
(84, 10, 'Brownie Choco-lava Cake\r\n', '69.87'),
(85, 10, 'Seasonal Little Fellas Sampler\r\n', '44.99'),
(86, 1, 'Spring Mini Cheesecake Full Course\r\n', '61.99'),
(87, 10, 'Original New York Plain Little Fella\r\n', '19.29'),
(88, 10, 'Strawberry Brownies\r\n', '12.99'),
(89, 10, 'Cookies\r\n', '77.99'),
(90, 12, 'Hot Jalapeno Antipasta\r\n', '15.50'),
(91, 2, 'Buffalo Wings\r\n', '29.99'),
(92, 2, 'Egg Plant Tower\r\n', '19.99'),
(93, 13, 'Seafood Salad\r\n', '16.88'),
(94, 13, 'Jalapeno Hot Pepper Salad\r\n', '13.99'),
(95, 18, 'Hot Submarine Sandwich\r\n', '13.99'),
(96, 12, 'Shrimp Parmigiana\r\n', '17.99'),
(97, 12, 'Meatball Parmigiana', '17.99'),
(98, 19, 'Grilled Vegetable Spice\r\n', '12.99'),
(99, 17, 'Potato Soup\r\n', '12.97'),
(100, 1, 'Extra Cheesy Cold Pizza\r\n', '22.99'),
(101, 1, 'Whole Wheat Bar Pie\r\n', '19.75'),
(102, 18, 'Vegan Gluten Free Pizza\r\n', '34.99'),
(103, 1, 'Gold Plated, England Cheese, refined elite pizza', '2500.99'),
(104, 1, 'Buffalo Chicken Pizza\r\n', '19.99'),
(105, 19, 'Grilled Vegetable Pizza\r\n', '14.99'),
(106, 1, 'Double Cheese Margarita Pizza\r\n', '16.99'),
(107, 8, 'Halal Pizza\r\n', '17.21'),
(108, 8, 'Meatlover\'s Pizza\r\n', '21.21'),
(109, 5, 'Supreme Pizza with Drinks and Fries\r\n', '19.21'),
(110, 1, 'Chicken Pizza\r\n', '15.99'),
(111, 1, 'Farmhouse Pizza\r\n', '18.99'),
(112, 1, 'Philly Cheese Steak Pizza\r\n', '46.97'),
(113, 1, 'Honolulu Heaven\r\n', '29.98'),
(114, 9, 'Water\r\n', '1.75'),
(115, 9, 'Coca Cola\r\n', '2.99');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`) VALUES
(1, 'Broly\'s'),
(2, 'Indian'),
(3, 'Chinese'),
(4, 'Diner'),
(5, 'Steakhouse'),
(6, 'Garden'),
(7, 'Smoothie'),
(8, 'Bakery'),
(9, 'Shack'),
(10, 'Pizzeria');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `menu_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`menu_id`, `item_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(2, 14),
(2, 15),
(2, 16),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(3, 27),
(3, 28),
(3, 29),
(3, 30),
(3, 31),
(3, 32),
(3, 33),
(3, 34),
(3, 35),
(3, 36),
(3, 37),
(4, 38),
(4, 39),
(4, 40),
(4, 41),
(4, 42),
(4, 43),
(4, 44),
(4, 45),
(4, 46),
(4, 47),
(4, 48),
(5, 50),
(5, 51),
(5, 52),
(5, 53),
(5, 54),
(5, 55),
(5, 56),
(5, 57),
(5, 58),
(5, 59),
(5, 60),
(5, 61),
(5, 62),
(5, 63),
(5, 64),
(6, 65),
(6, 66),
(6, 67),
(6, 68),
(6, 69),
(6, 70),
(6, 71),
(6, 72),
(6, 73),
(7, 74),
(7, 75),
(7, 76),
(7, 77),
(7, 78),
(7, 79),
(7, 80),
(7, 81),
(8, 82),
(8, 83),
(8, 84),
(8, 85),
(8, 86),
(8, 87),
(8, 88),
(8, 89),
(9, 90),
(9, 91),
(9, 92),
(9, 93),
(9, 94),
(9, 95),
(9, 96),
(9, 97),
(9, 98),
(9, 99),
(10, 100),
(10, 101),
(10, 102),
(10, 103),
(10, 104),
(10, 105),
(10, 106),
(10, 107),
(10, 108),
(10, 109),
(10, 110),
(10, 111),
(10, 112),
(10, 113),
(10, 114),
(10, 115);

-- --------------------------------------------------------

--
-- Table structure for table `open_hours_info`
--

CREATE TABLE `open_hours_info` (
  `id` int(25) NOT NULL,
  `days_open` varchar(40) CHARACTER SET utf16 NOT NULL,
  `working_hours` varchar(25) CHARACTER SET utf16 NOT NULL,
  `specials` varchar(70) CHARACTER SET utf16 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `open_hours_info`
--

INSERT INTO `open_hours_info` (`id`, `days_open`, `working_hours`, `specials`) VALUES
(1, 'Monday to Saturday', '10:00am - 11:00pm', 'Delivery 11:00am - 9:00 pm'),
(2, 'Monday to Thursday', '7:00pm - 4:00am', 'Friday and Saturday open 24 hours'),
(3, 'Sunday to Thursday', '8:00am - 8:00pm', 'Closed first day of every month'),
(4, 'Tuesday to Saturday', '9:00am - 9:00pm', 'Saturday open 24 hours'),
(5, 'Monday to Friday', '9:00am - 10:00pm', 'Regular hours'),
(6, 'Friday to Sunday', '24 hours', 'Open throughout weekend'),
(7, 'Wednesday to Sunday', '6:00pm - 1:00am', 'Only evening hours'),
(8, 'Monday, Wednesday, Friday', '3:00pm to 12:00am', 'Regular hours'),
(9, 'Tuesday to Sunday', '4:00am to 11:30pm', 'Regular hours'),
(10, 'Sunday, Tuesday, Thursday, Saturday', '7:30am to 10:45pm', 'Regular hours'),
(11, 'Sunday to Saturday', '24x7', 'All day everyday');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_info`
--

CREATE TABLE `restaurant_info` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `rating` int(11) NOT NULL,
  `open_hours_id` int(11) NOT NULL,
  `address_x` int(11) NOT NULL,
  `address_y` int(11) NOT NULL,
  `address_verbal` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurant_info`
--

INSERT INTO `restaurant_info` (`id`, `title`, `rating`, `open_hours_id`, `address_x`, `address_y`, `address_verbal`) VALUES
(1, 'Brolys Burger Joint(1st)', 7, 1, 3, 4, 'Parsons Blvd, Whitestone, Queens, New York 11354'),
(2, 'Indian Handi', 10, 5, 6, 8, 'Northern Blvd, Colden Street, Queens, New York 11422'),
(3, 'Konway Restaurant & Bar', 6, 6, 13, 20, 'Chinatown, New York, New York 11366'),
(4, 'Lifelines Diner', 10, 8, 21, 34, 'Jewel Ave, Bronx, New York 11364'),
(5, 'Buffalo Steakspace', 8, 3, 29, 41, 'Holly Ave, Long Island, New York 15445'),
(6, 'Clove Garden', 5, 4, 32, 50, 'Reaves Pl, Furlington, New York 11459'),
(7, 'Soothie Smoothie', 8, 7, 51, 72, 'Booth Memorial Ave, Bronx, New York 11523'),
(8, 'Poppins Bakery', 10, 8, 55, 73, 'Roosevelt Ave, Brooklyn, New York 15535'),
(9, 'Late night shack', 7, 2, 66, 76, 'Malad Ave, Queens, 11355'),
(10, 'Brolys Burger Joint(2nd)', 10, 1, 45, 61, '149th Street, Murray Hill, Queens, New York 11435'),
(11, 'Pizzeria la Roma', 10, 11, 59, 21, 'Northern Blvd, Barclay\'s, New York 13313');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_menu`
--

CREATE TABLE `restaurant_menu` (
  `restaurant_id` int(33) NOT NULL,
  `menu_id` int(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurant_menu`
--

INSERT INTO `restaurant_menu` (`restaurant_id`, `menu_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 1),
(11, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category_id` (`category_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD KEY `fk_menu_id` (`menu_id`),
  ADD KEY `fk_item_id` (`item_id`);

--
-- Indexes for table `open_hours_info`
--
ALTER TABLE `open_hours_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant_info`
--
ALTER TABLE `restaurant_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD UNIQUE KEY `address_x` (`address_x`),
  ADD UNIQUE KEY `address_y` (`address_y`),
  ADD KEY `open_hours_id_fk` (`open_hours_id`);

--
-- Indexes for table `restaurant_menu`
--
ALTER TABLE `restaurant_menu`
  ADD KEY `fk_restaurant_id` (`restaurant_id`),
  ADD KEY `fk_menu_id_info` (`menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `open_hours_info`
--
ALTER TABLE `open_hours_info`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `restaurant_info`
--
ALTER TABLE `restaurant_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `fk_item_id` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `fk_menu_id` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`);

--
-- Constraints for table `restaurant_info`
--
ALTER TABLE `restaurant_info`
  ADD CONSTRAINT `open_hours_id_fk` FOREIGN KEY (`open_hours_id`) REFERENCES `open_hours_info` (`id`);

--
-- Constraints for table `restaurant_menu`
--
ALTER TABLE `restaurant_menu`
  ADD CONSTRAINT `fk_menu_id_info` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`),
  ADD CONSTRAINT `fk_restaurant_id` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant_info` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
