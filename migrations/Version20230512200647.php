<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230512200647 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE film (id INT AUTO_INCREMENT NOT NULL, societe_de_production_id INT NOT NULL, titre VARCHAR(25) NOT NULL, photo VARCHAR(255) NOT NULL, genre VARCHAR(25) NOT NULL, langue VARCHAR(20) NOT NULL, type_de_tournage VARCHAR(30) NOT NULL, INDEX IDX_8244BE229B51D59C (societe_de_production_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE film_realisateur (film_id INT NOT NULL, realisateur_id INT NOT NULL, INDEX IDX_3F2B13F1567F5183 (film_id), INDEX IDX_3F2B13F1F1D8422E (realisateur_id), PRIMARY KEY(film_id, realisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lieu (id INT AUTO_INCREMENT NOT NULL, localisation_de_scene VARCHAR(40) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE realisateur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(30) NOT NULL, prenom VARCHAR(30) NOT NULL, nationalite VARCHAR(30) NOT NULL, photo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE societe_de_production (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(30) NOT NULL, adresse VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tournage (id INT AUTO_INCREMENT NOT NULL, film_id INT NOT NULL, lieu_id INT NOT NULL, date_debut VARCHAR(20) NOT NULL, date_fin VARCHAR(20) NOT NULL, INDEX IDX_6DB31A42567F5183 (film_id), INDEX IDX_6DB31A426AB213CC (lieu_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE film ADD CONSTRAINT FK_8244BE229B51D59C FOREIGN KEY (societe_de_production_id) REFERENCES societe_de_production (id)');
        $this->addSql('ALTER TABLE film_realisateur ADD CONSTRAINT FK_3F2B13F1567F5183 FOREIGN KEY (film_id) REFERENCES film (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE film_realisateur ADD CONSTRAINT FK_3F2B13F1F1D8422E FOREIGN KEY (realisateur_id) REFERENCES realisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tournage ADD CONSTRAINT FK_6DB31A42567F5183 FOREIGN KEY (film_id) REFERENCES film (id)');
        $this->addSql('ALTER TABLE tournage ADD CONSTRAINT FK_6DB31A426AB213CC FOREIGN KEY (lieu_id) REFERENCES lieu (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE film DROP FOREIGN KEY FK_8244BE229B51D59C');
        $this->addSql('ALTER TABLE film_realisateur DROP FOREIGN KEY FK_3F2B13F1567F5183');
        $this->addSql('ALTER TABLE film_realisateur DROP FOREIGN KEY FK_3F2B13F1F1D8422E');
        $this->addSql('ALTER TABLE tournage DROP FOREIGN KEY FK_6DB31A42567F5183');
        $this->addSql('ALTER TABLE tournage DROP FOREIGN KEY FK_6DB31A426AB213CC');
        $this->addSql('DROP TABLE film');
        $this->addSql('DROP TABLE film_realisateur');
        $this->addSql('DROP TABLE lieu');
        $this->addSql('DROP TABLE realisateur');
        $this->addSql('DROP TABLE societe_de_production');
        $this->addSql('DROP TABLE tournage');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
