        <!-- <link href='<?php echo base_url();?>Cassets/css/fullcalendar.css' rel='stylesheet' /> -->
        <link href='<?php echo base_url();?>Cassets/js/lib/main.css' rel='stylesheet' />
        <link href="<?php echo base_url();?>Cassets/css/bootstrapValidator.min.css" rel="stylesheet" />        
        <link href="<?php echo base_url();?>Cassets/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
        <!-- <script src='<?php echo base_url();?>Cassets/js/moment.min.js'></script> -->
        <script src="<?php echo base_url();?>Cassets/js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>Cassets/js/bootstrapValidator.min.js"></script>
        <!-- <script src="<?php echo base_url();?>Cassets/js/fullcalendar.min.js"></script> -->
        <script src="<?php echo base_url();?>Cassets/js/lib/main.js"></script>
        <!-- <script src='<?php //echo base_url();?>Cassets/js/main.js'></script> -->
        <?php
            $days       = [];
            $start_time = [];
            $end_time   = [];
            foreach($availbility as $availble ){
                if( $availble['date_day'] == '0' ){
                    if($availble['day'] == 'Mon' ){
                        array_push( $days , 1 );
                        array_push( $start_time , $availble['start_time'] );
                        array_push( $end_time , $availble['end_time'] );
                    }else if($availble['day'] == 'Tue'){
                        array_push( $days , 2 );
                        array_push( $start_time , $availble['start_time'] );
                        array_push( $end_time , $availble['end_time'] );
                    }else if($availble['day'] == 'Wed'){
                        array_push( $days , 3 );
                        array_push( $start_time , $availble['start_time'] );
                        array_push( $end_time , $availble['end_time'] );
                    }else if($availble['day'] == 'Thurs'){
                        array_push( $days , 4 );
                        array_push( $start_time , $availble['start_time'] );
                        array_push( $end_time , $availble['end_time'] );
                    }else if($availble['day'] == 'Fri'){
                        array_push( $days , 5 );
                        array_push( $start_time , $availble['start_time'] );
                        array_push( $end_time , $availble['end_time'] );
                    }else if($availble['day'] == 'Sat'){
                        array_push( $days , 6 );
                        array_push( $start_time , $availble['start_time'] );
                        array_push( $end_time , $availble['end_time'] );
                    }else if($availble['day'] == 'Sun'){
                        array_push( $days , 7 );
                        array_push( $start_time , $availble['start_time'] );
                        array_push( $end_time , $availble['end_time'] );
                    }    
                } else{
                    $date_events[] = array (
                        'title' => date('h:i A', strtotime($availble['start_time'])).' T '.date('h:i A', strtotime($availble['end_time'])),
                        'start' => $availble['day'],
                        'color' => 'green',
                    );
                }
            }
            foreach( $days as $key => $day ){
                $startEnd = date('h:i A', strtotime($start_time[$key])).' T '.date('h:i A', strtotime($end_time[$key]));
                $events[] = array (
                    'daysOfWeek' => [ $day ],
                    'title'      => $startEnd,
                    'color'      => 'green',
                );
            }
        ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('schedule_calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                header: {
                    left: 'prev, next, today',
                    center: 'title',
                    right: 'month'
                },       
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                dayMaxEvents: true, // allow "more" link when too many events
                events: [    
                    <?php                     
                        foreach ($events as $event ){
                            echo json_encode($event).",";
                        }
                        foreach ( $date_events as $date_event ){
                            echo json_encode($date_event).",";                             
                        }                        
                    ?>  
                ]     
               
            });
            calendar.render();
          });
        </script>
        <section class="user_section profile_sec">
            <div class="container">
                <div class="row form_row">
                    <div class='col-md-12'>
                        <div class="profile_right_sec tab-content" id="basic_link">
                            <div class="person_detail profile_right_part  basic_information">
                                <div class="profile_name pro_rgt_prt_head basic_info_header">
                                    <strong><h3><b>Teacher Schedule Settings</b></h3></strong><hr><br>
                                    <div class="row">
                                        <div class="form-group col-md-2">     
                                            <label style='float:left;'>Day</label>
                                            <select class='form-control' id='day'>
                                                <option value="Mon">Monday</option>
                                                <option value="Tue">Tuesday</option>
                                                <option value="Wed">Wednesday</option>
                                                <option value="Thurs">Thursday</option>
                                                <option value="Fri">Friday</option>
                                                <option value="Sat">Saturday</option>
                                                <option value="Sun">Sunday</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4" style="margin-top: 0px;">     
                                            <label style='float:left;'>Start Time</label>
                                            <input type="time" id='s_time' class="form-control" id="inputAddress" step='3600' required>
                                        </div>
                                        <div class="form-group col-md-4" style="margin-top: 0px;">     
                                            <label style='float:left;'>End Time</label>
                                            <input type="time" id='e_time' class="form-control" id="inputAddress" step='3600' required>
                                        </div>
                                        <div class='col-md-2' style="margin-top: 0px;">
                                            <label style='float:left;'>Confirm</label>
                                            <input type='submit' class='form-control' id='submit' value='Add Slot'/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">     
                                            <label style='float:left;'>Date</label>
                                            <input type='date' name='slot_date' id='slot_date' class='form-control' min='<?php echo date("Y-m-d") ?>'/>
                                        </div>
                                        <div class="form-group col-md-4" style="margin-top: 0px;">     
                                            <label style='float:left;'>Start Time</label>
                                            <input type="time" id='s_time_date' class="form-control" id="inputAddress">
                                        </div>
                                        <div class="form-group col-md-4" style="margin-top: 0px;">     
                                            <label style='float:left;'>End Time</label>
                                            <input type="time" id='e_time_date' class="form-control" id="inputAddress">
                                        </div>
                                        <div class='col-md-2' style="margin-top: 0px;">
                                            <label style='float:left;'>Confirm</label>
                                            <input type='submit' class='form-control' id='date_submit' value='Add Slot'/>
                                         </div>
                                    </div>
                                    <div id='errors'></div>
                                    <hr>
                                    <div class="row">
                                        <div class='offset-md-5'>
                                            <h3><b>Teacher Time slots</b></h3>                          
                                        </div>
                                        <hr>
                                        <div class='col-md-12'>
                                        <?php
                                            foreach( $availbility as $availble ){
                                                if( $availble['date_day'] == '0' ){
                                                            echo " <label style='color:white;background-color:#002e5a;padding:6px;border-radius:4px;' id='".$availble['id']."'>".$availble['day'].' : '.$availble['start_time'].' - '.$availble['end_time']."<span style='color:#DC143C;padding:2px;margin:4px;cursor: pointer;' title='Delete this time slot' onclick='delete_slot(".$availble['id'].")'><i class='fa fa-window-close'></i></span></label>";   
                                                }
                                            }
                                        ?>
                                        </div>
                                        <div class='col-md-12'>
                                        <?php
                                            foreach( $availbility as $availble ){
                                                if( $availble['date_day'] == '1' ){
                                                            echo " <label style='color:white;background-color:#002e5a;padding:6px;border-radius:4px;' id='".$availble['id']."'>".$availble['day'].' : '.$availble['start_time'].' - '.$availble['end_time']."<span style='color:#DC143C;padding:2px;margin:4px;cursor: pointer;' title='Delete this time slot' onclick='delete_slot(".$availble['id'].")'><i class='fa fa-window-close'></i></span></label>";   
                                                }
                                            }
                                        ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div id='schedule_calendar'></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            function delete_slot( id ){
                var r = confirm("Are you sure to delete this slot!");
                if (r == true) {
                    var url    = "<?php echo base_url()?>teacher/delete_slot";
                    $.ajax({
                        type: 'POST',
                        url: url, 
                        data:{
                            id : id,
                        },
                        success: function(result){
                            if( result == 200){
                                $('#'+id).fadeOut(1000);
                                 setInterval(function(){ 
                                     location.reload();
                                 }, 1000);
                            }else if( result == 400 ){
                                $('#errors').append('');
                                $('#errors').append('<p style="color:red"> Time slot not deleted! </p>');
                            }
                    }});
                } else {
                    alert( "You pressed Cancel!");
                }
            }
            $('#e_time').change(function(){
                var s_time = $('#s_time').val();
                var e_time = $('#e_time').val();
                if( s_time == '' || e_time == '' ){
                    $('#errors p').remove();
                    $('#errors').append('<p style="color:red"> Please Enter start and End time! </p>');
                    $('#submit').attr("disabled", true);
                }else{
                    $('#errors p').remove();
                    $('#submit').attr("disabled", false);
                    var funtion_check_stime = minFromMidnight( s_time );
                    var funtion_check_etime = minFromMidnight( e_time );
                    if(funtion_check_stime > funtion_check_etime){
                        $('#submit').attr("disabled", true);
                        $('#errors p').remove();
                        $('#errors').append('<p style="color:red"> Select a valid time! </p>');
                    }else{
                        $('#errors p').remove();
                        $('#submit').attr("disabled", false);
                    }
                }
            });
            $('#e_time_date').change(function(){
                var slot_date = $('#slot_date').val();
                var s_time = $('#s_time_date').val();
                var e_time = $('#e_time_date').val();
                if( s_time == '' || e_time == '' || slot_date == '' ){
                    $('#errors p').remove();
                    $('#errors').append('<p style="color:red"> Please fill out all the fields! </p>');
                    $('#date_submit').attr("disabled", true);
                }else{
                    $('#errors p').remove();
                    $('#date_submit').attr("disabled", false);
                    var funtion_check_stime = minFromMidnight( s_time );
                    var funtion_check_etime = minFromMidnight( e_time );
                    if(funtion_check_stime > funtion_check_etime){
                        $('#date_submit').attr("disabled", true);
                        $('#errors p').remove();
                        $('#errors').append('<p style="color:red"> Select a valid time! </p>');
                    }else{
                        $('#errors p').remove();
                        $('#date_submit').attr("disabled", false);
                    }
                }
            });
            
            $('#submit').click(function(){
                var url    = "<?php echo base_url()?>teacher/teacher_availibilty";
                var day    = $('#day').val();
                var s_time = $('#s_time').val();
                var e_time = $('#e_time').val();
                var day_name    = $('#day').val();
                
                if( s_time == '' || e_time == '' ){
                    $('#errors').append('<p style="color:red"> Select time slots! </p>');
                }else{
                    $('#errors').append('');
                    $.ajax({
                        type: 'POST',
                        url: url, 
                        data:{
                            id : <?php echo $_GET['id'] ?>,
                            day : day,
                            s_time : s_time,
                            e_time : e_time,
                            date_day : '0',
                            day_name : day_name
                        },
                        success: function(result){
                            if( result == 200){
                                $('#errors').append('');
                                $('#errors').append('<p style="color:green"> Time slot successfully added </p>');
                                  setInterval(function(){ 
                                    location.reload();
                                  }, 1000);
                            }else if( result == 400 ){
                                $('#errors').append('');
                                $('#errors').append('<p style="color:red"> Time slot successfully added </p>');
                            }
                    }});   
                }    
            });
            
            $('#date_submit').click(function(){
                var url    = "<?php echo base_url()?>teacher/teacher_availibilty";
                var day    = $('#slot_date').val();
                var s_time = $('#s_time_date').val();
                var e_time = $('#e_time_date').val();
                var d = new Date(day);
                var weekday = new Array(7);
                weekday[0] = "Sun";
                weekday[1] = "Mon";
                weekday[2] = "Tue";
                weekday[3] = "Wed";
                weekday[4] = "Thu";
                weekday[5] = "Fri";
                weekday[6] = "Sat";

                var day_name = weekday[d.getDay()];

                if( s_time == '' || e_time == '' ){
                    $('#errors').append('<p style="color:red"> Select time slots! </p>');
                }else{
                    $('#errors').append('');
                    $.ajax({
                        type: 'POST',
                        url: url, 
                        data:{
                            id : <?php echo $_GET['id'] ?>,
                            day : day,
                            day_name : day_name,
                            s_time : s_time,
                            e_time : e_time,
                            date_day : '1'
                        },
                        success: function(result){
                            if( result == 200){
                                $('#errors').append('');
                                $('#errors').append('<p style="color:green"> Time slot successfully added </p>');
                                  setInterval(function(){ 
                                    location.reload();
                                  }, 1000);
                            }else if( result == 400 ){
                                $('#errors').append('');
                                $('#errors').append('<p style="color:red"> Time slot successfully added </p>');
                            }
                    }});   
                }
                
            });
            function minFromMidnight(tm){
                var ampm= tm.substr(-2)
                var clk = tm.substr(0, 5);
                var m  = parseInt(clk.match(/\d+$/)[0], 10);
                var h  = parseInt(clk.match(/^\d+/)[0], 10);
                h += (ampm.match(/pm/i))? 12: 0;
                return h*60+m;
            }
            
        </script>
		<style>
		
/* .fc-daygrid-event-harness { 
   display:none;important;
 }
.fc-daygrid-event-harness:nth-of-type(1)
{
   display:block;important;
   
}  */
		</style>
