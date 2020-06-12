<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200610123017 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE glyphs_list DROP FOREIGN KEY FK_C3C33044C70F0E28');
        $this->addSql('DROP INDEX IDX_C3C33044C70F0E28 ON glyphs_list');
        $this->addSql('ALTER TABLE glyphs_list ADD characters VARCHAR(255) DEFAULT NULL, DROP characters_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE glyphs_list ADD characters_id INT DEFAULT NULL, DROP characters');
        $this->addSql('ALTER TABLE glyphs_list ADD CONSTRAINT FK_C3C33044C70F0E28 FOREIGN KEY (characters_id) REFERENCES characters (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_C3C33044C70F0E28 ON glyphs_list (characters_id)');
    }
}
