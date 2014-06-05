<?php
class GMapEvent extends DBConnexion
{	
	
  	function addMarker($idMed,$address,$lat,$lng,$type)
    {
      // Insert new row with user data
       $request = sprintf("INSERT INTO markers " .
               " (id,idMedecin, address, lat, lng, type,date_creat, date_modif ) " .
               " VALUES (NULL,'%d',  '%s', '%s', '%s', '%s',NOW(),NOW());",
               $idMed,
               mysql_real_escape_string($address),
               mysql_real_escape_string($lat),
               mysql_real_escape_string($lng),
               mysql_real_escape_string($type)
               );
                   		 
    		 new logTracing($request);
    	
    	
    		return parent::ExecuteRqSelect($request);
  	
  	
  	}
}
?>