<?php 
  /**
   * $REPOSITORY is: '.' if the includefile is at the same level as index.php
   *             or should be rectified if the include file is not at the same level as index.php 
   *             like: '..' , '../..' , etc
   *             style="height=150px;"   
   **/                      
?>                                  
<li style="height: 145px;">
    <a href="pub/peter-alperin-md.html">
      <img alt="<?php echo $tab['name']; ?>" src="<?php echo $REPOSITORY; ?>/img/mab/<?php echo $AVATAR; ?>" />
    </a>
    <h2><a href="pub/peter-alperin-md.html"><?php echo $tab['name']; ?></a></h2>
    <h3><?php echo $tab['speciality']; ?></h3>
    <h4><?php echo $tab['regions']; ?></h4>
    <p> <?php echo $tab['address']; ?>    </p> <br>
    <p> <a href="#" class="button blue small" style="">Rendez-vous</a></p>
    
</li>