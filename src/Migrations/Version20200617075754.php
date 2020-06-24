<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200617075754 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE boats ADD required_skill_id INT NOT NULL');
        $this->addSql('ALTER TABLE boats ADD CONSTRAINT FK_8DDF0906CEC0E2D5 FOREIGN KEY (required_skill_id) REFERENCES feature_levels (id)');
        $this->addSql('CREATE INDEX IDX_8DDF0906CEC0E2D5 ON boats (required_skill_id)');
        $this->addSql('ALTER TABLE glyphs_list ADD characters_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE glyphs_list ADD CONSTRAINT FK_C3C33044C70F0E28 FOREIGN KEY (characters_id) REFERENCES characters (id)');
        $this->addSql('CREATE INDEX IDX_C3C33044C70F0E28 ON glyphs_list (characters_id)');
        $this->addSql('ALTER TABLE objects_list ADD boat_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE objects_list ADD CONSTRAINT FK_EDA019ACA1E84A29 FOREIGN KEY (boat_id) REFERENCES boats (id)');
        $this->addSql('CREATE INDEX IDX_EDA019ACA1E84A29 ON objects_list (boat_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE boats DROP FOREIGN KEY FK_8DDF0906CEC0E2D5');
        $this->addSql('DROP INDEX IDX_8DDF0906CEC0E2D5 ON boats');
        $this->addSql('ALTER TABLE boats DROP required_skill_id');
        $this->addSql('ALTER TABLE glyphs_list DROP FOREIGN KEY FK_C3C33044C70F0E28');
        $this->addSql('DROP INDEX IDX_C3C33044C70F0E28 ON glyphs_list');
        $this->addSql('ALTER TABLE glyphs_list DROP characters_id');
        $this->addSql('ALTER TABLE objects_list DROP FOREIGN KEY FK_EDA019ACA1E84A29');
        $this->addSql('DROP INDEX IDX_EDA019ACA1E84A29 ON objects_list');
        $this->addSql('ALTER TABLE objects_list DROP boat_id');
    }
}
