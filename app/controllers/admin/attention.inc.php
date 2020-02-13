<?php
/* 
    
    AUTOR DE PROGRAMACIÓN PHP: 
    JHON ALVARADO ACHATA
    
*/

if ($link == '') {
} elseif ($link == 's_in') {

    $value = $_POST['novl'];
    $code = $_POST['code'];

    $this->model->actualizar_atencion($value, $code);

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
                '<a style="color: #fff" href="' . FOLDER_PATH . '/atencion/hide/' . $code . '">',
                    '<span class="ctrl_with btn_style">X (Ocultar)</span>',
                ',</a>',
            '</div>\']);';
        
        }

    }



    /* while ($row = $this->mostrar_tprincipal4->fetch()) {
        
        $code = $row[0] . '|' . $row[2];
        $code = base64_encode(utf8_encode($code));

        echo 'dataTable.fnAddData([
        \'' . $row[0] . '\',
        \'' . $row[1] . '\',
        \'' . $row[2] . '\',
        \'' . $row[3] . '\',
        \'<div class="center_cell">
            <a style="color: #fff" href="' . FOLDER_PATH . '/admin/clientes/edit/' . $code . '">
                <span class="ctrl_with btn_style">Editar</span>
            </a>
        </div>\',
        \'<div class="center_cell">
            <select name="status" id="data-status-' . $row[0] . '" class="ctrl_with btn_style" onchange="selectStatus(' . $row[0] . ')">
            ';
            if ($row[6] == '1') {
                echo '
                <option value="1" selected>Pendiente</option>
                <option value="2">Vendido</option>
                <option value="3">Caído</option>
                ';
            } elseif ($row[6] == '2') {
                echo '
                <option value="1">Pendiente</option>
                <option value="2" selected>Vendido</option>
                <option value="3">Caído</option>
                ';
            } elseif ($row[6] == '3') {
                echo '
                <option value="1">Pendiente</option>
                <option value="2">Vendido</option>
                <option value="3" selected>Caído</option>
                ';
            }
            echo '
            </select>
        </div>\'
        ]);';
    } */

    echo '</script>';
}
