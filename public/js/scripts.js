$(function () {

    DefaultConfig.init();
    ActiveMenu.init();

    $('.publicado').on('change', function () {
        if (this.checked) {
            $('.expirado').prop('disabled', false);
            $('.expirado').datepicker({
                format: 'dd/mm/yyyy',
                startDate: '+1d',
                language: 'pt-BR'
            });
        } else {
            $('.expirado').val('');
            $('.expirado').prop('disabled', true);
        }
    });

    $('.bairro').on('change', function () {
        let bairro = $(this).val();
        let url = '/imoveis/adicionar/';
        $.post(url, {bairro: bairro}, function () {
            //
        }).done(function (response) {
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
                $('#ipt-aluguel').hide();
                $('#ipt-venda').show();
                $('#ipt-venda').find('input').focus();
                $('#ipt-venda').find('input').val('');
            } else if (tipo === 'A') {
                $('#ipt-venda').hide();
                $('#ipt-aluguel').show();
                $('#ipt-aluguel').find('input').focus();
                $('#ipt-aluguel').find('input').val('');
            }
        }
    }
})();

/**
 *
 * @type {{init, add, remove, template}}
 */
const Imagem = (function () {
    let i = 0;
    let btnRemove = '';
    return {
        init: function () {
          $('.photo-upload').last().before(this.template());
        },
        add: function () {
            $('.clone').last().before(this.template());
        },
        remove: function (i) {
            let id = `#${i}`;
          $(id).remove();
        },
        template: function () {
            ++i;
            if (i > 1) {
                btnRemove = `<button type="button" onclick="Imagem.remove(${i})" class="btn btn-sm btn-danger removePhoto"><i class="fa fa-trash"></i></button>`;
            }
            let template = `
                <div class="row" id="${i}"><br />
                <div class="col-sm-4 col-md-4">
                <div class="form-group">
                <input type="file" name="photo[]" accept="image/png;">
                </div>
                </div>
                <div class="col-sm-4 col-md-4">
                <button type="button" onclick="Imagem.add()" class="btn btn-sm btn-success addPhoto"><i class="fa fa-plus"></i></button>
                ${btnRemove}
                </div>
                </div>
            `;
            return template;
        }
    }
})();
