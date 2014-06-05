<?php
if (!isset($_SESSION['login'])) {
	header ('Location: signin.php');
	exit();
}else{
   header ('Location: forPhysicians.php');
	 exit();
}
?>

<html>
<head>
<title>Espace membre</title>
</head>

<body>
Bienvenue <?php echo htmlentities(trim($_SESSION['login'])); ?> !<br />

<?php echo $_SESSION ['loggedDoctor']['nom']; ?><br />
<a href="myProfile.php">Voir profile</a>
</body>
</html>