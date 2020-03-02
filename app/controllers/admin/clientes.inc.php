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
    $firstName = $_POST['fnm'];
    $lastName = $_POST['lnm'];
    $direccion = $_POST['adr'];
    $region = $_POST['reg'];
    $provincia = $_POST['pro'];
    $distrito = $_POST['dis'];
    $celular_s = $_POST['phn_s']; 
    $observacion = $_POST['des']; 

    $this->model->save_cliente(
        $dni,
        $celular,
        $firstName,
        $lastName,
        $direccion,
        $region,
        $provincia,
        $distrito, 
        $celular_s, 
        $observacion 
    );
} else if ($link == 'edit') {
    
    require ROOT . FOLDER_PATH . '/vendor/autoload.php';

    $options = array(
        'cluster' => 'mt1',
        'useTLS' => true
    );
    $pusher = new Pusher\Pusher(
        '5f03dcb0303409e74fd6',
        '409189b3558e85699c89',
        '947052',
        $options
    );
    

    if (isset($_POST['update'])) {
        @$update = $_POST['update'];
    } else {
        @$update = NULL;
    }

    if ($update == "true") {

        $codcliente = $_POST['idv'];
        $dni = $_POST['dni'];
        $celular = $_POST['phn'];
        $firstName = $_POST['fnm'];
        $lastName = $_POST['lnm'];
        $direccion = $_POST['adr'];
        $region = $_POST['reg'];
        $provincia = $_POST['pro'];
        $distrito = $_POST['dis'];
        $celular_s = $_POST['phn_s']; 
        $observacion = $_POST['des']; 

        $this->model->update_cliente(
            $codcliente, 
            $dni, 
            $celular, 
            $firstName, 
            $lastName, 
            $direccion, 
            $region, 
            $provincia, 
            $distrito, 
            $celular_s, 
            $observacion 
        );
        
    
    $this->supervisor = $this->model->obtener_supervisor_ejecutivo($this->admin);
    $data_supervisor = $this->supervisor->fetch();
    
    /* --- Pusher --- */
    $data['prinl'] = 'prl3';
    $data['supr'] = $data_supervisor[0];
    $pusher->trigger('supervisor', 'principal', $data);
    /* - End Pusher - */
    
    } else {
        
        /* $dato = explode('|', base64_decode(utf8_encode($dato))); */
        
        if (isset($_GET['its_ec'])) {
            if ($_GET['its_ec'] == 1) {
                $return_page = $_GET['its_ec'];
            } else {
                $return_page = 0;
            }
        } else {
            $return_page = 0;
        }

        $this->datos_usu = $this->model->datos_usuario($this->admin);
        $this->datos_cliente = $this->model->mostrar_datos_cliente($dato);

        $this->AdminView('admin/clientes/editar/editar', [ 
            'datos_usu' => $this->datos_usu, 
            'datos_cliente' => $this->datos_cliente, 
            'return_page' => $return_page 
        ]);
    }
} else if ($link == 'delete') {

    $codcliente = $_POST['acd'];

    $this->model->delete_cliente(
        $codcliente
    );

}
