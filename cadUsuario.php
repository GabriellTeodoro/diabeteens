<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once 'includes/head.php'; ?>
        <?php require_once 'includes/verificaSessao.php'; ?>
    </head>

    <body class="nav-md">
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
                                    <div class="x_title">
                                        <h2>Cadastro de Usuários </h2>

                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <form class="form-horizontal form-label-left input_mask">
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" id="form-group-nomeUsuario">
                                                <input type="text" class="form-control has-feedback-left" id="nomeUsuario" placeholder="Nome">
                                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                                <label class="control-label" id="label-nomeUsuario"></label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" id="form-group-emailUsuario">
                                                <input type="text" class="form-control has-feedback-left" id="emailUsuario" placeholder="Email">
                                                <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                                <label class="control-label" id="label-emailUsuario"></label>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback" id="form-group-senhaUsuario">
                                                <input type="password" class="form-control has-feedback-left" id="senhaUsuario" placeholder="Senha">
                                                <span class="glyphicon glyphicon-floppy-disk form-control-feedback left" aria-hidden="true"></span>
                                                <label class="control-label" id="label-senhaUsuario"></label>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                <button type="button" id="btnCadUsuario" class="btn btn-primary">Enviar</button>
                                            </div>
                                        </form>
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
        <script src="js/usuarios.js"></script>
    </body>
</html>
