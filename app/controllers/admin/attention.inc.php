<?php
/* 
    
    AUTOR DE PROGRAMACIÓN PHP: 
    JHON ALVARADO ACHATA
    
*/

if ($link == '') {
} elseif ($link == 's_in') {

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

    $value = $_POST['novl'];
    $code = $_POST['code'];

    $this->model->actualizar_atencion($value, $code);

    /* --- Auto-carga table --- */

    $this->session = new Session;
    $this->session->getAll();

    $this->model = new adminModel();
    $this->mostrar_tprincipal4 = $this->model->mostrar_tprincipal4($this->admin);

    echo '<script type="text/javascript">', '';


    echo 'var dataTable = $(\'#example1\').dataTable();',
        'dataTable.fnClearTable();';


    while ($row = $this->mostrar_tprincipal4->fetch()) {
        
        $code = $row[0] . '|' . $row[2];
        $code = base64_encode(utf8_encode($code));

        if($row[7] == '1') {

            echo 'dataTable.fnAddData([
            \'' . $row[0] . '\',
            \'' . $row[1] . '\',
            \'' . $row[2] . '\',
            \'' . $row[3] . '\',
            \'<div class="center_cell">',
                '<a style="color: #fff" href="' . FOLDER_PATH . '/admin/clientes/edit/' . $code . '">',
                    '<span class="ctrl_with btn_style">Editar</span>',
                '</a>',
            '</div>\',
            \'<div class="center_cell">',
                '<select name="status" id="data-status-' . $row[0] . '" class="ctrl_with btn_style" onchange="selectStatus(' . $row[0] . ')">',
                '';
                if ($row[6] == '1') {
                    echo '<option value="1" selected>Pendiente</option>',
                    '<option value="2">Vendido</option>',
                    '<option value="3">Caído</option>',
                    '';
                } elseif ($row[6] == '2') {
                    echo '<option value="1">Pendiente</option>',
                    '<option value="2" selected>Vendido</option>',
                    '<option value="3">Caído</option>',
                    '';
                } elseif ($row[6] == '3') {
                    echo '<option value="1">Pendiente</option>',
                    '<option value="2">Vendido</option>',
                    '<option value="3" selected>Caído</option>',
                    '';
                }
                echo '</select>',
            '</div>\',
            \'<div class="center_cell">',
                '<button class="ctrl_with btn_style" id="data-hide-' . $row[0] . '" style="color: #fff" onclick="statusHide(' . $row[0] . ')">',
                    '<span>X (Ocultar)</span>',
                '</button>',
            '</div>\']);';
        
        }

    }

    echo '</script>';

    /* --- Pusher --- */
    $data['prinl'] = 'prl3';
    $data['supr'] = $this->admin;
    $pusher->trigger('supervisor', 'principal', $data);
    /* - End Pusher - */


} elseif ($link == 'list') {

    $this->session = new Session;
    $this->session->getAll();

    $this->model = new adminModel();
    $this->mostrar_tprincipal4 = $this->model->mostrar_tprincipal4($this->admin);

    echo '<script type="text/javascript">', '';


    echo 'var dataTable = $(\'#example1\').dataTable();',
        'dataTable.fnClearTable();';


    while ($row = $this->mostrar_tprincipal4->fetch()) {
        
        $code = $row[0] . '|' . $row[2];
        $code = base64_encode(utf8_encode($code));

        if($row[7] == '1') {

            echo 'dataTable.fnAddData([
            \'' . $row[0] . '\',
            \'' . $row[1] . '\',
            \'' . $row[2] . '\',
            \'' . $row[3] . '\',
            \'<div class="center_cell">',
                '<a style="color: #fff" href="' . FOLDER_PATH . '/admin/clientes/edit/' . $code . '">',
                    '<span class="ctrl_with btn_style">Editar</span>',
                '</a>',
            '</div>\',
            \'<div class="center_cell">',
                '<select name="status" id="data-status-' . $row[0] . '" class="ctrl_with btn_style" onchange="selectStatus(' . $row[0] . ')">',
                '';
                if ($row[6] == '1') {
                    echo '<option value="1" selected>Pendiente</option>',
                    '<option value="2">Vendido</option>',
                    '<option value="3">Caído</option>',
                    '';
                } elseif ($row[6] == '2') {
                    echo '<option value="1">Pendiente</option>',
                    '<option value="2" selected>Vendido</option>',
                    '<option value="3">Caído</option>',
                    '';
                } elseif ($row[6] == '3') {
                    echo '<option value="1">Pendiente</option>',
                    '<option value="2">Vendido</option>',
                    '<option value="3" selected>Caído</option>',
                    '';
                }
                echo '</select>',
            '</div>\',
            \'<div class="center_cell">',
                '<button class="ctrl_with btn_style" id="data-hide-' . $row[0] . '" style="color: #fff" onclick="statusHide(' . $row[0] . ')">',
                    '<span>X (Ocultar)</span>',
                '</button>',
            '</div>\']);';
        
        }

    }

    echo '</script>';


} elseif ($link == 'hide') {

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

    $code = $_POST['code'];

    $this->model->ocultar_atencion($code);

    /* --- Auto-carga table --- */

    $this->session = new Session;
    $this->session->getAll();

    $this->model = new adminModel();
    $this->mostrar_tprincipal4 = $this->model->mostrar_tprincipal4($this->admin);

    echo '<script type="text/javascript">', '';


    echo 'var dataTable = $(\'#example1\').dataTable();',
        'dataTable.fnClearTable();';


    while ($row = $this->mostrar_tprincipal4->fetch()) {
        
        $code = $row[0] . '|' . $row[2];
        $code = base64_encode(utf8_encode($code));

        if($row[7] == '1') {

            echo 'dataTable.fnAddData([
            \'' . $row[0] . '\',
            \'' . $row[1] . '\',
            \'' . $row[2] . '\',
            \'' . $row[3] . '\',
            \'<div class="center_cell">',
                '<a style="color: #fff" href="' . FOLDER_PATH . '/admin/clientes/edit/' . $code . '">',
                    '<span class="ctrl_with btn_style">Editar</span>',
                '</a>',
            '</div>\',
            \'<div class="center_cell">',
                '<select name="status" id="data-status-' . $row[0] . '" class="ctrl_with btn_style" onchange="selectStatus(' . $row[0] . ')">',
                '';
                if ($row[6] == '1') {
                    echo '<option value="1" selected>Pendiente</option>',
                    '<option value="2">Vendido</option>',
                    '<option value="3">Caído</option>',
                    '';
                } elseif ($row[6] == '2') {
                    echo '<option value="1">Pendiente</option>',
                    '<option value="2" selected>Vendido</option>',
                    '<option value="3">Caído</option>',
                    '';
                } elseif ($row[6] == '3') {
                    echo '<option value="1">Pendiente</option>',
                    '<option value="2">Vendido</option>',
                    '<option value="3" selected>Caído</option>',
                    '';
                }
                echo '</select>',
            '</div>\',
            \'<div class="center_cell">',
                '<button class="ctrl_with btn_style" id="data-hide-' . $row[0] . '" style="color: #fff" onclick="statusHide(' . $row[0] . ')">',
                    '<span>X (Ocultar)</span>',
                '</button>',
            '</div>\']);';
        
        }

    }

    echo '</script>';

    /* --- Pusher --- */
    $data['prinl'] = 'prl3';
    $data['supr'] = $this->admin;
    $pusher->trigger('supervisor', 'principal', $data);
    /* - End Pusher - */
    

}
