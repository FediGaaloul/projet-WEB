<?php

class User 
{ 
  private $id  ; 
  private $firstname = null ; 
  private $lastname = null ; 
  private $email = null ; 
  private $password = null ; 
  private $roles = null; 
  private $dateins = null ; 

  public function __construct($id, $firstname, $lastname, $email, $password, $roles , $dateins) {
    $this->id = $id;
    $this->firstname = $firstname;
    $this->lastname = $lastname;
    $this->email = $email;
    $this->password = $password;
    $this->roles = $roles;
    $this->dateins=$dateins;
  }

  // Getter methods
  public function getId() {
    return $this->id;
  }

  public function getFirstname() {
    return $this->firstname;
  }

  public function getLastname() {
    return $this->lastname;
  }

  public function getEmail() {
    return $this->email;
  }

  public function getPassword() {
    return $this->password;
  }

  public function getRoles() {
    return $this->roles;
  }

  public function getDate() {
    return $this->dateins;
  }

  // Setter methods
  public function setFirstname($firstname) {
    $this->firstname = $firstname;
  } 

  public function setLastname($lastname) {
    $this->lastname = $lastname;
  }

  public function setEmail($email) {
    $this->email = $email;
  }

  public function setPassword($password) {
    $this->password = $password;
  }

  public function setRoles($roles) {
    $this->roles = $roles;
  }

  public function setDate($dateins) {
    $this->dateins = $dateins;
  } 
}

?>
