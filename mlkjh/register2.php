<!DOCTYPE html>
<html>
  <meta charset="UTF-8" />
  <head>

    <meta charset="UTF-8" />

    <title>Inscription
    </title>
    
    <link href="./css/common-48b47f12185172f2d1859c37be61963a.css" media="all" rel="stylesheet" type="text/css" />
    <!--[if lt IE 9]><link href="https://db4z6a5e2pfi5.cloudfront.net/assets/assets_rails/standard_ie-c8073322d755e2f8867daa792ef89278.css" media="all" rel="stylesheet" type="text/css" /><![endif]-->
    <link href="./css/reg-53c2708a5daf0f66da48316c8f6fbbf4.css" media="screen" rel="stylesheet" type="text/css" />
<script src="./js/application-2d39b9d84ac29fbd53e6f0447918910e.js" type="text/javascript"></script>
    


<script src="./js/registration_d5_web-e55275d9965852986b8d810bcffda617.js" type="text/javascript"></script>


  </head>
  <body>
    <div class="wrap">
      <div class="mast">
        <div class="inner">
          <p id="logoin">
             <a href="index.html"><img alt="Logo-onblack" src="./img/logo-doctunisie_00.png" /></a>
          </p>
          <ul class="signedout" id="nav">
            <li id="signnow">
              <a href="signin.php">Sign In</a>
            </li>
            <li id="joinnow">
              <a href="register">Join Now</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="page">
        <div class="notice" data-sel-notice id="flash_notice" style='display:none'>  
          <div class="inner">    
            <a href="#" class="closer" onClick="document.getElementById('flash_notice').style.display = 'none'; return false;" title="Dismiss"></a>    
            <span id='flash_message'>           
            </span>  
          </div>
        </div>
        <ol class='progmeter'>
          <li class='create_prog '><small>1</small>Créer 
          </li>
          <li class='verify_prog here'><small>2</small>Vérifier 
          </li>
          <li class='reconnect_prog'><small>3</small>Connecter 
          </li>
        </ol>
        <div class='content grid' id='reg' style='display: yes;'>
          <div class='featuremain' style='display: yes;'>
            <form accept-charset="UTF-8" action="inscription.php?etape=02" method="post">
              <div style="margin:0;padding:0;display:yes">
                <input name="utf8" type="hidden" value="&#x2713;" />
                
              </div>
              <input data-accept-suggested-photo="" id="use_suggested_photo" name="use_suggested_photo" type="hidden" value="true" />
              <div class='loading' style='display: yes;'>
                <div class='faded_bg' style='display: yes;'>
                </div>
                <div class='spinner_container' style='display: yes;'>
                  <div class='spinner' style='display: yes;'> 
                    <div class='bar1' style='display: yes;'>
                    </div>
                    <div class='bar2'>
                    </div>
                    <div class='bar3'>
                    </div>
                    <div class='bar4'>
                    </div>
                    <div class='bar5'>
                    </div>
                    <div class='bar6'>
                    </div>
                    <div class='bar7'>
                    </div>
                    <div class='bar8'>
                    </div>
                    <div class='bar9'>
                    </div>
                    <div class='bar10'>
                    </div>
                    <div class='bar11'>
                    </div>
                    <div class='bar12'>
                    </div>
                  </div>
                  <p>
                  </p>
                </div>
              </div>

  <h1>
    Vérification Professionnel
  </h1>
</div>
<fieldset>
  
  <h2>Pour vous permettre l'accès, nous devons vérifier que vous êtes un médecin</h2>
   
  <p>
    <label>
      <span class="col-1-3">
        <span class="multiline">
          <sup>*</sup>
          Pays de Faculté
        </span>
      </span>
      <span class="col-2-3">
        <select class="full" id="country" name="pays_fac" data-target="medschool_country" required>
          <option value="">
          Choisir...
          </option>
          <?php
	   
	  new ListFromTable("pays","id_pays","label");
	   
	  ?>
           
        </select>
      </span>
    </label>
  </p>
  
  <p>
    <label for="user_user_practice_contact_attributes_addr2">
      <span class="col-1-3" data-sel-street-address-2-local="">
      <sup>*</sup>
        Gouvernorat
      </span>
      <span class="col-2-3">
      <select class="full" id="user_credentials" name="gouv_fac" data-target="user_credentials" required>
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
  
  <p>
    <label for="user_user_practice_contact_attributes_addr2">
      <span class="col-1-3" data-sel-street-address-2-local="">
      <sup>*</sup>
        Faculté
      </span>
      <span class="col-2-3">
      <select class="full" id="user_credentials" name="faculte" data-target="user_credentials" required>
          <option value="">
            Choisir...
          </option>
           <?php
	 
		new ListFromTable("institution","id_institut","nom");
 
  	  ?>
        </select>
        
      </span>
    </label>
  </p>
  
   
  <p id="subspecialty">
  <label>
  <span class="col-1-3">
   <sup>*</sup>
    Date Dipl&ocirc;mé
  </span>
  <span class="col-2-3">
    <input class="full" style="font-size: 18px;" name="anneeDiplome" type="date" value="">
  </span>
 </label>
</p>
   <p id="subspecialty">
  <label>
  <span class="col-1-3">
  <sup>*</sup>
    Date de Né
  </span>
  <span class="col-2-3">
    <input class="full" style="font-size: 18px;" name="dateNaiss" type="date" value="">
  </span>
 </label>
</p>
  <!-- %p
      <span class='expandable label' for='user_subspecialty'></span>
      disabled="disabled"
      <input class="full" id="user_user_practice_contact_attributes_addr2" name="user[user_practice_contact_attributes][addr2]" type="text" value="" size="30" data-target="contact_addr2">
   -->
</fieldset>
   
  <p>
    <span class="label">
      <span class="col-1-3">
        &nbsp;
      </span>
      <span class="col-2-3">
        <button class="blue btn next" type="submit" data-target="next_button">Next</button>
      </br>
      </br>
      <small class="gry">
        <img src="./img/ico/ico-secure.png" height="15" width="10" alt="ico-secure">
        <span>Privé &amp; Sécurisé: SSL Secure Socket Layer</span>
      </small>
      </span>
    </span>
  </p>
  <br>
  <br></div>
              <!-- Verification Start - DOB / -->
              <div class='panel dobZip' style='display: yes;'>
              </div>
              <!-- Verification Questions / -->
              <div class='panel questions' style='display: yes;'>
              </div>
              <div class='panel medSchoolGradYear' style='display: yes;'>
              </div>
              <div class='panel accountCreation' data-mailgunapi='pubkey-2sas9-s9fem77mgdg9sez-8magcajeh0' style='display: yes;'>
              </div>
            </form>
          </div>
        </div>



      </div>
    </div>
    <div class="foot">
      <p class="navline">
        <span class="copyright">DocTunisie, Inc. &copy; 2014
        </span>
      </p>
      <p class="navline">
        <span id="siteseal"><strong>Vérifié &amp; Sécurisé<small>SSL: Secure Socket Layer</small></strong>
        </span>
      </p>
    </div>
    <a href='#' id='feedbacker'>
      <img alt="Share your feedback and ideas" src="./img/feedbacktab-5cd1d0dff3a42317e35339cab67b67c3.png" /></a>
<script defer='defer' type='text/javascript'>
var feedback_form = new App.Feedback("");
jQuery('#feedbacker').bind('click', feedback_form.open);
</script>  
    <!-- furry little rodents -->  
 
    <!-- furry little rodents -->  


  </body>
 
</html>