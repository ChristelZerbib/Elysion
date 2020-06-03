<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200528103904 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE alloys_list ADD bonus_1_id INT DEFAULT NULL, ADD bonus_2_id INT DEFAULT NULL, ADD bonus_3_id INT DEFAULT NULL, ADD bonus_4_id INT DEFAULT NULL, ADD malus_1_id INT DEFAULT NULL, ADD malus_2_id INT DEFAULT NULL, ADD malus_3_id INT DEFAULT NULL, ADD effect_1_id INT DEFAULT NULL, ADD effect_2_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE alloys_list ADD CONSTRAINT FK_A91349C428111BD8 FOREIGN KEY (bonus_1_id) REFERENCES bonus_effects_list (id)');
        $this->addSql('ALTER TABLE alloys_list ADD CONSTRAINT FK_A91349C43AA4B436 FOREIGN KEY (bonus_2_id) REFERENCES bonus_effects_list (id)');
        $this->addSql('ALTER TABLE alloys_list ADD CONSTRAINT FK_A91349C48218D353 FOREIGN KEY (bonus_3_id) REFERENCES bonus_effects_list (id)');
        $this->addSql('ALTER TABLE alloys_list ADD CONSTRAINT FK_A91349C41FCFEBEA FOREIGN KEY (bonus_4_id) REFERENCES bonus_effects_list (id)');
        $this->addSql('ALTER TABLE alloys_list ADD CONSTRAINT FK_A91349C453FD9CBA FOREIGN KEY (malus_1_id) REFERENCES bonus_effects_list (id)');
        $this->addSql('ALTER TABLE alloys_list ADD CONSTRAINT FK_A91349C441483354 FOREIGN KEY (malus_2_id) REFERENCES bonus_effects_list (id)');
        $this->addSql('ALTER TABLE alloys_list ADD CONSTRAINT FK_A91349C4F9F45431 FOREIGN KEY (malus_3_id) REFERENCES bonus_effects_list (id)');
        $this->addSql('ALTER TABLE alloys_list ADD CONSTRAINT FK_A91349C460B66B03 FOREIGN KEY (effect_1_id) REFERENCES bonus_effects_list (id)');
        $this->addSql('ALTER TABLE alloys_list ADD CONSTRAINT FK_A91349C47203C4ED FOREIGN KEY (effect_2_id) REFERENCES bonus_effects_list (id)');
        $this->addSql('CREATE INDEX IDX_A91349C428111BD8 ON alloys_list (bonus_1_id)');
        $this->addSql('CREATE INDEX IDX_A91349C43AA4B436 ON alloys_list (bonus_2_id)');
        $this->addSql('CREATE INDEX IDX_A91349C48218D353 ON alloys_list (bonus_3_id)');
        $this->addSql('CREATE INDEX IDX_A91349C41FCFEBEA ON alloys_list (bonus_4_id)');
        $this->addSql('CREATE INDEX IDX_A91349C453FD9CBA ON alloys_list (malus_1_id)');
        $this->addSql('CREATE INDEX IDX_A91349C441483354 ON alloys_list (malus_2_id)');
        $this->addSql('CREATE INDEX IDX_A91349C4F9F45431 ON alloys_list (malus_3_id)');
        $this->addSql('CREATE INDEX IDX_A91349C460B66B03 ON alloys_list (effect_1_id)');
        $this->addSql('CREATE INDEX IDX_A91349C47203C4ED ON alloys_list (effect_2_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE alloys_list DROP FOREIGN KEY FK_A91349C428111BD8');
        $this->addSql('ALTER TABLE alloys_list DROP FOREIGN KEY FK_A91349C43AA4B436');
        $this->addSql('ALTER TABLE alloys_list DROP FOREIGN KEY FK_A91349C48218D353');
        $this->addSql('ALTER TABLE alloys_list DROP FOREIGN KEY FK_A91349C41FCFEBEA');
        $this->addSql('ALTER TABLE alloys_list DROP FOREIGN KEY FK_A91349C453FD9CBA');
        $this->addSql('ALTER TABLE alloys_list DROP FOREIGN KEY FK_A91349C441483354');
        $this->addSql('ALTER TABLE alloys_list DROP FOREIGN KEY FK_A91349C4F9F45431');
        $this->addSql('ALTER TABLE alloys_list DROP FOREIGN KEY FK_A91349C460B66B03');
        $this->addSql('ALTER TABLE alloys_list DROP FOREIGN KEY FK_A91349C47203C4ED');
        $this->addSql('DROP INDEX IDX_A91349C428111BD8 ON alloys_list');
        $this->addSql('DROP INDEX IDX_A91349C43AA4B436 ON alloys_list');
        $this->addSql('DROP INDEX IDX_A91349C48218D353 ON alloys_list');
        $this->addSql('DROP INDEX IDX_A91349C41FCFEBEA ON alloys_list');
        $this->addSql('DROP INDEX IDX_A91349C453FD9CBA ON alloys_list');
        $this->addSql('DROP INDEX IDX_A91349C441483354 ON alloys_list');
        $this->addSql('DROP INDEX IDX_A91349C4F9F45431 ON alloys_list');
        $this->addSql('DROP INDEX IDX_A91349C460B66B03 ON alloys_list');
        $this->addSql('DROP INDEX IDX_A91349C47203C4ED ON alloys_list');
        $this->addSql('ALTER TABLE alloys_list DROP bonus_1_id, DROP bonus_2_id, DROP bonus_3_id, DROP bonus_4_id, DROP malus_1_id, DROP malus_2_id, DROP malus_3_id, DROP effect_1_id, DROP effect_2_id');
    }
}
