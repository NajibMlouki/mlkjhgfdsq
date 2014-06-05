<?php 
  /**
   * $REPOSITORY is: '.' if the includefile is at the same level as index.php
   *             or should be rectified if the include file is not at the same level as index.php 
   *             like: '..' , '../..' , etc
   **/                      
?>
<div class="col-3-4">
          <div id="show_header_app">
            <div id="photo_section"> <a href="" class="popup_image"> <img alt="Sanjay Saint, MD, MPH" src="<?php echo $REPOSITORY; ?>/img/mab/sanjay_saint-c4155ac45fb5cac7d962413711d66a10.png" /> </a> <small class="editlinks"> <a href="/profile#" id="add_photo" class="nag add_photo change" title="Change Photo">Modifier</a> </small>  </div>
            <div class="proname"> <small class="editlinks"> <a href="/profile#" class="undefined edit_name add" data-dialog="{ &quot;title&quot;: &quot;Name &amp; Occupation&quot;, &quot;url&quot;: &quot;/profiles/5994749/basic/edit&quot; }" original-title="Edit name, occupation, additional credentials">Modifier</a> </small>
              <h1> 
              <span id="user_full_name">Dr. <?php echo $_SESSION ['loggedDoctor']['nom']." ". $_SESSION ['loggedDoctor']['prenom'];   ?>
              </span><span id="user_additional_credentals"></span> </h1>
              <h2> <span class="grn" id="header_specialty">
               <?php 
			   		    new getNomById ("specialites","label","id_spec",$_SESSION ['loggedDoctor']['specialite']);
			     	  ?> 
               </span> <span class="user_city">
               <?php  	 
			        echo $_SESSION ['loggedDoctor']['subSpecialite']
			    ?> 
               </span></h2>
              <h3 id="user_description_section"> 
			   <?php
					new getNomById("institution","nom","id_institut",$_SESSION ['loggedDoctor']['faculte']);
			    ?> 
                
                &nbsp; </h3>
            </div>
          </div>
        </div>