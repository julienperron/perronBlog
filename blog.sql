-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 03 Avril 2016 à 21:15
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) CHARACTER SET utf8 NOT NULL,
  `contenu` text CHARACTER SET utf8 NOT NULL,
  `date` int(11) NOT NULL,
  `votes` int(11) NOT NULL,
  `derniereIp` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `contenu`, `date`, `votes`, `derniereIp`) VALUES
(3, 'Article 1', 'luctus elit non sem consectetur tincidunt sed et lorem. Duis vulputate nunc sed urna scelerisque vehicula. Vivamus orci lacus, rutrum nec fringilla id, dictum at purus. Etiam tristique leo nec porttitor egestas. In vitae elit a ligula facilisis rhoncus vitae eget ipsum. Vestibulum at leo ipsum. Fusce orci dolor, pharetra vitae faucibus sit amet, tempus posuere purus. Proin consequat tellus suscipit metus pretium, in placerat ligula consectetur. ', 1452516456, 16, '127.0.0.1'),
(5, 'Article 2', ' Duis malesuada purus at urna ullamcorper finibus. Quisque et commodo sem. Phasellus vitae egestas eros. Ut in nisl et enim congue sodales. Nulla a risus malesuada ante lacinia sagittis luctus ut ex. Aliquam neque dui, tincidunt a elementum ac, ornare et tellus. Nam in augue metus. Phasellus imperdiet commodo lacus ut aliquam. Sed felis nibh, dapibus quis congue non, eleifend vel ipsum. Nulla tincidunt, risus eu semper viverra, ipsum odio tincidunt erat, ac volutpat diam nisi quis turpis. Proin in orci eu mi fringilla lacinia ac et libero. Duis eu rhoncus purus. Donec commodo nunc at maximus lobortis. Suspendisse potenti. Proin ultricies, lectus ac rutrum feugiat, dui mauris porta felis, et blandit ex mauris malesuada nisi. Aliquam varius mi velit, a hendrerit felis dictum sed. Integer elementum gravida quam, ut tincidunt nulla sodales in. ', 1455642419, 6, '127.0.0.1'),
(6, 'Article 3', ' malesuada purus at urna ullamcorper finibus. Quisque et commodo sem. Phasellus vitae egestas eros. Ut in nisl et enim congue sodales. Nulla a risus malesuada ante lacinia sagittis luctus ut ex. Aliquam neque dui, tincidunt a elementum ac, ornare et tellus. Nam in augue metus. Phasellus imperdiet commodo lacus ut aliquam. Sed felis nibh, dapibus quis congue non, eleifend vel ipsum. Nulla tincidunt, risus eu semper viverra, ipsum odio tincidunt erat, ac volutpat diam nisi quis turpis. Proin in orci eu mi fringilla lacinia ac et libero. eu rhoncus purus. Donec commodo nunc at maximus lobortis. Suspendisse potenti. Proin ultricies, lectus ac rutrum feugiat, dui mauris porta felis, et blandit ex mauris malesuada nisi. Aliquam varius mi velit, a hendrerit felis dictum sed. Integer elementum gravida quam, ut tincidunt nulla sodales in. ', 1455645411, 1, '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`) VALUES
(10, 'julien.perron@outlook.com'),
(13, 'test2@test2.fr'),
(14, 'test3@test3.fr'),
(15, 'test4@test4.fr'),
(16, 'testColor@test.fr'),
(17, 'testcolor@testcolor.fr'),
(18, 'tes@tefsvq.fr'),
(19, 'teeeeest@qzr.fr'),
(20, 'tgez@rge.com');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `sid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`,`mdp`,`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `mdp`, `sid`) VALUES
(2, 'perron', 'julien', 'julien.perron@outlook.com', 'a0ae6c7cc217cea2a594ba091f2d02b3', '23ac6487828858b47b110822ac3453b2'),
(5, 'dupont', 'george', 'george.dupont@gmail.com', '2371d66968463a239159e876f31864b5', '3bed4b6cc3816c0a4348e1ab3ead0446');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
