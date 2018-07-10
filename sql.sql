CREATE TABLE `test`.`product` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `name` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL , `price` INT(20) NOT NULL , `text` TEXT CHARACTER SET utf8 COLLATE utf8_bin NOT NULL , `category` TEXT CHARACTER SET utf8 COLLATE utf8_bin NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;



CREATE TABLE `ecsite`.`product` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `name` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL , `text` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL , `price` INT(20) NOT NULL , `category` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;


CREATE TABLE `ecsite`.`user` ( `name` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL ) ENGINE = InnoDB;


insert into user (name,password) values("admin",md5("pass"))


  
