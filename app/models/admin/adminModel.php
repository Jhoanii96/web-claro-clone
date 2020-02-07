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
    
    public function datos_usuario($data) {

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

    public function mostrar_organizador($numOrg)
    {
        $query = "CALL mostrar_organizador(" . $numOrg . ");";
        $res = $this->db->query($query);
        return $res;
    }


}
