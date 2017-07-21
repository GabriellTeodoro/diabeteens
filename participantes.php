<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once 'includes/head.php'; ?>
        <?php require_once 'includes/verificaSessao.php'; ?>
    </head>

    <body class="nav-md">
        <div id="modalDelParticipante" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header alert-danger">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Exclusão de Participantes</h4>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-12 alert-danger">
                                Esta acão é irreversível
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-12" id="emailMensagem">
                                Você tem certeza que deseja excluir o usuário <strong id="nomeParticipanteModal"></strong>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="deleteParticipante">Sim</button>
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title row">
                                    <h2 class="col-xs-11">Listagem de Participantes </h2>

                                    <div class="col-xs-1 text-right">
                                        <a href="cadParticipante.php" class="btn btn-sm btn-success">Cadastrar</a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row">
                                        <div class="clearfix"></div>
                                        <div id="listaParticipantes">
                                            <?php
                                            include_once './listaParticipante.php';
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
                        <h3>Aspecti</h3>
                        ©<?php echo date('Y'); ?> Todos os direitos reservados
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>
        <?php
        include_once 'includes/bodyFooter.php';
        ?>
        <script src="js/participantes.js"></script>
    </body>
</html>
