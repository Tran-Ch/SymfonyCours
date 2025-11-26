<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251126105427 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE experience_spot (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experience_spot_comment (id INT AUTO_INCREMENT NOT NULL, spot_id INT NOT NULL, utilisateur_id INT NOT NULL, text LONGTEXT NOT NULL, date DATETIME NOT NULL, INDEX IDX_CD30C6CC2DF1D37C (spot_id), INDEX IDX_CD30C6CCFB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experience_spot_like (id INT AUTO_INCREMENT NOT NULL, spot_id INT NOT NULL, utilisateur_id INT NOT NULL, INDEX IDX_2DF158032DF1D37C (spot_id), INDEX IDX_2DF15803FB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE experience_spot_comment ADD CONSTRAINT FK_CD30C6CC2DF1D37C FOREIGN KEY (spot_id) REFERENCES experience_spot (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE experience_spot_comment ADD CONSTRAINT FK_CD30C6CCFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE experience_spot_like ADD CONSTRAINT FK_2DF158032DF1D37C FOREIGN KEY (spot_id) REFERENCES experience_spot (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE experience_spot_like ADD CONSTRAINT FK_2DF15803FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE experience_spot_comment DROP FOREIGN KEY FK_CD30C6CC2DF1D37C');
        $this->addSql('ALTER TABLE experience_spot_comment DROP FOREIGN KEY FK_CD30C6CCFB88E14F');
        $this->addSql('ALTER TABLE experience_spot_like DROP FOREIGN KEY FK_2DF158032DF1D37C');
        $this->addSql('ALTER TABLE experience_spot_like DROP FOREIGN KEY FK_2DF15803FB88E14F');
        $this->addSql('DROP TABLE experience_spot');
        $this->addSql('DROP TABLE experience_spot_comment');
        $this->addSql('DROP TABLE experience_spot_like');
    }
}
