<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230219010521 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE depenses DROP FOREIGN KEY FK_EE350ECB48B00F4D');
        $this->addSql('ALTER TABLE depenses ADD CONSTRAINT FK_EE350ECB48B00F4D FOREIGN KEY (idbudget_id) REFERENCES budget (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE depenses DROP FOREIGN KEY FK_EE350ECB48B00F4D');
        $this->addSql('ALTER TABLE depenses ADD CONSTRAINT FK_EE350ECB48B00F4D FOREIGN KEY (idbudget_id) REFERENCES budget (id)');
    }
}
