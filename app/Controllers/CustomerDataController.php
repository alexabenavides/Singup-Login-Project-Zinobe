<?php

namespace App\Controllers;

use App\Entities\Customer;
use App\Entities\SearchValidate;
use Symfony\Component\HttpFoundation\Request;

class CustomerDataController
{
	private $url = "http://www.mocky.io/v2/5d9f39263000005d005246ae?mocky-delay=10s";

	public function __construct()
	{
		if (!isset($_SESSION['user_id'])) {
			header("Location: " . router()->getCurrentUrl() . "/Home/Index");
			die();
		}
	}

	public function indexAction()
	{
		SearchValidate::deleteOldSearch();
		$CustomerData = null;
		$request      = Request::createFromGlobals();

		if ($request->isMethod('POST')) {

			$values      = $request->request->all();
			$searchValue = $values['search'];

			if ($searchValue) {
				SearchValidate::setNewSearch($searchValue);
			}
		}

		$CustomerData = Customer::getCustomers();

		if (!$CustomerData || count($CustomerData) <= 0) {

			$resultArray = $this->externalConection($this->url);
			$finalArray  = [];

			foreach ($resultArray as $results) {
				foreach ($results as $result) {
					$finalArray[] = $result;
				}
			}
			Customer::truncate();
			if (Customer::insert($finalArray)) {
				$CustomerData = Customer::getCustomers();
				echo blade()->run('customerData.list', ['customers' => $CustomerData]);

			} else {
				echo "Error en la conexión por favor intente más tarde";
			}
		} else {
			echo blade()->run('customerData.list', ['customers' => $CustomerData]);
		}


	}

	public function externalConection($url)
	{
		//logica para conexion externa
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		$result = curl_exec($curl);
		curl_close($curl);

		return json_decode($result, true);
	}


}
