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

    #[ORM\ManyToOne(inversedBy: 'rams')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Server $server_id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column]
    private ?int $number_of_sticks = null;

    #[ORM\Column]
    private ?int $size = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getServerId(): ?Server
    {
        return $this->server_id;
    }

    public function setServerId(?Server $server_id): self
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

    public function getNumberOfSticks(): ?int
    {
        return $this->number_of_sticks;
    }

    public function setNumberOfSticks(int $number_of_sticks): self
    {
        $this->number_of_sticks = $number_of_sticks;

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
