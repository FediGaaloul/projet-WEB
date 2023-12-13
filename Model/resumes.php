<?php
	class resumes{
		private $cours;
		private $id_resumes=null;
		private $id_cours=null;
		private $Titre_R=null;
		private $Auteur_etudiant_enseingant=null;
        private $Date_de_creation=null;
		function __construct($id_resumes,$id_cours,$Titre_R,$Auteur_etudiant_enseingant,$Date_de_creation){
			$this->id_resumes=$id_resumes;
            $this->id_cours=$id_cours;
			$this->Titre_R=$Titre_R;
            $this->Auteur_etudiant_enseingant=$Auteur_etudiant_enseingant;
			$this->Date_de_creation=$Date_de_creation;
		}
		function getid_resumes(){
			return $this->id_resumes;
		}
        function getid_cours(){
			return $this->id_cours;
		}
		function getTitre_R(){
			return $this->Titre_R;
		}
		function getAuteur_etudiant_enseingant(){
			return $this->Auteur_etudiant_enseingant;
		}
		function getDate_de_creation(){
			return $this->Date_de_creation;
		}		
		function setTitre_R(string $Titre_R){
			$this->Titre_R= $Titre_R;
		}
		function setAuteur_etudiant_enseingant(string $Auteur_etudiant_enseingant){
			$this->Auteur_etudiant_enseingant=$Auteur_etudiant_enseingant;
		}
        function setDate_de_creation(string $Date_de_creation){
			$this->Date_de_creation=$Date_de_creation;
		}		
		
	}