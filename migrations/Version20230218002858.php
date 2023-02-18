<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230218002858 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
       
        $this->addSql('ALTER TABLE pret ADD type VARCHAR(255) NOT NULL, ADD duree DATE NOT NULL, ADD taux DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
       
        $this->addSql('ALTER TABLE pret DROP type, DROP duree, DROP taux');
    }
}
