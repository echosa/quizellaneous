<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211013205140 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category ADD COLUMN slug VARCHAR(255) NOT NULL');
        $this->addSql('DROP INDEX IDX_C4367F8D12469DE2');
        $this->addSql('CREATE TEMPORARY TABLE __temp__classical_music_composer AS SELECT id, category_id, name, birth_date, death_date, slug FROM classical_music_composer');
        $this->addSql('DROP TABLE classical_music_composer');
        $this->addSql('CREATE TABLE classical_music_composer (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, category_id INTEGER NOT NULL, name VARCHAR(255) NOT NULL COLLATE BINARY, birth_date DATETIME NOT NULL, death_date DATETIME DEFAULT NULL, slug VARCHAR(255) NOT NULL COLLATE BINARY, CONSTRAINT FK_C4367F8D12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO classical_music_composer (id, category_id, name, birth_date, death_date, slug) SELECT id, category_id, name, birth_date, death_date, slug FROM __temp__classical_music_composer');
        $this->addSql('DROP TABLE __temp__classical_music_composer');
        $this->addSql('CREATE INDEX IDX_C4367F8D12469DE2 ON classical_music_composer (category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__category AS SELECT id, name FROM category');
        $this->addSql('DROP TABLE category');
        $this->addSql('CREATE TABLE category (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO category (id, name) SELECT id, name FROM __temp__category');
        $this->addSql('DROP TABLE __temp__category');
        $this->addSql('DROP INDEX IDX_C4367F8D12469DE2');
        $this->addSql('CREATE TEMPORARY TABLE __temp__classical_music_composer AS SELECT id, category_id, name, birth_date, death_date, slug FROM classical_music_composer');
        $this->addSql('DROP TABLE classical_music_composer');
        $this->addSql('CREATE TABLE classical_music_composer (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, category_id INTEGER NOT NULL, name VARCHAR(255) NOT NULL, birth_date DATETIME NOT NULL, death_date DATETIME DEFAULT NULL, slug VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO classical_music_composer (id, category_id, name, birth_date, death_date, slug) SELECT id, category_id, name, birth_date, death_date, slug FROM __temp__classical_music_composer');
        $this->addSql('DROP TABLE __temp__classical_music_composer');
        $this->addSql('CREATE INDEX IDX_C4367F8D12469DE2 ON classical_music_composer (category_id)');
    }
}
