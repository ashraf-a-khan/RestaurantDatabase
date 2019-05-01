-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 01, 2019 at 07:22 AM
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
-- Database: `backup_restaurant`
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
  `category_name` varchar(55) NOT NULL,
  `name` varchar(88) NOT NULL,
  `price` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `category_name`, `name`, `price`) VALUES
(1, 'Appetizers', 'Guacamole and Cheese', '4.99'),
(2, 'Appetizers', 'Bacon Zucchini Fries', '12.99'),
(3, 'Kid\'s specials', 'Caprice Garlic Bread', '15.99'),
(4, 'All-day', 'Spicy and Hot Chicken French Fries', '24.00'),
(5, 'Burgers', 'Half Pounder Hamburger', '7.00'),
(6, 'Burgers', 'Beef Patty Burger Combo', '11.00'),
(7, 'Vegetarian', 'Veggie Burger', '13.00'),
(8, 'Drinks', 'Oreo Cookie pieces Milkshake', '9.00'),
(9, 'Salads', 'Cobb salad with Salmon', '12.00'),
(10, 'Salads', 'Caesar Salad w/ Vinaigrettes', '12.00'),
(11, 'Sauces', 'Buffalo', '2.00'),
(12, 'Appetizers', 'Spicy Chicken Momos', '15.88'),
(13, 'All-day', 'Spicy Chicken Lolipop Bucket', '99.99'),
(14, 'All-day', 'Vegetable Samosas (6 pcs)', '24.00'),
(15, 'Appetizers', 'Chicken Samosas (6 pcs)', '29.99'),
(16, 'Appetizers', 'Bhel Puri', '12.49'),
(17, 'Entrees', 'Palak Paneer', '19.99'),
(18, 'Entrees', 'Chicken Tikka Masala', '24.99'),
(19, 'Entrees', 'Aaloo Gobi Masala', '17.99'),
(20, 'Entrees', 'Chana Masala', '22.99'),
(21, 'Entrees', 'Mushroom Peas Pulav', '19.49'),
(22, 'Entrees', 'Chicken, Lamb and Goat Combo Biryani', '49.99'),
(23, 'All-day', 'Malai Kulfi', '7.00'),
(24, 'Desserts', 'Kheer', '7.00'),
(25, 'Desserts', 'Gajar ka Halwa', '7.49'),
(26, 'Kid\'s specials', 'Pav Bhaji with Mini Samosa', '11.99'),
(27, 'Breakfast', 'Crab Rangoon', '3.49'),
(28, 'Breakfast', 'Steamed Dumplings', '6.49'),
(29, 'Breakfast', 'Roast Chicken/Pork/Beef Egg Roll', '1.49'),
(30, 'Lunch', 'Shrimp Chow Mein Combo', '8.99'),
(31, 'Lunch', 'BBQ Spare Ribs Combo', '9.99'),
(32, 'All-day', 'Shrimp with Lobster Sauce and Fries', '14.99'),
(33, 'Dinner', 'Roast Shrimp Fried Rice', '5.99'),
(34, 'Soups', 'Won Ton Soup', '2.99'),
(35, 'Soups', 'Chinese Vegetable Soup', '7.99'),
(36, 'Drinks', 'Small/Medium/Large Ice Tea', '6.99'),
(37, 'Drinks', 'Large Home Made Lemon Tea', '4.99'),
(38, 'Appetizers', '6 Fresh Mozzarella Sticks', '8.99'),
(39, 'Appetizers', 'Quensadilla', '7.99'),
(40, 'Lunch', 'Jumbo Buffallo Wings with Rice', '24.99'),
(41, 'Side dishes', 'Jumbo Fried Real Onion Rings', '5.49'),
(42, 'Side dishes', 'Sweet Potato Fries', '4.49'),
(43, 'Lunch', '22 Shrimp in a Basket with Rice', '30.49'),
(44, 'Dinner', 'Chicken Fingers Deluxe with Rice', '32.49'),
(45, 'Dinner', 'London Broil Mushroom Gravy and Baby Back Ribs\r\n', '67.99'),
(46, 'Lunch', 'Greek-Style Boiled Mushroom', '24.99'),
(47, 'All-day', 'Breaded Veal Cutlet Parmigiana with Spaghettis\r\n', '25.99'),
(48, 'Drinks', 'Mango Pineapple Smoothie', '4.99'),
(50, 'Appetizers', 'Fried Pickles', '4.99'),
(51, 'Appetizers', 'Chilli Cheese Fries', '7.49'),
(52, 'Appetizers', 'Seasoned Steakhouse Wings', '7.49'),
(53, 'Lunch', 'Firecracker Chicken Wraps', '10.79'),
(54, 'Lunch', 'Texas Tonion', '11.49'),
(55, 'Lunch', 'Renegade Sirloin', '14.99'),
(56, 'Lunch', 'Flatiron Steak', '29.99'),
(57, 'Lunch', 'Renegade Sirloin and Baby-back ribs', '39.95'),
(58, 'Dinner', 'Flows Filet and Lobster Tail', '39.94'),
(59, 'Dinner', 'Flows Filet and Longhorn Salmon with Gravy\r\n', '49.98'),
(60, 'Entrees', 'Prime Rib With 3 Ribeye and Fire-Grilled T-Bone with Chicken\r\n', '149.98'),
(61, 'Drinks', 'Pale ale', '3.99'),
(62, 'Drinks', 'Stout', '7.99'),
(63, 'Drinks', 'Riesling', '14.99'),
(64, 'Drinks', 'Red Wine', '12.99'),
(65, 'Kid\'s specials', 'Tomato Sauce with Choice of Vegan Pasta', '5.99'),
(66, 'Kid\'s specials', 'Cheese Ravioli\r\n', '5.99'),
(67, 'Kid\'s specials', 'Pizza\r\n', '5.99'),
(68, 'Side dishes', 'Rotini with Marinara\r\n', '5.49'),
(69, 'Lunch', 'Spicy Alfredo Chicken with Lasagna Dip\r\n', '12.49'),
(70, 'Lunch', 'Lasagna Fritta\r\n', '12.99'),
(71, 'Smoothies', 'Mango Banana Smoothie\r\n', '4.99'),
(72, 'Smoothies', 'Cherry Ginger Smoothie\r\n', '9.99'),
(73, 'Smoothies', 'Pineapple Mint Smoothie\r\n', '4.99'),
(74, 'Smoothies', 'Pomegranate Antioxident Smoothie\r\n', '9.99'),
(75, 'Smoothies', 'Orange Sea-Booster Smoothie\r\n', '17.49'),
(76, 'Smoothies', 'Apple and Green-Booster Smoothie\r\n', '17.98'),
(77, 'Smoothies', 'Protien Strawberry Lime Smoothie\r\n', '15.99'),
(78, 'Smoothies', 'Samson Smoothie\r\n', '12.99'),
(79, 'Drinks', 'Vanilla Bubble tea\r\n', '15.99'),
(80, 'Drinks', 'Cha Cha Bubble Tea\r\n', '14.99'),
(82, 'Entrees', 'Original NY Plain Cheesecake\r\n', '42.95'),
(83, 'Entrees', 'Strawberry Cheesecake\r\n', '59.99'),
(84, 'Entrees', 'Brownie Choco-lava Cake\r\n', '69.87'),
(85, 'Entrees', 'Seasonal Little Fellas Sampler\r\n', '44.99'),
(86, 'All-day', 'Spring Mini Cheesecake Main Course', '61.99'),
(87, 'Entrees', 'Original New York Plain Little Fella\r\n', '19.29'),
(88, 'Entrees', 'Strawberry Brownies\r\n', '12.99'),
(89, 'Entrees', 'Cookies\r\n', '77.99'),
(90, 'Lunch', 'Hot Jalapeno Antipasta\r\n', '15.50'),
(91, 'Appetizers', 'Buffalo Wings\r\n', '29.99'),
(92, 'Appetizers', 'Egg Plant Tower\r\n', '19.99'),
(93, 'Salads', 'Seafood Salad\r\n', '16.88'),
(94, 'Salads', 'Jalapeno Hot Pepper Salad\r\n', '13.99'),
(95, 'Vegan', 'Hot Submarine Sandwich\r\n', '13.99'),
(96, 'All-day', 'Shrimp Chicken', '17.98'),
(97, 'All-day', 'Meatball Parmigiana', '17.92'),
(98, 'Vegetarian', 'Grilled Vegetable Spice\r\n', '12.99'),
(99, 'Soups', 'Potato Soup\r\n', '12.97'),
(100, 'All-day', 'Extra Cheesy Cold Pizza\r\n', '22.99'),
(101, 'All-day', 'Whole Wheat Bar Pie\r\n', '19.75'),
(102, 'Vegan', 'Vegan Gluten Free Pizza\r\n', '34.99'),
(103, 'All-day', 'Gold Plated, England Cheese, refined elite pizza', '2500.99'),
(104, 'All-day', 'Buffalo Chicken Pizza\r\n', '19.99'),
(105, 'Vegetarian', 'Grilled Vegetable Pizza\r\n', '14.99'),
(106, 'All-day', 'Double Cheese Margarita Pizza', '16.99'),
(107, 'Dinner', 'Halal Pizza\r\n', '17.21'),
(108, 'Dinner', 'Meatlovers Pizza\r\n', '21.21'),
(109, 'Combos', 'Supreme Pizza with Drinks and Fries\r\n', '19.21'),
(110, 'All-day', 'Chicken Pizza\r\n', '15.99'),
(111, 'All-day', 'Farmhouse Pizza\r\n', '18.99'),
(112, 'All-day', 'Philly Cheese Steak Pizza\r\n', '46.97'),
(113, 'All-day', 'Honolulu Heaven\r\n', '29.98'),
(114, 'Drinks', 'Water\r\n', '1.75'),
(115, 'Kid\'s specials', 'Chinese Manchurian Soup', '77.49'),
(116, 'Drinks', 'Chinese Manchurian Soup', '77.49'),
(117, 'Cuisine', 'Hondorus Manchurian Soup', '7.49'),
(125, 'Soups', 'pon ton soup', '21.22'),
(128, 'Side dishes', 'the best pizza out there', '13.55'),
(129, 'Side dishes', 'the best pizza out there', '13.55'),
(130, 'Burgers', 'pithons apizaa', '13.22'),
(131, 'All-day', 'Bacon Cheese Burger', '12.22'),
(132, 'Drinks', 'Chocolate Shake', '12.44'),
(133, 'All-day', 'Ramen Noodles with sauce', '33.11'),
(134, 'Burgers', 'Chicken Sandwich Burger and Fries and Coke', '55.66'),
(135, 'Salads', 'Shrimp Fried Fingers', '33.11'),
(139, 'Smoothies', 'Chinese', '19.22'),
(140, 'Soups', 'Chana Masala', '199.22'),
(141, 'Soups', 'Chana Masala', '1929.22'),
(142, 'Vegan', 'amamznna', '21.20'),
(143, 'All-day', 'Bhel Puri', '12.99'),
(144, 'Soups', 'Chicken Manchurian', '21.00'),
(145, 'All-day', 'Chicken 65', '12.11'),
(147, 'Lunch', 'Burger and Fries', '5.99'),
(151, 'Lunch', 'goose', '12.99'),
(152, 'Soups', 'Tomato soup', '12.99'),
(153, 'Drinks', 'Cold Coffee', '4.99'),
(154, 'All-day', 'coffee', '2.75'),
(155, 'Kid\'s specials', 'Chicken', '3.11'),
(156, 'Entrees', 'Hakka Noodles', '12.99'),
(157, 'Dinner', 'Pizza', '3.99'),
(158, 'All-day', 'ashraf', '5.00'),
(159, 'All-day', 'Chinese', '21.00'),
(161, 'Lunch', 'Chana Masala', '12.00'),
(162, 'Entrees', 'Sab ka khana', '12.00'),
(163, 'Kid\'s specials', 'khana for bacho', '12.11'),
(164, 'Kid\'s specials', 'Crunchy munchy', '12.99'),
(165, 'Kid\'s specials', 'Joar', '31.22');

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
(10, 'Pizzeria'),
(11, 'Asas Menu'),
(13, 'CopenHagen'),
(14, 'pazaka'),
(15, 'Maliha Momo'),
(16, 'More momos'),
(17, 'Ultimate Momos'),
(18, 'Ashraf'),
(19, 'Arif Lunch'),
(20, 'amzman'),
(21, 'Daro Menu'),
(22, ''),
(23, 'karin'),
(24, 'Normal'),
(25, 'Breakfast'),
(26, 'Fatima'),
(27, 'Leo'),
(28, 'Breakfast'),
(29, 'Manes Munchies');

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
(5, 116),
(1, 131),
(10, 132),
(6, 133),
(1, 134),
(9, 135),
(19, 139),
(18, 140),
(18, 141),
(20, 142),
(11, 143),
(17, 144),
(14, 145),
(22, 147),
(23, 151),
(4, 152),
(7, 153),
(1, 154),
(25, 155),
(26, 156),
(27, 157),
(28, 157),
(28, 157),
(28, 158),
(27, 159),
(6, 159),
(6, 159),
(6, 159),
(6, 161),
(6, 161),
(6, 161),
(6, 161),
(6, 161),
(6, 162),
(6, 163),
(29, 164),
(27, 164),
(27, 165);

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
(11, 'Sunday to Saturday', '24x7', 'All day everyday'),
(18, 'monday only', '4:00 pm to 8:00 pm', 'Free food'),
(19, 'Hamesha', '12:00 am to 12:00pm', 'Most expensive'),
(20, 'Sunday to wednesday', '1:00pm to 5:00am', 'No Specials'),
(21, 'Mondays only', '10:00 am to 7:00 pm', 'Every single thing you want'),
(22, 'Saturday', '10:00 am', 'Free Delivery'),
(23, 'amzma', 'manza', 'asafazaa'),
(24, 'Monday to Wednesday', '10:00 am to 5:00 pm', 'Fish all day on Mondays'),
(27, 'monday', '2', '3'),
(28, 'Monday to wednesday', '8:00 am to 7:00pm', 'Shami kebab'),
(29, 'Monday to Friday', '10:00 am to 5:00 pm', 'Chinese and Japanese'),
(30, 'Sunday to tuesday', '10:00 am to 4:00 pm', 'Free food'),
(32, 'Monday to Sunday', '9:00 am to 7:00 pm', 'Chinese food free');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_info`
--

CREATE TABLE `restaurant_info` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `rating` int(11) NOT NULL,
  `open_hours_id` int(11) DEFAULT NULL,
  `address_x` int(11) NOT NULL,
  `address_y` int(11) NOT NULL,
  `address_verbal` varchar(99) DEFAULT NULL
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
(11, 'Pizzeria la Roma', 10, 11, 59, 21, 'Northern Blvd, Barclay\'s, New York 13313'),
(46, 'Kroog\'s', 2, 28, 2, 2, 'mmaamz'),
(47, 'Fatima\'s Kitchen', 2, 29, 41, 13, 'Jacksonville'),
(48, 'Leo\'s', 8, 30, 4, 5, 'address'),
(51, 'Mane\'s Munchies', 1, 32, 9, 9, 'Roald dhal');

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
(11, 10),
(46, 25),
(47, 26),
(48, 27),
(51, 29);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_2` (`name`),
  ADD KEY `name` (`name`),
  ADD KEY `name_3` (`name`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category_name` (`category_name`);

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
  ADD KEY `fk_menu_id_info` (`menu_id`),
  ADD KEY `fk_restaurant_id` (`restaurant_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `open_hours_info`
--
ALTER TABLE `open_hours_info`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `restaurant_info`
--
ALTER TABLE `restaurant_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `fk_category_name` FOREIGN KEY (`category_name`) REFERENCES `category` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `fk_item_id` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
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
  ADD CONSTRAINT `fk_menu_id_info` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_restaurant_id` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant_info` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
