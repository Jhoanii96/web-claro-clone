<?php
/* 
    
    AUTOR DE PROGRAMACIÓN PHP: 
    JHON ALVARADO ACHATA
    
*/

/* require ROOT . FOLDER_PATH . "/app/models/home/homeModel.php"; */

class home extends Controller
{
    public $model;

    public function index()
    {

        if (isset($_GET['page'])) {
            $num_flang = $_GET['page'];
        } else {
            $num_flang = 0;
        }

        /* $this->model = new homeModel(); */

        if ($num_flang == 0) {
            $flang_active = 1;
            $this->view('home/home1', ['flang_active' => $flang_active]);
        } elseif ($num_flang == 1) {
            $flang_active = 1;
            $this->view('home/home1', ['flang_active' => $flang_active]);
        } elseif ($num_flang == 2) {
            $flang_active = 2;
            $this->view('home/home2', ['flang_active' => $flang_active]);
        } elseif ($num_flang == 3) {
            $flang_active = 3;
            $this->view('home/home3', ['flang_active' => $flang_active]);
        } else {
            $flang_active = 1;
            $this->view('home/home1', ['flang_active' => $flang_active]);
        }
    }
}
