<?php
/* 
    
    AUTOR DE PROGRAMACIÓN PHP: 
    JHON ALVARADO ACHATA
    
*/

if ($link == '') {

    $this->datos_usu = $this->model->datos_usuario($this->admin);
    $this->table_cliente = $this->model->mostrar_tcliente($this->admin);

    $this->AdminView('admin/clientes/clientes', [
        'datos_usu' => $this->datos_usu,
        'table_cliente' => $this->table_cliente
    ]);
} else if ($link == 'save') {

    $dni = $_POST['dni'];
    $celular = $_POST['phn'];
    $firstName = strtoupper(utf8_encode($_POST['fnm']));
    $lastName = strtoupper(utf8_encode($_POST['lnm']));
    $direccion = $_POST['adr'];
    $region = $_POST['reg'];
    $provincia = $_POST['pro'];
    $distrito = $_POST['dis'];

    /* $datosCliente = new Cliente(
        0,
        $dni,
        $celular,
        $firstName,
        $lastName,
        $direccion,
        $region,
        $provincia,
        $distrito
    ); */

    $this->model->save_cliente(
        $dni,
        $celular,
        $firstName,
        $lastName,
        $direccion,
        $region,
        $provincia,
        $distrito
    );
} else if ($link == 'edit') {

    if (isset($_POST['update'])) {
        @$update = $_POST['update'];
    } else {
        @$update = NULL;
    }

    if ($update == "true") {

        $codcliente = $_POST['idv'];
        $dni = $_POST['dni'];
        $celular = $_POST['phn'];
        $firstName = strtoupper(utf8_encode($_POST['fnm']));
        $lastName = strtoupper(utf8_encode($_POST['lnm']));
        $direccion = $_POST['adr'];
        $region = $_POST['reg'];
        $provincia = $_POST['pro'];
        $distrito = $_POST['dis'];

        /* $datosCliente = new Cliente(
            $codcliente,
            $dni,
            $celular,
            $firstName,
            $lastName,
            $direccion,
            $region,
            $provincia,
            $distrito
        ); */

        $this->model->update_cliente(
            $codcliente,
            $dni,
            $celular,
            $firstName,
            $lastName,
            $direccion,
            $region,
            $provincia,
            $distrito
        );
    } else {

        $dato = explode('|', base64_decode(utf8_encode($dato)));

        $this->datos_usu = $this->model->datos_usuario($this->admin);
        $this->datos_cliente = $this->model->mostrar_datos_cliente($dato[0]);

        $this->AdminView('admin/clientes/editar/editar', [
            'datos_usu' => $this->datos_usu,
            'datos_cliente' => $this->datos_cliente
        ]);
    }
} else if ($link == 'delete') {

    $codcliente = $_POST['acd'];

    $this->model->delete_cliente(
        $codcliente
    );

}
