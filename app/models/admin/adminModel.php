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

    public function __construct()
    {
        parent::__construct();
    }

    /*------------------ CONSULTA DE PANEL ADMINISTRADOR --------------*/

    public function mostrar_tpreinscripcionesinicio()
    {

        /* $query1  = "SET lc_time_names = 'es_ES';";
        $this->db->query($query1);
        $query = "SELECT * FROM `v_tPreinscripcionesAdmin` WHERE `estado` = '0';";
        $res = $this->db->query($query);
        return $res; */
    }

    public function mostrar_numero_AsistentesPendientes()
    {

        $query = "select count(ins.id_inscripcion) as pendientes from inscripcion ins
        inner join pago_inscripcion pi 
        on pi.id_inscripcion = ins.id_inscripcion 
        inner join usuarios us
        on us.id_usuario = ins.id_usuario 
        where pi.estado_preinscripcion = 0 and (us.id_tipo_usuario = 4 or us.id_tipo_usuario = 3); ";
        $res = $this->db->query($query);
        return $res;
    }

    public function mostrar_numero_AsistentesInscritos()
    {

        $query = "select count(ins.id_inscripcion) as inscritos from inscripcion ins
        inner join pago_inscripcion pi 
        on pi.id_inscripcion = ins.id_inscripcion 
        where pi.estado_preinscripcion = 1;";
        $res = $this->db->query($query);
        return $res;
    }

    public function mostrar_numero_AsistentesInscritosEst()
    {

        $query = "select count(ins.id_inscripcion) as estudiantes from inscripcion ins
        inner join usuarios us
        on us.id_usuario = ins.id_usuario 
        inner join pago_inscripcion pi 
        on pi.id_inscripcion = ins.id_inscripcion 
        where us.id_tipo_usuario = 4 and pi.estado_preinscripcion = 1;";
        $res = $this->db->query($query);
        return $res;
    }

    public function mostrar_numero_AsistentesInscritosPro()
    {

        $query = "select count(ins.id_inscripcion) as profesionales from inscripcion ins
        inner join usuarios us
        on us.id_usuario = ins.id_usuario 
        inner join pago_inscripcion pi 
        on pi.id_inscripcion = ins.id_inscripcion 
        where us.id_tipo_usuario = 3 and pi.estado_preinscripcion = 1;";
        $res = $this->db->query($query);
        return $res;
    }

    public function BellNotifications()
    {

        $query = "select * from notification 
        where ((UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(date_notify))/3600) <= 48  order by date_notify desc;";
        $res = $this->db->query($query);
        return $res;
    }

    /* ----------------------- CONSULTAS DE NOTICIAS ----------------------- */

    public function mostrar_articulo($numero_articulo)
    {
        $query = "CALL mostrar_articulo('" . $numero_articulo . "');";
        $res = $this->db->query($query);
        return $res;
    }

    public function mostrar_tarticulo()
    {
        $query = "CALL mostrar_tarticulo();";
        $res = $this->db->query($query);
        return $res;
    }

    public function mostrar_tarticulotag($numero_articulo)
    {
        $query = "select t.nombre_tag as tagname from tag_articulo t
            inner join articulo a
            on a.id_articulo = t.id_articulo
            where a.num_articulo = '" . $numero_articulo . "';";
        $res = $this->db->query($query);
        return $res;
    }

    public function admin_organizador($usuario)
    {
        $query = "CALL admin_organizador('" . $usuario . "');";
        $res = $this->db->query($query);
        return $res;
    }

    public function update_article($numart, $title, $stitle, $desc, $date, $d, $devent, $fechaFija, $url, $priority)
    {

        $query = "UPDATE articulo
                    SET 
                    `titulo_articulo` = '" . $title . "',
                    `short_titulo_articulo` = '" . $stitle . "',
                    `descripcion_titular` = '" . $desc . "',
                    `fecha_publicacion` = '" . $date . "',
                    `fecha_vencimiento` = '" . $d . "',
                    `fecha_evento` = '" . $devent . "',
                    `fecha_nodefinida` = '" . $fechaFija . "',
                    `enlace_externa` = '" . $url . "',
                    `prioridad_articulo` = '" . $priority . "'
                    WHERE num_articulo = '" . $numart . "';";
        $this->db->query($query);
    }

    public function update_articleWi($numart, $title, $stitle, $desc, $encoded_image, $date, $d, $devent, $fechaFija, $url, $priority)
    {

        $query = "UPDATE articulo
                    SET 
                    `titulo_articulo` = '" . $title . "',
                    `short_titulo_articulo` = '" . $stitle . "',
                    `descripcion_titular` = '" . $desc . "',
                    `imagen_titular` = '" . $encoded_image . "',
                    `fecha_publicacion` = '" . $date . "',
                    `fecha_vencimiento` = '" . $d . "',
                    `fecha_evento` = '" . $devent . "',
                    `fecha_nodefinida` = '" . $fechaFija . "',
                    `enlace_externa` = '" . $url . "',
                    `prioridad_articulo` = '" . $priority . "'
                    WHERE num_articulo = '" . $numart . "';";
        $this->db->query($query);
    }

    public function delete_tagsArticle($numArticle)
    {

        $id_articulo1 = "select @id_articulo := a.id_articulo as idArticulo from articulo a where a.num_articulo = '" . $numArticle . "'";
        $id_articulo2 = $this->db->query($id_articulo1);
        $consulta1 = $id_articulo2->fetch_array();

        $query = "DELETE FROM tag_articulo
                        WHERE id_articulo = " . $consulta1['idArticulo'] . ";";
        $this->db->query($query);
    }

    public function insert_article(articulo $dataArticle)
    {

        $query = "CALL Insertar_articulo(
                        '" . $dataArticle->getNumart() . "', 
                        '" . $dataArticle->getTitle() . "', 
                        '" . $dataArticle->getStitle() . "', 
                        '" . $dataArticle->getDesc() . "', 
                        '" . $dataArticle->getImage() . "', 
                        '" . $dataArticle->getDate() . "', 
                        '" . $dataArticle->getD() . "', 
                        '" . $dataArticle->getDevent() . "', 
                        '" . $dataArticle->getFechaFija() . "', 
                        '" . $dataArticle->getUrl() . "', 
                        '" . $dataArticle->getPriority() . "');";
        $this->db->query($query);
    }

    public function insert_tagArticle($numArticle, $nombTag)
    {

        $id_articulo1 = "select @id_articulo := a.id_articulo as idArticulo from articulo a where a.num_articulo = '" . $numArticle . "'";
        $id_articulo2 = $this->db->query($id_articulo1);
        $consulta1 = $id_articulo2->fetch_array();

        $query = "
            insert into tag_articulo (id_articulo, nombre_tag) 
            values (" . $consulta1['idArticulo'] . ", '" . $nombTag . "');";
        $this->db->query($query);
    }

    /* ----------------------- CONSULTAS DE PRE-INSCRITOS  ----------------------- */

    public function insert_preins(PreInscripcion $dataPreIns)
    {
        // var_dump($dataPreIns);
        //    sleep(6);
        $query = "CALL Insertar_preins(
                        '" . $dataPreIns->getFirstName() . "', 
                        '" . $dataPreIns->getLastName() . "', 
                        '" . $dataPreIns->getDni() . "', 
                        '" . $dataPreIns->getCellphone() . "', 
                        '" . $dataPreIns->getEmail() . "',  
                        '" . $dataPreIns->getAnio() . "', 
                        '" . $dataPreIns->getCountry() . "', 
                        '" . $dataPreIns->getCity() . "',
                        '" . $dataPreIns->getTipo() . "', 
                        '" . $dataPreIns->getInstitution() . "',
                        '" . $dataPreIns->getGrade() . "',
                        '" . $dataPreIns->getVoucher() . "');";
        $this->db->query($query);
    }

    public function mostrar_tpreinscripciones()
    {
        $query1  = "SET lc_time_names = 'es_ES';";
        $this->db->query($query1);
        $query2 = "select * from v_preinscripcion;";
        $res = $this->db->query($query2);
        return $res;
    }

    public function accept_preins(int $acePreins)
    {

        $query2 = "CALL `aceptar_preinscripcion`(" . $acePreins . ");";
        $this->db->query($query2);
    }

    public function decline_preins(int $denPreins)
    {

        $query2 = "CALL `denegar_preinscripcion`(" . $denPreins . ");";
        $this->db->query($query2);
    }

    public function mostrar_dpreinscripciones(int $datoPreins)
    {

        $query1  = "SET lc_time_names = 'es_ES';";
        $this->db->query($query1);
        $query = "select * from v_showPreinscripciones where id = " . $datoPreins . ";";
        $res = $this->db->query($query);
        return $res;
    }

    /* ----------------------- CONSULTAS DE ESTUDIANTES ----------------------- */

    public function insert_students(estudiante $dataStudents)
    {

        $query = "CALL Insertar_estudiante(
                        '" . $dataStudents->getFirstName() . "', 
                        '" . $dataStudents->getLastName() . "', 
                        '" . $dataStudents->getDni() . "', 
                        '" . $dataStudents->getContact_point() . "', 
                        '" . $dataStudents->getEmail() . "', 
                        '" . $dataStudents->getQr() . "', 
                        '" . $dataStudents->getYearStudent() . "', 
                        '" . $dataStudents->getCountry() . "', 
                        '" . $dataStudents->getCity() . "', 
                        '" . $dataStudents->getInstitution() . "');";
        $this->db->query($query);
    }

    public function showTable_students()
    {

        $query = "CALL mostrar_estudiante();";
        $res = $this->db->query($query);
        return $res;
    }

    public function showEdit_students($data)
    {

        $query = "select * from v_estudiante where numEst = " . $data . "";
        $res = $this->db->query($query);
        return $res;
    }

    public function update_students(estudiante $dataEst, $numEst)
    {

        $query = "CALL `actualizar_estudiante`(
                '" . $dataEst->getFirstName() . "', 
                '" . $dataEst->getLastName() . "', 
                '" . $dataEst->getDni() . "', 
                '" . $dataEst->getContact_point() . "', 
                '" . $dataEst->getEmail() . "', 
                '" . $dataEst->getQr() . "', 
                '" . $dataEst->getYearStudent() . "', 
                '" . $dataEst->getCountry() . "', 
                '" . $dataEst->getCity() . "', 
                '" . $dataEst->getInstitution() . "', 
                " . $numEst . ");";
        $this->db->query($query);
    }

    public function deleteEstudiante(int $data)
    {
        $query = "CALL `eliminar_estudiante`(" . $data . ");";
        $this->db->query($query);
    }

    /* ----------------------- CONSULTAS DE PROFESIONALES ----------------------- */

    public function mostrar_tprofesional()
    {
        $query = "CALL mostrar_tprofesional();";
        $res = $this->db->query($query);
        return $res;
    }

    //mostrar profesionales
    public function mostrar_profesional($numPro)
    {
        $query = "CALL mostrar_profesional(" . $numPro . ");";
        $res = $this->db->query($query);
        return $res;
    }

    //insertar profesional tipo llamando procedimiento almacenado
    public function insert_profesional(profesional $dataProfesional)
    {
        $query = "CALL Insertar_profesional(
                '" . $dataProfesional->getNombre() . "',
                '" . $dataProfesional->getApellido() . "',
                '" . $dataProfesional->getDni() . "',
                '" . $dataProfesional->getCelular() . "',
                '" . $dataProfesional->getEmail() . "',
                '" . $dataProfesional->getQr() . "',
                '" . $dataProfesional->getGrado() . "',
                '" . $dataProfesional->getCiudad() . "',
                '" . $dataProfesional->getPais() . "');";
        $res = $this->db->query($query);
    }

    //editar profesional
    public function update_profesional(profesional $dataProfesional, $numPro)
    {
        $query = "CALL actualizar_profesional(
                '" . $dataProfesional->getNombre() . "',
                '" . $dataProfesional->getApellido() . "',
                '" . $dataProfesional->getDni() . "',
                '" . $dataProfesional->getCelular() . "',
                '" . $dataProfesional->getEmail() . "',
                '" . $dataProfesional->getQr() . "',
                '" . $dataProfesional->getGrado() . "',
                '" . $dataProfesional->getCiudad() . "',
                '" . $dataProfesional->getPais() . "',
                " . $numPro . ");";
        $this->db->query($query);
    }

    public function deleteProfesional(int $data)
    {
        $query = "CALL `eliminar_profesional`(" . $data . ");";
        $this->db->query($query);
    }



    /* -------------------- CONSULTAS DE ORGANIZADORES -------------------------- */

    public function mostrar_torganizador()
    {
        $query = "CALL mostrar_torganizador();";
        $res = $this->db->query($query);
        return $res;
    }

    public function insert_organizador(organizador $dataOrganizer, $imagen_perfil)
    {

        $query = "CALL Insertar_organizador(
                        '" . $dataOrganizer->getNombre() . "', 
                        '" . $dataOrganizer->getApellido() . "', 
                        '" . $dataOrganizer->getEmail() . "', 
                        '" . $dataOrganizer->getDni() . "', 
                        '" . $dataOrganizer->getCelular() . "', 
                        " . $dataOrganizer->getRol_organizador() . ", 
                        '" . $imagen_perfil . "', 
                        '" . $dataOrganizer->getCodigo() . "', 
                        '" . $dataOrganizer->getClave() . "');";
        $this->db->query($query);
    }

    // Actualizar organizador con imagen
    public function update_organizador(organizador $dataOrganizer, $imagen_perfil, $numOrg)
    {

        $query = "CALL actualizar_organizador(
                        '" . $dataOrganizer->getNombre() . "', 
                        '" . $dataOrganizer->getApellido() . "', 
                        '" . $dataOrganizer->getEmail() . "', 
                        '" . $dataOrganizer->getDni() . "', 
                        '" . $dataOrganizer->getCelular() . "', 
                        " .  $dataOrganizer->getRol_organizador() . ", 
                        '" . $imagen_perfil . "', 
                        '" . $dataOrganizer->getCodigo() . "', 
                        '" . $dataOrganizer->getClave() . "',
                        " . $numOrg . " );";
        $this->db->query($query);
    }

    // Actualizar organizador sin imagen
    public function update_organizadorWi(organizador $dataOrganizer, $numOrg)
    {

        $query = "CALL actualizar_organizadorWi(
                        '" . $dataOrganizer->getNombre() . "', 
                        '" . $dataOrganizer->getApellido() . "', 
                        '" . $dataOrganizer->getEmail() . "', 
                        '" . $dataOrganizer->getDni() . "', 
                        '" . $dataOrganizer->getCelular() . "', 
                        " .  $dataOrganizer->getRol_organizador() . ", 
                        '" . $dataOrganizer->getCodigo() . "', 
                        '" . $dataOrganizer->getClave() . "', 
                        " . $numOrg . " );";
        $this->db->query($query);
    }

    public function mostrar_organizador($numOrg)
    {
        $query = "CALL mostrar_organizador(" . $numOrg . ");";
        $res = $this->db->query($query);
        return $res;
    }


    /* -------------------- CONSULTAS DE PONENTES -------------------------- */

    public function mostrar_tponente()
    {
        $query = "CALL mostrar_tponente();";
        $res = $this->db->query($query);
        return $res;
    }

    // Insercion de ponente
    public function insert_ponente(ponente $dataPonente)
    {

        $query = "CALL Insertar_ponente(
                        '" . $dataPonente->getNombre() . "', 
                        '" . $dataPonente->getApellido() . "', 
                        '" . $dataPonente->getDni() . "', 
                        '" . $dataPonente->getCelular() . "', 
                        '" . $dataPonente->getEmail() . "', 
                        '" . $dataPonente->getPais() . "', 
                        '" . $dataPonente->getCiudad() . "', 
                        '" . $dataPonente->getFoto() . "', 
                        '" . $dataPonente->getEmpresa() . "',
                        '" . $dataPonente->getTitulo() . "',
                        '" . $dataPonente->getBandera() . "',
                        '" . $dataPonente->getDescripcion() . "',
                        '" . $dataPonente->getLink() . "'
                    
                    );";
        $this->db->query($query);
    }

    // Actualizar ponente con imagen
    public function update_ponente(ponente $dataPonente, $numPon)
    {

        $query = "CALL actualizar_ponente(
                        '" . $dataPonente->getNombre() . "', 
                        '" . $dataPonente->getApellido() . "', 
                        '" . $dataPonente->getDni() . "', 
                        '" . $dataPonente->getCelular() . "', 
                        '" . $dataPonente->getEmail() . "', 
                        '" . $dataPonente->getPais() . "', 
                        '" . $dataPonente->getCiudad() . "', 
                        '" . $dataPonente->getFoto() . "', 
                        '" . $dataPonente->getEmpresa() . "',
                        '" . $dataPonente->getTitulo() . "',
                        '" . $dataPonente->getBandera() . "',
                        '" . $dataPonente->getDescripcion() . "',
                        '" . $dataPonente->getLink() . "',
                        " . $numPon . " );";
        $this->db->query($query);
    }

    // actualización bandera
    public function update_ponenteBan(ponente $dataPonente, $numPon)
    {

        $query1 = "
            UPDATE `usuarios`
                SET
                `nombre_usuario` = '" . $dataPonente->getNombre() . "',
                `apellido_usuario` = '" . $dataPonente->getApellido() . "',
                `dni_usuario` = '" . $dataPonente->getDni() . "',
                `celular_usuario` = '" . $dataPonente->getCelular() . "',
                `email_usuario` = '" . $dataPonente->getEmail() . "'
                WHERE `id_usuario` = " . $numPon . ";";
        $this->db->query($query1);


        $query2 = "
            UPDATE `ponentes`
                SET
                `nombre_empresa` = '" . $dataPonente->getEmpresa() . "',
                `pais_ponentes` = '" . $dataPonente->getPais() . "',
                `ciudad_ponentes` = '" . $dataPonente->getCiudad() . "',
                `titulo_abrev` = '" . $dataPonente->getTitulo() . "',
                `imagen_bandera` = '" . $dataPonente->getBandera() . "',
                `descripcion` = '" . $dataPonente->getDescripcion() . "',
                `link_informacion` = '" . $dataPonente->getLink() . "' 
                WHERE `id_usuario` = " . $numPon . ";";
        $this->db->query($query2);
    }

    // actualización foto
    public function update_ponenteFoto(ponente $dataPonente, $numPon)
    {


        $query1 = "
            UPDATE `usuarios`
                SET
                `nombre_usuario` = '" . $dataPonente->getNombre() . "',
                `apellido_usuario` = '" . $dataPonente->getApellido() . "',
                `dni_usuario` = '" . $dataPonente->getDni() . "',
                `celular_usuario` = '" . $dataPonente->getCelular() . "',
                `email_usuario` = '" . $dataPonente->getEmail() . "'
                WHERE `id_usuario` = " . $numPon . ";";
        $this->db->query($query1);


        $query2 = "
                UPDATE `ponentes`
                SET
                `foto_ponente` = '" . $dataPonente->getFoto() . "',
                `nombre_empresa` = '" . $dataPonente->getEmpresa() . "',
                `pais_ponentes` = '" . $dataPonente->getPais() . "',
                `ciudad_ponentes` = '" . $dataPonente->getCiudad() . "',
                `titulo_abrev` = '" . $dataPonente->getTitulo() . "',
                `descripcion` = '" . $dataPonente->getDescripcion() . "',
                `link_informacion` = '" . $dataPonente->getLink() . "' 
                WHERE `id_usuario` = " . $numPon . ";";
        $this->db->query($query2);
    }

    // actualización sin imagen
    public function update_ponenteSFB(ponente $dataPonente, $numPon)
    {

        $query1 = "
            UPDATE `usuarios`
                SET
                `nombre_usuario` = '" . $dataPonente->getNombre() . "',
                `apellido_usuario` = '" . $dataPonente->getApellido() . "',
                `dni_usuario` = '" . $dataPonente->getDni() . "',
                `celular_usuario` = '" . $dataPonente->getCelular() . "',
                `email_usuario` = '" . $dataPonente->getEmail() . "'
                WHERE `id_usuario` = " . $numPon . ";";
        $this->db->query($query1);

        $query2 = "
                UPDATE `ponentes`
                SET
                `nombre_empresa` = '" . $dataPonente->getEmpresa() . "',
                `pais_ponentes` = '" . $dataPonente->getPais() . "',
                `ciudad_ponentes` = '" . $dataPonente->getCiudad() . "',
                `titulo_abrev` = '" . $dataPonente->getTitulo() . "',
                `descripcion` = '" . $dataPonente->getDescripcion() . "',
                `link_informacion` = '" . $dataPonente->getLink() . "' 
                WHERE `id_usuario` = " . $numPon . ";";
        $this->db->query($query2);
    }


    public function mostrar_ponente($numPon)
    {
        $query = "CALL mostrar_ponente(" . $numPon . ");";
        $res = $this->db->query($query);
        return $res;
    }


    /* ----------------------------- CONSULTAS DE PERFIL ----------------------------- */

    // Actualizar perfil con imagen
    public function update_perfil(perfil $dataPerfil, $numPerfil)
    {

        $query = "CALL actualizar_perfil(
                        '" . $dataPerfil->getNombre() . "', 
                        '" . $dataPerfil->getApellido() . "', 
                        '" . $dataPerfil->getEmail() . "', 
                        '" . $dataPerfil->getDni() . "', 
                        '" . $dataPerfil->getCelular() . "', 
                        '" .  $dataPerfil->getRol_organizador() . "', 
                        '" . $dataPerfil->getFoto_perfil() . "', 
                        '" . $dataPerfil->getCodigo() . "', 
                        '" . $dataPerfil->getClave() . "',
                        " . $numPerfil . ");";
        $this->db->query($query);
    }

    // Actualizar perfil sin imagen
    public function update_perfilWi(perfil $dataPerfil, $numPerfil)
    {

        $query = "CALL actualizar_perfilWi(
                        '" . $dataPerfil->getNombre() . "', 
                        '" . $dataPerfil->getApellido() . "', 
                        '" . $dataPerfil->getEmail() . "', 
                        '" . $dataPerfil->getDni() . "', 
                        '" . $dataPerfil->getCelular() . "', 
                        '" . $dataPerfil->getRol_organizador() . "', 
                        '" . $dataPerfil->getFoto_perfil() . "', 
                        '" . $dataPerfil->getCodigo() . "', 
                        '" . $dataPerfil->getClave() . "', 
                        " . $numPerfil . ");";
        $this->db->query($query);
    }

    public function mostrar_perfil($codPerfil)
    {
        $query = "CALL mostrar_perfil('" . $codPerfil . "');";
        $res = $this->db->query($query);
        return $res;
    }

    /* -------------------- CONSULTAS DE TEMÁTICAS -------------------------- */

    public function mostrar_ttematicas()
    {
        $query = "CALL mostrar_ttematicas();";
        $res = $this->db->query($query);
        return $res;
    }

    public function insert_topics($name, $imagenTematica, $descripcion)
    {

        $query = "CALL Insertar_tematica(
                        '" . $name . "', 
                        '" . $imagenTematica . "', 
                        '" . $descripcion . "');";
        $this->db->query($query);
    }

    // Actualizar organizador con imagen
    public function update_topics($idTem, $name, $imagenTematica, $descripcion)
    {

        $query = "CALL actualizar_tematica(
                        '" . $name . "', 
                        '" . $imagenTematica . "', 
                        '" . $descripcion . "', 
                        " . $idTem . " );";
        $this->db->query($query);
    }

    // Actualizar tematica sin imagen
    public function update_topicsWi($idTem, $name, $descripcion)
    {

        $query = "CALL actualizar_tematicaWi(
                        '" . $name . "', 
                        '" . $descripcion . "', 
                        " . $idTem . " );";
        $this->db->query($query);
    }

    public function mostrar_topics($numTop)
    {
        $query = "CALL mostrar_tematica(" . $numTop . ");";
        $res = $this->db->query($query);
        return $res;
    }

    /* -------------------- CONSULTAS DE CHARLAS -------------------------- */

    public function mostrar_tcharlas($selectC)
    {
        $query = " select * from v_charlas where tipoAct like concat('%', '" . $selectC . "', '%');";
        $res = $this->db->query($query);
        return $res;
    }

    public function mostrar_dTalksTopics()
    {
        $query = "select idTem, nombre from v_tematicas;";
        $res = $this->db->query($query);
        return $res;
    }

    public function mostrar_dTalksSpeakers()
    {
        $query = "select idUsuario, concat(nombre, ' ', apellido) as nombres from v_ponentes;";
        $res = $this->db->query($query);
        return $res;
    }

    public function insert_talks(charlas $dataCharlas)
    {

        $query = "CALL `Insertar_charlas`(
                '" . $dataCharlas->getTitleTalks() . "',
                " . $dataCharlas->getTypeTalks() . ",
                " . $dataCharlas->getIdTopics() . ",
                " . $dataCharlas->getIdSpeakers() . ",
                '" . $dataCharlas->getDateTalks() . "',
                '" . $dataCharlas->getHourTalks() . "',
                '" . $dataCharlas->getTurnTalks() . "',
                '" . $dataCharlas->getDurationTalks() . "');";
        $this->db->query($query);
    }

    public function update_talks(charlas $dataCharlas, $idCharla)
    {

        $query = "CALL `actualizar_charlas`(
                '" . $dataCharlas->getTitleTalks() . "',
                " . $dataCharlas->getTypeTalks() . ",
                " . $dataCharlas->getIdTopics() . ",
                " . $dataCharlas->getIdSpeakers() . ",
                '" . $dataCharlas->getDateTalks() . "',
                '" . $dataCharlas->getHourTalks() . "',
                '" . $dataCharlas->getTurnTalks() . "',
                '" . $dataCharlas->getDurationTalks() . "',
                " . $idCharla . ");";
        $this->db->query($query);
    }

    public function mostrar_talks($idCharla)
    {
        $query = "select * from v_charlaEdit
                where idCharla = " . $idCharla . "";
        $res = $this->db->query($query);
        return $res;
    }


    /*------------------ CONSULTA DE ALUMNOS INSCRITOS / INSCRIPCIONES --------------*/
    public function mostrar_nombrealumnos()
    {
        $query = "SELECT id_usuario,nombre_usuario, apellido_usuario FROM usuarios WHERE (id_tipo_usuario=3 || id_tipo_usuario=4)  ORDER BY nombre_usuario ASC;";
        $res = $this->db->query($query);
        return $res;
    }
    public function insertar_inscripcion(inscripcion $dataInscripciones, $cod_Asist, $num_Oper)
    {
        $query = "CALL Insertar_inscripcion(
                '" . $dataInscripciones->getIdUser() . "',
                '" . $dataInscripciones->getDateIncription() . "',
                '" . $dataInscripciones->getIdOrganizer() . "',
                '" . $dataInscripciones->getIdActivity() . "',
                '" . $dataInscripciones->getLinkPhotoVoucher() . "',
                '" . $dataInscripciones->getTypeInscription() . "',
                '" . $dataInscripciones->getPaymentType() . "',
                '" . $dataInscripciones->getStatePreinscription() . "',
                '" . $dataInscripciones->getPrepayment() . "',
                '" . $dataInscripciones->getPaymentInscription() . "',
                '" . $cod_Asist . "',
                '" . $num_Oper . "');";
        $res = $this->db->query($query);
        return $res;
    }
    public function mostrar_tinscripciones()
    {
        $query1  = "SET lc_time_names = 'es_ES';";
        $this->db->query($query1);
        $query = "select * from v_inscripcion where epiIns = '1';";
        $res = $this->db->query($query);
        return $res;
    }
    public function get_codAsistencia()
    {
        $query = "select (IFNULL(max(cod_asistencia) + 1, 1000)) as codAsistencia from inscripcion;";
        $res = $this->db->query($query);
        return $res;
    }
    public function showEdit_inscriptions($data)
    {
        $query = "select * from v_inscripcion where numIns = " . $data . "";
        $res = $this->db->query($query);
        return $res;
    }
    public function update_inscriptions(inscripcion $dataInscripciones, $cod_Asist, $num_Oper)
    {
        $query1 = " update `inscripcion`
                    set
                    `id_actividad` = " . $dataInscripciones->getIdActivity() . ",
                    `cod_asistencia` = '" . $cod_Asist . "',
                    `num_operacion` = '" . $num_Oper . "'
                    where `id_inscripcion` = " . $dataInscripciones->getIdUser() . ";";
        $this->db->query($query1);

        $query2 = " update `pago_inscripcion`
                    set
                    `pago_adelanto` = '" . $dataInscripciones->getPrepayment() . "',
                    `pago_inscripcion` = '" . $dataInscripciones->getPaymentInscription() . "'
                    where `id_inscripcion` = " . $dataInscripciones->getIdUser() . ";";
        $this->db->query($query2);
    }

    public function deleteInscripcion(int $data)
    {
        $query = "CALL `eliminar_inscripcion`(" . $data . ");";
        $this->db->query($query);
    }

    /*----------------------------- GET DATA FOR JSON -----------------------------*/

    public function obtener_data(){
        $query = "
            select ins.cod_asistencia as codigo, us.nombre_usuario as nombres, 
            us.apellido_usuario as apellidos from inscripcion ins
            inner join pago_inscripcion pi 
            on pi.id_inscripcion = ins.id_inscripcion 
            inner join usuarios us 
            on us.id_usuario = ins.id_usuario 
            where pi.estado_preinscripcion = 1
            order by ins.cod_asistencia asc;";
        $res = $this->db->query($query);
        return $res;
        
    }
}
