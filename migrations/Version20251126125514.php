<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251126125514 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE experience_spot ADD title VARCHAR(255) NOT NULL, ADD slug VARCHAR(255) NOT NULL, ADD region VARCHAR(20) NOT NULL, ADD category VARCHAR(20) NOT NULL, ADD short_description LONGTEXT NOT NULL, ADD image_filename VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_ED22B56E989D9B62 ON experience_spot (slug)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_ED22B56E989D9B62 ON experience_spot');
        $this->addSql('ALTER TABLE experience_spot DROP title, DROP slug, DROP region, DROP category, DROP short_description, DROP image_filename');
    }
}
