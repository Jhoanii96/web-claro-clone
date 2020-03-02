<?php
/* 
    
    AUTOR DE PROGRAMACIÓN PHP: 
    JHON ALVARADO ACHATA

*/

require ROOT . FOLDER_PATH . "/app/models/login/loginModel.php";
require ROOT . FOLDER_PATH . "/system/libs/Session.php";

class login extends Controller
{
	private $model;
	private $session;
	
	public function __construct()
	{
		$this->session = new Session;
		$this->session->getAll();

		if ($this->session->get('userClaro')) {
			echo("<script>location.href = '" . FOLDER_PATH . "/admin';</script>");
        }
	}

	public function index()
	{
		$this->view('login/login');
	}

	public function signin()
	{
		$this->model = new loginModel();
		$identificacion = $_POST['usern'];
		$password = $_POST['passu'];
		explode(" ", $identificacion);
		explode(" ", $password);

		$param[0] = $identificacion;
		$param[1] = $password;
		/* $param[1] = base64_encode($password); */

		if (!$this->VerificarParametros($param)) {
			echo("<script>location.href = '" . FOLDER_PATH . "/login';</script>");
			return $this->renderErrorMessage('*El usuario y la contraseña son obligatorios');
		} else {
			@$parametro = $this->model->Verificar_usuarios($param[0]);
			$identi = $parametro->fetch();
			// if(empty($parametro)){
			if ($param[0] != $identi['usuario']) {
				return $this->renderErrorMessage('*El usuario no existe');
			} else {
				// if($param['password'] != $parametro['clave_organizador']){
				if ($param[1] != $identi['clave']) {
					return $this->renderErrorMessage('*La contraseña es incorrecta');
				} else {
					$this->session->add('userClaro', $identi['usuario']);
					if (!empty($_POST["chkb"])) {
						setcookie("member_login", $param[0], time() + (10 * 365 * 24 * 60 * 60));
						setcookie("member_password", $param[1], time() + (10 * 365 * 24 * 60 * 60));
					} else {
						if (isset($_COOKIE["member_login"])) {
							setcookie("member_login", "");
						}
						if (isset($_COOKIE["member_password"])) {
							setcookie("member_password", "");
						}
					}
					echo("<script>location.href = '" . FOLDER_PATH . "/admin';</script>");
				}
			}
		}
	}

	public function salir()
	{
		$this->session->close();
		echo("<script>location.href = '" . FOLDER_PATH . "/login';</script>");
	}

	public function VerificarParametros($param)
	{
		if (empty($param[0]) or empty($param[1])) {
			return false;
		} else {
			return true;
		}
	}

	private function renderErrorMessage($message)
	{ 
		$this->view('login/login', ['error_message' => $message]);
	}
	
}
