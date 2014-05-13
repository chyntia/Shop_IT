<?php
include "api.php";

if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['signedin'])){
	$_SESSION=array('signedin'=>false);
}
print json_encode($_SESSION);

?>
