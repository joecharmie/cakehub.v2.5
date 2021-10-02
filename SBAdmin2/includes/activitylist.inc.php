<?php
//to display dates or relative dates
if ( $curryear == '2020' && $onceyear == 0){
    echo "<div><h5>2020</h5><br>";
    $onceyear++;
} 
if ($currdate <= gmdate("Y-m-d", strtotime("-1 week") + 3600*(8+date("I"))) &&  $onceweek == 0){
    echo "<div><h5>Last Week</h5>";
    $onceweek++;
} 
if ($currdate == $newdate){                                   
    require 'SBAdmin2/includes/actdetails.inc.php'; 
}
else if ( $currdate == gmdate("Y-m-d", strtotime("now") + 3600*(8+date("I"))) ){
    echo
    "<div><b>Today</b>";
    require 'SBAdmin2/includes/actdetails.inc.php'; 
}
else if ( $currdate == gmdate("Y-m-d", strtotime("-1 day") + 3600*(8+date("I")))){
    echo "<div><b>Yesterday</b>";
    require 'SBAdmin2/includes/actdetails.inc.php'; 
} 
else {                                    
    echo
    "<div><b>".date('F d, Y', $date)
    ."</b>";
    require 'SBAdmin2/includes/actdetails.inc.php'; 
   
}


$newfulldate = $row['actDate'];
$ndate = strtotime($newfulldate); 
$newdate = date('Y-m-d',$ndate);