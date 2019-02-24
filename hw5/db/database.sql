# Database Script to create Tables and initialize them with data.
--
-- Database: `cs602`
--

-- --------------------------------------------------------

--
-- Table structure for table `sk_courses`
--

CREATE TABLE `sk_courses` (
  `courseID` varchar(12) NOT NULL,
  `courseName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sk_courses`
--

INSERT INTO `sk_courses` (`courseID`, `courseName`) VALUES
('cs501', 'Introduction to Python Programming'),
('cs601', 'Web application Development'),
('cs602', 'Server-Side Web Development'),
('cs701', 'Rich Internet Application Development');

-- --------------------------------------------------------

--
-- Table structure for table `sk_students`
--

CREATE TABLE `sk_students` (
  `studentID` int(11) NOT NULL,
  `courseID` varchar(12) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sk_students`
--

INSERT INTO `sk_students` (`studentID`, `courseID`, `firstName`, `lastName`, `email`) VALUES
(1, 'cs601', 'John', 'Doe', 'john@doe.com'),
(2, 'cs601', 'Jane', 'Doe', 'jane@doe.com'),
(3, 'cs602', 'John', 'Smith', 'john@smith.com'),
(4, 'cs602', 'Jane', 'Smith', 'jane@smith.com'),
(5, 'cs701', 'John', 'Doe', 'john@doe.com'),
(6, 'cs701', 'Jane', 'Smith', 'jane@smith.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sk_courses`
--
ALTER TABLE `sk_courses`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `sk_students`
--
ALTER TABLE `sk_students`
  ADD PRIMARY KEY (`studentID`);



--
-- AUTO_INCREMENT for table `sk_students`
--
ALTER TABLE `sk_students`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;