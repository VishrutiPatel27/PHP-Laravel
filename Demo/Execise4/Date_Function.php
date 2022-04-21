<?php
//date_default_timezone

echo"dateDefaultTimeZone"."</br>";
echo date_default_timezone_get();
echo"</br>";
date_default_timezone_set("Asia/Bangkok");
echo date_default_timezone_get();
echo"</br></br>";

//dateformat

echo"dateformat"."</br>";
$date=date_create("2000-07-27");
echo date_format($date,"Y/m/d H:i:s");

echo"</br>";
$date1=date_create("2000-07-27");
echo date_format($date1,"y/M/D h:i:s");
echo"</br></br>";


//createDate

echo"createDate"."</br>";
$date=date_create("2000-07-27");
echo date_format($date,"Y/M/d");
echo"</br></br>";


//datediff

echo"datediff"."</br>";
$date1=date_create("2000-03-15");
$date2=date_create("2000-12-31");
$diff=date_diff($date1,$date2);
echo $diff->format("%R%a days");
echo"</br></br>";


//strtotime

echo"strtime"."</br>";
echo(strtotime("now") . "<br>");
echo(strtotime("27 July 2000") . "<br>");
echo(strtotime("+5 hours") . "<br>");
echo(strtotime("+1 week") . "<br>");
echo(strtotime("+1 week 3 days 7 hours 5 seconds") . "<br>");
echo(strtotime("next Monday") . "<br>");
echo(strtotime("last Saturday"));
echo"</br></br>";



//mktime

echo"MKTime"."</br>";
echo "Oct 3, 1975 was on a ".date("l", mktime(0,0,0,10,3,1975)) . "<br>";

echo date("M/d/Y",mktime(0,0,0,12,36,2000)) . "<br>";
echo date("M/d/Y",mktime(0,0,0,14,1,2001)) . "<br>";
echo date("M/d/Y",mktime(0,0,0,1,1,2001)) . "<br>";
echo date("M/d/Y",mktime(0,0,0,1,1,99)) . "<br>";
echo"</br>";


//time

echo"Time";
$t=time();
echo($t . "<br>");
echo(date("Y-M-d",$t));
?>