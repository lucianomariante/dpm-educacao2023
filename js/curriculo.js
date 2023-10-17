$('form[name=formCurriculo]').validate({
      rules: {
      vSCURNOME: { required: true },
      vSCUREMAIL: { required: true, email: true },
      vSCURTELEFONE: { required: true },
      vSCURVAGA: { required: true },
      vHCURANEXO: { 
        required: true,
        accept: ".doc,.docx,.pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"
      }
    },
    messages: {
        vSCURNOME: { required: 'Insira seu Nome' },
        vSCUREMAIL: {
          required: 'Insira seu E-mail',
          email: 'O formato de email está incorreto. Exemplo correto: seuemail@seuemail.com'
        },
        vSCURTELEFONE: { required: 'Insira seu Telefone' },
        vSCURVAGA: { required: 'Escolha a vaga para se candidatar'},
        vHCURANEXO: { 
          required: "Selecione uo seu currículo para anexar ao formulário.",
          accept: 'Você pode enviar apenas arquivos do tipo .doc, .docx, .odt e .pdf!'
        }
    },
    submitHandler: function(form){
        form.submit();
    }
});

$(document).ready(function(){
  gerarGrid({
    namePage: 'curriculo',
    buttons: {
      add: {
        text: 'Novo Currículo'
      }
    },
    order: [0, 'desc']
  });
});