$(function () {
    $("#cursos-in-company").validate({
        rules: {
            vSCICNOME: {
                required: true
            },
            vSCICEMAIL: {
                required: true,
                email: true
            },
            vSCICMUNICIPIO: {
                required: true
            },
            vSCICTELEFONE: {
                required: true
            },
            vSCICCURSODESEJADO: {
                required: true
            },
            vICICPARTICIPANTES: {
                required: true
            },
            vSCICMENSAGEM: {
                required: true
            }
        },
        messages: {
            vSCICNOME: {
                required: 'Insira seu Nome'
            },
            vSCICEMAIL: {
                required: 'Insira seu E-mail',
                email: 'O formato de email está incorreto. Exemplo correto: seuemail@seuemail.com'
            },
            vSCICMUNICIPIO: {
                required: 'Insira seu Município'
            },
            vSCICTELEFONE: {
                required: 'Insira seu Telefone'
            },
            vSCICCURSODESEJADO: {
                required: 'Insira o curso desejado'
            },
            vICICPARTICIPANTES: {
                required: 'Insira o número de participantes'
            },
            vSCICMENSAGEM: {
                required: 'Escreva sua Mensagem'
            }

        },
        errorPlacement: function (error, element) {
            element.prop('placeholder', error.text());
            element.prop('title', error.text());
            element.children('option').first().text(error.text());
            return false;
        },
        submitHandler: function () {
            grecaptcha.execute();
        }
    });

});

function enviarCurso() {
    $("#cursos-in-company [name=g-recaptcha-response]").val(grecaptcha.getResponse());

    let dados = $("#cursos-in-company").serialize();

    $.ajax({
        type: "POST",
        url: "enviar-curso.php",
        data: dados,
        dataType: 'json',
        success: function (data) {
            if (data[0]) {
                swal("", data[1], "success");
            } else {
                swal("", data[1], "error");
            }

            document.getElementById('cursos-in-company').reset();
        },
        error: function () {
            swal("", "Não foi possível enviar sua mensagem!", "error");
        },
        complete: function () {
            grecaptcha.reset();
        }
    });
}

function digitos(event) {
    if (window.event) {
        key = event.keyCode;
    } else if (event.which) {
        key = event.which;
    }

    if (key != 8 || key != 13 || key < 48 || key > 57)
        return (((key > 47) && (key < 58)) || (key == 8) || (key == 13));
    return true;
}