<?php

/* 
    
    AUTOR DE PROGRAMACIÓN PHP: 
    JHON ALVARADO ACHATA
    
    MODIFICACIONES Y COLABORACIONES:
    RICHARD PONGO
	
*/

class adminModel extends Model
{

    /*------------------ CONSULTA DE PANEL ADMINISTRADOR --------------*/



    /* ----  ---- */

    public function datos_usuario($data)
    {

        $query = "CALL `datos_usuario`('" . $data . "');";
        $res = Model::query_execute($query);
        return $res;
    }



    /* -------------------- CONSULTAS DE USUARIOS -------------------------- */

    public function mostrar_tusuario()
    {
        $query = "CALL `tabla_usuario`();";
        $res = Model::query_execute($query);
        return $res;
    }

    public function datos_supervisor()
    {
        $query = "CALL `datos_supervisor`();";
        $res = Model::query_execute($query);
        return $res;
    }

    public function guardar_usuario($fname, $lname, $correo, $status, $gender, $rol_user,
        $supr, $imagen_bd, $code, $password, $date, $pdf_destino)
    {

        $query = "CALL `insertar_usuario`(
                        '" . $fname . "', 
                        '" . $lname . "', 
                        '" . $correo . "', 
                        '" . $status . "', 
                        '" . $gender . "', 
                        " . $rol_user . ", 
                        '" . $supr . "', 
                        '" . $imagen_bd . "', 
                        '" . $code . "',
                        '" . $password . "',
                        '" . $date . "',
                        '" . $pdf_destino . "');";
        Model::query_execute($query);
    }

    public function datos_editar_usuario($data)
    {

        $query = "CALL `datos_editar_usuario`(" . $data . ");";
        $res = Model::query_execute($query);
        return $res;
    }

    public function editar_usuario(

        $codusu, 
        $fname, 
        $lname, 
        $correo, 
        $status, 
        $gender, 
        $rol_user, 
        $supr, 
        $imagen_bd, 
        $code, 
        $password, 
        $dont_edit_photo, 
        $date,
        $pdf_destino 

    )
    {

        $query = "CALL `editar_usuario`(
                    " . $codusu . ", 
                    '" . $fname . "', 
                    '" . $lname . "', 
                    '" . $correo . "', 
                    '" . $status . "', 
                    '" . $gender . "', 
                    " . $rol_user . ", 
                    " . $supr . ", 
                    '" . $imagen_bd . "', 
                    '" . $code . "', 
                    '" . $password . "', 
                    '" . $dont_edit_photo . "', 
                    '" . $date . "', 
                    '" . $pdf_destino . "');"; 
        Model::query_execute($query); 

    }

    /* -------------------- CONSULTAS CLIENTES -------------------------- */

    public function mostrar_tprincipal4($codusu)
    {
        $query = "CALL `tabla_principal4`('" . $codusu . "');";
        $res = Model::query_execute($query);
        return $res;
    }

    public function mostrar_tcliente($codusu)
    {
        $query = "CALL `tabla_clientes`('" . $codusu . "');";
        $res = Model::query_execute($query);
        return $res;
    }

    public function save_cliente($dni,
    $celular,
    $firstName,
    $lastName,
    $direccion,
    $region,
    $provincia,
    $distrito, 
    $celular_s, 
    $observacion)
    {
        $query = "CALL `insertar_cliente`(
            '" . $dni . "', 
            '" . $celular . "', 
            '" . $firstName . "', 
            '" . $lastName . "', 
            '" . $direccion . "', 
            '" . $region . "', 
            '" . $provincia . "', 
            '" . $distrito . "', 
            '" . $celular_s . "', 
            '" . $observacion . "'); 
        ";
        Model::query_execute($query);
    }

    public function update_cliente($codcliente,
    $dni,
    $celular,
    $firstName,
    $lastName,
    $direccion,
    $region,
    $provincia,
    $distrito, 
    $celular_s, 
    $observacion)
    {
        $query = "CALL `actualizar_cliente`(
            " . $codcliente . ", 
            '" . $dni . "', 
            '" . $celular . "', 
            '" . $firstName . "', 
            '" . $lastName . "', 
            '" . $direccion . "', 
            '" . $region . "', 
            '" . $provincia . "', 
            '" . $distrito . "', 
            '" . $celular_s . "', 
            '" . $observacion . "'); 
        ";
        Model::query_execute($query);
    }

    public function delete_cliente($codcliente)
    {
        $query = "CALL `borrar_cliente`(" . $codcliente . ");";
        Model::query_execute($query);
    }

    public function mostrar_datos_cliente($codusu)
    {
        $query = "CALL `datos_cliente`($codusu);";
        $res = Model::query_execute($query);
        return $res;
    }
    
    /* -------------------- CONSULTAS ATENCIÓN -------------------------- */

    public function actualizar_atencion($value, $code)
    {
        $query = "CALL `actualizar_atencion`($value, $code);";
        Model::query_execute($query);
    }

    public function ocultar_atencion($code)
    {
        $query = "CALL `ocultar_atencion`($code);";
        Model::query_execute($query);
    }

    public function obtener_supervisor_ejecutivo($codusu) {
        $query = "CALL `obtener_supervisor_ejecutivo`('" . $codusu . "');";
        $res = Model::query_execute($query);
        return $res;
    }

    /* -------------------- CONSULTAS SUPERVISOR -------------------------- */

    public function mostrar_tprincipal3($codusu)
    {
        $query = "CALL `tabla_principal3`('" . $codusu . "');";
        $res = Model::query_execute($query);
        return $res;
    }
    
    public function mostrar_datencion($codusu)
    {
        $query = "CALL `datos_atencion`('" . $codusu . "');";
        $res = Model::query_execute($query);
        return $res;
    }


    /* -------------------- CONSULTAS PERFIL -------------------------- */

    public function mostrar_perfil($codusu)
    {
        $query = "CALL `datos_perfil`('" . $codusu . "');";
        $res = Model::query_execute($query);
        return $res;
    }
    
    public function update_perfil($codusu, $firstName, $lastName, $correo, $dont_edit_photo, $password, $imagen_bd)
    {
        $query = "CALL `actualizar_perfil`('" . $codusu . "', '" . $firstName . "', '" . $lastName . "', 
                '" . $correo . "', '" . $dont_edit_photo . "', '" . $password . "', '" . $imagen_bd . "');";
        Model::query_execute($query);
    }

    
    /* -------------------- CONSULTAS GERENTE -------------------------- */
    
    public function mostrar_tprincipal1()
    {
        
    }

    
    /* ------------------ CONSULTAS ADMINISTRADOR ---------------------- */
    
    public function mostrar_tprincipal2()
    {
        
    }

}
