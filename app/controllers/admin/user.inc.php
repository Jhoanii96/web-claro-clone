<?php
/* 
    
    AUTOR DE PROGRAMACIÓN PHP: 
    JHON ALVARADO ACHATA
    
*/


if ($link == ''){

    $this->datos_usu = $this->model->datos_usuario($this->admin);
    $this->table_user = $this->model->mostrar_tusuario();
    
    $this->AdminView('admin/user/user', [
        'datos_usu' => $this->datos_usu, 
        'table_user' => $this->table_user
    ]);

 

} else if($link == 'save') {
    //insertamos el organizador
    $firstName = strtoupper($_POST['firstName']);
    $lastName = strtoupper($_POST['lastName']);
    $email = $_POST['correo'];
    $dni = $_POST['dni'];
    $contact_point = $_POST['contact_point'];

    $file_name =$_FILES['image']['name'];
    $file_type =$_FILES['image']['type'];
    $file_size =$_FILES['image']['size'];

    $file_tmp =$_FILES['image']['tmp_name'];
    $imagen_destino = ROOT . FOLDER_PATH . '/src/assets/media/image/';
    move_uploaded_file($file_tmp, $imagen_destino.$file_name);

    $imagen_bd = '/2019/src/assets/media/image/' . $file_name;
    
    $rol = $_POST['rol'];
    if ($rol == 'Super Administrador') {
        $rol = '1';
    } elseif ($rol == 'Administrador') {
        $rol = '2';
    } elseif ($rol == 'Usuario') {
        $rol = '3';
    }
    $code = $_POST['code']; 
    $password = base64_encode($_POST['password']);

    /* $encapsuOrganizador = new organizador($firstName, $lastName, $email, $dni, $contact_point, $rol, $code, $password); */
        
    $this->dataOrganizador->guardarOrganizador($encapsuOrganizador, $imagen_bd);
    
    sleep(1);
    echo("<script>location.href = '" . FOLDER_PATH . "/admin/organizers';</script>");


} else if($link == 'edit') {

     # editamos organizador segun el dato que pase como parámetro
    @$update = $_POST['update'];
    if($update == "true"){
        $numOrg = $_POST['numOrg'];
        $firstName = strtoupper($_POST['firstName']);
        $lastName = strtoupper($_POST['lastName']);
        $dni = $_POST['dni'];
        $contact_point = $_POST['contact_point'];
        $correo = $_POST['correo'];
        // comprobación de cambios en la imagen
        @$textimage = $_POST['textImage'];
        
        $rol = $_POST['rol'];
        if ($rol == 'Super Administrador') {
            $rol = '1';
        } elseif ($rol == 'Administrador') {
            $rol = '2';
        } elseif ($rol == 'Usuario') {
            $rol = '3';
        }
        
        $code = $_POST['code'];
        $password = base64_encode($_POST['password']);


        if ($textimage == NULL || $textimage == '') {
            
            /* $encapsuOrganizador = new organizador($firstName, $lastName, $correo, $dni, 
            $contact_point, $rol, $code, $password); */
        
            $this->dataOrganizador->actualizarOrganizadorWi($encapsuOrganizador, $numOrg);
            
        } else {
            $file_name =$_FILES['image']['name'];
            $file_type =$_FILES['image']['type'];
            $file_size =$_FILES['image']['size'];

            $file_tmp =$_FILES['image']['tmp_name'];
            $imagen_destino = ROOT . FOLDER_PATH . '/src/assets/media/image/';
            move_uploaded_file($file_tmp, $imagen_destino.$file_name);

            $imagen_bd = '/2019/src/assets/media/image/' . $file_name;
            
            /* $encapsuOrganizador = new organizador($firstName, $lastName, $correo, $dni, 
            $contact_point, $rol, $code, $password); */
        
            $this->dataOrganizador->actualizarOrganizador($encapsuOrganizador, $imagen_bd, $numOrg);

        }

        sleep(1);
        echo("<script>location.href = '" . FOLDER_PATH . "/admin/organizers';</script>");


    } else {

        $this->model2 = new adminModel();
        $this->BellNtf = $this->model2->BellNotifications();
        $this->datos_organizador_edit = $this->dataOrganizador->mostrarEditarOrganizador($dato);

        $this->AdminView('admin/organizers/edit/edit', [ 
            'nombre'    => $this->datos_org['nombre'], 
            'apellido'  => $this->datos_org['apellido'], 
            'rol'       => $this->datos_org['rol'], 
            'fotoUsu'   => $this->datos_org['fotoUsu'], 
            'BellNtf' => $this->BellNtf, 
            'numOrg'    => $dato, 
            'datos_Organizador_edit' => $this->datos_organizador_edit
        ]);
    }

} 