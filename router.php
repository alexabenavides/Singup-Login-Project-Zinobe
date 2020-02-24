<?php
@session_start();
require "vendor/autoload.php";
include "public\index.php";

if (router()->getType() == "controller") {
	try {
		router()->callObject('\\App\\controllers\\%sController', true);
	} catch (Exception $e) {
		echo $e->getTraceAsString();
	}
}