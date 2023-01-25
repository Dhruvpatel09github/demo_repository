
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `city` varchar(80) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `name`, `gender`, `city`, `email`) VALUES
(1, 'Yogesh', 'male', 'Bhopal', 'yogesh@makitweb.com'),
(2, 'Vishal', 'male', 'Pune', 'vishal@makitweb.com'),
(3, 'Vijay', 'male', 'Jaipur', 'vijayec@makitweb.com'),
(4, 'Rahul', 'male', 'Kanpur', 'rahul512@makitweb.com'),
(5, 'Sonarika', 'female', 'Mumbai', 'bsonarika@makitweb.com'),
(6, 'Jitentendre', 'male', 'Bhopal', 'jiten94@makitweb.com'),
(7, 'Aditya', 'male', 'Pune', 'aditya@makitweb.com'),
(8, 'Anil', 'male', 'Indore', 'anilsingh@makitweb.com'),
(9, 'Sunil', 'male', 'Nagpur', 'sunil1993@makitweb.com'),
(10, 'Akilesh', 'male', 'Surat', 'akileshsahu@makitweb.com'),
(11, 'Raj', 'male', 'Ahmedabad', 'rajsingh@makitweb.com'),
(12, 'Mayank', 'male', 'Ghaziabad', 'mpatidar@makitweb.com'),
(13, 'Shalu', 'female', 'Bhopal', 'gshalu521@makitweb.com'),
(14, 'Ravi', 'male', 'Ludhiana', 'ravisharma21@makitweb.com'),
(15, 'Shruti', 'female', 'Delhi', 'shruti@makitweb.com'),
(16, 'Rishi', 'male', 'Mumbai', 'rishi121@makitweb.com'),
(17, 'Rohan', 'male', 'Jaipur', 'rohansingh@makitweb.com');
