<?php

namespace App\Entity;

use App\Repository\InfoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InfoRepository::class)
 */
class Info
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cpf;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $genero;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ano_nascimento;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf): self
    {
        $this->cpf = $cpf;

        return $this;
    }

    public function getGenero(): ?string
    {
        return $this->genero;
    }

    public function setGenero(string $genero): self
    {
        $this->genero = $genero;

        return $this;
    }

    public function getAnoNascimento(): ?string
    {
        return $this->ano_nascimento;
    }

    public function setAnoNascimento(string $ano_nascimento): self
    {
        $this->ano_nascimento = $ano_nascimento;

        return $this;
    }
}
