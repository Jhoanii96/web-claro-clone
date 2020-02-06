<?php
/* 
    
    AUTOR DE PROGRAMACIÓN PHP: 
	JHON ALVARADO ACHATA
	
*/

class Controller
{
    public function view($view, $data = [])
    {
        require_once 'app/views/' . $view . 'View.php';
    }

    public function AdminView($view, $data = [])
    {
        require_once 'app/views/' . $view . 'View.php';
    }
}
