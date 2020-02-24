<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class SearchValidate extends Model
{

	public $user_id;
	public $search_value;
	public $created_at;
	public $updated_at;

	protected $fillable = ['user_id', 'search_value'];

	// constructor with $db as database connection

	public function __construct()
	{

	}

	public static function setNewSearch($searchValue)
	{
		$_SESSION["search_value"] = $searchValue;
		SearchValidate::where('user_id', $_SESSION["user_id"])->delete();
		return SearchValidate::insert(
			[
				"user_id"      => $_SESSION["user_id"],
				"search_value" => $_SESSION["search_value"]
			]
		);
	}

	public static function deleteOldSearch()
	{
		return SearchValidate::where('user_id', $_SESSION["user_id"])->delete();
	}

	public static function getOldSearch()
	{


		return SearchValidate::where('user_id', $_SESSION["user_id"])->first();
	}
}