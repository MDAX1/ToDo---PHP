-- phpMyAdmin SQL Dump
-- version 5.0.4
--
-- PHP Version: 7.4.13
----------------------------------------------------------

-- Table structure for table `todo`

CREATE TABLE `todo` (
  `todo_id` int(11) NOT NULL,
  `todo_name` varchar(255) NOT NULL,
  `todo_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `todo`

INSERT INTO `todo` (`todo_id`, `todo_name`, `todo_date`) VALUES
(2, 'Fix the car', 'Monday 3nd June, 2021'),
(4, 'clean my room', 'Monday 8th of February 2021 04:40:00 PM'),
(5, 'walk with the elephant', 'Monday 8th of February 2021 04:40:18 PM'),
(7, 'go hunting', 'Monday 8th of February 2021 04:40:50 PM'),
(10, 'make dinner', 'Monday 8th of February 2021 04:41:57 PM'),
(13, 'take out the trash', 'Monday 8th of February 2021 04:43:23 PM'),
(15, 'pet the cat', 'Monday 8th of February 2021 05:34:28 PM'),
(17, 'take a walk with lions', 'Monday 8th of February 2021 07:11:51 PM');

-- Indexes for table `todo`

ALTER TABLE `todo`
  ADD PRIMARY KEY (`todo_id`);

-- AUTO_INCREMENT for table `todo`

ALTER TABLE `todo`
  MODIFY `todo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;