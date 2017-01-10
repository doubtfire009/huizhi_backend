$(function () {
     //The Calender
  $("#calendar").datepicker();
  
//  $('#calendar').datetimepicker()
//          .on('changeDate', function(ev){
////    if (ev.date.valueOf() < date-start-display.valueOf()){
//        alert(ev.date.valueOf());
//    });
   $('#calendar').datepicker().on('changeDate', function(ev){
//       alert(ev.date.valueOf());
        $.ajax({
                     type: "post",
                     url: 'index.php?r=calendar/dateselect',     
                     data: {'date_info':ev.date.valueOf(),'YII_CSRF_TOKEN':'<?php echo ii::app()->request->csrfToken>'},    
                     success: function(data) {
                         s = jQuery.parseJSON(data);
                         console.log(s.html_footer);
                         $("#calendar_footer").empty();
                         $("#calendar_footer").html(s.html_footer);
                     },
                     error: function(data) {
                         alert("gg");
                     }
                 })
       });
});

