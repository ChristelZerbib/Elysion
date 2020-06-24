<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200617074529 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE boats DROP FOREIGN KEY FK_8DDF0906232D562B');
        $this->addSql('DROP INDEX UNIQ_8DDF0906232D562B ON boats');
        $this->addSql('ALTER TABLE boats DROP object_id');
        $this->addSql('ALTER TABLE objects_list DROP boat');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE boats ADD object_id INT NOT NULL');
        $this->addSql('ALTER TABLE boats ADD CONSTRAINT FK_8DDF0906232D562B FOREIGN KEY (object_id) REFERENCES objects_list (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8DDF0906232D562B ON boats (object_id)');
        $this->addSql('ALTER TABLE objects_list ADD boat TINYINT(1) NOT NULL');
    }
}
