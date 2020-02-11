<?php
/* 
    
    AUTOR DE PROGRAMACIÓN PHP: 
    JOSUE ALDAIR MAMANI CARIAPAZA
    
*/

$this->model = new adminModel();

if ($link == '') {

    $this->table_user = $this->model->mostrar_tusuario();

    $this->AdminView('admin/user/user', [
        'datos_usu' => $this->datos_usu,
        'table_user' => $this->table_user
    ]);
} else if ($link == 'save') {
    //insertamos el organizador
    $firstName = strtoupper($_POST['firstName']);
    $lastName = strtoupper($_POST['lastName']);
    $email = $_POST['correo'];
    $dni = $_POST['dni'];
    $contact_point = $_POST['contact_point'];

    $file_name = $_FILES['image']['name'];
    $file_type = $_FILES['image']['type'];
    $file_size = $_FILES['image']['size'];

    $file_tmp = $_FILES['image']['tmp_name'];
    $imagen_destino = ROOT . FOLDER_PATH . '/src/assets/media/image/';
    move_uploaded_file($file_tmp, $imagen_destino . $file_name);

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
    echo ("<script>location.href = '" . FOLDER_PATH . "/admin/organizers';</script>");

} else if ($link == 'edit') {

    if (isset($_POST['update'])) {
        @$update = $_POST['update'];
    } else {
        @$update = NULL;
    }

    if ($update == "true") {

        $codcliente = $_POST['cd'];
        $dni = $_POST['dni'];
        $celular = $_POST['phone'];
        $firstName = strtoupper(utf8_encode($_POST['fName']));
        $lastName = strtoupper(utf8_encode($_POST['LName']));
        $direccion = $_POST['dir'];
        $region = $_POST['reg'];
        $provincia = $_POST['pro'];
        $distrito = $_POST['dis'];

        $datosCliente = new Cliente($codcliente, $dni, $celular, $firstName, 
            $lastName, $direccion, $region, $provincia, $distrito);

        $this->model->update_cliente($datosCliente);

        sleep(1);
        echo ("<script>location.href = '" . FOLDER_PATH . "/admin/';</script>");
    
    } else {

        $this->datos_cliente = $this->model->mostrar_datos_cliente($dato);

        $this->AdminView('admin/cliente/editar/editar', [
            'datos_usu' => $this->datos_usu,
            'datos_cliente' => $this->datos_cliente
        ]);
    }
}


