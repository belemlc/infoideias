$(function () {
    let activeLink = location.pathname.split("/");
    if (activeLink[1] === "") {
        $('#router-imovel').parent().removeClass('active');
        $('#router-inicio').parent().addClass('active');
    } else {
        $('#router-inicio').parent().removeClass('active');
        $('#router-imovel').parent().addClass('active');
    }

    $('input[name="tipo_negocio"]').on('click', function () {
        let tipo = $(this).val();
        console.log(tipo);
        if (tipo === 'venda') {
            $('#ipt-aluguel').hide();
            $('#ipt-venda').show();
            $('#ipt-venda').find('input').focus();
        } else if (tipo === 'aluguel') {
            $('#ipt-venda').hide();
            $('#ipt-aluguel').show();
            $('#ipt-aluguel').find('input').focus();
        }
    });

    $('.cep').on('blur', function () {
        let cep = $(this).val();
        Cep.get(cep);
    });

    Imagem.init();

});

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


const Cep = (function () {
    return {
        get: function (cep) {
            let url = `https://viacep.com.br/ws/${cep}/json/`;
            $.get(url, function (data) {

            }).done(function (res) {
                console.log(res);
                $('#logradouro').prop('value', res.logradouro);
                $('#bairro').prop('value', res.bairro);
                $('#numero').focus();
            }).fail(function (err) {
                console.log('Err: ', err);
            })
        }
    }
})();