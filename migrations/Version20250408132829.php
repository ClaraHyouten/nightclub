<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250408132829 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE dj (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE dj_party (dj_id INT NOT NULL, party_id INT NOT NULL, INDEX IDX_AC2A615C670B2DD5 (dj_id), INDEX IDX_AC2A615C213C1059 (party_id), PRIMARY KEY(dj_id, party_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE dj_party ADD CONSTRAINT FK_AC2A615C670B2DD5 FOREIGN KEY (dj_id) REFERENCES dj (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE dj_party ADD CONSTRAINT FK_AC2A615C213C1059 FOREIGN KEY (party_id) REFERENCES party (id) ON DELETE CASCADE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE dj_party DROP FOREIGN KEY FK_AC2A615C670B2DD5
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE dj_party DROP FOREIGN KEY FK_AC2A615C213C1059
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE dj
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE dj_party
        SQL);
    }
}
