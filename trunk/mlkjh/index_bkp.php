<!DOCTYPE html>
<!-- saved from url=(0025)./ -->
<html class="" style="overflow: visible;">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script type="text/javascript" async src="./js/mixpanel-2.2.min.js"></script>
    <meta charset="utf-8">
    <link href="./css/home-d83582b66c6b7a34330696f06aa6c009.css" media="screen" rel="stylesheet" type="text/css">
    <title>Recherche Doctunisie Nejib </title>
    <link href="./css" media="screen" rel="stylesheet" type="text/css">
    <link href="./css/common-48b47f12185172f2d1859c37be61963a.css" media="all" rel="stylesheet" type="text/css">
    <link href="./css/marketing-e34018dc990f47f09a6d064160be0c9b.css" media="screen" rel="stylesheet" type="text/css" />
    <script src="./js/application-2d39b9d84ac29fbd53e6f0447918910e.js" type="text/javascript"></script>
    <style type="text/css">.fancybox-margin{margin-right:15px;} </style>
  </head>
  <body>
    <div class="wrap">  
      <!-- The MenuBar Start -->
          <?php
               include "inc/functions.php";  
               if (!isset($_SESSION['login'])) { 
                  include 'Template\menuLoguin_tpl.php';
               }else{
                  include 'Template\mainMenu_tpl.php';
               }  
          ?>
        
      <!-- he menuBar End -->
        
      <div class="page">    
        <div class="notice" data-sel-notice="" id="flash_notice" style="display:none">      
          <div class="inner"> 
            <a href="#" class="closer" onClick="document.getElementById(&#39;flash_notice&#39;).style.display = &#39;none&#39;; return false;" title="Dismiss"></a> 
            <span id="flash_message"> 
            </span> 
          </div>    
        </div>    
        <div class="grid v2" id="home">      
          <div class="signup">        
            <div class="col-1-2">          <h1>Pour les Patients.</h1>          <h2>Doctunisie rend votre vie plus facile.</h2>          
              <hr>          
              <div class="register">            
                <form accept-charset="UTF-8" action="/register" method="get" name="newreg" onSubmit="return submitRegistrationForm1(event); return false;">              
                  <div style="margin:0;padding:0;display:inline">                
                    <input name="utf8" type="hidden" value="✓">              
                  </div>              
                  <fieldset>              
                    <label>              
                      <input id="first_name" name="first_name" placeholder="Nom" tabindex="1" type="text">              
                    </label>              
                    <label>              
                      <input id="last_name" name="last_name" placeholder="Prénom" tabindex="2" type="text">              
                    </label>              
                    <button class="btn blue" id="submit_reg_search" name="button" tabindex="3" type="submit">Recherche
                    </button>              
                    <br>              
                    <p>
                      <a href="/signin" class="signin">Identifiez vous</a>
                    </p>              
                  </fieldset>            
                </form>          
              </div>          
              <p> 
                <a href="rechAvancee.php">Recherche Avancée</a>
              </p>
              <p>
                <a href="register1.php">Inscription</a> gratuite pour les médecins vérifiées. 
              </p>        
            </div>
             <?php  include 'Template\com\nametag-badge_tpl.php'; ?> 
          
        </div>      
          
          
                        
          <hr>           
        </div>    
            <script async defer src="./js/home-49f72337d87abd94e3c97e1fae795013.js" type="text/javascript"></script>  
      </div>
    </div>
    
    <?php  include 'Template\footer_tpl.php'; ?>
   
     <?php  include 'Template\com\feedback_tpl.php'; ?>
     
  </body>
</html>