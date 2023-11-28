<?php
//include '../config.php';
include_once '../Controller/inter.php';
class inter {
    private  ?int $IDi=null;
    private  ?int $IDt=null;
    private ?string $type_interv=null;
   
 
    public function __construct( $IDi=null,  $IDt,  $type_interv, ) {
        $this->IDi = $IDi;
        $this->IDU = $IDt;
        $this->sujet = $type_interv;
    }

    // Getters
    public function getIDi() {
        return $this->IDt;
    }

    public function getIDt() {
        return $this->IDt;
    }

    public function getTypeinterv() {
        return $this->type_interv;
    }

   
    // Setters
    public function setIDt($IDt) {
        $this->IDt = $IDt;
        return $this;
    }

    public function setTypeinterv($type_interv) {
        $this->type_interv = $type_interv;
        return $this;
    }


}?>