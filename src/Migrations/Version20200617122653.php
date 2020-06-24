<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200617122653 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE objects_list DROP FOREIGN KEY FK_EDA019AC41FDC58A');
        $this->addSql('ALTER TABLE objects_list DROP FOREIGN KEY FK_EDA019AC4D146D53');
        $this->addSql('ALTER TABLE objects_list DROP FOREIGN KEY FK_EDA019AC5173A9B3');
        $this->addSql('ALTER TABLE objects_list DROP FOREIGN KEY FK_EDA019AC64969A56');
        $this->addSql('ALTER TABLE objects_list DROP FOREIGN KEY FK_EDA019AC687F328F');
        $this->addSql('ALTER TABLE objects_list DROP FOREIGN KEY FK_EDA019AC7ACA9D61');
        $this->addSql('ALTER TABLE objects_list DROP FOREIGN KEY FK_EDA019ACD0C355EA');
        $this->addSql('ALTER TABLE objects_list DROP FOREIGN KEY FK_EDA019ACE71DA5D8');
        $this->addSql('ALTER TABLE objects_list DROP FOREIGN KEY FK_EDA019ACF5A80A36');
        $this->addSql('ALTER TABLE objects_list DROP FOREIGN KEY FK_EDA019ACF941A2EF');
        $this->addSql('DROP INDEX UNIQ_EDA019AC41FDC58A ON objects_list');
        $this->addSql('DROP INDEX UNIQ_EDA019AC4D146D53 ON objects_list');
        $this->addSql('DROP INDEX UNIQ_EDA019AC5173A9B3 ON objects_list');
        $this->addSql('DROP INDEX UNIQ_EDA019AC64969A56 ON objects_list');
        $this->addSql('DROP INDEX UNIQ_EDA019AC687F328F ON objects_list');
        $this->addSql('DROP INDEX UNIQ_EDA019AC7ACA9D61 ON objects_list');
        $this->addSql('DROP INDEX UNIQ_EDA019ACD0C355EA ON objects_list');
        $this->addSql('DROP INDEX UNIQ_EDA019ACE71DA5D8 ON objects_list');
        $this->addSql('DROP INDEX UNIQ_EDA019ACF5A80A36 ON objects_list');
        $this->addSql('DROP INDEX UNIQ_EDA019ACF941A2EF ON objects_list');
        $this->addSql('ALTER TABLE objects_list DROP glyphe1_id, DROP glyph2_id, DROP glyph3_id, DROP glyph4_id, DROP glyph_sup1_id, DROP glyph_sup2_id, DROP glyph_sup3_id, DROP glyph_sup4_id, DROP glyph_sup5_id, DROP glyph_sup6_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE objects_list ADD glyphe1_id INT DEFAULT NULL, ADD glyph2_id INT DEFAULT NULL, ADD glyph3_id INT DEFAULT NULL, ADD glyph4_id INT DEFAULT NULL, ADD glyph_sup1_id INT DEFAULT NULL, ADD glyph_sup2_id INT DEFAULT NULL, ADD glyph_sup3_id INT DEFAULT NULL, ADD glyph_sup4_id INT DEFAULT NULL, ADD glyph_sup5_id INT DEFAULT NULL, ADD glyph_sup6_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE objects_list ADD CONSTRAINT FK_EDA019AC41FDC58A FOREIGN KEY (glyph2_id) REFERENCES glyphs_list (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE objects_list ADD CONSTRAINT FK_EDA019AC4D146D53 FOREIGN KEY (glyph_sup3_id) REFERENCES glyphs_list (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE objects_list ADD CONSTRAINT FK_EDA019AC5173A9B3 FOREIGN KEY (glyphe1_id) REFERENCES glyphs_list (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE objects_list ADD CONSTRAINT FK_EDA019AC64969A56 FOREIGN KEY (glyph4_id) REFERENCES glyphs_list (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE objects_list ADD CONSTRAINT FK_EDA019AC687F328F FOREIGN KEY (glyph_sup5_id) REFERENCES glyphs_list (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE objects_list ADD CONSTRAINT FK_EDA019AC7ACA9D61 FOREIGN KEY (glyph_sup6_id) REFERENCES glyphs_list (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE objects_list ADD CONSTRAINT FK_EDA019ACD0C355EA FOREIGN KEY (glyph_sup4_id) REFERENCES glyphs_list (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE objects_list ADD CONSTRAINT FK_EDA019ACE71DA5D8 FOREIGN KEY (glyph_sup1_id) REFERENCES glyphs_list (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE objects_list ADD CONSTRAINT FK_EDA019ACF5A80A36 FOREIGN KEY (glyph_sup2_id) REFERENCES glyphs_list (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE objects_list ADD CONSTRAINT FK_EDA019ACF941A2EF FOREIGN KEY (glyph3_id) REFERENCES glyphs_list (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EDA019AC41FDC58A ON objects_list (glyph2_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EDA019AC4D146D53 ON objects_list (glyph_sup3_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EDA019AC5173A9B3 ON objects_list (glyphe1_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EDA019AC64969A56 ON objects_list (glyph4_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EDA019AC687F328F ON objects_list (glyph_sup5_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EDA019AC7ACA9D61 ON objects_list (glyph_sup6_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EDA019ACD0C355EA ON objects_list (glyph_sup4_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EDA019ACE71DA5D8 ON objects_list (glyph_sup1_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EDA019ACF5A80A36 ON objects_list (glyph_sup2_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EDA019ACF941A2EF ON objects_list (glyph3_id)');
    }
}
