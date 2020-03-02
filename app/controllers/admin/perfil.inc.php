<?php
/* 
    
    AUTOR DE PROGRAMACIÓN PHP: 
    JHON ALVARADO ACHATA
    
*/


if ($link == '') {

    # editamos organizador segun el dato que pase como parámetro
    
    if (isset($_POST['update'])) {
        @$update = $_POST['update'];
    } else {
        @$update = NULL;
    }
    
    if ($update == "true") {
        $codusu = $this->admin;
        $firstName = $_POST['fname'];
        $lastName = $_POST['lname'];
        $correo = $_POST['correo'];
        // comprobación de cambios en la imagen
        @$textimage = $_POST['ufile'];
        @$password = $_POST['password'];

        if (@$password == '' || @$password == NULL) {
            $password = "not";
        }

        if ($textimage == '' || $textimage == NULL) {
            $textimage = "";
        } 
        
        if (!isset($_FILES["image"]["tmp_name"])) {
            $file_tmp = '';
            $dont_edit_photo = '1';
        } else {
            $file_tmp = $_FILES["image"]["tmp_name"];
            $dont_edit_photo = '0';
        }

        if (!isset($_FILES["image"]["name"])) {
            $file_name = 'avatar1.png';
        } else {
            $file_name = date("m" . "d" . "y") . date("h" . "i" . "s" . microtime(TRUE)) . "." . basename($_FILES['image']['type']);
        }

        $imagen_destino = ROOT . FOLDER_PATH . '/src/assets/image/fperfil/';
        move_uploaded_file($file_tmp, $imagen_destino . $file_name);
        $imagen_bd = 'src/assets/image/fperfil/' . $file_name;

        $this->model->update_perfil($codusu, $firstName, $lastName, $correo, $dont_edit_photo, $password, $imagen_bd);

    } else {
        $this->datos_usu = $this->model->datos_usuario($this->admin);
        $this->datos_perfil = $this->model->mostrar_perfil($this->admin);
        $this->AdminView('admin/perfil/perfil', [ 
            'datos_usu' => $this->datos_usu, 
            'datos_perfil' => $this->datos_perfil 
        ]);
    }
}
