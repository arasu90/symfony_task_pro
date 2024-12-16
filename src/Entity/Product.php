<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use DateTime;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Validate;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Validate\NotBlank(message:"Product Name is required")]
    #[Validate\Length(
        min: 3,
        max: 50,
        minMessage: 'Product name must be at least {{ limit }} characters long.',
        maxMessage: 'Product name cannot be longer than {{ limit }} characters.'
    )]
    private ?string $product_name = null;

    #[ORM\Column(length: 250, nullable: true)]
    private ?string $product_desc = null;

    #[ORM\Column]
    #[Validate\GreaterThan(
        value:0,
        message: "Product Price must be greater then 0"
    )]
    #[Validate\Type(type:'numeric',message:"The Product Qty allowed numbers only")]
    private ?float $product_price = null;

    #[ORM\Column]
    #[Validate\PositiveOrZero(message:"The product qty must be zero or a positive number.")]
    #[Validate\Type(type:'numeric',message:"The Product Qty allowed numbers only")]
    private ?int $product_qty = null;

    #[ORM\Column]
    private ?int $product_category = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $created_at = null;

    #[ORM\Column]
    private ?bool $product_status = null;

    #[ORM\Column(type: Types::SMALLINT)]
    #[Validate\PositiveOrZero(message:"The product discount must be zero or a positive number.")]
    private ?int $product_discount = null;

    #[ORM\Column]
    #[Validate\PositiveOrZero(message:"The product tax must be zero or a positive number.")]
    private ?int $product_tax_per = null;

    public function __construct()
    {
        $this->created_at =  new \DateTime();
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductName(): ?string
    {
        return $this->product_name;
    }

    public function setProductName(string $product_name): static
    {
        $this->product_name = $product_name;

        return $this;
    }

    public function getProductDesc(): ?string
    {
        return $this->product_desc;
    }

    public function setProductDesc(?string $product_desc): static
    {
        $this->product_desc = $product_desc;

        return $this;
    }

    public function getProductPrice(): ?float
    {
        return $this->product_price;
    }

    public function setProductPrice(float $product_price): static
    {
        $this->product_price = $product_price;

        return $this;
    }

    public function getProductQty(): ?int
    {
        return $this->product_qty;
    }

    public function setProductQty(int $product_qty): static
    {
        $this->product_qty = $product_qty;

        return $this;
    }

    public function getProductCategory(): ?int
    {
        return $this->product_category;
    }

    public function setProductCategory(int $product_category): static
    {
        $this->product_category = $product_category;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTimeInterface $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function isProductStatus(): ?bool
    {
        return $this->product_status;
    }

    public function setProductStatus(bool $product_status): static
    {
        $this->product_status = $product_status;

        return $this;
    }

    public function getProductDiscount(): ?int
    {
        return $this->product_discount;
    }

    public function setProductDiscount(int $product_discount): static
    {
        $this->product_discount = $product_discount;

        return $this;
    }

    public function getProductTaxPer(): ?int
    {
        return $this->product_tax_per;
    }

    public function setProductTaxPer(int $product_tax_per): static
    {
        $this->product_tax_per = $product_tax_per;

        return $this;
    }
}
