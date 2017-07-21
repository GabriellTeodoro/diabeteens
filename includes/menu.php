
<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="principal.php" class="site_title">
                <img src="img/logo.jpeg" width="40" height="40" />
                <span>Diabeteens</span>
            </a>
        </div>

        <div class="clearfix"></div>
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">

                    <li>
                        <a href="principal.php"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <li>
                        <a href="participantes.php"><i class="fa fa-users"></i> Paricipantes</a>
                    </li>
                    <li>
                        <a href="usuarios.php"><i class="fa fa-user"></i> Usuários </a>
                    </li>
                    <li>
                        <a><i class="fa fa-trophy"></i> Ranking <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="rankingDia.php">Por dia</a></li>
                            <li><a href="rankingGeral.php">Geral</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu2">
        <nav class="" role="navigation">
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <?php // echo $_SESSION['nome']; ?>
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="altUsuario.php?idUsuario=<?php echo $_SESSION['idUsuario']; ?>">Alterar</a></li>
                        <li><a href="includes/sair.php"><i class="fa fa-sign-out pull-right"></i> Sair</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->