<?php
/* 
    
    AUTOR DE PROGRAMACIÓN PHP: 
    JHON ALVARADO ACHATA
    
*/


spl_autoload_register(function ($class) {
    if (is_file(DATA . "$class" . ADD_DI . "php")) {
        require DATA . "$class" . ADD_DI . "php";
    }
});
