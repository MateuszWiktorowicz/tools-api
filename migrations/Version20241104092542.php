<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241104092542 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE coating (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, code VARCHAR(50) NOT NULL, purpose VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coating_price (id INT AUTO_INCREMENT NOT NULL, coating_id INT NOT NULL, diameter INT NOT NULL, price DOUBLE PRECISION NOT NULL, INDEX IDX_2F1F78A68EE894B (coating_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE face_grinding_time (id INT AUTO_INCREMENT NOT NULL, tool_geometry_id INT NOT NULL, UNIQUE INDEX UNIQ_C1C6B99132B8742C (tool_geometry_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE periphery_grinding_time2d_tool (id INT AUTO_INCREMENT NOT NULL, tool_geometry_id INT NOT NULL, UNIQUE INDEX UNIQ_4AF6AEAC32B8742C (tool_geometry_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tool_geometry (id INT AUTO_INCREMENT NOT NULL, tool_type_id INT NOT NULL, flutes_number INT NOT NULL, diameter INT NOT NULL, INDEX IDX_7A937A8CD12881D0 (tool_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tool_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE coating_price ADD CONSTRAINT FK_2F1F78A68EE894B FOREIGN KEY (coating_id) REFERENCES coating (id)');
        $this->addSql('ALTER TABLE face_grinding_time ADD CONSTRAINT FK_C1C6B99132B8742C FOREIGN KEY (tool_geometry_id) REFERENCES tool_geometry (id)');
        $this->addSql('ALTER TABLE periphery_grinding_time2d_tool ADD CONSTRAINT FK_4AF6AEAC32B8742C FOREIGN KEY (tool_geometry_id) REFERENCES tool_geometry (id)');
        $this->addSql('ALTER TABLE tool_geometry ADD CONSTRAINT FK_7A937A8CD12881D0 FOREIGN KEY (tool_type_id) REFERENCES tool_type (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE coating_price DROP FOREIGN KEY FK_2F1F78A68EE894B');
        $this->addSql('ALTER TABLE face_grinding_time DROP FOREIGN KEY FK_C1C6B99132B8742C');
        $this->addSql('ALTER TABLE periphery_grinding_time2d_tool DROP FOREIGN KEY FK_4AF6AEAC32B8742C');
        $this->addSql('ALTER TABLE tool_geometry DROP FOREIGN KEY FK_7A937A8CD12881D0');
        $this->addSql('DROP TABLE coating');
        $this->addSql('DROP TABLE coating_price');
        $this->addSql('DROP TABLE face_grinding_time');
        $this->addSql('DROP TABLE periphery_grinding_time2d_tool');
        $this->addSql('DROP TABLE tool_geometry');
        $this->addSql('DROP TABLE tool_type');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
