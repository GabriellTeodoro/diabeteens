<?php
$url = explode('/', $_SERVER['REQUEST_URI']);
$arquivo = end($url);
?>
    <div class="main-nav">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img class="img-responsive" id="profile" width="80" height="80" src="images/profile.png" alt="logo" style="margin-top: -15px;">
                    <p><strong>Diabeteens</strong></p>
                </a>                    
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">                 
                    <li class="scroll <?php echo ($arquivo == 'index.php') ? 'active' : ''; ?>">
                        <a href="index.php">Home</a></li>
                    <li class="scroll <?php echo ($arquivo == 'ranking-today.php') ? 'active' : ''; ?>">
                        <a href="ranking-today.php">Ranking Diário</a></li> 
                    <li class="scroll <?php echo ($arquivo == 'ranking-general.php') ? 'active' : ''; ?>">
                        <a href="ranking-general.php">Ranking Geral</a>
                    </li>
                    <!--                           -->
                </ul>
            </div>
        </div><!--/#main-nav-->
