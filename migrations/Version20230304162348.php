<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230304162348 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD2F1D74413');
        $this->addSql('DROP INDEX IDX_E19D9AD2F1D74413 ON service');
        $this->addSql('ALTER TABLE service CHANGE abonnement_id id_abonnement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD24FFF9576 FOREIGN KEY (id_abonnement_id) REFERENCES abonnement (id)');
        $this->addSql('CREATE INDEX IDX_E19D9AD24FFF9576 ON service (id_abonnement_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD24FFF9576');
        $this->addSql('DROP INDEX IDX_E19D9AD24FFF9576 ON service');
        $this->addSql('ALTER TABLE service CHANGE id_abonnement_id abonnement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD2F1D74413 FOREIGN KEY (abonnement_id) REFERENCES abonnement (id)');
        $this->addSql('CREATE INDEX IDX_E19D9AD2F1D74413 ON service (abonnement_id)');
    }
}
