<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230927113958 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE chiffre_affaire (id INT AUTO_INCREMENT NOT NULL, salon_id INT NOT NULL, janvier INT NOT NULL, fevrier INT NOT NULL, mars INT NOT NULL, avril INT NOT NULL, mai INT NOT NULL, juin INT NOT NULL, juillet INT NOT NULL, aout INT NOT NULL, INDEX IDX_A4614FF24C91BDE4 (salon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE chiffre_affaire ADD CONSTRAINT FK_A4614FF24C91BDE4 FOREIGN KEY (salon_id) REFERENCES salon (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chiffre_affaire DROP FOREIGN KEY FK_A4614FF24C91BDE4');
        $this->addSql('DROP TABLE chiffre_affaire');
    }
}
