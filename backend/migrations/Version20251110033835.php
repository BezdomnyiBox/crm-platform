<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251110033835 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE attribute (id UUID NOT NULL, entity_type_id UUID DEFAULT NULL, name VARCHAR(255) NOT NULL, data_type VARCHAR(50) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_FA7AEFFB5681BEB0 ON attribute (entity_type_id)');
        $this->addSql('CREATE TABLE entity_type (id UUID NOT NULL, organization_id UUID DEFAULT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C412EE0232C8A3DE ON entity_type (organization_id)');
        $this->addSql('CREATE TABLE organization (id UUID NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE attribute ADD CONSTRAINT FK_FA7AEFFB5681BEB0 FOREIGN KEY (entity_type_id) REFERENCES entity_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE entity_type ADD CONSTRAINT FK_C412EE0232C8A3DE FOREIGN KEY (organization_id) REFERENCES organization (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE attribute DROP CONSTRAINT FK_FA7AEFFB5681BEB0');
        $this->addSql('ALTER TABLE entity_type DROP CONSTRAINT FK_C412EE0232C8A3DE');
        $this->addSql('DROP TABLE attribute');
        $this->addSql('DROP TABLE entity_type');
        $this->addSql('DROP TABLE organization');
    }
}
