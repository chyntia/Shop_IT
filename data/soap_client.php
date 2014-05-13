<?php
	include 'ExpeditionWSService.php';
	$es = new ExpeditionWSService();
	$t = $es->getToken("1234567890");
	//$o = new Token();
	//$o->token = "1234567890";
	print_r($es->sendItem($t, array("a", "a", "a", "a", "a", "a")));
