DROP TABLE IF EXISTS  users;

DROP TABLE IF EXISTS  characters;

DROP TABLE IF EXISTS  topics;

DROP TABLE IF EXISTS words;



CREATE TABLE `words` (
  `word_id` int(11) NOT NULL AUTO_INCREMENT,
  `Topic` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Length` int(11) NOT NULL,
  `Level` int(11) NOT NULL,
  `Telugu_Word` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `English_Word` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Telugu_in_English` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `English_in_Telugu` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Image_Name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Audio_Name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Notes` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Created_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Last_Updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`word_id`),
  KEY `Topic` (`Topic`),
  CONSTRAINT `words_ibfk_1` FOREIGN KEY (`Topic`) REFERENCES `topics` (`topic`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

INSERT INTO words VALUES("1","animal","2","0","???","ant","chiima","?????","ant.png","ant.png","getbetterpicture","descexists","2017-11-09 18:31:58","2017-11-09 18:31:58");
INSERT INTO words VALUES("2","animal","2","0","??????","cat","pilli","??????","cat.jpg","cat.mp3","","","2017-11-09 18:31:58","2017-11-09 18:31:58");
INSERT INTO words VALUES("3","animal","2","0","?????","dog","kukka","????","dog.jpg","dog.mp3","","","2017-11-09 18:31:58","2017-11-09 18:31:58");
INSERT INTO words VALUES("4","animal","2","0","????","fox","nakka","??????","fox.jpg","fox.mp3","","","2017-11-09 18:31:58","2017-11-09 18:31:58");
INSERT INTO words VALUES("5","animal","3","0","?????","elephant","?nugu","????????","elephant.jpg","elephant.mp3","","","2017-11-09 18:31:58","2017-11-09 18:31:58");
INSERT INTO words VALUES("6","animal","3","0","?????","fish","c?palu","????","fish.jpg","fish.mp3","","","2017-11-09 18:31:58","2017-11-09 18:31:58");
INSERT INTO words VALUES("7","animal","2","0","??????","sheep","gorre","????","sheep.jpg","sheep.mp3","","","2017-11-09 18:31:58","2017-11-09 18:31:58");
INSERT INTO words VALUES("8","animal","3","0","??????","turtle","tabelu","???????","turtle.jpg","turtle.mp3","","","2017-11-09 18:31:58","2017-11-09 18:31:58");
INSERT INTO words VALUES("9","animal","2","0","????","buffalo","geda","?????","buffalo.jpg","buffalo.mp3","","","2017-11-09 18:31:58","2017-11-09 18:31:58");
INSERT INTO words VALUES("10","animal","2","0","???","cow","aavu","??","fish.jpg","fish.mp3","","","2017-11-09 18:31:58","2017-11-09 18:31:58");
INSERT INTO words VALUES("11","school","3","0","????","pen","kalamu","????","pen.jpg","pen.mp3","","","2017-11-09 18:31:58","2017-11-09 18:31:58");
INSERT INTO words VALUES("12","school","4","0","??????","school","paathashaala","??????","school.jpg","school.mp3","","","2017-11-09 18:31:58","2017-11-09 18:31:58");
INSERT INTO words VALUES("13","school","4","0","????????","book","pustakamu","????","book.jpg","book.mp3","","","2017-11-09 18:31:58","2017-11-09 18:31:58");
INSERT INTO words VALUES("14","school","4","0","????????","blackboard","nallaballa","????????????","black_board.jpg","black_board.mp3","","","2017-11-09 18:31:58","2017-11-09 18:31:58");
INSERT INTO words VALUES("15","school","5","0","??????????","library","gramthaalayamu","???????","library.jpg","library.mp3","","","2017-11-09 18:31:58","2017-11-09 18:31:58");
INSERT INTO words VALUES("16","school","4","0","????????","teacher","pamtulamma","?????","teacher.jpg","teacher.mp3","","","2017-11-09 18:31:58","2017-11-09 18:31:58");
INSERT INTO words VALUES("17","school","2","0","??????","chair","kurchii","??????","chair.jpg","chair.mp3","","","2017-11-09 18:31:58","2017-11-09 18:31:58");
INSERT INTO words VALUES("18","school","4","0","???????","paper","kaagitamu","?????","paper.jpg","paper.mp3","","","2017-11-09 18:31:58","2017-11-09 18:31:58");
INSERT INTO words VALUES("19","school","6","0","????????","classroom","taragatigadi","??????????","school.jpg","class_room.mp3","","","2017-11-09 18:31:58","2017-11-09 18:31:58");
INSERT INTO words VALUES("20","school","7","0","?????????????????","headmaster","pradhaanopaadhyaayudu","???????????","head_master.jpg","head_master.mp3","","","2017-11-09 18:31:58","2017-11-09 18:31:58");
INSERT INTO words VALUES("21","food","4","0","????????????","egg","koodigruddu","???","egg.jpg","egg.mp3","","","2017-11-09 18:31:58","2017-11-09 18:31:58");
INSERT INTO words VALUES("22","food","5","0","????????","vegetables","kooragaayalu","???????????","vegetables.jpg","vegetables.mp3","","","2017-11-09 18:31:58","2017-11-09 18:31:58");
INSERT INTO words VALUES("23","food","4","0","??????","sugar","pamchadaara","?????","sugar.jpg","sugar.mp3","","","2017-11-09 18:31:58","2017-11-09 18:31:58");
INSERT INTO words VALUES("24","food","3","0","???????","rice","biyyamu","????","rice.jpg","rice.mp3","","","2017-11-09 18:31:58","2017-11-09 18:31:58");
INSERT INTO words VALUES("25","food","3","0","??????","yogurt","perugu","???????","yogurt.jpg","yogurt.mp3","","","2017-11-09 18:31:58","2017-11-09 18:31:58");
INSERT INTO words VALUES("26","food","3","0","??????","pickle","pachchadi","??????","pickle.jpg","pickle.mp3","","","2017-11-09 18:31:59","2017-11-09 18:31:59");
INSERT INTO words VALUES("27","food","4","0","???????","yellowrice","pulihoora","?????????","yellow_rice.jpg","yellow_rice.mp3","","","2017-11-09 18:31:59","2017-11-09 18:31:59");
INSERT INTO words VALUES("28","food","6","0","????????????","potatos","bamgaalaadumpalu","????????","potatos.jpg","potatos.mp3","","","2017-11-09 18:31:59","2017-11-09 18:31:59");
INSERT INTO words VALUES("29","food","8","0","??????????????","greenchillies","pachchimirapakaayalu","??????????????","green_chillies.jpg","green_chillies.mp3","","","2017-11-09 18:31:59","2017-11-09 18:31:59");
INSERT INTO words VALUES("30","food","5","0","?????????","okra","bemdakaayalu","?????","okra.jpg","okra.mp3","","","2017-11-09 18:31:59","2017-11-09 18:31:59");
INSERT INTO words VALUES("31","house1","2","0","?????","house","","","house.jpg","house.mp3","","","2017-11-09 18:31:59","2017-11-09 18:31:59");
INSERT INTO words VALUES("32","house1","3","0","?????","","mamchamu","","cot.jpg","cot.mp3","","","2017-11-09 18:31:59","2017-11-09 18:31:59");
INSERT INTO words VALUES("33","house1","2","0","????","","","paat","pot.jpg","pot.mp3","","","2017-11-09 18:31:59","2017-11-09 18:31:59");
INSERT INTO words VALUES("34","house1","4","0","??????","","","","cell_phone.png","cell_phone.mp3","","","2017-11-09 18:31:59","2017-11-09 18:31:59");
INSERT INTO words VALUES("35","house1","4","0","????","","","","","pillow.mp3","","","2017-11-09 18:31:59","2017-11-09 18:31:59");





CREATE TABLE `topics` (
  `topic` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`topic`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO  topics VALUES("Animals");
INSERT INTO  topics VALUES("Foods");
INSERT INTO  topics VALUES("Household");
INSERT INTO  topics VALUES("Machines");
INSERT INTO  topics VALUES("Plants");
INSERT INTO  topics VALUES("School");
INSERT INTO  topics VALUES("Toys");
INSERT INTO  topics VALUES("Universe");





CREATE TABLE `characters` (
  `word_id` int(11) NOT NULL,
  `character_index` tinyint(4) NOT NULL,
  `character_value` varchar(7) NOT NULL,
  PRIMARY KEY (`word_id`,`character_index`,`character_value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO  characters VALUES("1","0","a");
INSERT INTO  characters VALUES("1","1","n");
INSERT INTO  characters VALUES("1","2","i");
INSERT INTO  characters VALUES("1","3","m");
INSERT INTO  characters VALUES("1","4","a");
INSERT INTO  characters VALUES("1","5","l");
INSERT INTO  characters VALUES("2","0","a");
INSERT INTO  characters VALUES("2","1","n");
INSERT INTO  characters VALUES("2","2","i");
INSERT INTO  characters VALUES("2","3","m");
INSERT INTO  characters VALUES("2","4","a");
INSERT INTO  characters VALUES("2","5","l");
INSERT INTO  characters VALUES("3","0","a");
INSERT INTO  characters VALUES("3","1","n");
INSERT INTO  characters VALUES("3","2","i");
INSERT INTO  characters VALUES("3","3","m");
INSERT INTO  characters VALUES("3","4","a");
INSERT INTO  characters VALUES("3","5","l");
INSERT INTO  characters VALUES("4","0","a");
INSERT INTO  characters VALUES("4","1","n");
INSERT INTO  characters VALUES("4","2","i");
INSERT INTO  characters VALUES("4","3","m");
INSERT INTO  characters VALUES("4","4","a");
INSERT INTO  characters VALUES("4","5","l");
INSERT INTO  characters VALUES("5","0","a");
INSERT INTO  characters VALUES("5","1","n");
INSERT INTO  characters VALUES("5","2","i");
INSERT INTO  characters VALUES("5","3","m");
INSERT INTO  characters VALUES("5","4","a");
INSERT INTO  characters VALUES("5","5","l");
INSERT INTO  characters VALUES("6","0","a");
INSERT INTO  characters VALUES("6","1","n");
INSERT INTO  characters VALUES("6","2","i");
INSERT INTO  characters VALUES("6","3","m");
INSERT INTO  characters VALUES("6","4","a");
INSERT INTO  characters VALUES("6","5","l");
INSERT INTO  characters VALUES("7","0","a");
INSERT INTO  characters VALUES("7","1","n");
INSERT INTO  characters VALUES("7","2","i");
INSERT INTO  characters VALUES("7","3","m");
INSERT INTO  characters VALUES("7","4","a");
INSERT INTO  characters VALUES("7","5","l");
INSERT INTO  characters VALUES("8","0","a");
INSERT INTO  characters VALUES("8","1","n");
INSERT INTO  characters VALUES("8","2","i");
INSERT INTO  characters VALUES("8","3","m");
INSERT INTO  characters VALUES("8","4","a");
INSERT INTO  characters VALUES("8","5","l");
INSERT INTO  characters VALUES("9","0","a");
INSERT INTO  characters VALUES("9","1","n");
INSERT INTO  characters VALUES("9","2","i");
INSERT INTO  characters VALUES("9","3","m");
INSERT INTO  characters VALUES("9","4","a");
INSERT INTO  characters VALUES("9","5","l");
INSERT INTO  characters VALUES("10","0","a");
INSERT INTO  characters VALUES("10","1","n");
INSERT INTO  characters VALUES("10","2","i");
INSERT INTO  characters VALUES("10","3","m");
INSERT INTO  characters VALUES("10","4","a");
INSERT INTO  characters VALUES("10","5","l");
INSERT INTO  characters VALUES("11","0","s");
INSERT INTO  characters VALUES("11","1","c");
INSERT INTO  characters VALUES("11","2","h");
INSERT INTO  characters VALUES("11","3","o");
INSERT INTO  characters VALUES("11","4","o");
INSERT INTO  characters VALUES("11","5","l");
INSERT INTO  characters VALUES("12","0","s");
INSERT INTO  characters VALUES("12","1","c");
INSERT INTO  characters VALUES("12","2","h");
INSERT INTO  characters VALUES("12","3","o");
INSERT INTO  characters VALUES("12","4","o");
INSERT INTO  characters VALUES("12","5","l");
INSERT INTO  characters VALUES("13","0","s");
INSERT INTO  characters VALUES("13","1","c");
INSERT INTO  characters VALUES("13","2","h");
INSERT INTO  characters VALUES("13","3","o");
INSERT INTO  characters VALUES("13","4","o");
INSERT INTO  characters VALUES("13","5","l");
INSERT INTO  characters VALUES("14","0","s");
INSERT INTO  characters VALUES("14","1","c");
INSERT INTO  characters VALUES("14","2","h");
INSERT INTO  characters VALUES("14","3","o");
INSERT INTO  characters VALUES("14","4","o");
INSERT INTO  characters VALUES("14","5","l");
INSERT INTO  characters VALUES("15","0","s");
INSERT INTO  characters VALUES("15","1","c");
INSERT INTO  characters VALUES("15","2","h");
INSERT INTO  characters VALUES("15","3","o");
INSERT INTO  characters VALUES("15","4","o");
INSERT INTO  characters VALUES("15","5","l");
INSERT INTO  characters VALUES("16","0","s");
INSERT INTO  characters VALUES("16","1","c");
INSERT INTO  characters VALUES("16","2","h");
INSERT INTO  characters VALUES("16","3","o");
INSERT INTO  characters VALUES("16","4","o");
INSERT INTO  characters VALUES("16","5","l");
INSERT INTO  characters VALUES("17","0","s");
INSERT INTO  characters VALUES("17","1","c");
INSERT INTO  characters VALUES("17","2","h");
INSERT INTO  characters VALUES("17","3","o");
INSERT INTO  characters VALUES("17","4","o");
INSERT INTO  characters VALUES("17","5","l");
INSERT INTO  characters VALUES("18","0","s");
INSERT INTO  characters VALUES("18","1","c");
INSERT INTO  characters VALUES("18","2","h");
INSERT INTO  characters VALUES("18","3","o");
INSERT INTO  characters VALUES("18","4","o");
INSERT INTO  characters VALUES("18","5","l");
INSERT INTO  characters VALUES("19","0","s");
INSERT INTO  characters VALUES("19","1","c");
INSERT INTO  characters VALUES("19","2","h");
INSERT INTO  characters VALUES("19","3","o");
INSERT INTO  characters VALUES("19","4","o");
INSERT INTO  characters VALUES("19","5","l");
INSERT INTO  characters VALUES("20","0","s");
INSERT INTO  characters VALUES("20","1","c");
INSERT INTO  characters VALUES("20","2","h");
INSERT INTO  characters VALUES("20","3","o");
INSERT INTO  characters VALUES("20","4","o");
INSERT INTO  characters VALUES("20","5","l");
INSERT INTO  characters VALUES("21","0","f");
INSERT INTO  characters VALUES("21","1","o");
INSERT INTO  characters VALUES("21","2","o");
INSERT INTO  characters VALUES("21","3","d");
INSERT INTO  characters VALUES("22","0","f");
INSERT INTO  characters VALUES("22","1","o");
INSERT INTO  characters VALUES("22","2","o");
INSERT INTO  characters VALUES("22","3","d");
INSERT INTO  characters VALUES("23","0","f");
INSERT INTO  characters VALUES("23","1","o");
INSERT INTO  characters VALUES("23","2","o");
INSERT INTO  characters VALUES("23","3","d");
INSERT INTO  characters VALUES("24","0","f");
INSERT INTO  characters VALUES("24","1","o");
INSERT INTO  characters VALUES("24","2","o");
INSERT INTO  characters VALUES("24","3","d");
INSERT INTO  characters VALUES("25","0","f");
INSERT INTO  characters VALUES("25","1","o");
INSERT INTO  characters VALUES("25","2","o");
INSERT INTO  characters VALUES("25","3","d");
INSERT INTO  characters VALUES("26","0","f");
INSERT INTO  characters VALUES("26","1","o");
INSERT INTO  characters VALUES("26","2","o");
INSERT INTO  characters VALUES("26","3","d");
INSERT INTO  characters VALUES("27","0","f");
INSERT INTO  characters VALUES("27","1","o");
INSERT INTO  characters VALUES("27","2","o");
INSERT INTO  characters VALUES("27","3","d");
INSERT INTO  characters VALUES("28","0","f");
INSERT INTO  characters VALUES("28","1","o");
INSERT INTO  characters VALUES("28","2","o");
INSERT INTO  characters VALUES("28","3","d");
INSERT INTO  characters VALUES("29","0","f");
INSERT INTO  characters VALUES("29","1","o");
INSERT INTO  characters VALUES("29","2","o");
INSERT INTO  characters VALUES("29","3","d");
INSERT INTO  characters VALUES("30","0","f");
INSERT INTO  characters VALUES("30","1","o");
INSERT INTO  characters VALUES("30","2","o");
INSERT INTO  characters VALUES("30","3","d");
INSERT INTO  characters VALUES("31","0","h");
INSERT INTO  characters VALUES("31","1","o");
INSERT INTO  characters VALUES("31","2","u");
INSERT INTO  characters VALUES("31","3","s");
INSERT INTO  characters VALUES("31","4","e");
INSERT INTO  characters VALUES("31","5","1");
INSERT INTO  characters VALUES("32","0","h");
INSERT INTO  characters VALUES("32","1","o");
INSERT INTO  characters VALUES("32","2","u");
INSERT INTO  characters VALUES("32","3","s");
INSERT INTO  characters VALUES("32","4","e");
INSERT INTO  characters VALUES("32","5","1");
INSERT INTO  characters VALUES("33","0","h");
INSERT INTO  characters VALUES("33","1","o");
INSERT INTO  characters VALUES("33","2","u");
INSERT INTO  characters VALUES("33","3","s");
INSERT INTO  characters VALUES("33","4","e");
INSERT INTO  characters VALUES("33","5","1");
INSERT INTO  characters VALUES("34","0","h");
INSERT INTO  characters VALUES("34","1","o");
INSERT INTO  characters VALUES("34","2","u");
INSERT INTO  characters VALUES("34","3","s");
INSERT INTO  characters VALUES("34","4","e");
INSERT INTO  characters VALUES("34","5","1");
INSERT INTO  characters VALUES("35","0","h");
INSERT INTO  characters VALUES("35","1","o");
INSERT INTO  characters VALUES("35","2","u");
INSERT INTO  characters VALUES("35","3","s");
INSERT INTO  characters VALUES("35","4","e");
INSERT INTO  characters VALUES("35","5","1");





CREATE TABLE `users` (
  `user_email` varchar(100) NOT NULL COMMENT 'email address is the key',
  `username` varchar(50) NOT NULL COMMENT 'if the user doesn''t want to display the user name',
  `user_password` varchar(65) NOT NULL COMMENT 'for storing the password',
  `id_verified` tinyint(1) NOT NULL COMMENT '0 for false, 1 for true',
  `activation_token` varchar(25) NOT NULL COMMENT 'for storing the activation code when the users register or forget password',
  `role` tinyint(1) NOT NULL COMMENT '0 for ADMIN, 1 for registered user',
  PRIMARY KEY (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO  users VALUES("fm2584uk@metrostate.edu","prashant","5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8","1","753951","0");
INSERT INTO  users VALUES("hp6449qy@metrostate.edu","tyler","5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8","1","1234","0");
INSERT INTO  users VALUES("test","test","test","1","751","0");
INSERT INTO  users VALUES("user","user","user","1","751433","1");



