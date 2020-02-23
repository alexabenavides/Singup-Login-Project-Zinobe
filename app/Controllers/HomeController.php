<?php

namespace App\Controllers;

class HomeController
{
	public static function HomeAction()
	{
		header('Location: Home/Index');
	}

	public function indexAction()
	{
		echo blade()->run('home.index');
	}
}
