<?php

class Message
{

    private $id;
    private $idForum;
    private $contenu;
    private $id_utilisateur;
    private $islike;
    private $isdislike;


    public function __construct($idForum, $contenu)
    {
        $this->idForum = $idForum;
        $this->contenu = $contenu;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getIdForum()
    {
        return $this->idForum;
    }
    public function getContenu()
    {
        return $this->contenu;
    }
    public function getId_utilisateur()
    {
        return $this->id_utilisateur;
    }
    public function get_IsLike()
    {
        return $this->islike;
    }

    public function get_IsDisLike()
    {
        return $this->isdislike;
    }


    public function setId($id)
    {
        $this->id = $id;
    }

    public function setIdForum($idForum)
    {
        $this->idForum = $idForum;
    }

    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    public function setId_utilisateur($id_utilisateur)
    {
        $this->id_utilisateur = $id_utilisateur;
    }

    public function set_IsLike($islike)
    {
        $this->islike = $islike;
    }

    public function set_IsDisLike($isdislike)
    {
        $this->isdislike = $isdislike;
    }
}
