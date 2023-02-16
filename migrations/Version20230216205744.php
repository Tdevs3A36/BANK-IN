<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230216205744 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pret (id INT AUTO_INCREMENT NOT NULL, nom_complet VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, telephone INT NOT NULL, email VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, zip_code INT NOT NULL, country VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, montant DOUBLE PRECISION NOT NULL, raison VARCHAR(255) NOT NULL, poste INT NOT NULL, debut_travail DATE NOT NULL, revenu DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
       
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE pret');
      
    }
}
