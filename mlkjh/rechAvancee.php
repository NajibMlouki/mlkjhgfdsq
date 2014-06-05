<!DOCTYPE html>

<html class="">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta charset="utf-8">
<link href="./css/home-90023d7853244299be90f56b5bc24e3f.css" media="screen" rel="stylesheet" type="text/css">
<title>Recherche Doctunisie</title>

<link href="./css/css" media="screen" rel="stylesheet" type="text/css">
<link href="./css/common-d0be4c6e73062d764c176e6fde7fb859.css" media="all" rel="stylesheet" type="text/css">
<link href="./css/common-48b47f12185172f2d1859c37be61963a.css" media="all" rel="stylesheet" type="text/css" />
<link href="./css/signin-975c90990af4e235f49cf601c41a0917.css" media="screen" rel="stylesheet" type="text/css" />
<script src="./js/application-2d39b9d84ac29fbd53e6f0447918910e.js" type="text/javascript"></script>

</head>

<body>
<div class="wrap">
<div class="mast">
<div class="inner">
      <p id="logoin">
	     <a href="index.html"><img alt="Logo-onblack" src="./img/logo-doctunisie_00.png" /></a></p>
      <ul class="signedout"  style="display: yes;" id="nav">
        <li id="signnow"><a href="signin.php">Identifiez-vous</a></li>
        <li id="signnow"><a href="register1.php">S'inscrire</a></li>
      </ul>
    </div>
</div>

<div class="page">
 <?php    
	    include 'inc/functions.php';       
	  ?>
      
 <form accept-charset="UTF-8" action="rechMedecin.php" method="post">
       
<fieldset>
  <br/><br/><br/>
  Nom Complet
  <p>
    <span class="label">
      <span class="col-1-3">
        
       </span>
      <span class="col-2-3">
        <input class="col-1-2" name="prenom" type="text" placeholder="prénom" >
        <input class="col-1-2"  name="nom" type="text" placeholder="nom de famille" >
      </span>
    </span>
  </p>
  <br/>
  <p>
    <label for="">
      <span class="col-1-3">
       
        Occupation
      </span>
      <span class="col-2-3">
        <select class="full" id="user_credentials" name="fonction" data-target="user_credentials" >
          <option value="">
            Choisir...
          </option>
        <?php
	   
	 new ListFromTable("occupation","id_occup","label");
	  ?>
        </select>
      </span>
    </label>
  </p>
  <br/>
  <p id="specialty"><label>
  <span class="col-1-3">
    
    Specialité
  </span>
  <span class="col-2-3">
    <select  class="full" id="spec" name="specialite"  data-target="specialty">
    
      <option value="">
        Choisir...
      </option>
      
	   
      <?php
	  	  
	  new ListFromTable("specialites","id_spec","label");
	  ?>
     
    </select>
  </span>
</label>
</p>
<br/>
<p>
    <label for="">
      <span class="col-1-3">
       
        Gouvernorat
      </span>
      <span class="col-2-3">
        <select class="full" id="user_credentials" name="gouvernorat" data-target="user_credentials" >
          <option value="">
            Choisir...
          </option>
         <?php
		  
	new ListFromTable("gouvernorat","id_gouv","label");
	  
	  ?>
        </select>
      </span>
    </label>
  </p>
</fieldset>
<br/>
<p> <button class="btn blue" type="submit" >
	<span class="translation_missing" title="translation missing: en.Find My Profile">Recherche</span>
	</button> <br>
	</p>    
</form>
</div>
</div>



<div class="foot">
  <p class="navline linknav">
    <span class="copyright">&copy; 2014 DocTunisie, Inc.</span>
    <a href="about.html">A propos nous</a>
	<a href="product.html">Produit</a>
    <a href="press.html">Presse</a>
	<a href="help.html">Contacter</a>
  <a href="privacy.html">Privé</a></p>
  	<p class="navline"><span id="siteseal"><strong>Vérifié et sécurisé<small>SSL: Secure Socket Layer</small></strong></span></p>
</div>
  <a href='#' id='feedbacker'>
  	<img alt="Share your feedback and ideas" src="./img/feedbacktab-5cd1d0dff3a42317e35339cab67b67c3.png" />
  </a>

<!-- feedback -->
<script defer='defer' type='text/javascript'>
var feedback_form = new App.Feedback("");
jQuery('#feedbacker').bind('click', feedback_form.open);
</script>

<!-- furry little rodents -->

<script type="text/javascript">document.getElementById('email').focus();</script>
<!-- end Mixpanel -->
</body>

</html>