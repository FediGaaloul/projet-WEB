<?php
//include '../config.php';
include_once '../Controller/tache.php';
class Ticket {
    private  ?int $IDT=null;
    private  ?int $IDU=null;
    private ?string $NomPrenom=null;
    private ?email $email=null;
    private ?int $telephone=null;
    private ?string $sujet=null;
    private  ?string $statut_ticket=null;
     private  ?int $priorite=null;

    public function __construct( $IDT=null,  $IDU, $NomPrenom, $email, $telephone ,$sujet, $statut_ticket, $priorite) {
        $this->IDT = $IDT;
        $this->IDU = $IDU;
        $this->NomPrenom = $NomPrenom;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->sujet = $sujet;
        $this->statut_ticket = $statut_ticket;
        $this->priorite = $priorite;
    }

    // Getters
    public function getIDT() {
        return $this->IDT;
    }

    public function getIDU() {
        return $this->IDU;
    }

    public function getSujet() {
        return $this->sujet;
    }

    public function getNP() {
        return $this->NomPrenom;
    }

    public function getemail() {
        return $this->email;
    }

    public function getelephone() {
        return $this->telephone;
    }

    public function getStatutTicket() {
        return $this->statut_ticket;
    }

   

    public function getPriorite() {
        return $this->priorite;
    }

    // Setters
    public function setIDU($IDU) {
        $this->IDU = $IDU;
        return $this;
    }

    public function setSujet($sujet) {
        $this->sujet = $sujet;
        return $this;
    }

    public function setNP($NomPrenom) {
        $this->NomPrenom = $NomPrenom;
        return $this;
    }

    public function setemail($email) {
        $this->email = $email;
        return $this;
    }

    public function setelephone($telephone) {
        $this->telephone = $telephone;
        return $this;
    }

    public function setStatutTicket($statut_ticket) {
        $this->statut_ticket = $statut_ticket;
        return $this;
    }

  
    public function setPriorite($priorite) {
        $this->priorite = $priorite;
        return $this;
    }

}?>