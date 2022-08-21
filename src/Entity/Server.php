<?php

namespace App\Entity;

use App\Repository\ServerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServerRepository::class)]
class Server
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $assetid = null;

    #[ORM\ManyToOne(inversedBy: 'servers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Brand $brand_id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\OneToMany(mappedBy: 'server_id', targetEntity: Ram::class, orphanRemoval: true)]
    private Collection $rams;

    public function __construct()
    {
        $this->rams = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAssetid(): ?int
    {
        return $this->assetid;
    }

    public function setAssetid(int $assetid): self
    {
        $this->assetid = $assetid;

        return $this;
    }

    public function getBrandId(): ?Brand
    {
        return $this->brand_id;
    }

    public function setBrandId(?Brand $brand_id): self
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

    /**
     * @return Collection<int, Ram>
     */
    public function getRams(): Collection
    {
        return $this->rams;
    }

    public function addRam(Ram $ram): self
    {
        if (!$this->rams->contains($ram)) {
            $this->rams->add($ram);
            $ram->setServerId($this);
        }

        return $this;
    }

    public function removeRam(Ram $ram): self
    {
        if ($this->rams->removeElement($ram)) {
            // set the owning side to null (unless already changed)
            if ($ram->getServerId() === $this) {
                $ram->setServerId(null);
            }
        }

        return $this;
    }
}
