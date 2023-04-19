-- phpMyAdmin SQL Dump

-- version 4.5.4.1deb2ubuntu2

-- http://www.phpmyadmin.net

--

-- Client :  localhost

-- Généré le :  Jeu 26 Octobre 2017 à 13:53

-- Version du serveur :  5.7.19-0ubuntu0.16.04.1

-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */

;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */

;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */

;

/*!40101 SET NAMES utf8mb4 */

;

--

-- Base de données :  `simple-mvc`

--

-- --------------------------------------------------------

--

-- Structure de la table `item`

--

CREATE TABLE
    `testimony` (
        `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `message` TEXT(1000) NOT NULL,
        `message_date` DATETIME NOT NULL,
        `name` VARCHAR(55),
        `email` varchar(100)
    ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

CREATE TABLE
    `image` (
        `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `name` VARCHAR(255) NOT NULL,
        `image_file` VARCHAR(255) NOT NULL,
        `category_id` int
    ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

CREATE TABLE
    `category` (
        `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `category_name` VARCHAR(255) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

CREATE TABLE
    `admin` (
        `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `user_name` VARCHAR(55) NOT NULL,
        `password` VARCHAR(55) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

CREATE TABLE
    `service` (
        `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `title` VARCHAR(55) NOT NULL,
        `content_id` INT
    ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

CREATE TABLE
    `content` (
        `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `bold_text` TEXT(1000) NULL,
        `coloured_text` TEXT(1000) NULL,
        `main_content` TEXT(1000) NULL,
        `main_img` varchar(255),
        `secondary_img` varchar(255)
    ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

--

-- Contenu de la table `content`

INSERT INTO
    `content` (
        `id`,
        `bold_text`,
        `coloured_text`,
        `main_content`,
        `main_img`,
        `secondary_img`
    )
VALUES (
        1,
        'JE VOUS ACCOMPAGNE DANS VOS PROJETS EN VOUS APPORTANT MON EXPERTISE',
        'UN SAVOIR FAIRE CLASSIQUE MODERNISÉ',
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
		Ut enim ad minim veniam, quis nostrud exercitation ullamcolaboris nisi ut aliquip ex ea commodo consequat.
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
		Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia eserunt mollit anim id est laborum.',
        'menuiseriePrimary.png',
        'menuiserieSecondary.png'
    ), (
        2,
        'STAIRWAYS TO HEAVEN AND BACK',
        'DES TRAVAUX FAIT SUR MESURE POUR VOTRE QUOTIDIEN',
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
		Ut enim ad minim veniam, quis nostrud exercitation ullamcolaboris nisi ut aliquip ex ea commodo consequat.
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
		Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia eserunt mollit anim id est laborum.',
        'escalierPrimary.png',
        'escalierSecondary.png'
    ), (
        3,
        'VOS EXTÉRIEURS SOIGNÉS POUR SE SENTIR COMME A LA MAISON',
        'MODERNISEZ ET AMENAGEZ VOS EXTERIEURS',
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
		Ut enim ad minim veniam, quis nostrud exercitation ullamcolaboris nisi ut aliquip ex ea commodo consequat.
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
		Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia eserunt mollit anim id est laborum.',
        'exterieurPrimary.jpg',
        'exterieurSecondary.jpg'
    ), (
        4,
        'A PLACE TO STAY',
        'SAVOIR EBENER, C\'EST TOUCHER LE SOURIRE DES DIEUX',
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
		Ut enim ad minim veniam, quis nostrud exercitation ullamcolaboris nisi ut aliquip ex ea commodo consequat.
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
		Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia eserunt mollit anim id est laborum.',
        'ebenisteriePrimary.jpg',
        'ebenisterieSecondary.jpg'
    ), (
        5,
        'UNE MAISON AGENCÉ EST UNE MAISON POUR LA VIE',
        'UN AGENCEMENT MAÎTRISÉ POUR UNE VIE PROSPERE',
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
		Ut enim ad minim veniam, quis nostrud exercitation ullamcolaboris nisi ut aliquip ex ea commodo consequat.
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
		Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia eserunt mollit anim id est laborum.',
        'agencementPrimary.png',
        'agencementSecondary.png'
    );

--

-- Index pour les tables exportées

--

--

-- Index pour la table `item`

--

--

-- AUTO_INCREMENT pour les tables exportées

--

--

-- AUTO_INCREMENT pour la table `item`

--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */

;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */

;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */

;
