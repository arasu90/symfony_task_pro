<?php

namespace App\Entity;

use App\Repository\CartMasterRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CartMasterRepository::class)]
class CartMaster
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $customer_id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 7, scale: 2)]
    private ?string $total_amt = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 7, scale: 2)]
    private ?string $total_tax_amt = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 7, scale: 2)]
    private ?string $discount_amt = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 7, scale: 2)]
    private ?string $net_total = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $order_date = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 7, scale: 2)]
    private ?string $sub_total = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $order_status = null;

    #[ORM\Column(length: 20)]
    private ?string $payment_mode = null;

    #[ORM\Column]
    private ?int $master_id = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTotalAmt(): ?string
    {
        return $this->total_amt;
    }

    public function setTotalAmt(string $total_amt): static
    {
        $this->total_amt = $total_amt;

        return $this;
    }

    public function getTotalTaxAmt(): ?string
    {
        return $this->total_tax_amt;
    }

    public function setTotalTaxAmt(string $total_tax_amt): static
    {
        $this->total_tax_amt = $total_tax_amt;

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

    public function getNetTotal(): ?string
    {
        return $this->net_total;
    }

    public function setNetTotal(string $net_total): static
    {
        $this->net_total = $net_total;

        return $this;
    }

    public function getOrderDate(): ?\DateTimeInterface
    {
        return $this->order_date;
    }

    public function setOrderDate(\DateTimeInterface $order_date): static
    {
        $this->order_date = $order_date;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeImmutable $updated_at): static
    {
        $this->updated_at = $updated_at;

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

    public function getOrderStatus(): ?int
    {
        return $this->order_status;
    }

    public function setOrderStatus(int $order_status): static
    {
        $this->order_status = $order_status;

        return $this;
    }

    public function getPaymentMode(): ?string
    {
        return $this->payment_mode;
    }

    public function setPaymentMode(string $payment_mode): static
    {
        $this->payment_mode = $payment_mode;

        return $this;
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
}
