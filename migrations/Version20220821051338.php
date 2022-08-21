<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220821051338 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE brand (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ram (id INT AUTO_INCREMENT NOT NULL, server_id_id INT NOT NULL, type VARCHAR(255) NOT NULL, number_of_sticks INT NOT NULL, size INT NOT NULL, INDEX IDX_E7D1222FDFC5FC5E (server_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE server (id INT AUTO_INCREMENT NOT NULL, brand_id_id INT NOT NULL, assetid INT NOT NULL, name VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, INDEX IDX_5A6DD5F624BD5740 (brand_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ram ADD CONSTRAINT FK_E7D1222FDFC5FC5E FOREIGN KEY (server_id_id) REFERENCES server (id)');
        $this->addSql('ALTER TABLE server ADD CONSTRAINT FK_5A6DD5F624BD5740 FOREIGN KEY (brand_id_id) REFERENCES brand (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ram DROP FOREIGN KEY FK_E7D1222FDFC5FC5E');
        $this->addSql('ALTER TABLE server DROP FOREIGN KEY FK_5A6DD5F624BD5740');
        $this->addSql('DROP TABLE brand');
        $this->addSql('DROP TABLE ram');
        $this->addSql('DROP TABLE server');
    }
}
