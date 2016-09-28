-- phpMyAdmin SQL Dump
-- version 4.4.15.8
-- https://www.phpmyadmin.net
--
-- Host: s203.loopia.se
-- Generation Time: Sep 19, 2016 at 07:24 PM
-- Server version: 5.1.50-log
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oscarb_se`
--

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE IF NOT EXISTS `music` (
  `title` varchar(50) NOT NULL,
  `ldate` date NOT NULL,
  `file` varchar(100) NOT NULL,
  `lyrics` text NOT NULL,
  `downloads` smallint(5) unsigned NOT NULL DEFAULT '0',
  `extra` varchar(100) NOT NULL,
  `hidden` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='oscarb.se - Music Database';

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`title`, `ldate`, `file`, `lyrics`, `downloads`, `extra`, `hidden`) VALUES
('How Was Your Day', '2006-05-26', 'oscarb - How Was Your Day.mp3', 'I woke up this morning. \r\nI told myself it''d be a happy day.\r\nLeft home for school, \r\nI passed some children and I watched them play\r\nI aimed for the subway, \r\nthen I gave away some of my money \r\nto the poor guy in the hood, \r\nhopefully so he could get some food\r\n\r\nThen I ran away, only to be late again. \r\nForced to prey that I would miss my train\r\nGrabbed a newspaper on the go! \r\nWill there be something new that I didn''t know?\r\nAnd I read it, just like I usually do, \r\nuntil the train pulls out and it''s time to move\r\n\r\nTook a walk from the station to the school, \r\nI met some friends, they were playing cool\r\nHad a chat with them, they were late for class, \r\nnot so cool anymore, they were running fast\r\n\r\nAt last, I''m at the end of the line, \r\nI''m in school and I''m right on time.\r\nThat was my day so far, \r\nplease tell me yours whoever you are!\r\n\r\n\r\nHow was your day today? \r\nWas it good, bad or just okay?\r\nMy day, it went pretty fast. \r\nToo bad I couldn''t make it last.\r\nx2\r\n\r\n\r\nPhysics yo, time was going slow. \r\nSo I asked my bro'' "isn''t time to go?"\r\nBut he said "No, but it will be over soon". \r\nSo I checked my watch and it is afternoon \r\nAnd the sun is shining, and it''s bright outside, \r\nbut no way to notice between these walls.\r\n\r\nBut hey! Schools out for today, it''s time to head home.\r\nI put my clothes on and turned on my mobile phone. \r\nThen I took the subway home.\r\nWith the soundtrack to my life to play in the back, \r\nI keep my mind open while I try to stay on track.\r\n\r\nI''m searching for the girl for me. \r\nBut it feels like I''m in the wrong place to be.\r\nI''ve been searching for this girl for long, \r\nbut it''s hard to find you (now I''m all on my own).\r\n\r\nAnd I got home and turned on my computer, \r\nlike each and every day.\r\nPut in the password and the name of my user, \r\nto check my Gmail.\r\nAnd so the day goes by, \r\nplease tell me yours, let’s give it a try!\r\n\r\n\r\nHow was your day today? \r\nWas it good, bad or just okay?\r\nMy day, it went pretty fast. \r\nToo bad I couldn''t make it last.\r\n\r\n\r\nWhen the night arrives I think about my life, \r\nthe good, the bad, the future and the past\r\nNo matter how I try to keep my feelings aside, \r\nthose will always be there, now I''m writing these lines.\r\nAnd I close my eyes and the thoughts go deep, \r\nfrom times to times I manage to sleep.\r\nMy day is over, my mission complete. \r\nCan you feel the beat?\r\n\r\n\r\nHow was your day today? \r\nWas it good, bad or just okay?\r\nMy day, it went pretty fast. \r\nToo bad I couldn''t make it last.\r\n\r\nHow was your day today? \r\nGood, bad or just okay?\r\nMy day, it went pretty fast. \r\nToo bad I couldn''t make it last.\r\n\r\nHow was your Monday today? \r\nGood, bad or just okay?\r\nMy day, it went pretty fast. \r\nToo bad I couldn''t make it last.', 2401, '', 0),
('Missförstådd / Misunderstood (Album)', '2004-12-24', 'oscarb - msfrstd.zip', '', 0, '13 tracks in swedish and 7 in english', 1),
('One Step', '2008-05-10', 'oscarb - One Step.mp3', 'CHORUS________________________________\r\n\r\nHe takes ONE STEP / but he wants to take two\r\nONE STEP / to get a better view\r\nONE STEP / is all it takes to move\r\nONE STEP!\r\n\r\n\r\nCHAPTER 1________________________________\r\n\r\nHe wakes up! / but he never goes to sleep\r\nHe''s filled up / with work to his knees\r\nHis sight is low so he just can''t see / \r\nanything more than beyond his feets\r\n\r\nHe''s facing / the problems alone\r\nHe''s racing / but just on his own\r\nHis eyes are blind so he just won''t know, \r\nhow to learn about this world unknown\r\n\r\nHe''s feeling alright / But it''s bleeding inside\r\nBut who can tell where to go frome here? \r\n\r\nHe says NO! / But the problem goes on\r\nHe stays strong / looking for someone\r\nto hold on to / ... could that someone be you?\r\n\r\nIf you don''t know / what you''re running from \r\nThen you don''t know where to go...\r\nHe takes ONE STEP, cause ONE STEP is ONE STEP to move along.\r\n\r\n\r\nCHORUS\r\n\r\n\r\nCHAPTER 2________________________________\r\nHe looks at some internet-sites.\r\nHe knows that he''s caught for tonight.\r\nHe''s stuck on a path on the World Wide Web.\r\n...too many tabs until he goes to bed.\r\n\r\nHe sits there / the time flies by\r\nIn his lonely chair / and its half past nine\r\nJust some hours more, then he''ll close the door / \r\nalways been afraid of asking for some more\r\n\r\nHe asks himself / Where do I come from?\r\nHe looks at dad / and then looks at mom\r\nBut the smile they gave took his voice away / \r\nnow he knows, he''s here to stay\r\n\r\nHe goes to sleep, but he sleeps awake.\r\nIs there more to life than the steps he takes?\r\nIs there anyone else looping through the same days...?\r\nHe''s stuck in a pattern too hard to break.\r\n\r\n\r\nCHORUS\r\n\r\n...is the stress and the pain that flows inside...\r\n\r\n\r\nCHAPTER 3________________________________\r\n\r\nHe wakes up! / but he never goes to sleep\r\nHe''s filled up / with questions so deep\r\nHis sight is low so he just won''t see / \r\nanything more than beyond his dreams\r\n\r\nHe''s facing / the problems alone\r\nHe''s racing / but just on his own\r\nHis eyes are blind so he just won''t see, \r\nany possibility to break free\r\n\r\nHis friend turned his world upside-down / \r\nHe moved away, far from town\r\nHe sends some mail / but it''s not the same \r\nas the time when they used to play videogames\r\n\r\nThen he does what he does best\r\nHe writes a song, this time about himself\r\n-- in third person -- \r\nand that will make it ONE STEP...\r\n\r\n\r\n', 0, '', 1),
('One Step DX', '2008-08-27', 'oscarb - One Step DX.mp3', 'CHORUS________________________________\r\n\r\nHe takes ONE STEP / but he wants to take two\r\nONE STEP / to get a better view\r\nONE STEP / is all it takes to move\r\nONE STEP!\r\n\r\n\r\nCHAPTER 1________________________________\r\n\r\nHe wakes up! / but he never goes to sleep\r\nHe''s filled up / with work to his knees\r\nHis sight is low so he just can''t see / \r\nanything more than beyond his feets\r\n\r\nHe''s facing / the problems alone\r\nHe''s racing / but just on his own\r\nHis eyes are blind so he just won''t know, \r\nhow to learn about this world unknown\r\n\r\nHe''s feeling alright / But it''s bleeding inside\r\nBut who can tell where to go frome here? \r\n\r\nHe says NO! / But the problem goes on\r\nHe stays strong / looking for someone\r\nto hold on to / ... could that someone be you?\r\n\r\nIf you don''t know / what you''re running from \r\nThen you don''t know where to go...\r\nHe takes ONE STEP, cause ONE STEP is ONE STEP to move along.\r\n\r\n\r\nCHORUS\r\n\r\n\r\nCHAPTER 2________________________________\r\n\r\nHe looks at some internet-sites.\r\nHe knows that he''s caught for tonight.\r\nHe''s stuck on a path on the World Wide Web.\r\n...too many tabs until he goes to bed.\r\n\r\nHe sits there / the time flies by\r\nIn his lonely chair / and its half past nine\r\nJust some hours more, then he''ll close the door / \r\nalways been afraid of asking for some more\r\n\r\nHe asks himself / Where do I come from?\r\nHe looks at dad / and then looks at mom\r\nBut the smile they gave took his voice away / \r\nnow he knows, he''s here to stay\r\n\r\nHe goes to sleep, but he sleeps awake.\r\nIs there more to life than the steps he takes?\r\nIs there anyone else looping through the same days...?\r\nHe''s stuck in a pattern too hard to break.\r\n\r\n\r\nCHORUS\r\n\r\n...is the stress and the pain that flows inside...\r\n\r\n\r\nCHAPTER 3________________________________\r\n\r\nHe wakes up! / but he never goes to sleep\r\nHe''s filled up / with questions so deep\r\nHis sight is low so he just won''t see / \r\nanything more than beyond his dreams\r\n\r\nHe''s facing / the problems alone\r\nHe''s racing / but just on his own\r\nHis eyes are blind so he just won''t see, \r\nany possibility to break free\r\n\r\nHis friend turned his world upside-down / \r\nHe moved away, far from town\r\nHe sends some mail / but it''s not the same \r\nas the time when they used to play videogames\r\n\r\nThen he does what he does best\r\nHe writes a song, this time about himself\r\n-- in third person -- \r\nand that will make it ONE STEP...\r\n\r\n\r\n', 2471, '', 0),
('Sleep Mode', '2005-04-09', 'oscarb - Sleep Mode.mp3', 'It''s 01:00 a clock \r\nand I''m still awake, \r\ncause I''ve got these lyrics \r\nin my mind to make.\r\n\r\nWith a pen in my hand \r\nand a notepad in my bed, \r\nI''m trying to write down \r\nall the thoughts of my head.\r\n\r\nBut it''s too hard to find, \r\nthese lyrics in my mind. \r\nCause the force of sleeplessness \r\nis taking over from the inside.\r\n\r\nBut still I can beat it, \r\nstill I can defeat it, \r\nbut still I do sleep \r\nthrough the darkness of illness.\r\n\r\nCause wherever I am \r\nand wherever I look, \r\nit''s always around me, \r\nreading me like a book.\r\nThe say "keep your friends close \r\nbut your enemies even more", \r\nI''d say my closest enemy is inside of me, \r\nwatching my every move.\r\n\r\n\r\n# Activate! Enter Sleep Mode! #\r\nIm trying to imagine myself lost in a dream world.\r\n\r\n# Activate! All systems offline! #\r\nAnd I can never remember the time when I''m going down.\r\n\r\n# Activate! Rapid Eye Movement #\r\nWith my mind so deep, am I alive or just asleep?\r\n\r\n# Activate! Connect to body. #\r\nFading into real, with settings getting ready.\r\n\r\n\r\nIt''s 07:00 a clock, \r\nits time to wake up, \r\nyou go up, eat your breakfeast, \r\ngo to school and do your stuff.\r\n\r\nMy friends mentions \r\nthe darkness beneath my eyes, \r\nI keep telling them "it''s all right" \r\nbut that is only lies.\r\n\r\nAs the darkness grows \r\nand my eyes is getting red, \r\nmy body and my soul \r\ngets closer to death.\r\n\r\nBut I hold on until the last \r\nlesson is over, \r\nthen I go home and to my room \r\nto restore my power.\r\n\r\nCause as long as Light and Dark \r\nechoes each other out, \r\n"alive" and "asleep" \r\nwill always be around.\r\n\r\nTime goes by, \r\nbut my body is still here. \r\nAnd at the time when I wake up, \r\nsome hours may have disappeared.\r\n \r\nIt''s scary though, \r\ncause am I really living? \r\nWhen sleeping, \r\nIt''s like offering nothing for everything.\r\n\r\nAs long as I can see, \r\nsmell, hear, taste and feel, \r\nthen I''m living by my definitions \r\nof what is real.\r\n\r\nI can feel that my time \r\nhere is running low, \r\nbut it''s hard to catch up with it \r\nsince it''s "always on the go", \r\n\r\nSo, I''m counting my time, \r\nam I living forever? \r\nBut it''s shortened down, \r\nbecause I''m not being very clever.\r\n\r\nBut I get out more of my life \r\nat the time when I''m awake, \r\nI can do things I couldn''t \r\nin a sleeping state.\r\n\r\nI can live for the moment, \r\nI can do what I want to, \r\nbut I wont live for tomorrow \r\nand do what I''m supposed to. \r\n\r\nThey say "You can run but you cant hide", \r\nI believe that that is true. \r\nI will run and I will fight \r\nuntil the time when it breaks through.\r\n\r\n\r\n# Activate! Enter Sleep Mode! #\r\nIm trying to imagine myself lost in a dream world.\r\n\r\n# Activate! All systems offline! #\r\nAnd I can never remember the time when I''m going down.\r\n\r\n# Activate! Rapid Eye Movement #\r\nWith my mind so deep, am I alive or just asleep?\r\n\r\n# Activate! Connect to body. #\r\nFading into real, with settings getting ready.\r\n\r\n\r\nIt''s... \r\nI don''t know the time, \r\nmy mind is all clear. \r\nI don''t know where I am, \r\nexcept that I am here.\r\n\r\nI don''t know where I''m off to, \r\nor where I started from. \r\nAll I know is that I''m making this journey all alone.\r\n\r\nBy myself, \r\nwith what started \r\nas some lyrics in my mind, \r\nbut will end as just \r\nanother in a line.\r\n\r\nBy myself, with insomnia \r\nrunning through my veins, \r\nkeeping me all day up, \r\ndriving me insane.\r\n\r\nCause wherever I am \r\nand wherever I go, \r\nit''s haunting me down, \r\nlike my own shadow.\r\n\r\nThere''s no pen in my hand, \r\nand no notepad in my bed, \r\nI''m starting to believe \r\nthat it''s all in my head.\r\n\r\nHowever, I can''t remember \r\nthe last time I was asleep. \r\nam I sleeping forever \r\nor living with my mind too deep?\r\n\r\nThey say "life goes on", \r\nI''m not so sure about that. \r\nI''ve been in this condition for too long, \r\nunable to chat.\r\n\r\nThey say "friends come and go, \r\nenemies accumulate", \r\nI''d say my worst enemy \r\nis my own soulmate.\r\n\r\nThey say "don''t dream your life, \r\nlive your dreams", \r\nI''d say I''m guessing \r\nI''m somewhere in between.', 0, '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`title`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;