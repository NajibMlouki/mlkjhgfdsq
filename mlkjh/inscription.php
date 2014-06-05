<?php

include "inc/functions.php";




// Register1 :
if ($_GET['etape']==01) {
	
	$_SESSION['nom'] = $_POST['nom'] ;
	$_SESSION['prenom'] = $_POST['prenom'] ;
	$_SESSION['genre'] = $_POST['genre'] ;
	$_SESSION['fonction'] = $_POST['fonction'] ;
	$_SESSION['specialite'] = $_POST['specialite'];
	$_SESSION['subSpecialite'] = $_POST['subSpecialite'] ;
	$_SESSION['adresse'] = $_POST['adresse'] ;
	$_SESSION['gouvernorat'] = $_POST['gouvernorat'] ;
	$_SESSION['codePostale'] = $_POST['codePostale'] ;
	$_SESSION['telbureau'] = $_POST['telbureau'] ;
	$_SESSION['telportable'] = $_POST['telportable'] ;
	$_SESSION['fax'] = $_POST['fax'] ;
	
	

	
	
//echo "<input name='prenom' type='hidden' value='".$nom."'>";
	
	
	include "register2.php";
}

// Register2 :
elseif ($_GET['etape']==02) {
	
	$_SESSION['pays_fac']= $_POST['pays_fac'];
	$_SESSION['gouv_fac']= $_POST['gouv_fac'];
	$_SESSION['faculte']= $_POST['faculte'];
	$_SESSION['anneeDiplome']= $_POST['anneeDiplome'];
	$_SESSION['dateNaiss']= $_POST['dateNaiss'];
	
	
	
	include "register3.php";

 }
// Register3 :
elseif ($_GET['etape']==03) {
	
	$_SESSION['email']= $_POST['email'];
	$_SESSION['password']= $_POST['password'];
	$_SESSION['password_confirm']= $_POST['password_confirm'];
	

// on teste l'existence de nos variables. On teste également si elles ne sont pas vides
	if ((isset($_SESSION['email']) && !empty($_SESSION['email'])) && (isset($_SESSION['password']) && !empty($_SESSION['password'])) && (isset($_SESSION['password_confirm']) && !empty($_SESSION['password_confirm']))) {
	// on teste les deux mots de passe
	if ($_SESSION['password'] != $_SESSION['password_confirm']) {
		$erreur = 'Les 2 mots de passe sont différents.';
		}
		else {
			// on recherche si ce login est déjà utilisé par un autre membre
			$verify = new medecin;
			$res = $verify->verify_email();
			$data = mysql_fetch_array($res);
	
					if ($data[0] == 0) {
					$medecin = new medecin;
					$Resultat = $medecin->add_medecin($_SESSION['nom'],$_SESSION['prenom'],$_SESSION['genre'],$_SESSION['fonction'],$_SESSION['specialite'],$_SESSION['subSpecialite'],$_SESSION['adresse'],$_SESSION['gouvernorat'],$_SESSION['codePostale'],$_SESSION['telbureau'],$_SESSION['telportable'],$_SESSION['fax'] ,$_SESSION['pays_fac'],$_SESSION['gouv_fac'],$_SESSION['faculte'],$_SESSION['anneeDiplome'],$_SESSION['dateNaiss'] ,$_SESSION['email'],$_SESSION['password']);
					
					$output= 'Nom: '.$_SESSION['nom'];
					$output.= '		Prenom: '.$_SESSION['prenom'];
					$output.= '     Adresse: '.$_SESSION['adresse'];
					$output.= '     Pays de faculté: '.$_SESSION['pays_fac'];
					$output.= '     Email: '.$_SESSION['email'];
					$output.= '     Password: '.$_SESSION['password'];
	
	                new logTracing($output);
					
					$_SESSION['login']=$_SESSION['email'];
					$_SESSION['pass']=$_SESSION['password'];
					
					$verify = new medecin;
					$res = $verify->verify_login();
	
					header ('Location: membre.php');

										
					}
					else {
					//$erreur = 'Un membre possède déjà cette adresse Email.';
						echo '<script language="javascript">
								alert("cette adresse Email est déja utilisée");
				  			  </script>';
					}
		}
	}
	else {
	$erreur = 'Au moins un des champs est vide.';
	}		
if (isset($erreur)) echo '<br />',$erreur;
	

}



  

?>
