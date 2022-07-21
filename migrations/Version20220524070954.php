<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220524070954 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE contact_t_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE data_location_t_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE interface_t_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE kpi_t_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE kpi_version_t_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE parameter_t_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "people_t_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE perimeter_t_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE publish_t_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE report_t_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE user_right_t_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE user_t_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE warning_t_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE contact_t (id INT NOT NULL, people_id INT NOT NULL, owner_id INT NOT NULL, data_kpi_id INT DEFAULT NULL, report_id INT DEFAULT NULL, data_location_id INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_756451953147C936 ON contact_t (people_id)');
        $this->addSql('CREATE INDEX IDX_756451957E3C61F9 ON contact_t (owner_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7564519595F32B47 ON contact_t (data_kpi_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_756451954BD2A4C0 ON contact_t (report_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_75645195F98D7EC4 ON contact_t (data_location_id)');
        $this->addSql('CREATE TABLE data_location_t (id INT NOT NULL, type_id INT NOT NULL, name VARCHAR(100) NOT NULL, descr VARCHAR(255) NOT NULL, perimeter_ids JSON NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_58CDB707C54C8C93 ON data_location_t (type_id)');
        $this->addSql('CREATE UNIQUE INDEX data_location_uniquekey_1_i ON data_location_t (name, type_id)');
        $this->addSql('CREATE TABLE interface_t (id INT NOT NULL, data_source_id INT NOT NULL, data_target_id INT NOT NULL, etl_id INT NOT NULL, name VARCHAR(255) NOT NULL, descr VARCHAR(1000) NOT NULL, perimeter_ids JSON NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_B6B8C7B41A935C57 ON interface_t (data_source_id)');
        $this->addSql('CREATE INDEX IDX_B6B8C7B49A214B50 ON interface_t (data_target_id)');
        $this->addSql('CREATE INDEX IDX_B6B8C7B4D592DDC ON interface_t (etl_id)');
        $this->addSql('CREATE UNIQUE INDEX interface_uniquekey_1_i ON interface_t (name, data_source_id, data_target_id)');
        $this->addSql('CREATE TABLE kpi_t (id INT NOT NULL, domain_id INT NOT NULL, category_id INT NOT NULL, role_id INT NOT NULL, ref VARCHAR(100) NOT NULL, name VARCHAR(255) NOT NULL, descr VARCHAR(1000) NOT NULL, goal VARCHAR(1000) NOT NULL, start_date DATE NOT NULL, end_date DATE DEFAULT NULL, perimeter_ids JSON NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6EB215CC146F3EA3 ON kpi_t (ref)');
        $this->addSql('CREATE INDEX IDX_6EB215CC115F0EE5 ON kpi_t (domain_id)');
        $this->addSql('CREATE INDEX IDX_6EB215CC12469DE2 ON kpi_t (category_id)');
        $this->addSql('CREATE INDEX IDX_6EB215CCD60322AC ON kpi_t (role_id)');
        $this->addSql('CREATE TABLE kpi_version_t (id INT NOT NULL, kpi_id INT NOT NULL, unit_id INT NOT NULL, frequency_id INT NOT NULL, organism_id INT DEFAULT NULL, version DOUBLE PRECISION NOT NULL, start_date DATE NOT NULL, end_date DATE DEFAULT NULL, calc_descr VARCHAR(1000) NOT NULL, criticity INT NOT NULL, penalty INT DEFAULT NULL, accuracy DOUBLE PRECISION NOT NULL, ext_ref VARCHAR(100) DEFAULT NULL, doc_url VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_93149DE3F50D1A5E ON kpi_version_t (kpi_id)');
        $this->addSql('CREATE INDEX IDX_93149DE3F8BD700D ON kpi_version_t (unit_id)');
        $this->addSql('CREATE INDEX IDX_93149DE394879022 ON kpi_version_t (frequency_id)');
        $this->addSql('CREATE INDEX IDX_93149DE364180A36 ON kpi_version_t (organism_id)');
        $this->addSql('CREATE UNIQUE INDEX kpi_version_uniquekey_1_i ON kpi_version_t (kpi_id, version)');
        $this->addSql('CREATE TABLE parameter_t (id INT NOT NULL, type VARCHAR(100) NOT NULL, code VARCHAR(100) NOT NULL, name VARCHAR(100) NOT NULL, descr VARCHAR(255) DEFAULT NULL, symbol VARCHAR(50) DEFAULT NULL, picture_url VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E6587D5577153098 ON parameter_t (code)');
        $this->addSql('CREATE TABLE "people_t" (id INT NOT NULL, email VARCHAR(100) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, start_date DATE NOT NULL, end_date DATE DEFAULT NULL, is_user BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_452BC535E7927C74 ON "people_t" (email)');
        $this->addSql('CREATE TABLE perimeter_t (id INT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3C56C69A5E237E06 ON perimeter_t (name)');
        $this->addSql('CREATE TABLE publish_t (id INT NOT NULL, report_id INT NOT NULL, frequency_id INT NOT NULL, first_release_of_month DATE NOT NULL, start_date DATE NOT NULL, end_date DATE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5022AE0A4BD2A4C0 ON publish_t (report_id)');
        $this->addSql('CREATE INDEX IDX_5022AE0A94879022 ON publish_t (frequency_id)');
        $this->addSql('CREATE TABLE report_t (id INT NOT NULL, type_id INT NOT NULL, bi_tool_id INT NOT NULL, code VARCHAR(50) NOT NULL, name VARCHAR(255) NOT NULL, descr VARCHAR(1000) DEFAULT NULL, path VARCHAR(255) NOT NULL, data_location_ids TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BA1C9BBE77153098 ON report_t (code)');
        $this->addSql('CREATE INDEX IDX_BA1C9BBEC54C8C93 ON report_t (type_id)');
        $this->addSql('CREATE INDEX IDX_BA1C9BBE5849971C ON report_t (bi_tool_id)');
        $this->addSql('COMMENT ON COLUMN report_t.data_location_ids IS \'(DC2Type:array)\'');
        $this->addSql('CREATE TABLE user_right_t (id INT NOT NULL, people_id INT NOT NULL, perimeter_id INT NOT NULL, start_date DATE NOT NULL, end_date DATE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_7D5E1E673147C936 ON user_right_t (people_id)');
        $this->addSql('CREATE INDEX IDX_7D5E1E6777570A4C ON user_right_t (perimeter_id)');
        $this->addSql('CREATE UNIQUE INDEX user_right_uniquekey_1_i ON user_right_t (people_id, perimeter_id)');
        $this->addSql('CREATE TABLE user_t (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6599E87FE7927C74 ON user_t (email)');
        $this->addSql('CREATE TABLE warning_t (id INT NOT NULL, frequency_id INT NOT NULL, publish_id INT DEFAULT NULL, report_id INT DEFAULT NULL, kpi_id INT DEFAULT NULL, code VARCHAR(100) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_4F8B09A894879022 ON warning_t (frequency_id)');
        $this->addSql('CREATE INDEX IDX_4F8B09A88734ED60 ON warning_t (publish_id)');
        $this->addSql('CREATE INDEX IDX_4F8B09A84BD2A4C0 ON warning_t (report_id)');
        $this->addSql('CREATE INDEX IDX_4F8B09A8F50D1A5E ON warning_t (kpi_id)');
        $this->addSql('CREATE TABLE messenger_messages (id BIGSERIAL NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('CREATE OR REPLACE FUNCTION notify_messenger_messages() RETURNS TRIGGER AS $$
            BEGIN
                PERFORM pg_notify(\'messenger_messages\', NEW.queue_name::text);
                RETURN NEW;
            END;
        $$ LANGUAGE plpgsql;');
        $this->addSql('DROP TRIGGER IF EXISTS notify_trigger ON messenger_messages;');
        $this->addSql('CREATE TRIGGER notify_trigger AFTER INSERT OR UPDATE ON messenger_messages FOR EACH ROW EXECUTE PROCEDURE notify_messenger_messages();');
        $this->addSql('ALTER TABLE contact_t ADD CONSTRAINT FK_756451953147C936 FOREIGN KEY (people_id) REFERENCES "people_t" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE contact_t ADD CONSTRAINT FK_756451957E3C61F9 FOREIGN KEY (owner_id) REFERENCES "people_t" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE contact_t ADD CONSTRAINT FK_7564519595F32B47 FOREIGN KEY (data_kpi_id) REFERENCES kpi_t (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE contact_t ADD CONSTRAINT FK_756451954BD2A4C0 FOREIGN KEY (report_id) REFERENCES report_t (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE contact_t ADD CONSTRAINT FK_75645195F98D7EC4 FOREIGN KEY (data_location_id) REFERENCES data_location_t (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE data_location_t ADD CONSTRAINT FK_58CDB707C54C8C93 FOREIGN KEY (type_id) REFERENCES parameter_t (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE interface_t ADD CONSTRAINT FK_B6B8C7B41A935C57 FOREIGN KEY (data_source_id) REFERENCES data_location_t (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE interface_t ADD CONSTRAINT FK_B6B8C7B49A214B50 FOREIGN KEY (data_target_id) REFERENCES data_location_t (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE interface_t ADD CONSTRAINT FK_B6B8C7B4D592DDC FOREIGN KEY (etl_id) REFERENCES parameter_t (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE kpi_t ADD CONSTRAINT FK_6EB215CC115F0EE5 FOREIGN KEY (domain_id) REFERENCES parameter_t (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE kpi_t ADD CONSTRAINT FK_6EB215CC12469DE2 FOREIGN KEY (category_id) REFERENCES parameter_t (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE kpi_t ADD CONSTRAINT FK_6EB215CCD60322AC FOREIGN KEY (role_id) REFERENCES parameter_t (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE kpi_version_t ADD CONSTRAINT FK_93149DE3F50D1A5E FOREIGN KEY (kpi_id) REFERENCES kpi_t (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE kpi_version_t ADD CONSTRAINT FK_93149DE3F8BD700D FOREIGN KEY (unit_id) REFERENCES parameter_t (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE kpi_version_t ADD CONSTRAINT FK_93149DE394879022 FOREIGN KEY (frequency_id) REFERENCES parameter_t (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE kpi_version_t ADD CONSTRAINT FK_93149DE364180A36 FOREIGN KEY (organism_id) REFERENCES parameter_t (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE publish_t ADD CONSTRAINT FK_5022AE0A4BD2A4C0 FOREIGN KEY (report_id) REFERENCES report_t (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE publish_t ADD CONSTRAINT FK_5022AE0A94879022 FOREIGN KEY (frequency_id) REFERENCES parameter_t (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE report_t ADD CONSTRAINT FK_BA1C9BBEC54C8C93 FOREIGN KEY (type_id) REFERENCES parameter_t (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE report_t ADD CONSTRAINT FK_BA1C9BBE5849971C FOREIGN KEY (bi_tool_id) REFERENCES parameter_t (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_right_t ADD CONSTRAINT FK_7D5E1E673147C936 FOREIGN KEY (people_id) REFERENCES "people_t" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_right_t ADD CONSTRAINT FK_7D5E1E6777570A4C FOREIGN KEY (perimeter_id) REFERENCES perimeter_t (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE warning_t ADD CONSTRAINT FK_4F8B09A894879022 FOREIGN KEY (frequency_id) REFERENCES parameter_t (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE warning_t ADD CONSTRAINT FK_4F8B09A88734ED60 FOREIGN KEY (publish_id) REFERENCES publish_t (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE warning_t ADD CONSTRAINT FK_4F8B09A84BD2A4C0 FOREIGN KEY (report_id) REFERENCES report_t (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE warning_t ADD CONSTRAINT FK_4F8B09A8F50D1A5E FOREIGN KEY (kpi_id) REFERENCES kpi_t (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE contact_t DROP CONSTRAINT FK_75645195F98D7EC4');
        $this->addSql('ALTER TABLE interface_t DROP CONSTRAINT FK_B6B8C7B41A935C57');
        $this->addSql('ALTER TABLE interface_t DROP CONSTRAINT FK_B6B8C7B49A214B50');
        $this->addSql('ALTER TABLE contact_t DROP CONSTRAINT FK_7564519595F32B47');
        $this->addSql('ALTER TABLE kpi_version_t DROP CONSTRAINT FK_93149DE3F50D1A5E');
        $this->addSql('ALTER TABLE warning_t DROP CONSTRAINT FK_4F8B09A8F50D1A5E');
        $this->addSql('ALTER TABLE data_location_t DROP CONSTRAINT FK_58CDB707C54C8C93');
        $this->addSql('ALTER TABLE interface_t DROP CONSTRAINT FK_B6B8C7B4D592DDC');
        $this->addSql('ALTER TABLE kpi_t DROP CONSTRAINT FK_6EB215CC115F0EE5');
        $this->addSql('ALTER TABLE kpi_t DROP CONSTRAINT FK_6EB215CC12469DE2');
        $this->addSql('ALTER TABLE kpi_t DROP CONSTRAINT FK_6EB215CCD60322AC');
        $this->addSql('ALTER TABLE kpi_version_t DROP CONSTRAINT FK_93149DE3F8BD700D');
        $this->addSql('ALTER TABLE kpi_version_t DROP CONSTRAINT FK_93149DE394879022');
        $this->addSql('ALTER TABLE kpi_version_t DROP CONSTRAINT FK_93149DE364180A36');
        $this->addSql('ALTER TABLE publish_t DROP CONSTRAINT FK_5022AE0A94879022');
        $this->addSql('ALTER TABLE report_t DROP CONSTRAINT FK_BA1C9BBEC54C8C93');
        $this->addSql('ALTER TABLE report_t DROP CONSTRAINT FK_BA1C9BBE5849971C');
        $this->addSql('ALTER TABLE warning_t DROP CONSTRAINT FK_4F8B09A894879022');
        $this->addSql('ALTER TABLE contact_t DROP CONSTRAINT FK_756451953147C936');
        $this->addSql('ALTER TABLE contact_t DROP CONSTRAINT FK_756451957E3C61F9');
        $this->addSql('ALTER TABLE user_right_t DROP CONSTRAINT FK_7D5E1E673147C936');
        $this->addSql('ALTER TABLE user_right_t DROP CONSTRAINT FK_7D5E1E6777570A4C');
        $this->addSql('ALTER TABLE warning_t DROP CONSTRAINT FK_4F8B09A88734ED60');
        $this->addSql('ALTER TABLE contact_t DROP CONSTRAINT FK_756451954BD2A4C0');
        $this->addSql('ALTER TABLE publish_t DROP CONSTRAINT FK_5022AE0A4BD2A4C0');
        $this->addSql('ALTER TABLE warning_t DROP CONSTRAINT FK_4F8B09A84BD2A4C0');
        $this->addSql('DROP SEQUENCE contact_t_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE data_location_t_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE interface_t_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE kpi_t_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE kpi_version_t_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE parameter_t_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "people_t_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE perimeter_t_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE publish_t_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE report_t_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE user_right_t_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE user_t_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE warning_t_id_seq CASCADE');
        $this->addSql('DROP TABLE contact_t');
        $this->addSql('DROP TABLE data_location_t');
        $this->addSql('DROP TABLE interface_t');
        $this->addSql('DROP TABLE kpi_t');
        $this->addSql('DROP TABLE kpi_version_t');
        $this->addSql('DROP TABLE parameter_t');
        $this->addSql('DROP TABLE "people_t"');
        $this->addSql('DROP TABLE perimeter_t');
        $this->addSql('DROP TABLE publish_t');
        $this->addSql('DROP TABLE report_t');
        $this->addSql('DROP TABLE user_right_t');
        $this->addSql('DROP TABLE user_t');
        $this->addSql('DROP TABLE warning_t');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
