<?php

namespace App\Controllers;

use App\Entities\SearchValidate;
use App\Entities\User;
use App\Entities\Validator;
use Symfony\Component\HttpFoundation\Request;

class UserController
{
	public function loginAction()
	{
		$email    = isset($_POST['email']) ? $_POST['email'] : die();
		$password = base64_encode(isset($_POST['password']) ? $_POST['password'] : die());

		$result = User::validateUser($email, $password);

		if (!$result) {
			echo json_encode(["Email o Contraseña errados"]);

		} else {
			$user                = $result->getAttributes();
			$_SESSION["user_id"] = $user['id'];
			$_SESSION["name"]    = $user['name'];
			echo json_encode(['url' => router()->getCurrentUrl() . "\User\List"]);
		}
	}

	public function logoutAction()
	{
		session_destroy();
		header("Location: " . router()->getCurrentUrl() . "/Home/Index");
	}

	public function signupAction()
	{
		$request = Request::createFromGlobals();
		if ($request->isMethod('POST')) {

			$values    = $request->request->all();
			$email     = htmlspecialchars(strip_tags($values['email']));
			$document  = htmlspecialchars(strip_tags($values['document']));
			$userFound = User::findUser($email, $document);
			$errors    = null;
			if (!$userFound) {

				$rules    = array(
					'name'     => ['required', 'min:3'],
					'document' => ['required'],
					'country'  => ['required'],
					'email'    => ['required', 'email', 'min:3'],
					'password' => ['required', 'min:6', 'regex:/[0-9]/', 'regex:/[^@$!%*#?&]/']
				);
				$messages = [
					'name.required'     => 'El nombre es obligatorio.',
					'name.min'          => 'El nombre debe terner mínimo :min caracteres.',
					'document.required' => 'El documento es obligatorio.',
					'country.required'  => 'El país es obligatorio.',
					'email.required'    => 'El email es obligatorio.',
					'email.email'       => 'El email debe ser una dirección de correo válida.',
					'email.min'         => 'El email debe terner mínimo :min caracteres.',
					'password.required' => 'La contraseña es obligatoria.',
					'password.min'      => 'La contraseña debe terner mínimo :min caracteres.',
					'password.regex'    => 'La contraseña debe contener al menos un digito y no contener caracteres especiales.'

				];

				try {
					$validate = Validator::validateArray($values, $rules, $messages);
					if ($validate === true) {
						$user        = new User();
						$userCreated = $user->fill([
							'name'         => htmlspecialchars(strip_tags($values['name'])),
							'email'        => $email,
							'document'     => $document,
							'country_code' => htmlspecialchars(strip_tags($values['country'])),
							'password'     => base64_encode($values['password'])
						]);

						if ($userCreated->save()) {

							$_SESSION['user_id']=$userCreated->getAttribute("id");
							$_SESSION['name']=$userCreated->getAttribute("name");
							echo json_encode(['url' => router()->getCurrentUrl() . "\User\List"]);
						}
					} else {
						echo json_encode($validate);
					}
				} catch (Exception $e) {
					echo json_encode(["Error al realizar la validación"]);
				}

			} else {
				echo json_encode(["Ya existe un usuario con ese email"]);
			}
		} else {
			header("Location: " . router()->getCurrentUrl() . "/Home/Index");
			die();
		}
	}

	public function ListAction()
	{

		if (!isset($_SESSION['user_id'])) {
			header("Location: " . router()->getCurrentUrl() . "/Home/Index");
			die();
		}
		$searchStatus = SearchValidate::getOldSearch();

		if ($searchStatus) {
			$_SESSION["search_value"] = $searchStatus['search_value'];
			header("Location: " . router()->getCurrentUrl() . "/CustomerData/Index");
		} else {
			echo blade()->run('user.list');
		}
	}
//csrf token
}

