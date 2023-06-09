SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET time_zone = "+00:00";

CREATE TABLE
    `testimony` (
        `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `first_name` VARCHAR(55),
        `last_name` VARCHAR(55),
        `message` TEXT(1000) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

INSERT INTO
    `testimony` (
        `id`,
        `first_name`,
        `last_name`,
        `message`
    )
VALUES (
        1,
        'Emilienne',
        'Francisco',
        'Christophe est à l\'écoute des clients, très disponible et très sérieux.'
    ), (
        2,
        'Maurice',
        'Ricard',
        'Je recommande EB Conception. Christophe s\'adapte à la demande des clients.'
    ), (
        3,
        'Raymonde',
        'Lanose',
        'Très professionnel, les délais du chantier ont été respectés. Les finitions sont parfaites.'
    );

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
    `service` (
        `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `title` VARCHAR(55) NOT NULL,
        `content_id` INT
    ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

CREATE TABLE
    `content` (
        `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `title` VARCHAR(55) NOT NULL,
        `bold_text` TEXT(100) NULL,
        `coloured_text` TEXT(100) NULL,
        `main_content` TEXT(1000) NULL,
        `main_img` varchar(255),
        `secondary_img` varchar(255)
    ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

CREATE TABLE
    `contact`(
        `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `name` VARCHAR(255) NOT NULL,
        `email` VARCHAR(255) NOT NULL,
        `message` VARCHAR(1000) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

--

-- Contenu de la table `content`

INSERT INTO
    `content` (
        `id`,
        `title`,
        `bold_text`,
        `coloured_text`,
        `main_content`,
        `main_img`,
        `secondary_img`
    )
VALUES (
        1,
        'Menuiserie',
        'JE VOUS ACCOMPAGNE DANS VOS PROJETS EN VOUS APPORTANT MON EXPERTISE',
        'UN SAVOIR FAIRE CLASSIQUE MODERNISÉ',
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br>
		Ut enim ad minim veniam, quis nostrud exercitation ullamcolaboris nisi ut aliquip ex ea commodo consequat.<br>
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.<br>
		Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia eserunt mollit anim id est laborum.',
        'menuiseriePrimary.png',
        'menuiserieSecondary.png'
    ), (
        2,
        'Escaliers',
        'STAIRWAYS TO HEAVEN AND BACK',
        'DES TRAVAUX FAIT SUR MESURE POUR VOTRE QUOTIDIEN',
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br>
		Ut enim ad minim veniam, quis nostrud exercitation ullamcolaboris nisi ut aliquip ex ea commodo consequat.<br>
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.<br>
		Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia eserunt mollit anim id est laborum.',
        'escalierPrimary.png',
        'escalierSecondary.png'
    ), (
        3,
        'Exterieurs',
        'VOS EXTÉRIEURS SOIGNÉS POUR SE SENTIR COMME A LA MAISON',
        'MODERNISEZ ET AMENAGEZ VOS EXTERIEURS',
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br>
		Ut enim ad minim veniam, quis nostrud exercitation ullamcolaboris nisi ut aliquip ex ea commodo consequat.<br>
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.<br>
		Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia eserunt mollit anim id est laborum.',
        'exterieurPrimary.jpg',
        'exterieurSecondary.jpg'
    ), (
        4,
        'Ebenisterie',
        'A PLACE TO STAY',
        'SAVOIR EBENER, C\'EST TOUCHER LE SOURIRE DES DIEUX',
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br>
		Ut enim ad minim veniam, quis nostrud exercitation ullamcolaboris nisi ut aliquip ex ea commodo consequat.<br>
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.<br>
		Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia eserunt mollit anim id est laborum.',
        'ebenisteriePrimary.jpg',
        'ebenisterieSecondary.jpg'
    ), (
        5,
        'Agencement',
        'UNE MAISON AGENCÉ EST UNE MAISON POUR LA VIE',
        'UN AGENCEMENT MAÎTRISÉ POUR UNE VIE PROSPERE',
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br>
		Ut enim ad minim veniam, quis nostrud exercitation ullamcolaboris nisi ut aliquip ex ea commodo consequat.<br>
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.<br>
		Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia eserunt mollit anim id est laborum.',
        'agencementPrimary.png',
        'agencementSecondary.png'
    );

--

-- Table for ADMIN

DROP TABLE IF EXISTS `admin`;

CREATE TABLE
    `admin` (
        `id` int NOT NULL AUTO_INCREMENT,
        `username` varchar(100) DEFAULT NULL,
        `password` varchar(255) DEFAULT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `username_UNIQUE` (`username`)
    ) ENGINE = InnoDB AUTO_INCREMENT = 2 DEFAULT CHARSET = utf8;

INSERT INTO `admin`
VALUES (
        1,
        'admin',
        '$2y$10$bAJyIcoZUjHnvX5AEuwN6OJ3VYzkpOUYZrVJQaIyQviAUumMG0LNW'
    );
