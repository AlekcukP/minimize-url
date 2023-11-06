CREATE TABLE url_map (
    id int(11) NOT NULL AUTO_INCREMENT,
    url_key VARCHAR(6) NOT NULL,
    original_url VARCHAR(255) NOT NULL,
    redirects INT UNSIGNED NOT NULL DEFAULT 0,
    expires_at TIMESTAMP NULL,
    created_at TIMESTAMP NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`),
    UNIQUE KEY `url_key_index` (`url_key`) USING BTREE,
    KEY `original_url_index` (`original_url`) USING BTREE
);


DELIMITER //
CREATE TRIGGER set_url_map_values
BEFORE INSERT ON url_map
FOR EACH ROW
BEGIN
    DECLARE characters CHAR(62);
    DECLARE urlKey VARCHAR(6);
    DECLARE i INT;

    SET characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    SET urlKey = '';

    WHILE LENGTH(urlKey) < 6 DO
        SET i = FLOOR(1 + (RAND() * 62));
        SET urlKey = CONCAT(urlKey, SUBSTRING(characters, i, 1));
    END WHILE;

    SET NEW.expires_at = IFNULL(NEW.expires_at, NOW() + INTERVAL 3 DAY);
    SET NEW.url_key = urlKey;
END; //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE IncrementUrlMapRedirects(IN url_id VARCHAR(6))
BEGIN
    UPDATE url_map
    SET redirects = redirects + 1
    WHERE id = url_id;
END; //
DELIMITER ;
