<?php
//  error_reporting(E_ALL & ~(E_STRICT|E_NOTICE));

date_default_timezone_set('America/Sao_Paulo');
require_once 'model/glicoses.php';

$data = (isset($_GET['ano'])) ? (int) $_GET['ano'] . '-' . $_GET['mes'] . '-' . $_GET['dia'] : date("Y-m-d");
$model = new GlicoseDAO();
$objGlicose = new glicemia();
$objGlicose->setData($data);
$glicoses = $model->rankingDia($objGlicose);


if(count($glicoses) == 0){
    echo '
        <tr>
            <td colspan="3" class="warning">
                Não existem participantes cadastrados nesse dia
            </td>
        </tr>
    ';
}

$posicao = 1;
foreach ($glicoses as $glicose):
    ?>
    <tr>
        <td class="success">
            <?php echo $posicao . 'º'; ?>
        </td>
        <td class="success text-left">
            <div>
                <?php
                if (file_exists("../img/participantes/" . $glicose['idParticipante'] . ".jpg")) {
                    $img = "../img/participantes/" . $glicose['idParticipante'] . ".jpg";
                    echo '<img src="' . $img . '" width="160" height="160" style="margin-right:10px;" class="hidden-xs hidden-sm">';
                } else {
                    $img = "images/guest.png";
                    echo '<img src="' . $img . '" class="img-circle hidden-xs hidden-sm" width="40" height="40" style="margin-right:10px;">';
                }
                echo $glicose['nome']; ?>
            </div>
        </td>
        <td class="success">
            <?php echo $glicose['media']; ?>
        </td>
    </tr>
    <?php
    $posicao++;
endforeach;

/*
 * <div class="row" style="border:1px solid #cecece;">

  <div class="col-md-2 col-xs-2">
  <?php echo $posicao . 'º'; ?>
  </div>
  <div class="col-md-6 col-xs-6 text-left">
  <?php
  if (file_exists("../img/participantes/" . $glicose['idParticipante'] . ".jpg")) {
  $img = "../img/participantes/" . $glicose['idParticipante'] . ".jpg";
  echo '<img src="' . $img . '" width="160" height="160">';
  } else {
  $img = "images/guest.png";
  echo '<img src="' . $img . '" class="img-circle" width="40" height="40">';
  }

  echo $glicose['nome'];
  ?>
  </div>
  <div class="col-md-4 col-xs-4 centered">
  <?php echo $glicose['media']; ?>
  </div>
  </div>
 */
?>