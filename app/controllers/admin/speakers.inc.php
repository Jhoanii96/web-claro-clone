<?php
/* 
    
    AUTOR DE PROGRAMACIÓN PHP: 
    JHON ALVARADO ACHATA
    
*/


$this->dataPonente = new dataAdmin();

if ($link == ''){

    $this->model2 = new adminModel();
    $this->BellNtf = $this->model2->BellNotifications();
    $this->datos_ponente = $this->dataPonente->mostrarTablaPonente();
    
    $this->AdminView('admin/speakers/speakers', [
        'nombre' => $this->datos_org['nombre'], 
        'apellido' => $this->datos_org['apellido'], 
        'rol' => $this->datos_org['rol'], 
        'fotoUsu' => $this->datos_org['fotoUsu'], 
        'BellNtf' => $this->BellNtf, 
        'datos_ponente' => $this->datos_ponente
    ]);

 
} else if($link == 'save') {
    //insertamos el organizador
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $dni = $_POST['dni'];
    $contact_point = $_POST['contact_point'];
    $email = $_POST['correo'];

    $country = $_POST['country'];
    $city = $_POST['city'];
    $institution = $_POST['institution'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $link = $_POST['link'];

    // foto imagen bandera
    $file_name =$_FILES['imageFlag']['name'];
    $file_type =$_FILES['imageFlag']['type'];
    $file_size =$_FILES['imageFlag']['size'];
    $file_tmp =$_FILES['imageFlag']['tmp_name'];
    $imagen_destino = ROOT . FOLDER_PATH . '/src/assets/media/image/';
    move_uploaded_file($file_tmp, $imagen_destino.$file_name);
    $imagen_flag = '/2019/src/assets/media/image/' . $file_name;
    // ***** End photo flag *****

    // foto imagen ponente
    $file_name =$_FILES['imagePhoto']['name'];
    $file_type =$_FILES['imagePhoto']['type'];
    $file_size =$_FILES['imagePhoto']['size'];
    $file_tmp =$_FILES['imagePhoto']['tmp_name'];
    $imagen_destino = ROOT . FOLDER_PATH . '/src/assets/media/image/';
    move_uploaded_file($file_tmp, $imagen_destino.$file_name);
    $imagen_speaker = '/2019/src/assets/media/image/' . $file_name;
    // ***** End photo image *****


    $encapsuPonente = new ponente($firstName, $lastName, $dni, $contact_point, $email, $country, 
        $city, $imagen_speaker, $institution, $titulo, $imagen_flag, $descripcion, $link);
        
    $this->dataPonente->guardarPonente($encapsuPonente);
        
    
    sleep(1);
    echo("<script>location.href = '" . FOLDER_PATH . "/admin/speakers';</script>");


} else if($link == 'edit') {

    # editamos ponentes segun el dato que pase como parámetro
    @$update = $_POST['update'];
    if($update == "true"){
        //insertamos el organizador
        $numPon = $_POST['numPon'];
        @$firstName = $_POST['firstName'];
        @$lastName = $_POST['lastName'];
        @$dni = $_POST['dni'];
        @$contact_point = $_POST['contact_point'];
        $email = $_POST['correo'];
        if($email == NULL) {
            $email = '';
        }

        @$country = $_POST['country'];
        @$city = $_POST['city'];
        @$institution = $_POST['institution'];
        @$titulo = $_POST['titulo'];
        @$descripcion = $_POST['descripcion'];
        @$link = $_POST['link'];
        $flag_name = $_POST['textFlag'];
        $speaker_name = $_POST['textPhoto'];

        // ACTUALIZAR LAS FOTOS BANDERA Y PONENTE
        if($flag_name != '' && $speaker_name != '') {

            // foto imagen bandera
            $file_name =$_FILES['imageFlag']['name'];
            $file_type =$_FILES['imageFlag']['type'];
            $file_size =$_FILES['imageFlag']['size'];
            $file_tmp =$_FILES['imageFlag']['tmp_name'];
            $imagen_destino = ROOT . FOLDER_PATH . '/src/assets/media/image/';
            move_uploaded_file($file_tmp, $imagen_destino.$file_name);
            $imagen_flag = '/2019/src/assets/media/image/' . $file_name;
            // ***** End photo flag *****

            // foto imagen ponente
            $file_name =$_FILES['imagePhoto']['name'];
            $file_type =$_FILES['imagePhoto']['type'];
            $file_size =$_FILES['imagePhoto']['size'];
            $file_tmp =$_FILES['imagePhoto']['tmp_name'];
            $imagen_destino = ROOT . FOLDER_PATH . '/src/assets/media/image/';
            move_uploaded_file($file_tmp, $imagen_destino.$file_name);
            $imagen_speaker = '/2019/src/assets/media/image/' . $file_name;
            // ***** End photo image *****

            $encapsuPonente = new ponente($firstName, $lastName, $dni, $contact_point, $email, $country, 
            $city, $imagen_speaker, $institution, $titulo, $imagen_flag, $descripcion, $link);
            
            $this->dataPonente->actualizarPonente($encapsuPonente, $numPon);
        
        // ACTUALIZAR SOLO LA FOTO BANDERA
        } elseif ($flag_name != '' && $speaker_name == '') {

            // foto imagen bandera
            $file_name =$_FILES['imageFlag']['name'];
            $file_type =$_FILES['imageFlag']['type'];
            $file_size =$_FILES['imageFlag']['size'];
            $file_tmp =$_FILES['imageFlag']['tmp_name'];
            $imagen_destino = ROOT . FOLDER_PATH . '/src/assets/media/image/';
            move_uploaded_file($file_tmp, $imagen_destino.$file_name);
            $imagen_flag = '/2019/src/assets/media/image/' . $file_name;
            // ***** End photo flag *****

            $encapsuPonente = new ponente($firstName, $lastName, $dni, $contact_point, $email, $country, 
            $city, '', $institution, $titulo, $imagen_flag, $descripcion, $link);
            
            $this->dataPonente->actualizarPonenteBan($encapsuPonente, $numPon);

        // ACTUALIZAR SOLO LA FOTO PONENTE
        } elseif ($flag_name == '' && $speaker_name != '') {

            // foto imagen ponente
            $file_name =$_FILES['imagePhoto']['name'];
            $file_type =$_FILES['imagePhoto']['type'];
            $file_size =$_FILES['imagePhoto']['size'];
            $file_tmp =$_FILES['imagePhoto']['tmp_name'];
            $imagen_destino = ROOT . FOLDER_PATH . '/src/assets/media/image/';
            move_uploaded_file($file_tmp, $imagen_destino.$file_name);
            $imagen_speaker = '/2019/src/assets/media/image/' . $file_name;
            // ***** End photo image *****

            $encapsuPonente = new ponente($firstName, $lastName, $dni, $contact_point, $email, $country, 
            $city, $imagen_speaker, $institution, $titulo, '', $descripcion, $link);
            
            $this->dataPonente->actualizarPonenteFoto($encapsuPonente, $numPon);

        // ACTUALIZAR SIN LAS FOTOS
        } elseif ($flag_name == '' && $speaker_name != '') {

            $encapsuPonente = new ponente($firstName, $lastName, $dni, $contact_point, $email, $country, 
            $city, '', $institution, $titulo, '', $descripcion, $link);
            
            $this->dataPonente->actualizarPonenteSFB($encapsuPonente, $numPon);

        }

        
        sleep(1);
        echo("<script>location.href = '" . FOLDER_PATH . "/admin/speakers';</script>");


    } else {

        $this->model2 = new adminModel();
        $this->BellNtf = $this->model2->BellNotifications();
        $this->datos_ponente_edit = $this->dataPonente->mostrarEditarPonente($dato);

        $this->AdminView('admin/speakers/edit/edit', [
            'nombre'    => $this->datos_org['nombre'], 
            'apellido'  => $this->datos_org['apellido'], 
            'rol'       => $this->datos_org['rol'], 
            'fotoUsu'   => $this->datos_org['fotoUsu'], 
            'BellNtf' => $this->BellNtf, 
            'datos_ponente_edit' => $this->datos_ponente_edit
        ]);
    }

} 