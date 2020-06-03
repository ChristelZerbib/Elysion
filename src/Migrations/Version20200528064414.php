<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200528064414 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE alloys_list (id INT AUTO_INCREMENT NOT NULL, bonus1_id INT DEFAULT NULL, bonus2_id INT DEFAULT NULL, bonus3_id INT DEFAULT NULL, bonus4_id INT DEFAULT NULL, effect1_id INT DEFAULT NULL, effect2_id INT DEFAULT NULL, malus1_id INT DEFAULT NULL, malus2_id INT DEFAULT NULL, malus3_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, isunique TINYINT(1) NOT NULL, description VARCHAR(3000) NOT NULL, bought TINYINT(1) NOT NULL, used TINYINT(1) NOT NULL, type VARCHAR(50) NOT NULL, support VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_A91349C472D4BDA8 (bonus1_id), UNIQUE INDEX UNIQ_A91349C460611246 (bonus2_id), UNIQUE INDEX UNIQ_A91349C4D8DD7523 (bonus3_id), UNIQUE INDEX UNIQ_A91349C4450A4D9A (bonus4_id), UNIQUE INDEX UNIQ_A91349C467922D0F (effect1_id), UNIQUE INDEX UNIQ_A91349C4752782E1 (effect2_id), UNIQUE INDEX UNIQ_A91349C42F787162 (malus1_id), UNIQUE INDEX UNIQ_A91349C43DCDDE8C (malus2_id), UNIQUE INDEX UNIQ_A91349C48571B9E9 (malus3_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE awards (id INT AUTO_INCREMENT NOT NULL, characters_id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, price INT NOT NULL, INDEX IDX_25EAE3FEC70F0E28 (characters_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE boats (id INT AUTO_INCREMENT NOT NULL, object_id INT NOT NULL, maintenance INT NOT NULL, staff INT NOT NULL, glyph_max INT NOT NULL, UNIQUE INDEX UNIQ_8DDF0906232D562B (object_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bonus_effects_list (id INT AUTO_INCREMENT NOT NULL, rank_id INT NOT NULL, up_feature_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL, isunique TINYINT(1) NOT NULL, israre TINYINT(1) NOT NULL, description VARCHAR(1000) NOT NULL, add_glyph_place TINYINT(1) NOT NULL, bought TINYINT(1) NOT NULL, special TINYINT(1) NOT NULL, evol_salary INT DEFAULT NULL, evol_maintenance DOUBLE PRECISION DEFAULT NULL, evol_staff DOUBLE PRECISION DEFAULT NULL, INDEX IDX_7228C73A7616678F (rank_id), INDEX IDX_7228C73AE4CDF10C (up_feature_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE characters (id INT AUTO_INCREMENT NOT NULL, job_id INT NOT NULL, talent_id INT DEFAULT NULL, magic_id INT NOT NULL, boat_id INT DEFAULT NULL, user_id INT DEFAULT NULL, bonus_ethnique_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, comment VARCHAR(500) DEFAULT NULL, age INT NOT NULL, apperance_age VARCHAR(255) DEFAULT NULL, faction VARCHAR(255) NOT NULL, etnic_group VARCHAR(255) DEFAULT NULL, smallfaction VARCHAR(255) DEFAULT NULL, immunity TINYINT(1) NOT NULL, size VARCHAR(255) DEFAULT NULL, legal_statut VARCHAR(255) DEFAULT NULL, history VARCHAR(3000) DEFAULT NULL, character_traits VARCHAR(2000) DEFAULT NULL, physical VARCHAR(2000) DEFAULT NULL, avatar_url VARCHAR(255) NOT NULL, xp DOUBLE PRECISION NOT NULL, po INT NOT NULL, INDEX IDX_3A29410EBE04EA9 (job_id), INDEX IDX_3A29410E18777CEF (talent_id), UNIQUE INDEX UNIQ_3A29410E324D4343 (magic_id), UNIQUE INDEX UNIQ_3A29410EA1E84A29 (boat_id), INDEX IDX_3A29410EA76ED395 (user_id), INDEX IDX_3A29410ED7ACA413 (bonus_ethnique_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE characters_rp (characters_id INT NOT NULL, rp_id INT NOT NULL, INDEX IDX_74E311CFC70F0E28 (characters_id), INDEX IDX_74E311CFB70FF80C (rp_id), PRIMARY KEY(characters_id, rp_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE characters_totems (characters_id INT NOT NULL, totems_id INT NOT NULL, INDEX IDX_B7421523C70F0E28 (characters_id), INDEX IDX_B742152383BBFE1D (totems_id), PRIMARY KEY(characters_id, totems_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE feature_levels (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, xp_price DOUBLE PRECISION NOT NULL, rp_price INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE features (id INT AUTO_INCREMENT NOT NULL, feature_type_id INT NOT NULL, feature_level_id INT NOT NULL, characters_id INT NOT NULL, INDEX IDX_BFC0DC13F45B179A (feature_type_id), INDEX IDX_BFC0DC13265CE498 (feature_level_id), INDEX IDX_BFC0DC13C70F0E28 (characters_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE feature_types (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE flux_types (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE glyphs_list (id INT AUTO_INCREMENT NOT NULL, rarity_id INT NOT NULL, ingredient_type_id INT NOT NULL, characters_id INT NOT NULL, name VARCHAR(50) NOT NULL, price INT NOT NULL, isunique TINYINT(1) NOT NULL, description VARCHAR(1000) NOT NULL, bought TINYINT(1) NOT NULL, used TINYINT(1) NOT NULL, effect VARCHAR(50) NOT NULL, support VARCHAR(50) NOT NULL, INDEX IDX_C3C33044F3747573 (rarity_id), INDEX IDX_C3C33044C47B8755 (ingredient_type_id), INDEX IDX_C3C33044C70F0E28 (characters_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE glyphs_list_up_feature (glyphs_list_id INT NOT NULL, up_feature_id INT NOT NULL, INDEX IDX_15BEC979CCF94516 (glyphs_list_id), INDEX IDX_15BEC979E4CDF10C (up_feature_id), PRIMARY KEY(glyphs_list_id, up_feature_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ingredients (id INT AUTO_INCREMENT NOT NULL, ingredient_type_id INT NOT NULL, characters_id INT NOT NULL, INDEX IDX_4B60114FC47B8755 (ingredient_type_id), INDEX IDX_4B60114FC70F0E28 (characters_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ingredient_types (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, type VARCHAR(50) NOT NULL, price INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jobs (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, salary INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE links (id INT AUTO_INCREMENT NOT NULL, characters_id INT DEFAULT NULL, avatar_url VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, link_type VARCHAR(255) NOT NULL, description VARCHAR(1000) NOT NULL, INDEX IDX_D182A118C70F0E28 (characters_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lotteries (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE magic (id INT AUTO_INCREMENT NOT NULL, flux_type_id INT NOT NULL, feature_id INT DEFAULT NULL, INDEX IDX_906E92E694996EE (flux_type_id), UNIQUE INDEX UNIQ_906E92E60E4B879 (feature_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE object_legend (id INT AUTO_INCREMENT NOT NULL, partage TINYINT(1) NOT NULL, fusion TINYINT(1) NOT NULL, eveil TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE objects_list (id INT AUTO_INCREMENT NOT NULL, title_id INT DEFAULT NULL, subtype_id INT NOT NULL, glyphe1_id INT DEFAULT NULL, glyph2_id INT DEFAULT NULL, glyph3_id INT DEFAULT NULL, glyph4_id INT DEFAULT NULL, glyph_sup1_id INT DEFAULT NULL, glyph_sup2_id INT DEFAULT NULL, glyph_sup3_id INT DEFAULT NULL, glyph_sup4_id INT DEFAULT NULL, glyph_sup5_id INT DEFAULT NULL, glyph_sup6_id INT DEFAULT NULL, alloy_id INT DEFAULT NULL, rarity_id INT NOT NULL, legend_id INT DEFAULT NULL, characters_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(2000) NOT NULL, comment VARCHAR(2000) DEFAULT NULL, shop VARCHAR(255) NOT NULL, boat TINYINT(1) NOT NULL, price INT NOT NULL, UNIQUE INDEX UNIQ_EDA019ACA9F87BD (title_id), INDEX IDX_EDA019AC8E2E245C (subtype_id), UNIQUE INDEX UNIQ_EDA019AC5173A9B3 (glyphe1_id), UNIQUE INDEX UNIQ_EDA019AC41FDC58A (glyph2_id), UNIQUE INDEX UNIQ_EDA019ACF941A2EF (glyph3_id), UNIQUE INDEX UNIQ_EDA019AC64969A56 (glyph4_id), UNIQUE INDEX UNIQ_EDA019ACE71DA5D8 (glyph_sup1_id), UNIQUE INDEX UNIQ_EDA019ACF5A80A36 (glyph_sup2_id), UNIQUE INDEX UNIQ_EDA019AC4D146D53 (glyph_sup3_id), UNIQUE INDEX UNIQ_EDA019ACD0C355EA (glyph_sup4_id), UNIQUE INDEX UNIQ_EDA019AC687F328F (glyph_sup5_id), UNIQUE INDEX UNIQ_EDA019AC7ACA9D61 (glyph_sup6_id), UNIQUE INDEX UNIQ_EDA019ACDE168554 (alloy_id), INDEX IDX_EDA019ACF3747573 (rarity_id), UNIQUE INDEX UNIQ_EDA019ACD93B9119 (legend_id), INDEX IDX_EDA019ACC70F0E28 (characters_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE object_types (id INT AUTO_INCREMENT NOT NULL, subtype VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pending_validations (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, type VARCHAR(255) NOT NULL, request_id VARCHAR(255) DEFAULT NULL, statut VARCHAR(255) NOT NULL, message VARCHAR(1000) DEFAULT NULL, INDEX IDX_EAB6A0CB7E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prizes (id INT AUTO_INCREMENT NOT NULL, prize_type_id INT NOT NULL, lotteries_id INT NOT NULL, INDEX IDX_F73CF5A675D1EEED (prize_type_id), INDEX IDX_F73CF5A6BA13E801 (lotteries_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prize_types (id INT AUTO_INCREMENT NOT NULL, award_id INT DEFAULT NULL, ingredient_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_110DAB503D5282CF (award_id), UNIQUE INDEX UNIQ_110DAB50933FE08C (ingredient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ranks (id INT AUTO_INCREMENT NOT NULL, price INT NOT NULL, number INT NOT NULL, type VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rarity (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, marketable TINYINT(1) NOT NULL, duplicable TINYINT(1) NOT NULL, type VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rp (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, link VARCHAR(255) NOT NULL, characters VARCHAR(255) NOT NULL, description VARCHAR(500) NOT NULL, date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE spells (id INT AUTO_INCREMENT NOT NULL, characters_id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(3000) NOT NULL, price INT NOT NULL, INDEX IDX_88D70F5BC70F0E28 (characters_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE talents (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(3000) NOT NULL, price INT NOT NULL, isunique TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE titles (id INT AUTO_INCREMENT NOT NULL, characters_id INT DEFAULT NULL, name VARCHAR(60) NOT NULL, clan_vampire TINYINT(1) NOT NULL, alliance TINYINT(1) NOT NULL, royaume TINYINT(1) NOT NULL, confrerie TINYINT(1) NOT NULL, graarh TINYINT(1) NOT NULL, neutre TINYINT(1) NOT NULL, type VARCHAR(50) NOT NULL, INDEX IDX_C14541A3C70F0E28 (characters_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE totems (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(40) NOT NULL, description VARCHAR(3000) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE totems_up_feature (totems_id INT NOT NULL, up_feature_id INT NOT NULL, INDEX IDX_F295AA8A83BBFE1D (totems_id), INDEX IDX_F295AA8AE4CDF10C (up_feature_id), PRIMARY KEY(totems_id, up_feature_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE up_feature (id INT AUTO_INCREMENT NOT NULL, up_quantity INT NOT NULL, temporary TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, pp INT NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE alloys_list ADD CONSTRAINT FK_A91349C472D4BDA8 FOREIGN KEY (bonus1_id) REFERENCES bonus_effects_list (id)');
        $this->addSql('ALTER TABLE alloys_list ADD CONSTRAINT FK_A91349C460611246 FOREIGN KEY (bonus2_id) REFERENCES bonus_effects_list (id)');
        $this->addSql('ALTER TABLE alloys_list ADD CONSTRAINT FK_A91349C4D8DD7523 FOREIGN KEY (bonus3_id) REFERENCES bonus_effects_list (id)');
        $this->addSql('ALTER TABLE alloys_list ADD CONSTRAINT FK_A91349C4450A4D9A FOREIGN KEY (bonus4_id) REFERENCES bonus_effects_list (id)');
        $this->addSql('ALTER TABLE alloys_list ADD CONSTRAINT FK_A91349C467922D0F FOREIGN KEY (effect1_id) REFERENCES bonus_effects_list (id)');
        $this->addSql('ALTER TABLE alloys_list ADD CONSTRAINT FK_A91349C4752782E1 FOREIGN KEY (effect2_id) REFERENCES bonus_effects_list (id)');
        $this->addSql('ALTER TABLE alloys_list ADD CONSTRAINT FK_A91349C42F787162 FOREIGN KEY (malus1_id) REFERENCES bonus_effects_list (id)');
        $this->addSql('ALTER TABLE alloys_list ADD CONSTRAINT FK_A91349C43DCDDE8C FOREIGN KEY (malus2_id) REFERENCES bonus_effects_list (id)');
        $this->addSql('ALTER TABLE alloys_list ADD CONSTRAINT FK_A91349C48571B9E9 FOREIGN KEY (malus3_id) REFERENCES bonus_effects_list (id)');
        $this->addSql('ALTER TABLE awards ADD CONSTRAINT FK_25EAE3FEC70F0E28 FOREIGN KEY (characters_id) REFERENCES characters (id)');
        $this->addSql('ALTER TABLE boats ADD CONSTRAINT FK_8DDF0906232D562B FOREIGN KEY (object_id) REFERENCES objects_list (id)');
        $this->addSql('ALTER TABLE bonus_effects_list ADD CONSTRAINT FK_7228C73A7616678F FOREIGN KEY (rank_id) REFERENCES ranks (id)');
        $this->addSql('ALTER TABLE bonus_effects_list ADD CONSTRAINT FK_7228C73AE4CDF10C FOREIGN KEY (up_feature_id) REFERENCES up_feature (id)');
        $this->addSql('ALTER TABLE characters ADD CONSTRAINT FK_3A29410EBE04EA9 FOREIGN KEY (job_id) REFERENCES jobs (id)');
        $this->addSql('ALTER TABLE characters ADD CONSTRAINT FK_3A29410E18777CEF FOREIGN KEY (talent_id) REFERENCES talents (id)');
        $this->addSql('ALTER TABLE characters ADD CONSTRAINT FK_3A29410E324D4343 FOREIGN KEY (magic_id) REFERENCES magic (id)');
        $this->addSql('ALTER TABLE characters ADD CONSTRAINT FK_3A29410EA1E84A29 FOREIGN KEY (boat_id) REFERENCES boats (id)');
        $this->addSql('ALTER TABLE characters ADD CONSTRAINT FK_3A29410EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE characters ADD CONSTRAINT FK_3A29410ED7ACA413 FOREIGN KEY (bonus_ethnique_id) REFERENCES features (id)');
        $this->addSql('ALTER TABLE characters_rp ADD CONSTRAINT FK_74E311CFC70F0E28 FOREIGN KEY (characters_id) REFERENCES characters (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE characters_rp ADD CONSTRAINT FK_74E311CFB70FF80C FOREIGN KEY (rp_id) REFERENCES rp (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE characters_totems ADD CONSTRAINT FK_B7421523C70F0E28 FOREIGN KEY (characters_id) REFERENCES characters (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE characters_totems ADD CONSTRAINT FK_B742152383BBFE1D FOREIGN KEY (totems_id) REFERENCES totems (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE features ADD CONSTRAINT FK_BFC0DC13F45B179A FOREIGN KEY (feature_type_id) REFERENCES feature_types (id)');
        $this->addSql('ALTER TABLE features ADD CONSTRAINT FK_BFC0DC13265CE498 FOREIGN KEY (feature_level_id) REFERENCES feature_levels (id)');
        $this->addSql('ALTER TABLE features ADD CONSTRAINT FK_BFC0DC13C70F0E28 FOREIGN KEY (characters_id) REFERENCES characters (id)');
        $this->addSql('ALTER TABLE glyphs_list ADD CONSTRAINT FK_C3C33044F3747573 FOREIGN KEY (rarity_id) REFERENCES rarity (id)');
        $this->addSql('ALTER TABLE glyphs_list ADD CONSTRAINT FK_C3C33044C47B8755 FOREIGN KEY (ingredient_type_id) REFERENCES ingredient_types (id)');
        $this->addSql('ALTER TABLE glyphs_list ADD CONSTRAINT FK_C3C33044C70F0E28 FOREIGN KEY (characters_id) REFERENCES characters (id)');
        $this->addSql('ALTER TABLE glyphs_list_up_feature ADD CONSTRAINT FK_15BEC979CCF94516 FOREIGN KEY (glyphs_list_id) REFERENCES glyphs_list (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE glyphs_list_up_feature ADD CONSTRAINT FK_15BEC979E4CDF10C FOREIGN KEY (up_feature_id) REFERENCES up_feature (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ingredients ADD CONSTRAINT FK_4B60114FC47B8755 FOREIGN KEY (ingredient_type_id) REFERENCES ingredient_types (id)');
        $this->addSql('ALTER TABLE ingredients ADD CONSTRAINT FK_4B60114FC70F0E28 FOREIGN KEY (characters_id) REFERENCES characters (id)');
        $this->addSql('ALTER TABLE links ADD CONSTRAINT FK_D182A118C70F0E28 FOREIGN KEY (characters_id) REFERENCES characters (id)');
        $this->addSql('ALTER TABLE magic ADD CONSTRAINT FK_906E92E694996EE FOREIGN KEY (flux_type_id) REFERENCES flux_types (id)');
        $this->addSql('ALTER TABLE magic ADD CONSTRAINT FK_906E92E60E4B879 FOREIGN KEY (feature_id) REFERENCES features (id)');
        $this->addSql('ALTER TABLE objects_list ADD CONSTRAINT FK_EDA019ACA9F87BD FOREIGN KEY (title_id) REFERENCES titles (id)');
        $this->addSql('ALTER TABLE objects_list ADD CONSTRAINT FK_EDA019AC8E2E245C FOREIGN KEY (subtype_id) REFERENCES object_types (id)');
        $this->addSql('ALTER TABLE objects_list ADD CONSTRAINT FK_EDA019AC5173A9B3 FOREIGN KEY (glyphe1_id) REFERENCES glyphs_list (id)');
        $this->addSql('ALTER TABLE objects_list ADD CONSTRAINT FK_EDA019AC41FDC58A FOREIGN KEY (glyph2_id) REFERENCES glyphs_list (id)');
        $this->addSql('ALTER TABLE objects_list ADD CONSTRAINT FK_EDA019ACF941A2EF FOREIGN KEY (glyph3_id) REFERENCES glyphs_list (id)');
        $this->addSql('ALTER TABLE objects_list ADD CONSTRAINT FK_EDA019AC64969A56 FOREIGN KEY (glyph4_id) REFERENCES glyphs_list (id)');
        $this->addSql('ALTER TABLE objects_list ADD CONSTRAINT FK_EDA019ACE71DA5D8 FOREIGN KEY (glyph_sup1_id) REFERENCES glyphs_list (id)');
        $this->addSql('ALTER TABLE objects_list ADD CONSTRAINT FK_EDA019ACF5A80A36 FOREIGN KEY (glyph_sup2_id) REFERENCES glyphs_list (id)');
        $this->addSql('ALTER TABLE objects_list ADD CONSTRAINT FK_EDA019AC4D146D53 FOREIGN KEY (glyph_sup3_id) REFERENCES glyphs_list (id)');
        $this->addSql('ALTER TABLE objects_list ADD CONSTRAINT FK_EDA019ACD0C355EA FOREIGN KEY (glyph_sup4_id) REFERENCES glyphs_list (id)');
        $this->addSql('ALTER TABLE objects_list ADD CONSTRAINT FK_EDA019AC687F328F FOREIGN KEY (glyph_sup5_id) REFERENCES glyphs_list (id)');
        $this->addSql('ALTER TABLE objects_list ADD CONSTRAINT FK_EDA019AC7ACA9D61 FOREIGN KEY (glyph_sup6_id) REFERENCES glyphs_list (id)');
        $this->addSql('ALTER TABLE objects_list ADD CONSTRAINT FK_EDA019ACDE168554 FOREIGN KEY (alloy_id) REFERENCES alloys_list (id)');
        $this->addSql('ALTER TABLE objects_list ADD CONSTRAINT FK_EDA019ACF3747573 FOREIGN KEY (rarity_id) REFERENCES rarity (id)');
        $this->addSql('ALTER TABLE objects_list ADD CONSTRAINT FK_EDA019ACD93B9119 FOREIGN KEY (legend_id) REFERENCES object_legend (id)');
        $this->addSql('ALTER TABLE objects_list ADD CONSTRAINT FK_EDA019ACC70F0E28 FOREIGN KEY (characters_id) REFERENCES characters (id)');
        $this->addSql('ALTER TABLE pending_validations ADD CONSTRAINT FK_EAB6A0CB7E3C61F9 FOREIGN KEY (owner_id) REFERENCES characters (id)');
        $this->addSql('ALTER TABLE prizes ADD CONSTRAINT FK_F73CF5A675D1EEED FOREIGN KEY (prize_type_id) REFERENCES prize_types (id)');
        $this->addSql('ALTER TABLE prizes ADD CONSTRAINT FK_F73CF5A6BA13E801 FOREIGN KEY (lotteries_id) REFERENCES lotteries (id)');
        $this->addSql('ALTER TABLE prize_types ADD CONSTRAINT FK_110DAB503D5282CF FOREIGN KEY (award_id) REFERENCES awards (id)');
        $this->addSql('ALTER TABLE prize_types ADD CONSTRAINT FK_110DAB50933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredients (id)');
        $this->addSql('ALTER TABLE spells ADD CONSTRAINT FK_88D70F5BC70F0E28 FOREIGN KEY (characters_id) REFERENCES characters (id)');
        $this->addSql('ALTER TABLE titles ADD CONSTRAINT FK_C14541A3C70F0E28 FOREIGN KEY (characters_id) REFERENCES characters (id)');
        $this->addSql('ALTER TABLE totems_up_feature ADD CONSTRAINT FK_F295AA8A83BBFE1D FOREIGN KEY (totems_id) REFERENCES totems (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE totems_up_feature ADD CONSTRAINT FK_F295AA8AE4CDF10C FOREIGN KEY (up_feature_id) REFERENCES up_feature (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE objects_list DROP FOREIGN KEY FK_EDA019ACDE168554');
        $this->addSql('ALTER TABLE prize_types DROP FOREIGN KEY FK_110DAB503D5282CF');
        $this->addSql('ALTER TABLE characters DROP FOREIGN KEY FK_3A29410EA1E84A29');
        $this->addSql('ALTER TABLE alloys_list DROP FOREIGN KEY FK_A91349C472D4BDA8');
        $this->addSql('ALTER TABLE alloys_list DROP FOREIGN KEY FK_A91349C460611246');
        $this->addSql('ALTER TABLE alloys_list DROP FOREIGN KEY FK_A91349C4D8DD7523');
        $this->addSql('ALTER TABLE alloys_list DROP FOREIGN KEY FK_A91349C4450A4D9A');
        $this->addSql('ALTER TABLE alloys_list DROP FOREIGN KEY FK_A91349C467922D0F');
        $this->addSql('ALTER TABLE alloys_list DROP FOREIGN KEY FK_A91349C4752782E1');
        $this->addSql('ALTER TABLE alloys_list DROP FOREIGN KEY FK_A91349C42F787162');
        $this->addSql('ALTER TABLE alloys_list DROP FOREIGN KEY FK_A91349C43DCDDE8C');
        $this->addSql('ALTER TABLE alloys_list DROP FOREIGN KEY FK_A91349C48571B9E9');
        $this->addSql('ALTER TABLE awards DROP FOREIGN KEY FK_25EAE3FEC70F0E28');
        $this->addSql('ALTER TABLE characters_rp DROP FOREIGN KEY FK_74E311CFC70F0E28');
        $this->addSql('ALTER TABLE characters_totems DROP FOREIGN KEY FK_B7421523C70F0E28');
        $this->addSql('ALTER TABLE features DROP FOREIGN KEY FK_BFC0DC13C70F0E28');
        $this->addSql('ALTER TABLE glyphs_list DROP FOREIGN KEY FK_C3C33044C70F0E28');
        $this->addSql('ALTER TABLE ingredients DROP FOREIGN KEY FK_4B60114FC70F0E28');
        $this->addSql('ALTER TABLE links DROP FOREIGN KEY FK_D182A118C70F0E28');
        $this->addSql('ALTER TABLE objects_list DROP FOREIGN KEY FK_EDA019ACC70F0E28');
        $this->addSql('ALTER TABLE pending_validations DROP FOREIGN KEY FK_EAB6A0CB7E3C61F9');
        $this->addSql('ALTER TABLE spells DROP FOREIGN KEY FK_88D70F5BC70F0E28');
        $this->addSql('ALTER TABLE titles DROP FOREIGN KEY FK_C14541A3C70F0E28');
        $this->addSql('ALTER TABLE features DROP FOREIGN KEY FK_BFC0DC13265CE498');
        $this->addSql('ALTER TABLE characters DROP FOREIGN KEY FK_3A29410ED7ACA413');
        $this->addSql('ALTER TABLE magic DROP FOREIGN KEY FK_906E92E60E4B879');
        $this->addSql('ALTER TABLE features DROP FOREIGN KEY FK_BFC0DC13F45B179A');
        $this->addSql('ALTER TABLE magic DROP FOREIGN KEY FK_906E92E694996EE');
        $this->addSql('ALTER TABLE glyphs_list_up_feature DROP FOREIGN KEY FK_15BEC979CCF94516');
        $this->addSql('ALTER TABLE objects_list DROP FOREIGN KEY FK_EDA019AC5173A9B3');
        $this->addSql('ALTER TABLE objects_list DROP FOREIGN KEY FK_EDA019AC41FDC58A');
        $this->addSql('ALTER TABLE objects_list DROP FOREIGN KEY FK_EDA019ACF941A2EF');
        $this->addSql('ALTER TABLE objects_list DROP FOREIGN KEY FK_EDA019AC64969A56');
        $this->addSql('ALTER TABLE objects_list DROP FOREIGN KEY FK_EDA019ACE71DA5D8');
        $this->addSql('ALTER TABLE objects_list DROP FOREIGN KEY FK_EDA019ACF5A80A36');
        $this->addSql('ALTER TABLE objects_list DROP FOREIGN KEY FK_EDA019AC4D146D53');
        $this->addSql('ALTER TABLE objects_list DROP FOREIGN KEY FK_EDA019ACD0C355EA');
        $this->addSql('ALTER TABLE objects_list DROP FOREIGN KEY FK_EDA019AC687F328F');
        $this->addSql('ALTER TABLE objects_list DROP FOREIGN KEY FK_EDA019AC7ACA9D61');
        $this->addSql('ALTER TABLE prize_types DROP FOREIGN KEY FK_110DAB50933FE08C');
        $this->addSql('ALTER TABLE glyphs_list DROP FOREIGN KEY FK_C3C33044C47B8755');
        $this->addSql('ALTER TABLE ingredients DROP FOREIGN KEY FK_4B60114FC47B8755');
        $this->addSql('ALTER TABLE characters DROP FOREIGN KEY FK_3A29410EBE04EA9');
        $this->addSql('ALTER TABLE prizes DROP FOREIGN KEY FK_F73CF5A6BA13E801');
        $this->addSql('ALTER TABLE characters DROP FOREIGN KEY FK_3A29410E324D4343');
        $this->addSql('ALTER TABLE objects_list DROP FOREIGN KEY FK_EDA019ACD93B9119');
        $this->addSql('ALTER TABLE boats DROP FOREIGN KEY FK_8DDF0906232D562B');
        $this->addSql('ALTER TABLE objects_list DROP FOREIGN KEY FK_EDA019AC8E2E245C');
        $this->addSql('ALTER TABLE prizes DROP FOREIGN KEY FK_F73CF5A675D1EEED');
        $this->addSql('ALTER TABLE bonus_effects_list DROP FOREIGN KEY FK_7228C73A7616678F');
        $this->addSql('ALTER TABLE glyphs_list DROP FOREIGN KEY FK_C3C33044F3747573');
        $this->addSql('ALTER TABLE objects_list DROP FOREIGN KEY FK_EDA019ACF3747573');
        $this->addSql('ALTER TABLE characters_rp DROP FOREIGN KEY FK_74E311CFB70FF80C');
        $this->addSql('ALTER TABLE characters DROP FOREIGN KEY FK_3A29410E18777CEF');
        $this->addSql('ALTER TABLE objects_list DROP FOREIGN KEY FK_EDA019ACA9F87BD');
        $this->addSql('ALTER TABLE characters_totems DROP FOREIGN KEY FK_B742152383BBFE1D');
        $this->addSql('ALTER TABLE totems_up_feature DROP FOREIGN KEY FK_F295AA8A83BBFE1D');
        $this->addSql('ALTER TABLE bonus_effects_list DROP FOREIGN KEY FK_7228C73AE4CDF10C');
        $this->addSql('ALTER TABLE glyphs_list_up_feature DROP FOREIGN KEY FK_15BEC979E4CDF10C');
        $this->addSql('ALTER TABLE totems_up_feature DROP FOREIGN KEY FK_F295AA8AE4CDF10C');
        $this->addSql('ALTER TABLE characters DROP FOREIGN KEY FK_3A29410EA76ED395');
        $this->addSql('DROP TABLE alloys_list');
        $this->addSql('DROP TABLE awards');
        $this->addSql('DROP TABLE boats');
        $this->addSql('DROP TABLE bonus_effects_list');
        $this->addSql('DROP TABLE characters');
        $this->addSql('DROP TABLE characters_rp');
        $this->addSql('DROP TABLE characters_totems');
        $this->addSql('DROP TABLE feature_levels');
        $this->addSql('DROP TABLE features');
        $this->addSql('DROP TABLE feature_types');
        $this->addSql('DROP TABLE flux_types');
        $this->addSql('DROP TABLE glyphs_list');
        $this->addSql('DROP TABLE glyphs_list_up_feature');
        $this->addSql('DROP TABLE ingredients');
        $this->addSql('DROP TABLE ingredient_types');
        $this->addSql('DROP TABLE jobs');
        $this->addSql('DROP TABLE links');
        $this->addSql('DROP TABLE lotteries');
        $this->addSql('DROP TABLE magic');
        $this->addSql('DROP TABLE object_legend');
        $this->addSql('DROP TABLE objects_list');
        $this->addSql('DROP TABLE object_types');
        $this->addSql('DROP TABLE pending_validations');
        $this->addSql('DROP TABLE prizes');
        $this->addSql('DROP TABLE prize_types');
        $this->addSql('DROP TABLE ranks');
        $this->addSql('DROP TABLE rarity');
        $this->addSql('DROP TABLE rp');
        $this->addSql('DROP TABLE spells');
        $this->addSql('DROP TABLE talents');
        $this->addSql('DROP TABLE titles');
        $this->addSql('DROP TABLE totems');
        $this->addSql('DROP TABLE totems_up_feature');
        $this->addSql('DROP TABLE up_feature');
        $this->addSql('DROP TABLE user');
    }
}
