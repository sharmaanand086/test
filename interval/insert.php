<?php
$con = mysqli_connect("localhost","root","","test"); 

  $coachid = $_POST['coachid'];
  $date = $_POST['date'];
  $dateid = $_POST['dateid'];
  $interval = $_POST['interval'];
  $slotfrom = $_POST['timeform'];
  $slotto = $_POST['timeto'];
 // print_r(explode(' ',$slotfrom));
  $sf  = explode(' ',$slotfrom);
  $st = explode(' ',$slotto);
  $startTime =  $sf[0];
  $endTime = $st[0];  
  $tt= $date.' '.$startTime;
  $dd= $date.' '.$endTime;
    $start_time = strtotime($tt);
    $end_time = strtotime($dd);
    $slot = strtotime(date('Y-m-d H:i:s',$start_time) . '+'.$interval.' minutes');
    $data = [];
    for ($i=0; $slot <= $end_time; $i++) { 

        $data[$i] = [ 
            'start' => date('H:i:s a', $start_time),
            'end' => date('H:i:s a', $slot),
        ];

        $start_time = $slot;
        $slot = strtotime(date('Y-m-d H:i:s',$start_time). '+'.$interval.' minutes');
    }

  //  print_r($data);
  foreach($data as $key => $value) {
       
       $apmtime=  $value['start'].'-'.$value['end'];   
        $time = $value['start']; 
        $double = $interval*2;
      //  $endtime11 = strtotime(date('Y-m-d H:i:s',$start_time). '+'.$double.' minutes');

    $time22=strtotime("+".$double." minutes",strtotime($time));
    $startTime22=date('H:i:s a',$time22);   
    // echo$startTime22;
   $sql2 = "INSERT INTO `calander`(`coach_id`, `date`, `dateid`, `apmtime`, `time`, `endtime`) VALUES ('$coachid','$date','$dateid','$apmtime','$time','$startTime22')";
   $con->query($sql2);
 
       
} 
    
?>
    <script>
     window.location.href="index.php";
 </script>