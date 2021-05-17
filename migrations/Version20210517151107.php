<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210517151107 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE encherir_acheteur');
        $this->addSql('DROP TABLE encherir_lot');
        $this->addSql('ALTER TABLE encherir ADD id_acheteur_id INT DEFAULT NULL, ADD id_lot_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE encherir ADD CONSTRAINT FK_503B7C878EB576A8 FOREIGN KEY (id_acheteur_id) REFERENCES acheteur (id)');
        $this->addSql('ALTER TABLE encherir ADD CONSTRAINT FK_503B7C878EFC101A FOREIGN KEY (id_lot_id) REFERENCES lot (id)');
        $this->addSql('CREATE INDEX IDX_503B7C878EB576A8 ON encherir (id_acheteur_id)');
        $this->addSql('CREATE INDEX IDX_503B7C878EFC101A ON encherir (id_lot_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE encherir_acheteur (encherir_id INT NOT NULL, acheteur_id INT NOT NULL, INDEX IDX_41ABAAFBB0BA17BB (encherir_id), INDEX IDX_41ABAAFB96A7BB5F (acheteur_id), PRIMARY KEY(encherir_id, acheteur_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE encherir_lot (encherir_id INT NOT NULL, lot_id INT NOT NULL, INDEX IDX_3C56919BB0BA17BB (encherir_id), INDEX IDX_3C56919BA8CBA5F7 (lot_id), PRIMARY KEY(encherir_id, lot_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE encherir_acheteur ADD CONSTRAINT FK_41ABAAFB96A7BB5F FOREIGN KEY (acheteur_id) REFERENCES acheteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE encherir_acheteur ADD CONSTRAINT FK_41ABAAFBB0BA17BB FOREIGN KEY (encherir_id) REFERENCES encherir (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE encherir_lot ADD CONSTRAINT FK_3C56919BA8CBA5F7 FOREIGN KEY (lot_id) REFERENCES lot (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE encherir_lot ADD CONSTRAINT FK_3C56919BB0BA17BB FOREIGN KEY (encherir_id) REFERENCES encherir (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE encherir DROP FOREIGN KEY FK_503B7C878EB576A8');
        $this->addSql('ALTER TABLE encherir DROP FOREIGN KEY FK_503B7C878EFC101A');
        $this->addSql('DROP INDEX IDX_503B7C878EB576A8 ON encherir');
        $this->addSql('DROP INDEX IDX_503B7C878EFC101A ON encherir');
        $this->addSql('ALTER TABLE encherir DROP id_acheteur_id, DROP id_lot_id');
    }
}
