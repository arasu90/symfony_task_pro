<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100, unique:true)]
    #[Assert\NotBlank(message: 'Category name should not be blank.')]
    #[Assert\Length(
        min: 3,
        max: 255,
        minMessage: 'Category name must be at least {{ limit }} characters long.',
        maxMessage: 'Category name cannot be longer than {{ limit }} characters.'
    )]
    private ?string $category_name = null;

    #[ORM\Column(length: 250, nullable: true)]
    private ?string $category_desc = null;
    
    #[ORM\Column]
    #[Assert\NotBlank(message:"Category status field value required.")]
    private ?bool $category_status = null;
    
    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $created_at = null;

    #[ORM\Column(type: Types::SMALLINT)]
    #[Assert\PositiveOrZero(message:"The category discount must be zero or a positive number.")]
    private ?int $category_discount = null;
    

    public function __construct()
    {
        // Set the default value to the current date and time
        $this->created_at = new \DateTime();  // Automatically sets the current date and time
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategoryName(): ?string
    {
        return $this->category_name;
    }

    public function setCategoryName(string $category_name): static
    {
        $this->category_name = $category_name;

        return $this;
    }

    public function getCategoryDesc(): ?string
    {
        return $this->category_desc;
    }

    public function setCategoryDesc(?string $category_desc): static
    {
        $this->category_desc = $category_desc;

        return $this;
    }

    public function isCategoryStatus(): ?bool
    {
        return $this->category_status;
    }

    public function setCategoryStatus(bool $category_status): static
    {
        $this->category_status = $category_status;

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

    public function getCategoryDiscount(): ?int
    {
        return $this->category_discount;
    }

    public function setCategoryDiscount(int $category_discount): static
    {
        $this->category_discount = $category_discount;

        return $this;
    }
}
