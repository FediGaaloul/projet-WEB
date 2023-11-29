<?php
class Utilisateur
{
    private $id_user = null;
    private $nom = null;
    private $prenom = null;
    private $email = null;
    private $mots_de_passe = null;

    function __construct($id_user, $nom, $prenom, $email, $mots_de_passe)
    {
        $this->id_user = $id_user;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->mots_de_passe = $mots_de_passe;
    }

    function getid_user()
    {
        return $this->id_user;
    }

    function getnom()
    {
        return $this->nom;
    }

    function getprenom()
    {
        return $this->prenom;
    }

    function getemail()
    {
        return $this->email;
    }

    function getmots_de_passe()
    {
        return $this->mots_de_passe;
    }

    function setnom(string $nom)
    {
        $this->nom = $nom;
    }

    function setprenom(string $prenom)
    {
        $this->prenom = $prenom;
    }

    function setemail(string $email)
    {
        $this->email = $email;
    }

    function setmots_de_passe(string $mots_de_passe)
    {
        $this->mots_de_passe = $mots_de_passe;
    }
}
?>
