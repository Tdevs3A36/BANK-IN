<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230225232914 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE abonnement (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, abonnement_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_E19D9AD2F1D74413 (abonnement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD2F1D74413 FOREIGN KEY (abonnement_id) REFERENCES abonnement (id)');
        $this->addSql('ALTER TABLE account ADD abonnement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE account ADD CONSTRAINT FK_7D3656A4F1D74413 FOREIGN KEY (abonnement_id) REFERENCES abonnement (id)');
        $this->addSql('CREATE INDEX IDX_7D3656A4F1D74413 ON account (abonnement_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE account DROP FOREIGN KEY FK_7D3656A4F1D74413');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD2F1D74413');
        $this->addSql('DROP TABLE abonnement');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP INDEX IDX_7D3656A4F1D74413 ON account');
        $this->addSql('ALTER TABLE account DROP abonnement_id');
    }
}
