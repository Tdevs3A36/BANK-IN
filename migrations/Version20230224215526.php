<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230224215526 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE account (id INT AUTO_INCREMENT NOT NULL, nom_complet VARCHAR(255) NOT NULL, num_tel INT NOT NULL, email VARCHAR(255) NOT NULL, sexe VARCHAR(255) NOT NULL, date_naiss DATE NOT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, services VARCHAR(255) NOT NULL, brochure_filename VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE accstatus (id INT AUTO_INCREMENT NOT NULL, account_id INT DEFAULT NULL, etat VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_83E9B4D69B6B5FBA (account_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE accstatus ADD CONSTRAINT FK_83E9B4D69B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE accstatus DROP FOREIGN KEY FK_83E9B4D69B6B5FBA');
        $this->addSql('DROP TABLE account');
        $this->addSql('DROP TABLE accstatus');
    }
}
