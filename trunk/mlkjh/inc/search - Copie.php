<?php
//include 'functions.php';

 class recherche2 extends Base
{        
       
       function __construct()
       {
               
               $this->recherche_multicriteres();
               
       }
       
       //----------------------------------------------
       
           function recherche_multicriteres()
       {

               $conditions = array();
               foreach ($_POST as $key => $value)
               {
                       if($value != '') $conditions[] = " $key like '%$value%' ";  
               }
               
               if (count($conditions) == 0)
               {
                       $where = "";
               }
               else
               {
                  $where = " WHERE ".implode($conditions,' AND ');
               }
               
               $req = "SELECT * FROM  medecin".$where ;
               
               echo $req; 
               
               $result= parent::ExecuteRqSelect($req);
                
               // $nbRows = mysql_num_rows($result);
               
/*                 while($tab = mysql_fetch_assoc($result)){
                       
                       include 'histoireTravail.php';
                       
                       } 
*/
                               
       }
       
       //----------------------------------------------
       
}
?>