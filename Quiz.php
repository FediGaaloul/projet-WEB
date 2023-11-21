<?php
	class Quiz{
		private $id_quiz=null;
		private $titre=null;
		function __construct($id_quiz,$titre){
			$this->id_quiz=$id_quiz;
			$this->titre=$titre;
		}
		function getid_quiz(){
			return $this->id_quiz;
		}
		function gettitre(){
			return $this->titre;
		}
		function settitre(string $titre){
			$this->titre=$titre;
		}
		
	}