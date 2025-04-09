<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250408144502 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE material (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, quantity INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE materiel_soiree (id INT AUTO_INCREMENT NOT NULL, materiel_id INT NOT NULL, party_id INT NOT NULL, booking_date DATETIME NOT NULL, INDEX IDX_DFC1EAE516880AAF (materiel_id), INDEX IDX_DFC1EAE5213C1059 (party_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE materiel_soiree ADD CONSTRAINT FK_DFC1EAE516880AAF FOREIGN KEY (materiel_id) REFERENCES material (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE materiel_soiree ADD CONSTRAINT FK_DFC1EAE5213C1059 FOREIGN KEY (party_id) REFERENCES party (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE materiel_soiree DROP FOREIGN KEY FK_DFC1EAE516880AAF
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE materiel_soiree DROP FOREIGN KEY FK_DFC1EAE5213C1059
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE material
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE materiel_soiree
        SQL);
    }
}
