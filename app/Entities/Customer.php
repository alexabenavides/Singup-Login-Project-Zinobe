<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

	public $id;
	public $job_title;
	public $email;
	public $first_name;
	public $last_name;
	public $document;
	public $phone_number;
	public $country;
	public $state;
	public $city;
	public $created_at;
	public $updated_at;

	protected $fillable = [
		'id',
		'job_title',
		'email',
		'first_name',
		'last_name',
		'document',
		'phone_number',
		'country',
		'state',
		'city'
	];

	// constructor with $db as database connection

	public function __construct()
	{

	}

	public static function getCustomers()
	{
		return Customer::where('email', $_SESSION["search_value"])->orWhere('document',
			$_SESSION["search_value"])->get()->toArray();
	}
}