<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250528124735 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE etat (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE suivi_planning (id INT AUTO_INCREMENT NOT NULL, planning_id INT DEFAULT NULL, etat_id INT DEFAULT NULL, date DATETIME NOT NULL, INDEX IDX_72A02F653D865311 (planning_id), INDEX IDX_72A02F65D5E86FF (etat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE suivi_planning ADD CONSTRAINT FK_72A02F653D865311 FOREIGN KEY (planning_id) REFERENCES planning (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE suivi_planning ADD CONSTRAINT FK_72A02F65D5E86FF FOREIGN KEY (etat_id) REFERENCES etat (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE groupe ADD responsable_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE groupe ADD CONSTRAINT FK_4B98C2153C59D72 FOREIGN KEY (responsable_id) REFERENCES personnel (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_4B98C2153C59D72 ON groupe (responsable_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE personnel CHANGE roles roles JSON DEFAULT '[]' NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_A6BCF3DEE7927C74 ON personnel (email)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE suivi_planning DROP FOREIGN KEY FK_72A02F653D865311
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE suivi_planning DROP FOREIGN KEY FK_72A02F65D5E86FF
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE etat
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE suivi_planning
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE groupe DROP FOREIGN KEY FK_4B98C2153C59D72
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX UNIQ_4B98C2153C59D72 ON groupe
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE groupe DROP responsable_id
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX UNIQ_A6BCF3DEE7927C74 ON personnel
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE personnel CHANGE roles roles JSON NOT NULL
        SQL);
    }
}
