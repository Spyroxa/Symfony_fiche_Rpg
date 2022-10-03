<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220926135726 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE competences_personnage (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnage (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, nom VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, description LONGTEXT NOT NULL, niveau INT NOT NULL, experience INT NOT NULL, vie INT NOT NULL, INDEX IDX_6AEA486DC54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnage_competences_personnage (personnage_id INT NOT NULL, competences_personnage_id INT NOT NULL, INDEX IDX_9855AD975E315342 (personnage_id), INDEX IDX_9855AD97BF89024 (competences_personnage_id), PRIMARY KEY(personnage_id, competences_personnage_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_personnage (id INT AUTO_INCREMENT NOT NULL, classe VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE personnage ADD CONSTRAINT FK_6AEA486DC54C8C93 FOREIGN KEY (type_id) REFERENCES type_personnage (id)');
        $this->addSql('ALTER TABLE personnage_competences_personnage ADD CONSTRAINT FK_9855AD975E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnage_competences_personnage ADD CONSTRAINT FK_9855AD97BF89024 FOREIGN KEY (competences_personnage_id) REFERENCES competences_personnage (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personnage DROP FOREIGN KEY FK_6AEA486DC54C8C93');
        $this->addSql('ALTER TABLE personnage_competences_personnage DROP FOREIGN KEY FK_9855AD975E315342');
        $this->addSql('ALTER TABLE personnage_competences_personnage DROP FOREIGN KEY FK_9855AD97BF89024');
        $this->addSql('DROP TABLE competences_personnage');
        $this->addSql('DROP TABLE personnage');
        $this->addSql('DROP TABLE personnage_competences_personnage');
        $this->addSql('DROP TABLE type_personnage');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
