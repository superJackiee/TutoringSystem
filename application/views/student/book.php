<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<div class="row">
    <div class="col-md-12">
    <?php
        $Select="defaults";
        $book_now="defaults";
        if(isset($_REQUEST['page']) && $_REQUEST['page'] =='Select-Lesson') {
            $Select="active";
        } else if(isset($_REQUEST['page']) && $_REQUEST['page'] =='Book-Now') {
            $book_now="active";
        }
    ?>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="<?php echo $Select;?>">
                <a href="?id=<?php echo $teacher_id; ?>&page=Select-Lesson">Select Lesson</a>
            </li>
            <li class="<?php echo $book_now;?>">
                <a href="?id=<?php echo $teacher_id; ?>&page=Book-Now">Book Now</a>
            </li>
        </ul>
    <section class="user_section dashboard_sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if($lesson){ ?>
<div class="tab-content settings-tab-content">
    <?php if(isset($_REQUEST['page']) && $_REQUEST['page'] =='Select-Lesson'){?>
        <div class="tab-pane active" id="tab_1">
                    <!-- form start -->
                    <?php 
                    if($not_found){ ?>
                        <div>Please! fill up your profile in order to book a teacher <a href='<?php echo base_url().'student/profile'?>'>Click here to go to your profile</a></div>
                    <?php     
                    }else{
                    ?>
               <form method="post" action="<?php echo base_url('student/add_book') ?>">
              
                <ul>
                    <?php   foreach($lesson as $lessons){ ?>
                        
                     <li price="<?php if($studentCountry === 'United States'){ ?> $ <?php $lessons['total_price'];} else{?>
                                      <?php echo $studentCurrency['currencySymbol']; ?>&nbsp;<?php echo $studentCurrency['currencyRate']* $lessons['total_price'];}?>">
                        <input type="checkbox" id="cb<?php echo $lessons['lesson_id']?>" class="lesson_part" name="lesson_id" value="<?php echo $lessons['lesson_id']?>"/>
                            <label for="cb<?php echo $lessons['lesson_id']?>" class="all_rew_part" style='width:100%'>
                                <div class="all_rew_titel">
                                <p style="font-size: 19px;"><?php echo $lessons['title']?></p>
                               
                                </div>
                                <div class="redbar"></div>
                                <div class="all_rew_date_time" style="color: #000000b8;font-size: 14px;">
                                <ul>
                                    <span><?php echo $lessons['category']?></span>·<span><?php echo $lessons['lesson_package']?> lessons</span>
                                </ul>
                                
                                <ul>
                                    <div class="all_rew_pro" style='width:auto;display: flex;justify-content: center;align-items: center;'>
                                        <?php if($studentCountry === 'United States'){ ?> $ <?php $lessons['total_price'];} else{?>
                                      <?php echo $studentCurrency['currencySymbol']; ?>&nbsp;<?php echo $studentCurrency['currencyRate']* $lessons['total_price'];}?>
                                    </div>
                                      
                                </ul>

                                </div>
                            </label>
                            </li>
                              <?php }?>
                        </ul>
                        
                    <input type="hidden" name="price" id="lprice">
                    <input type="hidden" name="teacher_id" value="<?php echo  $teacher_id;?>">
                    <button type="submit" name="save" class="btn btn-primary pull-right">Next</button>
                </form>
            </div>
        <?php } }elseif(isset($_REQUEST['page']) &&  $_REQUEST['page'] =='Select-Plan'){
      $book_id=(isset($_REQUEST['book_id'])?$_REQUEST['book_id']:'');
          if($book_id){
    ?>
    <form method="get" action="<?php echo base_url('student/book') ?>">
        <div style='display: block;padding: 0 0 5px 5px;clear: both;'>
            <input type="radio" id='60min' name="duration" value="60" checked style='float: left;width: 20px;margin-left: -20px;margin-top: -16px;'>
            <label for='60min' style="top: -43px;left: 8px;">60min<span>1 Lesson</span>
                <span style="margin-left:50px"><?php echo $_REQUEST['local_price'] ?></span>
            </label>    
        </div>
        <br>
        <div style='display: block;padding: 0 0 5px 5px;clear: both;'>
            <input type="radio" id='30min' name="duration" value="30" style='float: left;width: 20px;margin-left: -20px;margin-top: -16px;'>
            <label for='30min' style="top: -43px;left: 8px;">30 min <span>1 Lesson</span>
                <span style="margin-left:50px"><?php 
                        echo $string = $_REQUEST['local_price'];
                        ?>
                </span>
            </label>
        </div>
        
        
        <input type="hidden" name="lesson_id" value="<?php echo $_REQUEST['lesson_id'] ?>">
        <input type="hidden" name="book_id" value="<?php echo $_REQUEST['book_id'] ?>">
        <input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>">
        <input type="hidden" name="local_price" value="<?php echo $_REQUEST['local_price'] ?>">
        <input type="hidden" name="page" value="Book-Now">
    <button type="submit"  class="btn btn-primary"> Next </a>
    </form>
    <?php } ?>
        
<!--end Plan booking form-->


 <?php }elseif(isset($_REQUEST['page']) &&  $_REQUEST['page'] =='Book-Now'){
      $book_id=(isset($_REQUEST['book_id'])?$_REQUEST['book_id']:'');
          if($book_id){
    ?>
	<div class="tab-pane active" id="tab_2">
	        <link href='<?php echo base_url();?>Cassets/js/lib/main.css' rel='stylesheet' />
            <link href="<?php echo base_url();?>Cassets/css/bootstrapValidator.min.css" rel="stylesheet" />        
            <link href="<?php echo base_url();?>Cassets/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
            <script src='<?php echo base_url();?>Cassets/js/moment.min.js'></script>
            <script src="<?php echo base_url();?>Cassets/js/jquery.min.js"></script>
            <script src="<?php echo base_url();?>Cassets/js/bootstrapValidator.min.js"></script>
            <script src="<?php echo base_url();?>Cassets/js/lib/main.js"></script>
            <script src='<?php echo base_url();?>Cassets/js/main.js'></script>
            <?php
                $days       = [];
                $start_time = [];
                $end_time   = [];
                if( $availbility == null ){
                    echo "This teacher has not added any availible time.";   
                }else{
                    foreach( $availbility as $availble ){
                        if( $availble['date_day'] == '0' ){
                            if( $availble['day'] == 'Mon' ){
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
                        }else{
                            $startEnd = date('h:i A', strtotime($availble['start_time'])).' T '.date('h:i A', strtotime($availble['end_time']));
                            $date_events[] = array (
                                'title' => $startEnd,
                                'start' => $availble['day'],
                                'color' => 'green'
                            );
                        }
                    }
                    foreach( $days as $key => $day ){
                        $startEnd = date('h:i A', strtotime($start_time[$key])).' T '.date('h:i A', strtotime($end_time[$key]));
                        $events[] = array (
                            'daysOfWeek' => [ $day ],
                            'title'      => $startEnd,
                            'color'      => 'green'
                        );
                    }?>
            <script>
              document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    events: [
                        <?php 
                            foreach ( $events as $event ){
                                echo json_encode($event).",";
                            }
                            foreach ( $date_events as $date_event ){
                                echo json_encode($date_event).",";
                            }
                        ?>
                    ],
                    dateClick: function(info) {
                        var today = new Date();
                        if( today > info.date  ){
                            alert('You can not select this date! Please select future dates.');
                        }else{
                            var times = [];
                            var events = info.dayEl.attributes[0].ownerElement.childNodes[0].children[1].children;
                            var arr = Array.prototype.slice.call( events );
                            
                            for (let item of arr) {
                                times.push(item.firstElementChild.children[0].children[0].children[0].children[0].childNodes[0]);
                            }
                            $('#date').val( info.date.toDateString() );
                            var html = '';
                            var options = '';
                            html +='Time slots on date :'+info.date.toDateString()+"<br>";
                            html += '<select id="option" name="from_to"><option value="0">--Select an option--</option>';
    
                            for (let time of times) {
                                var splited = String( time.nodeValue );
                                var final = splited.split('T');
                                html += "<option value='"+ splited +"'>"+ final[0] +" To "+ final[1] +"</option> ";
                            }
                            html += '</select>';
                            
                            $('.modal-body').html(html);
                            $('#exampleModalCenter').modal('show');   
                        }
                    }
                });
                calendar.render();
              });
            </script>
            <div id='calendar'></div>
        <?php } ?>
<?php


function build_calendar($month, $year) {
    $id = $_REQUEST['id'];
    $mysqli = new mysqli('localhost', 'mylangua_root', 'ritW0#d8..gY', 'mylangua_pro_table');
    
    // teacher/student timezone query
    
    $sqlt = "Select time_zone FROM user_detail WHERE user_id= $id";
    $result = mysqli_query($mysqli,$sqlt);
    $rowt = mysqli_fetch_row($result);
    $teacherTimezone = $rowt[0];
    $studentid = $_SESSION['id'];
    $sqls = "Select time_zone FROM student_detail WHERE user_id= $studentid";
    $resuls = mysqli_query($mysqli,$sqls);
    $rows = mysqli_fetch_row($resuls);
    $studentTimezone = $rows[0];
    
    
    
    // //////end teacher/student timezone////////
    // avaliable lessons select query

     $stmt = "SELECT * FROM events WHERE user_id= $id";
   
    $result = mysqli_query($mysqli,$stmt);
    $events = array();
    $eventfrom = array();
    $eventto = array();
        if($result->num_rows>0){
            while($row = mysqli_fetch_assoc($result)){
                $events[] = $row['start'];
                $eventfrom[] = $row['from_time']; 
                $eventto[] = $row['to_time'];   
               // echo count($events);
        }

    }


    // booked lesson select query
    $stmt = "SELECT * FROM book WHERE teacher_id= $id AND payment_status= '1'";
    // $stmt->execute();
    $result = mysqli_query($mysqli,$stmt);
    $booked = array();
  
        if($result->num_rows>0){
            while($row = mysqli_fetch_assoc($result)){
                $booked[] = $row['date'];
            
        }
        // mysqli_close($mysqli);
    }
    
    
     // Create array containing abbreviations of days of week.
     $daysOfWeek = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');

     // What is the first day of the month in question?
     $firstDayOfMonth = mktime(0,0,0,$month,1,$year);

     // How many days does this month contain?
     $numberDays = date('t',$firstDayOfMonth);

     // Retrieve some information about the first day of the
     // month in question.
     $dateComponents = getdate($firstDayOfMonth);

     // What is the name of the month in question?
     $monthName = $dateComponents['month'];

     // What is the index value (0-6) of the first day of the
     // month in question.
     $dayOfWeek = $dateComponents['wday'];

     // Create the table tag opener and day headers
     
    $datetoday = date('Y-m-d');
    
    
    
    $calendar = "<table class='table table-bordered'>";
    $calendar .= "<center><h2>$monthName $year</h2>";
    // $calendar.= "<a class='btn btn-xs btn-primary' href='?month=".date('m', mktime(0, 0, 0, $month-1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month-1, 1, $year))."'>Previous Month</a> ";
    
    // $calendar.= " <a class='btn btn-xs btn-primary' href='?month=".date('m')."&year=".date('Y')."'>Current Month</a> ";
    
    // $calendar.= "<a class='btn btn-xs btn-primary' href='?month=".date('m', mktime(0, 0, 0, $month+1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month+1, 1, $year))."'>Next Month</a></center><br>";
    
    
        
      $calendar .= "<tr>";

     // Create the calendar headers

     foreach($daysOfWeek as $day) {
          $calendar .= "<th  class='header'>$day</th>";
     } 

     // Create the rest of the calendar

     // Initiate the day counter, starting with the 1st.

     $currentDay = 1;

     $calendar .= "</tr><tr>";

     // The variable $dayOfWeek is used to
     // ensure that the calendar
     // display consists of exactly 7 columns.

     if ($dayOfWeek > 0) { 
         for($k=0;$k<$dayOfWeek;$k++){
                $calendar .= "<td  class='empty'></td>"; 

         }
     }
    
     
     $month = str_pad($month, 2, "0", STR_PAD_LEFT);
  // $selectedDate = "10-1-2020";
     while ($currentDay <= $numberDays) {
         $arr = array();
      
          if ($dayOfWeek == 7) {

               $dayOfWeek = 0;
               $calendar .= "</tr><tr>";

          }
          
          $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
          $date = "$year-$month-$currentDayRel";
             
            $dayname = strtolower(date('l', strtotime($date)));
            $eventNum = 0;
            $today = $date==date('Y-m-d')? "today" : "";
            $sql = "SELECT COUNT(*) FROM `events` WHERE user_id = $id AND start='".$date."'";
            $result = mysqli_query($mysqli,$sql);
            $row1 = mysqli_fetch_row($result);
            // var_dump($row1[0]);
            
         if($date<date('Y-m-d')){
             $calendar.="<td><h4>$currentDay</h4>";
         }
         elseif(in_array($date, $booked)){
             $calendar.="<td class='$today'><h4>$currentDay</h4><a href='#'' class='btn btn-danger btn-xs'>Already Booked</a>";
            //  var_dump($booked);
         }
         elseif(in_array($date, $events)){
                // $calendar.="<td class='$today'><span style='display:flex;'><h4>$currentDay</h4> </span>"; 
                for($i=0; $i<$row1[0]; $i++){
                    if($row1[0] != 0){
                    $query1 = "SELECT from_time,to_time,id FROM events WHERE user_id= $id AND start= '".$date."'";
                    $result2 = mysqli_query($mysqli,$query1);
                        while( $row2 = mysqli_fetch_row($result2) ) {
                             array_push($arr, $row2);
                        }  
                    }
                }
                $res = array();
                foreach ($arr as $key => $value){
                  if(!in_array($value, $res))
                    $res[$key]=$value;
                }
             $calendar.="<td class='$today'><span style='display:flex;'><h4>$currentDay</h4> </span>";
             for($j=0;$j<count($res); $j++){
                 $start = $res[$j][0];
                 $end = $res[$j][1];
                 $eId = $res[$j][2];
                 if(($teacherTimezone>0 && $studentTimezone>0)||($teacherTimezone<0 && $studentTimezone<0)){
                    $difference =  $studentTimezone-$teacherTimezone;
                    $starthour = explode(":",$start);
                    $endhour = explode(":",$end);
                    // var_dump($starthour);
                    // var_dump($endhour);
                    //  echo $difference;
                    //  die;
                    }
                $calendar .= "<a class='btn btn-primary btn-xs ' id='td1' selectedD = '".$date."' from=$start
                 to=$end eventId=$eId>$start-$end</a>";
             } 
             
         }else{
             $calendar.="<td class='$today'><h4>$currentDay</h4>";
         }
            
            
           
            
          $calendar .="</td>";
          // Increment counters
 
          $currentDay++;
          $dayOfWeek++;

     }
     
     

     // Complete the row of the last week in month, if necessary

     if ($dayOfWeek != 7) { 
     
          $remainingDays = 7 - $dayOfWeek;
            for($l=0;$l<$remainingDays;$l++){
                $calendar .= "<td class='empty'></td>"; 

         }

     }
     
     $calendar .= "</tr>";
     $calendar .= "</table>";
    //  $student_id = $_SESSION['id'];
     $sql2 = "SELECT time_zone from user_detail WHERE user_id= $id"; 
     $result3 = mysqli_query($mysqli,$sql2); 
     $row2 = mysqli_fetch_row($result3);
     $calendar.="<p>Teacher's time Zone: UTC $row2[0]</p>";
     
    //  var_dump($student_id);
     echo $calendar;

}
    
?>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <form method='post' id='form' action="<?php echo base_url('student/update_book') ?>">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Are you sure!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <select id='time'>
                
            </select>
          </div>
            <input type="hidden" id='eventid' name='eventid'>
            <input type="hidden" id='date' name='date'>
            <input type="hidden" name="book_id" value="<?php echo  $book_id;?>">
            <input type="hidden" name="lesson_id" value="<?php echo $_REQUEST["lesson_id"]; ?>">
            <input type="hidden" name="duration" value="<?php echo $_REQUEST["duration"]?>">
          <div class="modal-footer">
            <button type="submit" name="save" id='save' class="btn btn-primary">Done</button>
          </div>
      </form>
    </div>
  </div>
</div>
<script>
    $('#save').click(function(){
        var e = document.getElementById("option");
        var strUser = e.options[e.selectedIndex].value;
        if( strUser == 0 ){
            event.preventDefault();
            alert('Please select an option!');
        }else{
            $('#form').submit();
        }
    }); 
</script>
<!-- ------------------------- -->


	<div class="tab-pane active" id="tab_2" hidden>
        <form method="post" action="<?php echo base_url('student/update_book') ?>">
            
            <button type="submit" name="save" class="btn btn-primary pull-right"  style="margin-right: 9px !important;">Next</button>
            </div>
        </form>
            <?php 
                 }else{
                    redirect($this->agent->referrer());
          }} ?>
    </div>
</div></div>
<?php }?>
    </div>
    </div>
</section>
        </div>

   
    </div>
</div>
<script type="text/javascript">
    
    
    $('a').click(function(){
       var date= $(this).attr('selectedD');
       var eventId= $(this).attr('eventId');
       var from= $(this).attr('from');
       var to= $(this).attr('to');
       $('#date').val(date); 
       $('#eventid').val(eventId);
       $('#from').val(from);
       $('#to').val(to);
       $(this).toggleClass('btn-success');
    });
    
    $('li').click(function(){
    let   att= $(this).attr('price');
    let p= $('#lprice').val(att);
    $('#lprice').change(function(){
    p=  $('#lprice').val(att);
    });
    console.log(p);
    });
    
</script>