<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240331140916 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categorie CHANGE espaceCouvert espaceCouvert TINYINT(1) NOT NULL, CHANGE espaceEnfants espaceEnfants TINYINT(1) NOT NULL, CHANGE espaceFumeur espaceFumeur TINYINT(1) NOT NULL, CHANGE serviceRestauration serviceRestauration TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE espacepartenaire DROP FOREIGN KEY espacepartenaire_ibfk_1');
        $this->addSql('ALTER TABLE espacepartenaire CHANGE accepted accepted TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE espacepartenaire ADD CONSTRAINT FK_2EB25408C9486A13 FOREIGN KEY (id_categorie) REFERENCES categorie (id_categorie)');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY evenement_ibfk_1');
        $this->addSql('ALTER TABLE evenement CHANGE id_espace id_espace INT DEFAULT NULL');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681E209CBC80 FOREIGN KEY (id_espace) REFERENCES espacepartenaire (id_espace)');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY panier_ibfk_1');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY panier_ibfk_2');
        $this->addSql('ALTER TABLE panier CHANGE id_user id_user INT DEFAULT NULL, CHANGE id_article id_article INT DEFAULT NULL');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF26B3CA4B FOREIGN KEY (id_user) REFERENCES user (Id_user)');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF2DCA7A716 FOREIGN KEY (id_article) REFERENCES articles (id)');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY reclamation_ibfk_1');
        $this->addSql('ALTER TABLE reclamation CHANGE id_user id_user INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE6064046B3CA4B FOREIGN KEY (id_user) REFERENCES user (Id_user)');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY reponse_ibfk_1');
        $this->addSql('ALTER TABLE reponse CHANGE id_reclamation id_reclamation INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC7D672A9F3 FOREIGN KEY (id_reclamation) REFERENCES reclamation (id_reclamation)');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY reservation_ibfk_2');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY reservation_ibfk_1');
        $this->addSql('ALTER TABLE reservation CHANGE id_user id_user INT DEFAULT NULL, CHANGE id_event id_event INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955D52B4B97 FOREIGN KEY (id_event) REFERENCES evenement (id_event)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849556B3CA4B FOREIGN KEY (id_user) REFERENCES user (Id_user)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE categorie CHANGE espaceCouvert espaceCouvert TINYINT(1) DEFAULT 0 NOT NULL, CHANGE espaceEnfants espaceEnfants TINYINT(1) DEFAULT 0 NOT NULL, CHANGE espaceFumeur espaceFumeur TINYINT(1) DEFAULT 0 NOT NULL, CHANGE serviceRestauration serviceRestauration TINYINT(1) DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE espacepartenaire DROP FOREIGN KEY FK_2EB25408C9486A13');
        $this->addSql('ALTER TABLE espacepartenaire CHANGE accepted accepted TINYINT(1) DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE espacepartenaire ADD CONSTRAINT espacepartenaire_ibfk_1 FOREIGN KEY (id_categorie) REFERENCES categorie (id_categorie) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681E209CBC80');
        $this->addSql('ALTER TABLE evenement CHANGE id_espace id_espace INT NOT NULL');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT evenement_ibfk_1 FOREIGN KEY (id_espace) REFERENCES espacepartenaire (id_espace) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF26B3CA4B');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF2DCA7A716');
        $this->addSql('ALTER TABLE panier CHANGE id_user id_user INT NOT NULL, CHANGE id_article id_article INT NOT NULL');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT panier_ibfk_1 FOREIGN KEY (id_user) REFERENCES user (Id_user) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT panier_ibfk_2 FOREIGN KEY (id_article) REFERENCES articles (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE6064046B3CA4B');
        $this->addSql('ALTER TABLE reclamation CHANGE id_user id_user INT NOT NULL');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT reclamation_ibfk_1 FOREIGN KEY (id_user) REFERENCES user (Id_user) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC7D672A9F3');
        $this->addSql('ALTER TABLE reponse CHANGE id_reclamation id_reclamation INT NOT NULL');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT reponse_ibfk_1 FOREIGN KEY (id_reclamation) REFERENCES reclamation (id_reclamation) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955D52B4B97');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849556B3CA4B');
        $this->addSql('ALTER TABLE reservation CHANGE id_event id_event INT NOT NULL, CHANGE id_user id_user INT NOT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT reservation_ibfk_2 FOREIGN KEY (id_event) REFERENCES evenement (id_event) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT reservation_ibfk_1 FOREIGN KEY (id_user) REFERENCES user (Id_user) ON UPDATE CASCADE ON DELETE CASCADE');
    }
}
