<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240731083123 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__category AS SELECT id, ref, name, image FROM category');
        $this->addSql('DROP TABLE category');
        $this->addSql('CREATE TABLE category (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, ref VARCHAR(255) NOT NULL, name VARCHAR(120) NOT NULL, image VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO category (id, ref, name, image) SELECT id, ref, name, image FROM __temp__category');
        $this->addSql('DROP TABLE __temp__category');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__category AS SELECT id, ref, name, image FROM category');
        $this->addSql('DROP TABLE category');
        $this->addSql('CREATE TABLE category (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, ref VARCHAR(255) NOT NULL, name VARCHAR(120) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, cart VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO category (id, ref, name, image) SELECT id, ref, name, image FROM __temp__category');
        $this->addSql('DROP TABLE __temp__category');
    }
}
