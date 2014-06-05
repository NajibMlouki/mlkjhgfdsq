<?php
session_start();
include './logger.php';
include './DB.php';
include './CalendarEvents.php';

   $idMedecin=$_SESSION ['loggedDoctor']['idMedecin'];
   $event = new Events();
   $event->getEvent($idMedecin);



 

/*
$output= " self.updateEvent({  
                        id:".$_SESSION ['calendarEvents']['calendarEventId'].",
                        start: new Date(".$_SESSION ['calendarEvents']['startTimeMillis']."),
                        end: new Date(".$_SESSION ['calendarEvents']['endTimeMillis']."),
                        title:'".$_SESSION ['calendarEvents']['title']."',
                        body:'".$_SESSION ['calendarEvents']['body']."'
            }) 
"; */

$output=  $_SESSION ['calendarEvents']['calendarEventId'].","
         .$_SESSION ['calendarEvents']['startTimeMillis'].","
         .$_SESSION ['calendarEvents']['endTimeMillis'].","
         .$_SESSION ['calendarEvents']['title'].","
         .$_SESSION ['calendarEvents']['body'];

  
  new logTracing(" Ajax Response: ".$output);
  
 
 /* 
  
  self.updateEvent(calEvent3);                   
  */
 // addEvent($calEventId,$calEventDay,$calEventDateName,$calEventTitle,$calEventBody,$calEventStartTime,$calEventEndTime,$calEventStart,$calEventEnd);
  
 
  echo    $output;



?>