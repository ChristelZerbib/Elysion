<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200701173901 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bonus_effects_list_up_feature (bonus_effects_list_id INT NOT NULL, up_feature_id INT NOT NULL, INDEX IDX_E945EE63FEB34C77 (bonus_effects_list_id), INDEX IDX_E945EE63E4CDF10C (up_feature_id), PRIMARY KEY(bonus_effects_list_id, up_feature_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bonus_effects_list_up_feature ADD CONSTRAINT FK_E945EE63FEB34C77 FOREIGN KEY (bonus_effects_list_id) REFERENCES bonus_effects_list (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bonus_effects_list_up_feature ADD CONSTRAINT FK_E945EE63E4CDF10C FOREIGN KEY (up_feature_id) REFERENCES up_feature (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bonus_effects_list DROP FOREIGN KEY FK_7228C73AE4CDF10C');
        $this->addSql('DROP INDEX IDX_7228C73AE4CDF10C ON bonus_effects_list');
        $this->addSql('ALTER TABLE bonus_effects_list DROP up_feature_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE bonus_effects_list_up_feature');
        $this->addSql('ALTER TABLE bonus_effects_list ADD up_feature_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bonus_effects_list ADD CONSTRAINT FK_7228C73AE4CDF10C FOREIGN KEY (up_feature_id) REFERENCES up_feature (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_7228C73AE4CDF10C ON bonus_effects_list (up_feature_id)');
    }
}
