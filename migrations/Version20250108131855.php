<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250108131855 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cours ADD matiere_id INT NOT NULL');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9CF46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id)');
        $this->addSql('CREATE INDEX IDX_FDCA8C9CF46CD258 ON cours (matiere_id)');
        $this->addSql('ALTER TABLE ressource ADD cours_id INT NOT NULL');
        $this->addSql('ALTER TABLE ressource ADD CONSTRAINT FK_939F45447ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id)');
        $this->addSql('CREATE INDEX IDX_939F45447ECF78B0 ON ressource (cours_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9CF46CD258');
        $this->addSql('DROP INDEX IDX_FDCA8C9CF46CD258 ON cours');
        $this->addSql('ALTER TABLE cours DROP matiere_id');
        $this->addSql('ALTER TABLE ressource DROP FOREIGN KEY FK_939F45447ECF78B0');
        $this->addSql('DROP INDEX IDX_939F45447ECF78B0 ON ressource');
        $this->addSql('ALTER TABLE ressource DROP cours_id');
    }
}
