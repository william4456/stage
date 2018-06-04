<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180601044918 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE molecule ADD CONSTRAINT FK_F2EF223925C7B4F0 FOREIGN KEY (MoleculeFile_id) REFERENCES molecule_file (id) ON DELETE CASCADE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F2EF223925C7B4F0 ON molecule (MoleculeFile_id)');
        $this->addSql('ALTER TABLE molecule_file ADD file VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE molecule DROP FOREIGN KEY FK_F2EF223925C7B4F0');
        $this->addSql('DROP INDEX UNIQ_F2EF223925C7B4F0 ON molecule');
        $this->addSql('ALTER TABLE molecule_file DROP file');
    }
}
