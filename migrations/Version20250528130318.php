<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250528130318 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE etat CHANGE libelle libelle VARCHAR(50) NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE personnel CHANGE roles roles JSON DEFAULT '[]' NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_A6BCF3DEE7927C74 ON personnel (email)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE suivi_planning CHANGE date date_changement DATETIME NOT NULL
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE etat CHANGE libelle libelle VARCHAR(100) NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX UNIQ_A6BCF3DEE7927C74 ON personnel
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE personnel CHANGE roles roles JSON NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE suivi_planning CHANGE date_changement date DATETIME NOT NULL
        SQL);
    }
}
