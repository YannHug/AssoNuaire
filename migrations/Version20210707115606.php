<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210707115606 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE accessibility (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE accessibility_association (accessibility_id INT NOT NULL, association_id INT NOT NULL, INDEX IDX_759A068B8FEE2CA0 (accessibility_id), INDEX IDX_759A068BEFB9C8A5 (association_id), PRIMARY KEY(accessibility_id, association_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activity (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activity_association (activity_id INT NOT NULL, association_id INT NOT NULL, INDEX IDX_F30B4BC081C06096 (activity_id), INDEX IDX_F30B4BC0EFB9C8A5 (association_id), PRIMARY KEY(activity_id, association_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE association (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, information LONGTEXT DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, address VARCHAR(255) NOT NULL, postal_code VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, phone_number VARCHAR(255) DEFAULT NULL, latitude VARCHAR(255) DEFAULT NULL, longitude VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE audience (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE audience_association (audience_id INT NOT NULL, association_id INT NOT NULL, INDEX IDX_2A1A2B3A848CC616 (audience_id), INDEX IDX_2A1A2B3AEFB9C8A5 (association_id), PRIMARY KEY(audience_id, association_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE picture (id INT AUTO_INCREMENT NOT NULL, associations_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_16DB4F894122538A (associations_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE thematic (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE thematic_association (thematic_id INT NOT NULL, association_id INT NOT NULL, INDEX IDX_DCEBC1832395FCED (thematic_id), INDEX IDX_DCEBC183EFB9C8A5 (association_id), PRIMARY KEY(thematic_id, association_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE accessibility_association ADD CONSTRAINT FK_759A068B8FEE2CA0 FOREIGN KEY (accessibility_id) REFERENCES accessibility (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accessibility_association ADD CONSTRAINT FK_759A068BEFB9C8A5 FOREIGN KEY (association_id) REFERENCES association (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activity_association ADD CONSTRAINT FK_F30B4BC081C06096 FOREIGN KEY (activity_id) REFERENCES activity (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activity_association ADD CONSTRAINT FK_F30B4BC0EFB9C8A5 FOREIGN KEY (association_id) REFERENCES association (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE audience_association ADD CONSTRAINT FK_2A1A2B3A848CC616 FOREIGN KEY (audience_id) REFERENCES audience (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE audience_association ADD CONSTRAINT FK_2A1A2B3AEFB9C8A5 FOREIGN KEY (association_id) REFERENCES association (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F894122538A FOREIGN KEY (associations_id) REFERENCES association (id)');
        $this->addSql('ALTER TABLE thematic_association ADD CONSTRAINT FK_DCEBC1832395FCED FOREIGN KEY (thematic_id) REFERENCES thematic (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE thematic_association ADD CONSTRAINT FK_DCEBC183EFB9C8A5 FOREIGN KEY (association_id) REFERENCES association (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE accessibility_association DROP FOREIGN KEY FK_759A068B8FEE2CA0');
        $this->addSql('ALTER TABLE activity_association DROP FOREIGN KEY FK_F30B4BC081C06096');
        $this->addSql('ALTER TABLE accessibility_association DROP FOREIGN KEY FK_759A068BEFB9C8A5');
        $this->addSql('ALTER TABLE activity_association DROP FOREIGN KEY FK_F30B4BC0EFB9C8A5');
        $this->addSql('ALTER TABLE audience_association DROP FOREIGN KEY FK_2A1A2B3AEFB9C8A5');
        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F894122538A');
        $this->addSql('ALTER TABLE thematic_association DROP FOREIGN KEY FK_DCEBC183EFB9C8A5');
        $this->addSql('ALTER TABLE audience_association DROP FOREIGN KEY FK_2A1A2B3A848CC616');
        $this->addSql('ALTER TABLE thematic_association DROP FOREIGN KEY FK_DCEBC1832395FCED');
        $this->addSql('DROP TABLE accessibility');
        $this->addSql('DROP TABLE accessibility_association');
        $this->addSql('DROP TABLE activity');
        $this->addSql('DROP TABLE activity_association');
        $this->addSql('DROP TABLE association');
        $this->addSql('DROP TABLE audience');
        $this->addSql('DROP TABLE audience_association');
        $this->addSql('DROP TABLE picture');
        $this->addSql('DROP TABLE thematic');
        $this->addSql('DROP TABLE thematic_association');
    }
}
