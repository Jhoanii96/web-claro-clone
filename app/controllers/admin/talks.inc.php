<?php

/* 
    
    AUTOR DE PROGRAMACIÓN PHP: 
    JHON ALVARADO ACHATA

*/

//require_once ROOT . FOLDER_PATH . "/app/ajax/talks_data.php";

?>

<?php


$this->dataTalks = new dataAdmin();

if ($link == '') {

    $this->model2 = new adminModel();
    $this->BellNtf = $this->model2->BellNotifications();
    $this->datos_drop_topics = $this->dataTalks->mostrarDropTematicas();
    $this->datos_drop_speakers = $this->dataTalks->mostrarDropPonentes();
    $this->datos_charlas = $this->dataTalks->mostrarTablaCharlas("");

    $this->AdminView('admin/talks/talks', [
        'nombre'    => $this->datos_org['nombre'],
        'apellido'  => $this->datos_org['apellido'],
        'rol'       => $this->datos_org['rol'],
        'fotoUsu' => $this->datos_org['fotoUsu'],
        'BellNtf' => $this->BellNtf,
        'datos_drop_topics' => $this->datos_drop_topics,
        'datos_drop_speakers' => $this->datos_drop_speakers,
        'datos_charlas' => $this->datos_charlas
    ]);
} elseif ($link == 'save') {
    //insertamos charlas      
    $titleTalks = $_POST['titleTalks'];
    $typeTalks = $_POST['typeTalks'];
    $idTopics = $_POST['idTopics'];
    $idSpeakers = $_POST['idSpeakers'];
    $dateTalks = $_POST['dateTalks'];
    $hourTalks = $_POST['hourTalks'];
    $turnTalks = '-';
    $durationTalks = $_POST['durationTalks'];

    $encapsuCharlas = new charlas(
        $titleTalks,
        $typeTalks,
        $idTopics,
        $idSpeakers,
        $dateTalks,
        $hourTalks,
        $turnTalks,
        $durationTalks
    );

    $this->dataTalks->guardarCharlas($encapsuCharlas);

    sleep(1);
    echo ("<script>location.href = '" . FOLDER_PATH . "/admin/talks';</script>");
} elseif ($link == 'edit') {
    # editamos charlas segun el dato que pase como parámetro
    @$update = $_POST['update'];
    if ($update == "true") {
        //actualizamos charlas      
        $idTalks = $_POST['idTalks'];
        $titleTalks = $_POST['titleTalks'];
        $typeTalks = $_POST['typeTalks'];
        $idTopics = $_POST['idTopics'];
        $idSpeakers = $_POST['idSpeakers'];
        $dateTalks = $_POST['dateTalks'];
        $hourTalks = $_POST['hourTalks'];
        $turnTalks = '-';
        $durationTalks = $_POST['durationTalks'];

        $encapsuCharlas = new charlas(
            $titleTalks,
            $typeTalks,
            $idTopics,
            $idSpeakers,
            $dateTalks,
            $hourTalks,
            $turnTalks,
            $durationTalks
        );

        $this->dataTalks->actualizarCharlas($encapsuCharlas, $idTalks);


        sleep(1);
        echo ("<script>location.href = '" . FOLDER_PATH . "/admin/talks';</script>");
    } else {

        $this->model2 = new adminModel();
        $this->BellNtf = $this->model2->BellNotifications();
        $this->datos_drop_topics = $this->dataTalks->mostrarDropTematicas();
        $this->datos_drop_speakers = $this->dataTalks->mostrarDropPonentes();
        $this->datos_charla_edit = $this->dataTalks->mostrarEditarCharlas($dato);

        $this->AdminView('admin/talks/edit/edit', [
            'nombre'    => $this->datos_org['nombre'],
            'apellido'  => $this->datos_org['apellido'],
            'rol'       => $this->datos_org['rol'],
            'fotoUsu' => $this->datos_org['fotoUsu'],
            'BellNtf' => $this->BellNtf, 
            'datos_drop_topics' => $this->datos_drop_topics,
            'datos_drop_speakers' => $this->datos_drop_speakers,
            'datos_charla_edit' => $this->datos_charla_edit
        ]);
    }
}
