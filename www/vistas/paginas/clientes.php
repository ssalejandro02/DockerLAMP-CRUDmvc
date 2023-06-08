<div class="content-wrapper" style="min-height: 717px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>CLIENTES</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <button type="button" class="btn btn-success crear-cliente" data-toggle="modal"
                                    data-target="#modal-crear-clientes">
                                Nuevo Cliente
                            </button>
                            <br>
                        </div>
                        <br>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped dt-responsive tablaClientes" width="100%">
                                <thead>
                                <tr>
                                    <th style="width:10px">#</th>
                                    <th>Nombre</th>
                                    <th>Primer Apellido</th>
                                    <th>Segundo Apellido</th>
                                    <th>Localidad</th>
                                    <th>Provincia</th>
                                    <th>CP</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                foreach ($clientes as $key => $value) {
                                    ?>

                                    <tr>
                                        <td><?php echo($key + 1) ?></td>
                                        <td><?php echo $value["nombre"] ?></td>
                                        <td><?php echo $value["apellido1"] ?></td>
                                        <td><?php echo $value["apellido2"] ?></td>
                                        <td><?php echo $value["localidad"] ?></td>
                                        <td><?php echo $value["provincia"] ?></td>
                                        <td><?php echo $value["cp"] ?></td>
                                        <td>
                                            <div class='btn-group'>
                                                <button class="btn btn-warning btn-sm btnEditarClientes"
                                                        data-toggle="modal" idCliente="<?php echo $value["id"] ?>"
                                                        data-target="#modal-editar-cliente">
                                                    <i class="fas fa-pencil-alt text-white"></i>
                                                </button>
                                                <button class="btn btn-danger btn-sm eliminarCliente"
                                                        idClienteE="<?php echo $value["id"] ?>" ?>
                                                    <i class=" fas fa-trash-alt"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal crear clientes -->

<div class="modal modal-default fade" id="modal-crear-clientes">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="alert alert-success alert-dismissible ">Agregar Nuevo Cliente</h4>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group has-feedback" bis_skin_checked="1">
                        <input type="text" class="form-control" name="nom_cliente" placeholder="Nombre de cliente"><br>
                        <input type="text" class="form-control" name="ap1_cliente" placeholder="Primer apellido"><br>
                        <input type="text" class="form-control" name="ap2_cliente" placeholder="Segundo apellido"><br>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback" bis_skin_checked="1">
                        <input type="text" class="form-control" name="loc_cliente" placeholder="Localidad"><br>
                        <input type="text" class="form-control" name="prov_cliente" placeholder="Provincia"><br>
                        <input type="text" class="form-control" name="cp_cliente" placeholder="CP"><br>
                        <span class="glyphicon glyphicon-home form-control-feedback"></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    <?php
                    $guardarCliente = new ctrClientes();
                    $guardarCliente->ctrGuardarClientes();
                    ?>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Modal editar cliente -->

<div class="modal modal-default fade" id="modal-editar-cliente">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="alert alert-success alert-dismissible ">Editar Cliente</h4>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group has-feedback" bis_skin_checked="1">
                        <input type="hidden" name="id_clienteE">
                        <input type="hidden" id="id_clienteE" name="id_clienteE">
                        <input type="text" class="form-control" id="nom_clienteE" name="nom_clienteE" placeholder="Nombre de cliente"><br>
                        <input type="text" class="form-control" id="ap1_clienteE" name="ap1_clienteE" placeholder="Primer apellido"><br>
                        <input type="text" class="form-control" id="ap2_clienteE" name="ap2_clienteE" placeholder="Segundo apellido"><br>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback" bis_skin_checked="1">
                        <input type="text" class="form-control" id="loc_clienteE" name="loc_clienteE" placeholder="Localidad"><br>
                        <input type="text" class="form-control" id="prov_clienteE" name="prov_clienteE" placeholder="Provincia"><br>
                        <input type="text" class="form-control" id="cp_clienteE" name="cp_clienteE" placeholder="CP"><br>
                        <span class="glyphicon glyphicon-home form-control-feedback"></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                    <?php
                    $editarCliente = new ctrClientes();
                    $editarCliente->ctrEditarCliente();
                    ?>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

