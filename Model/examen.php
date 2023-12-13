<?php
	class examen{
		private $id_examen=null;
		private $ID_Cours=null;
		private $Date_examen=null;
        private $duree=null;
		function __construct($id_examen,$ID_Cours,$Date_examen,$duree){
			$this->id_examen=$id_examen;
			$this->ID_Cours=$ID_Cours;
			$this->Date_examen=$Date_examen;
			$this->duree=$duree;
		}
		function getid_examen(){
			return $this->id_examen;
		}
		function getID_Cours(){
			return $this->ID_Cours;
		}
		function getDate_examen(){
			return $this->Date_examen;
		}
		function getduree(){
			return $this->duree;
		}
		function setDate_examen(string $Date_examen){
			$this->Date_examen= $Date_examen;
		}
		function setduree(string $duree){
			$this->duree=$duree;
		}
		
		
	}