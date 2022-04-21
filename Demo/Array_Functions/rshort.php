<?php
$a= array("Vishruti","Nishi","Janki","Rashmi","Hetanshi","Dimple");
rsort($a);
$L=count($a);
for($x=0;$x<$L;$x++)
    {
        echo $a[$x];
        echo "<br>";
    }
?>