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
                                        <h2>Ranking Diário </h2>

                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="row">
                                            <form class="form-horizontal form-label-left input_mask">
                                                <div class="col-md-3 col-sm-10 col-xs-10 form-group has-feedback" id="form-group-dataGlicose" >
                                                    <input type="date" class="form-control has-feedback-left" id="dataRanking" value="<?php echo date('Y-m-d'); ?>" />
                                                    <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                                                </div>
                                                <div class="col-md-1 col-sm-1 col-xs-1">
                                                    <button type="button" class="btn btn-primary right"> <i class="fa fa-search"></i> </button>
                                                </div>
                                        </div>
                                        <table id="listaRankingDia" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Posição</th>
                                                    <th>Nome</th>
                                                    <th>Média</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include_once 'listaRankingdia.php';
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
        <script src="js/ranking.js"></script>
    </body>
</html>
