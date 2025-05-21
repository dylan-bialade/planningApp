<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20250521161007 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Ajout de la colonne groupe_id à la table planning';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(<<<'SQL'
            ALTER TABLE planning ADD groupe_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE planning ADD CONSTRAINT FK_D499BFF67A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_D499BFF67A45358C ON planning (groupe_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        $this->addSql(<<<'SQL'
            ALTER TABLE planning DROP FOREIGN KEY FK_D499BFF67A45358C
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_D499BFF67A45358C ON planning
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE planning DROP groupe_id
        SQL);
    }
}
