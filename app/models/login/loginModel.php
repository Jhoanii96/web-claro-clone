<?php
/* 
    
    AUTOR DE PROGRAMACIÓN PHP: 
    JHON ALVARADO ACHATA
    
*/

class loginModel extends Model
{
    
    public function Verificar_usuarios($username) {

        $query = "CALL `verificar_usuarios`('" . $username . "');";
        $res = Model::query_execute($query);
        return $res;

    }

}
