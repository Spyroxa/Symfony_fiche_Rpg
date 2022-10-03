<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221001134032 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personnage_competences_personnage DROP FOREIGN KEY FK_9855AD975E315342');
        $this->addSql('ALTER TABLE personnage_competences_personnage DROP FOREIGN KEY FK_9855AD97BF89024');
        $this->addSql('DROP TABLE competences_personnage');
        $this->addSql('DROP TABLE personnage_competences_personnage');
        $this->addSql('ALTER TABLE personnage ADD forces INT NOT NULL, ADD intelligence INT NOT NULL, ADD endurance INT NOT NULL, ADD magie INT NOT NULL, ADD agilite INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE competences_personnage (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE personnage_competences_personnage (personnage_id INT NOT NULL, competences_personnage_id INT NOT NULL, INDEX IDX_9855AD97BF89024 (competences_personnage_id), INDEX IDX_9855AD975E315342 (personnage_id), PRIMARY KEY(personnage_id, competences_personnage_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE personnage_competences_personnage ADD CONSTRAINT FK_9855AD975E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnage_competences_personnage ADD CONSTRAINT FK_9855AD97BF89024 FOREIGN KEY (competences_personnage_id) REFERENCES competences_personnage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnage DROP forces, DROP intelligence, DROP endurance, DROP magie, DROP agilite');
    }
}
