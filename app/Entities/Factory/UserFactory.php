<?php

namespace App\Entities\Factory;

class UserFactory
{
	public static function Factory() {
		return ['id'=>0,'name'=>'','email'=>'','Description'=>''];
	}
	public static function Fetch() {
		$user=self::Factory(); // we star creating an empty ticket
		$user['id']=Valid()
			->type('integer')
			->required(false)
			->def(0)
			->condition('gte','The id can\'t be negative',0)
			->fetch(INPUT_POST,'id');
		$user['name']=Valid()
			->type('varchar')
			->required(true)
			->condition('maxlen','The name must not have than 50 characters',50)
			->condition('minlen','The name must have at least 3 characters',3)
			->fetch(INPUT_POST,'User');
		$user['email']=Valid()
			->type('varchar')
			->required(true)
			->condition('maxlen','The title must not have more than 50 characters',50)
			->condition('minlen','The title must have at least 3 characters',3)
			->fetch(INPUT_POST,'Title');
		$user['Description']=Valid()
			->type('varchar')
			->required(true)
			->condition('maxlen','The Description not have more than 200 characters',200)
			->condition('minlen','The Description must have at least 3 characters',3)
			->fetch(INPUT_POST,'Description');
		return $user;
	}
}
