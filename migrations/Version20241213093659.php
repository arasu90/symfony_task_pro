<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241213093659 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, category_name VARCHAR(100) NOT NULL, category_desc VARCHAR(250) DEFAULT NULL, category_status TINYINT(1) NOT NULL, created_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_64C19C1D5B80441 (category_name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE customer (id INT AUTO_INCREMENT NOT NULL, customer_name VARCHAR(100) NOT NULL, customer_email VARCHAR(60) NOT NULL, customer_address VARCHAR(250) DEFAULT NULL, customer_mobile VARCHAR(12) NOT NULL, customer_status TINYINT(1) NOT NULL, created_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, product_name VARCHAR(50) NOT NULL, product_desc VARCHAR(250) DEFAULT NULL, product_price DOUBLE PRECISION NOT NULL, product_qty INT NOT NULL, product_category INT NOT NULL, created_at DATETIME DEFAULT NULL, product_status TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE product');
    }
}
