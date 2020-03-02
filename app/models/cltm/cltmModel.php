<?php
/* 
    
    AUTOR DE PROGRAMACIÓN PHP: 
    JHON ALVARADO ACHATA
    
*/

class cltmModel extends Model
{
    public function registrar_cliente($data_dni, $data_num, $data_name, $data_apellido_p, $data_apellido_m) {
    /* public function registrar_cliente($data_dni, $data_num) { */

        $query = "CALL `registrar_cliente`('" . $data_dni . "', '" . $data_num . "', '" . $data_name . "', '" . $data_apellido_p . "', '" . $data_apellido_m . "');";
        /* $query = "CALL `registrar_cliente`('" . $data_dni . "', '" . $data_num . "');"; */
        Model::query_execute($query);

    }

    public function obtener_ejecutivo_cliente($data_dni, $data_num) {

        $query = "CALL `obtener_ejecutivo_cliente`('" . $data_dni . "', '" . $data_num . "');";
        $res = Model::query_execute($query);
        return $res;

    }

}
