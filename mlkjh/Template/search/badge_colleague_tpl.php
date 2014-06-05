<li style="height: 145px;">
    <a href="pub/peter-alperin-md.html">
    
 <?php
if($tab['avatar_flag']==0) 
 {
 ?>   
      <img alt="<?php echo $tab['name']; ?>"   src="<?php if($tab['sex']==1)  echo './img/ico/People-Doctor-Male-icon.png'; else echo './img/ico/People-Doctor-Female-icon.png'; ?>" />
  <?php
  }
  else{
   ?>   
      <img alt="<?php echo $tab['name']; ?>"   src="<?php echo './img/mab/'.$tab['avatar']; ?>" />
  <?php
  }  
 ?>     
      
    </a>
    <h2><a href="pub/peter-alperin-md.html"><?php echo $tab['name']; ?></a></h2>
    <h3><?php echo $tab['speciality']; ?></h3>
    <h4><?php echo $tab['regions']; ?></h4>
    <p><?php echo $tab['address']; ?>   </p><br>
    <p> <a href="#" class="button blue small" style="">Ajouter Collègue</a></p>
    
</li>