<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200528102443 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE alloys_list DROP FOREIGN KEY FK_A91349C42F787162');
        $this->addSql('ALTER TABLE alloys_list DROP FOREIGN KEY FK_A91349C43DCDDE8C');
        $this->addSql('ALTER TABLE alloys_list DROP FOREIGN KEY FK_A91349C4450A4D9A');
        $this->addSql('ALTER TABLE alloys_list DROP FOREIGN KEY FK_A91349C460611246');
        $this->addSql('ALTER TABLE alloys_list DROP FOREIGN KEY FK_A91349C467922D0F');
        $this->addSql('ALTER TABLE alloys_list DROP FOREIGN KEY FK_A91349C472D4BDA8');
        $this->addSql('ALTER TABLE alloys_list DROP FOREIGN KEY FK_A91349C4752782E1');
        $this->addSql('ALTER TABLE alloys_list DROP FOREIGN KEY FK_A91349C48571B9E9');
        $this->addSql('ALTER TABLE alloys_list DROP FOREIGN KEY FK_A91349C4D8DD7523');
        $this->addSql('DROP INDEX UNIQ_A91349C42F787162 ON alloys_list');
        $this->addSql('DROP INDEX UNIQ_A91349C43DCDDE8C ON alloys_list');
        $this->addSql('DROP INDEX UNIQ_A91349C4450A4D9A ON alloys_list');
        $this->addSql('DROP INDEX UNIQ_A91349C460611246 ON alloys_list');
        $this->addSql('DROP INDEX UNIQ_A91349C467922D0F ON alloys_list');
        $this->addSql('DROP INDEX UNIQ_A91349C472D4BDA8 ON alloys_list');
        $this->addSql('DROP INDEX UNIQ_A91349C4752782E1 ON alloys_list');
        $this->addSql('DROP INDEX UNIQ_A91349C48571B9E9 ON alloys_list');
        $this->addSql('DROP INDEX UNIQ_A91349C4D8DD7523 ON alloys_list');
        $this->addSql('ALTER TABLE alloys_list DROP bonus1_id, DROP bonus2_id, DROP bonus3_id, DROP bonus4_id, DROP effect1_id, DROP effect2_id, DROP malus1_id, DROP malus2_id, DROP malus3_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE alloys_list ADD bonus1_id INT DEFAULT NULL, ADD bonus2_id INT DEFAULT NULL, ADD bonus3_id INT DEFAULT NULL, ADD bonus4_id INT DEFAULT NULL, ADD effect1_id INT DEFAULT NULL, ADD effect2_id INT DEFAULT NULL, ADD malus1_id INT DEFAULT NULL, ADD malus2_id INT DEFAULT NULL, ADD malus3_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE alloys_list ADD CONSTRAINT FK_A91349C42F787162 FOREIGN KEY (malus1_id) REFERENCES bonus_effects_list (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE alloys_list ADD CONSTRAINT FK_A91349C43DCDDE8C FOREIGN KEY (malus2_id) REFERENCES bonus_effects_list (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE alloys_list ADD CONSTRAINT FK_A91349C4450A4D9A FOREIGN KEY (bonus4_id) REFERENCES bonus_effects_list (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE alloys_list ADD CONSTRAINT FK_A91349C460611246 FOREIGN KEY (bonus2_id) REFERENCES bonus_effects_list (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE alloys_list ADD CONSTRAINT FK_A91349C467922D0F FOREIGN KEY (effect1_id) REFERENCES bonus_effects_list (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE alloys_list ADD CONSTRAINT FK_A91349C472D4BDA8 FOREIGN KEY (bonus1_id) REFERENCES bonus_effects_list (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE alloys_list ADD CONSTRAINT FK_A91349C4752782E1 FOREIGN KEY (effect2_id) REFERENCES bonus_effects_list (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE alloys_list ADD CONSTRAINT FK_A91349C48571B9E9 FOREIGN KEY (malus3_id) REFERENCES bonus_effects_list (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE alloys_list ADD CONSTRAINT FK_A91349C4D8DD7523 FOREIGN KEY (bonus3_id) REFERENCES bonus_effects_list (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A91349C42F787162 ON alloys_list (malus1_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A91349C43DCDDE8C ON alloys_list (malus2_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A91349C4450A4D9A ON alloys_list (bonus4_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A91349C460611246 ON alloys_list (bonus2_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A91349C467922D0F ON alloys_list (effect1_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A91349C472D4BDA8 ON alloys_list (bonus1_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A91349C4752782E1 ON alloys_list (effect2_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A91349C48571B9E9 ON alloys_list (malus3_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A91349C4D8DD7523 ON alloys_list (bonus3_id)');
    }
}
