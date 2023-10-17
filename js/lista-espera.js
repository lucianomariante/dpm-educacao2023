$(function(){
    $("#inscricao-curso").validate({
        rules: {
            vSTURMALOTADA: { required: true },
            vSCLIRAZAOSOCIAL: { required: true },
            vSALUNOME: { required: true },
            vSALUCARGO: { required: true},
            vSALUEMAIL: { required: true, email: true },
            vSTIPOPODER: { required: true },
            vSALUFONE: { required: true },
            vINUMEROVAGAS: { required: true }
        },
        messages: {
            vSTURMALOTADA: { required: 'Selecione a turma para qual deseja se inscrever' },
            vSCLIRAZAOSOCIAL: { required: 'Insira o nome do Município/Autarquia' },
            vSALUNOME: { required: 'Insira o Nome' },
            vSALUCARGO: { required: 'Insira o Cargo' },
            vSALUEMAIL: {
                required: 'Insira o E-mail',
                email: 'O formato de email está incorreto. Exemplo correto: seuemail@seuemail.com'
            },
            vSTIPOPODER: { required: 'Selecione o Tipo de Poder' },
            vSALUFONE: { required: 'Insira o Telefone' },
            vINUMEROVAGAS: { required: 'Insira o Número de vagas desejadas' }

        },
        errorPlacement: function(error, element) {
            element.prop('placeholder', error.text());
            element.prop('title', error.text());
            element.children('option').first().text(error.text());
            return false;
        },
        submitHandler: function(){
            enviarIncricao();
        }
    });

});

function enviarIncricao()
{
    const dados = $("#inscricao-curso").serialize();

    $.ajax({
        type: "POST",
        url: "enviar-lista-espera.php",
        data: dados,
        dataType: 'json',
        success: function(data){
            if(data[0]) {
                swal("", data[1], "success");
                window.location.href = "https://dpmeducacao.com.br/index";
            } else {
                swal("", data[1], "error");
            }

            document.getElementById('inscricao-curso').reset();
        },
        error: function(){
            swal("", "Não foi possível enviar sua mensagem!","error");
        }
    });
}