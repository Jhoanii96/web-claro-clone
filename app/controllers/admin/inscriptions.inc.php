<?php
/* 
    
    AUTOR DE PROGRAMACIÓN PHP: 
    JOSUE ALDAIR MAMANI CARIAPAZA
	
*/ 


$this->dataInscripciones = new dataAdmin();
if ($link == '') {
    $this->model2 = new adminModel();
    $this->datos_inscripcion = $this->dataInscripciones->mostrarTablaInscripcion();
    $this->cod_asistencia = $this->dataInscripciones->getCodAsistencia();
    $this->casist = $this->cod_asistencia->fetch_assoc();
    $this->BellNtf = $this->model2->BellNotifications();
    if (isset($_GET['tp'])) {
        if ($_GET['tp'] == "_s") {
            $tipo_user_pago = "100";
        } elseif ($_GET['tp'] == "_p") {
            $tipo_user_pago = "140";
        }
    } else {
        $tipo_user_pago = 'nothing';
    }
    if (isset($_GET['nm'])) {
        $nombre_usuario = utf8_decode(base64_decode($_GET['nm']));
    } else {
        $nombre_usuario = 'nothing';
    }
    $this->AdminView('admin/inscriptions/inscriptions', [
        'nombre' => $this->datos_org['nombre'],
        'apellido' => $this->datos_org['apellido'],
        'rol' => $this->datos_org['rol'],
        'fotoUsu' => $this->datos_org['fotoUsu'],
        'BellNtf' => $this->BellNtf,
        'datos_inscripcion' => $this->datos_inscripcion,
        'tipo_usuario_pago' => $tipo_user_pago,
        'nombre_usuario' => $nombre_usuario,
        'cod_asistencia' => $this->casist['codAsistencia']
    ]);
} else if ($link == 'save') {
    $iduser                 = $_POST['idUsuario'];
    $date_inscription       = $_POST['fechaInscripcion'];
    $id_organizer           = $this->session->get('usuarioCIIS');
    $id_activity            = $_POST['tipoConferencia'];
    $link_photo_voucher     = $_POST['link_photo_voucher'];
    $type_inscription       = $_POST['tipoInscripcion'];
    $payment_type           = $_POST['tipoPago'];
    $state_preinscription   = $_POST['estadoPreinscripcion'];
    $prepayment             = $_POST['pagoAdelanto'];
    $payment_inscription    = $_POST['pagoTotal'];
    $cod_Asist              = $_POST['codAsist'];
    $num_Oper               = $_POST['numOper'];

    $encapsuInscripcion = new inscripcion($iduser, $date_inscription, $id_organizer, $id_activity, $link_photo_voucher, $type_inscription, $payment_type, $state_preinscription, $prepayment, $payment_inscription);
    $this->dataInscripciones->guardarInscripcion($encapsuInscripcion, $cod_Asist, $num_Oper);

    /* ---- FILE CREATE JSON ---- */

    $this->dataInsc = new dataAdmin();
    $this->parametro1 = $this->dataInsc->getDatainscriptions();

    $this->data_for_json = array();
    while ($row_json = $this->parametro1->fetch_assoc()) {

        $this->data_for_json[] = array(
            'codigo'        => $row_json['codigo'],
            'nombres'       => $row_json['nombres'],
            'apellidos'     => $row_json['apellidos']
        );
    }

    $this->data_json = json_encode($this->data_for_json, JSON_UNESCAPED_UNICODE);
    file_put_contents(ROOT . FOLDER_PATH . '/src/data/inscripcion.json', $this->data_json, LOCK_EX);

    echo ("<script>location.href = '" . FOLDER_PATH . "/admin/inscriptions';</script>");
} else if($link == 'imprimir'){
        
}else if ($link == 'edit') {
    @$update = $_POST['update'];
    if ($update == "true") {
        $numIns = $_POST['numIns'];
        $actIns = $_POST['actIns'];
        $fecIns = $_POST['fecIns'];
        $tipIns = $_POST['tipIns'];
        $pagIns = $_POST['pagIns'];
        $paaIns = $_POST['paaIns'];
        $tpaIns = $_POST['tpaIns'];
        $epiIns = $_POST['epiIns'];
        if ($epiIns == 'En espera') {
            $epiIns = '1';
        } elseif ($epiIns == 'Inscrito') {
            $epiIns = '2';
        }
        $codAsistencia = $_POST['codAsistencia'];
        $numOperacion = $_POST['numOperacion'];

        $lfvIns = '';

        $id_org = $this->session->get('usuarioCIIS');
        $encapsuInscripcion = new inscripcion($numIns, $fecIns, $id_org, $actIns, $lfvIns, $tipIns, $tpaIns, $epiIns, $paaIns, $pagIns);
        $this->dataInscripciones->actualizarInscripcion($encapsuInscripcion, $codAsistencia, $numOperacion);


        /* ---- FILE CREATE JSON ---- */

        $this->dataInsc = new dataAdmin();
        $this->parametro1 = $this->dataInsc->getDatainscriptions();

        $this->data_for_json = array();
        while ($row_json = $this->parametro1->fetch_assoc()) {

            $this->data_for_json[] = array(
                'codigo'        => $row_json['codigo'],
                'nombres'       => $row_json['nombres'],
                'apellidos'     => $row_json['apellidos']
            );
        }

        $this->data_json = json_encode($this->data_for_json, JSON_UNESCAPED_UNICODE);
        file_put_contents(ROOT . FOLDER_PATH . '/src/data/inscripcion.json', $this->data_json, LOCK_EX);

        sleep(1);
        echo ("<script>location.href = '" . FOLDER_PATH . "/admin/inscriptions';</script>");
    }else {
        $this->model2 = new adminModel();
        $this->BellNtf = $this->model2->BellNotifications();
        $this->datosEditar_inscripcion = $this->dataInscripciones->mostrarEditarInscripcion($dato);

        $this->AdminView('admin/inscriptions/edit/edit', [
            'nombre' => $this->datos_org['nombre'],
            'apellido' => $this->datos_org['apellido'],
            'rol' => $this->datos_org['rol'],
            'fotoUsu' => $this->datos_org['fotoUsu'],
            'BellNtf' => $this->BellNtf,
            'numIns' => $dato,
            'datosEditar_inscripcion' => $this->datosEditar_inscripcion
        ]);
    }
} else if ($link == 'delete') {

    $this->dataInscripciones->eliminarInscripcion($dato);

    /* ---- FILE CREATE JSON ---- */

    $this->dataInsc = new dataAdmin();
    $this->parametro1 = $this->dataInsc->getDatainscriptions();

    $this->data_for_json = array();
    while ($row_json = $this->parametro1->fetch_assoc()) {

        $this->data_for_json[] = array(
            'codigo'        => $row_json['codigo'],
            'nombres'       => $row_json['nombres'],
            'apellidos'     => $row_json['apellidos']
        );
    }

    $this->data_json = json_encode($this->data_for_json, JSON_UNESCAPED_UNICODE);
    file_put_contents(ROOT . FOLDER_PATH . '/src/data/inscripcion.json', $this->data_json, LOCK_EX);

    sleep(1);
    echo ("<script>location.href = '" . FOLDER_PATH . "/admin/inscriptions';</script>");
}
