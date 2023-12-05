<?php
	class questions{
		private $id_quest=null;
		private $question=null;
		private $id_quiz=null;

		function __construct($id_quest,$question,$id_quiz){
			$this->id_quest=$id_quest;
			$this->question=$question;
			$this->id_quiz=$id_quiz;

		}
		function getid_quest(){
			return $this->id_quest;
		}
		function getid_quiz(){
			return $this->id_quiz;
		}
		function getquestion(){
			return $this->question;
		}
		function setquestion(string $question){
			$this->question=$question;
		}
		
	}