<?php

class user 
{ 
  private $iduser  ; 
  private  $nom =null ; 
  private  $prenom =null ; 
  private  $tel = null ; 
  private  $email=null ; 
  private $dateinscription=null ; 
  private $mdp=null; 
  private  $verifmdp=null ; 
  public function __construct($n, $p, $e, $t, $mdp, $verifmdp, $id)
  {
    $this->iduser = $id;
    $this->nom = $n;
    $this->prenom = $p;
    $this->email = $e;
    $this->tel = $t;
    $this->mdp = $mdp;
    $this->verifmdp = $verifmdp;
  }
  public function getIduser()
    {
        return $this->iduser;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }


    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }
    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getdateinscription()
    {
        return $this->dateinscription;
    }


    public function setdateinscription($dateinscription)
    {
        $this->email = $dateinscription;

        return $this;
    }
    public function getTel()
    {
        return $this->tel;
    }


    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    public function getmdp()
    {
        return $this->mdp;
    }


    public function setmdp($mdp)
    {
        $this->mdp = $mdp;

        return $this;
    }


    public function getverifmdp()
    {
        return $this->verifmdp;
    }


    public function setverifmdp($verifmdp)
    {
        $this->verifmdp = $verifmdp;

        return $this;
    }
}