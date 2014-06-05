<?php



class Base
{
	private $server;
	private $user;
	private $pswd;
	private $base;
	
	function __construct()
	{
		$server = "localhost";
		$user = "root";
		$pswd = "";
		$base = "doctunisie";
		
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

class logTracing 
{
		
	function __construct($output)
	{
		
		$this->traceLog($output);
		
	}
	
	//-------------------------------------------
	
	function traceLog($output){
		
		$fileName='trace.log';
		
		$dateLog= date("d-M-Y , H:i:s", mktime( date("H")+2, date("i"), date("s"), date("m"), date("d"), date("Y")));
		
		$outputLog = $dateLog.' | ';
		$outputLog.= $output;
		$outputLog.= " \n \n ";
		
		file_put_contents($fileName, $outputLog, FILE_APPEND | LOCK_EX);
	}
	
	//-------------------------------------------
	
	function traceLogFile($fileName,$output){
		$dateLog= date("d-M-Y , H:i:s", mktime( date("H")+1, date("i"), date("s"), date("m"), date("d"), date("Y")));
		
		$outputLog = $dateLog.' | ';
		$outputLog.= $output;
		$outputLog.= " \n \n ";
		
		file_put_contents($fileName, $outputLog, FILE_APPEND | LOCK_EX);
	}
	
	
	}

class myProfile extends Base
{
	function add_histoireTravail($idMedecin,$id_institut,$titre,$departement,$dateDebut,$dateFin)
		{

			$req="INSERT INTO experience (idExperience, idMedecin, id_institut, titre, departement, dateDebut, dateFin, description)
			 VALUES ('','".$idMedecin."','".$id_institut."','".$titre."','".$departement."',".$dateDebut.",'".$dateFin."')";
			
			new logTracing($req);
			
			return parent::ExecuteRqSelect($req);
			
		}
}

$titre = $_POST['titre'];
$departement = $_POST['departement'];
$description = $_POST['description'];

$profil = new myProfile;
$res= $profil->add_histoireTravail(52,1,$titre,$departement,$description,2008-03-10,2014-03-01);
					
					$output= 'Titre: '.$titre;
					$output.= '		departement: '.$departement;
					$output.= '     description: '.$description;
	
	                new logTracing($output);


?>