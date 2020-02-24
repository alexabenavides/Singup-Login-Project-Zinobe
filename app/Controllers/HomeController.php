<?php

namespace App\Controllers;

class HomeController
{
	private $countries = "";

	public function __construct()
	{
		$this->countries = json_decode(
			file_get_contents('https://pkgstore.datahub.io/core/country-list/data_json/data/8c458f2d15d9f2119654b29ede6e45b8/data_json.json'),
			true);
	}

	public function indexAction($errors)
	{
		if (isset($_SESSION['user_id'])) {
			session_destroy();
		}
		if (is_null($errors)) {
			$errors = array();
		}

		echo blade()->run('home.index', ['errors' => $errors, 'countries' => $this->countries]);
	}
}
