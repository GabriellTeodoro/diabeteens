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
                                        <h2>Cadastro de Participantes</h2>

                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="col-md-6 col-sm-12 col-xs-12">

                                            <?php
                                            require_once 'model/participantes.php';
                                            $objParticipante = new participante();
                                            $objParticipanteDao = new ParticipantesDAO();
                                            
                                            $idParticipante = (int) filter_input(INPUT_GET, 'idParticipante');
                                            
                                            
                                            $objParticipante->setIdParticipante($idParticipante);
                                            $participante = $objParticipanteDao->listaUm($objParticipante);
                                            ?>
                                            <form class="form-horizontal form-label-left input_mask">
                                                <input type="hidden" value="<?php echo $idParticipante; ?>" name="idParticipante" id="idParticipante" />
                                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback" id="form-group-nome">
                                                    <input type="text" class="form-control has-feedback-left" id="nome" maxlength="50" placeholder="Nome" value="<?php echo $participante['nome']; ?>">
                                                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                                    <label class="control-label" id="label-nome"></label>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback" id="form-group-telefone">
                                                    <input type="text" class="form-control has-feedback-left" id="telefone" placeholder="Telefone" value="<?php echo $participante['telefone']; ?>">
                                                    <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                                                    <label class="control-label" id="label-telefone"></label>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback" id="form-group-foto">
                                                    <input type="file" class="form-control has-feedback-left" id="foto" placeholder="Senha">
                                                    <span class="glyphicon glyphicon-floppy-disk form-control-feedback left" aria-hidden="true"></span>
                                                    <label class="control-label" id="label-foto"></label>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                    <button type="button" id="btnAltParticipante" class="btn btn-primary">Enviar</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-xs-12" id="preview">
                                            <img src="img/participantes/<?php echo $idParticipante; ?>.jpg"
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
        <script src="js/jquery.maskedinput.min.js"></script>
        <script src="js/participantes.js"></script>
    </body>
</html>