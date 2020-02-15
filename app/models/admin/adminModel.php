<?php

/* 
    
    AUTOR DE PROGRAMACIÓN PHP: 
    JHON ALVARADO ACHATA
    
    MODIFICACIONES Y COLABORACIONES:
    LEANDRO ANDRÉ RAMOS VALDEZ
    JOSUE ALDAIR MAMANI CARIAPAZA
	
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

    public function insertar_usuario(user $data_user)
    {

        /* $query = "CALL Insertar_organizador(
                        '" . $data_user->getNombre() . "', 
                        '" . $data_user->getApellido() . "', 
                        '" . $data_user->getEmail() . "', 
                        '" . $data_user->getDni() . "', 
                        '" . $data_user->getCelular() . "', 
                        " . $data_user->getRol_organizador() . ", 
                        '" . $imagen_perfil . "', 
                        '" . $data_user->getCodigo() . "', 
                        '" . $data_user->getClave() . "');";
        $this->db->query($query); */
    }

    // Actualizar organizador con imagen
    public function update_organizador(user $data_user, $imagen_perfil, $numOrg)
    {

        /* $query = "CALL actualizar_organizador(
                        '" . $data_user->getNombre() . "', 
                        '" . $data_user->getApellido() . "', 
                        '" . $data_user->getEmail() . "', 
                        '" . $data_user->getDni() . "', 
                        '" . $data_user->getCelular() . "', 
                        " .  $data_user->getRol_organizador() . ", 
                        '" . $imagen_perfil . "', 
                        '" . $data_user->getCodigo() . "', 
                        '" . $data_user->getClave() . "',
                        " . $numOrg . " );";
        $this->db->query($query); */
    }

    // Actualizar organizador sin imagen
    public function update_organizadorWi(user $data_user, $numOrg)
    {

        /* $query = "CALL actualizar_organizadorWi(
                        '" . $data_user->getNombre() . "', 
                        '" . $data_user->getApellido() . "', 
                        '" . $data_user->getEmail() . "', 
                        '" . $data_user->getDni() . "', 
                        '" . $data_user->getCelular() . "', 
                        " .  $data_user->getRol_organizador() . ", 
                        '" . $data_user->getCodigo() . "', 
                        '" . $data_user->getClave() . "', 
                        " . $numOrg . " );";
        $this->db->query($query); */
    }

    /* -------------------- CONSULTAS CLIENTES -------------------------- */

    public function mostrar_tprincipal4($codusu)
    {
        $query = "CALL `tabla_principal4`('" . $codusu . "');";
        $res = Model::query_execute($query);
        return $res;
    }

    public function mostrar_tcliente()
    {
        $query = "CALL `tabla_clientes`();";
        $res = Model::query_execute($query);
        return $res;
    }

    public function save_cliente(Cliente $data)
    {
        $query = "CALL `insertar_cliente`(
            '" . $data->getDni() . "', 
            '" . $data->getCelular() . "', 
            '" . $data->getFirstName() . "', 
            '" . $data->getLastName() . "', 
            '" . $data->getDireccion() . "', 
            '" . $data->getRegion() . "', 
            '" . $data->getProvincia() . "', 
            '" . $data->getDistrito() . "');
        ";
        Model::query_execute($query);
    }

    public function update_cliente(Cliente $data)
    {
        $query = "CALL `actualizar_cliente`(
            " . $data->getCodcliente() . ", 
            '" . $data->getDni() . "', 
            '" . $data->getCelular() . "', 
            '" . $data->getFirstName() . "', 
            '" . $data->getLastName() . "', 
            '" . $data->getDireccion() . "', 
            '" . $data->getRegion() . "', 
            '" . $data->getProvincia() . "', 
            '" . $data->getDistrito() . "');
        ";
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

}
