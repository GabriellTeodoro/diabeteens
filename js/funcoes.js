function calcularFrete(cep, comprimento, altura, largura, peso) {
    var resposta =
            $.ajax({
                method: 'POST',
                url: 'control/produtoControle.php',
                data: {
                    opcao: 'calculaCep',
                    cep: cep,
                    comprimento: comprimento,
                    altura: altura,
                    largura: largura,
                    peso: peso
//                    idProduto: idProduto
                },
                async: false


            });

    console.log(resposta.responseText);
    return JSON.parse(resposta.responseText);
}
;

//função para gerar uma string de números e letras aleatoriamente
function generateString(chars) {
    var pass = "";
    var getRandomChar = function () {
        /*
         * matriz contendo em cada linha indices (inicial e final) da tabela ASCII para retornar alguns caracteres.
         * [48, 57] = numeros;
         * [64, 90] = "@" mais letras maiusculas;
         * [97, 122] = letras minusculas;
         */
        var ascii = [[48, 57], [65, 89]];
        var i = Math.floor(Math.random() * ascii.length);
        return String.fromCharCode(Math.floor(Math.random() * (ascii[i][1] - ascii[i][0])) + ascii[i][0]);
    }

    for (var i = 0; i < chars; i++) {
        pass += getRandomChar();
    }

    return pass;
}

//funções de busca, utilizando autocomplete do jquery
var busca = function (termo, url, campos) {
    if (typeof termo == 'undefined' || termo == '') {
        termo = '';
    }

    var retorno = $.ajax({
        method: 'POST',
        url: url,
        async: false,
        data: {opcao: 'buscaInput', query: termo}
    });
//console.log(retorno.responseText);
    var obj = $.parseJSON(retorno.responseText);
    var data = new Array();
    $.each(obj, function (i, v) {

        //var campo = {'name': v.nome, 'username': v.email};
        //var campo = v.email;
        var campo = {value: v[campos.id], label: v[campos.label], desc: v[campos.desc]};
        data[data.length] = campo;
    });

    return(data);

//return retorno;
};

function split(val) {
    return val.split(/,\s*/);
}
function extractLast(term) {
    return split(term).pop();
}
//fim das funções de busca


function emailUnico(email) {
    var bool;
    $.ajax({
        url: 'control/clienteControle.php',
        method: 'POST',
        async: false,
        data: {opcao: 'verificaEmail', email: email},
        success: function (resposta) {
            console.log(resposta);

            if (resposta == 0) {
                bool = false;
            } else {
                bool = true;
            }
        }
    });

    return bool;
}

function cpfUnico(cpf) {
    var bool;
    $.ajax({
        url: 'control/clienteControle.php',
        method: 'POST',
        async: false,
        data: {opcao: 'verificaCpf', cpf: cpf},
        success: function (resposta) {
            if (resposta == 0) {
                bool = false;
            } else {
                bool = true;
            }
        }
    });

    return bool;
}

/*
 isCpf
 
 Valida se for CPF
 
 @param  string cpf O CPF com ou sem pontos e traço
 @return bool True para CPF correto - False para CPF incorreto
 */
function isCpf(cpf) {

    cpf = cpf.replace(/[^\d]+/g, '');
    if (cpf == '')
        return false;
    // Elimina CPFs invalidos conhecidos    
    if (cpf.length != 11 ||
            cpf == "00000000000" ||
            cpf == "11111111111" ||
            cpf == "22222222222" ||
            cpf == "33333333333" ||
            cpf == "44444444444" ||
            cpf == "55555555555" ||
            cpf == "66666666666" ||
            cpf == "77777777777" ||
            cpf == "88888888888" ||
            cpf == "99999999999")
        return false;
    // Valida 1o digito 
    add = 0;
    for (i = 0; i < 9; i ++)
        add += parseInt(cpf.charAt(i)) * (10 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(9)))
        return false;
    // Valida 2o digito 
    add = 0;
    for (i = 0; i < 10; i ++)
        add += parseInt(cpf.charAt(i)) * (11 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(10)))
        return false;
    return true;
}

/*
 isCnpj
 
 Valida se for um CNPJ
 
 @param string cnpj
 @return bool true para CNPJ correto
 */
function isCnpj(valor) {
    valor = valor.toString();
    valor = valor.replace(/[^0-9]/g, '');
    var cnpj_original = valor;
    var primeiros_numeros_cnpj = valor.substr(0, 12);
    var primeiro_calculo = calc_digitos_posicoes(primeiros_numeros_cnpj, 5);
    var segundo_calculo = calc_digitos_posicoes(primeiro_calculo, 6);
    var cnpj = segundo_calculo;
    if (cnpj === cnpj_original) {
        return true;
    }
    return false;
}

function buscaCep(cep, campos) {
//    var cep = $("#cepEndereco" + area).val();

    var retorno;
    $.ajax({
        method: 'POST',
        async: false,
        url: 'control/enderecoControle.php',
        data: {opcao: 'buscaCep', cep: cep},
        success: function (r) {
            r = $.parseJSON(r);
            retorno = r;
            var logradouro = r.logradouro;
            var estado = r.uf;
            var cidade = r.cidade;
            var bairro = r.bairro;
//            retorno = {logradouro: logradouro, estado: estado, cidade: cidade, bairro: bairro};

            $("#" + campos.estado).val(estado);
            buscaCidade(estado, campos, cidade);
            $("#" + campos.logradouro).val(logradouro);
            $("#" + campos.bairro).val(bairro);
        }
    });
//    return retorno;
}

function buscaCidade(estado, campos, cidade) {
    $.ajax({
        method: "POST",
        url: 'control/enderecoControle.php',
        data: {opcao: 'buscaCidade', estado: estado},
//        dataType: 'jsonp',
        error: function () {
            $('#teste').html('<p>An error has occurred</p>');
        },
        success: function (cidades) {
            r = $.parseJSON(cidades);
            var result = '';
            var selected = '';
            for (i in r) {
                var item = r[i];
                if (typeof (cidade) != "undefined" && item.idCidade == cidade) {
                    selected = 'selected';
                } else {
                    selected = '';
                }
                result += '<option value="' + item.idCidade + '" ' + selected + '>' + item.nomeCidade + '</option>';
            }

            $("#" + campos.cidade).html('');
            $("#" + campos.cidade).append(result);
            if (typeof (cidade) != "undefined") {
                $("#" + campos.cidade).val(cidade);
            }
        }
    });
}

function isPhone(num, campo) {
    var tecla = (window.event) ? event.keyCode : e.which;
    if (num.length == 2) {
        $("#"+campo).val('(' + num + ')');
    } else if (num.length == 8) {
        $("#"+campo).val(num + '-')
    } else if (num.length == 14) {
        return false;
    } else if ((tecla > 47 && tecla < 58 || tecla === 109 || tecla === 189))
        return true;
    else if (tecla === 8 || tecla === 0)
        return true;
    else
        return false;
}

function isNumero() {
    var tecla = (window.event) ? event.keyCode : e.which;

    if ((tecla > 47 && tecla < 58) || (tecla > 95 && tecla < 106))
        return true;
    else if (tecla === 9 || tecla === 8 || tecla === 16 || tecla === 17 || tecla === 0)
        return true;
    else
        return false;
}

function IsEmail(email) {
    var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
    if (reg.test(email)) {
        return true;
    }
    else {
        return false;
    }
}

function formatReal(int) {
    return int.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+\,)/g, "$1.");
}

/*
 * 
 * @param string elemento
 * @param string mensagem
 * @param bool erro
 * @developer Paulo Sergio Xavier
 * @description Altera as classes do bootstrap para o padrão de validação do framework,
 * a validação deve ser feita de acordo à necessidade do formulário e depois ser feita a
 * chamada dessa função.
 * Para colocar o padrão de campo inválido, basta passar o parametro "erro" com o valor 1,
 * para colocar o padrão de campo como válido, basta passar o parametro "erro" com o valor 0.
 */
function validateBootstrap(elemento, mensagem, erro) {
    if (erro === 1) {
//coloca a classe de erro no elemento validado
        $("#form-group-" + elemento).addClass('has-error has-feedback');
        $("#icon-" + elemento).addClass('glyphicon-warning-sign');
        $("#label-" + elemento).html(mensagem);
    } else {
//retira a classe de erro do elemento que estiver OK
        $("#form-group-" + elemento).removeClass('has-error has-feedback');
        $("#icon-" + elemento).removeClass('glyphicon-warning-sign');
        $("#label-" + elemento).html(mensagem);
        //adiciona a classe de sucesso do elemento que estiver OK
        $("#form-group-" + elemento).addClass('has-success has-feedback');
        $("#icon-" + elemento).addClass('glyphicon-ok');
        $("#label-" + elemento).html(mensagem);
    }
}