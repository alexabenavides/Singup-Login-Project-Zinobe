<?php

namespace App\Controllers;
use App\Entities\User;

class UserController
{
	public function loginAction()
	{
		$email    = isset($_POST['email']) ? $_POST['email'] : die();
		$password = base64_encode(isset($_POST['password']) ? $_POST['password'] : die());
		$result = User::where('email',$email,'and')->where('password',$password)->first();

		if (!$result) {

			$user_arr = array(
				"status"  => false,
				"message" => "Invalid Email or Password!",
			);
			print_r(json_encode($user_arr));

		} else {
			$user=$result->getAttributes();
			echo blade()->run('user.list',['user'=>$user]);
		}
	}

	public function signupAction()
	{
		global $route;
		$user = App\Entities\User();
		// set user property values
		$user->name         = $_POST['name'];
		$user->document     = $_POST['document'];
		$user->country_code = $_POST['country_code'];
		$user->country_name = $_POST['country_name'];
		$user->password     = base64_encode($_POST['password']);
		$user->created      = date('Y-m-d H:i:s');

		//htmlspecialchars(strip_tags(
		//if already exist

		// create the user
		if ($user->signup()) {
			$user_arr = array(
				"status"  => true,
				"message" => "Successfully Signup!",
				"id"      => $user->id,
				"email"   => $user->email
			);
		} else {
			$user_arr = array(
				"status"  => false,
				"message" => "Email already exists!"
			);
		}
		print_r(json_encode($user_arr));
		//echo blade()->run('customerData.list', ['users' => $users]);
//		echo \BootstrapUtil::contentWeb(\BootstrapUtil::navigation($route->getCurrentUrl(),$route->controller." ".$route->action." ".$id));
	}

	public static function IndexActionGet($id = "", $idparent = "", $event = "")
	{
		// ....
		blade()->regenerateToken(); // we create a new csrf token
	}

	public static function IndexActionPost($id = "", $idparent = "", $event = "")
	{
		// .....
		if (blade()->csrfIsValid()) { // we validated the token
			// ....
		} else {
			valid()->addMessage('TOKEN', 'Token invalid', 'error');
		}
		// ....
	}
}

