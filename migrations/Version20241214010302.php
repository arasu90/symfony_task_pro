<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241214010302 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cart_items (id INT AUTO_INCREMENT NOT NULL, master_id INT NOT NULL, customer_id INT NOT NULL, product_id INT NOT NULL, product_qty INT NOT NULL, product_price NUMERIC(7, 2) NOT NULL, total_amt NUMERIC(7, 2) NOT NULL, discount_per NUMERIC(7, 2) NOT NULL, discount_amt NUMERIC(7, 2) NOT NULL, sub_total NUMERIC(7, 2) NOT NULL, tax_per INT NOT NULL, tax_amt NUMERIC(7, 2) NOT NULL, net_total NUMERIC(7, 2) NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE cart_master (id INT AUTO_INCREMENT NOT NULL, customer_id INT NOT NULL, total_amt NUMERIC(7, 2) NOT NULL, total_tax_amt NUMERIC(7, 2) NOT NULL, discount_amt NUMERIC(7, 2) NOT NULL, net_total NUMERIC(7, 2) NOT NULL, order_date DATE NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE cart_items');
        $this->addSql('DROP TABLE cart_master');
    }
}
