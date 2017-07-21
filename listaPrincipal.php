<?php
require_once 'model/glicoses.php';

$model = new GlicoseDAO();
$glicoses = $model->listaPrincipal();

foreach ($glicoses as $glicose):
    $progress = (100 * $glicose['glicoses']) / 3;
    ?>

    <tr>
        <td><?php echo $glicose['nome'] ?></td>
        <td class="project_progress">
            <div class="progress progress_sm">
                <!--data-transitiongoal="10"-->
                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="<?php echo $progress; ?>" ></div>
            </div>
            <small><?php echo $glicose['glicoses'] ?>/3 Glicoses</small>
        </td>
        <td>
            <?php echo $glicose['dias']; ?> dias
        </td>
        <td>
            <a href="#" onclick="modalGlicose(<?php echo $glicose['idParticipante']; ?>)" class="btn btn-primary btn-xs"><i class="fa fa-photo"></i> Adicionar Glicoses</a>
        </td>
    </tr>
    <?php
endforeach;
?>

<script src="vendors/gentelella/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
<script src="vendors/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/principal.js" type="text/javascript"></script>
<script>
            var obj = $(".progress-bar");
            $.each(obj, function () {
                var valor = $(this).attr('aria-valuenow');
                $(this).css("width", valor + '%');
            })

            function modalGlicose(idParticipanteClick) {
                var data = new Date();

                var dia = data.getDate();
                var mes = data.getMonth() + 1;
                mes = '0' + mes;
                var ano = data.getFullYear();
                data = ano + '-' + mes + '-' + dia;

                $("#dataGlicose").val(data);
                $("#idParticipante").val(idParticipanteClick);

                idParticipante = idParticipanteClick;
                atualizaCampos(data);

                $("#modalGlicose").modal();
            }
</script>