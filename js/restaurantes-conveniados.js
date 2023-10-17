// // Load data from file hoteis-detalhes.json
function restaurantesData(id, parent_id)
{
    var code_html = '';
    var code_li = '';
    data = $.getJSON('./json/restaurantes-detalhes.json', function(data) {
        code_html = '<option disabled selected value="">Selecione os ' + id + ' ...</option>';
        $.each(data, function(key, value) {
            if (id == 'restaurantes') {
                if (value.parent_id == '0') {
                    code_html += '<option value="' + value.id + '">' + value.name + '</option>'
                }
            } else {
                if (value.parent_id == parent_id) {
                    code_li += '<li data-id="' + value.id + '"><i class="fa fa-check" aria-hidden="true"></i><span class="item-name roboto-regular">' + value.name + '</span></li>';
                }
            }
        });
        $("#" + id).html(code_html);
        $("#restaurante").html(code_li);
    });
}

// Change event restaurantes
$(document).on('change', '#restaurantes', function() {
    var restaurante_id = $(this).val();
    restaurantesData('restaurante', restaurante_id);
    $('div.detalhes-hoteis').removeClass('disable').addClass('active');
});

// Click in list restaurantes
$(document).on('click', '#restaurante>li', function() {
    var id_select_hotel = $(this).data('id');
    data_infor = $.getJSON('./json/informacoes-restaurantes.json', function(data_infor) {
        $.each(data_infor, function(key, value) {
            if (id_select_hotel == value.parent_id) {
                $('.informacoes').html(outputHtml(value, 'restaurante'));
            }
        });
    });
});