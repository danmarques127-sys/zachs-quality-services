-- Run in the MySQL database configured as ZACHS_DB_NAME.
-- Backup an existing database before applying migrations.
CREATE TABLE IF NOT EXISTS posts (
 id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
 titulo VARCHAR(255) NOT NULL,
 conteudo MEDIUMTEXT NOT NULL,
 arquivo VARCHAR(1024) DEFAULT NULL,
 criado_em TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
 INDEX idx_criado_em (criado_em)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
