<?php
/* 
    
    AUTOR DE PROGRAMACIÓN PHP: 
    JHON ALVARADO ACHATA
    
    MODIFICACIONES Y COLABORACIONES:
    RICHARD PONGO
	
*/

require ROOT . FOLDER_PATH . "/system/libs/Session.php";
require ROOT . FOLDER_PATH . "/app/models/admin/adminModel.php";
require ROOT . PAKET_PATH\AUTO_LOAD;

class admin extends Controller
{
    public $model;
    public $session;
    public $datos_usu;
    public $admin;

    public function __construct()
    {
        $this->session = new Session;
        $this->model = new adminModel();
        $this->session->getAll();

        if (empty($this->session->get('userClaro'))) {
            echo ("<script>location.href = '" . FOLDER_PATH . "/login';</script>");
        }

        $actual_link = "$_SERVER[REQUEST_URI]";

        $this->admin = $this->session->get('userClaro');

        $this->datos_usu = $this->model->datos_usuario($this->admin);
        $tipo_usu = $this->datos_usu->fetch();

        if ($actual_link == FOLDER_PATH . "/admin/" || $actual_link == FOLDER_PATH . "/admin") {

            $this->model2 = new adminModel();

            if ($tipo_usu[8] == 'Gerente') {
                $this->datos_usu = $this->model->datos_usuario($this->admin);
                $this->mostrar_tprincipal1 = $this->model2->mostrar_tprincipal1($this->admin);
                $this->view(
                    'admin/admin',
                    [
                        'datos_usu' => $this->datos_usu,
                        'mostrar_tprincipal1' => $this->mostrar_tprincipal1
                    ]
                );
            } elseif ($tipo_usu[8] == 'Administrador') {
                $this->datos_usu = $this->model->datos_usuario($this->admin);
                $this->mostrar_tprincipal2 = $this->model2->mostrar_tprincipal2($this->admin);
                $this->view(
                    'admin/admin',
                    [
                        'datos_usu' => $this->datos_usu,
                        'mostrar_tprincipal2' => $this->mostrar_tprincipal2
                    ]
                );
            } elseif ($tipo_usu[8] == 'Supervisor') {
                $this->datos_usu = $this->model->datos_usuario($this->admin);
                $this->mostrar_tprincipal3 = $this->model2->mostrar_tprincipal3($this->admin);
                $this->mostrar_datencion = $this->model2->mostrar_datencion($this->admin);
                $this->view(
                    'admin/admin',
                    [
                        'datos_usu' => $this->datos_usu,
                        'mostrar_tprincipal3' => $this->mostrar_tprincipal3,
                        'mostrar_datencion' => $this->mostrar_datencion
                    ]
                );
            } elseif ($tipo_usu[8] == 'Ejecutivo') {
                $this->datos_usu = $this->model->datos_usuario($this->admin);
                $this->mostrar_tprincipal4 = $this->model2->mostrar_tprincipal4($this->admin);
                $this->view(
                    'admin/admin',
                    [
                        'datos_usu' => $this->datos_usu,
                        'mostrar_tprincipal4' => $this->mostrar_tprincipal4
                    ]
                );
            }
        }
    }

    public function index()
    {
    }

    /* --------------------------------- PERFIL --------------------------------- */

    public function perfil($link = '', $dato = '')
    {
        include(ROOT . FOLDER_PATH . '/app/controllers/admin/perfil.inc.php');
    }

    public function supervisor($link = '', $dato = '')
    {
        include(ROOT . FOLDER_PATH . '/app/controllers/admin/supervisor.inc.php');
    }

    /* ------------------------------------ ATENCION ----------------------------------- */

    public function attention($link = '', $dato = '')
    {
        include(ROOT . FOLDER_PATH . '/app/controllers/admin/attention.inc.php');
    }

    /* ------------------------------------ CLIENTES ----------------------------------- */

    public function clientes($link = '', $dato = '')
    {
        include(ROOT . FOLDER_PATH . '/app/controllers/admin/clientes.inc.php');
    }

    /* ----------------------------------- USUARIOS ----------------------------------- */

    public function user($link = '', $dato = '')
    {
        include(ROOT . FOLDER_PATH . '/app/controllers/admin/user.inc.php');
    }
}
