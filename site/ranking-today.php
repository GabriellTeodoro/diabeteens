<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php require_once 'includes/head.php'; ?>
        <style type="text/css">
            input#dataRanking {
                border: 1px solid #ccc;
            }

            input#dataRanking:hover {
                background-color: #fbfbfb;
                cursor: pointer;
            }


            table {
                border-collapse: separate;
                border-spacing: 0 5px;
            }

            .row.th {
                background-color: #028fcc;
                color: white;
            }

            .row.td {
                /*background-color: #5cb85c;
                border-collapse: separate;
                border-spacing: 0 5px;
                vertical-align: central;
                */
            }
        </style>
    </head><!--/head-->

    <body>

        <!--.preloader-->
        <div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i></div>
        <!--/.preloader-->
        <header>
            <?php
            require_once 'includes/menu.php';
            ?>
        </header><!--/#home-->
    </div>

    <section id="services">
        <div class="container">
            <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay=" 300ms">
                <div class="row">
                    <div class="text-center col-sm-8 col-sm-offset-2">
                        <h1><strong>Ranking Diário:</strong></h1><br>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12 text-left">
                                    <div class="input-group date col-md-1 col-xs-9 pull-left">
                                        <input type="date" id="dataRanking" class="form-control" value="<?php echo date("Y-m-d"); ?>">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-calendar"></i>
                                        </span>
                                        <div class="col-md-1 col-xs-3">
                                            <button type="button" class="btn btn-primary right"> <i class="fa fa-search"></i> </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
<!--                                        <table id="listaRankingDia" style="font-size: 19px;" class="table">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Posição</th>
                                                    <th class="text-left">Participantes</th>
                                                    <th class="text-center">Médias</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                    <?php // require_once 'listaRankingdia.php'; ?>
                                            </tbody>
                                        </table>-->

                                    <div id="listaRankingDia">
                                        <div class="row th" style="font-size: 19px;">
                                            <div class="text-center col col-xs-2">Posição</div>
                                            <div class="text-left 8 col-xs-8">Participante</div>
                                            <div class="text-center col-xs-2 col-sm-2">Média</div>
                                        </div>
                                        <div class="row td bg-success">
                                            <div class="col-xs-2 ">1º</div>
                                            <div class="col-xs-8 text-left">
                                                <img src='http://desafiodt-paulosergioxavier-xyz.umbler.net/img/participantes/1.jpg' width="160" height="160" style="margin-right: 10px" class="hidden-sm hidden-xs" />
                                                Paulo Sergio
                                            </div>
                                            <div class="col-xs-2">90</div>
                                        </div>
                                        <div class="row td bg-success">
                                            <div class="col-xs-2">2º</div>
                                            <div class="col-xs-8 text-left">Daniel</div>
                                            <div class="col-xs-2">99</div>
                                        </div>
                                        <div class="row td bg-success">
                                            <div class="col-xs-2">3º</div>
                                            <div class="col-xs-8 text-left">Gabriel</div>
                                            <div class="col-xs-2">101</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <hr><!--border-->

    </section>
    <!--        <section id="about-us" class="parallax">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
    
                    <div class="about-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                        <h2>Um mundo sem barreiras.</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>-->

    <?php
    require_once 'includes/bodyfooter.php';
    ?>
    <script src="js/ranking.js" type="text/javascript"></script>
</body>
</html>