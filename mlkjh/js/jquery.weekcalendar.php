/*
 * jQuery.weekCalendar v1.2.2
 * http://www.redredred.com.au/
 *
 * Requires:
 * - jquery.weekcalendar.css
 * - jquery 1.3.x
 * - jquery-ui 1.7.x (widget, drag, drop, resize)
 *
 * Copyright (c) 2009 Rob Monie
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 *   
 *   If you're after a monthly calendar plugin, check out http://arshaw.com/fullcalendar/
 */
  
<?php
session_start(); 
include '../phpLib/logger.php';
include '../phpLib/DB.php';
include '../phpLib/CalendarEvents.php';
   $idMedecin=$_SESSION ['loggedDoctor']['idMedecin'];
   echo  " console.log(' PHP idMedecin: $idMedecin '); ";
   $event = new Events();
   $event->getEvent($idMedecin);
  
    echo ' var calEventArray=new Array(); ';
    echo  ' console.log(" PHP JS FILE hhkkkkoooooooooo "); ';
    if(isset($_SESSION ['calendarEvents']) && !empty($_SESSION['calendarEvents'])){
       $i=0;
       foreach ($_SESSION ['calendarEvents'] as $rowEvent)
       {
              echo " calEventArray[".$i."] = {  
                                id:".$rowEvent['calendarEventId'].",
                                day:".$rowEvent['dayWeek'].",
                                start: new Date(".$rowEvent['startTimeMillis']."),
                                end: new Date(".$rowEvent['endTimeMillis']."),
                                title:'".$rowEvent['title']."',
                                body:'".$rowEvent['body']."',
                                type:".$rowEvent['type']."
                            };
        
                     "; 
                     
               echo  "console.log(' compteur i= $i '); ";      
           $i=$i+1;
                     
       }              
          
    }else{
        echo  ' console.log(" PHP JS FILE ELSE END"); '; 
    }                  
      echo  '  console.log(" PHP JS FILE END"); ';
      
      
      
      
    

?>                        
 var weekDaysArray=new Array();             
   
(function($) {




           console.log('Start 00');
           $.widget("ui.weekCalendar", {

      /***********************
       * Initialise calendar *
       ***********************/
      _init : function() {
      console.log('Start 01 init');
         var self = this;
         self._computeOptions();
         self._setupEventDelegation();
         self._renderCalendar();
         self._loadCalEvents();
         self._resizeCalendar();
         self._scrollToHour(self.options.date.getHours());

         $(window).unbind("resize.weekcalendar");
         $(window).bind("resize.weekcalendar", function() {
            self._resizeCalendar();
         });
         console.log('Start 11 END');
         
          
          
          
           
          /*********************************************************************/
          /*** Construire les dates du week in array ***************************/
          /*********************************************************************/     
               
           var date= new Date();
           
           
               
               if(date.getDay()==0){
                    weekDaysArray[1] = new Date(date.getFullYear(),date.getMonth(),date.getDate()-6,
                              date.getHours(),date.getMinutes(),date.getSeconds());
                    weekDaysArray[2] = new Date(date.getFullYear(),date.getMonth(),date.getDate()+1,
                              date.getHours(),date.getMinutes(),date.getSeconds());
                    weekDaysArray[3] = new Date(date.getFullYear(),date.getMonth(),date.getDate()+1,
                              date.getHours(),date.getMinutes(),date.getSeconds()); 
                    weekDaysArray[4] = new Date(date.getFullYear(),date.getMonth(),date.getDate()+1,
                              date.getHours(),date.getMinutes(),date.getSeconds());
                    weekDaysArray[5] = new Date(date.getFullYear(),date.getMonth(),date.getDate()+1,
                              date.getHours(),date.getMinutes(),date.getSeconds());
                    weekDaysArray[6] = new Date(date.getFullYear(),date.getMonth(),date.getDate()+1,
                              date.getHours(),date.getMinutes(),date.getSeconds());
                    weekDaysArray[0] = new Date();
                    
               }else if(date.getDay()==1){
                    weekDaysArray[1] = new Date();
                    weekDaysArray[2] = new Date(date.getFullYear(),date.getMonth(),date.getDate()+1,
                              date.getHours(),date.getMinutes(),date.getSeconds()); 
                    weekDaysArray[3] = new Date(date.getFullYear(),date.getMonth(),date.getDate()+2,
                              date.getHours(),date.getMinutes(),date.getSeconds()); 
                    weekDaysArray[4] = new Date(date.getFullYear(),date.getMonth(),date.getDate()+3,
                              date.getHours(),date.getMinutes(),date.getSeconds());
                    weekDaysArray[5] = new Date(date.getFullYear(),date.getMonth(),date.getDate()+4,
                              date.getHours(),date.getMinutes(),date.getSeconds());
                    weekDaysArray[6] = new Date(date.getFullYear(),date.getMonth(),date.getDate()+5,
                              date.getHours(),date.getMinutes(),date.getSeconds());
                    weekDaysArray[0] = new Date(date.getFullYear(),date.getMonth(),date.getDate()+6,
                              date.getHours(),date.getMinutes(),date.getSeconds());
                              
               }else if(date.getDay()==2){
                    weekDaysArray[1] = new Date(date.getFullYear(),date.getMonth(),date.getDate()-1,
                              date.getHours(),date.getMinutes(),date.getSeconds());
                    weekDaysArray[2] = new Date();
                    weekDaysArray[3] = new Date(date.getFullYear(),date.getMonth(),date.getDate()+1,
                              date.getHours(),date.getMinutes(),date.getSeconds()); 
                    weekDaysArray[4] = new Date(date.getFullYear(),date.getMonth(),date.getDate()+2,
                              date.getHours(),date.getMinutes(),date.getSeconds());
                    weekDaysArray[5] = new Date(date.getFullYear(),date.getMonth(),date.getDate()+3,
                              date.getHours(),date.getMinutes(),date.getSeconds());
                    weekDaysArray[6] = new Date(date.getFullYear(),date.getMonth(),date.getDate()+4,
                              date.getHours(),date.getMinutes(),date.getSeconds());
                    weekDaysArray[0] = new Date(date.getFullYear(),date.getMonth(),date.getDate()+5,
                              date.getHours(),date.getMinutes(),date.getSeconds());
                              
               }else if(date.getDay()==3){
                    weekDaysArray[1] = new Date(date.getFullYear(),date.getMonth(),date.getDate()-2,
                              date.getHours(),date.getMinutes(),date.getSeconds());
                    weekDaysArray[2] = new Date(date.getFullYear(),date.getMonth(),date.getDate()-1,
                              date.getHours(),date.getMinutes(),date.getSeconds());
                    weekDaysArray[3] = new Date(); 
                    weekDaysArray[4] = new Date(date.getFullYear(),date.getMonth(),date.getDate()+1,
                              date.getHours(),date.getMinutes(),date.getSeconds());
                    weekDaysArray[5] = new Date(date.getFullYear(),date.getMonth(),date.getDate()+2,
                              date.getHours(),date.getMinutes(),date.getSeconds());
                    weekDaysArray[6] = new Date(date.getFullYear(),date.getMonth(),date.getDate()+3,
                              date.getHours(),date.getMinutes(),date.getSeconds());
                    weekDaysArray[0] = new Date(date.getFullYear(),date.getMonth(),date.getDate()+4,
                              date.getHours(),date.getMinutes(),date.getSeconds());
                              
               }else if(date.getDay()==4){
                    weekDaysArray[1] = new Date(date.getFullYear(),date.getMonth(),date.getDate()-3,
                              date.getHours(),date.getMinutes(),date.getSeconds());
                    weekDaysArray[2] = new Date(date.getFullYear(),date.getMonth(),date.getDate()-2,
                              date.getHours(),date.getMinutes(),date.getSeconds());
                    weekDaysArray[3] = new Date(date.getFullYear(),date.getMonth(),date.getDate()-1,
                              date.getHours(),date.getMinutes(),date.getSeconds()); 
                    weekDaysArray[4] = new Date();
                    weekDaysArray[5] = new Date(date.getFullYear(),date.getMonth(),date.getDate()+1,
                              date.getHours(),date.getMinutes(),date.getSeconds());
                    weekDaysArray[6] = new Date(date.getFullYear(),date.getMonth(),date.getDate()+2,
                              date.getHours(),date.getMinutes(),date.getSeconds());
                    weekDaysArray[0] = new Date(date.getFullYear(),date.getMonth(),date.getDate()+3,
                              date.getHours(),date.getMinutes(),date.getSeconds());
                              
               }else if(date.getDay()==5){
                    weekDaysArray[1] = new Date(date.getFullYear(),date.getMonth(),date.getDate()-4,
                              date.getHours(),date.getMinutes(),date.getSeconds());
                    weekDaysArray[2] = new Date(date.getFullYear(),date.getMonth(),date.getDate()-3,
                              date.getHours(),date.getMinutes(),date.getSeconds());
                    weekDaysArray[3] = new Date(date.getFullYear(),date.getMonth(),date.getDate()-2,
                              date.getHours(),date.getMinutes(),date.getSeconds()); 
                    weekDaysArray[4] = new Date(date.getFullYear(),date.getMonth(),date.getDate()-1,
                              date.getHours(),date.getMinutes(),date.getSeconds());
                    weekDaysArray[5] = new Date();
                    weekDaysArray[6] = new Date(date.getFullYear(),date.getMonth(),date.getDate()+1,
                              date.getHours(),date.getMinutes(),date.getSeconds());
                    weekDaysArray[0] = new Date(date.getFullYear(),date.getMonth(),date.getDate()+2,
                              date.getHours(),date.getMinutes(),date.getSeconds());
                              
               }else if(date.getDay()==6){
                    weekDaysArray[1] = new Date(date.getFullYear(),date.getMonth(),date.getDate()-5,
                              date.getHours(),date.getMinutes(),date.getSeconds());
                    weekDaysArray[2] = new Date(date.getFullYear(),date.getMonth(),date.getDate()-4,
                              date.getHours(),date.getMinutes(),date.getSeconds());
                    weekDaysArray[3] = new Date(date.getFullYear(),date.getMonth(),date.getDate()-3,
                              date.getHours(),date.getMinutes(),date.getSeconds()); 
                    weekDaysArray[4] = new Date(date.getFullYear(),date.getMonth(),date.getDate()-2,
                              date.getHours(),date.getMinutes(),date.getSeconds());
                    weekDaysArray[5] = new Date(date.getFullYear(),date.getMonth(),date.getDate()-1,
                              date.getHours(),date.getMinutes(),date.getSeconds());
                    weekDaysArray[6] = new Date();
                    weekDaysArray[0] = new Date(date.getFullYear(),date.getMonth(),date.getDate()+1,
                              date.getHours(),date.getMinutes(),date.getSeconds());
               }
               
                for(var i=0; i<weekDaysArray.length;i++) {
                    console.log('Preparing weekDaysArray[',i,']=',weekDaysArray[i])
                } 
          
          /*********************************************************************/              
            
                
          for(var i=0; i<calEventArray.length;i++) {       
          var  calEvent = calEventArray[i];                
                            
          console.log('DatePreparing::  start calEvent.start:'+calEvent.start );
          console.log('DatePreparing::  end calEvent.start:'+calEvent.end );
          
          
          
          
           
           calEvent.start=new Date(
                    weekDaysArray[calEvent.day].getFullYear(),
                    weekDaysArray[calEvent.day].getMonth(),
                    weekDaysArray[calEvent.day].getDate(),
                    calEvent.start.getHours(),calEvent.start.getMinutes(),calEvent.start.getSeconds() );
              
                calEvent.end=new Date(
                  weekDaysArray[calEvent.day].getFullYear(),
                  weekDaysArray[calEvent.day].getMonth(),
                  weekDaysArray[calEvent.day].getDate(),
                  calEvent.end.getHours(),calEvent.end.getMinutes(),calEvent.end.getSeconds() );
           
           
                       
              
            console.log('DatePreparing::   calEvent.start:'+ calEvent.start+', calEvent.end:'+calEvent.end);
           
           self.updateEvent(calEvent);
           
           }
           
           
      },
      
          
      
       
      /********************
       * public functions *
       ********************/
      /*
       * Refresh the events for the currently displayed week.
       */
      refresh : function() {
         this._clearCalendar();
         this._loadCalEvents(this.element.data("startDate")); //reload with existing week
      },

      /*
       * Clear all events currently loaded into the calendar
       */
      clear : function() {
         this._clearCalendar();
      },

      /*
       * Go to this week
       */
      today : function() {
         this._clearCalendar();
         this._loadCalEvents(new Date());
      },

      /*
       * Go to the previous week relative to the currently displayed week
       */
      prevWeek : function() {
         //minus more than 1 day to be sure we're in previous week - account for daylight savings or other anomolies
         var newDate = new Date(this.element.data("startDate").getTime() - (MILLIS_IN_WEEK / 6));
         this._clearCalendar();
         this._loadCalEvents(newDate);
         //this._loadCalEventsPrevious(newDate);
         
      },
      
      
      /*
       * load calendar events for the week based on the date provided
       */
       
      _loadCalEventsPrevious : function(dateWithinWeek) {

         var date, weekStartDate, endDate, $weekDayColumns;
         var self = this;
         var options = this.options;
         date = dateWithinWeek || options.date;
         weekStartDate = self._dateFirstDayOfWeek(date);
         weekEndDate = self._dateLastMilliOfWeek(date);
         
         console.log('weekStartDate:',weekStartDate);
         console.log('weekEndDate:',weekEndDate);

         options.calendarBeforeLoad(self.element);

         self.element.data("startDate", weekStartDate);
         self.element.data("endDate", weekEndDate);

         $weekDayColumns = self.element.find(".wc-day-column-inner");

         self._updateDayColumnHeader($weekDayColumns);

         self._disableTextSelect($weekDayColumns);
          
         
         
         //calEventArray.push(calEvent);
        // console.log('_loadCalEventsPrevious calEventArray.length:'+$calEventArray.length+', dateWithinWeek:'+dateWithinWeek);

      },

      /*
       * Go to the next week relative to the currently displayed week
       */
      nextWeek : function() {
         //add 8 days to be sure of being in prev week - allows for daylight savings or other anomolies
         var newDate = new Date(this.element.data("startDate").getTime() + MILLIS_IN_WEEK + (MILLIS_IN_WEEK / 7));
         this._clearCalendar();
         this._loadCalEvents(newDate);
      },

      /*
       * Reload the calendar to whatever week the date passed in falls on.
       */
      gotoWeek : function(date) {
         this._clearCalendar();
         this._loadCalEvents(date);
      },

      /*
       * Remove an event based on it's id
       */
      removeEvent : function(eventId) {

         var self = this;

         self.element.find(".wc-cal-event").each(function() {
            if ($(this).data("calEvent").id === eventId) {
               $(this).remove();
               return false;
            }
         });

         //this could be more efficient rather than running on all days regardless...
         self.element.find(".wc-day-column-inner").each(function() {
            self._adjustOverlappingEvents($(this));
         });
      },

      /*
       * Removes any events that have been added but not yet saved (have no id).
       * This is useful to call after adding a freshly saved new event.
       */
      removeUnsavedEvents : function() {

         var self = this;

         self.element.find(".wc-new-cal-event").each(function() {
            $(this).remove();
         });

         //this could be more efficient rather than running on all days regardless...
         self.element.find(".wc-day-column-inner").each(function() {
            self._adjustOverlappingEvents($(this));
         });
      },

      /*
       * update an event in the calendar. If the event exists it refreshes
       * it's rendering. If it's a new event that does not exist in the calendar
       * it will be added.
       */
      updateEvent : function (calEvent) {
         console.log('updateEvent 01');
         this._updateEventInCalendar(calEvent);
      },
      
      dateNameFunction : function(currentDay){
         var vvvvv= this._getDateName(currentDay);
         console.log('vvvvv:'+vvvvv);
         return   vvvvv;
      },

      _getDateName : function(currentDay){
        var options = this.options;
       // var weekStartDate = self._dateFirstDayOfWeek(currentDay);
        //var weekEndDate = self._dateLastMilliOfWeek(currentDay);
        var dayName = options.useShortDayNames ? options.shortDays[currentDay.getDay()] : options.longDays[currentDay.getDay()];
        console.log(' _getDateName  currentDay.getDay(): '+currentDay.getDay()+', dayName: '+dayName);
        return   dayName;
      },

      /*
       * Returns an array of timeslot start and end times based on
       * the configured grid of the calendar. Returns in both date and
       * formatted time based on the 'timeFormat' config option.
       */
      getTimeslotTimes : function(date) {
      
      //console.log('getTimeslotTimes date:'+date);
         var options = this.options;
         var firstHourDisplayed = options.businessHours.limitDisplay ? options.businessHours.start : 0;
         //console.log('getTimeslotTimes date.getFullYear():'+date.getFullYear());
         //console.log('getTimeslotTimes date.getMonth():'+date.getMonth());
         //console.log('getTimeslotTimes date.getDate():'+date.getDate());
         var startDate = new Date(date.getFullYear(), date.getMonth(), date.getDate(), firstHourDisplayed);
         //console.log('getTimeslotTimes startDate:'+startDate);

         var times = []
         var startMillis = startDate.getTime();
         //console.log('getTimeslotTimes-> startMillis:'+startMillis +' ,startDate:'+startDate);
         
         for (var i = 0; i < options.timeslotsPerDay; i++) {  //  36 timeslotsPerDay
            var endMillis = startMillis + options.millisPerTimeslot;   // 36000  millisPerTimeslot    
            times[i] = {
               start: new Date(startMillis),
               startFormatted: this._formatDate(new Date(startMillis), options.timeFormat),
               end: new Date(endMillis),
               endFormatted: this._formatDate(new Date(endMillis), options.timeFormat)
            };
            startMillis = endMillis;
         }
         return times;
      },

      formatDate : function(date, format) {
         if (format) {
            return this._formatDate(date, format);
         } else {
            return this._formatDate(date, this.options.dateFormat);
         }
      },

      formatTime : function(date, format) {
         if (format) {
            return this._formatDate(date, format);
         } else {
            return this._formatDate(date, this.options.timeFormat);
         }
      },

      getData : function(key) {
         return this._getData(key);
      },

      /*********************
       * private functions *
       *********************/
      // compute dynamic options based on other config values
      _computeOptions : function() {

         var options = this.options;

         if (options.businessHours.limitDisplay) {
            options.timeslotsPerDay = options.timeslotsPerHour * (options.businessHours.end - options.businessHours.start);
            options.millisToDisplay = (options.businessHours.end - options.businessHours.start) * 60 * 60 * 1000;
            options.millisPerTimeslot = options.millisToDisplay / options.timeslotsPerDay;
         } else {
            options.timeslotsPerDay = options.timeslotsPerHour * 24;
            options.millisToDisplay = MILLIS_IN_DAY;
            options.millisPerTimeslot = MILLIS_IN_DAY / options.timeslotsPerDay;
         }
      },

      /*
       * Resize the calendar scrollable height based on the provided function in options.
       */
      _resizeCalendar : function () {

         var options = this.options;
         if (options && $.isFunction(options.height)) {
            var calendarHeight = options.height(this.element);
            var headerHeight = this.element.find(".wc-header").outerHeight();
            var navHeight = this.element.find(".wc-nav").outerHeight();
            this.element.find(".wc-scrollable-grid").height(calendarHeight - navHeight - headerHeight);
         }
      },

      /*
       * configure calendar interaction events that are able to use event
       * delegation for greater efficiency
       */
      _setupEventDelegation : function() {
         var self = this;
         var options = this.options;
         this.element.click(function(event) {
            var $target = $(event.target);
            if ($target.data("preventClick")) {
               return;
            }
            if ($target.hasClass("wc-cal-event")) {
               options.eventClick($target.data("calEvent"), $target, event);
            } else if ($target.parent().hasClass("wc-cal-event")) {
               options.eventClick($target.parent().data("calEvent"), $target.parent(), event);
            }
         }).mouseover(function(event) {
            var $target = $(event.target);

            if (self._isDraggingOrResizing($target)) {
               return;
            }

            if ($target.hasClass("wc-cal-event")) {
               options.eventMouseover($target.data("calEvent"), $target, event);
            }
         }).mouseout(function(event) {
            var $target = $(event.target);
            if (self._isDraggingOrResizing($target)) {
               return;
            }
            if ($target.hasClass("wc-cal-event")) {
               if ($target.data("sizing")) return;
               options.eventMouseout($target.data("calEvent"), $target, event);

            }
         });
      },

      /*
       * check if a ui draggable or resizable is currently being dragged or resized
       */
      _isDraggingOrResizing : function ($target) {
         return $target.hasClass("ui-draggable-dragging") || $target.hasClass("ui-resizable-resizing");
      },

      /*
       * Render the main calendar layout
       */
      _renderCalendar : function() {
         console.log('_renderCalendar ') ;
         var $calendarContainer, calendarNavHtml, calendarHeaderHtml, calendarBodyHtml, $weekDayColumns;
         var self = this;
         var options = this.options;

         $calendarContainer = $("<div class=\"wc-container\">").appendTo(self.element);

         if (options.buttons) {
           /******************************
            * REMOVED
            *  calendarNavHtml = "<div class=\"wc-nav\">\
                    <button class=\"wc-today\">" + options.buttonText.today + "</button>\
                    <button class=\"wc-prev\">" + options.buttonText.lastWeek + "</button>\
                    <button class=\"wc-next\">" + options.buttonText.nextWeek + "</button>\
                    </div>";
             $(calendarNavHtml).appendTo($calendarContainer);
             

            $calendarContainer.find(".wc-nav .wc-today").click(function() {
               self.element.weekCalendar("today");
               return false;
            });

            $calendarContainer.find(".wc-nav .wc-prev").click(function() {
               self.element.weekCalendar("prevWeek");
               return false;
            });

            $calendarContainer.find(".wc-nav .wc-next").click(function() {
               self.element.weekCalendar("nextWeek");
               return false;
            });
            
            ****************************/

         }

         //render calendar header
         calendarHeaderHtml = "<table class=\"wc-header\"><tbody><tr><td class=\"wc-time-column-header\"></td>";
         for (var i = 1; i <= options.daysToShow; i++) {
         
                calendarHeaderHtml += "<td class=\"wc-day-column-header wc-day-" + i + "\"></td>";
            
         }
         calendarHeaderHtml += "<td class=\"wc-scrollbar-shim\"></td></tr></tbody></table>";

         //render calendar body
         calendarBodyHtml = "<div class=\"wc-scrollable-grid\">\
                <table class=\"wc-time-slots\">\
                <tbody>\
                <tr>\
                <td class=\"wc-grid-timeslot-header\"></td>\
                <td colspan=\"" + options.daysToShow + "\">\
                <div class=\"wc-time-slot-wrapper\">\
                <div class=\"wc-time-slots\">";

         var start = options.businessHours.limitDisplay ? options.businessHours.start : 0;
         var end = options.businessHours.limitDisplay ? options.businessHours.end : 24;

         for (var i = start; i < end; i++) {
            for (var j = 0; j < options.timeslotsPerHour - 1; j++) {
               calendarBodyHtml += "<div class=\"wc-time-slot\"></div>";
            }
            calendarBodyHtml += "<div class=\"wc-time-slot wc-hour-end\"></div>";
         }

         calendarBodyHtml += "</div></div></td></tr><tr><td class=\"wc-grid-timeslot-header\" style=\"position: absolute\" >";

         for (var i = start; i < end; i++) {

            var bhClass = (options.businessHours.start <= i && options.businessHours.end > i) ? "wc-business-hours" : "";
            calendarBodyHtml += "<div class=\"wc-hour-header " + bhClass + "\">"
            if (options.use24Hour) {
               calendarBodyHtml += "<div class=\"wc-time-header-cell\">" + self._24HourForIndex(i) + "</div>";
            } else {
               calendarBodyHtml += "<div class=\"wc-time-header-cell\">" + self._hourForIndex(i) + "<span class=\"wc-am-pm\">" + self._amOrPm(i) + "</span></div>";
            }
            calendarBodyHtml += "</div>";
         }

         calendarBodyHtml += "</td>";

         for (var i = 1; i <= options.daysToShow; i++) {
            if(i==6 || i==7){
               // console.log('renderCalendar test for i67') ;
               calendarBodyHtml += "<td class=\"wc-day-column wc-weekEnd day-" + i + "\" style=\"background-color: #BAC2B3;\" ><div class=\"wc-day-column-inner\"></div></td>"
            }else{
              calendarBodyHtml += "<td class=\"wc-day-column day-" + i + "\"><div class=\"wc-day-column-inner\"></div></td>"
            }
            
         }

         calendarBodyHtml += "</tr></tbody></table></div>";

         //append all calendar parts to container
         $(calendarHeaderHtml + calendarBodyHtml).appendTo($calendarContainer);

         $weekDayColumns = $calendarContainer.find(".wc-day-column-inner");
         $weekDayColumns.each(function(i, val) {
            $(this).height(options.timeslotHeight * options.timeslotsPerDay);
            if (!options.readonly) {
               self._addDroppableToWeekDay($(this));
               console.log(' call to _setupEventCreationForWeekDay ');
               self._setupEventCreationForWeekDay($(this));
            }
         });

         $calendarContainer.find(".wc-time-slot").height(options.timeslotHeight - 1); //account for border

         $calendarContainer.find(".wc-time-header-cell").css({
            //height :  (options.timeslotHeight * options.timeslotsPerHour) - 11,
            height :  (options.timeslotHeight * options.timeslotsPerHour) - 5,
            padding: 5
         });


      },

      /*
       * setup mouse events for capturing new events
       */
      _setupEventCreationForWeekDay : function($weekDay) {
      
      //console.log('_setupEventCreationForWeekDay ') ;  appelee pour chaque jour du semaine
         var self = this;
         var options = this.options;
         $weekDay.mousedown(function(event) {
            var $target = $(event.target);
            if ($target.hasClass("wc-day-column-inner")) {

               var $newEvent = $("<div class=\"wc-cal-event wc-new-cal-event wc-new-cal-event-creating\"></div>");

               $newEvent.css({lineHeight: (options.timeslotHeight - 2) + "px", fontSize: (options.timeslotHeight / 2) + "px"});
               $target.append($newEvent);

               var columnOffset = $target.offset().top;
               var clickY = event.pageY - columnOffset;
               var clickYRounded = (clickY - (clickY % options.timeslotHeight)) / options.timeslotHeight;
               var topPosition = clickYRounded * options.timeslotHeight;
               $newEvent.css({top: topPosition});

               $target.bind("mousemove.newevent", function(event) {
                  $newEvent.show();
                  $newEvent.addClass("ui-resizable-resizing");
                  var height = Math.round(event.pageY - columnOffset - topPosition);
                  var remainder = height % options.timeslotHeight;
                  //snap to closest timeslot
                  if (remainder < (height / 2)) {
                     var useHeight = height - remainder;
                     $newEvent.css("height", useHeight < options.timeslotHeight ? options.timeslotHeight : useHeight);
                  } else {
                     $newEvent.css("height", height + (options.timeslotHeight - remainder));
                  }
               }).mouseup(function() {
                  $target.unbind("mousemove.newevent");
                  $newEvent.addClass("ui-corner-all");
               });
            }

         }).mouseup(function(event) {
            var $target = $(event.target);

            var $weekDay = $target.closest(".wc-day-column-inner");
            var $newEvent = $weekDay.find(".wc-new-cal-event-creating");
            
            console.log('_setupEventCreationForWeekDay $weekDay'+$weekDay);
            console.log('_setupEventCreationForWeekDay $newEvent'+$newEvent.length);

            if ($newEvent.length) {
               //if even created from a single click only, default height
               if (!$newEvent.hasClass("ui-resizable-resizing")) {
                  $newEvent.css({height: options.timeslotHeight * options.defaultEventLength}).show();
               }
               var top = parseInt($newEvent.css("top"));
               var eventDuration = self._getEventDurationFromPositionedEventElement($weekDay, $newEvent, top);

               $newEvent.remove();
               var newCalEvent = {start: eventDuration.start, end: eventDuration.end, title: options.newEventText};
               console.log('_setupEventCreationForWeekDay .mouseup');
               var $renderedCalEvent = self._renderEvent(newCalEvent, $weekDay);

               if (!options.allowCalEventOverlap) {
                  self._adjustForEventCollisions($weekDay, $renderedCalEvent, newCalEvent, newCalEvent);
                  self._positionEvent($weekDay, $renderedCalEvent);
               } else {
                  self._adjustOverlappingEvents($weekDay);
               }

               options.eventNew(eventDuration, $renderedCalEvent);
            }
         });
      },

      /*
       * load calendar events for the week based on the date provided
       */
      _loadCalEvents : function(dateWithinWeek) {

      //console.log('_loadCalEvents dateWithinWeek :'+dateWithinWeek);

         var date, weekStartDate, endDate, $weekDayColumns;
         var self = this;
         var options = this.options;
         date = dateWithinWeek || options.date;
         weekStartDate = self._dateFirstDayOfWeek(date);
         weekEndDate = self._dateLastMilliOfWeek(date);

         options.calendarBeforeLoad(self.element);

         self.element.data("startDate", weekStartDate);
         self.element.data("endDate", weekEndDate);
         
         console.log(' weekStartDate: ' + weekStartDate+', weekEndDate:'+weekEndDate);
         //console.log(' startDate: ' + startDate+', endDate:'+endDate);

         $weekDayColumns = self.element.find(".wc-day-column-inner");

         self._updateDayColumnHeader($weekDayColumns);

         //load events by chosen means
         if (typeof options.data == 'string') {
            if (options.loading) options.loading(true);
            var jsonOptions = {};
            jsonOptions[options.startParam || 'start'] = Math.round(weekStartDate.getTime() / 1000);
            jsonOptions[options.endParam || 'end'] = Math.round(weekEndDate.getTime() / 1000);
            $.getJSON(options.data, jsonOptions, function(data) {
               self._renderEvents(data, $weekDayColumns);
               if (options.loading) options.loading(false);
            });
         }
         else if ($.isFunction(options.data)) {
            options.data(weekStartDate, weekEndDate,
                  function(data) {
                      console.log('_loadCalEvents isFunction options.data');
                     self._renderEvents(data, $weekDayColumns);
                  });
         }
         else if (options.data) {
               console.log('_loadCalEvents .options.data');
               self._renderEvents(options.data, $weekDayColumns);
            }

         self._disableTextSelect($weekDayColumns);


      },

     

      /*
       * update the display of each day column header based on the calendar week
       */    
      _updateDayColumnHeader : function ($weekDayColumns) {
        
         var self = this;
         var options = this.options;
         var currentDay = self._cloneDate(self.element.data("startDate"));
         
         console.log(' _updateDayColumnHeader  currentDay:'+currentDay);
         
         self.element.find(".wc-header td.wc-day-column-header").each(function(i, val) {

            var dayName = options.useShortDayNames ? options.shortDays[currentDay.getDay()] : options.longDays[currentDay.getDay()];
            
            console.log(' _updateDayColumnHeader  currentDay.getDay(): '+currentDay.getDay()+', dayName: '+dayName);
            
            /******************
             *  Diplay Dates Diplay in column header
             *****************/  
             
                                               
             //$(this).html(dayName + "<br/>" + self._formatDate(currentDay, options.dateFormat));   
            
            $(this).html(dayName);
            
           console.log(' _updateDayColumnHeader  currentDay.getDay():'+currentDay.getDay());
           if (currentDay.getDay()==0 || currentDay.getDay()== 6 ){
               $(this).addClass("wc-weekEnd");
            } else if (self._isToday(currentDay)) {
               $(this).addClass("wc-today");
            } else {
               $(this).removeClass("wc-today");
            }
            currentDay = self._addDays(currentDay, 1); 

         });

         currentDay = self._dateFirstDayOfWeek(self._cloneDate(self.element.data("startDate")));

         $weekDayColumns.each(function(i, val) {

            $(this).data("startDate", self._cloneDate(currentDay));
            $(this).data("endDate", new Date(currentDay.getTime() + (MILLIS_IN_DAY)));
            if (self._isToday(currentDay)) {
               $(this).parent().addClass("wc-today");
            } else {
               $(this).parent().removeClass("wc-today");
            }

            currentDay = self._addDays(currentDay, 1);
         });

      },

      /*
       * Render the events into the calendar
       */
      _renderEvents : function (events, $weekDayColumns) {
         var self = this;
         var options = this.options;
         var eventsToRender;

         if ($.isArray(events)) {
            eventsToRender = self._cleanEvents(events);
         } else if (events.events) {
            eventsToRender = self._cleanEvents(events.events);
         }
         if (events.options) {

            var updateLayout = false;
            //update options
            $.each(events.options, function(key, value) {
               if (value !== options[key]) {
                  options[key] = value;
                  updateLayout = true;
               }
            });

            self._computeOptions();

            if (updateLayout) {
               self.element.empty();
               self._renderCalendar();
               $weekDayColumns = self.element.find(".wc-time-slots .wc-day-column-inner");
               self._updateDayColumnHeader($weekDayColumns);
               self._resizeCalendar();
            }

         }


         $.each(eventsToRender, function(i, calEvent) {

            var $weekDay = self._findWeekDayForEvent(calEvent, $weekDayColumns);

            if ($weekDay) {
               self._renderEvent(calEvent, $weekDay);
            }
         });

         $weekDayColumns.each(function() {
            self._adjustOverlappingEvents($(this));
         });

         options.calendarAfterLoad(self.element);

         if (!eventsToRender.length) {
            options.noEvents();
         }

      },

      /*
       * Render a specific event into the day provided. Assumes correct
       * day for calEvent date
       */
      _renderEvent: function (calEvent, $weekDay) {
         console.log('_renderEvent: calEvent.start'+calEvent.start);
         var self = this;
         var options = this.options;
         if (calEvent.start.getTime() > calEvent.end.getTime()) {
            return; // can't render a negative height
         }

         var eventClass, eventHtml, $calEvent, $modifiedEvent;
         if(calEvent.id){
           if(calEvent.type==3){
              eventClass = "wc-cal-event clinique ";
               eventHtml = "<div class=\"" + eventClass + " ui-corner-all\">\
                <div class=\"wc-time ui-corner-all cliniqueTitle\" style=\"font-size: 9px;\"></div>\
                <div class=\"wc-title\" style=\"font-size: 11.5px;\"><u></br></u></div></div>";
           }else if(calEvent.type==2){
              eventClass = "wc-cal-event appointment ";
               eventHtml = "<div class=\"" + eventClass + " ui-corner-all\">\
                <div class=\"wc-time ui-corner-all appointmentTitle\" style=\"font-size: 9px;\"></div>\
                <div class=\"wc-title\" style=\"font-size: 10.5px;\"><u></br</u></div></div>";
           }else  if(calEvent.type==1){
              eventClass = "wc-cal-event freeVisit ";
               eventHtml = "<div class=\"" + eventClass + " ui-corner-all\">\
                <div class=\"wc-time ui-corner-all freeVisitTitle\" style=\"font-size: 9px;\"></div>\
                <div class=\"wc-title\" style=\"font-size: 10.5px;\"><u></br</u></div></div>";
           }else if(calEvent.type==4){
              eventClass = "wc-cal-event hopital ";
               eventHtml = "<div class=\"" + eventClass + " ui-corner-all\">\
                <div class=\"wc-time ui-corner-all hopitalTitle\" style=\"font-size: 9px;\"></div>\
                <div class=\"wc-title\" style=\"font-size: 10.5px;\"><u></br</u></div></div>";
           }else{
              eventClass = "wc-cal-event univTitle";
               eventHtml = "<div class=\"" + eventClass + " ui-corner-all\">\
                <div class=\"wc-time ui-corner-all univTitle\" style=\"font-size: 9px;\"></div>\
                <div class=\"wc-title\" style=\"font-size: 10.5px;\"><u></br</u></div></div>";
           }
         }else{
            eventClass = "wc-cal-event wc-new-cal-event";
             eventHtml = "<div class=\"" + eventClass + " ui-corner-all\">\
                <div class=\"wc-time ui-corner-all freeVisitTitle\" style=\"font-size: 9px;\"></div>\
                <div class=\"wc-title\" style=\"font-size: 10.5px;\"><u></br</u></div></div>";
         }
          
         /* eventClass = calEvent.id ? "wc-cal-event freeVisit " : "wc-cal-event wc-new-cal-event"; */
         /* eventHtml = "<div class=\"" + eventClass + " ui-corner-all\">\
                <div class=\"wc-time ui-corner-all freeVisitTitle\" style=\"font-size: 9px;\"></div>\
                <div class=\"wc-title\" style=\"font-size: 10.5px;\"><u></br</u></div></div>"; */

         $calEvent = $(eventHtml);
         $modifiedEvent = options.eventRender(calEvent, $calEvent);
         $calEvent = $modifiedEvent ? $modifiedEvent.appendTo($weekDay) : $calEvent.appendTo($weekDay);
         $calEvent.css({lineHeight: (options.timeslotHeight - 2) + "px", fontSize: (options.timeslotHeight / 2) + "px"});

         self._refreshEventDetails(calEvent, $calEvent);
         self._positionEvent($weekDay, $calEvent);
         $calEvent.show();

         if (!options.readonly && options.resizable(calEvent, $calEvent)) {
            self._addResizableToCalEvent(calEvent, $calEvent, $weekDay)
         }
         if (!options.readonly && options.draggable(calEvent, $calEvent)) {
            self._addDraggableToCalEvent(calEvent, $calEvent);
         }

         options.eventAfterRender(calEvent, $calEvent);

         return $calEvent;

      },

      _adjustOverlappingEvents : function($weekDay) {
         var self = this;
         if (self.options.allowCalEventOverlap) {
            var groupsList = self._groupOverlappingEventElements($weekDay);
            $.each(groupsList, function() {
               var curGroups = this;
               $.each(curGroups, function(groupIndex) {
                  var curGroup = this;

                  // do we want events to be displayed as overlapping
                  if (self.options.overlapEventsSeparate) {
                     var newWidth = 100 / curGroups.length;
                     var newLeft = groupIndex * newWidth;
                  } else {
                     // TODO what happens when the group has more than 10 elements
                     var newWidth = 100 - ( (curGroups.length - 1) * 10 );
                     var newLeft = groupIndex * 10;
                  }
                  $.each(curGroup, function() {
                     // bring mouseovered event to the front
                     if (!self.options.overlapEventsSeparate) {
                        $(this).bind("mouseover.z-index", function() {
                           var $elem = $(this);
                           $.each(curGroup, function() {
                              $(this).css({"z-index":  "1"});
                           });
                           $elem.css({"z-index": "3"});
                        });
                     }
                     $(this).css({width: newWidth + "%", left:newLeft + "%", right: 0});
                  });
               });
            });
         }
      },


      /*
       * Find groups of overlapping events
       */
      _groupOverlappingEventElements : function($weekDay) {
         var $events = $weekDay.find(".wc-cal-event:visible");
         var sortedEvents = $events.sort(function(a, b) {
            return $(a).data("calEvent").start.getTime() - $(b).data("calEvent").start.getTime();
         });

         var lastEndTime = new Date(0, 0, 0);
         var groups = [];
         var curGroups = [];
         var $curEvent;
         $.each(sortedEvents, function() {
            $curEvent = $(this);
            //checks, if the current group list is not empty, if the overlapping is finished
            if (curGroups.length > 0) {
               if (lastEndTime.getTime() <= $curEvent.data("calEvent").start.getTime()) {
                  //finishes the current group list by adding it to the resulting list of groups and cleans it

                  groups.push(curGroups);
                  curGroups = [];
               }
            }

            //finds the first group to fill with the event
            for (var groupIndex = 0; groupIndex < curGroups.length; groupIndex++) {
               if (curGroups[groupIndex].length > 0) {
                  //checks if the event starts after the end of the last event of the group
                  if (curGroups[groupIndex][curGroups [groupIndex].length - 1].data("calEvent").end.getTime() <= $curEvent.data("calEvent").start.getTime()) {
                     curGroups[groupIndex].push($curEvent);
                     if (lastEndTime.getTime() < $curEvent.data("calEvent").end.getTime()) {
                        lastEndTime = $curEvent.data("calEvent").end;
                     }
                     return;
                  }
               }
            }
            //if not found, creates a new group
            curGroups.push([$curEvent]);
            if (lastEndTime.getTime() < $curEvent.data("calEvent").end.getTime()) {
               lastEndTime = $curEvent.data("calEvent").end;
            }
         });
         //adds the last groups in result
         if (curGroups.length > 0) {
            groups.push(curGroups);
         }
         return groups;
      },


      /*
       * find the weekday in the current calendar that the calEvent falls within
       */
      _findWeekDayForEvent : function(calEvent, $weekDayColumns) {

         var $weekDay;
         $weekDayColumns.each(function() {
            if ($(this).data("startDate").getTime() <= calEvent.start.getTime() && $(this).data("endDate").getTime() >= calEvent.end.getTime()) {
               $weekDay = $(this);
               return false;
            }
         });
         return $weekDay;
      },

      /*
       * update the events rendering in the calendar. Add if does not yet exist.
       */
      _updateEventInCalendar : function (calEvent) {
      console.log(' _updateEventInCalendar ');
         var self = this;
         var options = this.options;
         self._cleanEvent(calEvent);
           //console.log('_updateEventInCalendar:: calEvent.id:'+calEvent.id+', calEvent.start:'+calEvent.start+', calEvent.end:'+calEvent.end+', calEvent.title:'+calEvent.title+', calEvent.body:'+calEvent.body);
         if (calEvent.id) {
            self.element.find(".wc-cal-event").each(function() {
               if ($(this).data("calEvent").id === calEvent.id || $(this).hasClass("wc-new-cal-event")) {
                  $(this).remove();
                  //console.log(' _updateEventInCalendar:: removed ');
                  return false;
               }
            });
         }

         var $weekDay = self._findWeekDayForEvent(calEvent, self.element.find(".wc-time-slots .wc-day-column-inner"));
         if ($weekDay) {
            var $calEvent = self._renderEvent(calEvent, $weekDay);
            self._adjustForEventCollisions($weekDay, $calEvent, calEvent, calEvent);
            self._refreshEventDetails(calEvent, $calEvent);
            self._positionEvent($weekDay, $calEvent);
            self._adjustOverlappingEvents($weekDay);
         }
      },

      /*
       * Position the event element within the weekday based on it's start / end dates.
       */
      _positionEvent : function($weekDay, $calEvent) {
         var options = this.options;
         var calEvent = $calEvent.data("calEvent");
         var pxPerMillis = $weekDay.height() / options.millisToDisplay;
         var firstHourDisplayed = options.businessHours.limitDisplay ? options.businessHours.start : 0;
         var startMillis = calEvent.start.getTime() - new Date(calEvent.start.getFullYear(), calEvent.start.getMonth(), calEvent.start.getDate(), firstHourDisplayed).getTime();
         var eventMillis = calEvent.end.getTime() - calEvent.start.getTime();
         var pxTop = pxPerMillis * startMillis;
         var pxHeight = pxPerMillis * eventMillis;
         $calEvent.css({top: pxTop, height: pxHeight});
      },

      /*
       * Determine the actual start and end times of a calevent based on it's
       * relative position within the weekday column and the starting hour of the
       * displayed calendar.
       */
      _getEventDurationFromPositionedEventElement : function($weekDay, $calEvent, top) {
         var options = this.options;
         var startOffsetMillis = options.businessHours.limitDisplay ? options.businessHours.start * 60 * 60 * 1000 : 0;
         var start = new Date($weekDay.data("startDate").getTime() + startOffsetMillis + Math.round(top / options.timeslotHeight) * options.millisPerTimeslot);
         var end = new Date(start.getTime() + ($calEvent.height() / options.timeslotHeight) * options.millisPerTimeslot);
         return {start: start, end: end};
      },

      /*
       * If the calendar does not allow event overlap, adjust the start or end date if necessary to
       * avoid overlapping of events. Typically, shortens the resized / dropped event to it's max possible
       * duration  based on the overlap. If no satisfactory adjustment can be made, the event is reverted to
       * it's original location.
       */
      _adjustForEventCollisions : function($weekDay, $calEvent, newCalEvent, oldCalEvent, maintainEventDuration) {
         var options = this.options;

         if (options.allowCalEventOverlap) {
            return;
         }
         var adjustedStart, adjustedEnd;
         var self = this;

         $weekDay.find(".wc-cal-event").not($calEvent).each(function() {
            var currentCalEvent = $(this).data("calEvent");

            //has been dropped onto existing event overlapping the end time
            if (newCalEvent.start.getTime() < currentCalEvent.end.getTime()
                  && newCalEvent.end.getTime() >= currentCalEvent.end.getTime()) {

               adjustedStart = currentCalEvent.end;
            }


            //has been dropped onto existing event overlapping the start time
            if (newCalEvent.end.getTime() > currentCalEvent.start.getTime()
                  && newCalEvent.start.getTime() <= currentCalEvent.start.getTime()) {

               adjustedEnd = currentCalEvent.start;
            }
            //has been dropped inside existing event with same or larger duration
            if (! oldCalEvent.resizable || (newCalEvent.end.getTime() <= currentCalEvent.end.getTime()
                  && newCalEvent.start.getTime() >= currentCalEvent.start.getTime())) {

               adjustedStart = oldCalEvent.start;
               adjustedEnd = oldCalEvent.end;
               return false;
            }

         });


         newCalEvent.start = adjustedStart || newCalEvent.start;

         if (adjustedStart && maintainEventDuration) {
            newCalEvent.end = new Date(adjustedStart.getTime() + (oldCalEvent.end.getTime() - oldCalEvent.start.getTime()));
            self._adjustForEventCollisions($weekDay, $calEvent, newCalEvent, oldCalEvent);
         } else {
            newCalEvent.end = adjustedEnd || newCalEvent.end;
         }


         //reset if new cal event has been forced to zero size
         if (newCalEvent.start.getTime() >= newCalEvent.end.getTime()) {
            newCalEvent.start = oldCalEvent.start;
            newCalEvent.end = oldCalEvent.end;
         }

         $calEvent.data("calEvent", newCalEvent);
      },

      /*
       * Add draggable capabilities to an event
       */
      _addDraggableToCalEvent : function(calEvent, $calEvent) {
         var self = this;
         var options = this.options;
         var $weekDay = self._findWeekDayForEvent(calEvent, self.element.find(".wc-time-slots .wc-day-column-inner"));
         $calEvent.draggable({
            handle : ".wc-time",
            containment: ".wc-scrollable-grid",
            revert: 'valid',
            opacity: 0.5,
            grid : [$calEvent.outerWidth() + 1, options.timeslotHeight ],
            start : function(event, ui) {
               var $calEvent = ui.draggable;
               options.eventDrag(calEvent, $calEvent);
            }
         });

      },

      /*
       * Add droppable capabilites to weekdays to allow dropping of calEvents only
       */
      _addDroppableToWeekDay : function($weekDay) {
       console.log('_addDroppableToWeekDay');
         var self = this;
         var options = this.options;
         $weekDay.droppable({
            accept: ".wc-cal-event",
            drop: function(event, ui) {
               var $calEvent = ui.draggable;
               var top = Math.round(parseInt(ui.position.top));
               var eventDuration = self._getEventDurationFromPositionedEventElement($weekDay, $calEvent, top);
               var calEvent = $calEvent.data("calEvent");
               var newCalEvent = $.extend(true, {start: eventDuration.start, end: eventDuration.end}, calEvent);
               self._adjustForEventCollisions($weekDay, $calEvent, newCalEvent, calEvent, true);
               var $weekDayColumns = self.element.find(".wc-day-column-inner");
               var $newEvent = self._renderEvent(newCalEvent, self._findWeekDayForEvent(newCalEvent, $weekDayColumns));
               $calEvent.hide();

               //trigger drop callback
               options.eventDrop(newCalEvent, calEvent, $newEvent);
               $calEvent.data("preventClick", true);

               var $weekDayOld = self._findWeekDayForEvent($calEvent.data("calEvent"), self.element.find(".wc-time-slots .wc-day-column-inner"));

               if ($weekDayOld.data("startDate") != $weekDay.data("startDate")) {
                  self._adjustOverlappingEvents($weekDayOld);
               }
               self._adjustOverlappingEvents($weekDay);

               setTimeout(function() {
                  $calEvent.remove();
               }, 1000);

            }
         });
      },

      /*
       * Add resizable capabilities to a calEvent
       */
      _addResizableToCalEvent : function(calEvent, $calEvent, $weekDay) {
         var self = this;
         var options = this.options;
         $calEvent.resizable({
            grid: options.timeslotHeight,
            containment : $weekDay,
            handles: "s",
            minHeight: options.timeslotHeight,
            stop :function(event, ui) {
               var $calEvent = ui.element;
               var newEnd = new Date($calEvent.data("calEvent").start.getTime() + ($calEvent.height() / options.timeslotHeight) * options.millisPerTimeslot);
               var newCalEvent = $.extend(true, {start: calEvent.start, end: newEnd}, calEvent);
               self._adjustForEventCollisions($weekDay, $calEvent, newCalEvent, calEvent);

               self._refreshEventDetails(newCalEvent, $calEvent);
               self._positionEvent($weekDay, $calEvent);
               self._adjustOverlappingEvents($weekDay);
               //trigger resize callback
               options.eventResize(newCalEvent, calEvent, $calEvent);
               $calEvent.data("preventClick", true);
               setTimeout(function() {
                  $calEvent.removeData("preventClick");
               }, 500);
            }
         });
      },

      /*
       * Refresh the displayed details of a calEvent in the calendar
       */
      _refreshEventDetails : function(calEvent, $calEvent) {
         var self = this;
         var options = this.options;
         $calEvent.find(".wc-time").html(self._formatDate(calEvent.start, options.timeFormat) + options.timeSeparator + self._formatDate(calEvent.end, options.timeFormat));
         $calEvent.find(".wc-title").html("</br><u>"+calEvent.title+"</u></br></br></br>"+calEvent.body);
         $calEvent.data("calEvent", calEvent);
      },

      /*
       * Clear all cal events from the calendar
       */
      _clearCalendar : function() {
         this.element.find(".wc-day-column-inner div").remove();
      },

      /*
       * Scroll the calendar to a specific hour
       */
      _scrollToHour : function(hour) {
         var self = this;
         var options = this.options;
         var $scrollable = this.element.find(".wc-scrollable-grid");
         var slot = hour;
         if (self.options.businessHours.limitDisplay) {
            if (hour <= self.options.businessHours.start) {
               slot = 0;
            } else if (hour > self.options.businessHours.end) {
               slot = self.options.businessHours.end -
               self.options.businessHours.start - 1;
            } else {
               slot = hour - self.options.businessHours.start;
            }
            
         }

         var $target = this.element.find(".wc-grid-timeslot-header .wc-hour-header:eq(" + slot + ")");

         $scrollable.animate({scrollTop: 0}, 0, function() {
            var targetOffset = $target.offset().top;
            var scroll = targetOffset - $scrollable.offset().top - $target.outerHeight();
            $scrollable.animate({scrollTop: scroll}, options.scrollToHourMillis);
         });
      },

      /*
       * find the hour (12 hour day) for a given hour index
       */
      _hourForIndex : function(index) {
         if (index === 0) { //midnight
            return 12;
         } else if (index < 13) { //am
            return index;
         } else { //pm
            return index - 12;
         }
      },

      _24HourForIndex : function(index) {
         if (index === 0) { //midnight
            return "00:00";
         } else if (index < 10) {
            return "0" + index + ":00";
         } else {
            return index + ":00";
         }
      },

      _amOrPm : function (hourOfDay) {
         return hourOfDay < 12 ? "AM" : "PM";
      },

      _isToday : function(date) {
         var clonedDate = this._cloneDate(date);
         this._clearTime(clonedDate);
         var today = new Date();
         this._clearTime(today);
         return today.getTime() === clonedDate.getTime();
      },

      /*
       * Clean events to ensure correct format
       */
      _cleanEvents : function(events) {
         var self = this;
         $.each(events, function(i, event) {
            self._cleanEvent(event);
         });
         return events;
      },

      /*
       * Clean specific event
       */
      _cleanEvent : function (event) {
         if (event.date) {
            event.start = event.date;
         }
         event.start = this._cleanDate(event.start);
         event.end = this._cleanDate(event.end);
         if (!event.end) {
            event.end = this._addDays(this._cloneDate(event.start), 1);
         }
      },

      /*
       * Disable text selection of the elements in different browsers
       */
      _disableTextSelect : function($elements) {
         $elements.each(function() {
            if ($.browser.mozilla) {//Firefox
               $(this).css('MozUserSelect', 'none');
            } else if ($.browser.msie) {//IE
               $(this).bind('selectstart', function() {
                  return false;
               });
            } else {//Opera, etc.
               $(this).mousedown(function() {
                  return false;
               });
            }
         });
      },

      /*
       * returns the date on the first millisecond of the week
       */
      _dateFirstDayOfWeek : function(date) {
         var self = this;
         var midnightCurrentDate = new Date(date.getFullYear(), date.getMonth(), date.getDate());
         var millisToSubtract = self._getAdjustedDayIndex(midnightCurrentDate) * 86400000;
         return new Date(midnightCurrentDate.getTime() - millisToSubtract);

      },

      /*
       * returns the date on the first millisecond of the last day of the week
       */
      _dateLastDayOfWeek : function(date) {
         var self = this;
         var midnightCurrentDate = new Date(date.getFullYear(), date.getMonth(), date.getDate());
         var millisToAdd = (6 - self._getAdjustedDayIndex(midnightCurrentDate)) * MILLIS_IN_DAY;
         return new Date(midnightCurrentDate.getTime() + millisToAdd);
      },

      /*
       * gets the index of the current day adjusted based on options
       */
      _getAdjustedDayIndex : function(date) {

         var midnightCurrentDate = new Date(date.getFullYear(), date.getMonth(), date.getDate());
         var currentDayOfStandardWeek = midnightCurrentDate.getDay();
         var days = [0,1,2,3,4,5,6];
         this._rotate(days, this.options.firstDayOfWeek);
         return days[currentDayOfStandardWeek];
      },

      /*
       * returns the date on the last millisecond of the week
       */
      _dateLastMilliOfWeek : function(date) {
         var lastDayOfWeek = this._dateLastDayOfWeek(date);
         return new Date(lastDayOfWeek.getTime() + (MILLIS_IN_DAY));

      },

      /*
       * Clear the time components of a date leaving the date
       * of the first milli of day
       */
      _clearTime : function(d) {
         d.setHours(0);
         d.setMinutes(0);
         d.setSeconds(0);
         d.setMilliseconds(0);
         return d;
      },

      /*
       * add specific number of days to date
       */
      _addDays : function(d, n, keepTime) {
         d.setDate(d.getDate() + n);
         if (keepTime) {
            return d;
         }
         return this._clearTime(d);
      },

      /*
       * Rotate an array by specified number of places.
       */
      _rotate : function(a /*array*/, p /* integer, positive integer rotate to the right, negative to the left... */) {
         for (var l = a.length, p = (Math.abs(p) >= l && (p %= l),p < 0 && (p += l),p), i, x; p; p = (Math.ceil(l / p) - 1) * p - l + (l = p)) {
            for (i = l; i > p; x = a[--i],a[i] = a[i - p],a[i - p] = x);
         }
         return a;
      },

      _cloneDate : function(d) {
         return new Date(d.getTime());
      },

      /*
       * return a date for different representations
       */
      _cleanDate : function(d) {
         if (typeof d == 'string') {
            return $.weekCalendar.parseISO8601(d, true) || Date.parse(d) || new Date(parseInt(d));
         }
         if (typeof d == 'number') {
            return new Date(d);
         }
         return d;
      },

      /*
       * date formatting is adapted from
       * http://jacwright.com/projects/javascript/date_format
       */
      _formatDate : function(date, format) {
         var options = this.options;
         var returnStr = '';
         for (var i = 0; i < format.length; i++) {
            var curChar = format.charAt(i);
            if ($.isFunction(this._replaceChars[curChar])) {
               returnStr += this._replaceChars[curChar](date, options);
            } else {
               returnStr += curChar;
            }
         }
         return returnStr;
      },

      _replaceChars : {

         // Day
         d: function(date) {
            return (date.getDate() < 10 ? '0' : '') + date.getDate();
         },
         D: function(date, options) {
            return options.shortDays[date.getDay()];
         },
         j: function(date) {
            return date.getDate();
         },
         l: function(date, options) {
            return options.longDays[date.getDay()];
         },
         N: function(date) {
            return date.getDay() + 1;
         },
         S: function(date) {
            return (date.getDate() % 10 == 1 && date.getDate() != 11 ? 'st' : (date.getDate() % 10 == 2 && date.getDate() != 12 ? 'nd' : (date.getDate() % 10 == 3 && date.getDate() != 13 ? 'rd' : 'th')));
         },
         w: function(date) {
            return date.getDay();
         },
         z: function(date) {
            return "Not Yet Supported";
         },
         // Week
         W: function(date) {
            return "Not Yet Supported";
         },
         // Month
         F: function(date, options) {
            return options.longMonths[date.getMonth()];
         },
         m: function(date) {
            return (date.getMonth() < 9 ? '0' : '') + (date.getMonth() + 1);
         },
         M: function(date, options) {
            return options.shortMonths[date.getMonth()];
         },
         n: function(date) {
            return date.getMonth() + 1;
         },
         t: function(date) {
            return "Not Yet Supported";
         },
         // Year
         L: function(date) {
            return "Not Yet Supported";
         },
         o: function(date) {
            return "Not Supported";
         },
         Y: function(date) {
            return date.getFullYear();
         },
         y: function(date) {
            return ('' + date.getFullYear()).substr(2);
         },
         // Time
         a: function(date) {
            return date.getHours() < 12 ? 'am' : 'pm';
         },
         A: function(date) {
            return date.getHours() < 12 ? 'AM' : 'PM';
         },
         B: function(date) {
            return "Not Yet Supported";
         },
         g: function(date) {
            return date.getHours() % 12 || 12;
         },
         G: function(date) {
            return date.getHours();
         },
         h: function(date) {
            return ((date.getHours() % 12 || 12) < 10 ? '0' : '') + (date.getHours() % 12 || 12);
         },
         H: function(date) {
            return (date.getHours() < 10 ? '0' : '') + date.getHours();
         },
         i: function(date) {
            return (date.getMinutes() < 10 ? '0' : '') + date.getMinutes();
         },
         s: function(date) {
            return (date.getSeconds() < 10 ? '0' : '') + date.getSeconds();
         },
         // Timezone
         e: function(date) {
            return "Not Yet Supported";
         },
         I: function(date) {
            return "Not Supported";
         },
         O: function(date) {
            return (date.getTimezoneOffset() < 0 ? '-' : '+') + (date.getTimezoneOffset() / 60 < 10 ? '0' : '') + (date.getTimezoneOffset() / 60) + '00';
         },
         T: function(date) {
            return "Not Yet Supported";
         },
         Z: function(date) {
            return date.getTimezoneOffset() * 60;
         },
         // Full Date/Time
         c: function(date) {
            return "Not Yet Supported";
         },
         r: function(date) {
            return date.toString();
         },
         U: function(date) {
            return date.getTime() / 1000;
         }
      }

   });

   $.extend($.ui.weekCalendar, {
      version: '1.2.2-pre',
      getter: ['getTimeslotTimes', 'getData', 'formatDate', 'formatTime','dateNameFunction'],
      defaults: {
         date: new Date(),
         timeFormat : "h:i a",
         dateFormat : "d M Y",
         use24Hour : true,
         daysToShow : 7,
         firstDayOfWeek : 0, // 0 = Sunday, 1 = Monday, 2 = Tuesday, ... , 6 = Saturday
         useShortDayNames: false,
         timeSeparator : " to ",
         startParam : "start",
         endParam : "end",
         businessHours : {start: 8, end: 19, limitDisplay : false},
         newEventText : "New Event",
         timeslotHeight: 13,
         defaultEventLength : 2,
         timeslotsPerHour : 4,
         buttons : true,
         buttonText : {
            today : "today",
            lastWeek : "&nbsp;&lt;&nbsp;",
            nextWeek : "&nbsp;&gt;&nbsp;"
         },
         scrollToHourMillis : 400,
         allowCalEventOverlap : false,
         overlapEventsSeparate: false,
         readonly: false, 
         draggable : function(calEvent, element) {
            return true;
         },
         resizable : function(calEvent, element) {
            return true;
         },
         eventClick : function() {
            return false;
         },
         eventRender : function(calEvent, element) {
            return element;
         },
         eventAfterRender : function(calEvent, element) {
            return element;
         },
         eventDrag : function(calEvent, element) {
         },
         eventDrop : function(calEvent, element) {
         },
         eventResize : function(calEvent, element) {
         },
         eventNew : function(calEvent, element) {
         },
         eventMouseover : function(calEvent, $event) {
         },
         eventMouseout : function(calEvent, $event) {
         },
         calendarBeforeLoad : function(calendar) {
         },
         calendarAfterLoad : function(calendar) {
         },
         noEvents : function() {
            return true;
         },
         shortMonths : ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
         longMonths : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
         shortDays : ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
         longDays : ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi']
         /* longDays : ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] */
      }
   });

   var MILLIS_IN_DAY = 86400000;
   var MILLIS_IN_WEEK = MILLIS_IN_DAY * 7;

   $.weekCalendar = function() {
      return {
         parseISO8601 : function(s, ignoreTimezone) {

            // derived from http://delete.me.uk/2005/03/iso8601.html
            var regexp = "([0-9]{4})(-([0-9]{2})(-([0-9]{2})" +
                         "(T([0-9]{2}):([0-9]{2})(:([0-9]{2})(\.([0-9]+))?)?" +
                         "(Z|(([-+])([0-9]{2}):([0-9]{2})))?)?)?)?";
            var d = s.match(new RegExp(regexp));
            if (!d) return null;
            var offset = 0;
            var date = new Date(d[1], 0, 1);
            if (d[3]) {
               date.setMonth(d[3] - 1);
            }
            if (d[5]) {
               date.setDate(d[5]);
            }
            if (d[7]) {
               date.setHours(d[7]);
            }
            if (d[8]) {
               date.setMinutes(d[8]);
            }
            if (d[10]) {
               date.setSeconds(d[10]);
            }
            if (d[12]) {
               date.setMilliseconds(Number("0." + d[12]) * 1000);
            }
            if (!ignoreTimezone) {
               if (d[14]) {
                  offset = (Number(d[16]) * 60) + Number(d[17]);
                  offset *= ((d[15] == '-') ? 1 : -1);
               }
               offset -= date.getTimezoneOffset();
            }
            return new Date(Number(date) + (offset * 60 * 1000));
         }
      };
   }();


})(jQuery); 



/*****************************************************************************************************************
 *
 *
 *
 *
 *
 *
 *************************************************************************************************************/      

 /*
	jQuery Document ready
*/
$(document).ready(function()
{
	/*
		store calendar dom into variable
	*/
	var $calendar = $('#calendar');
  <?php
 
   $eventIdd=$event->getEventId($idMedecin);
   
   echo 'console.log(" demo.php test !!!");' ;
   
   echo " var id = $eventIdd; ";
   
    // Finalement, on détruit la session.
    // session_destroy();
?>
  
	
  var $calEventArray = [];

	$calendar.weekCalendar(
	{
		/*
			define slot between each hours,
			4 define 4 time slot,
			which indicate 15 minutes,
			2 define 2 times slot,
			which indicate 30 minutes,
			between each hours
		*/
		timeslotsPerHour : 4,
		/*
			[boolean | default: false]
			Whether the calendar will allow events to overlap.
			Events will be moved or resized if necessary
			if they are dragged or resized to a location
			that overlaps another calendar event.
		*/
		allowCalEventOverlap : true,
		/*
			[boolean | default: false]
			If true,
			events that overlap will be rendered separately without any overlap.
		*/
		overlapEventsSeparate: true,
		/*
			[integer | default: 0]
			Determines what day of the week to start on.
			0 = sunday, 1 = monday etc
		*/
		firstDayOfWeek : 1,
		/*
			[object | default:
			{start: 8, end: 18, limitDisplay: false}]
			An object that specifies which hours within the day to render as
		*/
		businessHours :{start: 8, end: 19, limitDisplay: true },
		/*
			[integer | default: 7]
			Determines how many days to show.
			Note that next/prev weekly navigation is still
			based on weeks rather than the number of days displaying
		*/
		daysToShow : 7,
		/*
			A function that can return a height in pixels for the calendar.
			If the height of the calendar is less than the space it takes to render it,
			the calendar will scroll within the timeslot
			region while the day column headers will remain fixed
		*/
		height : function($calendar)
		{
			/*var ht= $(window).height() - $("h1").outerHeight() - 1;
      console.log('height in pixels for the calendar: '+ht);
      return ht;   */
      
      return $(window).height() - $("h1").outerHeight() - 1;
      
      
		},
		/*
			Called prior to rendering an event.
			Allows modification of the eventElement
			or the ability to return a different element
		*/
		eventRender : function(calEvent, $event)
		{
			if (calEvent.end.getTime() < new Date().getTime())
			{
				
        /*********************
         *    The   background-color is removed here   *
         *********************/                          
        //$event.css("backgroundColor", "#aaa");
				/*$event.find(".wc-time").css({
					"backgroundColor" : "#999",
					"border" : "1px solid #888"
				});
        */
			}
		},
		/*
			Called on each event to determine whether
			it should be draggable or not.
			Default function returns true on all events.
		*/
		draggable : function(calEvent, $event)
		{
			return calEvent.readOnly != true;
      /*var htt= calEvent.readOnly != true;
      console.log(' draggable should be draggable or not:'+htt);
      return htt;    */
		},
		/*
			Called on each event to determine whether
			it should be resizable or not.
			Default function returns true on all events.
		*/
		resizable : function(calEvent, $event)
		{
			return calEvent.readOnly != true;
		},
		/*
			Called on creation of a new calendar event
		*/
		eventNew : function(calEvent, $event)
		{
			/*
				we are creating dialog box,
				which will be shown when event is selected.
			*/
			var $dialogContent = $("#event_edit_container");
			resetForm($dialogContent);
			var startField = $dialogContent.find("select[name='start']").val(calEvent.start);
			var endField = $dialogContent.find("select[name='end']").val(calEvent.end);
			var titleField = $dialogContent.find("input[name='title']");
			var bodyField = $dialogContent.find("textarea[name='body']");
      var eventTypeField = $dialogContent.find("select[name='eventType']");

			$dialogContent.dialog(
			{
				modal: true,
				title: "Nouveau Evennement",
				close: function()
				{
					$dialogContent.dialog("destroy");
					$dialogContent.hide();
					$('#calendar').weekCalendar("removeUnsavedEvents");
				},
				buttons:
				{
					save : function()
					{
						calEvent.id = id;
						calEvent.start = new Date(startField.val());
						calEvent.end = new Date(endField.val());
						calEvent.title = titleField.val();
						calEvent.body = bodyField.val();
            calEvent.type = eventTypeField.val();
						
            var dateName= $calendar.weekCalendar("dateNameFunction", calEvent.start);
            console.log("PHP envoi data to server !!");
            
            $.post("./phpLib/addEvent.php",
            {
              
              idMedecin:<?php echo $_SESSION ['loggedDoctor']['idMedecin']; ?>,
              calEventId:calEvent.id,
              calEventDay:calEvent.start.getDay(),
              calEventDateName:dateName,
              calEventTitle:  calEvent.title,
              calEventBody: calEvent.body,
              calEventStartTime:  calEvent.start.getTime(),
              calEventEndTime:  calEvent.end.getTime(),
              calEventType:  calEvent.type,
              calEventStart:  calEvent.start.getFullYear()+'-'+calEvent.start.getMonth()+'-'+calEvent.start.getDate()+' '
                                +calEvent.start.getHours()+':'+calEvent.start.getMinutes()+':'+calEvent.start.getSeconds(),
              calEventEnd:  calEvent.end.getFullYear()+'-'+calEvent.end.getMonth()+'-'+calEvent.end.getDate()+' '
                                +calEvent.end.getHours()+':'+calEvent.end.getMinutes()+':'+calEvent.end.getSeconds()
              
            },
            function(data,status){
               console.log("PHP envoi data to server !!");
              console.log("PHP response Status: " + status);
              console.log("PHP response data: " + data);
              
              if(status){ 
                $calendar.weekCalendar("updateEvent", calEvent);
                $calEventArray.push(calEvent);
                $dialogContent.dialog("close");
                id++;
                console.log(" Create CalendarEvent successfully !");
              }
            });
            
            
					},
					cancel : function()
					{
						$dialogContent.dialog("close");
					}
				}
			}).show();

			$dialogContent.find(".date_holder").text($calendar.weekCalendar("formatDate", calEvent.start));
			setupStartAndEndTimeFields(startField, endField, calEvent, $calendar.weekCalendar("getTimeslotTimes", calEvent.start));
      //setupEventPlaces(EventTypeField,calEvent);
		},
		/*
			Called on click of a calendar event
		*/
		eventClick : function(calEvent, $event)
		{
			
      
      /*********************************************
       *  READ ONLY for Patients and Others Doctors
       *  To be dynamically configured in DB       
       *******************************************/             
      
      if (calEvent.readOnly)
			{
				return;
			}
			/*
				calling dialog box with events data filled in.
			*/
			var $dialogContent = $("#event_edit_container");
			resetForm($dialogContent);
			var startField = $dialogContent.find("select[name='start']").val(calEvent.start);
			var endField = $dialogContent.find("select[name='end']").val(calEvent.end);
      var eventTypeField = $dialogContent.find("select[name='eventType']").val(calEvent.type);
			var titleField = $dialogContent.find("input[name='title']").val(calEvent.title);
			var bodyField = $dialogContent.find("textarea[name='body']");
      var eventTypeField = $dialogContent.find("select[name='eventType']").val(calEvent.type);
      
			bodyField.val(calEvent.body);

			$dialogContent.dialog(
			{
				modal: true,
				title: "Modifier - " + calEvent.title,
				close: function()
				{
					$dialogContent.dialog("destroy");
					$dialogContent.hide();
					$('#calendar').weekCalendar("removeUnsavedEvents");
				},
				buttons:
				{
					save : function()
					{
						calEvent.start = new Date(startField.val());
						calEvent.end = new Date(endField.val());
						calEvent.title = titleField.val();
						calEvent.body = bodyField.val();
            calEvent.type = eventTypeField.val();
            
            var dateName= $calendar.weekCalendar("dateNameFunction", calEvent.start);
            console.log('ModifCalendar: save dateName:'+dateName);
           
           console.log("ModifCalendar idMedecin: <?php echo $_SESSION ['loggedDoctor']['idMedecin']; ?>");
           $.post("./phpLib/modifyEvent.php",
            {
                
                idMedecin:<?php echo $_SESSION ['loggedDoctor']['idMedecin']; ?>,
                calEventId:calEvent.id,
                calEventDay:calEvent.start.getDay(),
                calEventDateName:dateName,
                calEventTitle: calEvent.title,
                calEventBody: calEvent.body,
                calEventStartTime: calEvent.start.getTime(),
                calEventEndTime: calEvent.end.getTime(),
                calEventType: calEvent.type,
                
                calEventStart: calEvent.start.getFullYear()+'-'+calEvent.start.getMonth()+'-'+calEvent.start.getDate()+' '
                               +calEvent.start.getHours()+':'+calEvent.start.getMinutes()+':'+calEvent.start.getSeconds(),
                calEventEnd: calEvent.end.getFullYear()+'-'+calEvent.end.getMonth()+'-'+calEvent.end.getDate()+' '
                                +calEvent.end.getHours()+':'+calEvent.end.getMinutes()+':'+calEvent.end.getSeconds()
              
              
            },
            function(data,status){
              console.log(" ModifCalendar PHP response Status: " + status);
              if(status){    
                  $calendar.weekCalendar("updateEvent", calEvent);
						      $dialogContent.dialog("close");
                  console.log(" Modify CalendarEvent successfully !");
              }
            });
          },
					"delete" : function()
					{
						var dateName= $calendar.weekCalendar("dateNameFunction", calEvent.start);
            console.log('delete: save dateName:'+dateName);
            console.log("delete idMedecin: <?php echo $_SESSION ['loggedDoctor']['idMedecin']; ?>");
            $.post("./phpLib/deleteEvent.php",
            {
                idMedecin:<?php echo $_SESSION ['loggedDoctor']['idMedecin']; ?>,
                calEventId:calEvent.id
                              
            },
            function(data,status){
              console.log(" DeleteCalendar PHP response Status: " + status);
              
              if(status){     /*DeleteCalendar PHP response Status: success */
                 $calendar.weekCalendar("removeEvent", calEvent.id);
						     $dialogContent.dialog("close");
                 console.log(" DeleteCalendarEvent successfully !");
              }
                 
            }); 
            
            
            
            
					},
					cancel : function()
					{
						  $dialogContent.dialog("close");
					}
				}
			}).show();

			var startField = $dialogContent.find("select[name='start']").val(calEvent.start);
			var endField = $dialogContent.find("select[name='end']").val(calEvent.end);
			$dialogContent.find(".date_holder").text($calendar.weekCalendar("formatDate", calEvent.start));
			setupStartAndEndTimeFields(startField, endField, calEvent, $calendar.weekCalendar("getTimeslotTimes", calEvent.start));
			$(window).resize().resize(); //fixes a bug in modal overlay size ??
		}
	});

	function resetForm($dialogContent)
	{
		$dialogContent.find("input").val("");
		$dialogContent.find("textarea").val("");
	}

	/*
		* Sets up the start and end time fields in the calendar event
		* form for editing based on the calendar event being edited
    */
	function setupStartAndEndTimeFields($startTimeField, $endTimeField, calEvent, timeslotTimes)
	{
		for (var i = 0; i < timeslotTimes.length; i++)
		{
			var startTime = timeslotTimes[i].start;
			var endTime = timeslotTimes[i].end;
			var startSelected = "";
			if (startTime.getTime() === calEvent.start.getTime())
			{
				startSelected = "selected=\"selected\"";
			}
			var endSelected = "";
			if (endTime.getTime() === calEvent.end.getTime())
			{
				endSelected = "selected=\"selected\"";
			}
			$startTimeField.append("<option value=\"" + startTime + "\" " + startSelected + ">" + timeslotTimes[i].startFormatted + "</option>");
			$endTimeField.append("<option value=\"" + endTime + "\" " + endSelected + ">" + timeslotTimes[i].endFormatted + "</option>");
		}
		$endTimeOptions = $endTimeField.find("option");
		$startTimeField.trigger("change");
	}
  
  /*
		* Sets up The colors fields in the calendar event
		* form for editing based on the calendar event being edited
    */
	function setupEventPlaces(EventTypeField,calEvent)
	{
		
			var freeVisit = "Visites Libres"; 
			var appointment = "Sur Rendez-vous";
      var clinique = "Chez un clinique";
      var hopital = "Chez un hopital";
      var University = "A Université";
      var hopitalUniversitaire = "Chez un hopital Universitaire";
      
      var defaultColor = "Choisir le Type ..";
			var startSelected = "selected=\"selected\"";
      
			$EventTypeField.append("<option value=\"" + freeVisit + "\" "+startSelected+">" + freeVisit + "</option>");
      $EventTypeField.append("<option value=\"" + appointment + "\" >" + appointment + "</option>");
      $EventTypeField.append("<option value=\"" + clinique + "\" >" + clinique + "</option>");
      $EventTypeField.append("<option value=\"" + hopital + "\" >" + hopital + "</option>");
      $EventTypeField.append("<option value=\"" + University + "\" >" + University + "</option>");
      $EventTypeField.append("<option value=\"" + hopitalUniversitaire + "\" >" + hopitalUniversitaire + "</option>");
		
		  //$startTimeField.trigger("change");
	}
  
  
});