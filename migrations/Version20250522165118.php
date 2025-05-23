<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250522165118 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE personnel ADD email VARCHAR(255) NOT NULL, ADD password VARCHAR(255) NOT NULL, ADD roles JSON NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_A6BCF3DEE7927C74 ON personnel (email)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            DROP INDEX UNIQ_A6BCF3DEE7927C74 ON personnel
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE personnel DROP email, DROP password, DROP roles
        SQL);
    }
}
