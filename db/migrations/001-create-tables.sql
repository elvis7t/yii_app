-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql:3306
-- Tempo de geração: 14/04/2024 às 15:24
-- Versão do servidor: 8.0.35
-- Versão do PHP: 8.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `portifolio`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Despejando dados para a tabela `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1713102475),
('manageBlog', '2', 1713102475);

-- --------------------------------------------------------

--
-- Estrutura para tabela `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `type` smallint NOT NULL,
  `description` text COLLATE utf8mb3_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Despejando dados para a tabela `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'Manage all Panel(full access)', NULL, NULL, 1713102475, 1713102475),
('manageBlog', 2, 'Manage all Blog(full access)', NULL, NULL, 1713102475, 1713102475),
('manageProjects', 2, 'Manage all Projects(full access)', NULL, NULL, 1713102475, 1713102475),
('manageTestimonials', 2, 'Manage all Testimonials(full access)', NULL, NULL, 1713102475, 1713102475),
('TestimonialManager', 1, NULL, NULL, NULL, 1713102475, 1713102475),
('viewProject', 2, 'View all Projects', NULL, NULL, 1713102475, 1713102475);

-- --------------------------------------------------------

--
-- Estrutura para tabela `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Despejando dados para a tabela `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'manageBlog'),
('admin', 'manageProjects'),
('TestimonialManager', 'manageTestimonials'),
('admin', 'TestimonialManager'),
('TestimonialManager', 'viewProject');

-- --------------------------------------------------------

--
-- Estrutura para tabela `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `file`
--

CREATE TABLE `file` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `base_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `file`
--

INSERT INTO `file` (`id`, `name`, `path_url`, `base_url`, `mime_type`) VALUES
(1, '1661be55bc919e.png', 'uploads/projects', 'http://localhost:82/uploads/projects', 'image/png'),
(2, '1661bed2d273b0.png', 'uploads/projects', 'http://localhost:82/uploads/projects', 'image/png'),
(3, '1661beda2acb51.png', 'uploads/projects', 'http://localhost:82/uploads/projects', 'image/png'),
(4, '1661bef0c70396.jpg', 'uploads/testimonials', 'http://localhost:82/uploads/testimonials', 'image/jpeg'),
(5, '1661bf08296ec1.jpg', 'uploads/testimonials', 'http://localhost:82/uploads/testimonials', 'image/jpeg'),
(6, '1661bf3cd5a79d.png', 'uploads/projects', 'http://localhost:82/uploads/projects', 'image/png'),
(7, '1661bf3e22247b.png', 'uploads/projects', 'http://localhost:82/uploads/projects', 'image/png'),
(8, '1661bf3f60691d.png', 'uploads/projects', 'http://localhost:82/uploads/projects', 'image/png'),
(9, '1661bf477ecf61.jpg', 'uploads/testimonials', 'http://localhost:82/uploads/testimonials', 'image/jpeg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `image`
--

CREATE TABLE `image` (
  `id` int NOT NULL,
  `project_id` int NOT NULL,
  `file_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `image`
--

INSERT INTO `image` (`id`, `project_id`, `file_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 6),
(5, 2, 7),
(6, 2, 8);

-- --------------------------------------------------------

--
-- Estrutura para tabela `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1713102278),
('m130524_201442_init', 1713102280),
('m140506_102106_rbac_init', 1713102469),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1713102469),
('m180523_151638_rbac_updates_indexes_without_prefix', 1713102469),
('m190124_110200_add_verification_token_column_to_user_table', 1713102280),
('m200409_110543_rbac_update_mssql_trigger', 1713102469),
('m240304_231501_create_project_table', 1713102280),
('m240304_231651_create_file_table', 1713102280),
('m240304_232051_create_image_table', 1713102280),
('m240308_111611_create_admin_user', 1713102280),
('m240312_112837_change_column_date_type_project_table', 1713102280),
('m240322_163356_create_testimonial_table', 1713102281),
('m240401_190232_create_post_table', 1713102642),
('m240404_201906_init_rbac', 1713102475);

-- --------------------------------------------------------

--
-- Estrutura para tabela `post`
--

CREATE TABLE `post` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_published` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `post`
--

INSERT INTO `post` (`id`, `title`, `body`, `slug`, `is_published`, `created_at`, `updated_at`) VALUES
(1, 'Bootstrap is cool', 'Duis posuere fringilla velit vitae scelerisque. Phasellus eleifend risus sed metus placerat molestie. Pellentesque nec vehicula urna. Donec lacinia sed augue nec lacinia. Aenean tempor, urna in convallis elementum, tellus lacus hendrerit lectus, et varius dui felis quis arcu. Duis id vehicula metus. Vestibulum sagittis vestibulum justo, a aliquam justo bibendum in. Fusce augue tellus, tempor et purus eu, vehicula bibendum est. Sed consectetur feugiat elit eget faucibus. Suspendisse tempus, tellus eu mattis fringilla, turpis ipsum dignissim turpis, ut malesuada ante elit ac tellus. Donec dictum ultricies fermentum. Morbi justo est, laoreet nec scelerisque semper, consectetur eu enim. Suspendisse id pretium magna. In gravida magna libero, efficitur dictum mauris porta non. Sed eget neque suscipit, sagittis augue sit amet, scelerisque eros.', 'bootstrap', 1, '2024-04-14 15:23:43', '2024-04-14 15:23:43');

-- --------------------------------------------------------

--
-- Estrutura para tabela `project`
--

CREATE TABLE `project` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tech_stach` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `project`
--

INSERT INTO `project` (`id`, `name`, `tech_stach`, `description`, `start_date`, `end_date`) VALUES
(1, 'Car management website', 'php, Yii2 and Bootstrap', 'Aenean mattis sit amet ante eu sollicitudin. Donec congue lorem interdum purus consectetur porta. Maecenas in pellentesque nisl. Sed eu pretium leo. Nam tincidunt nibh at odio lacinia, sit amet varius tellus consequat. Aliquam erat volutpat. Aenean fermentum non urna nec condimentum. Vivamus ac diam vel nisl blandit condimentum nec ac diam. Quisque efficitur, magna eu fringilla luctus, lectus mi tempus augue, sed mattis nibh diam cursus nibh. Pellentesque a neque laoreet, maximus nunc eget, convallis quam. Aliquam erat volutpat. ', '2024-02-19', '2024-04-14'),
(2, 'Food ecommerce website', 'Html5, Bootstrap', 'Duis posuere fringilla velit vitae scelerisque. Phasellus eleifend risus sed metus placerat molestie. Pellentesque nec vehicula urna. Donec lacinia sed augue nec lacinia. Aenean tempor, urna in convallis elementum, tellus lacus hendrerit lectus, et varius dui felis quis arcu. Duis id vehicula metus. Vestibulum sagittis vestibulum justo, a aliquam justo bibendum in. Fusce augue tellus, tempor et purus eu, vehicula bibendum est. Sed consectetur feugiat elit eget faucibus. Suspendisse tempus, tellus eu mattis fringilla, turpis ipsum dignissim turpis, ut malesuada ante elit ac tellus. Donec dictum ultricies fermentum. Morbi justo est, laoreet nec scelerisque semper, consectetur eu enim. Suspendisse id pretium magna. In gravida magna libero, efficitur dictum mauris porta non. Sed eget neque suscipit, sagittis augue sit amet, scelerisque eros. ', '2024-02-19', '2024-04-14');

-- --------------------------------------------------------

--
-- Estrutura para tabela `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int NOT NULL,
  `project_id` int NOT NULL,
  `custumer_image_id` int DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `custumer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `testimonial`
--

INSERT INTO `testimonial` (`id`, `project_id`, `custumer_image_id`, `title`, `custumer_name`, `review`, `rating`) VALUES
(1, 1, 4, 'Is very funny', 'Nina Mcintire', 'Proin vulputate malesuada auctor. Etiam id lacus sodales, fringilla massa id, condimentum lacus. Nulla sed mauris mauris. Vestibulum congue tortor scelerisque gravida porta. Quisque molestie ut urna eu ornare. Etiam varius nisl in urna mattis dignissim. Nullam eu quam eget ipsum rutrum bibendum. ', 5),
(2, 1, 5, 'The best', 'Elinka Jovita', 'Aenean mattis sit amet ante eu sollicitudin. Donec congue lorem interdum purus consectetur porta. Maecenas in pellentesque nisl. Sed eu pretium leo. Nam tincidunt nibh at odio lacinia, sit amet varius tellus consequat. Aliquam erat volutpat. Aenean fermentum non urna nec condimentum. Vivamus ac diam vel nisl blandit condimentum nec ac diam. Quisque efficitur, magna eu fringilla luctus, lectus mi tempus augue, sed mattis nibh diam cursus nibh. Pellentesque a neque laoreet, maximus nunc eget, convallis quam. Aliquam erat volutpat.', 4),
(3, 2, 9, 'More less', 'Jonathan Burke Jr.', 'Phasellus est mi, vulputate sed augue accumsan, lobortis finibus ipsum. Quisque sed blandit odio. Donec luctus tellus quis eros accumsan eleifend non a quam. Nunc vehicula mattis aliquam. Donec tincidunt libero ullamcorper, laoreet dolor sit amet, efficitur metus. Sed varius imperdiet efficitur. Donec malesuada pulvinar augue, quis rutrum ipsum vestibulum ultrices. Sed in dapibus dolor. ', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8mb3_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `status` smallint NOT NULL DEFAULT '10',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `verification_token` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Despejando dados para a tabela `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'admin', 'Elvis Leite', 'yKDhCKlUu7zBoliGA0lbDuU0UExEbj7_', '$2y$13$UDor903byVlqQoqNQvZUyuqSAOpFHIDQkg/9ZojSgmoeTJhqdbIx6', NULL, 'admin@system', 10, '2024-04-14 13:44:40', '2024-04-14 13:44:40', NULL),
(2, 'Jhon', 'Jhon Doe', 'eLhYvrNCDr9-WLDTrPdDw2H3ANJhnXCz', '$2y$13$/ryjBKIphHH/vzrROmXhOeoMUSXRtTH5dEqLwRd067rIoPJAJy6au', NULL, 'blogmanager@system.com', 10, '2024-04-14 14:00:06', '2024-04-14 14:00:06', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Índices de tabela `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Índices de tabela `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Índices de tabela `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Índices de tabela `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-image-project_id` (`project_id`),
  ADD KEY `idx-image-file_id` (`file_id`);

--
-- Índices de tabela `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Índices de tabela `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-testimonial-project_id` (`project_id`),
  ADD KEY `idx-testimonial-custumer_image_id` (`custumer_image_id`);

--
-- Índices de tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `file`
--
ALTER TABLE `file`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `image`
--
ALTER TABLE `image`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `post`
--
ALTER TABLE `post`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `project`
--
ALTER TABLE `project`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Restrições para tabelas `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `fk-image-file_id` FOREIGN KEY (`file_id`) REFERENCES `file` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-image-project_id` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `testimonial`
--
ALTER TABLE `testimonial`
  ADD CONSTRAINT `fk-testimonial-custumer_image_id` FOREIGN KEY (`custumer_image_id`) REFERENCES `file` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk-testimonial-project_id` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
