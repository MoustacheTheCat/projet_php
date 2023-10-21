connexion a la BDD

    sudo mysql

Create DB

    CREATE DATABASE projet_php;

Create USER admin_projet_php for DATABASE

    CREATE USER 'admin_projet_php'@'localhost' IDENTIFIED BY 'password';
    GRANT ALL PRIVILEGES ON projet_php.* TO 'admin_projet_php'@'localhost';
    FLUSH PRIVILEGES;

Create table users in projet_phpDB

    use projet_php

    CREATE TABLE users( id INT AUTO_INCREMENT PRIMARY KEY, user_name VARCHAR (50) NOT NULL, user_password VARCHAR(255) NOT NULL, user_email VARCHAR(255) NOT NULL, user_picture VARCHAR(255), user_role INT(1) NOT NULL, created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(), updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP());


Add admin , author and user in DB

    INSERT INTO `users` (`id`, `user_name`, `user_password`, `user_email`, `user_picture`, `user_role`, `created_at`, `updated_at`) VALUES (NULL, 'admin', 'password_admin', 'joubert.mathieu753783@gmail.com', NULL, '0', current_timestamp(), current_timestamp()), (NULL, 'author', 'password_author', 'mattou83075@gmail.com', NULL, '1', current_timestamp(), current_timestamp()), (NULL, 'user', 'password_user', 'mathieu.joubert@live.fr', NULL, '2', current_timestamp(), current_timestamp());


