<?php

include "api.php";
$result = file_get_contents("http://rate-exchange.appspot.com/currency?from=USD&to=".$_POST['to']."&q=1");
echo $result;

?>
