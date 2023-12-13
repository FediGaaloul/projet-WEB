<?php
class Forum
{
    private $id;
    private $sujet;
    private $description;
    private $type;


    /*public function __construct($sujet, $description)
    {
        $this->sujet = $sujet;
        $this->description = $description;
    }*/
    public function __construct($sujet, $description, $type)
    {
        $this->sujet = $sujet;
        $this->description = $description;
        $this->type = $type;
    }


    public function getId()
    {
        return $this->id;
    }
    public function getSujet()
    {
        return $this->sujet;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getType()
    {
        return $this->type;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setSujet($sujet)
    {
        $this->sujet = $sujet;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function setType($type)
    {
        $this->type = $type;
    }
}
