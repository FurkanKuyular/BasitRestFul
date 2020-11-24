<?php

namespace App\Entity;

use App\Repository\BurakRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BurakRepository::class)
 */
class Burak
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $BirakBuIsleri;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBirakBuIsleri(): ?string
    {
        return $this->BirakBuIsleri;
    }

    public function setBirakBuIsleri(?string $BirakBuIsleri): self
    {
        $this->BirakBuIsleri = $BirakBuIsleri;

        return $this;
    }
}
