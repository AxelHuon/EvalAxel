<?php

namespace App\Entity;

use App\Repository\MediationsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MediationsRepository::class)]
class Mediations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $particulier_nom;

    #[ORM\Column(type: 'string', length: 255)]
    private $particulier_prenom;

    #[ORM\Column(type: 'string', length: 255)]
    private $particulier_email;

    #[ORM\Column(type: 'integer')]
    private $particulier_tel;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'mediations')]
    private $user_id;

    #[ORM\Column(type: 'string', length: 255)]
    private $entreprise_nom;

    #[ORM\Column(type: 'string', length: 255)]
    private $entreprise_email;

    #[ORM\Column(type: 'integer')]
    private $entreprise_tel;

    #[ORM\Column(type: 'string', length: 255)]
    private $entreprise_avocat;

    #[ORM\Column(type: 'string', length: 255)]
    private $particulier_avocat;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'mediateur')]
    private $mediateur;



    #[ORM\Column(type: 'string', length: 255)]
    private $article;

    #[ORM\Column(type: 'string', length: 255)]
    private $paiement;

    #[ORM\Column(type: 'string', length: 255)]
    private $remboursement;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParticulierNom(): ?string
    {
        return $this->particulier_nom;
    }

    public function setParticulierNom(string $particulier_nom): self
    {
        $this->particulier_nom = $particulier_nom;

        return $this;
    }

    public function getParticulierPrenom(): ?string
    {
        return $this->particulier_prenom;
    }

    public function setParticulierPrenom(string $particulier_prenom): self
    {
        $this->particulier_prenom = $particulier_prenom;

        return $this;
    }

    public function getParticulierEmail(): ?string
    {
        return $this->particulier_email;
    }

    public function setParticulierEmail(string $particulier_email): self
    {
        $this->particulier_email = $particulier_email;

        return $this;
    }

    public function getParticulierTel(): ?int
    {
        return $this->particulier_tel;
    }

    public function setParticulierTel(int $particulier_tel): self
    {
        $this->particulier_tel = $particulier_tel;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(?User $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getEntrepriseNom(): ?string
    {
        return $this->entreprise_nom;
    }

    public function setEntrepriseNom(string $entreprise_nom): self
    {
        $this->entreprise_nom = $entreprise_nom;

        return $this;
    }

    public function getEntrepriseEmail(): ?string
    {
        return $this->entreprise_email;
    }

    public function setEntrepriseEmail(string $entreprise_email): self
    {
        $this->entreprise_email = $entreprise_email;

        return $this;
    }

    public function getEntrepriseTel(): ?int
    {
        return $this->entreprise_tel;
    }

    public function setEntrepriseTel(int $entreprise_tel): self
    {
        $this->entreprise_tel = $entreprise_tel;

        return $this;
    }

    public function getEntrepriseAvocat(): ?string
    {
        return $this->entreprise_avocat;
    }

    public function setEntrepriseAvocat(string $entreprise_avocat): self
    {
        $this->entreprise_avocat = $entreprise_avocat;

        return $this;
    }

    public function getParticulierAvocat(): ?string
    {
        return $this->particulier_avocat;
    }

    public function setParticulierAvocat(string $particulier_avocat): self
    {
        $this->particulier_avocat = $particulier_avocat;

        return $this;
    }

    public function getMediateur(): ?User
    {
        return $this->mediateur;
    }

    public function setMediateur(?User $mediateur): self
    {
        $this->mediateur = $mediateur;

        return $this;
    }




    public function getArticle(): ?string
    {
        return $this->article;
    }

    public function setArticle(string $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getPaiement(): ?string
    {
        return $this->paiement;
    }

    public function setPaiement(string $paiement): self
    {
        $this->paiement = $paiement;

        return $this;
    }

    public function getRemboursement(): ?string
    {
        return $this->remboursement;
    }

    public function setRemboursement(string $remboursement): self
    {
        $this->remboursement = $remboursement;

        return $this;
    }

}
