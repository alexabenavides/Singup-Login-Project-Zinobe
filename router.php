<?php
@session_start();
require "vendor/autoload.php";
include "public\index.php";

if (router()->getType()=="controller") {
	try {
		router()->callObject('\\App\\controllers\\%sController', true);
	} catch (Exception $e) {
		echo $e->getTraceAsString();
		echo "<hr>";
		echo "try /User/List to show the table<br>";
		echo "Or /User/Index to insert a new ticket<br>";
	}
}