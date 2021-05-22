<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210520224958 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE encherir DROP FOREIGN KEY FK_503B7C878EB576A8');
        $this->addSql('DROP INDEX IDX_503B7C878EB576A8 ON encherir');
        $this->addSql('ALTER TABLE encherir CHANGE id_acheteur_id id_personne_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE encherir ADD CONSTRAINT FK_503B7C87BA091CE5 FOREIGN KEY (id_personne_id) REFERENCES personne (id)');
        $this->addSql('CREATE INDEX IDX_503B7C87BA091CE5 ON encherir (id_personne_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE encherir DROP FOREIGN KEY FK_503B7C87BA091CE5');
        $this->addSql('DROP INDEX IDX_503B7C87BA091CE5 ON encherir');
        $this->addSql('ALTER TABLE encherir CHANGE id_personne_id id_acheteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE encherir ADD CONSTRAINT FK_503B7C878EB576A8 FOREIGN KEY (id_acheteur_id) REFERENCES acheteur (id)');
        $this->addSql('CREATE INDEX IDX_503B7C878EB576A8 ON encherir (id_acheteur_id)');
    }
}
