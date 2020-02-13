<?php
/* 
    
    AUTOR DE PROGRAMACIÓN PHP: 
    JHON ALVARADO ACHATA
    
    MODIFICACIONES Y COLABORACIONES:
    LEANDRO ANDRÉ RAMOS VALDEZ
    JOSUE ALDAIR MAMANI CARIAPAZA
	
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
        
        if ($actual_link == FOLDER_PATH . "/admin/" || $actual_link == FOLDER_PATH . "/admin") {

            $this->model2 = new adminModel();
            
            $this->mostrar_tprincipal4 = $this->model2->mostrar_tprincipal4($this->admin);

            /* $this->BellNtf = $this->model2->BellNotifications(); */

            $this->view(
                'admin/admin', [
                    'datos_usu' => $this->datos_usu, 
                    'mostrar_tprincipal4' => $this->mostrar_tprincipal4
                ]
            );
        }
    }

    public function index()
    {
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
