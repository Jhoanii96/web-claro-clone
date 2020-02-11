<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Módulo de trabajo
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-tv"></i> Principal</a></li>
            <li class="active">Módulo cliente reciente</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Listado de clientes &MediumSpace;<span style="background-color: #007a80;color: white;font-size: 14px;">&MediumSpace;Por atender&MediumSpace;</span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nro</th>
                                    <th>Nombre</th>
                                    <th>DNI</th>
                                    <th>Celular</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                while ($row = $data['mostrar_tprincipal4']->fetch()) {

                                    $code = $row[0] . '|' . $row[2];
                                    $code = base64_encode(utf8_encode($code));

                                    echo '
                                        <tr>
                                            <td>' . $row[0] . '</td>	
                                            <td>' . $row[1] . '</td>
                                            <td>' . $row[2] . '</td>
                                            <td>' . $row[3] . '</td>
                                            <td class="center_cell">
                                                <a style="color: #fff" href="' . FOLDER_PATH . '/admin/clientes/edit/' . $code . '">
                                                    <span class="ctrl_with btn_style">Editar</span>
                                                </a>
                                            </td>
                                            <td class="center_cell">
                                                <select name="status" id="data-status-' . $row[0] . '" class="ctrl_with btn_style" onchange="selectStatus(' . $row[0] . ')">
                                                    <option value="Pendiente">Pendiente</option>
                                                    <option value="Vendido">Vendido</option>
                                                    <option value="Caído">Caído</option>
                                                </select>
                                            </td>
                                            <td class="center_cell"><a style="color: #fff" href="' . FOLDER_PATH . '/atencion/hide/' . $code . '"><span class="ctrl_with btn_style">X (Ocultar)</span></a>
                                        ';
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nro</th>
                                    <th>Nombre</th>
                                    <th>DNI</th>
                                    <th>Celular</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->





    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

