<?php
/* 
    
    AUTOR DE PROGRAMACIÓN PHP: 
    JHON ALVARADO ACHATA

*/


$this->dataTopics = new dataAdmin();

if ($link == '') {

    $this->model2 = new adminModel();
    $this->BellNtf = $this->model2->BellNotifications();
    $this->datos_topics = $this->dataTopics->mostrarTablaTematicas();

    $this->AdminView('admin/topics/topics', [
        'nombre'    => $this->datos_org['nombre'],
        'apellido'  => $this->datos_org['apellido'],
        'rol'       => $this->datos_org['rol'],
        'fotoUsu' => $this->datos_org['fotoUsu'],
        'BellNtf' => $this->BellNtf,
        'datos_topics' => $this->datos_topics
    ]);
} elseif ($link == 'save') {
    //insertamos el tematicas
    $name = $_POST['titleTopics'];
    $descripcion = $_POST['description'];
    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];

    $imagen_destino = ROOT . FOLDER_PATH . '/src/assets/media/image/';
    move_uploaded_file($file_tmp, $imagen_destino . $file_name);
    $imagenTematica = '/2019/src/assets/media/image/' . $file_name;

    $this->dataTopics->guardarTematicas($name, $imagenTematica, $descripcion);

    sleep(1);
    echo ("<script>location.href = '" . FOLDER_PATH . "/admin/topics';</script>");
} elseif ($link == 'edit') {
    # editamos tematicas segun el dato que pase como parámetro
    @$update = $_POST['update'];
    if ($update == "true") {
        $idTem = $_POST['idTem'];
        $name = $_POST['titleTopics'];
        $descripcion = $_POST['description'];

        @$img_name = $_POST['image_name'];

        if ($img_name != '') {

            $file_name = $_FILES['image']['name'];
            $file_tmp = $_FILES['image']['tmp_name'];

            $imagen_destino = ROOT . FOLDER_PATH . '/src/assets/media/image/';
            move_uploaded_file($file_tmp, $imagen_destino . $file_name);
            $imagenTematica = '/2019/src/assets/media/image/' . $file_name;

            $this->dataTopics->actualizarTematicas($idTem, $name, $imagenTematica, $descripcion);
        } else {

            $this->dataTopics->actualizarTematicasWi($idTem, $name, $descripcion);
        }

        sleep(1);
        echo ("<script>location.href = '" . FOLDER_PATH . "/admin/topics';</script>");
    } else {

        $this->model2 = new adminModel();
        $this->BellNtf = $this->model2->BellNotifications();
        $this->datos_topics_edit = $this->dataTopics->mostrarEditarTematicas($dato);

        $this->AdminView('admin/topics/edit/edit', [
            'nombre'    => $this->datos_org['nombre'],
            'apellido'  => $this->datos_org['apellido'],
            'rol'       => $this->datos_org['rol'],
            'fotoUsu' => $this->datos_org['fotoUsu'],
            'BellNtf' => $this->BellNtf,
            'numPro' => $dato,
            'datos_topics' => $this->datos_topics_edit
        ]);
    }
}
