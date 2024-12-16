<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Validate;

#[ORM\Entity(repositoryClass: CustomerRepository::class)]
class Customer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    #[Validate\NotBlank(message:"Customer name is required")]
    private ?string $customer_name = null;

    #[ORM\Column(length: 60)]
    #[Validate\NotBlank(message:"Customer email is required")]
    #[Validate\Email(message:"Please enter a valid email address.")]
    private ?string $customer_email = null;

    #[ORM\Column(length: 250, nullable: true)]
    private ?string $customer_address = null;

    #[ORM\Column(length: 12)]
    #[Validate\NotBlank(message:"Customer mobile is required")]
    #[Validate\Type(type:'numeric',message:"Customer Mobile allowed number only")]
    #[Validate\Length(
        min: 10,
        max: 10,
        minMessage: 'Customer mobile must be {{ limit }} digit.',
        maxMessage: 'Customer mobile must be {{ limit }} digit.',
    )]
    private ?string $customer_mobile = null;

    #[ORM\Column]
    private ?bool $customer_status = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $created_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCustomerName(): ?string
    {
        return $this->customer_name;
    }

    public function setCustomerName(string $customer_name): static
    {
        $this->customer_name = $customer_name;

        return $this;
    }

    public function getCustomerEmail(): ?string
    {
        return $this->customer_email;
    }

    public function setCustomerEmail(string $customer_email): static
    {
        $this->customer_email = $customer_email;

        return $this;
    }

    public function getCustomerAddress(): ?string
    {
        return $this->customer_address;
    }

    public function setCustomerAddress(?string $customer_address): static
    {
        $this->customer_address = $customer_address;

        return $this;
    }

    public function getCustomerMobile(): ?string
    {
        return $this->customer_mobile;
    }

    public function setCustomerMobile(string $customer_mobile): static
    {
        $this->customer_mobile = $customer_mobile;

        return $this;
    }

    public function isCategoryStatus(): ?bool
    {
        return $this->customer_status;
    }

    public function setCategoryStatus(bool $customer_status): static
    {
        $this->customer_status = $customer_status;

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
}
