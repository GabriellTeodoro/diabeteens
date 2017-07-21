<?php
date_default_timezone_set('America/Sao_Paulo');
require_once 'model/glicoses.php';

$data = (isset($_GET['ano'])) ? (int) $_GET['ano'].'-'.$_GET['mes'].'-'.$_GET['dia'] : date("Y-m-d");
$model = new GlicoseDAO();
$objGlicose = new glicemia();
$objGlicose->setData($data);
$glicoses = $model->rankingDia($objGlicose);

$posicao = 1;
foreach($glicoses as $glicose):
?>

<tr>
    <td><?php echo $posicao; ?></td>
    <td>
        <?php echo $glicose['nome']; ?>
    </td>
    <td>
        <?php echo $glicose['media']; ?>
    </td>
</tr>
<?php
    $posicao++;
endforeach;
?>