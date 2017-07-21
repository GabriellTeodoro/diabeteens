<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once 'includes/head.php'; ?>
        <?php require_once 'includes/verificaSessao.php'; ?>
    </head>

    <body class="nav-md">
        <div id="modalGlicose" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <form class="form-horizontal form-label-left input_mask">
                                <input type="hidden" id="idParticipante" />
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback" id="form-group-dataGlicose" >
                                    <input type="date" class="form-control has-feedback-left"  id="dataGlicose" />
                                    <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                                    <label class="control-label" id="label-dataGlicose"></label>
                                </div>

                                <div class="col-md-4 col-sm-12 col-xs-12 form-group has-feedback" id="form-group-glicose_0">
                                    <input type="text" class="form-control has-feedback-left" name="camposGlicose" id="glicose_0" data-id="0" />
                                    <span class="fa fa-heart form-control-feedback left" aria-hidden="true"></span>
                                    <label class="control-label" id="label-glicose_0"></label>
                                </div>

                                <div class="col-md-4 col-sm-12 col-xs-12 form-group has-feedback" id="form-group-glicose_1">
                                    <input type="text" class="form-control has-feedback-left" name="camposGlicose" id="glicose_1" data-id="0" />
                                    <span class="fa fa-heart form-control-feedback left" aria-hidden="true"></span>
                                    <label class="control-label" id="label-glicose_1"></label>
                                </div>

                                <div class="col-md-4 col-sm-12 col-xs-12 form-group has-feedback" id="form-group-glicose_2">
                                    <input type="text" class="form-control has-feedback-left" name="camposGlicose" id="glicose_2" data-id="0" />
                                    <span class="fa fa-heart form-control-feedback left" aria-hidden="true"></span>
                                    <label class="control-label" id="label-glicose_2"></label>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" >Salvar</button>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Fechar</button>
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
                                    <div class="x_title">
                                        <h2>Listagem de Participantes <small>(glicoses do dia)</small> </h2>

                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <table id="listaParticipantesGlicemia" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>Glicoses</th>
                                                    <th>Dias</th>
                                                    <th>Operações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include_once 'listaPrincipal.php';
                                                ?>
                                            </tbody>
                                        </table>
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
        <!--<script src="js/principal.js"></script>-->
    </body>
</html>
