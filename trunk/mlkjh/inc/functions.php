<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$DEFAULT_DR_AVATAR_MAN="People-Doctor-Male-icon.png";
$DEFAULT_DR_AVATAR_WOMEN="People-Doctor-Female-icon.png";
$DEFAULT_DR_MARKER_IMG_MAN="doctorMarker-H.png";
$DEFAULT_DR_MARKER_IMG_WOMEN="doctorMarker-F.png";
class Base
{
	private $server = "localhost";
	private $user = "root";
	private $pswd = "";
	private $base = "Doctunisie2";
	
	function __construct()
	{
			
		mysql_connect($this->server, $this->user, $this->pswd) or die ($this->logConnexErr("class Base : Erreur connexion serveur".mysql_error()) );
		
		mysql_select_db($this->base);
		
		mysql_query("SET NAMES UTF8");

	}
	
	public function ExecuteRqSelect($Rq)
	{
    $Result = mysql_query($Rq)or die($this->logConnexErr('class Base: erreur de sql:'.$Rq.' : '.mysql_error()));
    return $Result;
	}
  
  public function logConnexErr($Rq)
  {
    new logTracing($Rq);
    return '';
  }
  
	
	
}

 class Search extends Base
{        
       public $result3;
       public $nbRows=0;
       public $search_result;
       
       function __construct()
       {
               
         parent::__construct();      
       }
       
       
       public function search($keyWords)
       {

                              
               $request = "select * from  annuaire where LOWER(all_infos) like '%".strtolower($keyWords)."%'";
               
               //new logTracing(" Search request:".$request); 
               
               $res= parent::ExecuteRqSelect($request);
               
               $this->nbRows = mysql_num_rows($res);
                
               $this->result3=$res;
               if($this->nbRows>0){
                    $this->search_result="$this->nbRows Médécins trouvés";
               }else{
                   $this->search_result='Pas de resultats trouvés correspondant à vos critères.';
               } 
 
                               
       }
       
       //----------------------------------------------
       
}


 class SearchMap extends Base
{        
       public $result3;
       public $nbRows=0;
       public $search_result;
       
       function __construct()
       {
               
         parent::__construct();      
       }
       
       
       public function searchMap($keyWords)
       {

               $request = "select a . * , m.lat, m.lng from  annuaire a, markers m where a.id = m.idmedecin and LOWER(all_infos) like '%".strtolower($keyWords)."%'  ";
               
               new logTracing(" SearchMap request:".$request); 
               
               $res= parent::ExecuteRqSelect($request);
               
               $this->nbRows = mysql_num_rows($res);
                
               $this->result3=$res;
               if($this->nbRows>0){
                    $this->search_result="$this->nbRows Médécins trouvés sur Doctunisie Map";
               }else{
                   $this->search_result='Pas de resultats trouvés correspondant à vos critères.';
               } 
 
                               
       }
       
       //----------------------------------------------
       
}



class ListFromTable extends Base
{	
	private $result2;
	
	//-------------------------------------------
			
	function  voirListOptions($Table,$value,$label)
	{
		
		$result1="";
		$req="select ".$value.",".$label." from ".$Table."";
		$res= parent::ExecuteRqSelect($req);
		
	  	while ($row = mysql_fetch_array($res, MYSQL_ASSOC)) 
		{
			$id=($row[$value]);
			$lab=($row[$label]);
			$result1=$result1." <option value=' ".($id)."'> ".($lab)." </option>";								
	
		}
		return $result1;
		
	}
	
	//-------------------------------------------
	
	function __construct($Table,$value,$label)
	{
		parent::__construct();
		$this->result2=$this->voirListOptions($Table,$value,$label);
		echo $this->result2;
		
	}
	//-------------------------------------------
	
	}
	
	
	
class getNomById extends Base
{
		private $result1;
		
		//----------------------------------------------
	
	    function getNom($table,$label,$id,$idValue)
		 {
			if (!empty($idValue)){
				$req=" SELECT ".$label." FROM  ".$table." 
					   WHERE ".$id." = ".$idValue;
				
				new logTracing($req);
						
				$result= parent::ExecuteRqSelect($req);
				
				return mysql_result($result, 0);
			}
		 }
  		//----------------------------------------------
		function __construct($table,$label,$id,$idValue)
			{
				parent::__construct();
				$this->result1=$this->getNom($table,$label,$id,$idValue);
				echo $this->result1;
				
			}
		//----------------------------------------------	
		function __toString()
			{
				return $this->result1;
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
		
		$fileName='C:/wamp/www/DocTunisie2/phpLib/trace.log';
		
		$dateLog= date("d-M-Y , H:i:s", mktime( date("H")+2, date("i"), date("s"), date("m"), date("d"), date("Y")));
		
		$outputLog = $dateLog.' | ';
		$outputLog.= $output;
		$outputLog.= " \n \n ";
		
		file_put_contents($fileName, $outputLog, FILE_APPEND | LOCK_EX);
    return '';
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
	
	
	
class medecin extends Base
{	
	
	function add_medecin($nom,$prenom,$genre,$fonction,$specialite,$subSpecialite,$adresse,$gouvernorat,$codePostale,$telbureau,$telportable,$fax,$pays_fac,$gouv_fac,$faculte,$anneeDiplome,$dateNaiss,$email,$password)
	{
	
		$req="INSERT INTO medecin (idMedecin, nom, prenom, genre, fonction, specialite, subSpecialite, adresse, gouvernorat, codePostale, telbureau, telportable, fax, pays_fac, gouv_fac, faculte, anneeDiplome, dateNaiss, email, password)
		 VALUES ('','".$nom."','".$prenom."','".$genre."','".$fonction."',".$specialite.",'".$subSpecialite."','".$adresse."','".$gouvernorat."','".$codePostale."','".$telbureau."','".$telportable."','".$fax."','".$pays_fac."','".$gouv_fac."','".$faculte."','".$anneeDiplome."','".$dateNaiss."','".$email."','".$password."')";
		 
		 new logTracing($req);
	
	
		return parent::ExecuteRqSelect($req);
	
	
	}
	
	//-------------------------------------------
	
	function verify_login()
	{

	    // on recherche si ce login est d&eacute;jà utilis&eacute; par un autre membre
		$req = 'SELECT idMedecin, nom, prenom, genre, fonction, specialite, subSpecialite, dateNaiss, anneeDiplome, adresse, gouvernorat, codePostale, telbureau, telportable, fax, email, password, faculte, pays_fac, gouv_fac, imgProfile  FROM medecin WHERE email="'.mysql_escape_string($_SESSION['login']).'" AND password="'.mysql_escape_string($_SESSION['pass']).'"';
		
		
		 $result = parent::ExecuteRqSelect($req);
		 
		 $nbRows = mysql_num_rows($result);

		 if($nbRows==1){
			
			$_SESSION ['loggedDoctor'] = mysql_fetch_assoc($result);
       
		 }
		 
		 
		return $nbRows;
		
		
	}	
	
	//-------------------------------------------
		
	function verify_email()
	{

	    // on recherche si cet Email est d&eacute;jà utilis&eacute; par un autre membre
		$req = 'SELECT count(*) FROM medecin WHERE email="'.mysql_escape_string($_SESSION['email']).'"';
		
		return parent::ExecuteRqSelect($req);
		
	}
		
	//-------------------------------------------
		
	}




class myProfile extends Base
{	

	//----------------------------------------------
	    function select_histoireTravail()
	{

		$req="SELECT  institution.nom, experience.titre, experience.departement, experience.description ,  gouvernorat.label AS lab_gouv, pays.label AS lab_pays, experience.dateDebut, experience.dateFin 
			  FROM   experience, institution, medecin, gouvernorat, pays 
		      WHERE  experience.id_institut = institution.id_institut 
			  AND   experience.idMedecin = medecin.idMedecin
			  AND   institution.gouvernorat = gouvernorat.id_gouv
			  AND   institution.pays = pays.id_pays   
			  AND   medecin.email = '".$_SESSION['login']."'";
		
		$result= parent::ExecuteRqSelect($req);
		 
		$nbRows = mysql_num_rows($result);
		
		while($tab = mysql_fetch_assoc($result)){
			
			include 'histoireTravail.php';
			
			}
				
	}
	
	//----------------------------------------------
	
	     function add_histoireTravail($idMedecin,$id_institut,$titre,$departement,$dateDebut,$dateFin)
	{

		$req="INSERT INTO experience (idExperience, idMedecin, id_institut, titre, departement, dateDebut, dateFin, description)
		 VALUES ('','".$idMedecin."','".$id_institut."','".$titre."','".$departement."',".$dateDebut.",'".$dateFin."')";
		
		new logTracing($req);
		
		return parent::ExecuteRqSelect($req);
		
	}
	
	//----------------------------------------------
	 
		
		function select_educationTraining()
	{

		$req="SELECT  formation.formation, institution.nom, gouvernorat.label AS lab_gouv, formation.typeProgram, pays.label AS lab_pays, formation.dateDeb, formation.dateFin 
			  FROM   formation, institution, medecin, gouvernorat, pays 
		      WHERE  formation.institution = institution.id_institut 
			  AND   formation.idMedecin = medecin.idMedecin
			  AND   institution.gouvernorat = gouvernorat.id_gouv
			  AND   institution.pays = pays.id_pays   
			  AND   medecin.email = '".$_SESSION['login']."'";
		
		$result= parent::ExecuteRqSelect($req);
		 
		$nbRows = mysql_num_rows($result);
		
		while($tab = mysql_fetch_assoc($result)){
			
			include 'EducationTraining.php';
			
			}
				
	}
	
	//----------------------------------------------
	    function select_certification()
	{

		$req="SELECT  certification.certificat, certification.ville, certification.date
			  FROM   certification, medecin 
		      WHERE  certification.idMedecin = medecin.idMedecin 
			  AND   medecin.email = '".$_SESSION['login']."'";
		
		$result= parent::ExecuteRqSelect($req);
		 
		$nbRows = mysql_num_rows($result);
		
		while($tab = mysql_fetch_assoc($result)){
			
			include 'Certification.php';
			
			}
				
	}
	
	//----------------------------------------------
	    function select_recompenses()
	{

		$req="SELECT   recompenses.titre, recompenses.organisation, recompenses.date, recompenses.description 
			  FROM    recompenses, medecin 
		      WHERE  recompenses.idMedecin = medecin.idMedecin 
			  AND   medecin.email = '".$_SESSION['login']."'";
		
		$result= parent::ExecuteRqSelect($req);
		 
		$nbRows = mysql_num_rows($result);
		
		while($tab = mysql_fetch_assoc($result)){
			
			include 'recompenses.php';
			
			}
				
	}
	
	//----------------------------------------------
	    function select_activites()
	{

		$req="SELECT   activites.type_activ, activites.titre, activites.description, activites.date
			  FROM    activites, medecin 
		      WHERE  activites.idMedecin = medecin.idMedecin 
			  AND   medecin.email = '".$_SESSION['login']."'";
		
		$result= parent::ExecuteRqSelect($req);
		 
		$nbRows = mysql_num_rows($result);
		
		while($tab = mysql_fetch_assoc($result)){
			
			include 'activites.php';
			
			}
				
	}
	
	//----------------------------------------------
	    function select_association()
	{

		$req="SELECT  institution.nom, medinstitut.fonction 
			  FROM   medinstitut, institution, medecin, typeinstitut
		      WHERE   medinstitut.id_institut = institution.id_institut 
			  AND   medinstitut.idMedecin = medecin.idMedecin
			  AND   institution.type = typeinstitut.idType
			  AND   typeinstitut.nom = 'Association'
			  AND   medecin.email = '".$_SESSION['login']."'";
		
		$result= parent::ExecuteRqSelect($req);
		 
		$nbRows = mysql_num_rows($result);
		
		while($tab = mysql_fetch_assoc($result)){
		
	     	include 'association.php';
			
			}
				
	}
	
	//----------------------------------------------
	    function select_langues()
	{

		$req="SELECT  langues.label 
			  FROM   medecin, langues, doclangues
		      WHERE   doclangues.idMedecin = medecin.idMedecin 
			  AND   doclangues.id_langue = langues.id_langue
			  AND   medecin.email = '".$_SESSION['login']."'";
		
		$result= parent::ExecuteRqSelect($req);
		 
		$nbRows = mysql_num_rows($result);
		
		while($tab = mysql_fetch_assoc($result)){
		
	     	echo '<em> '. $tab['label'] .'  </em> ' ;
			
			}
				
	}
	
	//----------------------------------------------
	    function select_instAffiliation()
	{

		$req="SELECT  institution.nom, occupation.label  AS  lab_occup, gouvernorat.label  AS  lab_gouv, medinstitut.fonction 
			  FROM   medinstitut, institution, medecin, gouvernorat, occupation, typeinstitut
		      WHERE   medinstitut.id_institut = institution.id_institut 
			  AND   medinstitut.idMedecin = medecin.idMedecin
			  AND   institution.gouvernorat = gouvernorat.id_gouv
			  AND   medinstitut.occupation = occupation.id_occup
			  AND   institution.type= typeinstitut.idType
              AND   typeinstitut.nom  IN ('clinique','hopital') 
			  AND   medecin.email = '".$_SESSION['login']."'";
		
		$result= parent::ExecuteRqSelect($req);
		 
		$nbRows = mysql_num_rows($result);
		
		while($tab = mysql_fetch_assoc($result)){
		
	     	include 'hospitalAffiliation.php';
			
			}
				
	}
	
	//----------------------------------------------
	    function select_assurances()
	{

		$req="SELECT  institution.nom 
			  FROM   medinstitut, institution, medecin, typeinstitut
		      WHERE   medinstitut.id_institut = institution.id_institut 
			  AND   medinstitut.idMedecin = medecin.idMedecin
			  AND   institution.type = typeinstitut.idType
			  AND   typeinstitut.nom = 'Assurance' 
			  AND   medecin.email = '".$_SESSION['login']."'";
		
		$result= parent::ExecuteRqSelect($req);
		 
		$nbRows = mysql_num_rows($result);
		
		while($tab = mysql_fetch_assoc($result)){
		
			echo  '<li>
			 <small class="editlinks"> 
        <a href="/profile#" >Modifier</a> 
        </small> 
			<a class="strong" href="/hospitals/5632">'.$tab['nom'].'</a> 
			</li> ';
			
			}
				
	}
	
	
	}				




class specialites extends Base
{
		
		function selection_specialites()
	{

		$req="select id_spec, label from specialites";
		
		return parent::ExecuteRqSelect($req);
				
	}
	
	function add_specialites($id_spec,$label)
	{
	
		$req="INSERT INTO specialites (id_spec, label)
		 VALUES ('','".$label."')";
		
		return parent::ExecuteRq($req);
	}
	
	function delete_specialites($id_spec)
	{
		$req = "delete from specialites where id_spec='".$id_spec."'";

		return parent::ExecuteRq($req);
	}
	function update_specialites($id_spec,$label)
	{
		$req = "update specialites set id_spec='".$id_spec."', label='".$label."'  where id_spec='".$id_spec."'";

		return parent::ExecuteRq($req);
	}
	
	function getSpecialitesById($id_spec)
{

$req = "select * from specialites where id_spec=".$id_spec;
		return parent::ExecuteRqSelect($req);


}
	
	}




class gouvernorat extends Base
{
		
		function selection_gouvernorat()
	{

		$req="select id_gouv, label from gouvernorat";
		
		return parent::ExecuteRqSelect($req);
				
	}
	
	function add_gouvernorat($id_gouv,$label)
	{
	
		$req="INSERT INTO gouvernorat (id_gouv, label)
		 VALUES ('','".$label."')";
		
		
		return parent::ExecuteRq($req);
	}
	
	function delete_gouvernorat($id_gouv)
	{
		$req = "delete from specialites where id_gouv='".$id_gouv."'";

		return parent::ExecuteRq($req);
	}
	function update_gouvernorat($id_gouv,$label)
	{
		$req = "update specialites set id_gouv='".$id_gouv."', label='".$label."'  where id_gouv='".$id_gouv."'";

		return parent::ExecuteRq($req);
	}
	
	function getGouvernoratById($id_gouv)
{

$req = "select * from specialites where id_gouv=".$id_gouv;
		return parent::ExecuteRqSelect($req);


}
	
	}
	



class occupation extends Base
{
		
		function selection_occupation()
	{

		$req="select id_occup, label from occupation";
		
		return parent::ExecuteRqSelect($req);
				
	}
	
	function add_occupation($id_occup,$label)
	{
	
		$req="INSERT INTO occupation (id_occup, label)
		 VALUES ('','".$label."')";
		
		
		return parent::ExecuteRq($req);
	}
	
	function delete_occupation($id_occup)
	{
		$req = "delete from occupation where id_occup='".$id_occup."'";

		return parent::ExecuteRq($req);
	}
	function update_occupation($id_occup,$label)
	{
		$req = "update occupation set id_occup='".$id_occup."', label='".$label."'  where id_occup='".$id_occup."'";

		return parent::ExecuteRq($req);
	}
	
	function getOccupationById($id_occup)
{

$req = "select * from occupation where id_occup=".$id_occup;
		return parent::ExecuteRqSelect($req);


}
	
	}	




class pays extends Base
{
		
		function selection_pays()
	{

		$req="select id_pays, label from pays";
		
		return parent::ExecuteRqSelect($req);
				
	}
	
	function add_pays($id_pays,$label)
	{
	
		$req="INSERT INTO pays (id_pays, label)
		 VALUES ('','".$label."')";
		
		
		return parent::ExecuteRq($req);
	}
	
	function delete_pays($id_pays)
	{
		$req = "delete from pays where id_pays='".$id_pays."'";

		return parent::ExecuteRq($req);
	}
	function update_pays($id_pays,$label)
	{
		$req = "update pays set id_pays='".$id_pays."', label='".$label."'  where id_pays='".$id_pays."'";

		return parent::ExecuteRq($req);
	}
	
	function getPaysById($id_pays)
{

$req = "select * from pays where id_pays=".$id_pays;
		return parent::ExecuteRqSelect($req);


}
	
	}		




class institution extends Base
{
		
		function selection_institution()
	{

		$req="select id_institut, nom from institution";
		
		return parent::ExecuteRqSelect($req);
				
	}
	
	
	
	function add_institution($id_institut,$nom)
	{
	
		$req="INSERT INTO institution (id_institut, nom)
		 VALUES ('','".$nom."')";
		
		
		return parent::ExecuteRq($req);
	}
	
	function delete_institution($id_institut)
	{
		$req = "delete from institution where id_institut='".$id_institut."'";

		return parent::ExecuteRq($req);
	}
	function update_institution($id_institut,$nom)
	{
		$req = "update institution set id_institut='".$id_institut."', nom='".$nom."'  where id_institut='".$id_institut."'";

		return parent::ExecuteRq($req);
	}
	
	function getinstitutionById($id_institut)
{

$req = "select * from institution where id_institut=".$id_institut;
		return parent::ExecuteRqSelect($req);


}
	
	}				




?>	
