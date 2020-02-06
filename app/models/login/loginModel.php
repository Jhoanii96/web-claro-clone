<?php
/* 
    
    AUTOR DE PROGRAMACIÓN PHP: 
    JHON ALVARADO ACHATA
    
*/

class loginModel extends Model
{
    public function Mostrar_organizador($usuario)
    {
        $query = "CALL verificar_organizador('" . $usuario . "');";
        $res = $this->db->query($query);
        return $res;
    }
}
