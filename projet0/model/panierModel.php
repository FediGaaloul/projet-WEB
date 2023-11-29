<?php
class Cours
{
    private ?int $idCours = null;
    private ?string $titre = null;
    private ?string $description = null;
    private ?float $prix = null;
    private ?string $statut = null;

    public function __construct($id = null, $t, $d, $p, $s)
    {
        $this->idCours = $id;
        $this->titre = $t;
        $this->description = $d;
        $this->prix = $p;
        $this->statut = $s;
    }

    public function getIdCours()
    {
        return $this->idCours;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function setPrix($prix)
    {
        $this->prix = $prix;
        return $this;
    }

    public function getStatut()
    {
        return $this->statut;
    }

    public function setStatut($statut)
    {
        $this->statut = $statut;
        return $this;
    }
}

?>
