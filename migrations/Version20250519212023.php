<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250519212023 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE besoin (id INT AUTO_INCREMENT NOT NULL, groupe_id INT DEFAULT NULL, date DATE NOT NULL, plage VARCHAR(255) NOT NULL, nb_personnes NUMERIC(10, 0) NOT NULL, INDEX IDX_8118E8117A45358C (groupe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE disponibilite (id INT AUTO_INCREMENT NOT NULL, personnel_id INT DEFAULT NULL, jour_semaine VARCHAR(255) NOT NULL, plage VARCHAR(255) NOT NULL, dispo TINYINT(1) NOT NULL, INDEX IDX_2CBACE2F1C109075 (personnel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE groupe (id INT AUTO_INCREMENT NOT NULL, structure_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_4B98C212534008B (structure_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE indisponibilite (id INT AUTO_INCREMENT NOT NULL, personnel_id INT DEFAULT NULL, date DATE NOT NULL, plage VARCHAR(255) NOT NULL, raison LONGTEXT DEFAULT NULL, INDEX IDX_8717036F1C109075 (personnel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE personnel (id INT AUTO_INCREMENT NOT NULL, groupe_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, age INT NOT NULL, heures_mensuelles INT NOT NULL, statut VARCHAR(20) NOT NULL, type_contrat VARCHAR(255) NOT NULL, INDEX IDX_A6BCF3DE7A45358C (groupe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE planning (id INT AUTO_INCREMENT NOT NULL, personnel_id INT DEFAULT NULL, date DATE NOT NULL, plage VARCHAR(255) NOT NULL, source VARCHAR(255) NOT NULL, INDEX IDX_D499BFF61C109075 (personnel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE structure (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', available_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', delivered_at DATETIME DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE besoin ADD CONSTRAINT FK_8118E8117A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE disponibilite ADD CONSTRAINT FK_2CBACE2F1C109075 FOREIGN KEY (personnel_id) REFERENCES personnel (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE groupe ADD CONSTRAINT FK_4B98C212534008B FOREIGN KEY (structure_id) REFERENCES structure (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE indisponibilite ADD CONSTRAINT FK_8717036F1C109075 FOREIGN KEY (personnel_id) REFERENCES personnel (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE personnel ADD CONSTRAINT FK_A6BCF3DE7A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE planning ADD CONSTRAINT FK_D499BFF61C109075 FOREIGN KEY (personnel_id) REFERENCES personnel (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE besoin DROP FOREIGN KEY FK_8118E8117A45358C
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE disponibilite DROP FOREIGN KEY FK_2CBACE2F1C109075
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE groupe DROP FOREIGN KEY FK_4B98C212534008B
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE indisponibilite DROP FOREIGN KEY FK_8717036F1C109075
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE personnel DROP FOREIGN KEY FK_A6BCF3DE7A45358C
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE planning DROP FOREIGN KEY FK_D499BFF61C109075
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE besoin
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE disponibilite
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE groupe
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE indisponibilite
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE personnel
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE planning
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE structure
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE messenger_messages
        SQL);
    }
}
