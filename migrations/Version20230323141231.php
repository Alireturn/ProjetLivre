<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230323141231 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book ADD borroww_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A331FD78A0F6 FOREIGN KEY (borroww_id) REFERENCES borrow (id)');
        $this->addSql('CREATE INDEX IDX_CBE5A331FD78A0F6 ON book (borroww_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A331FD78A0F6');
        $this->addSql('DROP INDEX IDX_CBE5A331FD78A0F6 ON book');
        $this->addSql('ALTER TABLE book DROP borroww_id');
    }
}
