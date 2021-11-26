<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211126134849 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE info (id INT AUTO_INCREMENT NOT NULL, cpf VARCHAR(255) NOT NULL, genero VARCHAR(255) NOT NULL, ano_nascimento VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, cpf VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_form (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, user_name VARCHAR(255) NOT NULL, zip_code VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        // Insere os dados cedidos no exercício 3
        $this->addSql('INSERT INTO user (cpf, name)
            VALUES
                ("16798125050", "Luke Skywalker"),
                ("59875804045", "Bruce Wayne"),
                ("04707649025", "Diane Prince"),
                ("21142450040", "Bruce Banner"),
                ("83257946074", "Harley Quinn"),
                ("07583509025", "Peter Parker")'
        );

        $this->addSql('INSERT INTO info (cpf, genero, ano_nascimento)
            VALUES
                ("16798125050", "M", "1976"),
                ("59875804045", "M", "1960"),
                ("04707649025", "F", "1988"),
                ("21142450040", "M", "1954"),
                ("83257946074", "F", "1970"),
                ("07583509025", "M", "1972")'
        );
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE info');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE user_form');
    }
}
