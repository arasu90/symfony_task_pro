<?php

namespace App\Entity;

use App\Repository\CartItemsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CartItemsRepository::class)]
class CartItems
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $master_id = null;

    #[ORM\Column]
    private ?int $customer_id = null;

    #[ORM\Column]
    private ?int $product_id = null;

    #[ORM\Column]
    private ?int $product_qty = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 7, scale: 2)]
    private ?string $product_price = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 7, scale: 2)]
    private ?string $total_amt = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 7, scale: 2)]
    private ?string $discount_per = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 7, scale: 2)]
    private ?string $discount_amt = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 7, scale: 2)]
    private ?string $sub_total = null;

    #[ORM\Column]
    private ?int $tax_per = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 7, scale: 2)]
    private ?string $tax_amt = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 7, scale: 2)]
    private ?string $net_total = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $created_at = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updated_at = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $order_status = null;

    #[ORM\ManyToOne(targetEntity: Product::class)]
    #[ORM\JoinColumn(name: "product_id", referencedColumnName: "id")]
    private ?Product $product = null;

    // Getter and setter for product
    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): static
    {
        $this->product = $product;
        return $this;
    }

    #[ORM\ManyToOne(targetEntity: Customer::class)]
    #[ORM\JoinColumn(name: "customer_id", referencedColumnName: "id")]
    private ?Customer $customer = null;

    // Getter and setter for Customer
    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): static
    {
        $this->customer = $customer;
        return $this;
    }

    public function __construct()
    {
        $this->created_at = new \DateTime();
        $this->updated_at = new \DateTime();
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMasterId(): ?int
    {
        return $this->master_id;
    }

    public function setMasterId(int $master_id): static
    {
        $this->master_id = $master_id;

        return $this;
    }

    public function getCustomerId(): ?int
    {
        return $this->customer_id;
    }

    public function setCustomerId(int $customer_id): static
    {
        $this->customer_id = $customer_id;

        return $this;
    }

    public function getProductId(): ?int
    {
        return $this->product_id;
    }

    public function setProductId(int $product_id): static
    {
        $this->product_id = $product_id;

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

    public function getProductPrice(): ?string
    {
        return $this->product_price;
    }

    public function setProductPrice(string $product_price): static
    {
        $this->product_price = $product_price;

        return $this;
    }

    public function getTotalAmt(): ?string
    {
        return $this->total_amt;
    }

    public function setTotalAmt(string $total_amt): static
    {
        $this->total_amt = $total_amt;

        return $this;
    }

    public function getDiscountPer(): ?string
    {
        return $this->discount_per;
    }

    public function setDiscountPer(string $discount_per): static
    {
        $this->discount_per = $discount_per;

        return $this;
    }

    public function getDiscountAmt(): ?string
    {
        return $this->discount_amt;
    }

    public function setDiscountAmt(string $discount_amt): static
    {
        $this->discount_amt = $discount_amt;

        return $this;
    }

    public function getSubTotal(): ?string
    {
        return $this->sub_total;
    }

    public function setSubTotal(string $sub_total): static
    {
        $this->sub_total = $sub_total;

        return $this;
    }

    public function getTaxPer(): ?int
    {
        return $this->tax_per;
    }

    public function setTaxPer(int $tax_per): static
    {
        $this->tax_per = $tax_per;

        return $this;
    }

    public function getTaxAmt(): ?string
    {
        return $this->tax_amt;
    }

    public function setTaxAmt(string $tax_amt): static
    {
        $this->tax_amt = $tax_amt;

        return $this;
    }

    public function getNetTotal(): ?string
    {
        return $this->net_total;
    }

    public function setNetTotal(string $net_total): static
    {
        $this->net_total = $net_total;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getOrderStatus(): ?int
    {
        return $this->order_status;
    }

    public function setOrderStatus(int $order_status): static
    {
        $this->order_status = $order_status;

        return $this;
    }
}
