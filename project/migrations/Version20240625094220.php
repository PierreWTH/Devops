<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240625094220 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE axis (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, axis_id INT DEFAULT NULL, INDEX IDX_64C19C1237411EF (axis_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, text LONGTEXT NOT NULL, answer1 LONGTEXT NOT NULL, answer2 LONGTEXT NOT NULL, answer3 LONGTEXT NOT NULL, INDEX IDX_B6F7494E12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE score (id INT AUTO_INCREMENT NOT NULL, synthesis_id INT NOT NULL, questions_id INT DEFAULT NULL, comment LONGTEXT DEFAULT NULL, grade SMALLINT NOT NULL, INDEX IDX_32993751EC91FE48 (synthesis_id), INDEX IDX_32993751BCB134CE (questions_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1237411EF FOREIGN KEY (axis_id) REFERENCES axis (id)');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494E12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE score ADD CONSTRAINT FK_32993751EC91FE48 FOREIGN KEY (synthesis_id) REFERENCES synthesis (id)');
        $this->addSql('ALTER TABLE score ADD CONSTRAINT FK_32993751BCB134CE FOREIGN KEY (questions_id) REFERENCES question (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1237411EF');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494E12469DE2');
        $this->addSql('ALTER TABLE score DROP FOREIGN KEY FK_32993751EC91FE48');
        $this->addSql('ALTER TABLE score DROP FOREIGN KEY FK_32993751BCB134CE');
        $this->addSql('DROP TABLE axis');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE score');
    }
}
