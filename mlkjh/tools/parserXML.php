<?php
    
   include('ganon.php');
   ini_set('max_execution_time', 300);
 // Parse the google code website into a DOM
 $html = file_get_dom('http://localhost/DocTunisie2/advisors.html');

  echo " Name, Location, Speciality, Desc, Image </br></br>";
  foreach($html('li') as $element) {
      foreach($element('h2') as $h2) {
         $name=  $h2->getPlainText(); 
      }
      foreach($element('h3') as $h3) {
         $location=  $h3->getPlainText(); 
      }
      foreach($element('h4') as $h4) {
         $speciality=  $h4->getPlainText(); 
      }
      foreach($element('p') as $p) {
         $desc=  $p->getPlainText(); 
      }
      foreach($element('img[src]') as $image) {
         $img=  $image->src; 
      } 
      
      
        echo "$name;$location;$speciality;$desc;$img; </br>";
       
   }
/*********************************************************************
 *  Extracting results in List to verify Manually
 * 
 *******************************************************************/   
/*  echo "<ul>";
  foreach($html('li') as $element) {
      foreach($element('h2') as $h2) {
         $name=  $h2->getPlainText(); 
      }
      foreach($element('h3') as $h3) {
         $location=  $h3->getPlainText(); 
      }
      foreach($element('h4') as $h4) {
         $speciality=  $h4->getPlainText(); 
      }
      foreach($element('p') as $p) {
         $desc=  $p->getPlainText(); 
      }
      foreach($element('img[src]') as $image) {
         $img=  $image->src; 
      } 
        echo "<li> Name: $name </br> Location: $location </br> Speciality: $speciality </br> Desc: $desc </br> Image: $img </li>";
   }
  echo "</ul>"; 
*/  
  
   
 
?>