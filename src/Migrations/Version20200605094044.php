<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200605094044 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        // $this->addSql('DROP INDEX description ON alloys_list');
        // $this->addSql('DROP INDEX name ON alloys_list');
        // $this->addSql('DROP INDEX support ON alloys_list');
        // $this->addSql('DROP INDEX support_2 ON alloys_list');
        // $this->addSql('DROP INDEX support_3 ON alloys_list');
        // $this->addSql('DROP INDEX type ON alloys_list');
        $this->addSql('ALTER TABLE alloys_list ADD price INT NOT NULL');
        // $this->addSql('DROP INDEX rank_id ON bonus_effects_list');
        // $this->addSql('DROP INDEX number ON ranks');
        // $this->addSql('DROP INDEX price ON ranks');
        // $this->addSql('DROP INDEX type ON ranks');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE alloys_list DROP price');
        $this->addSql('CREATE INDEX description ON alloys_list (description(768))');
        $this->addSql('CREATE INDEX name ON alloys_list (name)');
        $this->addSql('CREATE INDEX support ON alloys_list (support)');
        $this->addSql('CREATE INDEX support_2 ON alloys_list (support_2)');
        $this->addSql('CREATE INDEX support_3 ON alloys_list (support_3)');
        $this->addSql('CREATE INDEX type ON alloys_list (type)');
        $this->addSql('CREATE INDEX rank_id ON bonus_effects_list (rank_id)');
        $this->addSql('CREATE INDEX number ON ranks (number)');
        $this->addSql('CREATE INDEX price ON ranks (price)');
        $this->addSql('CREATE INDEX type ON ranks (type)');
    }
}
