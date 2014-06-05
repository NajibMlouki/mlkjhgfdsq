<?php
include './logger.php';
include './DB.php';
include './CalendarEvents.php';

$idMedecin=$_POST["idMedecin"];
$calEventId= $_POST["calEventId"];
$calEventDay= $_POST["calEventDay"];   // Id date in week
$calEventDateName= $_POST["calEventDateName"];
$calEventTitle  = $_POST["calEventTitle"];
$calEventBody = $_POST["calEventBody"];
$calEventStartTime  = $_POST["calEventStartTime"];
$calEventEndTime  = $_POST["calEventEndTime"];
$calEventStart  = $_POST["calEventStart"];
$calEventEnd= $_POST["calEventEnd"];
$calEventType= $_POST["calEventType"];

$output= "   File: modifyCalendar.php,
    calEventId  $calEventId 
    calEventDay $calEventDay 
    calEventDateName $calEventDateName 
    calEventTitle $calEventTitle 
    calEventBody $calEventBody 
    calEventStartTime  $calEventStartTime 
    calEventEndTime  $calEventEndTime 
    calEventStart  $calEventStart 
    calEventEnd $calEventEnd 
    calEventType $calEventType
";
  
  new logTracing($output);
  
  $event = new Events();
  echo $event->editEvent($idMedecin,$calEventId,$calEventDay,$calEventDateName,$calEventTitle,$calEventBody,
                        $calEventStartTime,$calEventEndTime,$calEventStart,$calEventEnd,$calEventType);



?>