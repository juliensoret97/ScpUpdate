<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220715130047 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation ADD formation_scp_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF30C061C2 FOREIGN KEY (formation_scp_id) REFERENCES formation_scp (id)');
        $this->addSql('CREATE INDEX IDX_404021BF30C061C2 ON formation (formation_scp_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BF30C061C2');
        $this->addSql('DROP INDEX IDX_404021BF30C061C2 ON formation');
        $this->addSql('ALTER TABLE formation DROP formation_scp_id');
    }
}
