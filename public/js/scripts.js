$(function () {

    DefaultConfig.init();
    ActiveMenu.init();

    $('.publicado').on('change', function () {
        if (this.checked) {
            $('.data_expiracao').prop('disabled', false);
            $('.data_expiracao').datepicker({
                format: 'dd/mm/yyyy',
                startDate: '+1d',
                language: 'pt-BR'
            });
        } else {
            $('.data_expiracao').val('');
            $('.data_expiracao').prop('disabled', true);
        }
    });

    $('.bairro').on('change', function () {
        let bairro = $(this).val();
        let url = '/imoveis/adicionar/';
        $.post(url, {bairro: bairro}, function (response) {
            $('.logradouro').html('');
            $('.logradouro').trigger("chosen:updated");
            response.forEach(function (data) {
                let options = `<option value="${data.id}">${data.tipo} ${data.nome}</option>`;
                $('.logradouro').append(options);
                $('.logradouro').trigger("chosen:updated");
            })
        }).fail(function (err) {
            console.log(`Error: ${err}`)
        })
    });

    $('input[name="tipo_negocio"]').on('click', function () {
        let tipo = $(this).val();
        TipoNegocio.init(tipo);
    });

    $('.codigo').on('keyup', function () {
        let codigo = $(this).val();
        ValidaCodigoImovel.get(codigo);
    });
    $('.codigo').on('blur', function () {
        if ($(this).hasClass('has-codigo')) {
            $('.codigo').focus();
        }
    });

    $('.remover').on('click', function () {
        if (!confirm('Remover este imovel ?')) {
            return false;
        }
    })
});


/**
 * Algumas configuraçoes padrão
 * @type {{init}}
 */
const DefaultConfig = (function () {
    return {
        init: function () {
            let chosenMessage = 'Não foi possivel localizar: ';
            $('.tipo-imovel').chosen({no_results_text: chosenMessage, width: '100%'});
            $('.filial').chosen({no_results_text: chosenMessage, width: '100%'});
            $('.bairro').chosen({no_results_text: chosenMessage, width: '100%'});
            $('.logradouro').chosen({no_results_text: chosenMessage, width: '100%'});
            $('.money').mask('000.000.000.000.000,00', {reverse: true});
            if (parseFloat($('#valor_venda').val()) > 0) {
                $('#valor_aluguel').val('');
            }
            if (parseFloat($('#valor_aluguel').val()) > 0) {
                $('#valor_venda').val('');
            }
        }
    }
})();

/**
 * Ativa o menu de acordo com a rota
 * @type {{init}}
 */
const ActiveMenu = (function () {
    return {
        init: function () {
            let activeLink = location.pathname.split("/");
            if (activeLink[1] === "") {
                $('#router-imovel').parent().removeClass('active');
                $('#router-inicio').parent().addClass('active');
            } else {
                $('#router-inicio').parent().removeClass('active');
                $('#router-imovel').parent().addClass('active');
            }
        }
    }
})();

/**
 * Mostra o campo do tipo selecionado
 * @type {{init}}
 */
const TipoNegocio = (function () {
    return {
        init: function (tipo) {
            if (tipo === 'V') {
                $('#valor_aluguel').prop('readonly', true);
                $('#valor_venda').prop('readonly', false);
                $('#valor_aluguel').val('');
                $('#valor_venda').focus();
            } else if (tipo === 'A') {
                $('#valor_aluguel').prop('readonly', false);
                $('#valor_venda').prop('readonly', true);
                $('#valor_venda').val('');
                $('#valor_aluguel').focus();
            }
        }
    }
})();

const ValidaCodigoImovel = (function () {
    return {
        get: function (codigo) {
            if (codigo.length >= 1) {
                let url = '/imoveis/adicionar/';
                $.post(url, {codigo: codigo}, function (response) {
                    if (response === 1) {
                        $('.codigo').parent().addClass('has-error');
                        $('.codigo').addClass('has-codigo');
                        $('#codigo-help-block').show();
                    } else {
                        $('.codigo').parent().removeClass('has-error');
                        $('#codigo-help-block').hide();
                        $('.codigo').removeClass('has-codigo');
                    }
                }).fail(function (error) {
                    console.log(error);
                })
            } else {
                $('.codigo').parent().removeClass('has-error');
                $('#codigo-help-block').hide();
                $('.codigo').removeClass('has-codigo');
            }
        }
    }
})();
