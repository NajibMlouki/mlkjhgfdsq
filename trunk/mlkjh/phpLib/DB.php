<?php

//session_start(); // Création de la session

class DBConnexion{
	private $server;
	private $user;
	private $pswd;
	private $base;
	
	function __construct()
	{
		$server = "localhost";
		$user = "root";
		$pswd = "";
		$base = "doctunisie2";
		
		mysql_connect($server, $user, $pswd) or die ("Erreur connexion serveur");
		
		mysql_select_db($base);
		
		mysql_query("SET NAMES UTF8");

	}
	
	public function ExecuteRqSelect($Rq)
	{
		$Result = mysql_query($Rq);
		
		return $Result;
	}
	
	
}

?>