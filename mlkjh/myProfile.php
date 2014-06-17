<?php
include "inc/functions.php";

if (!isset($_SESSION['login'])) {
	header ('Location: signin.php');
	exit();
}



?>

<!DOCTYPE html>


<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8">


<title>Mon Profil Doctunisie</title>




<link rel="stylesheet" href="./css/shim.css">

<link href="./css" media="screen" rel="stylesheet" type="text/css">
<link href="./css/common-48b47f12185172f2d1859c37be61963a.css" media="all" rel="stylesheet" type="text/css">
<!--[if lt IE 9]><link href="./css/standard_ie-c8073322d755e2f8867daa792ef89278.css" media="all" rel="stylesheet" type="text/css" /><![endif]-->

<script src="./js/application-ccb73cc251cb0b24f6438e07e16dc455.js" type="text/javascript"></script>
<script src="./js/application-2d39b9d84ac29fbd53e6f0447918910e.js" type="text/javascript"></script>



<link href="./css/profile-6730ed749bfaf808fb49a52c8315f243.css" media="screen" rel="stylesheet" type="text/css">

<style type="text/css">
.fancybox-margin{margin-right:0px;}
</style>





</head>
<body>
<div class="wrap">
  <!-- The MenuBar Start -->
  <?php   
          /**
           * Prepare the $REPOSITORY before each include 
           **/                      
          $REPOSITORY='.';
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
            <a href="/profile#" class="closer" 
                  onClick="document.getElementById(&#39;flash_notice&#39;).style.display = &#39;none&#39;; return false;" 
                  title="Dismiss"></a> <span id="flash_message"> </span> 
      </div>
    </div>
    
  <div class="content grid editpro theprofile" 
        data-roles="[]" 
        data-sel-myprofile="" 
        data-vendor-emails="[]" 
        id="myprofile">
      
      <div id="prohead" data-rendered="profile_unverified">
        <?php include 'Template/headerProfile_tpl.php'; ?>
        <div class="col-1-4">
          <div class="contactbar">
            <div id="cvs" class="actbtn"> </div>
          </div>
        </div>
        <?php 
        
         $showProfile ="here";
         $showColleague="";  
         $showCalendar ="";
         $showAppointments  ="";
         include 'Template\profile\menuProfile_tpl.php'; 
               
         ?>
        
      </div>
      <div class="profiler">
        
        <?php  include 'Template\rightMenuProfile_tpl.php'; ?>
        <div class="col-3-4 procv">
              
            <!-- Start Cntent -->
             <?php  include 'Template\profile\summaries_tpl.php'; ?>
              <?php  include 'Template\profile\specialties_tpl.php'; ?>
              <?php  include 'Template\profile\works_tpl.php'; ?>
              <?php  include 'Template\profile\training_tpl.php'; ?>
              <?php  include 'Template\profile\certifications_tpl.php'; ?>
              <?php  include 'Template\profile\honors_tpl.php'; ?>
              <?php  include 'Template\profile\trials_tpl.php'; ?>
              <?php  include 'Template\profile\publications_tpl.php'; ?>
              <?php  include 'Template\profile\supportGrants_tpl.php'; ?>
              <?php  include 'Template\profile\research_histories_tpl.php'; ?>
              <?php  include 'Template\profile\committees_tpl.php'; ?>
              <?php  include 'Template\profile\memberships_tpl.php'; ?>
              <?php  include 'Template\profile\languages_tpl.php'; ?>
              <?php  include 'Template\profile\hospitals_tpl.php'; ?>
              <?php  include 'Template\profile\affiliations_tpl.php'; ?>
              <?php  include 'Template\profile\insurers_tpl.php'; ?>
              <?php  include 'Template\profile\industries_tpl.php'; ?>
              <?php  include 'Template\profile\interests_tpl.php'; ?>
              <?php  include 'Template\profile\links_tpl.php'; ?>
              <div class="clear"></div>
              <?php  include 'Template\profile\add_sections_tpl.php'; ?>
						<!-- End Content-->   
              
              
        </div>
      </div>
    </div>
</div>
  </div>
  <!-- FOOTER START -->
      <?php  include 'Template\footer_tpl.php'; ?>
  <!-- FOOTER END -->
  
  <!-- FeedBack start -->
      <?php  include 'Template\com\feedback_tpl.php'; ?>
  <!-- FeedBack End -->



</body>
</html>
