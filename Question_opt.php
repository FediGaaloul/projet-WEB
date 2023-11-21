<?php
	class question_opt{
		private $id_opt=null;
		private $is_right=null;
		private $opt=null;
		private $id_quest=null;


		function __construct($id_opt,$is_right,$opt,$id_quest){
			$this->id_opt=$id_opt;
			$this->is_right=$is_right;
			$this->opt=$opt;
			$this->id_quest=$id_quest;


		}
		function getid_opt(){
			return $this->id_opt;
		}
		function getis_right(){
			return $this->is_right;
		}
		function setis_right(string $is_right){
			$this->is_right=$is_right;
		}
		function getopt(){
			return $this->opt;
		}
		function setopt(string $opt){
			$this->opt=$opt;
		}
		function getid_quest(){
			return $this->id_quest;
		}
	}