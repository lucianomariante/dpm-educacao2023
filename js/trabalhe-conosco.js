$(function() {
    $("#formCurriculo").validate({
        rules: {
          vSCURNOME: { required: true },
          vSCUREMAIL: { required: true, email: true },
          vSCURTELEFONE: { required: true },
          vSCURVAGA: { required: true },
          vHCURANEXO: { required: true }
        },
        messages: {
            vSCURNOME: { required: 'Insira seu Nome' },
            vSCUREMAIL: {
              required: 'Insira seu E-mail',
              email: 'O formato de email está incorreto. Exemplo correto: seuemail@seuemail.com'
            },
            vSCURTELEFONE: { required: 'Insira seu Telefone' },
            vSCURVAGA: { required: 'Escolha a vaga para se candidatar'},
            vHCURANEXO: { required: "Selecione o seu currículo para anexar ao formulário." }
        },
        errorPlacement: function(error, element) {
            element.addClass('error');
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

document.getElementById("vHCURANEXO").onchange = function () {
    let file = this.files[0];
    let documentfile = file.type;
    let match = ["application/pdf","application/msword","application/vnd.openxmlformats-officedocument.wordprocessingml.document",
    "application/vnd.oasis.opendocument.text"];

    if(!((documentfile == match[0]) || (documentfile == match[1]) || (documentfile == match[2]) || (documentfile == match[3]))){
        alert('Você pode enviar apenas arquivos do tipo .doc, .docx, .odt e .pdf!');
        file.value = '';
        return false;
    }
    document.getElementById("lblAnexo").innerHTML = file.name;
};

function enviarCurriculo()
{
  $("#formCurriculo [name=g-recaptcha-response]").val(grecaptcha.getResponse());

    const file_data = $("#vHCURANEXO").prop("files")[0];
    const form_data = new FormData($("#formCurriculo")[0]);
    console.log(form_data);
    $.ajax({
        url: "enviarCurriculo",
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(data){
            if(data[0])
                swal("", "Currículo cadastrado com sucesso!","success");
            else
                swal("", "Não foi possível efetivar seu cadastro!","error");

            removeClasseErroInputs('formCurriculo');
            document.getElementById('formCurriculo').reset();
            document.getElementById("lblAnexo").innerHTML = '';
        },
        error: function(data){
            swal("", "Não foi possível cadastrar seu currículo!","error");
        },
        complete: function(){
            grecaptcha.reset();
        }
    });
}

function removeClasseErroInputs(div_nome)
{
    $('#'+div_nome).find('input, select, textarea').each(function(){
        $(this).removeClass("error");
    });
}