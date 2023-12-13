<?php
	class cours{
		private $ID_Cours=null;
		private $Titre_C=null;
		private $Date_D_C=null;
		private $Date_F_C=null;
        private $Niv_Diff=null;
		private $Categories=null;
		private $ID_utlisateur=null;
        private $Status=null;
		private $prix=null;

		function __construct($ID_Cours,$Titre_C,$Date_D_C,$Date_F_C,$Niv_Diff,$Categories,$ID_utlisateur,$Status,$prix){
			$this->ID_Cours=$ID_Cours;
			$this->Titre_C=$Titre_C;
			$this->Date_D_C=$Date_D_C;
			$this->Date_F_C=$Date_F_C;
			$this->Niv_Diff=$Niv_Diff;
            $this->Categories=$Categories;
            $this->ID_utlisateur=$ID_utlisateur;
            $this->Status=$Status;
			$this->prix=$prix;
		}
		function getID_Cours(){
			return $this->ID_Cours;
		}
		function getTitre_C(){
			return $this->Titre_C;
		}
		function getDate_D_C(){
			return $this->Date_D_C;
		}
		function getDate_F_C(){
			return $this->Date_F_C;
		}
		function getNiv_Diff(){
			return $this->Niv_Diff;
		}
		function getCategories(){
			return $this->Categories;
		}
		function getID_utlisateur(){
			return $this->ID_utlisateur;
		}     
        function getStatus(){
			return $this->Status;
		}
		function getprix(){
			return $this->prix;
		}
		function setTitre_C(string $Titre_C){
			$this->Titre_C= $Titre_C;
		}
		function setDate_D_C(string $Date_D_C){
			$this->Date_D_C=$Date_D_C;
		}
        function setDate_F_C(string $Date_F_C){
			$this->Date_F_C=$Date_F_C;
		}
		function setNiv_Diff(string $Niv_Diff){
			$this->Niv_Diff=$Niv_Diff;
		}
		function setCategories(string $Categories){
			$this->Categories=$Categories;
		}
		function setID_utlisateur(string $ID_utlisateur){
			$this->ID_utlisateur=$ID_utlisateur;
		}
        function setStatus(string $Status){
			$this->Status=$Status;
		}
		function setprix(string $prix){
			$this->Status=$prix;
		}
		
		
	}