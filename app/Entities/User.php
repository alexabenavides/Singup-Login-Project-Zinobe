<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

	public $id;
	public $name;
	public $document;
	public $email;
	public $country_code;
	public $password;
	public $created_at;
	public $updated_at;

	protected $fillable = ['name', 'document', 'email', 'country_code', 'password'];

	// constructor with $db as database connection

	public function __construct()
	{

	}

	public static function validateUser($email, $password)
	{
		return User::where('email', $email)->where('password', $password)->first();
	}

	public static function findUser($email, $document)
	{
		return User::where('email', $email)->orWhere('document', $document)->first();
	}
}