<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251126090655 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE story_like DROP FOREIGN KEY FK_3ACE2C9DAA5D4036');
        $this->addSql('ALTER TABLE story_like ADD utilisateur_id INT NOT NULL, CHANGE story_id story_id INT NOT NULL');
        $this->addSql('ALTER TABLE story_like ADD CONSTRAINT FK_3ACE2C9DFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE story_like ADD CONSTRAINT FK_3ACE2C9DAA5D4036 FOREIGN KEY (story_id) REFERENCES story (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_3ACE2C9DFB88E14F ON story_like (utilisateur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE story_like DROP FOREIGN KEY FK_3ACE2C9DFB88E14F');
        $this->addSql('ALTER TABLE story_like DROP FOREIGN KEY FK_3ACE2C9DAA5D4036');
        $this->addSql('DROP INDEX IDX_3ACE2C9DFB88E14F ON story_like');
        $this->addSql('ALTER TABLE story_like DROP utilisateur_id, CHANGE story_id story_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE story_like ADD CONSTRAINT FK_3ACE2C9DAA5D4036 FOREIGN KEY (story_id) REFERENCES story (id)');
    }
}
