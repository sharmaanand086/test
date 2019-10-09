<?php
$con = mysqli_connect("localhost","worldsuc_t3","mobin@123","worldsuc_questionanaires"); 

 echo $coachid = $_POST['coachid'];echo"<br>";
 echo $date = $_POST['date'];echo"<br>";
 echo $dateid = $_POST['dateid'];echo"<br>";
 echo $interval = $_POST['interval'];echo"<br>";
 echo $slotfrom = $_POST['timeform'];echo"<br>";
 echo $slotto = $_POST['timeto'];echo"<br>";
 // print_r(explode(' ',$slotfrom));
$sf  = explode(' ',$slotfrom);
$st = explode(' ',$slotto);
echo $startTime =  $sf[0];
echo $endTime = $st[0];echo"<br>";  
    $tt= $date.' '.$startTime;
    $dd= $date.' '.$endTime;
    
    $start_time = strtotime($tt);
    $end_time = strtotime($dd);
    $slot = strtotime(date('Y-m-d H:i:s',$start_time) . '+'.$interval.' minutes');
    $data = [];
    for ($i=0; $slot <= $end_time; $i++) { 
        //var_dump(date('H:i:s a', $start_time));
        $newstart = date('H:i:s a', $start_time);
        if($newstart > '12:00:00'){
            $data[$i] = [ 
            'start' => date('h:i a', $start_time),
            'end' => date('h:i a', $slot),
            'endtime'=> date('H:i:s', $start_time),
        ];
        }else{
           $data[$i] = [ 
            'start' => date('H:i a', $start_time),
            'end' => date('H:i a', $slot),
            'endtime'=> date('H:i:s', $start_time),
        ]; 
        }
        
        //var_dump($data[$i]);
        $start_time = $slot;
        $slot = strtotime(date('Y-m-d H:i:s',$start_time). '+'.$interval.' minutes');
    }
    
    //var_dump($date);

  //  print_r($data);
  foreach($data as $key => $value) {
        $apmtime=  $value['start'].' - '.$value['end'];   
        $time = $value['endtime']; 
        $endTime = strtotime("+15 minutes", strtotime($time));
        $endtime =  date('H:i:s', $endTime);
        
   $sql2 = "INSERT INTO `calander`(`coach_id`, `date`, `dateid`, `apmtime`, `time`, `endtime`) VALUES ('$coachid','$date','$dateid','$apmtime','$time','$endtime')";
   $con->query($sql2);
     
} 
 ?>
 <script>
    //  window.location.href="index.php";
 </script>