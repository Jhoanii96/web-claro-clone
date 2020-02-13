<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Módulo de trabajo
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-tv"></i> Principal</a></li>
            <li class="active">Módulo Ejecutivos</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Tabla de ejecutivos</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nro</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>DNI</th>
                                    <th>Ejecutivo</th>
                                    <th>Fecha actualizada</th>
                                    <th>Estado atención</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                while ($row = $data['mostrar_tprincipal3']->fetch()) {

                                    $code = $row[0] . '|' . $row[2];
                                    $code = base64_encode(utf8_encode($code));

                                    if ($row[6] == '1') {
                                        $estado = 'Pendiente';
                                    } elseif ($row[6] == '2') {
                                        $estado = 'Vendido';
                                    } elseif ($row[6] == '3') {
                                        $estado = 'Caído';
                                    }

                                    echo '
                                        <tr>
                                            <td>' . $row[0] . '</td>	
                                            <td>' . $row[1] . '</td>
                                            <td>' . $row[2] . '</td>
                                            <td>' . $row[3] . '</td>
                                            <td>' . $row[4] . '</td>
                                            <td>' . $row[5] . '</td>
                                            <td>' . $estado . '</td>
                                            <td>
                                                <div class="center_cell">
                                                    <button class="ctrl_with btn_style" style="color: #fff" data-toggle="modal" data-target="#exampleModal">
                                                        <span>Detalle</span>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    ';
                                }
                                ?>
                            </tbody>


                            <tfoot>
                                <tr>
                                    <th>Nro</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>DNI</th>
                                    <th>Ejecutivo</th>
                                    <th>Fecha actualizada</th>
                                    <th>Estado atención</th>
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




<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="box-body">

                        <div class="col-md-6">

                            <input style="display:none" type="password" name="fakepasswordremembered" />
                            <input type="text" style="display: none" class="form-control" id="id" name="id" value="">

                            <div class="form-group">
                                <label>DNI</label>
                                <input type="text" class="form-control" pattern="[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]" value="" name="dni" id="dni" maxlength="8" disabled>
                            </div>
                            <div class="form-group">
                                <label>Celular</label>
                                <input type="text" class="form-control" pattern="[0-9 ]+" name="cellphone" value="" id="phone" maxlength="15" disabled>
                            </div>
                            <div class="form-group">
                                <label>Nombres</label>
                                <input type="text" class="form-control" pattern="[A-Za-zÁÉÍÓÚñÑ ]+" style="text-transform: uppercase" value="" name="firstName" id="firstName">
                            </div>
                            <div class="form-group">
                                <label>Apellidos</label>
                                <input type="text" class="form-control" pattern="[A-Za-zÁÉÍÓÚñÑ ]+" style="text-transform: uppercase" value="" name="lastName" id="lastName">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Dirección</label>
                                <input type="text" class="form-control" value="" name="address" id="address">
                            </div>
                            <div class="form-group">
                                <label>Región</label>
                                <input type="text" class="form-control" name="region" value="" id="region">
                            </div>
                            <div class="form-group">
                                <label>Provincia</label>
                                <input type="text" class="form-control" name="prov" value="" id="prov">
                            </div>
                            <div class="form-group">
                                <label>Distrito</label>
                                <input type="text" class="form-control" name="dist" value="" id="dist">
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
</div>