<?php

/* 
    
    AUTOR DE PROGRAMACIÓN PHP: 
	JHON ALVARADO ACHATA
	
*/

class App
{
    protected $controller = 'error_page';

    protected $method = 'index';

    protected $params = [];


    public function __construct()
    {
        $url = $this->parseURL();

        if ($url == '/' || $url == '' || $url == NULL) {
            $this->controller = 'home';
            unset($url[0]);
        } elseif (file_exists('app/controllers/' . $url[0] . '/' . $url[0] . 'Controller.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once('app/controllers/' . $this->controller . '/' . $this->controller . 'Controller.php');

        if ($this->controller == 'call-for-papers' || $this->controller == 'robotica-libre' || $this->controller == 'robotica-natcar' || $this->controller == 'feria-tecnologica') {
            $this->controller = preg_replace('[-]', '', $this->controller);
        }

        $this->controller = new $this->controller;

        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}
