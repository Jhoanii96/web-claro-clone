<?php
/* 
    
    AUTOR DE PROGRAMACIÓN PHP: 
    JHON ALVARADO ACHATA
    
*/

    require ROOT . FOLDER_PATH . "/app/models/home/homeModel.php";

    class home extends Controller 
    {
        public $model;

        public function index()
        {
            
            $this->model = new homeModel();
            $this->parametro1 = $this->model->mostrar_noticiasRecientes();
            $this->parametro2 = $this->model->mostrar_noticiasAntiguas();
            
            $this->view('home/home', ['noticiasRecientes' => $this->parametro1, 'noticiasAntiguas' => $this->parametro2]);

        }
    }

?>