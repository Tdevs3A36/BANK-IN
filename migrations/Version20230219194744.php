<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230219194744 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE accstatus (id INT AUTO_INCREMENT NOT NULL, account_id INT DEFAULT NULL, etat VARCHAR(255) NOT NULL, reponse VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_83E9B4D69B6B5FBA (account_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE accstatus ADD CONSTRAINT FK_83E9B4D69B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id)');
        $this->addSql('ALTER TABLE acc_status DROP FOREIGN KEY FK_F97A40E06BF700BD');
        $this->addSql('DROP TABLE acc_status');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE acc_status (id INT AUTO_INCREMENT NOT NULL, status_id INT DEFAULT NULL, response VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_F97A40E06BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE acc_status ADD CONSTRAINT FK_F97A40E06BF700BD FOREIGN KEY (status_id) REFERENCES account (id)');
        $this->addSql('ALTER TABLE accstatus DROP FOREIGN KEY FK_83E9B4D69B6B5FBA');
        $this->addSql('DROP TABLE accstatus');
    }
}
