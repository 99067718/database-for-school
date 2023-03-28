<!-- jouw HTML voor een Footer komt hier... 
Benoem hier ten minste je naam en de tijd
-->
<p>Made by Emiel 't Lam</p>
<?php
date_default_timezone_set("Europe/Amsterdam");
$time = date("H:i");
echo("<p>".$time."</p>")
?>