<?php
class Transaction
{
    private $id_transaction = null;
    private $id_cours = null;
    private $id_user = null;
    private $id = null;
    private $montant = null;
    private $date_transaction = null;

    public function __construct($id_transaction, $id_cours, $id_user, $id, $montant, $date_transaction)
    {
        $this->id_transaction = $id_transaction;
        $this->id_cours = $id_cours;
        $this->id_user = $id_user;
        $this->id = $id;
        $this->montant = $montant;
        $this->date_transaction = $date_transaction;
    }

    public function getIdTransaction()
    {
        return $this->id_transaction;
    }

    public function getIdCours( )
    {
        return $this->id_cours;
    }

    public function getIdUser()
    {
        return $this->id_user;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getMontant()
    {
        return $this->montant;
    }

    public function getDateTransaction()
    {
        return $this->date_transaction;
    }
    public function setIdTransaction(int $id_transaction)
    {
        $this->id_transaction = $id_transaction;
    }

    public function setIdCours(int $id_cours)
    {
        $this->id_cours = $id_cours;
    }

    public function setIdUser(int $id_user)
    {
        $this->id_user = $id_user;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setMontant(int $montant)
    {
        $this->montant = $montant;
    }

    public function setDateTransaction(string $date_transaction)
    {
        $this->date_transaction = $date_transaction;
    }

}
?>
