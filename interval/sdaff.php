$min = round(date("i") / 15) * 15;
$start = strtotime(date("Y-m-d H:$min:00"));
$end = strtotime('24:00');
$range = array();
while ($start <= $end)
{
    echo date('h:ia',$start )."</br>";
    $start = strtotime('+15 minutes',$start);

}





$Times=array();

while(strtotime($startTime) < strtotime($endTime))
{   
    $Times[]=$startTime;
    $startTime=strtotime("+".$interval." minutes",strtotime($startTime));
    $startTime=date('h:i',$startTime);    
    echo $startTime;echo "<br>";
     
}




$interval = DateInterval::createFromDateString($interval.'minutes');

$begin = new DateTime('2017-08-23T1:00:00-05:00');
$end = new DateTime('2017-08-23T5:00:00-05:00');
echo $begin;
echo $end;
// DatePeriod won't include the final period by default, so increment the end-time by our interval
$end->add($interval);

// Convert into array to make it easier to work with two elements at the same time
$periods = iterator_to_array(new DatePeriod($begin, $interval, $end));

$start = array_shift($periods);

foreach ($periods as $time) {
    echo $start->format('H:i'), ' - ', $time->format('H:i'), PHP_EOL;echo"<br>";
    $start = $time;
}


<?php

    $start_time = strtotime('2015-10-21 09:00:00');
    $end_time = strtotime('2015-10-21 19:45:00');
    $slot = strtotime(date('Y-m-d H:i:s',$start_time) . ' +20 minutes');

    $data = [];

    for ($i=0; $slot <= $end_time; $i++) { 

        $data[$i] = [ 
            'start' => date('Y-m-d H:i:s', $start_time),
            'end' => date('Y-m-d H:i:s', $slot),
        ];

        $start_time = $slot;
        $slot = strtotime(date('Y-m-d H:i:s',$start_time) . ' +20 minutes');
    }

    print_r($data);

?>