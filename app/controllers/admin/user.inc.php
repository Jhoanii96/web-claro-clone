<?php
/* 
    
    AUTOR DE PROGRAMACIÓN PHP: 
    JHON ALVARADO ACHATA
    
*/

if ($link == '') {

    $this->datos_usu = $this->model->datos_usuario($this->admin);
    $this->table_user = $this->model->mostrar_tusuario();
    $this->supervisor = $this->model->datos_supervisor();

    $this->AdminView('admin/user/user', [
        'datos_usu' => $this->datos_usu,
        'table_user' => $this->table_user,
        'supervisor' => $this->supervisor
    ]);
} else if ($link == 'save') {

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $correo = $_POST["correo"];
    $status = $_POST["status"];
    $gender = $_POST["gender"];
    $rol_user = $_POST["rol_user"];
    if ($rol_user == '4') {
        $supr = $_POST["supr"];
    } else {
        $supr = '';
    }
    $code = $_POST["code"];
    $password = $_POST["password"];

    if (!isset($_FILES["image"]["tmp_name"])) {
        $file_tmp = '';
    } else {
        $file_tmp = $_FILES["image"]["tmp_name"];
    }

    if (!isset($_FILES["image"]["name"])) {
        if ($gender == 'M') {
            $file_name = 'avatar1.png';
        } elseif ($gender == 'F') {
            $file_name = 'avatar2.png';
        } else {
            $file_name = 'avatar1.png';
        }
    } else {
        $file_name = date("m" . "d" . "y") . date("h" . "i" . "s" . microtime(TRUE)) . "." . basename($_FILES['image']['type']);
    }

    $imagen_destino = ROOT . FOLDER_PATH . '/src/assets/image/fperfil/';
    move_uploaded_file($file_tmp, $imagen_destino . $file_name);

    $imagen_bd = 'src/assets/image/fperfil/' . $file_name;

    $this->model->guardar_usuario(
        $fname,
        $lname,
        $correo,
        $status,
        $gender,
        $rol_user,
        $supr,
        $imagen_bd,
        $code,
        $password
    );
} else if ($link == 'edit') {

    if (isset($_POST['update'])) {
        @$update = $_POST['update'];
    } else {
        @$update = NULL;
    }

    if ($update == "true") {

        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $correo = $_POST["correo"];
        $status = $_POST["status"];
        $gender = $_POST["gender"];
        $rol_user = $_POST["rol_user"];
        if ($rol_user == '4') {
            $supr = $_POST["supr"];
        } else {
            $supr = '';
        }
        $code = $_POST["code"];
        $password = $_POST["password"];

        if (!isset($_FILES["image"]["tmp_name"])) {
            $file_tmp = '';
        } else {
            $file_tmp = $_FILES["image"]["tmp_name"];
        }

        if (!isset($_FILES["image"]["name"])) {
            if ($gender == 'M') {
                $file_name = 'avatar1.png';
            } elseif ($gender == 'F') {
                $file_name = 'avatar2.png';
            } else {
                $file_name = 'avatar1.png';
            }
        } else {
            $file_name = date("m" . "d" . "y") . date("h" . "i" . "s" . microtime(TRUE)) . "." . basename($_FILES['image']['type']);
        }

        $imagen_destino = ROOT . FOLDER_PATH . '/src/assets/image/fperfil/';
        move_uploaded_file($file_tmp, $imagen_destino . $file_name);

        $imagen_bd = 'src/assets/image/fperfil/' . $file_name;

        $this->model->guardar_usuario(
            $fname,
            $lname,
            $correo,
            $status,
            $gender,
            $rol_user,
            $supr,
            $imagen_bd,
            $code,
            $password
        );

    } else {
        
        $this->datos_usu = $this->model->datos_usuario($this->admin);
        $this->datos_usuario = $this->model->datos_editar_usuario($dato);
        $this->supervisor = $this->model->datos_supervisor();

        $this->AdminView('admin/user/edit/edit', [
            'datos_usu' => $this->datos_usu, 
            'datos_usuario' => $this->datos_usuario,
            'supervisor' => $this->supervisor
        ]);

    }
}
