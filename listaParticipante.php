<?php
require_once 'model/participantes.php';

$objParticipante = new ParticipantesDAO();

$participantes = $objParticipante->listaTodos();

foreach ($participantes as $participante):
    ?>
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 profile_details">
        <div class="well profile_view">
            <div class="col-sm-12">
                <div class="left col-xs-12">
                    <h2><?php echo $participante['nome']; ?></h2>
                    <p><strong>Telefone:</strong> <?php echo $participante['telefone']; ?> </p>
                    <p>
                        <strong>Data de Cadastro: </strong>
                        <?php
                        $data = date_create($participante["dataCadastro"]);
                        echo date_format($data, 'd/m/Y');
                        ?>
                    </p>
                </div>

            </div>
            <div class="col-xs-12 bottom text-center">
                <a href="altParticipante.php?idParticipante=<?php echo $participante['idParticipante']; ?>" class="btn btn-success btn-xs">
                    <i class="fa fa-user"></i> Alterar
                </a>
                <a href="#" name="delParticipante" onclick="modalDelParticipante(<?php echo $participante['idParticipante']; ?>)" data-id="<?php echo $participante['idParticipante']; ?>" data-name="<?php echo $participante['nome']; ?>" class="btn btn-danger btn-xs">
                    <i class="fa fa-times"> </i> Excluir
                </a>
            </div>
        </div>
    </div>
    <?php
endforeach;
?>