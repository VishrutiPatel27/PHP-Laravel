<?php
for($x =0; $x<=10;$X++)
{
    echo "";
}
$color = array("red","green");
echo count($color);

SESION_start();
?>
<html>
<body>
    $_SESSION["color"]="Green";

    
</body>
</html>


