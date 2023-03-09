-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : jeu. 09 mars 2023 à 09:37
-- Version du serveur : 10.10.2-MariaDB
-- Version de PHP : 8.2.3

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `mailmvc`
--
DROP DATABASE IF EXISTS `mailmvc`;
CREATE DATABASE IF NOT EXISTS `mailmvc` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mailmvc`;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `messagesid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `messagesmail` varchar(180) NOT NULL,
  `messagestext` text NOT NULL,
  `messagesdate` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`messagesid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `usersid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `usersname` varchar(30) NOT NULL,
  `userspwd` varchar(255) NOT NULL,
  `usersmail` varchar(180) NOT NULL,
  PRIMARY KEY (`usersid`),
  UNIQUE KEY `usersname` (`usersname`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`usersid`, `usersname`, `userspwd`, `usersmail`) VALUES
(1, 'admin', '$2y$10$xwM5FlRVFLA2UdggUoOQauvdoVO5eTP/pkqeWIEmgfzs3ZE5qsJTu', 'michael.j.pitz@cf2m.be');
SET FOREIGN_KEY_CHECKS=1;
COMMIT;
