<?php
//include '../config.php';
include_once '../Controller/tache.php';
class Ticket {
    private  ?int $IDT=null;
    private  ?int $IDU=null;
    private ?string $sujet=null;
    private  ?string $statut_ticket=null;
   // private  ?DateTime $Date_de_creation=null;
    private  ?string $priorite=null;

    public function __construct( $IDT=null,  $IDU,  $sujet, $statut_ticket,  /*$Date_de_creation,*/  $priorite) {
        $this->IDT = $IDT;
        $this->IDU = $IDU;
        $this->sujet = $sujet;
        $this->statut_ticket = $statut_ticket;
        //$this->Date_de_creation = new DateTime($Date_de_creation);
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

    public function getStatutTicket() {
        return $this->statut_ticket;
    }

   /* public function getDateCreation() {
        return $this->Date_de_creation;
    }*/

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

    public function setStatutTicket($statut_ticket) {
        $this->statut_ticket = $statut_ticket;
        return $this;
    }

    /*public function setDateCreation($Date_de_creation) {
        $this->Date_de_creation = $Date_de_creation;
        return $this;
    }*/

    public function setPriorite($priorite) {
        $this->priorite = $priorite;
        return $this;
    }

}?>