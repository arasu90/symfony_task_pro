<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241215033739 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cart_items (id INT AUTO_INCREMENT NOT NULL, master_id INT NOT NULL, customer_id INT NOT NULL, product_id INT NOT NULL, product_qty INT NOT NULL, product_price NUMERIC(10, 2) NOT NULL, total_amt NUMERIC(10, 2) NOT NULL, discount_per NUMERIC(10, 2) NOT NULL, discount_amt NUMERIC(10, 2) NOT NULL, sub_total NUMERIC(10, 2) NOT NULL, tax_per INT NOT NULL, tax_amt NUMERIC(10, 2) NOT NULL, net_total NUMERIC(10, 2) NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, order_status SMALLINT NOT NULL, INDEX IDX_BEF484454584665A (product_id), INDEX IDX_BEF484459395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE cart_master (id INT AUTO_INCREMENT NOT NULL, customer_id INT NOT NULL, total_amt NUMERIC(10, 2) NOT NULL, total_tax_amt NUMERIC(10, 2) NOT NULL, discount_amt NUMERIC(10, 2) NOT NULL, net_total NUMERIC(10, 2) NOT NULL, order_date DATE NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, sub_total NUMERIC(10, 2) NOT NULL, order_status SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE cart_items ADD CONSTRAINT FK_BEF484454584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE cart_items ADD CONSTRAINT FK_BEF484459395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cart_items DROP FOREIGN KEY FK_BEF484454584665A');
        $this->addSql('ALTER TABLE cart_items DROP FOREIGN KEY FK_BEF484459395C3F3');
        $this->addSql('DROP TABLE cart_items');
        $this->addSql('DROP TABLE cart_master');
    }
}
