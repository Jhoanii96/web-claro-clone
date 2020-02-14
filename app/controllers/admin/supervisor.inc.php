<?php
/* 
    
    AUTOR DE PROGRAMACIÓN PHP: 
    JHON ALVARADO ACHATA
    
*/

if ($link == '') {
} elseif ($link == 'change') {

    /* --- Auto-carga table --- */

    $this->session = new Session;
    $this->session->getAll();

    $this->model = new adminModel();
    $this->mostrar_tprincipal3 = $this->model->mostrar_tprincipal3($this->admin);

    echo '<script type="text/javascript">', '';


    echo 'var dataTable = $(\'#example1\').dataTable();',
        'dataTable.fnClearTable();';


    while ($row = $this->mostrar_tprincipal3->fetch()) {

        $code = $row[0] . '|' . $row[2];
        $code = base64_encode(utf8_encode($code));

        if ($row[6] == '1') {
            $estado = 'Pendiente';
        } elseif ($row[6] == '2') {
            $estado = 'Vendido';
        } elseif ($row[6] == '3') {
            $estado = 'Caído';
        }

        if ($row[7] == '1') {

            echo 'dataTable.fnAddData([
            \'' . $row[0] . '\',
            \'' . $row[1] . '\',
            \'' . $row[2] . '\',
            \'' . $row[3] . '\',
            \'' . $row[4] . '\',
            \'' . $row[5] . '\',
            \'' . $estado . '\',
            \'<div class="center_cell">',
                '<button class="ctrl_with btn_style" style="color: #fff" data-toggle="modal" data-target="#info-' . $row[0] . '">',
                '<span>Detalle</span>',
                ',</button>',
                '</div>\']);';
        }
    }

    echo '</script>';
} elseif ($link == 'modals') {

    /* --- Auto-carga table --- */

    $this->session = new Session;
    $this->session->getAll();

    $this->model = new adminModel();
    $this->mostrar_datencion = $this->model->mostrar_datencion($this->admin);

    while ($row = $data['mostrar_datencion']->fetch()) {

        if ($row[6] == '1') {
            $estado = 'Pendiente';
        } elseif ($row[6] == '2') {
            $estado = 'Vendido';
        } elseif ($row[6] == '3') {
            $estado = 'Caído';
        }


        echo '
        <div class="modal fade" id="info-' . $row[0] . '" tabindex="-1" role="dialog" aria-labelledby="info_label" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="display: inline-block;">Datos completo del cliente: ' . $row[1] . ' ' . $row[2] . '</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="display: inline-block;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form autocomplete="false" novalidate>
                            
                            <input style="display:none" type="password" name="fakepasswordremembered" />
                            <input type="text" style="display: none" class="form-control" id="id" name="id" value="">
        
                            <div class="box-body">
        
                                <div class="col-md-6">
        
                                    
        
                                    <div class="form-group">
                                        <label>Nombres</label>
                                        <input type="text" class="form-control" pattern="[A-Za-zÁÉÍÓÚñÑ ]+" style="text-transform: uppercase" value="' . $row[1] . '">
                                    </div>
                                    <div class="form-group">
                                        <label>Apellidos</label>
                                        <input type="text" class="form-control" pattern="[A-Za-zÁÉÍÓÚñÑ ]+" style="text-transform: uppercase" value="' . $row[2] . '">
                                    </div>
                                    <div class="form-group">
                                        <label>DNI</label>
                                        <input type="text" class="form-control" pattern="[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]" value="' . $row[3] . '" maxlength="8">
                                    </div>
                                    <div class="form-group">
                                        <label>Celular</label>
                                        <input type="text" class="form-control" pattern="[0-9 ]+" value="' . $row[4] . '" maxlength="15">
                                    </div>
                                    <div class="form-group">
                                        <label>Dirección</label>
                                        <input type="text" class="form-control" value="' . $row[5] . '">
                                    </div>
                                    <div class="form-group">
                                        <label>Región</label>
                                        <input type="text" class="form-control" value="' . $row[6] . '">
                                    </div>
                                </div>
        
                                <div class="col-md-6">
                                    
                                    <div class="form-group">
                                        <label>Provincia</label>
                                        <input type="text" class="form-control" value="' . $row[7] . '">
                                    </div>
                                    <div class="form-group">
                                        <label>Distrito</label>
                                        <input type="text" class="form-control" value="' . $row[8] . '">
                                    </div>
                                    <div class="form-group">
                                        <label>Usuario ejecutivo</label>
                                        <input type="text" class="form-control" value="' . $row[9] . '">
                                    </div>
                                    <div class="form-group">
                                        <label>Fecha registro del cliente</label>
                                        <input type="text" class="form-control" value="' . $row[10] . '">
                                    </div>
                                    <div class="form-group">
                                        <label>Fecha atención del ejecutivo</label>
                                        <input type="text" class="form-control" value="' . $row[11] . '">
                                    </div>
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <input type="text" class="form-control" value="' . $estado . '">
                                    </div>
        
                                </div>
        
        
        
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" style="background-color: #1b218e; color: #fff; border-radius: 0;" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>';
    }
}
