<?php
include 'inc/functions.php';
if (!isset($_SESSION['login'])) {
}else{
   header ('Location: forPhysicians.php');
	 exit();
}
?>
<!DOCTYPE HTML>
<html >
<head>
<title>Doctunisie Pour les Patients</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<link href="./css/home-d83582b66c6b7a34330696f06aa6c009.css" media="screen" rel="stylesheet" type="text/css">
<link href="./css" media="screen" rel="stylesheet" type="text/css">
<link href="./css/common-48b47f12185172f2d1859c37be61963a.css" media="all" rel="stylesheet" type="text/css">
<link href="./css/marketing-e34018dc990f47f09a6d064160be0c9b.css" media="screen" rel="stylesheet" type="text/css" />
<script src="./js/application-2d39b9d84ac29fbd53e6f0447918910e.js" type="text/javascript"></script>

<style type="text/css">
.fancybox-margin{margin-right:15px;} 
</style>


</head>
<body>
<div class="wrap">
    
   <?php  
          /**
           * Prepare the $REPOSITORY before each include 
           **/                      
          $REPOSITORY='.';
   include 'Template/menuLoguin_tpl.php'; 
   ?>
  <div class="page">
    <div class="notice" data-sel-notice="" id="flash_notice" style="display:none">
      <div class="inner"> <a href="#" class="closer" onClick="document.getElementById(&#39;flash_notice&#39;).style.display = &#39;none&#39;; return false;" title="Dismiss"></a> <span id="flash_message"> </span> </div>
    </div>
    <div class="grid v2" id="home">
      <div class="signup">
        <div class="col-1-2" style="margin: 150px 0 40px 0;">
          <h1>Trouvez Médecins</h1>
          <h2>Doctunisie rend votre vie plus facile.</h2>
          <hr>
          <div class="register">
          <!-- onSubmit="return submitRegistrationForm1(event); return false;" -->
            <form accept-charset="UTF-8" action="index.php" method="get" name="newreg" >
              <div style="margin:0;padding:0;display:inline">
                <input name="searchAction" type="hidden" value="true">
              </div>
              <fieldset>
              <label>
              <input id="first_name" name="key_words" placeholder="Nom Prénom Spécialité Lieu" tabindex="1"  type="text" style="width: 270px;">
              </label>
              <!--
              <label>
              <input id="last_name" name="last_name" placeholder="Prénom" tabindex="2" type="text">
              </label>
              -->
              <button class="btn blue" id="submit_reg_search" name="button" tabindex="3" type="submit">Recherche</button>
              <br>
              <p><a href="/signin" class="signin">Identifiez vous</a></p>
              </fieldset>
            </form>
          </div>
          <br/>
          <p> <a href="rechAvancee.php">Recherche Avancée</a></p>
<br/>
<p><a href="register1.php">Inscription</a> gratuite pour les médecins vérifiées. </p>
 
        </div>
      </div>
      <?php 
          /**
           * Prepare the $REPOSITORY before each include 
           **/                      
          $REPOSITORY='.';
       include 'Template\com\nametag-badge_tpl.php'; 
       
      if(isset($_GET['searchAction'])&& $_GET['searchAction'] ){
         new logTracing(" SearchAction:".$_GET['searchAction']); 
        $sh= new Search();   
       $res = $sh->search($_GET['key_words']);
         
        ?>
       
      <hr>
      <div class="marketing grid" id="advisor">

         <div class="row" style="padding: 0px 0;">
           <p> <h2><?php echo $sh->search_result; ?></h2>  </p>
            
           <?php if($sh->nbRows>0){ ?>
            <div class="advisorgrid"> 
               <ul>
                  <?php 
                       $AVATAR=$DEFAULT_DR_AVATAR_MAN;
                      $b=0;
                      while($tab = mysql_fetch_assoc($sh->result3)){
                          
                          if($tab['avatar_flag']==1){
                                $AVATAR= $tab['avatar'];
                          } else{
                                if($tab['sex']==1){
                                      $AVATAR= $DEFAULT_DR_AVATAR_MAN;
                                      
                                } else{
                                      $AVATAR= $DEFAULT_DR_AVATAR_WOMEN;
                                      
                                }
                          }
                          
                         include 'Template/search/badge_tpl.php';
                         if($b==2){ include 'Template/search/badge_tpl.php'; }
                          $b++;       
                      }    
                   ?>
              </ul> 
            </div> 
           <?php } ?>
         </div>

      </div>
      
      <?php } ?>
    </div>
    <script async defer src="./js/home-49f72337d87abd94e3c97e1fae795013.js" type="text/javascript"></script>
  </div>
</div>

<?php /**
           * Prepare the $REPOSITORY before each include 
           **/                      
          $REPOSITORY='.';
       include 'Template\footer_tpl.php'; 
      include 'Template\com\feedback_tpl.php'; ?>



</body>
</html>
