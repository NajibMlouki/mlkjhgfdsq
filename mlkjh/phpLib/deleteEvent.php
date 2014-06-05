<?php
include './logger.php';
include './DB.php';
include './CalendarEvents.php';

$idMedecin=$_POST["idMedecin"];
$calEventId= $_POST["calEventId"];
/*$calEventDay= $_POST["calEventDay"];   // Id date in week
$calEventDateName= $_POST["calEventDateName"];
$calEventTitle  = $_POST["calEventTitle"];
$calEventBody = $_POST["calEventBody"];
$calEventStartTime  = $_POST["calEventStartTime"];
$calEventEndTime  = $_POST["calEventEndTime"];
$calEventStart  = $_POST["calEventStart"];
$calEventEnd= $_POST["calEventEnd"];
*/

$output= "   File: deleteCalendarEvent.php,
    calEventId  $calEventId 
    
";
 
 /*calEventDay $calEventDay 
    calEventDateName $calEventDateName 
    calEventTitle $calEventTitle 
    calEventBody $calEventBody 
    calEventStartTime  $calEventStartTime 
    calEventEndTime  $calEventEndTime 
    calEventStart  $calEventStart 
    calEventEnd $calEventEnd  */
  
  new logTracing($output);
  
  $event = new Events();
  echo $event->deleteEvent($idMedecin,$calEventId);



?>