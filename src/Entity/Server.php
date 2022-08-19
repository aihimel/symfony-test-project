<?php

namespace App\Entity;

use App\Repository\ServerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServerRepository::class)]
class Server
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $asset_id = null;

    #[ORM\Column(nullable: true)]
    private ?int $brand_id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column]
    private ?int $total_ram = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAssetId(): ?int
    {
        return $this->asset_id;
    }

    public function setAssetId(int $asset_id): self
    {
        $this->asset_id = $asset_id;

        return $this;
    }

    public function getBrandId(): ?int
    {
        return $this->brand_id;
    }

    public function setBrandId(?int $brand_id): self
    {
        $this->brand_id = $brand_id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getTotalRam(): ?int
    {
        return $this->total_ram;
    }

    public function setTotalRam(int $total_ram): self
    {
        $this->total_ram = $total_ram;

        return $this;
    }
}
