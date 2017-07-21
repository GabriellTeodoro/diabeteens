<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once 'includes/head.php'; ?>
        <?php require_once 'includes/verificaSessao.php'; ?>
    </head>

    <body class="nav-md">

        <div id="modalDelUsuario" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header alert-danger">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Exclusão de Usuário</h4>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-12 alert-danger">
                                Esta acão é irreversível
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-12" id="emailMensagem">
                                Você tem certeza que deseja excluir o usuário <strong id="nomeUsuarioModal"></strong>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="deleteUsuario">Sim</button>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Não</button>
                    </div>
                </div>

            </div>
        </div>
        <div class="container body">
            <div class="main_container">

                <?php include_once 'includes/menu.php'; ?>

                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="clearfix"></div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title row">
                                    <h2 class="col-xs-11">Listagem de Usuários</h2>

                                    <div class="col-xs-1 text-right">
                                        <a href="cadUsuario.php" class="btn btn-sm btn-success">Cadastrar</a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                    <div class="clearfix"></div>
                                    <div class="x_content">
                                        <div class="row">
                                        <div class="clearfix"></div>
                                        <?php
                                        include_once 'listaUsuarios.php';
                                        ?>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /page content -->

                <!-- footer content -->
                <footer>
                    <div class="pull-right">
                        &nbsp;
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>
        <?php
        include_once 'includes/bodyFooter.php';
        ?>
        <!-- Datatables -->
        <link href="js/datatables/media/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="js/datatables/media/css/jquery.dataTables_themeroller.css" rel="stylesheet" type="text/css"/>
        <link href="js/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>

        <script src="js/datatables/media/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="js/usuarios.js" type="text/javascript"></script>
    </body>
</html>
