<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>

<meta charset="utf-8" />
<title>Identifiez-vous à Doctunisie</title>

<link href="./css/common-48b47f12185172f2d1859c37be61963a.css" media="all" rel="stylesheet" type="text/css" />
<!--[if lt IE 9]><link href="https://db4z6a5e2pfi5.cloudfront.net/assets/assets_rails/standard_ie-c8073322d755e2f8867daa792ef89278.css" media="all" rel="stylesheet" type="text/css" /><![endif]-->
<script src="./js/application-2d39b9d84ac29fbd53e6f0447918910e.js" type="text/javascript"></script>
<link href="./css/signin-975c90990af4e235f49cf601c41a0917.css" media="screen" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="wrap"> 
  
 <?php include 'Template/menuLoguin_tpl.php'; ?>
  
  <div class="page">
    <div class="notice" data-sel-notice id="flash_notice" style='display:none'>
      <div class="inner"> 
	  <a href="#" class="closer" onClick="document.getElementById('flash_notice').style.display = 'none'; return false;" 
	     title="Dismiss"></a> 
		<span id='flash_message'> </span> </div>
    </div>
	
	
    <div class="content grid" id="signin">
      <div class="col-1-3">
        <div class="gridcell">
          <form accept-charset="UTF-8" action="verifyLogin.php" class="new_account_session" id="login" 
		  method="post" onSubmit="document.getElementById(&quot;signinbutton&quot;).className = &quot;btn blue loading&quot;;">
            <div style="margin:0;padding:0;display:inline">
             
            </div>
            <div class="gridcell signin">
              <h1>Identifiez-vous</h1>
              <p>
<label for="email">
<em class="strong">Email</em>
<input autocapitalize="none" autocorrect="none" class="fullest" id="email" name="login"   tabindex="1" type="email" />
</label>
              </p>
              <p>
<label for="password"><small class="floatr">
<a href="password_resets/new.html" class="gray">Mot de passe oublié?</a></small>
<em class="strong">Mot de passe </em>
<input autocapitalize="none" autocorrect="none" class="fullest" id="password" name="pass" tabindex="2" type="password" />
</label>
              </p>
              <p>
                <label class="tic col-2-3" style="padding-right: 0px">
                <input id="remember_me" name="account_session[remember_me]" tabindex="3" type="checkbox" value="1" />
                <em>Rester connecté </em><br />
                <em class="gray">ordinateurs privés seulement</em></label>
                <label class="col-1-3" >
                <button class="btn blue" id="signinbutton" name="button" type="submit">Identifiez-vous</button>
                </label>
              </p>
            </div>
          </form>
          <div class="gridcell">
            <p><small>Vous n'avez pas de compte? </br> <a href="register1.php">Créer votre profil.</a></small></p>
          </div>
        </div>
      </div>
      <div class="col-2-3 eastside">
        <div class="gridcell">
          <div id="mobile">
		  	<img alt="Doctunisie" class="hero" src="./img/signinout-iphone-splash-1413585b529b4b946a369240bdc41160.png" />
            <h1>Prenez Doctunisie avec vous...</h1>
            <p>Le Réseau privé du médecin est accessible où que vous soyez.</p>
            <p>Téléchargez notre application gratuite sur l'App Store et Google Play.<br />
              <a href="#">
			  <img alt="Appstore-download@2x" class="app-badge" 
			  			src="./img/appstore-download_2x-79a847dd585d44d971bf6cacdf8f36fa.png" /></a>
			  <a href="#">
			        <img alt="Googleplay-download@2x" class="app-badge"
					   src="./img/googleplay-download_2x-485c2a786f768f040e6145b4228c099b.png" /></a>
			</p>
          </div>
        </div>
      </div>
    </div>
	
	
  </div>
</div>

<?php  include 'Template\footer_tpl.php'; ?>
<?php  include 'Template\com\feedback_tpl.php'; ?>



<script type="text/javascript">document.getElementById('email').focus();</script>
<!-- end Mixpanel -->
</body>

</html>
