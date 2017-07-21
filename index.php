<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once 'includes/head.php'; ?>
    </head>

    <body class="login">
        <div>
            <a class="hiddenanchor" id="signup"></a>
            <a class="hiddenanchor" id="signin"></a>

            <div class="login_wrapper">
                <div class="animate form login_form">
                    <section class="login_content">
                        <form>
                            <h1>Login</h1>
                            <div id="form-group-emailLogin" class="form-group">
                                <input type="text" class="form-control" placeholder="Email" id="emailLogin" />
                                <span class="glyphicon form-control-feedback" id="icon-emailLogin" aria-hidden="true"></span>
                                <label class="control-label" id="label-emailLogin"></label>
                            </div>
                            <div id="form-group-senhaLogin" class="form-group">
                                <input type="password" class="form-control" placeholder="Senha" id="senhaLogin" />
                                <span class="glyphicon form-control-feedback" id="icon-senhaLogin" aria-hidden="true"></span>
                                <label class="control-label" id="label-senhaLogin"></label>
                            </div>
                           <div>
                                <a class="btn btn-default submit" href="#" id="btnLoginIndex">Logar</a>
                                <a class="reset_pass to_esqueciSenha" href="#signup">Esqueceu a senha?</a>
                            </div>

                            <div class="clearfix"></div>

                            <div class="separator">
                                <div>
                                    <h1>Aspecti</h1>
                                    <p>©<?php echo date('Y'); ?> Todos os direitos reservados</p>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>

                <div id="esqueciSenha" class="animate form registration_form">
                    <section class="login_content">
                        <form>
                            <h1>Lembrar senha</h1>
                            <div id="form-group-emailLembrarSenha" class="form-group">
                                <input type="email" class="form-control" placeholder="Email" id="emailLembrarSenha" />
                                <span class="glyphicon form-control-feedback" id="icon-emailLembrarSenha" aria-hidden="true"></span>
                                <label class="control-label" id="label-emailLembrarSenha"></label>
                            </div>
                            <div>
                                <a class="btn btn-default submit" href="javascript:btnEsqueceuSenha()">Enviar</a>
                            </div>

                            <div class="clearfix"></div>

                            <div class="separator">
                                <p class="change_link">Já é um usuário ?
                                    <a href="#signin" class="to_register"> Logar </a>
                                </p>

                                <div class="clearfix"></div>
                                <br />

                                <div>
                                    <h1>Aspecti</h1>
                                    <p>©<?php echo date('Y'); ?> Todos os direitos reservados</p>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
        <?php include './includes/bodyFooter.php'; ?>
        <script src="js/usuarios.js"></script>
    </body>
</html>
