<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200617123500 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE objects_list ADD glyph1_id INT DEFAULT NULL, ADD glyph2_id INT DEFAULT NULL, ADD glyph3_id INT DEFAULT NULL, ADD glyph4_id INT DEFAULT NULL, ADD glyph5_id INT DEFAULT NULL, ADD glyph6_id INT DEFAULT NULL, ADD glyph7_id INT DEFAULT NULL, ADD glyph8_id INT DEFAULT NULL, ADD glyph9_id INT DEFAULT NULL, ADD glyph10_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE objects_list ADD CONSTRAINT FK_EDA019AC53486A64 FOREIGN KEY (glyph1_id) REFERENCES glyphs_list (id)');
        $this->addSql('ALTER TABLE objects_list ADD CONSTRAINT FK_EDA019AC41FDC58A FOREIGN KEY (glyph2_id) REFERENCES glyphs_list (id)');
        $this->addSql('ALTER TABLE objects_list ADD CONSTRAINT FK_EDA019ACF941A2EF FOREIGN KEY (glyph3_id) REFERENCES glyphs_list (id)');
        $this->addSql('ALTER TABLE objects_list ADD CONSTRAINT FK_EDA019AC64969A56 FOREIGN KEY (glyph4_id) REFERENCES glyphs_list (id)');
        $this->addSql('ALTER TABLE objects_list ADD CONSTRAINT FK_EDA019ACDC2AFD33 FOREIGN KEY (glyph5_id) REFERENCES glyphs_list (id)');
        $this->addSql('ALTER TABLE objects_list ADD CONSTRAINT FK_EDA019ACCE9F52DD FOREIGN KEY (glyph6_id) REFERENCES glyphs_list (id)');
        $this->addSql('ALTER TABLE objects_list ADD CONSTRAINT FK_EDA019AC762335B8 FOREIGN KEY (glyph7_id) REFERENCES glyphs_list (id)');
        $this->addSql('ALTER TABLE objects_list ADD CONSTRAINT FK_EDA019AC2E4025EE FOREIGN KEY (glyph8_id) REFERENCES glyphs_list (id)');
        $this->addSql('ALTER TABLE objects_list ADD CONSTRAINT FK_EDA019AC96FC428B FOREIGN KEY (glyph9_id) REFERENCES glyphs_list (id)');
        $this->addSql('ALTER TABLE objects_list ADD CONSTRAINT FK_EDA019AC245CA7DD FOREIGN KEY (glyph10_id) REFERENCES glyphs_list (id)');
        $this->addSql('CREATE INDEX IDX_EDA019AC53486A64 ON objects_list (glyph1_id)');
        $this->addSql('CREATE INDEX IDX_EDA019AC41FDC58A ON objects_list (glyph2_id)');
        $this->addSql('CREATE INDEX IDX_EDA019ACF941A2EF ON objects_list (glyph3_id)');
        $this->addSql('CREATE INDEX IDX_EDA019AC64969A56 ON objects_list (glyph4_id)');
        $this->addSql('CREATE INDEX IDX_EDA019ACDC2AFD33 ON objects_list (glyph5_id)');
        $this->addSql('CREATE INDEX IDX_EDA019ACCE9F52DD ON objects_list (glyph6_id)');
        $this->addSql('CREATE INDEX IDX_EDA019AC762335B8 ON objects_list (glyph7_id)');
        $this->addSql('CREATE INDEX IDX_EDA019AC2E4025EE ON objects_list (glyph8_id)');
        $this->addSql('CREATE INDEX IDX_EDA019AC96FC428B ON objects_list (glyph9_id)');
        $this->addSql('CREATE INDEX IDX_EDA019AC245CA7DD ON objects_list (glyph10_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE objects_list DROP FOREIGN KEY FK_EDA019AC53486A64');
        $this->addSql('ALTER TABLE objects_list DROP FOREIGN KEY FK_EDA019AC41FDC58A');
        $this->addSql('ALTER TABLE objects_list DROP FOREIGN KEY FK_EDA019ACF941A2EF');
        $this->addSql('ALTER TABLE objects_list DROP FOREIGN KEY FK_EDA019AC64969A56');
        $this->addSql('ALTER TABLE objects_list DROP FOREIGN KEY FK_EDA019ACDC2AFD33');
        $this->addSql('ALTER TABLE objects_list DROP FOREIGN KEY FK_EDA019ACCE9F52DD');
        $this->addSql('ALTER TABLE objects_list DROP FOREIGN KEY FK_EDA019AC762335B8');
        $this->addSql('ALTER TABLE objects_list DROP FOREIGN KEY FK_EDA019AC2E4025EE');
        $this->addSql('ALTER TABLE objects_list DROP FOREIGN KEY FK_EDA019AC96FC428B');
        $this->addSql('ALTER TABLE objects_list DROP FOREIGN KEY FK_EDA019AC245CA7DD');
        $this->addSql('DROP INDEX IDX_EDA019AC53486A64 ON objects_list');
        $this->addSql('DROP INDEX IDX_EDA019AC41FDC58A ON objects_list');
        $this->addSql('DROP INDEX IDX_EDA019ACF941A2EF ON objects_list');
        $this->addSql('DROP INDEX IDX_EDA019AC64969A56 ON objects_list');
        $this->addSql('DROP INDEX IDX_EDA019ACDC2AFD33 ON objects_list');
        $this->addSql('DROP INDEX IDX_EDA019ACCE9F52DD ON objects_list');
        $this->addSql('DROP INDEX IDX_EDA019AC762335B8 ON objects_list');
        $this->addSql('DROP INDEX IDX_EDA019AC2E4025EE ON objects_list');
        $this->addSql('DROP INDEX IDX_EDA019AC96FC428B ON objects_list');
        $this->addSql('DROP INDEX IDX_EDA019AC245CA7DD ON objects_list');
        $this->addSql('ALTER TABLE objects_list DROP glyph1_id, DROP glyph2_id, DROP glyph3_id, DROP glyph4_id, DROP glyph5_id, DROP glyph6_id, DROP glyph7_id, DROP glyph8_id, DROP glyph9_id, DROP glyph10_id');
    }
}
