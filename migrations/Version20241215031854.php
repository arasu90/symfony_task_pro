<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241215031854 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cart_items CHANGE product_price product_price NUMERIC(7, 2) NOT NULL, CHANGE total_amt total_amt NUMERIC(7, 2) NOT NULL, CHANGE discount_per discount_per NUMERIC(7, 2) NOT NULL, CHANGE discount_amt discount_amt NUMERIC(7, 2) NOT NULL, CHANGE sub_total sub_total NUMERIC(7, 2) NOT NULL, CHANGE tax_amt tax_amt NUMERIC(7, 2) NOT NULL, CHANGE net_total net_total NUMERIC(7, 2) NOT NULL, CHANGE order_status order_status SMALLINT NOT NULL');
        $this->addSql('ALTER TABLE cart_items ADD CONSTRAINT FK_BEF484454584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_BEF484454584665A ON cart_items (product_id)');
        $this->addSql('ALTER TABLE cart_master CHANGE created_at created_at DATETIME NOT NULL, CHANGE updated_at updated_at DATETIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cart_master CHANGE created_at created_at DATETIME DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE cart_items DROP FOREIGN KEY FK_BEF484454584665A');
        $this->addSql('DROP INDEX IDX_BEF484454584665A ON cart_items');
        $this->addSql('ALTER TABLE cart_items CHANGE product_price product_price NUMERIC(10, 2) NOT NULL, CHANGE total_amt total_amt NUMERIC(10, 2) NOT NULL, CHANGE discount_per discount_per NUMERIC(10, 2) NOT NULL, CHANGE discount_amt discount_amt NUMERIC(10, 2) NOT NULL, CHANGE sub_total sub_total NUMERIC(10, 2) NOT NULL, CHANGE tax_amt tax_amt NUMERIC(10, 2) NOT NULL, CHANGE net_total net_total NUMERIC(10, 2) NOT NULL, CHANGE order_status order_status SMALLINT DEFAULT 0 NOT NULL');
    }
}
