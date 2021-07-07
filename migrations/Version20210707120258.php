<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210707120258 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_association (user_id INT NOT NULL, association_id INT NOT NULL, INDEX IDX_549EE859A76ED395 (user_id), INDEX IDX_549EE859EFB9C8A5 (association_id), PRIMARY KEY(user_id, association_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_association ADD CONSTRAINT FK_549EE859A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_association ADD CONSTRAINT FK_549EE859EFB9C8A5 FOREIGN KEY (association_id) REFERENCES association (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE association ADD founder_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE association ADD CONSTRAINT FK_FD8521CC19113B3C FOREIGN KEY (founder_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_FD8521CC19113B3C ON association (founder_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE association DROP FOREIGN KEY FK_FD8521CC19113B3C');
        $this->addSql('ALTER TABLE user_association DROP FOREIGN KEY FK_549EE859A76ED395');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_association');
        $this->addSql('DROP INDEX IDX_FD8521CC19113B3C ON association');
        $this->addSql('ALTER TABLE association DROP founder_id');
    }
}
