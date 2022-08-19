<?php

namespace App\Entity;

use App\Repository\RamRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RamRepository::class)]
class Ram
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $server_id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column]
    private ?int $sticks = null;

    #[ORM\Column]
    private ?int $size = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getServerId(): ?int
    {
        return $this->server_id;
    }

    public function setServerId(int $server_id): self
    {
        $this->server_id = $server_id;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getSticks(): ?int
    {
        return $this->sticks;
    }

    public function setSticks(int $sticks): self
    {
        $this->sticks = $sticks;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(int $size): self
    {
        $this->size = $size;

        return $this;
    }
}
