<?php
/* 
    
    AUTOR DE PROGRAMACIÓN PHP: 
    JHON ALVARADO ACHATA
    
*/


if ($link == '') {

    # editamos organizador segun el dato que pase como parámetro
    @$update = $_POST['update'];
    if ($update == "true") {
        $numOrg = $_POST['numOrg'];
        $firstName = strtoupper($_POST['firstName']);
        $lastName = strtoupper($_POST['lastName']);
        $dni = $_POST['dni'];
        $contact_point = $_POST['contact_point'];
        $correo = $_POST['correo'];
        // comprobación de cambios en la imagen
        @$textimage = $_POST['textImage'];

        $rol = $_POST['rol'];
        $code = $this->session->get('usuarioCIIS');
        @$password = $_POST['password'];

        if (@$password != '' || @$password != NULL) {
            $password = base64_encode($password);
        } else {
            $password = "";
        }

        if ($textimage == NULL || $textimage == '') {

            

            $this->dataPerfil->actualizarPerfilWi($encapsuPerfil, $numOrg);
        } else {
            $file_name = $_FILES['image']['name'];
            $file_type = $_FILES['image']['type'];
            $file_size = $_FILES['image']['size'];

            $file_tmp = $_FILES['image']['tmp_name'];

            $imagen_destino = ROOT . FOLDER_PATH . '/src/assets/media/image/';
            move_uploaded_file($file_tmp, $imagen_destino . $file_name);
            $imagen_bd = '/2019/src/assets/media/image/' . $file_name;

            

            $this->dataPerfil->actualizarPerfil($encapsuPerfil, $numOrg);
        }

        sleep(1);
        echo ("<script>location.href = '" . FOLDER_PATH . "/admin/perfil';</script>");
    } else {
        $this->datos_usu = $this->model->datos_usuario($this->admin);
        $this->datos_perfil = $this->model->mostrar_perfil($this->admin);
        $this->AdminView('admin/perfil/perfil', [ 
            'datos_usu' => $this->datos_usu, 
            'datos_perfil' => $this->datos_perfil 
        ]);
    }
}
