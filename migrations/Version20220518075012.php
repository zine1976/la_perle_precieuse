<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220518075012 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande CHANGE commande_user_id commande_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D51D5A135 FOREIGN KEY (commande_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67D51D5A135 ON commande (commande_user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D51D5A135');
        $this->addSql('DROP INDEX IDX_6EEAA67D51D5A135 ON commande');
        $this->addSql('ALTER TABLE commande CHANGE commande_user_id commande_user_id INT NOT NULL');
    }
}
