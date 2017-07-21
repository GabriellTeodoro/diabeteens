<?php
require_once 'model/usuarios.php';

$objUsuario = new Usuarios();
$usuarios = $objUsuario->listaUsuarios();

foreach ($usuarios as $usuario):
?>
    
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 profile_details">
        <div class="well profile_view">
            <div class="col-sm-12">
                <div class="left col-xs-12">
                    <h2><?php echo $usuario["nome"] ?></h2>
                    <p><strong>email:</strong> <?php echo $usuario['email']; ?> </p>
                    <p>
                        <strong>Data de Cadastro: </strong>
                        <?php
                        $data = date_create($usuario["dataCadastro"]);
                        echo date_format($data, 'd/m/Y');
                        ?>
                    </p>
                </div>

            </div>
            <div class="col-xs-12 bottom text-center">
                <a href="altUsuario.php?idUsuario=<?php echo $usuario["idUsuario"]; ?>" class="btn btn-success btn-xs">
                    <i class="fa fa-user"></i> Alterar
                </a> &nbsp;
                <a href="#" class="btn btn-danger btn-xs" name="delUsuario" data-name="<?php echo $usuario["nome"]; ?>" data-id="<?php echo $usuario["idUsuario"]; ?>">
                   <i class="fa fa-times"> </i> Excluir
                </a>
            </div>
        </div>
    </div>
<?php
endforeach;
?>