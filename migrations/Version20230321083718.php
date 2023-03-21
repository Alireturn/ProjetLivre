<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230321083718 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE book (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, box_id INT NOT NULL, title VARCHAR(255) NOT NULL, author VARCHAR(255) NOT NULL, isbn INT NOT NULL, is_available TINYINT(1) NOT NULL, cover VARCHAR(255) NOT NULL, resume LONGTEXT NOT NULL, INDEX IDX_CBE5A33112469DE2 (category_id), INDEX IDX_CBE5A331D8177B3F (box_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A33112469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A331D8177B3F FOREIGN KEY (box_id) REFERENCES box (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A33112469DE2');
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A331D8177B3F');
        $this->addSql('DROP TABLE book');
    }
}
