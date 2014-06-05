<?php
    
   include('ganon.php');
   ini_set('max_execution_time', 300);
 // Parse the google code website into a DOM
 $html = file_get_dom('http://localhost/DocTunisie2/tools/annuaire_01_tag.html');

/*********************************************************************
 *  Extracting results in List to verify Manually
 * 
 *******************************************************************/   
  echo "<ul>";
  foreach($html('div[style="margin:0 0 0 0px "]') as $element) {
      
         $text=  $element->getPlainText(); 
         echo "<li> Content: $text </br>  </li>";
       
        
   }
  echo "</ul>"; 
  
  
   
 
?>