<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180621095937 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE molecule (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, scientific_name VARCHAR(255) NOT NULL, description TEXT NOT NULL, priority INT NOT NULL, MoleculeFile_id INT NOT NULL, UNIQUE INDEX UNIQ_F2EF223925C7B4F0 (MoleculeFile_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE molecule_file (id INT AUTO_INCREMENT NOT NULL, file_name VARCHAR(255) NOT NULL, path VARCHAR(255) NOT NULL, file VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roles JSON NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE molecule ADD CONSTRAINT FK_F2EF223925C7B4F0 FOREIGN KEY (MoleculeFile_id) REFERENCES molecule_file (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE molecule DROP FOREIGN KEY FK_F2EF223925C7B4F0');
        $this->addSql('DROP TABLE molecule');
        $this->addSql('DROP TABLE molecule_file');
        $this->addSql('DROP TABLE user');
    }
}
