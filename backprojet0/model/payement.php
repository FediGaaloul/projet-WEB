<?php
class Payment
{
    private $id=null;
    private $nom_carte=null;
    private $n_carte=null;
    private $d_expiration=null;
    private $cryptogramme=null;
    private $id_user=null;

    public function __construct($nom_carte, $n_carte, $d_expiration, $cryptogramme)
    {
       // $this->id = $id;
        $this->nom_carte = $nom_carte;
        $this->n_carte = $n_carte;
        $this->d_expiration = $d_expiration;
        $this->cryptogramme = $cryptogramme;
       // $this->id_user = $id_user;
    }

     public function getId()
    {
        return $this->id;
    }
    public function getNomCarte()
    {
        return $this->nom_carte;
    }

    public function getNCarte()
    {
        return $this->n_carte;
    }

    public function getDExpiration()
    {
        return $this->d_expiration;
    }

    public function getCryptogramme()
    {
        return $this->cryptogramme;
    }

    public function getIdUser()
    {
        return $this->id_user;
    }

    public function setNomCarte(string $nom_carte)
    {
        $this->nom_carte = $nom_carte;
    }

    public function setNCarte(string $n_carte)
    {
        $this->n_carte = $n_carte;
    }

    public function setDExpiration(string $d_expiration)
    {
        $this->d_expiration = $d_expiration;
    }

    public function setCryptogramme(string $cryptogramme)
    {
        $this->cryptogramme = $cryptogramme;
    }

   public function setIdUser(string $id_user)
    {
        $this->id_user = $id_user;
    }
}
?>
