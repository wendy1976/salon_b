<?php
// Entité des chiffres d'affaires mensuels du salon Beautiful
namespace App\Entity;

use App\Repository\ChiffreAffaireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChiffreAffaireRepository::class)]
class ChiffreAffaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $janvier = null;

    #[ORM\Column]
    private ?int $fevrier = null;

    #[ORM\Column]
    private ?int $mars = null;

    #[ORM\Column]
    private ?int $avril = null;

    #[ORM\Column]
    private ?int $mai = null;

    #[ORM\Column]
    private ?int $juin = null;

    #[ORM\Column]
    private ?int $juillet = null;

    #[ORM\Column]
    private ?int $aout = null;

    
    #[ORM\ManyToOne(targetEntity: Salon::class, inversedBy: "chiffreAffaires")]
    #[ORM\JoinColumn(nullable: false)]
    private $salon;

    #[ORM\Column]
    private ?int $septembre = null;

    #[ORM\Column]
    private ?int $octobre = null;

    #[ORM\Column]
    private ?int $novembre = null;

    #[ORM\Column]
    private ?int $decembre = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJanvier(): ?int
    {
        return $this->janvier;
    }

    public function setJanvier(int $janvier): static
    {
        $this->janvier = $janvier;

        return $this;
    }

    public function getFevrier(): ?int
    {
        return $this->fevrier;
    }

    public function setFevrier(int $fevrier): static
    {
        $this->fevrier = $fevrier;

        return $this;
    }

    public function getMars(): ?int
    {
        return $this->mars;
    }

    public function setMars(int $mars): static
    {
        $this->mars = $mars;

        return $this;
    }

    public function getAvril(): ?int
    {
        return $this->avril;
    }

    public function setAvril(int $avril): static
    {
        $this->avril = $avril;

        return $this;
    }

    public function getMai(): ?int
    {
        return $this->mai;
    }

    public function setMai(int $mai): static
    {
        $this->mai = $mai;

        return $this;
    }

    public function getJuin(): ?int
    {
        return $this->juin;
    }

    public function setJuin(int $juin): static
    {
        $this->juin = $juin;

        return $this;
    }

    public function getJuillet(): ?int
    {
        return $this->juillet;
    }

    public function setJuillet(int $juillet): static
    {
        $this->juillet = $juillet;

        return $this;
    }

    public function getAout(): ?int
    {
        return $this->aout;
    }

    public function setAout(int $aout): static
    {
        $this->aout = $aout;

        return $this;
    }

    public function getSeptembre(): ?int
    {
        return $this->septembre;
    }

    public function setSeptembre(int $septembre): static
    {
        $this->septembre = $septembre;

        return $this;
    }

    public function getOctobre(): ?int
    {
        return $this->octobre;
    }

    public function setOctobre(int $octobre): static
    {
        $this->octobre = $octobre;

        return $this;
    }

    public function getNovembre(): ?int
    {
        return $this->novembre;
    }

    public function setNovembre(int $novembre): static
    {
        $this->novembre = $novembre;

        return $this;
    }

    public function getDecembre(): ?int
    {
        return $this->decembre;
    }

    public function setDecembre(int $decembre): static
    {
        $this->decembre = $decembre;

        return $this;
    }

    public function getMoyenne(): ?float
    {
        $total = $this->janvier + $this->fevrier + $this->mars + $this->avril + $this->mai + $this->juin + $this->juillet + $this->aout + $this->septembre;
        $count = 9; // Nombre de mois à inclure dans le calcul de la moyenne

        return $count > 0 ? $total / $count : null;
    }

    public function getSomme(): ?int
    {
        return $this->janvier + $this->fevrier + $this->mars + $this->avril + $this->mai + $this->juin + $this->juillet + $this->aout + $this->septembre;
    }
}