<?php
class config{   
    private static $instance = NULL;

    public static function getConnexion()
	{
        if (!isset(self::$instance)) 
		{
		try{
            self::$instance = new PDO('mysql:host=localhost;port=3306;dbname=apprentech1', 'root', '');
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(Exception $e){
            die('Erreur: '.$e->getMessage());
		}
      }
      return self::$instance;
	}
}
?>