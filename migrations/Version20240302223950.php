<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240302223950 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE walkable_point (id INT AUTO_INCREMENT NOT NULL, map_id INT NOT NULL, x DOUBLE PRECISION NOT NULL, y DOUBLE PRECISION NOT NULL, z DOUBLE PRECISION NOT NULL, INDEX IDX_4DF4FDAD53C55F64 (map_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE walkable_segment (id INT AUTO_INCREMENT NOT NULL, map_id INT NOT NULL, x1 INT NOT NULL, y1 INT NOT NULL, z1 INT NOT NULL, x2 INT NOT NULL, y2 INT NOT NULL, z2 INT NOT NULL, INDEX IDX_1578013153C55F64 (map_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE walkable_point ADD CONSTRAINT FK_4DF4FDAD53C55F64 FOREIGN KEY (map_id) REFERENCES map (id)');
        $this->addSql('ALTER TABLE walkable_segment ADD CONSTRAINT FK_1578013153C55F64 FOREIGN KEY (map_id) REFERENCES map (id)');
        $this->addSql('ALTER TABLE walkable DROP FOREIGN KEY FK_43FBB79853C55F64');
        $this->addSql('DROP TABLE walkable');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE walkable (id INT AUTO_INCREMENT NOT NULL, map_id INT NOT NULL, x DOUBLE PRECISION NOT NULL, y DOUBLE PRECISION NOT NULL, z DOUBLE PRECISION NOT NULL, INDEX IDX_43FBB79853C55F64 (map_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE walkable ADD CONSTRAINT FK_43FBB79853C55F64 FOREIGN KEY (map_id) REFERENCES map (id)');
        $this->addSql('ALTER TABLE walkable_point DROP FOREIGN KEY FK_4DF4FDAD53C55F64');
        $this->addSql('ALTER TABLE walkable_segment DROP FOREIGN KEY FK_1578013153C55F64');
        $this->addSql('DROP TABLE walkable_point');
        $this->addSql('DROP TABLE walkable_segment');
    }
}
