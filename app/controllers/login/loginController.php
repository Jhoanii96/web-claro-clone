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

		if (!empty($this->session->get('userClaro'))) {
			header("Location: " . FOLDER_PATH . "/admin");
        }
	}

	public function index()
	{
		$this->view('login/login');
	}

	public function signin()
	{
		$this->model = new loginModel();
		$identificacion = $_POST['nombre'];
		$password = $_POST['password'];
		explode(" ", $identificacion);
		explode(" ", $password);

		$param[0] = $identificacion;
		$param[1] = $password;
		/* $param[1] = base64_encode($password); */

		if (!$this->VerificarParametros($param)) {
			header("Location: " . FOLDER_PATH . "/login");
			$this->renderErrorMessage('*El usuario y la contraseña son obligatorios');
		} else {
			@$parametro = $this->model->Mostrar_organizador($param[0]);
			$identi = $parametro->fetch_array();
			// if(empty($parametro)){
			if ($param[0] != $identi['cod']) {
				header("Location: " . FOLDER_PATH . "/login");
				$this->renderErrorMessage('*El usuario no existe');
			} else {
				// if($param['password'] != $parametro['clave_organizador']){
				if ($param[1] != $identi['pas']) {
					header("Location: " . FOLDER_PATH . "/login");
					$this->renderErrorMessage('*La contraseña es incorrecta');
				} else {
					$this->session->add('userClaro', $identi['cod']);
					//echo $this->session->get('usuario');
					header("Location: " . FOLDER_PATH . "/admin");
				}
			}
		}
	}

	public function salir()
	{
		$this->session->close();
		header("Location: " . FOLDER_PATH . "/login");
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
	/*
        public function index()
        {
            $this->view('login/login');
        }
        */
}
