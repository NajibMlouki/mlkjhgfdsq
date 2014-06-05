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



<link href="./css/profile-6730ed749bfaf808fb49a52c8315f243.css" media="screen" rel="stylesheet" type="text/css">

<style type="text/css">
.fancybox-margin{margin-right:0px;}
</style>


<!--
		loading jQuery UI and Calendar css
	-->
	<link rel='stylesheet' type='text/css' href='css/jquery-ui.css' />
	<link rel='stylesheet' type='text/css' href='css/jquery.weekcalendar.css' />
	<link rel='stylesheet' type='text/css' href='css/demo.css'/>
	
	<!--
		loading jQuery and jQuery UI JS,
		with calendar library
	-->
	<script type='text/javascript' src='js/jquery.min.js'></script>
	<script type='text/javascript' src='js/jquery-ui.min.js'></script>
	
  <script type='text/javascript' src="js/jquery.weekcalendar.php"></script>



</head>
<body>
<div class="wrap">
  <!-- The MenuBar Start -->
  <?php   
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
        
         $showProfile ="";
         $showColleague="";  
         $showCalendar ="here";
         $showAppointments  ="";
         include 'Template\profile\menuProfile_tpl.php'; 
               
         ?>
        
      </div>
      <div class="profiler">
        
        <?php  include 'Template\rightMenuProfile_tpl.php'; ?>
        <div class="col-3-4 procv">
              
            <!-- Start Cntent -->
				 <!-- Main Calendar Container-->
				 <div id="calVisitWeek">
            <div class="editbox"> <small class="editlinks"> <a href="/calendar#">Add</a> </small>
              <h2>Calendrier de visite de la semaine</h2>
              
            </div>
          </div>
		  
				 <div id='calendar'></div>
		
				<!-- pop-up container,which will be shown when timeslot select	-->
            	<div id="event_edit_container">
		<form>
			<input type="hidden" />
			<ul>
				<li>
					<span>Date: </span><span class="date_holder"></span> 
				</li>
				<li>
					<label for="start">Start Time: </label><select name="start"><option value="">Select Start Time</option></select>
				</li>
				<li>
					<label for="end">End Time: </label><select name="end"><option value="">Select End Time</option></select>
				</li>
        <li>
					<label for="eventType">Event Type: </label>
          <select name="eventType">
             <option value="0">Select Event Type</option>
             <option value="1">Visites Libres </option>
             <option value="2">Sur Rendez-vous</option>
             <option value="3">Chez un clinique</option>
             <option value="4">Chez un hopital</option>
             <option value="5">A Université</option>
          </select>
          
          
          
          
				</li>
				<li>
					<label for="title">Title: </label><input type="text" name="title" />
				</li>
				<li>
					<label for="body">Body: </label><textarea name="body"></textarea>
				</li>
        
			</ul>
		</form>
	</div>
	     </div> 
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
