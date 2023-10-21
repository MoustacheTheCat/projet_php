-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 20 oct. 2023 à 13:48
-- Version du serveur : 10.6.12-MariaDB-0ubuntu0.22.04.1
-- Version de PHP : 8.1.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
CREATE DATABASE projet_php;
--
CREATE USER 'admin_projet_php'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON projet_php.* TO 'admin_projet_php'@'localhost';
FLUSH PRIVILEGES;


use projet_php;
-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `articles_ids` varchar(255) NOT NULL,
  `articles_classs` varchar(255) NOT NULL,
  `articles_names` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `as`
--

CREATE TABLE `as` (
  `id` int(11) NOT NULL,
  `as_ids` varchar(50) DEFAULT NULL,
  `as_classs` varchar(255) DEFAULT NULL,
  `as_names` varchar(50) DEFAULT NULL,
  `as_hrefs` varchar(255) DEFAULT NULL,
  `as_contents` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `audios`
--

CREATE TABLE `audios` (
  `id` int(11) NOT NULL,
  `audios_srcs` varchar(255) DEFAULT NULL,
  `audios_ids` varchar(50) DEFAULT NULL,
  `audios_classs` varchar(255) DEFAULT NULL,
  `audios_names` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `buttons`
--

CREATE TABLE `buttons` (
  `id` int(11) NOT NULL,
  `buttons_contents` varchar(255) DEFAULT NULL,
  `forms_ids` int(11) DEFAULT NULL,
  `buttons_ids` varchar(50) DEFAULT NULL,
  `buttons_classs` varchar(255) DEFAULT NULL,
  `buttons_names` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `divs`
--

CREATE TABLE `divs` (
  `id` int(11) NOT NULL,
  `divs_ids` varchar(255) NOT NULL,
  `divs_classs` varchar(255) NOT NULL,
  `divs_names` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `forms`
--

CREATE TABLE `forms` (
  `id` int(11) NOT NULL,
  `forms_methods` varchar(5) NOT NULL,
  `forms_actions` varchar(255) NOT NULL,
  `forms_classs` varchar(255) DEFAULT NULL,
  `forms_names` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `h1s`
--

CREATE TABLE `h1s` (
  `id` int(11) NOT NULL,
  `h1s_ids` varchar(50) DEFAULT NULL,
  `h1s_classs` varchar(255) DEFAULT NULL,
  `h1s_names` varchar(50) DEFAULT NULL,
  `h1s_contents` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `h2s`
--

CREATE TABLE `h2s` (
  `id` int(11) NOT NULL,
  `h2s_ids` varchar(50) DEFAULT NULL,
  `h2s_classs` varchar(255) DEFAULT NULL,
  `h2s_names` varchar(50) DEFAULT NULL,
  `h2s_contents` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `h3s`
--

CREATE TABLE `h3s` (
  `id` int(11) NOT NULL,
  `h3s_ids` varchar(50) DEFAULT NULL,
  `h3s_classs` varchar(255) DEFAULT NULL,
  `h3s_names` varchar(50) DEFAULT NULL,
  `h3s_contents` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `h4s`
--

CREATE TABLE `h4s` (
  `id` int(11) NOT NULL,
  `h4s_ids` varchar(50) DEFAULT NULL,
  `h4s_classs` varchar(255) DEFAULT NULL,
  `h4s_names` varchar(50) DEFAULT NULL,
  `h4s_contents` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `h5s`
--

CREATE TABLE `h5s` (
  `id` int(11) NOT NULL,
  `h5s_ids` varchar(50) DEFAULT NULL,
  `h5s_classs` varchar(255) DEFAULT NULL,
  `h5s_names` varchar(50) DEFAULT NULL,
  `h5s_contents` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `h6s`
--

CREATE TABLE `h6s` (
  `id` int(11) NOT NULL,
  `h6s_ids` varchar(50) DEFAULT NULL,
  `h6s_classs` varchar(255) DEFAULT NULL,
  `h6s_names` varchar(50) DEFAULT NULL,
  `h6s_contents` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `imgs`
--

CREATE TABLE `imgs` (
  `id` int(11) NOT NULL,
  `imgs_ids` varchar(50) DEFAULT NULL,
  `imgs_classs` varchar(255) DEFAULT NULL,
  `imgs_names` varchar(50) DEFAULT NULL,
  `imgs_srcs` varchar(255) DEFAULT NULL,
  `imgs_alts` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `inputs`
--

CREATE TABLE `inputs` (
  `id` int(11) NOT NULL,
  `inputs_types` varchar(50) DEFAULT NULL,
  `inputs_values` varchar(255) DEFAULT NULL,
  `forms_ids` int(11) DEFAULT NULL,
  `inputs_ids` varchar(50) DEFAULT NULL,
  `inputsclasss` varchar(255) DEFAULT NULL,
  `inputs_names` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_required_selects` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `labels`
--

CREATE TABLE `labels` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `labels_name` varchar(255) DEFAULT NULL,
  `labels_class` varchar(255) DEFAULT NULL,
  `labels_content` varchar(255) DEFAULT NULL,
  `labels_ids` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ols`
--

CREATE TABLE `ols` (
  `id` int(11) NOT NULL,
  `ols_ids` varchar(50) DEFAULT NULL,
  `ols_classs` varchar(255) DEFAULT NULL,
  `ols_names` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `options_ids` varchar(50) DEFAULT NULL,
  `options_classs` varchar(255) DEFAULT NULL,
  `options_names` varchar(50) DEFAULT NULL,
  `options_contents` varchar(255) DEFAULT NULL,
  `options_values` varchar(255) DEFAULT NULL,
  `selects_ids` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `pages_names` varchar(255) DEFAULT NULL,
  `pages_urls` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `users_ids` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `pages`
--

INSERT INTO `pages` (`id`, `pages_names`, `pages_urls`, `created_at`, `updated_at`, `users_ids`) VALUES
(1, 'home', 'http://projet_php.com/user/page_home.html', '2023-10-18 20:01:54', '2023-10-18 20:01:54', 11);

-- --------------------------------------------------------

--
-- Structure de la table `ps`
--

CREATE TABLE `ps` (
  `id` int(11) NOT NULL,
  `ps_ids` varchar(50) DEFAULT NULL,
  `ps_classs` varchar(255) DEFAULT NULL,
  `ps_names` varchar(50) DEFAULT NULL,
  `ps_contents` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `sections_ids` varchar(255) NOT NULL,
  `sections_classs` varchar(255) NOT NULL,
  `sections_names` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `selects`
--

CREATE TABLE `selects` (
  `id` int(11) NOT NULL,
  `selects_ids` varchar(50) DEFAULT NULL,
  `selects_classs` varchar(255) DEFAULT NULL,
  `selects_names` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_required_selects` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tables`
--

CREATE TABLE `tables` (
  `id` int(11) NOT NULL,
  `tables_ids` varchar(50) DEFAULT NULL,
  `tables_classs` varchar(255) DEFAULT NULL,
  `tables_names` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `tags_names` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tags`
--

INSERT INTO `tags` (`id`, `tags_names`, `created_at`, `updated_at`) VALUES
(1, 'h1', '2023-10-18 15:45:51', '2023-10-18 15:45:51'),
(2, 'h2', '2023-10-18 15:45:51', '2023-10-18 15:45:51'),
(3, 'h3', '2023-10-18 15:45:51', '2023-10-18 15:45:51'),
(4, 'h4', '2023-10-18 15:45:51', '2023-10-18 15:45:51'),
(5, 'h5', '2023-10-18 15:45:51', '2023-10-18 15:45:51'),
(6, 'h6', '2023-10-18 15:45:51', '2023-10-18 15:45:51'),
(7, 'p', '2023-10-18 15:45:51', '2023-10-18 15:45:51'),
(8, 'a', '2023-10-18 15:45:51', '2023-10-18 15:45:51'),
(9, 'img', '2023-10-18 15:45:51', '2023-10-18 15:45:51'),
(10, 'div', '2023-10-18 15:45:51', '2023-10-18 15:45:51'),
(11, 'section', '2023-10-18 15:45:51', '2023-10-18 15:45:51'),
(12, 'article', '2023-10-18 15:45:51', '2023-10-18 15:45:51'),
(13, 'ul', '2023-10-18 15:45:51', '2023-10-18 15:45:51'),
(14, 'ol', '2023-10-18 15:45:51', '2023-10-18 15:45:51'),
(15, 'li', '2023-10-18 15:45:51', '2023-10-18 15:45:51'),
(16, 'select', '2023-10-18 15:45:51', '2023-10-18 15:45:51'),
(17, 'option', '2023-10-18 15:45:51', '2023-10-18 15:45:51'),
(18, 'table', '2023-10-18 15:45:51', '2023-10-18 15:45:51'),
(19, 'thead', '2023-10-18 15:45:51', '2023-10-18 15:45:51'),
(20, 'tbody', '2023-10-18 15:45:51', '2023-10-18 15:45:51'),
(21, 'tfoot', '2023-10-18 15:45:51', '2023-10-18 15:45:51'),
(22, 'tr', '2023-10-18 15:45:51', '2023-10-18 15:45:51'),
(23, 'th', '2023-10-18 15:45:51', '2023-10-18 15:45:51'),
(24, 'td', '2023-10-18 15:45:51', '2023-10-18 15:45:51'),
(25, 'input', '2023-10-18 15:45:51', '2023-10-18 15:45:51'),
(26, 'button', '2023-10-18 15:45:51', '2023-10-18 15:45:51'),
(27, 'textarea', '2023-10-18 15:45:51', '2023-10-18 15:45:51'),
(28, 'video', '2023-10-18 15:45:51', '2023-10-18 15:45:51'),
(29, 'audio', '2023-10-18 15:45:51', '2023-10-18 15:45:51'),
(30, 'form', '2023-10-18 15:45:51', '2023-10-18 15:45:51'),
(31, 'header', '2023-10-18 15:45:51', '2023-10-18 15:45:51'),
(32, 'footer', '2023-10-18 15:45:51', '2023-10-18 15:45:51'),
(33, 'nav', '2023-10-18 15:45:51', '2023-10-18 15:45:51'),
(34, 'main', '2023-10-18 15:45:51', '2023-10-18 15:45:51'),
(35, 'aside', '2023-10-18 15:45:51', '2023-10-18 15:45:51'),
(36, 'span', '2023-10-18 15:45:51', '2023-10-18 15:45:51'),
(37, 'strong', '2023-10-18 15:45:51', '2023-10-18 15:45:51'),
(38, 'source', '2023-10-18 15:45:51', '2023-10-18 15:45:51');

-- --------------------------------------------------------

--
-- Structure de la table `tbodys`
--

CREATE TABLE `tbodys` (
  `id` int(11) NOT NULL,
  `tables_ids` int(11) DEFAULT NULL,
  `tbody_ids` varchar(50) DEFAULT NULL,
  `tbody_classs` varchar(255) DEFAULT NULL,
  `tbody_names` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tds`
--

CREATE TABLE `tds` (
  `id` int(11) NOT NULL,
  `tds_contents` varchar(255) DEFAULT NULL,
  `trs_ids` int(11) DEFAULT NULL,
  `tds_ids` varchar(50) DEFAULT NULL,
  `tds_classs` varchar(255) DEFAULT NULL,
  `tds_names` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `textareas`
--

CREATE TABLE `textareas` (
  `id` int(11) NOT NULL,
  `textareas_contents` text DEFAULT NULL,
  `form_id` int(11) DEFAULT NULL,
  `textareas_ids` varchar(50) DEFAULT NULL,
  `textareas_classs` varchar(255) DEFAULT NULL,
  `textareas_names` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_required_selects` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tfoots`
--

CREATE TABLE `tfoots` (
  `id` int(11) NOT NULL,
  `tables_ids` int(11) DEFAULT NULL,
  `tfoots_ids` varchar(50) DEFAULT NULL,
  `tfoots_classs` varchar(255) DEFAULT NULL,
  `tfoots_names` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `th`
--

CREATE TABLE `th` (
  `id` int(11) NOT NULL,
  `ths_contents` varchar(255) DEFAULT NULL,
  `trs_ids` int(11) DEFAULT NULL,
  `ths_ids` varchar(50) DEFAULT NULL,
  `ths_classs` varchar(255) DEFAULT NULL,
  `ths_names` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `theads`
--

CREATE TABLE `theads` (
  `id` int(11) NOT NULL,
  `tables_ids` int(11) DEFAULT NULL,
  `theads_ids` varchar(50) DEFAULT NULL,
  `theads_classs` varchar(255) DEFAULT NULL,
  `theads_names` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `trs`
--

CREATE TABLE `trs` (
  `id` int(11) NOT NULL,
  `theads_ids` int(11) DEFAULT NULL,
  `tbodys_ids` int(11) DEFAULT NULL,
  `tfoots_ids` int(11) DEFAULT NULL,
  `trs_ids` varchar(50) DEFAULT NULL,
  `trs_classs` varchar(255) DEFAULT NULL,
  `trs_names` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `types_inputs`
--

CREATE TABLE `types_inputs` (
  `id` int(11) NOT NULL,
  `types_inputs_names` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `types_inputs`
--

INSERT INTO `types_inputs` (`id`, `types_inputs_names`, `created_at`, `updated_at`) VALUES
(1, 'text', '2023-10-19 15:35:21', '2023-10-19 15:35:21'),
(2, 'password', '2023-10-19 15:35:21', '2023-10-19 15:35:21'),
(3, 'radio', '2023-10-19 15:35:21', '2023-10-19 15:35:21'),
(4, 'checkbox', '2023-10-19 15:35:21', '2023-10-19 15:35:21'),
(5, 'submit', '2023-10-19 15:35:21', '2023-10-19 15:35:21'),
(6, 'reset', '2023-10-19 15:35:21', '2023-10-19 15:35:21'),
(7, 'button', '2023-10-19 15:35:21', '2023-10-19 15:35:21'),
(8, 'file', '2023-10-19 15:35:21', '2023-10-19 15:35:21'),
(9, 'number', '2023-10-19 15:35:21', '2023-10-19 15:35:21'),
(10, 'date', '2023-10-19 15:35:21', '2023-10-19 15:35:21'),
(11, 'email', '2023-10-19 15:35:21', '2023-10-19 15:35:21'),
(12, 'tel', '2023-10-19 15:35:21', '2023-10-19 15:35:21'),
(13, 'url', '2023-10-19 15:35:21', '2023-10-19 15:35:21'),
(14, 'search', '2023-10-19 15:35:21', '2023-10-19 15:35:21'),
(15, 'color', '2023-10-19 15:35:21', '2023-10-19 15:35:21'),
(16, 'range', '2023-10-19 15:35:21', '2023-10-19 15:35:21'),
(17, 'hidden', '2023-10-19 15:35:21', '2023-10-19 15:35:21'),
(18, 'datetime-local', '2023-10-19 15:35:21', '2023-10-19 15:35:21'),
(19, 'month', '2023-10-19 15:35:21', '2023-10-19 15:35:21'),
(20, 'week', '2023-10-19 15:35:21', '2023-10-19 15:35:21'),
(21, 'time', '2023-10-19 15:35:21', '2023-10-19 15:35:21'),
(22, 'datetime', '2023-10-19 15:35:21', '2023-10-19 15:35:21'),
(23, 'image', '2023-10-19 15:35:21', '2023-10-19 15:35:21');

-- --------------------------------------------------------

--
-- Structure de la table `uls`
--

CREATE TABLE `uls` (
  `id` int(11) NOT NULL,
  `uls_ids` varchar(50) DEFAULT NULL,
  `uls_classs` varchar(255) DEFAULT NULL,
  `uls_names` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `users_names` varchar(50) NOT NULL,
  `users_passwords` varchar(255) NOT NULL,
  `users_emails` varchar(255) NOT NULL,
  `users_pictures` varchar(255) DEFAULT NULL,
  `users_roles` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `users_names`, `users_passwords`, `users_emails`, `users_pictures`, `users_roles`, `created_at`, `updated_at`) VALUES
(11, 'admin', '$argon2i$v=19$m=65536,t=4,p=1$UUlDLnovTU4ueHZSWE9aRA$k8ov6TMXkEG81aAZtFnSgMQ5xW6Sm2v7h2vLKozT07c', 'joubert.mathieu753783@gmail.com', NULL, 0, '2023-10-16 11:02:19', '2023-10-16 11:02:19'),
(12, 'author', '$argon2i$v=19$m=65536,t=4,p=1$ajQzbkJWYzZ2MktJZUt2SQ$y86IIhsRpFn+FqYEnwSKv050+d50k3TGZVHSGdt4SQg', 'mattou83075@gmail.com', NULL, 1, '2023-10-16 11:08:15', '2023-10-16 11:08:15'),
(13, 'user', '$argon2i$v=19$m=65536,t=4,p=1$ZmE3VXA0MGIvVUtiRmpCdg$GYPyl9EJwLXgKtdYzu+LXQww6cNutaWFrEUuLER19E8', 'mathieu.joubert@live.fr', NULL, 2, '2023-10-16 11:09:30', '2023-10-16 11:09:30');

-- --------------------------------------------------------

--
-- Structure de la table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `src` varchar(255) DEFAULT NULL,
  `video_id` varchar(50) DEFAULT NULL,
  `video_class` varchar(255) DEFAULT NULL,
  `video_name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `as`
--
ALTER TABLE `as`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `audios`
--
ALTER TABLE `audios`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `buttons`
--
ALTER TABLE `buttons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_id` (`forms_ids`);

--
-- Index pour la table `divs`
--
ALTER TABLE `divs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `h1s`
--
ALTER TABLE `h1s`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `h2s`
--
ALTER TABLE `h2s`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `h3s`
--
ALTER TABLE `h3s`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `h4s`
--
ALTER TABLE `h4s`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `h5s`
--
ALTER TABLE `h5s`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `h6s`
--
ALTER TABLE `h6s`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `imgs`
--
ALTER TABLE `imgs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `inputs`
--
ALTER TABLE `inputs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_id` (`forms_ids`);

--
-- Index pour la table `labels`
--
ALTER TABLE `labels`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ols`
--
ALTER TABLE `ols`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `selects_id` (`selects_ids`);

--
-- Index pour la table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_users_pages` (`users_ids`);

--
-- Index pour la table `ps`
--
ALTER TABLE `ps`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `selects`
--
ALTER TABLE `selects`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbodys`
--
ALTER TABLE `tbodys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tables_id` (`tables_ids`);

--
-- Index pour la table `tds`
--
ALTER TABLE `tds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tr_id` (`trs_ids`);

--
-- Index pour la table `textareas`
--
ALTER TABLE `textareas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_id` (`form_id`);

--
-- Index pour la table `tfoots`
--
ALTER TABLE `tfoots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tables_id` (`tables_ids`);

--
-- Index pour la table `th`
--
ALTER TABLE `th`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tr_id` (`trs_ids`);

--
-- Index pour la table `theads`
--
ALTER TABLE `theads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tables_id` (`tables_ids`);

--
-- Index pour la table `trs`
--
ALTER TABLE `trs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thead_id` (`theads_ids`),
  ADD KEY `tbody_id` (`tbodys_ids`),
  ADD KEY `tfoot_id` (`tfoots_ids`);

--
-- Index pour la table `types_inputs`
--
ALTER TABLE `types_inputs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `uls`
--
ALTER TABLE `uls`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `as`
--
ALTER TABLE `as`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `audios`
--
ALTER TABLE `audios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `buttons`
--
ALTER TABLE `buttons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `divs`
--
ALTER TABLE `divs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `h1s`
--
ALTER TABLE `h1s`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `h2s`
--
ALTER TABLE `h2s`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `h3s`
--
ALTER TABLE `h3s`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `h4s`
--
ALTER TABLE `h4s`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `h5s`
--
ALTER TABLE `h5s`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `h6s`
--
ALTER TABLE `h6s`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `imgs`
--
ALTER TABLE `imgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `inputs`
--
ALTER TABLE `inputs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `labels`
--
ALTER TABLE `labels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ols`
--
ALTER TABLE `ols`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `ps`
--
ALTER TABLE `ps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `selects`
--
ALTER TABLE `selects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `tbodys`
--
ALTER TABLE `tbodys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tds`
--
ALTER TABLE `tds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `textareas`
--
ALTER TABLE `textareas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tfoots`
--
ALTER TABLE `tfoots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `th`
--
ALTER TABLE `th`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `theads`
--
ALTER TABLE `theads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `trs`
--
ALTER TABLE `trs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `types_inputs`
--
ALTER TABLE `types_inputs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `uls`
--
ALTER TABLE `uls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `buttons`
--
ALTER TABLE `buttons`
  ADD CONSTRAINT `buttons_ibfk_1` FOREIGN KEY (`forms_ids`) REFERENCES `forms` (`id`);

--
-- Contraintes pour la table `inputs`
--
ALTER TABLE `inputs`
  ADD CONSTRAINT `inputs_ibfk_1` FOREIGN KEY (`forms_ids`) REFERENCES `forms` (`id`);

--
-- Contraintes pour la table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_ibfk_1` FOREIGN KEY (`selects_ids`) REFERENCES `selects` (`id`);

--
-- Contraintes pour la table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `FK_users_pages` FOREIGN KEY (`users_ids`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `tbodys`
--
ALTER TABLE `tbodys`
  ADD CONSTRAINT `tbodys_ibfk_1` FOREIGN KEY (`tables_ids`) REFERENCES `tables` (`id`);

--
-- Contraintes pour la table `tds`
--
ALTER TABLE `tds`
  ADD CONSTRAINT `tds_ibfk_1` FOREIGN KEY (`trs_ids`) REFERENCES `trs` (`id`);

--
-- Contraintes pour la table `textareas`
--
ALTER TABLE `textareas`
  ADD CONSTRAINT `textareas_ibfk_1` FOREIGN KEY (`form_id`) REFERENCES `forms` (`id`);

--
-- Contraintes pour la table `tfoots`
--
ALTER TABLE `tfoots`
  ADD CONSTRAINT `tfoots_ibfk_1` FOREIGN KEY (`tables_ids`) REFERENCES `tables` (`id`);

--
-- Contraintes pour la table `th`
--
ALTER TABLE `th`
  ADD CONSTRAINT `th_ibfk_1` FOREIGN KEY (`trs_ids`) REFERENCES `trs` (`id`);

--
-- Contraintes pour la table `theads`
--
ALTER TABLE `theads`
  ADD CONSTRAINT `theads_ibfk_1` FOREIGN KEY (`tables_ids`) REFERENCES `tables` (`id`);

--
-- Contraintes pour la table `trs`
--
ALTER TABLE `trs`
  ADD CONSTRAINT `trs_ibfk_1` FOREIGN KEY (`theads_ids`) REFERENCES `theads` (`id`),
  ADD CONSTRAINT `trs_ibfk_2` FOREIGN KEY (`tbodys_ids`) REFERENCES `tbodys` (`id`),
  ADD CONSTRAINT `trs_ibfk_3` FOREIGN KEY (`tfoots_ids`) REFERENCES `tfoots` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
