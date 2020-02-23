<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

	// database connection and table name
	public $id;
	public $name;

	// object properties
	public $document;
	public $email;
	public $country_code;
	public $country_name;
	public $password;
	public $created;
	private $conn;
	private $table_name = "user";

	// constructor with $db as database connection

	public function __construct()
	{

	}
}