
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- es_cities
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `es_cities`;

CREATE TABLE `es_cities`
(
    `id_city` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(300),
    `description` VARCHAR(500),
    `abbreviation` VARCHAR(200),
    `id_capital` int(10) unsigned,
    `id_region` int(10) unsigned,
    `lat` DECIMAL(10,6),
    `lng` DECIMAL(10,6),
    `area` INTEGER,
    `nro_municipios` INTEGER,
    `surface` DECIMAL,
    `ids_files` VARCHAR(490),
    `id_cover_picture` int(10) unsigned,
    `height` DECIMAL,
    `tipo` VARCHAR(490),
    `status` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_city`),
    UNIQUE INDEX `es_cities_id_city_uindex` (`id_city`),
    INDEX `es_cities_ibfk_1` (`id_user_created`),
    INDEX `es_cities_ibfk_2` (`id_user_modified`),
    INDEX `es_cities_ibfk_3` (`id_capital`),
    INDEX `es_cities_ibfk_4` (`id_region`),
    INDEX `es_cities_ibfk_5` (`id_cover_picture`),
    CONSTRAINT `es_cities_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `es_users` (`id_user`),
    CONSTRAINT `es_cities_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `es_users` (`id_user`),
    CONSTRAINT `es_cities_ibfk_3`
        FOREIGN KEY (`id_capital`)
        REFERENCES `es_cities` (`id_city`),
    CONSTRAINT `es_cities_ibfk_4`
        FOREIGN KEY (`id_region`)
        REFERENCES `es_cities` (`id_city`),
    CONSTRAINT `es_cities_ibfk_5`
        FOREIGN KEY (`id_cover_picture`)
        REFERENCES `es_files` (`id_file`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- es_domains
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `es_domains`;

CREATE TABLE `es_domains`
(
    `id_domain` INTEGER NOT NULL AUTO_INCREMENT,
    `host` VARCHAR(450),
    `hostname` VARCHAR(450),
    `protocol` VARCHAR(10),
    `port` INTEGER,
    `origin` VARCHAR(450),
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_domain`),
    UNIQUE INDEX `es_domains_id_domain_uindex` (`id_domain`),
    INDEX `es_domains_ibfk_1` (`id_user_created`),
    INDEX `es_domains_ibfk_2` (`id_user_modified`),
    CONSTRAINT `es_domains_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `es_users` (`id_user`),
    CONSTRAINT `es_domains_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `es_users` (`id_user`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- es_files
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `es_files`;

CREATE TABLE `es_files`
(
    `id_file` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(256),
    `url` VARCHAR(450),
    `ext` VARCHAR(100),
    `raw_name` VARCHAR(400),
    `full_path` VARCHAR(400),
    `path` VARCHAR(400),
    `width` INTEGER,
    `height` INTEGER,
    `size` DECIMAL,
    `library` VARCHAR(20),
    `nro_thumbs` INTEGER,
    `id_parent` int(10) unsigned,
    `thumb_marker` VARCHAR(200),
    `type` VARCHAR(100),
    `x` DECIMAL(20,10),
    `y` DECIMAL(20,10),
    `fix_width` DECIMAL(20,10),
    `fix_height` DECIMAL(20,10),
    `status` VARCHAR(15) DEFAULT 'ENABLED',
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_file`),
    UNIQUE INDEX `es_files_id_file_uindex` (`id_file`),
    INDEX `es_files_ibfk_1` (`id_user_created`),
    INDEX `es_files_ibfk_2` (`id_user_modified`),
    INDEX `es_files_ibfk_3` (`id_parent`),
    CONSTRAINT `es_files_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `es_users` (`id_user`),
    CONSTRAINT `es_files_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `es_users` (`id_user`),
    CONSTRAINT `es_files_ibfk_3`
        FOREIGN KEY (`id_parent`)
        REFERENCES `es_files` (`id_file`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- es_logs
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `es_logs`;

CREATE TABLE `es_logs`
(
    `id_log` INTEGER NOT NULL AUTO_INCREMENT,
    `heading` VARCHAR(499),
    `message` TEXT,
    `action` VARCHAR(499),
    `code` VARCHAR(200),
    `level` INTEGER,
    `file` VARCHAR(1000),
    `line` INTEGER,
    `trace` TEXT,
    `previous` VARCHAR(499),
    `xdebug_message` TEXT,
    `type` INTEGER,
    `post` VARCHAR(1000),
    `severity` VARCHAR(400),
    `status` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_log`),
    UNIQUE INDEX `es_logs_id_log_uindex` (`id_log`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- es_modules
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `es_modules`;

CREATE TABLE `es_modules`
(
    `id_module` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(256),
    `description` VARCHAR(500),
    `status` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_module`),
    UNIQUE INDEX `es_modules_id_module_uindex` (`id_module`),
    INDEX `es_modules_ibfk_1` (`id_user_modified`),
    INDEX `es_modules_ibfk_2` (`id_user_created`),
    CONSTRAINT `es_modules_ibfk_1`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `es_users` (`id_user`),
    CONSTRAINT `es_modules_ibfk_2`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `es_users` (`id_user`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- es_provincias
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `es_provincias`;

CREATE TABLE `es_provincias`
(
    `id_provincia` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(300),
    `area` VARCHAR(900),
    `lat` INTEGER,
    `lng` INTEGER,
    `id_municipio` int(11) unsigned,
    `id_ciudad` int(10) unsigned,
    `status` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_provincia`),
    UNIQUE INDEX `es_provincias_id_provincia_uindex` (`id_provincia`),
    INDEX `es_provincias_ibfk_1` (`id_user_created`),
    INDEX `es_provincias_ibfk_2` (`id_user_modified`),
    INDEX `es_provincias_ibfk_3` (`id_ciudad`),
    INDEX `es_provincias_ibfk_4` (`id_municipio`),
    CONSTRAINT `es_provincias_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `es_users` (`id_user`),
    CONSTRAINT `es_provincias_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `es_users` (`id_user`),
    CONSTRAINT `es_provincias_ibfk_3`
        FOREIGN KEY (`id_ciudad`)
        REFERENCES `es_cities` (`id_city`),
    CONSTRAINT `es_provincias_ibfk_4`
        FOREIGN KEY (`id_municipio`)
        REFERENCES `es_provincias` (`id_provincia`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- es_roles
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `es_roles`;

CREATE TABLE `es_roles`
(
    `id_role` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(256),
    `description` VARCHAR(500),
    `write` VARCHAR(10),
    `read` VARCHAR(10),
    `status` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned,
    `id_user_created` int(11) unsigned,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_role`),
    UNIQUE INDEX `es_roles_id_role_uindex` (`id_role`),
    INDEX `es_roles_ibfk_1` (`id_user_created`),
    INDEX `es_roles_ibfk_2` (`id_user_modified`),
    CONSTRAINT `es_roles_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `es_users` (`id_user`),
    CONSTRAINT `es_roles_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `es_users` (`id_user`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- es_sessions
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `es_sessions`;

CREATE TABLE `es_sessions`
(
    `id` VARCHAR(128) NOT NULL,
    `ip_address` VARCHAR(45) NOT NULL,
    `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
    `data` BLOB NOT NULL,
    `last_activity` DATETIME DEFAULT '0000-00-00 00:00:00',
    `id_user` int(11) unsigned,
    `lng` INTEGER,
    `lat` INTEGER,
    PRIMARY KEY (`id`),
    INDEX `es_sessions_ibfk_1` (`id_user`),
    CONSTRAINT `es_sessions_ibfk_1`
        FOREIGN KEY (`id_user`)
        REFERENCES `es_users` (`id_user`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- es_tables
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `es_tables`;

CREATE TABLE `es_tables`
(
    `id_table` int(11) unsigned NOT NULL,
    `id_module` int(10) unsigned,
    `id_role` int(10) unsigned,
    `title` VARCHAR(100) NOT NULL,
    `table_name` VARCHAR(255),
    `listed` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `description` TEXT,
    `icon` VARCHAR(200) NOT NULL,
    `url` VARCHAR(400) NOT NULL,
    `url_edit` VARCHAR(450),
    `url_index` VARCHAR(450),
    `status` VARCHAR(255) DEFAULT 'ENABLED',
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_table`),
    UNIQUE INDEX `es_tables_id_table_uindex` (`id_table`),
    INDEX `es_tables_ibfk_4` (`id_module`),
    INDEX `id_user_created` (`id_user_created`),
    INDEX `id_user_modified` (`id_user_modified`),
    INDEX `es_tables_ibfk_3` (`id_role`),
    CONSTRAINT `es_tables_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `es_users` (`id_user`),
    CONSTRAINT `es_tables_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `es_users` (`id_user`),
    CONSTRAINT `es_tables_ibfk_3`
        FOREIGN KEY (`id_role`)
        REFERENCES `es_roles` (`id_role`),
    CONSTRAINT `es_tables_ibfk_4`
        FOREIGN KEY (`id_module`)
        REFERENCES `es_modules` (`id_module`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- es_tables_roles
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `es_tables_roles`;

CREATE TABLE `es_tables_roles`
(
    `id_table_role` INTEGER NOT NULL AUTO_INCREMENT,
    `id_table` int(10) unsigned,
    `id_role` int(10) unsigned,
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_table_role`),
    UNIQUE INDEX `es_tables_roles_id_table_role_uindex` (`id_table_role`),
    INDEX `es_tables_roles_ibfk_1` (`id_user_created`),
    INDEX `es_tables_roles_ibfk_2` (`id_user_modified`),
    INDEX `es_tables_roles_ibfk_3` (`id_table`),
    INDEX `es_tables_roles_ibfk_4` (`id_role`),
    CONSTRAINT `es_tables_roles_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `es_users` (`id_user`),
    CONSTRAINT `es_tables_roles_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `es_users` (`id_user`),
    CONSTRAINT `es_tables_roles_ibfk_3`
        FOREIGN KEY (`id_table`)
        REFERENCES `es_tables` (`id_table`),
    CONSTRAINT `es_tables_roles_ibfk_4`
        FOREIGN KEY (`id_role`)
        REFERENCES `es_roles` (`id_role`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- es_users
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `es_users`;

CREATE TABLE `es_users`
(
    `id_user` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(256),
    `lastname` VARCHAR(256),
    `username` VARCHAR(250),
    `email` VARCHAR(100) DEFAULT '' NOT NULL,
    `address` VARCHAR(500),
    `password` VARCHAR(128) DEFAULT '' NOT NULL,
    `birthdate` DATE,
    `age` INTEGER,
    `carnet` VARCHAR(30),
    `sexo` VARCHAR(15),
    `phone_1` VARCHAR(20),
    `phone_2` VARCHAR(20),
    `cellphone_1` VARCHAR(20),
    `cellphone_2` VARCHAR(20),
    `ids_files` VARCHAR(450),
    `id_cover_picture` int(10) unsigned,
    `id_city` int(10) unsigned,
    `id_provincia` int(10) unsigned,
    `id_role` int(10) unsigned,
    `signin_method` VARCHAR(100),
    `uid` VARCHAR(499),
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `status` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_user`),
    UNIQUE INDEX `es_users_id_user_uindex` (`id_user`),
    INDEX `es_users_ibfk_1` (`id_role`),
    INDEX `es_users_ibfk_2` (`id_provincia`),
    INDEX `es_users_ibfk_3` (`id_cover_picture`),
    INDEX `es_users_ibfk_4` (`id_city`),
    CONSTRAINT `es_users_ibfk_1`
        FOREIGN KEY (`id_role`)
        REFERENCES `es_roles` (`id_role`),
    CONSTRAINT `es_users_ibfk_2`
        FOREIGN KEY (`id_provincia`)
        REFERENCES `es_provincias` (`id_provincia`),
    CONSTRAINT `es_users_ibfk_3`
        FOREIGN KEY (`id_cover_picture`)
        REFERENCES `es_files` (`id_file`),
    CONSTRAINT `es_users_ibfk_4`
        FOREIGN KEY (`id_city`)
        REFERENCES `es_cities` (`id_city`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- es_users_roles
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `es_users_roles`;

CREATE TABLE `es_users_roles`
(
    `id_user_role` INTEGER NOT NULL AUTO_INCREMENT,
    `id_user` int(10) unsigned,
    `id_role` int(10) unsigned,
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_user_role`),
    UNIQUE INDEX `dfa_usuarios_roles_id_usuario_role_uindex` (`id_user_role`),
    INDEX `dfa_usuarios_roles_ibfk_1` (`id_user_created`),
    INDEX `dfa_usuarios_roles_ibfk_2` (`id_user_modified`),
    INDEX `dfa_usuarios_roles_ibfk_3` (`id_user`),
    INDEX `dfa_usuarios_roles_ibfk_4` (`id_role`),
    CONSTRAINT `es_users_roles_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `es_users` (`id_user`),
    CONSTRAINT `es_users_roles_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `es_users` (`id_user`),
    CONSTRAINT `es_users_roles_ibfk_3`
        FOREIGN KEY (`id_user`)
        REFERENCES `es_users` (`id_user`),
    CONSTRAINT `es_users_roles_ibfk_4`
        FOREIGN KEY (`id_role`)
        REFERENCES `es_roles` (`id_role`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- migrations
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations`
(
    `version` BIGINT NOT NULL
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
