<?php 
/**
 * 
 */
if (is_authenticated()) {
	return redirect('dashboard');
}
use framework\view\View;
use app\models\AccountModel;
use app\databases\AccountBD;
class LoginController
{
	
	function __construct()
	{
		new AccountBD;
		$this->view = new View;
	}

	function index()
	{
		/*$user = new AccountModel;
		$user->username="jysa";
		$user->nationality="V";
		$user->cedula="25520843";
		$user->name="Ramon";
		$user->last_name="Sanchez";
		$user->password=encrypt('hola1234');
		$user->email="r.a.s.g.65@gmail.com";
		$user->is_active=1;
		$user->is_superuser=1;
		$user->save();*/
		return $this->view->render('login/login');
	}

	function check()
	{
		$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
		if ($contentType === "application/json") {
			$body = json_decode(trim(file_get_contents("php://input")), true);
			if (isset($body['method'])) {
				if($body['method'] == "post"){
					if (isset($body['csrftoken'])) {	
						if ($body['csrftoken'] == sessionLocal('csrftoken')) {
							if (isset($body['username']) && isset($body['password'])) {
								if (test_text_number($body['username'])) {
									$model = new AccountModel;
									$user = $model->find('username', '=', test_input($body['username']));
									if ($user) {
										if ($user->password == encrypt($body['password'])) {
											sessionLocal('is_authenticated', true);
											sessionLocal('user', $user);
											echo json_encode(["rs" => true]);
										}else{
											echo json_encode(["rs" => "Usuario o Contraseña Invalida"]);
										}
									}else{
										echo json_encode(["rs" => "Usuario o Contraseña Invalida"]);
									}
								}else{
									echo json_encode(["rs" => "Username Mal escrito"]);
								}
							}else{
								echo json_encode(["rs" => "Campo no llegaron al servidor"]);
							}
						}else{
							echo json_encode(["rs" => "token no coincide"]);
						}
					}else{
						echo json_encode(["rs" => "Token No llego al servidor"]);
					}
				}else{
					echo json_encode(['rs' => false]);
				}
			}
		}else{
			return redirect('login');
		}
	}
}
?>