-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Hoszt: 127.0.0.1
-- Létrehozás ideje: 2015. Ápr 21. 03:18
-- Szerver verzió: 5.6.21
-- PHP verzió: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Adatbázis: `blog`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `date`, `content`) VALUES
(1, 1, '2015-04-20 15:14:13', 'Vivamus tincidunt quam in tortor accumsan, ac dignissim nisl bibendum. Nulla placerat tempor mi nec posuere. Nullam eget eros congue, sollicitudin lorem quis, dictum mauris. Aliquam condimentum scelerisque orci. Phasellus iaculis elit eu ultrices egestas. Suspendisse potenti.'),
(2, 1, '2015-04-20 15:14:13', 'Praesent eu elit lectus. Phasellus ultrices pulvinar magna, condimentum ullamcorper tellus fermentum eget. Nullam accumsan justo justo, vel tincidunt ligula posuere vitae. Quisque tincidunt sollicitudin eros nec tristique. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis arcu ligula, mattis nec ante a, bibendum feugiat felis. Proin sodales dictum egestas.'),
(3, 7, '2015-04-20 15:14:13', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris et eros tincidunt, pretium neque id, sagittis purus.'),
(4, 6, '2015-04-20 15:14:13', 'Integer dignissim nisi et odio vehicula, sed interdum nibh gravida.'),
(5, 4, '2015-04-20 15:14:13', 'Duis tempus eros nec sodales tincidunt. Praesent id vestibulum mi. Donec viverra at orci sit amet venenatis. Mauris ac tortor ut urna ornare scelerisque vitae non lacus.'),
(6, 2, '2015-04-20 15:14:13', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(7, 3, '2015-04-20 15:14:13', 'Vivamus lacinia luctus finibus.'),
(8, 5, '2015-04-20 15:14:13', 'Curabitur viverra egestas malesuada.'),
(9, 6, '2015-04-20 15:14:13', 'Duis consequat fermentum diam maximus aliquet. Donec ac vehicula sem. In gravida magna ut orci tempus faucibus. Mauris sit amet euismod ipsum. Sed quis faucibus libero. In nec tellus porta, porttitor elit vel, malesuada arcu. Maecenas congue congue convallis.'),
(10, 7, '2015-04-20 15:14:13', 'Aenean sapien arcu, posuere id imperdiet mollis, blandit a nulla.'),
(11, 1, '2015-04-20 15:14:13', 'Praesent et orci nibh.'),
(12, 3, '2015-04-20 15:14:13', 'Vivamus tincidunt quam in tortor accumsan, ac dignissim nisl bibendum. Nulla placerat tempor mi nec posuere. Nullam eget eros congue, sollicitudin lorem quis, dictum mauris. Aliquam condimentum scelerisque orci. Phasellus iaculis elit eu ultrices egestas. Suspendisse potenti.'),
(13, 6, '2015-04-20 15:14:13', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate enim non erat ultricies condimentum. Pellentesque turpis odio, mattis a magna in, euismod gravida nisi. Sed pellentesque, leo tempus luctus dapibus, mi mi ullamcorper lacus, vitae tincidunt diam est nec risus. Etiam et libero mollis, lacinia sem vestibulum, viverra massa. Sed sit amet mattis purus. Ut ornare dapibus neque, sit amet tincidunt libero vestibulum vitae. Sed at facilisis leo, ac ultrices sapien. Donec at lacinia magna, in sodales turpis. Maecenas lectus felis, scelerisque eget aliquet pulvinar, consectetur ac augue. Nam mollis lorem eget risus fringilla tincidunt.'),
(14, 5, '2015-04-20 15:14:13', 'Quisque tincidunt sollicitudin eros nec tristique. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis arcu ligula, mattis nec ante a, bibendum feugiat felis. Proin sodales dictum egestas.'),
(15, 2, '2015-04-20 15:14:13', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris et eros tincidunt, pretium neque id, sagittis purus. Integer dignissim nisi et odio vehicula, sed interdum nibh gravida. Nunc vitae bibendum massa. Nullam a ipsum semper, interdum libero vitae, venenatis odio. In blandit diam nisi, vitae semper lectus suscipit eget. Cras rutrum nulla lacus, ut suscipit ante facilisis et. Aliquam bibendum cursus justo vel sagittis. Donec eros mauris, tempor et dui vel, condimentum tincidunt orci. Duis tempus eros nec sodales tincidunt. Praesent id vestibulum mi. Donec viverra at orci sit amet venenatis.'),
(16, 5, '2015-04-20 15:14:13', 'Proin sodales dictum egestas.'),
(17, 6, '2015-04-20 15:14:13', 'Nam posuere dapibus posuere. Maecenas ac leo luctus, mollis arcu ut, vehicula neque. Praesent et varius nisl, id tincidunt lacus.'),
(18, 1, '2015-04-20 15:14:13', 'In blandit diam nisi, vitae semper lectus suscipit eget. Cras rutrum nulla lacus, ut suscipit ante facilisis et. Aliquam bibendum cursus justo vel sagittis. Donec eros mauris, tempor et dui vel, condimentum tincidunt orci. Duis tempus eros nec sodales tincidunt.'),
(19, 4, '2015-04-20 15:14:13', 'Quisque tincidunt sollicitudin eros nec tristique. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis arcu ligula, mattis nec ante a, bibendum feugiat felis. Proin sodales dictum egestas.'),
(20, 3, '2015-04-20 15:14:13', 'Etiam et libero mollis, lacinia sem vestibulum, viverra massa. Sed sit amet mattis purus. Ut ornare dapibus neque, sit amet tincidunt libero vestibulum vitae. Sed at facilisis leo, ac ultrices sapien. Donec at lacinia magna, in sodales turpis. Maecenas lectus felis, scelerisque eget aliquet pulvinar, consectetur ac augue. Nam mollis lorem eget risus fringilla tincidunt.');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `date`) VALUES
(1, 'Novum offendit vis ne', 'Ei per sint sapientem. Ut dicit intellegebat usu. Qui euismod adipiscing te, mel summo posidonium et, ex vis augue detracto. Mel detraxit insolens pericula et, sit modus sensibus ne, tation fuisset officiis at eos. Ad cum dicta equidem. Novum offendit vis ne, sale delectus mediocritatem sea cu, ne aperiri recteque cum.\r\n\r\nNec quis congue convenire ei, an nibh mediocrem vix. Ea nam voluptatum intellegam. Eu eum sint veniam munere. Mea ea omnium incorrupte dissentiunt. Sumo etiam possit cu per, sed no omittam insolens pertinax.', '2015-04-17 05:34:00'),
(2, 'An nam omnis rebum mollis, vim postea volutpat ei', 'Volumus placerat instructior no eam, ei debet suscipit sea, an mel fugit ornatus senserit. Mea et nobis expetenda qualisque, ad sed dictas temporibus. Dissentias dissentiunt est ex, ne sonet libris detraxit nec. Sea id mundi diceret recusabo, pro ne atqui qualisque reformidans. An nam omnis rebum mollis, vim postea volutpat ei. No propriae voluptua qui, et natum partem impetus eos.\r\n\r\nAt reque convenire repudiare pro. Dictas mediocrem forensibus in usu. Laudem inimicus id duo, vis dolore impedit an, cum et dolores eligendi reprimique. Ex vivendo gubergren contentiones usu.', '2015-04-17 17:26:00'),
(3, 'Ex per nonumy', 'Ex per nonumy sensibus sadipscing, nisl sumo quas cu sit. No mei incorrupte referrentur suscipiantur. Id choro suscipit pro, at vel natum copiosae. Congue gubergren te pro. In tamquam theophrastus quo, dico probatus te vis.', '2015-04-15 12:15:00'),
(4, 'Nam ut enim nulla numquam', 'Aliquid fabellas no nec. Nam ut enim nulla numquam, has graecis blandit et. Vim at altera discere voluptua, inimicus elaboraret id vix, et pri adhuc primis iuvaret. In stet feugait periculis pri, eos ad reque everti.\r\n\r\nTe iudico ornatus vim, epicurei antiopam vulputate quo te. In pri iriure detracto, ne sale intellegebat usu. Ius modo idque hendrerit ei. Nibh graece eos te, at nec option periculis interpretaris. Sit utinam electram an, usu eruditi sapientem constituam cu.', '2015-04-14 16:08:00'),
(5, 'Mucius maiorum', 'Mucius maiorum dissentiet ei sit. Has elitr forensibus ei. Imperdiet scripserit ad has. Nonumy deserunt mnesarchum ad sed. Causae sapientem temporibus ut quo, modo magna expetenda te mel.', '2015-04-13 18:59:00'),
(6, 'Ei euismod feugiat', 'Eos id mediocrem consectetuer. Nisl idque gloriatur ex eum. In eum meis nusquam, et his novum salutatus complectitur. Ei euismod feugiat suscipiantur duo. Et graeco nominati voluptatum sit, nulla scaevola singulis eos in. Euismod urbanitas rationibus te ius.', '2015-04-12 05:12:00'),
(7, 'Pro tale rebum', 'Cu sit tollit utinam everti. An mel erat assueverit. Et nec senserit pericula dignissim. Pro tale rebum persequeris in, vix tempor mentitum definitiones ut. Nam cu oratio exerci blandit.', '2015-04-01 14:47:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id`), ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
