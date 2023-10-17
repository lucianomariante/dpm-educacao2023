$(function(){
    $("#formContato").validate({
        rules: {
            vSCONNOME: { required: true },
            vSCONEMAIL: { required: true, email: true },
            vSCONMUNICIPIO: { required: true},
            vSCONTELEFONE: { required: true },
            vSCONMENSAGEM: { required: true }
        },
        messages: {
            vSCONNOME: { required: 'Insira seu Nome' },
            vSCONEMAIL: {
                required: 'Insira seu E-mail',
                email: 'O formato de email está incorreto. Exemplo correto: seuemail@seuemail.com'
            },
            vSCONMUNICIPIO: { required: 'Insira seu Município'},
            vSCONTELEFONE: { required: 'Insira seu Telefone' },
            vSCONMENSAGEM: { required: 'Escreva sua Mensagem' }

        },
        errorPlacement: function(error, element) {
            element.prop('placeholder', error.text());
            element.prop('title', error.text());
            element.children('option').first().text(error.text());
            return false;
        },
        submitHandler: function(form){
            grecaptcha.execute();
        }
    });

});

function enviarInteresseEAD()
{
    $("#formContato [name=g-recaptcha-response]").val(grecaptcha.getResponse());

    let dados = $("#formContato").serialize();

    $.ajax({
        type: "POST",
        url: "enviarInteresseEAD.php",
        data: dados,
        dataType: 'json',
        success: function(data){
            if(data[0])
                swal("", data[1], "success");
            else
                swal("", data[1], "error");
            document.getElementById('formContato').reset();
        },
        error: function(data){
            swal("", "Não foi possível enviar sua mensagem!","error");
            // swal("", "teste ubistart","error");
        },
        complete: function(){
            grecaptcha.reset();
        }
    });
}

function digitos(event)
{
    if (window.event) {
        key = event.keyCode;
    } else if ( event.which ) {
        key = event.which;
    }

    if(key != 8 || key != 13 || key < 48 || key > 57 )
        return ( ( ( key > 47 ) && ( key < 58 ) ) || ( key == 8 ) || ( key == 13 ) );
    return true;
}