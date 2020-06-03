<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200528080622 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE up_feature ADD feature_id INT NOT NULL');
        $this->addSql('ALTER TABLE up_feature ADD CONSTRAINT FK_DF4AE0D60E4B879 FOREIGN KEY (feature_id) REFERENCES feature_types (id)');
        $this->addSql('CREATE INDEX IDX_DF4AE0D60E4B879 ON up_feature (feature_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE up_feature DROP FOREIGN KEY FK_DF4AE0D60E4B879');
        $this->addSql('DROP INDEX IDX_DF4AE0D60E4B879 ON up_feature');
        $this->addSql('ALTER TABLE up_feature DROP feature_id');
    }
}
