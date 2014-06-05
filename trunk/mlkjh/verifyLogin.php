<?php

include "inc/functions.php";

	if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass']))) {
		
		$_SESSION['login']= $_POST['login'];
		$_SESSION['pass']= $_POST['pass'];
		
	// on teste si une entrée de la base contient ce couple email / password
	$verify = new medecin;
	$res = $verify->verify_login();
		// si on obtient une réponse, alors l'utilisateur est un membre
		if ($res == 1) {
	
			$_SESSION['login'] = $_POST['login'];
			header('Location: myProfile.php');
			
		}
		// si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
		elseif ($res == 0) {
			
				echo '<script language="javascript">
						alert("Email ou Mot de passe Incorrect");
					  </script>';
				
				//header('Location: signin.php');
				
		}
		// sinon, alors la, il y a un gros problème :)
		else {
			$erreur = 'Probème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.';
		}
	}
	else {
	//$erreur = 'Au moins un des champs est vide.';
			echo '<script language="javascript">
					alert("Au moins un des champs est vide");
				  </script>';
	}
	
	if (isset($erreur)) echo '<br />',$erreur;

?>
