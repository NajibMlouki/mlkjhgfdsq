<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class Events extends DBConnexion
{	
	  
  	function addEvent($idMedecin,$calEventId,$calEventDay,$calEventDateName,$calEventTitle,$calEventBody,$calEventStartTime,$calEventEndTime,$calEventStart,$calEventEnd,$calEventType)
    {
      $request=" 
               INSERT INTO  calendarevents
               (IdEvents,calendarEventId, dayWeek, dayName, idMedecin,
               startTime, endTime, startTimeMillis, endTimeMillis, title, body, type)
               VALUES ('',$calEventId,$calEventDay,'$calEventDateName',$idMedecin,
               '$calEventStart','$calEventEnd',$calEventStartTime,$calEventEndTime,
               '$calEventTitle','$calEventBody',$calEventType)
              ";    		 
    		//new logTracing($request);
    	
    	
    		return parent::ExecuteRqSelect($request);
  	
  	
  	}
    
    function editEvent($idMedecin,$calEventId,$calEventDay,$calEventDateName,$calEventTitle,$calEventBody,$calEventStartTime,
                        $calEventEndTime,$calEventStart,$calEventEnd,$calEventType)
    {
      $request=" UPDATE   calendarevents SET  
                 dayWeek = $calEventDay,
                 dayName = '$calEventDateName',
                 startTime = '$calEventStart',
                 endTime =  '$calEventEnd',
                 startTimeMillis = $calEventStartTime,
                 endTimeMillis =  $calEventEndTime,
                 title =    '$calEventTitle',
                 body  =     '$calEventBody',
                 type  =     $calEventType
                 WHERE  idMedecin = $idMedecin
                 AND    calendarEventId =  $calEventId
               ";    		 
    		//new logTracing($request);
    	   return parent::ExecuteRqSelect($request);

  	}
    
    function deleteEvent($idMedecin, $calEventId)
    {
        
       /***
        * Delete the event from session array
        **/                       
        //new logTracing("DeleteEvent eventKey:".$calEventId);
        if(isset($_SESSION ['calendarEvents']) && !empty($_SESSION['calendarEvents'])){
              //new logTracing("DeleteEvent idMedecin:".$idMedecin);
             $i=0;
             foreach ($_SESSION ['calendarEvents'] as $rowEvent)
             {
                //new logTracing("DeleteEvent eventKeyFounded:".$i.", calEventId :". $calEventId." rowEvent[calendarEventId] ".$rowEvent['calendarEventId']);
                if($rowEvent['calendarEventId']==$calEventId){
                 // new logTracing("DeleteEvent eventKeyFounded:".$calEventId);
                  unset($_SESSION ['calendarEvents'][$i]);
                }
                 $i=$i+1;
             }              
        }
        
        /***
        * Delete the event from DB
        **/ 
        $request=" DELETE FROM   calendarevents   
                 WHERE  idMedecin = $idMedecin
                 AND    calendarEventId =  $calEventId
               ";    		 
    		 //new logTracing($request);
    	   return parent::ExecuteRqSelect($request);

  	}
    
    function getEventId($idMedecin)
    {
        $request="SELECT MAX(calendarEventId)+1 FROM calendarevents WHERE idMedecin = $idMedecin ";
        //new logTracing($request);
        $result= parent::ExecuteRqSelect($request);
        
        $res= mysql_result($result, 0);
        
        //new logTracing("getEventId res:".$res);
        if($res<1)
         $res=1;
        $_SESSION ['newEventId']= $res;
        return  $res;
        
    }
    
    function getEvent($idMedecin)
    {
      $request=" 
               SELECT IdEvents, calendarEventId, dayWeek, dayName, idMedecin,
               startTime, endTime, startTimeMillis, endTimeMillis, title,
               body, dayWeek, type
               FROM calendarevents WHERE idMedecin =  $idMedecin
              ";    		 
    		//new logTracing("getEvent: idMedecin:".$idMedecin.", request".$request);
    	
    	  
    	$result= parent::ExecuteRqSelect($request);
        
        $nbRows = mysql_num_rows($result);
        //echo  " Nbre ligne DB: $nbRows </br>";
       
  		 if($nbRows>0){
  			   $rowId=0;
          while ($row = mysql_fetch_assoc($result)) {
            $_SESSION ['calendarEvents'][$rowId] =$row;
            $rowId++;
          }
  		 }else {
         $nbRows=1;
           //echo "Aucune ligne trouv‚, rien … afficher.";
          // exit;
       }
  	
      //new logTracing("getEvent:  nbRows".$nbRows); 
    
  	   return   $nbRows;
  	}
  
}

?>