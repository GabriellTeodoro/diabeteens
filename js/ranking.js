$(document).ready(function () {
    $("#dataRanking").change(function () {

        var data = $(this).val().split('-');
        var ano = data[0];
        var mes = data[1];
        var dia = data[2];
        
        $("#listaRankingDia tbody").html('');
        $("#listaRankingDia tbody").load('listaRankingdia.php?ano='+ano+'&mes='+mes+'&dia='+dia);
    });
});