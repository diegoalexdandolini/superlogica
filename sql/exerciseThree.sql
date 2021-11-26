CREATE TABLE user
  (id INT AUTO_INCREMENT NOT NULL,
  cpf VARCHAR(255) NOT NULL,
  name VARCHAR(255) NOT NULL,
  PRIMARY KEY(id))
DEFAULT CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci ENGINE = INNODB

CREATE TABLE info
  (id INT AUTO_INCREMENT NOT NULL,
  cpf VARCHAR(255) NOT NULL,
  genero VARCHAR(255) NOT NULL,
  ano_nascimento VARCHAR(255) NOT NULL,
  PRIMARY KEY(id))
DEFAULT CHARACTER SET utf8mb4
COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB

INSERT INTO user
  (cpf, name) VALUES
  ("16798125050", "Luke Skywalker"),
  ("59875804045", "Bruce Wayne"),
  ("04707649025", "Diane Prince"),
  ("21142450040", "Bruce Banner"),
  ("83257946074", "Harley Quinn"),
  ("07583509025", "Peter Parker")

INSERT INTO info
  (cpf, genero, ano_nascimento) VALUES
  ("16798125050", "M", "1976"),
  ("59875804045", "M", "1960"),
  ("04707649025", "F", "1988"),
  ("21142450040", "M", "1954"),
  ("83257946074", "F", "1970"),
  ("07583509025", "M", "1972")

SELECT CONCAT(u.name, " - ", i.genero) AS usuario, 
  IF(YEAR(NOW()) - i.ano_nascimento > 50, "SIM", "NÃO") AS maior 50 anos
FROM user AS u
  JOIN info AS i ON u.cpf = i.cpf
WHERE i.genero = "M"
  AND u.cpf != "59875804045"
ORDER BY u.name DESC;
