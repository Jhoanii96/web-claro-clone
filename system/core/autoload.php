<?php
/* 
    
    AUTOR DE PROGRAMACIÓN PHP: 
	JHON ALVARADO ACHATA
	
*/

spl_autoload_register(function ($class) {
    if (is_file(CORE . "$class.php")) {
        require CORE . "$class.php";
    }
});
