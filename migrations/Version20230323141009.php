<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230323141009 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE borrow ADD userr_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE borrow ADD CONSTRAINT FK_55DBA8B0DF0FD358 FOREIGN KEY (userr_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_55DBA8B0DF0FD358 ON borrow (userr_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE borrow DROP FOREIGN KEY FK_55DBA8B0DF0FD358');
        $this->addSql('DROP INDEX IDX_55DBA8B0DF0FD358 ON borrow');
        $this->addSql('ALTER TABLE borrow DROP userr_id');
    }
}
