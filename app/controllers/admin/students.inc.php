<?php
/* 
    
    AUTOR DE PROGRAMACIÓN PHP: 
    JHON ALVARADO ACHATA
	
*/


$this->dataEstudiante = new dataAdmin();
if ($link == '') {
    $this->model2 = new adminModel();
    $this->BellNtf = $this->model2->BellNotifications();
    $this->datos_estudiante = $this->dataEstudiante->mostrarTablaEstudiante();
    $this->AdminView('admin/students/students', [
        'nombre' => $this->datos_org['nombre'],
        'apellido' => $this->datos_org['apellido'],
        'rol' => $this->datos_org['rol'],
        'fotoUsu' => $this->datos_org['fotoUsu'],
        'BellNtf' => $this->BellNtf,
        'datos_estudiante' => $this->datos_estudiante
    ]);
} else if ($link == 'save') {
    $firstName = strtoupper($_POST['firstName']);
    $lastName = strtoupper($_POST['lastName']);
    $dni = $_POST['dni'];
    $contact_point = $_POST['contact_point'];
    $email = $_POST['email'];
    $yearStudent = $_POST['yearStudent'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $institution = $_POST['institution'];
    $qr = $_POST['qr'];
    $encapsuEstudiante = new estudiante(
        $firstName,
        $lastName,
        $dni,
        $contact_point,
        $email,
        $yearStudent,
        $country,
        $city,
        $institution,
        $qr
    );

    $this->dataEstudiante->guardarEstudiante($encapsuEstudiante);
    sleep(1);
    $nombre = $firstName . ' ' . $lastName;
	$nombre = base64_encode(utf8_encode($nombre));
    echo ("<script>location.href = '" . FOLDER_PATH . "/admin/inscriptions?tp=_s&nm=" . $nombre . "';</script>");
} else if ($link == 'edit') {
    @$update = $_POST['update'];
    if ($update == "true") {
        $numEst = $_POST['numEst'];
        $firstName = strtoupper($_POST['firstName']);
        $lastName = strtoupper($_POST['lastName']);
        $dni = $_POST['dni'];
        $contact_point = $_POST['contact_point'];
        $email = $_POST['email'];
        $yearStudent = $_POST['yearStudent'];
        if ($yearStudent == '1er Año') {
            $yearStudent = '1';
        } elseif ($yearStudent == '2do Año') {
            $yearStudent = '2';
        } elseif ($yearStudent == '3er Año') {
            $yearStudent = '3';
        } elseif ($yearStudent == '4to Año') {
            $yearStudent = '4';
        } elseif ($yearStudent == '5to Año') {
            $yearStudent = '5';
        }
        $country = $_POST['country'];
        $city = $_POST['city'];
        $institution = $_POST['institution'];
        $qr = $_POST['qr'];

        $encapsuEstudiante = new estudiante(
            $firstName,
            $lastName,
            $dni,
            $contact_point,
            $email,
            $yearStudent,
            $country,
            $city,
            $institution,
            $qr
        );

        $this->dataEstudiante->actualizarEstudiante($encapsuEstudiante, $numEst);

        sleep(1);
        echo ("<script>location.href = '" . FOLDER_PATH . "/admin/students';</script>");
    } else {

        $this->model2 = new adminModel();
        $this->BellNtf = $this->model2->BellNotifications();
        $this->datosEditar_estudiante = $this->dataEstudiante->mostrarEditarEstudiante($dato);

        $this->AdminView('admin/students/edit/edit', [
            'nombre' => $this->datos_org['nombre'],
            'apellido' => $this->datos_org['apellido'],
            'rol' => $this->datos_org['rol'],
            'fotoUsu' => $this->datos_org['fotoUsu'],
            'BellNtf' => $this->BellNtf,
            'numEst' => $dato,
            'datosEditar_estudiante' => $this->datosEditar_estudiante
        ]);
    }
} else if ($link == 'delete') {

    $this->dataEstudiante->eliminarEstudiante($dato);
    sleep(1);
    echo ("<script>location.href = '" . FOLDER_PATH . "/admin/students';</script>");
}
