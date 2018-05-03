<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180503135800 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE producto_comanda (producto_id INT NOT NULL, comanda_id INT NOT NULL, INDEX IDX_D40C456C7645698E (producto_id), INDEX IDX_D40C456C787958A8 (comanda_id), PRIMARY KEY(producto_id, comanda_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE producto_comanda ADD CONSTRAINT FK_D40C456C7645698E FOREIGN KEY (producto_id) REFERENCES producto (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE producto_comanda ADD CONSTRAINT FK_D40C456C787958A8 FOREIGN KEY (comanda_id) REFERENCES comanda (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE comanda DROP cuenta, CHANGE estado estado INT NOT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE producto_comanda');
        $this->addSql('ALTER TABLE comanda ADD cuenta NUMERIC(10, 2) NOT NULL, CHANGE estado estado LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
