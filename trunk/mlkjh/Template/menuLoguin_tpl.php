<?php 
  /**
   * $REPOSITORY is: '.' if the includefile is at the same level as index.php
   *             or should be rectified if the include file is not at the same level as index.php 
   *             like: '..' , '../..' , etc
   **/                      
?>
<div class="mast">    
        <div class="inner">      
          <p id="logoin">
            <a href="<?php echo $REPOSITORY; ?>/index.php">
              <img alt="Logo-onblack" src="<?php echo $REPOSITORY; ?>/img/logo-doctunisie_00.png"></a>
          </p>     
          <ul class="signedout"  styele="display: yes;" id="nav">        
            <li id="signnow">
              <a href="<?php echo $REPOSITORY; ?>/signin.php">Identifiez-vous</a>
            </li>        
            <li id="signnow">
              <a href="<?php echo $REPOSITORY; ?>/register1.php">S'inscrire</a>
            </li>      
          </ul>    
        </div>  
      </div>