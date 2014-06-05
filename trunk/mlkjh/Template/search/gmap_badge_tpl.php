<?php 
  /**
   * $REPOSITORY is: '.' if the includefile is at the same level as index.php
   *             or should be rectified if the include file is not at the same level as index.php 
   *             like: '..' , '../..' , etc
   **/                      
?>
htmlBadge[<?php echo $b; ?>] ='<div class="marketing grid" id="advisor">'+         
      '<div class="row" style="padding: 0px 0;">'+     
        '<div class="advisorgrid">'+                         
          '<ul>'+                            
            '<li style="height: 145px;">'+                
              '<a href="pub/peter-alperin-md.html">'+                              
                '<img alt="<?php echo $tab['name']; ?>" src="<?php echo $REPOSITORY; ?>/img/mab/<?php if($tab['avatar_flag']==1){ echo $tab['avatar'];} else{ if($tab['sex']==1){ echo $DEFAULT_DR_AVATAR_MAN; } else{ echo $DEFAULT_DR_AVATAR_WOMEN;} } ?>"> </a>'+ 
                '<h2><a href="pub/peter-alperin-md.html"><?php echo $tab['name']; ?> </a></h2>'+ 
                '<h3> <?php echo $tab['speciality']; ?> </h3>'+ 
                '<h4><?php echo $tab['regions']; ?> </h4>'+                
               '<p><?php echo $tab['address']; ?> </p>'+          
              '<br>'+                
              '<p>'+               
               '<a href="#" class="button blue small" style="">Voir Profile</a>'+           
              '</p>'+               
            '</li>'+                       
          '</ul>'+                    
        '</div>'+ 
      '</div>'+       
    '</div>'; 
    
    if($tab['avatar_flag']==1){ echo $tab['avatar'];} else{ if($tab['sex']==1){ echo $DEFAULT_DR_AVATAR_MAN; } else{ echo $DEFAULT_DR_AVATAR_WOMEN;} } \"